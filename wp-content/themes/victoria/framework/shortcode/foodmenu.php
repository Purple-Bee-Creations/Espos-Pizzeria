<?php

	/**
	 * FOOD MENU
	 */

	function iva_menutype_menuspecial ($atts, $content = null,$code) {	
		global $wp_filter, $post, $wpdb;

		$nopage_str = __('Sorry but we could not find what you were looking for. But don\'\t give up, keep at it','THEME_FRONT_SITE');
		$hover_class = ''; //stores class name of the postlink based on postlinktype(image/video/link)

		$the_content_filter = $wp_filter['the_content'];
		extract( shortcode_atts( array(
			'cats'		=> '',
			'limit'	    => '1000',
			'title'		=> '',
			'titlelink'	=> 'true',
			'pagination'=> '',
			'charlimits'=> '50',
			'columns'	=> '',
			'desc'		=> '',
			'thumb'		=> 'true'
		), $atts));

		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

		$query = array(
			'post_type'		=> 'menus',
			'posts_per_page'=> $limit, 
			'taxonomy'		=> 'menutype', 
			'term'			=> $cats, 
			'paged'			=> $paged,
			'order'			=> 'DESC'
		);

		query_posts($query); //get the results
		
		if( $columns === 'true' ) {
			$columns = 'twocolumn';
		} else {
			$columns = '';
		}

		//If have posts, loop through posts
		$out = '<div class="menulist_sc '.$columns.'">';

		if( have_posts() ) : while( have_posts() ) : the_post(); 

			$post_title	= get_the_title( get_the_id() );
			$permalink	= get_permalink( get_the_id() );
			$menu_desc	= get_post_meta( $post->ID, 'item_desc', TRUE );
			$img_src = atp_resize( $post->ID, '', $width, $height, '', '' );
			$width = $height = '80';
			$fullimg	= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false, '' );
			
			$out .= '<section class="menus menulist">';
			$out .= '<div class="menuthumb">';
		
			if( $thumb == 'true' ){
				if ( has_post_thumbnail() ) {
				$out .= '<div class="menuimg">';
				$out .= '<a href="'.$fullimg['0'].'" class="lightbox" rel="prettyPhoto[mixed]">';
				$out .= atp_resize( $post->ID, '', $width, $height, '', '' );
				$out .= '</a>';
				$out .= '</div>';
				}
			}
			
			$moreprices = get_post_meta(get_the_id(),'moreprice',true);
			if(get_post_meta($post->ID,'price',TRUE)) {
				$out.= '<div class="pricebox">';
				$out .= '<span class="price">'.get_post_meta($post->ID, 'price', TRUE).'</span>';
				if( is_array( $moreprices ) ){
					foreach( $moreprices as $itemprice ) {
						$out .= '<span class="price">'.$itemprice.'</span>';
					}
				}
				$out.= '</div>';
			}

			$out .= '</div>';
			
			$out.='<div class="menu-info">';
			if($title == "true") {
				$out .= '<h4 class="menu-title">';
				if($titlelink == "true") {
					$out .= '<a href="' .$permalink. '">'. $post_title. '</a>';
				}else {
					$out .= $post_title;
				}
				$out.='</h4>';
			}
			if($desc=="true"){
				if($menu_desc !=""){	
					$out .= wpautop(substr($menu_desc,0,$charlimits));
				}else{
					$out .= wp_html_excerpt(get_the_excerpt(''),$charlimits);
				}
			}
			$out.= '</div>';
			
			
		
			
			ob_start();
			if( function_exists('the_ratings') ) { $out .= the_ratings(); }
			$out .= ob_get_contents();
			ob_end_clean();

			$out .= '</section>';

		endwhile;

		else :

		$out .= '<h2>'.$nopage_str.'</h2>';

		endif; 

		$out .= '</div>';
		$out .= '<div class="clear"></div>';
		if( $pagination == "true" ){
			$out .= atpmenutypepagination(); 
		} 
		wp_reset_query();
		$wp_filter['the_content'] = $the_content_filter;

		return $out;

	}

	add_shortcode('foodmenu','iva_menutype_menuspecial'); //add shortcode

?>