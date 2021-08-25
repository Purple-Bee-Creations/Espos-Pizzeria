<?php

	// F A N C Y B O X 
	//--------------------------------------------------------
	function sys_fancy_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title'			=> '',
			'titlecolor'	=> '',
			'titlebgcolor'	=> '',
			'textcolor'		=> '',
			'bordercolor'	=> '',
			'boxbgcolor'	=>'',
			'ribbon'		=> '',
		), $atts));
		
		$titlebgcolor = $titlebgcolor ? 'background-color:'.$titlebgcolor.';' : '';
		$titlecolor	= $titlecolor ? 'color:'.$titlecolor.';' : '';
		$boxbgcolor	= $boxbgcolor ? 'background-color:'.$boxbgcolor.';' : '';
		$bordercolor = $bordercolor ? 'border-color:'.$bordercolor.';' : '';

		if( !empty($boxbgcolor) || !empty($bordercolor)){
			$boxextras = ' style="'.$boxbgcolor.$bordercolor.'"';
		}else{
			$boxextras = '';
		}

		if( !empty($titlebgcolor) || !empty($titlecolor)){
			$extras = ' style="'.$titlebgcolor.$titlecolor.'"';
		}else{
			$extras = '';
		}

		if ($ribbon) {
			$home = home_url();
			$rimage = '<div class="ribbon"><img src="'.THEME_URI.'/images/ribbons/'.$ribbon.'.png" alt=""/></div>';
		}

		$out = '<div class="fancybox" '.$boxextras.'>';
		if(isset($rimage)) {
			$out .= ''.$rimage.'';
		}
		if($title){
			$out .= '<h2 class="fancytitle" '.$extras.'>' .$title. '</h2>';
		}
		
		$out .= '<div class="boxcontent">';
		$out .= do_shortcode($content) .'</div></div>';
		return $out;
	}
	add_shortcode('fancy_box', 'sys_fancy_box');

	// M I N I M A L   B O X 
	//--------------------------------------------------------
	function sys_minimal_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title'			=> '',
			'ribbon'		=> '',
			'titlecolor'	=> '',
			'titlebgcolor'	=> '',
		), $atts));

		$titlecolor = $titlecolor?' style="color:'.$titlecolor.'"':'';
		$titlebgcolor = $titlebgcolor?' style="background-color:'.$titlebgcolor.'"':'';

		if ($ribbon) {
			$home = home_url();
			$rimage = '<div class="ribbon"><img src="'.THEME_URI.'/images/ribbons/'.$ribbon.'.png" alt=""/></div>';
		}

		$out= '<div class="minimalbox" ><div class="minimaltitle" '.$titlebgcolor.'>';
		if(isset($rimage)) {
			$out .= ''.$rimage.'';
		}
		if($title){
			$out .= '<h6 '.$titlecolor.'>' .$title. '</h6>';
		}
		
		$out .= '</div><div class="boxcontent">';
		$out .= do_shortcode($content) .'</div></div>';
		return $out;
	}
	add_shortcode('minimal_box', 'sys_minimal_box');
	/**
	 * FRAMED BOX
	 */
	function sys_framed_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'bgcolor'		=> '',
			'bordercolor'	=> '',
			'padding'		=> '',
			'width'			=> '',
			'height'		=> '',
			'ribbon'		=> '',
		), $atts));

		$bgcolor = $bgcolor?'background-color:'.$bgcolor.';':'';
		$bordercolor = $bordercolor?'border-color:'.$bordercolor.';':'';
		$width = $width?'width:'.$width.';':'';
		$height = $height?'height:'.$height.';':'';
		$padding = $padding?' style="padding:'.$padding.'"':'';

		if( !empty($bordercolor) || !empty($bgcolor) || !empty($width) || !empty($height)){
			$extras = ' style="'.$bgcolor.$bordercolor.$width.$height.'"';
		}else{
			$extras = '';
		}

		if ($ribbon) {
			$home = home_url();
			$rimage = '<div class="ribbon"><img src="'.get_template_directory_uri().'/images/ribbons/'.$ribbon.'.png" alt=""/></div>';
		} 

		$out = '<div class="framedbox" '.$extras.'>';
		if(isset($rimage)) {$out .= ''.$rimage.''; }
		$out .= '<div class="boxcontent" '.$padding.'>';
		$out .= do_shortcode($content);
		$out .= "</div>";
		$out .= "</div>";
		
		return $out;
	}
	add_shortcode('framed_box', 'sys_framed_box'); 