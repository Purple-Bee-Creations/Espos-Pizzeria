<?php
	// L I G H T B O X
	//--------------------------------------------------------
	function sys_lightbox( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'href'		=> '',
			'width'		=>'',
			'height'	=>'',
			'title'		=>'',
			'rel'		=>'prettyPhoto[mixed]',
			'inline'	=>'',
			'inlineid'	=>'',
			'inlinehtml'=>'',
			'iframe'	=>'',
			'autoresize'=>'',
		), $atts));
		$autosize = $imgresize = '';
		if($width && $height) {
			$imgresize=($width?'?lightbox[width]='.$width.'':'').($height?'&lightbox[height]='.$height.'':'');
		}
		if($iframe=="true") {
			$imgresize.=($iframe?'&lightbox[iframe]='.$iframe.'':'');
		}
		if($autoresize=="true") {
			$autosize=($autoresize?'&lightbox[autoresize]='.$autoresize.'':'');
		}
		
		return '<a title="'.$title.'" href="'.$href.$autosize.($imgresize).'"  '.($rel?' rel="'.$rel.'"':'').' '.(($iframe==true)?' iframe="true"':'').' class="lightbox">'.do_shortcode($content).'</a>';
	}
	add_shortcode('lightbox', 'sys_lightbox');
?>