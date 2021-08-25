<?php

	/**
	 * Todays Specials
	 */

	function menutype_todayspecial ($atts, $content = null,$code) {
	
		global $wp_filter, $post, $wpdb, $wp_query, $permalink ,$post_title , $post_date, $paged;

		//variables
		$nopage_str = __('Sorry but we could not find what you were looking for. But don\'\t give up, keep at it','THEME_FRONT_SITE');
		$hover_class = ''; //stores class name of the postlink based on postlinktype(image/video/link)

		$the_content_filter= $wp_filter['the_content'];
		extract(shortcode_atts(array(
			'tags'		=> '',
			'limit'	    => '4',
			'readmoretext'	=> '',
			'title'		=> '',
			'pagination' => '',
			'charlimits' => '50',
			'readmore' => '',
			'imgwidth'	=> '100',
			'imgheight'	=> '100',
			'desc'		=> ''
			
		), $atts));

		$out='<div class="today_special">';

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;  
		}

		$query = array(
			'post_type'			=> 'menus', 
			'posts_per_page'	=> $limit, 
			'tag' => $tags,
			'paged'				=> $paged,
			'order'				=> 'DESC'
		);

		query_posts($query); //get the results

		//if have posts, loop through posts
		if(have_posts()) : while(have_posts()) : the_post(); 
			$out .= '<div class="specialslist"><section class="clearfix">';
			$post_title = get_the_title(get_the_id());
			$permalink = get_permalink(get_the_id());
			$width = $height = '80';
			$fullimg = get_post_meta($post->ID,'fullimg',TRUE);
			$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full', false, '' );
			$img_src= ($fullimg!='') ? $fullimg :$src['0'];

			//if post has thumbnail,display in lightbox and hovertype icons
			if (has_post_thumbnail()) {
				$out .= '<div class="menuimg alignleft">';
				$out .= atp_resize($post->ID,'',$width,$height,'image','');
				$out .= '</div>';	
			}
			if($title == "true") {
				$out .= '<h5><a href="' .$permalink. '">'. $post_title. '</a></h5>'; 
			}
			if($desc=="true"){	
				$out .= '<p>'.wp_html_excerpt(get_the_excerpt(''),$charlimits).'</p>';
			}
			if($readmore == "true"){ 
				$out .= '<p class="textright"><a href="'.$permalink.'">'.$readmoretext.'</a></p>';
			}
			$out .= '</section></div>';
		endwhile;
		else :
		$out .= '<h2>'.$nopage_str.'</h2>';
		endif; 

		$out .= '</div>';
		
		if($pagination == "true"){ 
			$out .= atpmenutypepagination(); 
		} 
		wp_reset_query();
		$wp_filter['the_content'] = $the_content_filter;
		
		return $out;
		
	}//end of function

	add_shortcode('todayspecial','menutype_todayspecial'); //add shortcode

	/***
	 * atpmenutypepagination - displays pagination 
	 * @param - int range determines a current page range and displays.
	 * @param - int pages 
	 * @return - string pagination
	 * 
	 */
	function atpmenutypepagination($range =2,$pages = '') { 
		
		global $wp_query;
		$out='';
		$showitems = ($range * 2)+1;       

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;  
		}

		if(empty($paged)) $paged = 1;
		if($pages == ''){
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1; 
			}     
		}   

		//if pages more than one
		if(1 != $pages){
			$out.='<div class="pagination wp-pagenavi">
					<span class="pages extend">
						Page '.$paged.'  of  '.$pages.
					'</span>';
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) $out.='<a href="'.get_pagenum_link(1).'">&laquo;</a>';
			if($paged > 1 && $showitems < $pages) $out.='<a href="'.get_pagenum_link($paged - 1).'">&lsaquo;</a>';
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))  {
					$out.=($paged == $i)? '<span class="current">'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a>';
				}
			}

			if ($paged < $pages && $showitems < $pages) $out.='<a href="'.get_pagenum_link($paged + 1).'">&rsaquo;</a>';  
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $out.='<a href="'.get_pagenum_link($pages).'">&raquo;</a>';
			$out.= '</div>';
		}
		return $out;
	}//end of function atpmenutypepagination
?>