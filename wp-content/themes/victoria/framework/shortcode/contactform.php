<?php

	// C O N T A C T   F O R M 
	//--------------------------------------------------------
	function atp_contact_form( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'emailid'      => '',
			'successmessage'      => '',
		), $atts));
	
		$name_str	= __('Name','THEME_FRONT_SITE');
		$email_str	= __('E-mail','THEME_FRONT_SITE');

		function rand_string( $length ) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$size = strlen( $chars );
			$str='';
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[ rand( 0, $size - 1 ) ];
			}
			return $str;
		}
		
		$my_string		= rand_string( 5 );
		$captcha_str	= __('Captcha','ATP_ADMIN_SITE');
		$submit_str		= __('Submit','ATP_ADMIN_SITE');

		add_action('wp_footer', 'atpform_script');

		global $wpdb;

		$out = '<form action="'.THEME_URI.'/lib/includes/submitform.php"  method="post">';
		$out .= '<div id="response"></div>';
		$out .= '<div class="syswidget sysform sc" id="validate_form">';
		$out .= '<p><input type="text" name="contact_name" id="contact_name" class="txtfield input_medium" value="'.__('Name', 'THEME_FRONT_SITE').'"  onblur="if (this.value == \'\') {this.value = \'' . __('Name', 'THEME_FRONT_SITE') . '\';}" onfocus="if (this.value == \'' . __('Name', 'THEME_FRONT_SITE') . '\') {this.value = \'\';}"></p>';
		$out .= '<p><input type="text" name="contact_email" id="contact_email" class="txtfield input_medium" value="'.__('E-mail', 'THEME_FRONT_SITE').'"  onblur="if (this.value == \'\') {this.value = \'' . __('E-mail', 'THEME_FRONT_SITE') . '\';}" onfocus="if (this.value == \'' . __('E-mail', 'THEME_FRONT_SITE') . '\') {this.value = \'\';}"></p>';
		$out .= '<p><textarea name="contactcomment" id="contactcomment" class="required input_medium" value="'.__('Message', 'THEME_FRONT').'" onfocus="if(this.value == \''.__('Message', 'THEME_FRONT_SITE').'\') {this.value = \'\'}" onblur="if (this.value == \'\') {this.value = \''.__('Message', 'THEME_FRONT_SITE').'\'}">Message</textarea></p>';
		$out .= '<p><input type="text" name="contact_captcha" id="contact_captcha" class="txtfield input_medium" value="'.__('Captcha', 'THEME_FRONT_SITE').'"  onblur="if (this.value == \'\') {this.value = \'' . __('Captcha', 'THEME_FRONT_SITE') . '\';}" onfocus="if (this.value == \'' . __('Captcha', 'THEME_FRONT_SITE') . '\') {this.value = \'\';}"></p>';
		$out .= '<p><label><span class="atpcaptcha">'.$my_string.'</span> - case sensitive</label></p>';
		$out .= '<input type="hidden" name="contact_ccorrect" id="contact_ccorrect"  value="'.$my_string.'">';
		$out .= '<p><button type="button" value="submit" name="contactsubmit" id="contactsubmit" class="button small gray"><span>'.__('Submit','THEME_FRONT_SITE').'</span></button></p>';
		//$out .= '<p><input type="button" value="submit" name="contactsubmit" id="contactsubmit" class="button small gray"></p>';
		$out .= '<p><input type="hidden" name="contact_widgetemail" id="contact_widgetemail"  value="'.$emailid.'"></p>';
		$out .= '<p><input type="hidden" name="contact_success"  id="contact_success" value="'.$successmessage.'"></p>';
		$out .='</div>';
		$out .= '</form>';
		return $out;
	}
	add_shortcode('contactform', 'atp_contact_form');

	function atpform_script() {
		wp_print_scripts('atp-form');
	}
?>