<?php
	// I M A G E  
	//--------------------------------------------------------
	function sys_image($atts, $content = null) {
		extract(shortcode_atts(array(
			'link'		=> '#',
			'lightbox'	=> 'false',
			'title'		=> '',
			'class'		=> '',
			'align'		=> false,
			'width'		=> false,
			'height'	=> false,
			'caption'	=>'',
			'target'	=>'',
			'src'		=> '',
		), $atts));
		
		
		
		if(!$width||!$height){
			if(!$width){
				$width = '';
			}
			if(!$height){
				$height = '';
			}
		}
		
		$content= atp_resize('',$src,$width,$height,'',$title);
		$no_link = $rel = $out ='';
		if($lightbox == 'true'){
			$rel = ' rel="prettyPhoto"';
			$rel .= ' class="lightbox"';
			$link = $link;
		}else{
			if($link == '#'){$no_link = 'image_no_link';}
			$target = ' target="'.$target.'"';
		}
		if($lightbox=="true") { if($link=='#') { $link=$src; }  }
	
		
	
		if($lightbox=="true") {
			//$out ='<div style="width:'.$width.'; '.((empty($height))?'':'height:'.$height.'').'">';
			$out.='<div class="thumb '.($align?' align'.$align:'').'" ><a  '.$target.''.$rel.' '.($no_link? ' class="'.$no_link.'"':'').' title="'.$title.'" href="'.$src.'">' . $content;
			if($caption){
			$out.='<span class="image_caption">'.$caption.'</span>';

			}
			$out.='</a></div>';
			//$out.='</div>';
		} else {
			//$out ='<div class="'.($align?' align'.$align:'').'" style="width:'.$width.'; '.((empty($height))?'':'height:'.$height.'').'">';
			$out.='<div class="thumb '.($align?' align'.$align:'').'" ><a  title="'.$title.'" href="'.$link.'">' . $content;
			if($caption){
			$out.='<span class="image_caption">'.$caption.'</span>';

			}
		$out.='</a></div>';
			//$out.='</div>';
		}
		
		return $out;
	}
	add_shortcode('image', 'sys_image');

	// P H O T O F R A M E
	//--------------------------------------------------------
	function sys_photoframe( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'alt'	=> '',
			'align'	=> '',
			'class'	=> '',
			'src'	=> '',
			'width'	=> '150',
			'height'=> '',
		), $atts));
		
		if($width != '' ) {
			//$framewidth = $width ? 'style="width:'.$width.'px"':'';
		}
	
	
		$out = '<div class="photoframe '.($align?' align'.$align:'').'"><figure>';
		$out .= atp_resize('',$src,$width,$height,'imgborder',$alt);
		$out .= '</figure></div>';
		
		return $out;
	}
	add_shortcode('photoframe', 'sys_photoframe');
	?>