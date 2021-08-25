<?php

	// T O G G L E S L I D E R   B O X 
	//--------------------------------------------------------
	function tsbox($atts, $content = null, $code) {
		return '<div class="'.$code.'">' . do_shortcode(trim($content)) . '</div>';
	}
	function tsbox_last($atts, $content = null, $code) {
		return '<div class="'.str_replace('_last','',$code).' last">' . do_shortcode(trim($content)) . '</div>';
	}

	add_shortcode('tsbox', 'tsbox');
	add_shortcode('tsbox_last', 'tsbox_last');
	
	
	function sys_plan_front( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'bgcolor'	=> '',
			'ribbon'	=> '',
			'color'		=> '',
			), $atts));
	
		$bgcolor = $bgcolor?'background-color:'.$bgcolor.';':'';
		$color = $color?' style="color:'.$color.'"':'';

		if(!empty($bgcolor)){
			$extras = ' style="'.$bgcolor.'"';
		}else{
			$extras = '';
		}

		$out.='<div class="plan_box" '.$extras.'>';
		if ($ribbon) { 
			$rimage = '<div class="ribbon"><img src="'.THEME_URI.'/images/ribbons/'.$ribbon.'.png" alt=""/></div>';
		}
		$out.='<div class="plan_info" '.$extras.'>';
		if ($ribbon) { 	$out.=$rimage;}
			$out.='<div class="content">';	
		$out.= do_shortcode($content);
		$out.='</div>';
		$out.='</div>';
		return $out;
	}
	add_shortcode('plan_front', 'sys_plan_front');

	// T O G G L E S L I D E R   H O V E R   B O X 
	//--------------------------------------------------------
	function sys_plan_hover( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title'		=> '',
			'bgcolor'	=> '',
			'price'		=> '',	
			'tagline'	=> '',
		), $atts));

		$bgcolor = $bgcolor?'background-color:'.$bgcolor.';':'';
		if(!empty($bgcolor)){
			$extras = ' style="'.$bgcolor.$bordercolor.'"';
		}else{
			$extras = '';
		}
		$out.='<div class="plan_details" '.$extras.'>';
		$out.='<div class="content">';
    	if($title){
			$out .= '<h2 class="name">' .$title. '</h2>';
		}
		if($tagline){
			$out .= '<h4>' .$tagline. '</h4>';
		}
		if($price){
			$out .= '<span class="tagline">' .$tagline. '</span>';
		}
		$out .= do_shortcode($content);
		$out .='</div>';
		$out .='</div>';
		$out .='</div>';
		return $out;
	}
	add_shortcode('plan_hover', 'sys_plan_hover');
?>