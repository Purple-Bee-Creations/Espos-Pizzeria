<?php

	// B U T T O N 
	//--------------------------------------------------------
	function sys_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'id'			=> '',
			'class'			=> '',
			'link'			=> '',
			'linktarget'	=> '',
			'fullwidth'		=> '',
			'color'			=> '',
			'align'			=> '',
			'bgcolor'		=> '',
			'hoverbgcolor'	=> '',
			'hovertextcolor'=> '',
			'textcolor'		=> '',
			'size'			=> 'medium',
			'width'			=> '',
		), $atts));

		$hoverbgcolor	= $hoverbgcolor 	? ($bgcolor ? ' btn-bg="'.$bgcolor.'"':'').' btn-hoverBg="'.$hoverbgcolor.'"':'';
		$hovertextcolor	= $hovertextcolor	? ($textcolor ? ' btn-color="'.$textcolor.'"':'').' btn-hoverColor="'.$hovertextcolor.'"':'';
		$bgcolor 		= $bgcolor 			? ' style="background-color:'.$bgcolor.'"':'';
		$color 			= $color			? ' '.$color:'';
		$id 			= $id 				? ' id="'.$id.'"':'';
		$class 			= $class 			? ' '.$class:'';
		$link 			= $link 			? ' href="'.esc_url($link).'"':'';
		$linktarget 	= $linktarget 		? ' target="'.$linktarget.'"':'';
		$textcolor 		= $textcolor 		? 'color:'.$textcolor.';':'';
		$width 			= $width 			? 'width:'.$width.';':'';

		$extras =	($textcolor!==''||$width!='') ? ' style="'.$textcolor.$width.'"':'';
		$button = "button";
		if($fullwidth == 'true'){
			$fullwidth = 'full';
		}else{
			$fullwidth = '';
		}

		$content = "<a $id $link $linktarget $bgcolor  $hoverbgcolor $hovertextcolor class=\"$button $align $size $fullwidth $color $class\"><span $extras>" .trim($content). "</span></a>";
		if($align === 'center'){
			return '<p class="center">'.trim($content).'</p>';
		}else {
			return trim($content);	
		}
	}
	add_shortcode('button', 'sys_button');
?>