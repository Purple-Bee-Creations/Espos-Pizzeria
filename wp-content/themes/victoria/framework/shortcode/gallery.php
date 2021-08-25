<?php

	// G A L L E R I A 
	//--------------------------------------------------------
	function sys_galleria($atts, $content = null) {
		extract(shortcode_atts(array(
			'id'		=> '1',
			'width'		=> '600',
			'height'	=>'450',
			'autoplay'	=> '4000',
			'transition'=> 'fade',
		), $atts));
		
		wp_print_scripts('atp-jgalleria');
		wp_print_scripts('atp-jgclassic');
		sys_gal_scripts($height,$autoplay,$width,$id);
		
		global $post;
		$pid = $post->ID;
		
		$out =  '<div class="galleria">';
		$id = intval($id);
		$attachments = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&order=ASC");	
	
		$out .=  '<div id="galleria'.$id.'" style="width:' .$width. '; height:' .$height. ';">';
		foreach ( $attachments as $id => $attachment ) {
			
			$img_title = $attachment->post_title;
			$img_desc = $attachment->post_excerpt;
			// Attachment page ID
			$att_page = get_attachment_link($id);
			// Returns array
			//$attachment=wp_get_attachment_image_src($id,$atp_size);
			$full_attachment=wp_get_attachment_image_src($attachment->ID, 'full');
			//$image = vt_resize('',$img, $width, $height,true);
			$thumbnail = wp_get_attachment_image_src($id,'thumbnail');
			$out .= '<a href="'.$full_attachment['0'].'" >';	
			$out.=atp_resize('',$thumbnail[0],'100','50','',$img_title);
			$out.='</a>';
		}
		$out .=  '</div>';
		$out .=  '</div>';
		
		return $out;
	}
	add_shortcode('galleria','sys_galleria');

	// G A L L E R I A   S C R I P T 
	//--------------------------------------------------------
	function sys_gal_scripts($height,$autoplay,$width,$id) {
		echo '<script type="text/javascript">
		/* <![CDATA[ */
		jQuery(document).ready(function($) {
			$("#galleria'.$id.'").galleria({
				transition: "fade",
				autoplay:'.$autoplay.',
				height:'.(int)$height.',
				image_crop: true,
				responsive: true
			});
		});	
		/* ]]> */
		</script>';
	}
	
	// G A L L E R I A   E X T E R N A L
	//--------------------------------------------------------
	function sys_urlgalleria($atts, $content = null) {
		extract(shortcode_atts(array(
			'id'		=> '21',
			'width'		=> '600',
			'height'	=> '450',
			'autoplay'	=> '4000',
			'transition'=> 'fade',
		), $atts));
		
		wp_print_scripts('atp-jgalleria');
		wp_print_scripts('atp-jgclassic');
		$id = rand(1,100);
		sys_urlgal_scripts($height,$autoplay,$width,$id);

		global $post;

		$out =  '<div class="galleria">';
		if(preg_match_all('!http://.+\.(?:jpe?g|png|gif)!Ui',$content,$matches)){
			$out .=  '<div id="galleria'.$id.'" style="width:' .$width. '; height:' .$height. ';">';
			foreach ($matches[0] as $images) {
				$out .= '<a href="'.$images.'" >';	
				$out .= atp_resize('',$images,'100','50','','');
				$out.='</a>';
			}
			$out .=  '</div>';
		}
		$out .=  '</div>';
		
		return $out;
	}
	add_shortcode('galleriaurl','sys_urlgalleria');
	
	// G A L L E R I A   E X T E R N A L   S C R I P T 
	//--------------------------------------------------------
	function sys_urlgal_scripts($height,$autoplay,$width,$id) {
		echo '<script type="text/javascript">
		/* <![CDATA[ */
		jQuery(document).ready(function($) {
			$("#galleria'.$id.'").galleria({
				transition: "fade",
				autoplay:'.$autoplay.',
				height:'.(int)$height.',
				image_crop: true,
				responsive: true
			});
		});	
		/* ]]> */
		</script>';
	}

	// M I N I   G A L L E R Y
	//--------------------------------------------------------
	 function sys_images_mini_gallery( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'alt'		=> '',
			'images'	=> '',
			'class'		=> '',
			'width'		=>'',
			'height'	=>'',
		), $atts));

		global $atp_timthumb;
		
		if(preg_match_all('!http://.+\.(?:jpe?g|png|gif)!Ui',$content,$matches)){
			$out='<ul class="sys_mini_gallery">';
			foreach ($matches[0] as $images) {
				$out .= '<li><div style="height:'.$height.';"><a rel="prettyPhoto[mixed]" href="' .$images. '" >';
				$out .= atp_resize('',$images,$width,$height,$class,'');
				$out .='</a></div>';
				$out .='</li>';
			}
			$out .= '</ul><div class="clear"></div>';
		}
		return $out;
	}
	add_shortcode('minigallery', 'sys_images_mini_gallery');
?>