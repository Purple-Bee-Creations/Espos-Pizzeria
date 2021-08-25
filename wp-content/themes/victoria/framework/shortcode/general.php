<?php

	// G E N E R A L   S H O R T C O D E S
	//--------------------------------------------------------
	
	// D I V I D E R   
	//--------------------------------------------------------
	function sys_divider( $atts, $content = null ) {
		return '<div class="divider"><figure><img src="'.THEME_URI.'/images/separator.png"></figure></div>';
	}
	add_shortcode('divider', 'sys_divider');
	
	// D I V I D E R   T O P
	//--------------------------------------------------------
	function sys_divider_top($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		), $atts));
		return '<div class="divider_top back-top"><a href="#top"><span>'.do_shortcode($content).'</span></a></div>';
	}
	add_shortcode('divider_top', 'sys_divider_top');

	// D I V I D E R   S P A C E
	//--------------------------------------------------------
	function sys_divider_space( $atts, $content = null ) {
		return '<div class="divider_space"></div>';
	}
	add_shortcode('divider_space', 'sys_divider_space');

	// D I V I D E R   L I N E 
	//--------------------------------------------------------
	function sys_divider_line( $atts, $content = null ) {
		return '<div class="divider_line"></div>';
	}
	add_shortcode('divider_line', 'sys_divider_line');

	// D I V I D E R   S E P A R A T O R
	//--------------------------------------------------------
	function sys_separator( $atts, $content = null ) {
		return '<div class="separator"></div>';
	}
	add_shortcode('separator', 'sys_separator');

	// C L E A R 
	//--------------------------------------------------------
	function sys_clear( $atts, $content = null ) {
		return '<div class="clear"></div>';
	}
	add_shortcode('clear', 'sys_clear');

	// A L I G N M E N T
	//--------------------------------------------------------
	function sys_align($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'position' => '',
		), $atts));
		return '<div class="'.$position.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode('align', 'sys_align');

	// H I G H L I G H T
	//--------------------------------------------------------
	function sys_highlight($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'bgcolor'	=> '',
			'textcolor'	=> '',
		), $atts));
		
		$bgcolor = $bgcolor?'background-color:'.$bgcolor.';':'';
		$textcolor = $textcolor?'color:'.$textcolor.';':'';
		if( !empty($textcolor) || !empty($bgcolor)){
			$extras = ' style="'.$bgcolor.$textcolor.'"';
		}else{
			$extras = '';
		}
		return '<span class="highlight" '.$extras.'>'.do_shortcode($content).'</span>';
	}
	add_shortcode('highlight', 'sys_highlight');

	// F A N C Y   H E A D I N G 
	//--------------------------------------------------------
	function sys_fancy_heading($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'bgcolor'	=> '',
			'textcolor'	=> '',
		), $atts));
		
		$bgcolor = $bgcolor?'background-color:'.$bgcolor.';':'';
		$textcolor = $textcolor?'color:'.$textcolor.';':'';
		if( !empty($textcolor) || !empty($bgcolor)){
			$extras = ' style="'.$bgcolor.$textcolor.'"';
		}else{
			$extras = '';
		}
		return '<h6 class="fancyheading"><span '.$extras.'>'.do_shortcode($content).'</span></h6>';
	}
	add_shortcode('fancyheading', 'sys_fancy_heading');
	
	// D R O P C A P 
	//--------------------------------------------------------
	function sys_dropcap_1($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'color'	=> '',
		), $atts));
		if($color){
			$color = ' '.$color;
		}
		return '<span class="' . $code.$color . '" '.isset($bgcolor).'>' . do_shortcode($content) . '</span>';
	}
	add_shortcode('dropcap1', 'sys_dropcap_1');
	
	// D R O P C A P   2
	//--------------------------------------------------------
	function sys_dropcap_2($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'bgcolor'	=> '',
		), $atts));
		$bgcolor = $bgcolor?' style="background-color:'.$bgcolor.'"':'';
		if($bgcolor){
			$bgcolor = ' '.$bgcolor;
		}
		return '<span class="' . $code . '" '.$bgcolor.'>' . do_shortcode($content) . '</span>';
	}
	add_shortcode('dropcap2', 'sys_dropcap_2');
	
	// D R O P C A P   3 
	//--------------------------------------------------------
	function sys_dropcap_3($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'color'	=> '',
		), $atts));
	
		$color = $color?' style="color:'.$color.'"':'';
		if($color){
			$color = ' '.$color;
		}
		return '<span class="' . $code . '" '.$color.'>' . do_shortcode($content) . '</span>';
	}
	add_shortcode('dropcap3', 'sys_dropcap_3');
	
	// B L O C K Q U O T E
	//--------------------------------------------------------
	function sys_blockquote($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'align'	=> false,
			'cite'	=> false,
			'citelink'	=> false,
			'width'	=> '',
		), $atts));
		$citelinkurl = $citelink ? ', <span class="citelink"><a href="'.esc_url($citelink).'" target="_blank">'.$citelink.'</a></span>' : '';
		return '<blockquote' . ($align ? ' class="align' . $align . '"' : '').($width ? ' style="width:' . $width . '"' : '') .'><p>' . do_shortcode($content) .''. ($cite ? '<cite>' . $cite.$citelinkurl. '</cite>' : '</p>') . '</blockquote>';
	}
	add_shortcode('blockquote', 'sys_blockquote');

	// F A N C Y   T A B L E 
	//--------------------------------------------------------
	function sys_fancy_table( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'width'	=> '',
			'align'	=> false,
		), $atts));
		
		$width = $width?' style="width:'.$width.'"':'';
		if($width){
			$width = ' '.$width;
		}
		if($align){
			$align = ' align'.$align;
		}
		$content = str_replace('<table>', '<table class="fancy_table '.$align.'" '.$width.'>', do_shortcode($content));
		return $content;
	}
	add_shortcode('fancytable', 'sys_fancy_table');
	
	// L I S T   S T Y L E S 
	//--------------------------------------------------------
	function sys_list($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'style'	=> false,
			'color'	=> '',
			'cols'	=> '',
		), $atts));
		
		if($style){
			$style = 'list-'.$style;
		}
		return str_replace('<ul>', '<ul class="'.$style.' '.$cols.' '.$color.'">', do_shortcode($content));
	}
	add_shortcode('list', 'sys_list');
	
	// I C O N S 
	//--------------------------------------------------------
	function sys_icons($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'style'		=> false,
			'color'		=> '',
			'href'		=> '',
			'target'	=> '_self',
		), $atts));
		if($style){
			$style = 'icon-'.$style;
		}
		if($href){
			$out ='<a class="'.$style.' '.$color.'" href="'.esc_url($href).'" target="'.$target.'">'.do_shortcode($content).'</a>';
		}else {
			$out ='<span class="'.$style.' '.$color.'">'.do_shortcode($content).'</span>';
		}
		return $out;
	}
	add_shortcode('icon', 'sys_icons');
?>