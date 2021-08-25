<?php

	// R E C E N T   P O S T S 
	//--------------------------------------------------------
	function sys_recent_posts ($atts, $content = null) {
		extract(shortcode_atts(array(
			'limit'		=> '2',
			'cat_id'	=>'5',
			'thumb'		=>'true',
		), $atts));

		$out= '<div class="widget_postslist sc">';
		$out .= '<ul>';

		global $wpdb,$post;
		
		$myposts = get_posts("numberposts=$limit&offset=0&cat=$cat_id");
		foreach($myposts as $post) {
			$out .= "<li>";
			$post_date = $post->post_date;
			$post_date = mysql2date('F j, Y', $post_date, false);
			if($thumb == "true"){
				$out .= '<figure><a class="thumb" href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">';
				$thumbs = get_post_thumbnail_id($post->ID);
				$pid = get_post_thumbnail_id($post->ID); 
			$ar = wp_get_attachment_image_src( $pid , array(9999,9999) );
				if ($thumbs){	
					$out.=atp_resize('',$ar['0'],'50','50','','');
				}else{
					$out .= '<img class="img_border" src="'.THEME_URI.'/images/no-image.jpg'.'"  alt="' .$post->post_title. '" />';	
				}
				$out .= '</a></figure>';
			}
			$out .= '<span class="title"><a  href="' .get_permalink($post->ID). '" rel="bookmark">' .$post->post_title. '</a></span><br/>';
			$out .=	'<span class="wpldate">'.$post_date.'</span>';	
			$out .= '</li>';
		}
		$out .= '</ul></div>';
		
		return $out;
		wp_reset_query();
	}
	add_shortcode('recentpost','sys_recent_posts');
?>