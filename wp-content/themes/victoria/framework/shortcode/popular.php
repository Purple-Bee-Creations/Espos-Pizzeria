<?php

	// P O P U L A R   P O S T S 
	//--------------------------------------------------------
	function sys_popular_posts ($atts, $content = null) {
		extract(shortcode_atts(array(
			'limit'	=> '2',
			'thumb'	=>'true',
		), $atts));

		$out = '<div class="widget_postslist sc">';
		$out .= '<ul>';

		global $wpdb,$post;
		
		$popular_limits=$limit;
		$show_pass_post = false; $duration='';
		$request = "SELECT ID, post_title,post_date, COUNT($wpdb->comments.comment_post_ID) AS 'comment_count' FROM $wpdb->posts, $wpdb->comments";
		$request .= " WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish'";
		if(!$show_pass_post) $request .= " AND post_password =''";
		if($duration !="") {
			$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
		}
		$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $popular_limits";
		$popular_posts = $wpdb->get_results($request);

		foreach($popular_posts as $post) {
			if($post) {
			$pid = get_post_thumbnail_id($post->ID); 
			$ar = wp_get_attachment_image_src( $pid , array(9999,9999) );

				$out .= "<li>";
				$popular_image = get_post_meta($post->ID, 'post_image', true);
				$post_date = $post->post_date;
				$post_date = mysql2date('F j, Y', $post_date, false);
				if($thumb == "true"){
					$out .= '<figure><a class="thumb" href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">';
					$thumbs = get_post_thumbnail_id($post->ID);
					if($thumbs){
						$out.=atp_resize('',$ar['0'],'50','50','','');
						
					}else{
						$out .= '<img width="50" height="50" class="img_border" src="'. THEME_URI.'/images/no-image.jpg" title="'.$post->post_title.'"  alt=""  />';
					}
					$out .= '</a></figure>';
				}
				$out .= '<span class="title"><a  href="' .get_permalink($post->ID). '" rel="bookmark">' .$post->post_title. '</a></span><br/>';
				$out .=	'<span class="date">'.$post_date.'</span>';
				$out .="</li>";
			}
		}
		$out .= '</ul></div>';
		
		return $out;
		wp_reset_query();
	}
	add_shortcode('popularpost','sys_popular_posts');
?>