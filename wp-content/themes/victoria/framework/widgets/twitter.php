<?php
/**
 * Plugin Name: Twitter Widget
 * Description: A widget used for displaying twitter tweets.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */

	// Register Widget 
	function sys_twitter_widgets() {
		register_widget('sys_twitter_widget');
	}

	// Define the Widget as an extension of WP_Widget
	class sys_twitter_widget extends WP_Widget {
		
		function sys_twitter_widget() {

			/* Widget settings. */ 
			$widget_ops = array(
				'classname'		=> 'twitter_widget',
				'description'	=> __('Use this widget to display the latest tweet from twitter', 'ATP_ADMIN_SITE')
			);

			/* Widget control settings. */
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'sys_twitter_widget'
			);
	
			/* Create the widget. */
			$this->WP_Widget('sys_twitter_widget',THEMENAME.' - Twitter', $widget_ops, $control_ops );
		}

		// outputs the content of the widget
		function widget($args,$instance ) {
			extract( $args );

			$sys_twitter_username = $instance['sys_twitter_username'];
			$title = $instance['sys_twitter_title'];
			$sys_twitter_limits = $instance['sys_twitter_limits'];
			$sys_twitter_consumerkey = $instance['sys_twitter_consumerkey'];
			$sys_twitter_consumersecret = $instance['sys_twitter_consumersecret'];
			$sys_twitter_accesstoken = $instance['sys_twitter_accesstoken'];
			$sys_twitter_accesstokensecret = $instance['sys_twitter_accesstokensecret'];
			$twitter_array = array(
					'username' => $sys_twitter_username,
					'limit' => $sys_twitter_limits,
					'encode_utf8' =>'',
					'twitter_cons_key' =>$sys_twitter_consumerkey,
					'twitter_cons_secret' =>$sys_twitter_consumersecret,
					'twitter_oauth_token' =>$sys_twitter_accesstoken,
					'twitter_oauth_secret' => $sys_twitter_accesstokensecret
				);
			echo $before_widget;
			if ($title) {
				echo $before_title .$title.$after_title;
			}
			echo twitter_parse_cache_feed($twitter_array);
			/* After widget (defined by themes). */
			echo $after_widget;
		}

		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['sys_twitter_username'] = strip_tags( $new_instance['sys_twitter_username'] );
			$instance['sys_twitter_limits'] = strip_tags( $new_instance['sys_twitter_limits'] );
			$instance['sys_twitter_title'] = strip_tags( $new_instance['sys_twitter_title'] );
			$instance['sys_twitter_consumerkey'] = strip_tags( $new_instance['sys_twitter_consumerkey'] );
			$instance['sys_twitter_consumersecret'] = strip_tags( $new_instance['sys_twitter_consumersecret'] );
			$instance['sys_twitter_accesstoken'] = strip_tags( $new_instance['sys_twitter_accesstoken'] );
			$instance['sys_twitter_accesstokensecret'] = strip_tags( $new_instance['sys_twitter_accesstokensecret'] );
			return $instance;
		}

		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args( (array) $instance, array(
				'sys_twitter_title'		=> '', 
				'sys_twitter_username'	=> '',
				'sys_twitter_limits'	=> '',
				'sys_twitter_consumerkey' => '',
				'sys_twitter_consumersecret' => '',
				'sys_twitter_accesstoken' => '',
				'sys_twitter_accesstokensecret' => ''
			));
			$title = strip_tags($instance['sys_twitter_title']);
			$sys_twitter_consumerkey = strip_tags($instance['sys_twitter_consumerkey']);
			$sys_twitter_consumersecret = strip_tags($instance['sys_twitter_consumersecret']);
			$sys_twitter_accesstoken = strip_tags($instance['sys_twitter_accesstoken']);
			$sys_twitter_accesstokensecret = strip_tags($instance['sys_twitter_accesstokensecret']);
		
			$sys_twitter_username = strip_tags($instance['sys_twitter_username']);
			$sys_twitter_limits = strip_tags($instance['sys_twitter_limits']);?>
			<!-- Twitter Widget Inputs -->
			<p>
				<label for="<?php echo $this->get_field_id( 'sys_twitter_title' ); ?>"><?php _e('Twitter Title:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'sys_twitter_title' ); ?>" name="<?php echo $this->get_field_name( 'sys_twitter_title' ); ?>" value="<?php echo $title; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sys_twitter_username' ); ?>"><?php _e('Twitter Username:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'sys_twitter_username' ); ?>" type="text" name="<?php echo $this->get_field_name( 'sys_twitter_username' ); ?>" value="<?php echo $sys_twitter_username; ?>" style="width:100%;" />
			</p>
						<p>
				<label for="<?php echo $this->get_field_id( 'sys_twitter_consumerkey' ); ?>"><?php _e('Twitter Consumer key:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'sys_twitter_consumerkey' ); ?>" type="text" name="<?php echo $this->get_field_name( 'sys_twitter_consumerkey' ); ?>" value="<?php echo $sys_twitter_consumerkey; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sys_twitter_consumersecret' ); ?>"><?php _e('Twitter Consumer Secret:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'sys_twitter_consumersecret' ); ?>" type="text" name="<?php echo $this->get_field_name( 'sys_twitter_consumersecret' ); ?>" value="<?php echo $sys_twitter_consumersecret; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sys_twitter_accesstoken' ); ?>"><?php _e('Twitter Access Token:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'sys_twitter_accesstoken' ); ?>" type="text" name="<?php echo $this->get_field_name( 'sys_twitter_accesstoken' ); ?>" value="<?php echo $sys_twitter_accesstoken; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sys_twitter_accesstokensecret' ); ?>"><?php _e('Twitter Access Token secret:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'sys_twitter_accesstokensecret' ); ?>" type="text" name="<?php echo $this->get_field_name( 'sys_twitter_accesstokensecret' ); ?>" value="<?php echo $sys_twitter_accesstokensecret; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sys_twitter_limits' ); ?>"><?php _e('Twitter Limits:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'sys_twitter_limits' ); ?>" type="text" name="<?php echo $this->get_field_name( 'sys_twitter_limits' ); ?>" value="<?php echo $sys_twitter_limits; ?>" style="width:100%;" />
			</p>
		<?php
		}
	} 
	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'sys_twitter_widgets' );
?>