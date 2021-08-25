<?php

	// C O N T A C T   I N F O 
	//--------------------------------------------------------
	function sys_contact_info( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'name'		=> '',
			'address'	=> '',
			'city'		=> '',
			'state'		=> '',
			'zip'		=> '',
			'phone'		=> '',
			'mobile'	=> '',
			//'link'		=> '',
			'email'		=> '',
			'website'	=>''
		), $atts));

		$emailid = '<a href="mailto:'.$email.'?Subject=ContactInfo">'.$email.'</a>';
		$websitelink = '<a href="'.esc_url($website).'" target="_blank">'.$website.'</a>';

		$out = '<div class="contactinfo sc"><ul>';
		if($name) {
		$out .= '<li class="icon-home">' .$name. '</li>';
		}
		if($address) {
		$out .= '<li class="icon-location">' .$address. '</li>';
		}
		if($state) {
		$out .= '<li>' .$state. '</li>';
		}
		if($city) {
		$out .= '<li>' .$city. '</li>';
		}
		if($zip) {
		$out .= '<li>' .$zip. '</li>';
		}	
		if($state) {
		$out .= '<li class="icon-phone">' .$phone. '</li>';
		}
		if($phone) {
		$out .= '<li class="icon-phone">' .$mobile. '</li>';
		}
		if($email) {
		$out .= '<li class="icon-email">' .$emailid. '</li>';
		}
		// if($link) {
		// $out .= '<li class="icon-monitor">' .$link. '</li>';
		// }
		if($website){
		$out.='<li class="icon-monitor"><a href="'.esc_url($website).'">'.esc_url($website).'</a></li>';
		}
		$out .= '</ul></div>';
		
		return $out;
	}
	add_shortcode('contactinfo', 'sys_contact_info');
?>