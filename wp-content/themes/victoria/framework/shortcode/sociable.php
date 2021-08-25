<?php
	// S O C I A B L E S 
	//--------------------------------------------------------
	function sys_sociable ($atts, $content = null) {
		extract(shortcode_atts(array(
			'title'		=> ''
		), $atts));

		$out = "";
		if($title) {
			$out .= '<h3 class="widget-title">'.$title.'<span></span></h3>'; 
		}
		$out .= atp_social();
		return $out;
	}
	add_shortcode('sociable','sys_sociable');
?>