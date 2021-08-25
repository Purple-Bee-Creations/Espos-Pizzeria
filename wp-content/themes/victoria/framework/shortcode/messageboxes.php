<?php

	// M E S S A G E   B O X 
	//--------------------------------------------------------
	function sys_message_box($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'align'	=> false,
		), $atts));
		
		$align = $align?' '.$align:'';
		return '<span class="' . $code . $align . ' clearfix">' . do_shortcode($content) . '</span>';
	}
	add_shortcode('error','sys_message_box');
	add_shortcode('info','sys_message_box');
	add_shortcode('alert','sys_message_box');
	add_shortcode('success','sys_message_box');
	add_shortcode('download','sys_message_box');

	// N O T E   B O X 
	//--------------------------------------------------------
	function sys_notes($atts, $content = null) {
		extract(shortcode_atts(array(
			'align' => false,
			'title' => '',
			'width' => false,
		), $atts));
		
		$align = $align?' align'.$align:'';
		$width = $width?' style="width:'.$width.'"':'';
		
		if(!empty($title)){
			$title = '<h4 class="notes_title">'.$title.'</h4>';
		}
		return '<div class="notes' . $align . '"'.$width.'><div class="notes_content">'.$title .do_shortcode($content). '</div></div>';
	}
	add_shortcode('note','sys_notes');
?>