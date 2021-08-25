<?php
	/*
	 * Add new taxonomy, NOT hierarchical (like tags)
	 * taxonomy = slider
	 * object type = slide (Name of the object type for the taxonomy object)
	 */
	function my_custom_slider() {
		$labels = array(
			'name'				=> _x('Slider', 'Slider','Slider'),  
			'singular_name'		=> _x('Slider', 'post type singular name','Slider'),  
			'add_new'			=> _x('Add New','Add New','Slider'),  
			'add_new_item'		=> __('Add New Slide','Slider'),  
			'edit_item'			=> __('Edit Slide','Slider'),  
			'new_item'			=> __('New Slide','Slider'),  
			'view_item'			=> __('View Slide','Slider'),  
			'search_items'		=> __('Search Slide','Slider'),  
			'not_found'			=> __('No Slider found','Slider'),  
			'not_found_in_trash'=> __('No Slider found in Trash','Slider'),  
			'parent_item_colon'	=> ''  
		);  
		$args = array(
			'labels'			=> $labels,  
			'public'			=> true,  
			'publicly_queryable'=> true,  
			'show_ui'			=> true,  
			'query_var'			=> true,  
			'rewrite'			=> true,  
			'capability_type'	=> 'post',  
			'hierarchical'		=> true,  
			'menu_position'		=> null,
			'menu_icon'			=> THEME_URI . '/framework/admin/images/slider-icon.png',  
			'supports'			=> array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'page-attributes')
		);  
	
		register_post_type('slider',$args);  
	}
	add_action('init', 'my_custom_slider');
	add_filter('manage_edit-slider_columns', 'add_new_slider_columns');
	function add_new_slider_columns($gallery_columns) {
			$new_columns['cb'] = '<input type="checkbox" />';
			$new_columns['title'] = __('Title', 'ATP_ADMIN_SITE');
			$new_columns['author'] = __('Author','ATP_ADMIN_SITE');
	 		$new_columns['date'] = __('Date', 'ATP_ADMIN_SITE');
	 
			$new_columns['thumbnail'] = __('Thumbnail','ATP_ADMIN_SITE');
			
			return $new_columns;
		}
		        // Add to admin_init function
		add_action('manage_slider_posts_custom_column', 'manage_slider_columns', 10, 2);
	 
		function manage_slider_columns($column_name, $id) {
			global $wpdb;
			switch ($column_name) {
			case 'id':
				echo $id;
			        break;
	 
			case 'thumbnail':
				// Get number of images in gallery
				echo the_post_thumbnail(array(100,100));
				break;
			default:
				break;
			} // end switch
		}
?>