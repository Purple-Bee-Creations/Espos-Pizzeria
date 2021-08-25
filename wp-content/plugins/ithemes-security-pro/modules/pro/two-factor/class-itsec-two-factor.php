<?php

class ITSEC_Two_Factor {

	private
		$settings,
		$module_path;

	function run() {

		$this->settings    = get_site_option( 'itsec_two_factor' );
		$this->module_path = ITSEC_Lib::get_module_path( __FILE__ );

		if ( isset( $this->settings['enabled'] ) && $this->settings['enabled'] === true ) {

			add_action( 'login_form', array( $this, 'login_form' ) );
			add_action( 'personal_options_update', array( $this, 'personal_options_update' ) );
			add_action( 'profile_personal_options', array( $this, 'profile_personal_options' ) );
			add_action( 'edit_user_profile', array( $this, 'edit_user_profile' ) );
			add_action( 'edit_user_profile_update', array( $this, 'edit_user_profile_update' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) ); //enqueue scripts for admin page
			add_action( 'wp_ajax_itsec_two_factor_profile_ajax', array( $this, 'itsec_two_factor_profile_ajax' ) );
			add_action( 'wp_ajax_itsec_two_factor_profile_new_app_pass_ajax', array( $this, 'itsec_two_factor_profile_new_app_pass_ajax' ) );

			add_filter( 'itsec_logger_modules', array( $this, 'itsec_logger_modules' ) );
			add_filter( 'wp_authenticate_user', array( $this, 'wp_authenticate_user' ), 10, 2 );

		}

	}

	/**
	 * Add Admin Javascript
	 *
	 * @since 4.4
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts() {

		if ( isset( get_current_screen()->id ) && get_current_screen()->id === 'profile' ) {

			wp_enqueue_script( 'jquery-qrcode', $this->module_path . 'js/jquery.qrcode.min.js', array( 'jquery' ), '1.0.0' );
			wp_enqueue_script( 'itsec_two_factor_profile', $this->module_path . 'js/profile-two-factor.js', array( 'jquery' ), '1.0.0' );
			wp_localize_script(
				'itsec_two_factor_profile',
				'itsec_two_factor_profile',
				array(
					'nonce' => wp_create_nonce( 'itsec_two_factor_profile' ),
				)
			);

		}

	}

	/**
	 * Display user options field to allow override
	 *
	 * @since 4.4
	 *
	 * @param mixed $user user
	 *
	 * @return void
	 */
	public function edit_user_profile( $user ) {

		global $itsec_globals;

		if ( ( is_multisite() && current_user_can( 'manage_network_options' ) === true ) || ( is_multisite() === false && current_user_can( $itsec_globals['plugin_access_lvl'] ) ) ) {

			$enabled = trim( get_user_option( 'itsec_two_factor_enabled', $user->ID ) );

			echo '<h3>' . __( 'Google Authenticator Settings', 'it-l10n-ithemes-security-pro' ) . '</h3>';

			echo '<table class="form-table">';
			echo '<tbody>';

			echo '<tr>';
			echo '<th scope="row">' . __( 'Enable', 'it-l10n-ithemes-security-pro' ) . '</th>';
			echo '<td>';

			if ( $enabled === 'on' ) {

				echo '<input type="checkbox" name="itsec_two_factor_enabled" id="itsec_two_factor_enabled" ' . checked( $enabled, 'on', false ) . '/>';

			} else {

				echo __( 'Two-factor authentication has not been enabled for this user. The user can login and enable two-factor authentication themselves by editing their profile.', 'it-l10n-ithemes-security-pro' );

			}
			echo '</td>';
			echo '</tr>';

			echo '</tbody>';
			echo '</table>';

		}

	}

	/**
	 * Sanitize and update user option for override
	 *
	 * @since 4.4
	 *
	 * @param int $user_id user id
	 *
	 * @return void
	 */
	public function edit_user_profile_update( $user_id ) {

		$current = trim( get_user_option( 'itsec_two_factor_enabled', $user_id ) );

		if ( $current === 'on' ) {

			if ( isset( $_POST['itsec_two_factor_enabled'] ) ) {

				$enabled = isset( $_POST['itsec_two_factor_enabled'] ) ? sanitize_text_field( $_POST['itsec_two_factor_enabled'] ) : 'off';

			} else {

				$enabled = 'off';
			}

			update_user_option( $user_id, 'itsec_two_factor_enabled', $enabled, true );

		}

	}

	/**
	 * Generates an app password
	 *
	 * @since 4.4
	 *
	 * @return string
	 */
	private function get_app_pass() {

		$pass = '';

		for ( $i = 0; $i < 6; $i ++ ) {

			$pass .= ITSEC_Lib::get_random( 4 ) . ' ';

		}

		return strtoupper( trim( $pass ) );

	}

	/**
	 * Generate hash to check
	 *
	 * @since 4.4
	 *
	 * @param string $key  the key to encode
	 * @param mixed  $time timestamp
	 *
	 * @return string the hash
	 */
	private function get_code( $key, $time = false ) {

		require_once( dirname( __FILE__ ) . '/lib/base32.php' );

		$base = new Base32();

		$secret = $base->toString( $key );

		if ( $time === false ) {
			$time = floor( time() / 30 );
		}

		$timestamp = pack( 'N*', 0 ) . pack( 'N*', $time );

		$hash = hash_hmac( 'sha1', $timestamp, $secret, true );

		$offset = ord( $hash[19] ) & 0xf;

		$code = (
			        ( ( ord( $hash[$offset + 0] ) & 0x7f ) << 24 ) |
			        ( ( ord( $hash[$offset + 1] ) & 0xff ) << 16 ) |
			        ( ( ord( $hash[$offset + 2] ) & 0xff ) << 8 ) |
			        ( ord( $hash[$offset + 3] ) & 0xff )
		        ) % pow( 10, 6 );

		return str_pad( $code, 6, '0', STR_PAD_LEFT );

	}

	/**
	 * Register two factor detection for logger
	 *
	 * @param  array $logger_modules array of logger modules
	 *
	 * @return array                   array of logger modules
	 */
	public function itsec_logger_modules( $logger_modules ) {

		$logger_modules['two_factor'] = array(
			'type'     => 'two_factor',
			'function' => __( 'Two Factor Login Failure', 'it-l10n-ithemes-security-pro' ),
		);

		return $logger_modules;

	}

	/**
	 * Ajax generate new key
	 *
	 * @since 4.4
	 *
	 * @return void
	 */
	public function itsec_two_factor_profile_ajax() {

		if ( ! wp_verify_nonce( sanitize_text_field( $_POST['nonce'] ), 'itsec_two_factor_profile' ) ) {
			die( __( 'Security error!', 'it-l10n-ithemes-security-pro' ) );
		}

		die( ITSEC_Lib::get_random( 16, true ) );

	}

	/**
	 * Ajax generate new app password
	 *
	 * @since 4.4
	 *
	 * @return void
	 */
	public function itsec_two_factor_profile_new_app_pass_ajax() {

		if ( ! wp_verify_nonce( sanitize_text_field( $_POST['nonce'] ), 'itsec_two_factor_profile' ) ) {
			die( __( 'Security error!', 'it-l10n-ithemes-security-pro' ) );
		}

		die( $this->get_app_pass() );

	}

	/**
	 * Add authenticator field to login form
	 *
	 * @since 4.4
	 *
	 * @return void
	 */
	function login_form() {

		echo '<p>';
		echo '<label for="itsec_two_factor_code">' . __( 'Two-factor Authentication Code', 'it-l10n-ithemes-security-pro' ) . '<br />';
		echo '<input type="text" name="itsec_two_factor_code" id="itsec_two_factor_code" class="input" value="" size="20" style="ime-mode: inactive;" /></label>';
		echo '</p>';
	}

	/**
	 * Sanitize and update user options
	 *
	 * @since 4.4
	 *
	 * @param int $user_id user id
	 *
	 * @return void
	 */
	public function personal_options_update( $user_id ) {

		$enabled       = 'off';
		$enabled_input = isset( $_POST['itsec_two_factor_enabled'] ) ? sanitize_text_field( $_POST['itsec_two_factor_enabled'] ) : 'off';
		$description   = isset( $_POST['itsec_two_factor_description'] ) ? sanitize_text_field( $_POST['itsec_two_factor_description'] ) : ITSEC_Lib::get_domain( get_site_url(), false, false );
		$key           = isset( $_POST['itsec_two_factor_key'] ) ? sanitize_text_field( $_POST['itsec_two_factor_key'] ) : ITSEC_Lib::get_random( 16, true );
		$use_app       = isset( $_POST['itsec_two_factor_use_app'] ) ? sanitize_text_field( $_POST['itsec_two_factor_use_app'] ) : 'off';
		$app_pass      = wp_hash_password( str_replace( ' ', '', ( isset( $_POST['itsec_two_factor_app_pass'] ) ? sanitize_text_field( $_POST['itsec_two_factor_app_pass'] ) : $this->get_app_pass() ) ) );
		$time          = floor( time() / 30 ); //time to check

		if ( ( get_user_option( 'itsec_two_factor_enabled', $user_id ) === 'off' && $enabled_input === 'on' ) || ( $key !== get_user_option( 'itsec_two_factor_key', $user_id ) ) ) {

			if ( isset( $_POST['itsec_two_factor_confirm'] ) ) {
				$code = sanitize_text_field( trim( $_POST['itsec_two_factor_confirm'] ) );
			} else {
				$code = false;
			}

			if ( $code !== false && strlen( $code ) > 0 ) {

				$good_code = false;

				$offset = isset( $this->settings['offset'] ) ? intval( $this->settings['offset'] ) : 1;

				//Check both sides of the time
				for ( $i = - $offset; $i <= $offset; $i ++ ) {

					$log_time = $time + $i;

					if ( $this->get_code( $key, $log_time ) === $code ) {

						$enabled   = $enabled_input;
						$good_code = true;

					}

				}

			} else {

				$good_code = false;

			}

			if ( $good_code === false ) {
				add_action( 'user_profile_update_errors', array( $this, 'user_profile_update_errors' ), 10, 3 );
			}

		} else {

			$enabled = $enabled_input;

		}

		update_user_option( $user_id, 'itsec_two_factor_enabled', $enabled, true );
		update_user_option( $user_id, 'itsec_two_factor_description', $description, true );
		update_user_option( $user_id, 'itsec_two_factor_key', $key, true );
		update_user_option( $user_id, 'itsec_two_factor_use_app', $use_app, true );

		if ( $app_pass !== '----------------' ) {
			$app_pass = wp_hash_password( $app_pass );
		}

		if ( $use_app !== 'off' && $app_pass !== '----------------' ) {
			update_user_option( $user_id, 'itsec_two_factor_app_pass', $app_pass, true );
		} else {
			delete_user_option( $user_id, 'itsec_two_factor_app_pass', true );
		}

	}

	/**
	 * Display user options fields
	 *
	 * @since 4.4
	 *
	 * @param mixed $user user
	 *
	 * @return void
	 */
	public function profile_personal_options( $user ) {

		//determine the minimum role for enforcement
		$minRole = $this->settings['roll'];

		//all the standard roles and level equivalents
		$availableRoles = array(
			'administrator' => '8', 'editor' => '5', 'author' => '2', 'contributor' => '1', 'subscriber' => '0'
		);

		$allowed_two_factor = false;

		foreach ( $user->roles as $capability ) {

			if ( $availableRoles[$capability] >= $availableRoles[$minRole] ) {
				$allowed_two_factor = true;
			}

		}

		if ( $allowed_two_factor === true ) {

			$enabled     = trim( get_user_option( 'itsec_two_factor_enabled', $user->ID ) );
			$domain      = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
			$description = get_user_option( 'itsec_two_factor_description', $user->ID ) !== false ? trim( get_user_option( 'itsec_two_factor_description', $user->ID ) ) : $domain;
			$key         = get_user_option( 'itsec_two_factor_key', $user->ID ) !== false ? trim( get_user_option( 'itsec_two_factor_key', $user->ID ) ) : ITSEC_Lib::get_random( 16, true );
			$use_app     = trim( get_user_option( 'itsec_two_factor_use_app', $user->ID ) );
			$app_pass    = get_user_option( 'itsec_two_factor_app_pass', $user->ID ) !== false ? '---- ---- ---- ----' : $this->get_app_pass();

			echo '<h3>' . __( 'Google Authenticator Settings', 'it-l10n-ithemes-security-pro' ) . '</h3>';

			echo '<table class="form-table">';
			echo '<tbody>';

			echo '<tr>';
			echo '<th scope="row">' . __( 'Enable', 'it-l10n-ithemes-security-pro' ) . '</th>';
			echo '<td>';
			echo '<input type="checkbox" name="itsec_two_factor_enabled" id="itsec_two_factor_enabled" ' . checked( $enabled, 'on', false ) . '/>';
			echo '</td>';
			echo '</tr>';

			echo '</tbody>';
			echo '</table>';

			echo '<div id="itsec_two_factor_settings">';
			echo '<table class="form-table">';
			echo '<tbody>';

			echo '<tr>';
			echo '<th scope="row">' . __( 'Description', 'it-l10n-ithemes-security-pro' ) . '</th>';
			echo '<td>';
			echo '<label for="itsec_two_factor_description">';
			echo '<input type="text" name="itsec_two_factor_description" id="itsec_two_factor_description" value="' . $description . '"/> ';
			echo __( 'A label that will identify the site in your Google Authenticator app.', 'it-l10n-ithemes-security-pro' );
			echo '</label>';
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<th scope="row">' . __( 'Key', 'it-l10n-ithemes-security-pro' ) . '</th>';
			echo '<td>';
			echo '<input type="text" name="itsec_two_factor_key" id="itsec_two_factor_key" readonly="readonly" value="' . $key . '"/> ';
			echo '<input type="button" class="button" name="itsec_two_factor_get_new_key" id="itsec_two_factor_get_new_key" value="' . __( 'Get new key', 'it-l10n-ithemes-security-pro' ) . '" />';
			echo '</label>';
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td></td>';
			echo '<td>';
			echo '<div id="qrcode"/></div>';
			echo '<p class="description">' . __( 'Scan this code with your Google Authenticator app.', 'it-l10n-ithemes-security-pro' ) . '</p>';
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<th scope="row">' . __( 'Confirm Code', 'it-l10n-ithemes-security-pro' ) . '</th>';
			echo '<td>';
			echo '<input type="text" name="itsec_two_factor_confirm" id="itsec_two_factor_confirm" value=""/> ';
			echo __( 'Confirm the current key from your two-factor application.', 'it-l10n-ithemes-security-pro' );
			echo '</label>';
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<th scope="row">' . __( 'Use App Password', 'it-l10n-ithemes-security-pro' ) . '</th>';
			echo '<td>';
			echo '<label for="itsec_two_factor_use_app">';
			echo '<input type="checkbox" name="itsec_two_factor_use_app" id="itsec_two_factor_use_app" ' . checked( $use_app, 'on', false ) . '/> ';
			echo __( 'Create a unique password to log into applications that do not support two-factor authentication. This will reduce the security of your user account.', 'it-l10n-ithemes-security-pro' );
			echo '</label>';
			echo '</td>';
			echo '</tr>';

			echo '</tbody>';
			echo '</table>';

			echo '<div id="itsec_two_factor_app_pass_settings">';
			echo '<table class="form-table">';
			echo '<tbody>';

			echo '<tr>';
			echo '<th></th>';
			echo '<td>';
			echo '<label for="itsec_two_factor_app_pass">';
			echo '<input type="text" name="itsec_two_factor_app_pass" id="itsec_two_factor_app_pass" readonly="readonly" value="' . $app_pass . '"/> ';
			echo '<input type="button" class="button" name="itsec_two_factor_get_new_app_pass" id="itsec_two_factor_get_new_app_pass" value="' . __( 'Generate App Password', 'it-l10n-ithemes-security-pro' ) . '" /> ';
			echo __( 'The password will only be shown once and will not be retrievable after you save it. Copy it now.', 'it-l10n-ithemes-security-pro' );
			echo '</label>';
			echo '</td>';
			echo '</tr>';

			echo '</tbody>';
			echo '</table>';
			echo '</div>';

			echo '</div>';

		}

	}

	/**
	 * Display error message when GA not confirmed.
	 *
	 * @since 4.5
	 *
	 * @param $errors
	 * @param $update
	 * @param $user
	 *
	 * @return void
	 */
	public function user_profile_update_errors( &$errors, $update, &$user ) {

		$errors->add( 'user_error', __( 'Your Two-factor confirmation code is incorrect and Two-factor authentication has been disabled. Please check your server time and try again.', 'it-l10n-ithemes-security-pro' ) );

	}

	/**
	 * Authenticate a user with two-factor enabled
	 *
	 * @since 4.4
	 *
	 * @param mixed  $user     the user
	 * @param string $password password the password entered
	 *
	 * @return mixed user or error
	 */
	public function wp_authenticate_user( $user, $password ) {

		global $itsec_logger;

		if ( is_wp_error( $user ) ) {
			return $user;
		}

		$current_user = $user; //Store error or user object already authenticated

		//make sure the user has two-factor turned on for their account
		if ( isset( $user->ID ) && trim( get_user_option( 'itsec_two_factor_enabled', $user->ID ) ) === 'on' ) {

			$key        = get_user_option( 'itsec_two_factor_key', $user->ID );
			$time       = floor( time() / 30 ); //time to check
			$good_login = false; //is this a valid login

			if ( isset( $_POST['itsec_two_factor_code'] ) ) {
				$code = sanitize_text_field( trim( $_POST['itsec_two_factor_code'] ) );
			} else {
				$code = false;
			}

			if ( $code !== false && strlen( $code ) > 0 ) {

				$offset = isset( $this->settings['offset'] ) ? intval( $this->settings['offset'] ) : 1;

				//Check both sides of the time
				for ( $i = - $offset; $i <= $offset; $i ++ ) {

					$log_time = $time + $i;

					if ( $this->get_code( $key, $log_time ) === $code ) {

						$good_login = array( $log_time, $code, ); //they gave a valid code

					}

				}

			}

			if ( $good_login !== false ) { //we have a valid code

				$last_login = get_user_option( 'itsec_two_factor_last_login', $user->ID );

				if ( is_array( $last_login ) && ( $last_login[1] === $good_login[1] || $last_login[0] >= $good_login[0] ) ) { //looks like a replay

					$itsec_logger->log_event(
					             'two_factor',
					             8,
					             array(
						             __( 'Possible two-factor relay attack. Two factor code was re-used or invalid time.', 'it-l10n-ithemes-security-pro' ),
					             ),
					             ITSEC_Lib::get_ip(),
					             sanitize_text_field( $user->user_login ),
					             '',
					             '',
					             ''
					);

					return new WP_Error( 'invalid_two_factor_code', '<strong>' . __( 'ERROR', 'it-l10n-ithemes-security-pro' ) . '</strong>: ' . __( 'The two-factor code entered is invalid. Please try again.', 'it-l10n-ithemes-security-pro' ) );

				} else { //its a good login so save the info

					update_user_option( $user->ID, 'itsec_two_factor_last_login', $good_login );

				}

			} elseif ( defined( 'XMLRPC_REQUEST' ) && trim( get_user_option( 'itsec_two_factor_use_app', $user->ID ) ) === 'on' ) { //code is invalid, lets check the app password if its on

				if ( wp_check_password( sanitize_text_field( strtoupper( str_replace( ' ', '', $password ) ) ), get_user_option( 'itsec_two_factor_app_pass', $user->ID ) ) ) {

					return new WP_User( $user->ID );

				} else {

					return new WP_Error( 'invalid_two_factor_app_password', '<strong>' . __( 'ERROR', 'it-l10n-ithemes-security-pro' ) . '</strong>: ' . __( 'The two-factor app password entered is invalid. Please try again.', 'it-l10n-ithemes-security-pro' ) );

				}

			} else {

				return new WP_Error( 'invalid_two_factor_code', '<strong>' . __( 'ERROR', 'it-l10n-ithemes-security-pro' ) . '</strong>: ' . __( 'The two-factor code entered is invalid. Please try again.', 'it-l10n-ithemes-security-pro' ) );

			}

		}

		return $current_user;

	}

}