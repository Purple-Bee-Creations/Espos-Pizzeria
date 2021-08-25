<?php
	/**
	 * Please refrain from editing this file 
	 * Required Variables Globally in the theme
	 */
	$atp_breadcrumbs = get_option('atp_breadcrumbs');
	$atp_singlenavigation = get_option('atp_singlenavigation');
	$relatedposts = get_option('atp_relatedposts');
	$atp_singlefeaturedimg = get_option('atp_singlefeaturedimg');
	$aboutauthor = get_option('atp_aboutauthor');
	$atp_teaser = get_option('atp_teaser');	
	$readmoretxt = get_option('atp_readmoretxt') ? get_option('atp_readmoretxt') : 'Read More';
	$atp_viewprofiletxt = get_option('atp_viewprofiletxt') ? get_option('atp_viewprofiletxt') : 'View full porfile';
	$reservationleftsidetext = get_option('atp_reservationleftsidetext') ? get_option('atp_reservationleftsidetext'):'Select the date for your reservation:';
	$reservationinformationtext = get_option('atp_reservationinformationtext') ? get_option('atp_reservationinformationtext'):'Reservation Information:';
	$priceperserving= get_option('atp_priceperserving') ? get_option('atp_priceperserving'):'';
	
	
	$comments = get_option('atp_commentstemplate');
	/**
	 * Excludes categories for custom post type tags archive
	 */
	add_filter('pre_get_posts', 'query_post_type');
	
		// Awesomefonts
	require_once( get_template_directory() . '/framework/includes/awesomefont_array.php' );
	// Corner RibbonS  Files
	require_once( get_template_directory() . '/framework/includes/ribbons_array.php' );


	function query_post_type($query) {
		if ( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
			$post_type = get_query_var('post_type');
			if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('post','menus'); 
			$query->set('post_type',$post_type);
			return $query;
		}
	}

	// atp function start
	if(!class_exists('atp_theme')){
		// class start
		class atp_theme {
		
			public $theme_name;
			public $meta_box;
			
			public function __construct()	{
				$this->atp_constant();
				$this->atp_themesupport();
				$this->atp_head();
				$this->atp_cufonfont();
				$this->atp_themepanel();
				$this->atp_widgets();
				$this->atp_post_types();
				$this->atp_custom_meta();
				$this->atp_meta_generators();
				$this->atp_shortcodes();
				$this->atp_common();
			}

			function atp_constant()	{
				
				// Framework General Variables and directory paths
				$theme_data;

				if ( function_exists('wp_get_theme') ) {
					$theme_data = wp_get_theme();
					$themeversion = $theme_data->Version;
					$theme_name = $theme_data->Name;
				} else {
					$theme_data = (object) get_theme_data(get_template_directory() . '/style.css');
					$themeversion = $theme_data->Version;
					$theme_name = $theme_data->Name;
				}
				
				/**
				 * Set the file path based on whether the Options Framework is in a parent theme or child theme
				 * Directory Structure
				 */
				define( 'FRAMEWORK', '2.0' ); //  Framework Version
				define( 'THEMENAME', $theme_name );
				define( 'THEMEVERSION', $themeversion );	
				define( 'THEME_URI', get_template_directory_uri() );	
				define( 'THEME_DIR', get_template_directory() );
				
				define('FRAMEWORK_DIR', get_template_directory() . '/framework/');
				define('FRAMEWORK_URI', get_template_directory_uri() . '/framework/');
				define('CUSTOM_META', FRAMEWORK_DIR . '/custom-meta/');
				define('CUSTOM_PLUGINS', FRAMEWORK_DIR . '/custom-plugins/');
				define('CUSTOM_POST', FRAMEWORK_DIR . '/custom-post/');
				
				define('THEME_JS', THEME_URI . '/js');
				define('THEME_CSS', THEME_URI . '/css');

				define('THEME_SHORTCODES', FRAMEWORK_DIR . 'shortcode/');
				define('THEME_WIDGETS', FRAMEWORK_DIR . 'widgets/');
				define('THEME_PLUGINS', FRAMEWORK_DIR . 'plugins/');
				define('THEME_POSTTYPE',FRAMEWORK_DIR .'custom-post/');
				define('THEME_CUSTOMMETA',FRAMEWORK_DIR.'custom-meta/');
				define('THEME_PATTDIR', get_template_directory_uri().'/images/patterns/');

			}
			// widgets
			function atp_widgets() {
				$atp_widgts=array('register_widget','reservation','contactform','contactinfo','gmap','business_hours','flickr','twitter','sociable','popularpost','recentpost');
				foreach($atp_widgts as $widget)
				{
					require_once(THEME_WIDGETS .$widget.'.php');
				}
			}
			// header loads
			function atp_head(){
				require_once(FRAMEWORK_DIR . 'common/head.php');
			}
			// atp cufon font
			function atp_cufonfont(){
				require_once(FRAMEWORK_DIR . 'common/atp_googlefont.php');
			}
			
			// shortcodes
			function atp_shortcodes(){
				$atp_short=array('boxes','buttons','contactform','contactinfo','flickr','general','gmap','gallery','foodmenu','image','layout','lightbox','messageboxes','flexslider','popular','recent','sociable','tabs_toggles','todayspecial','twitter','videos');
				foreach($atp_short as $short){
					require_once(THEME_SHORTCODES .$short.'.php');
				}
			}
			// support functions
			function atp_themesupport() {
					
				// Add support for a variety of post formats
				//add_theme_support( 'post-formats', array( 'aside','audio','link', 'image', 'gallery', 'quote','status','video') );
				/**
				 * Add Theme Support for 
				 * post thumbnails and automatic feed links
				 */
				add_theme_support('post-thumbnails', array('post', 'page', 'menus','reservation','slider'));
				add_theme_support('automatic-feed-links');
				add_editor_style();
				add_theme_support( 'editor-style' );
				add_theme_support('menus');
				
				register_nav_menus(array(
					'primary-menu' => __( 'Primary Menu - Appear beside the Logo.','ATP_ADMIN_SITE' )
				));
				
				if ( ! isset( $content_width ) ) $content_width = 900;

			}
			
			/** Custom theme functions
			 *
			 * @file custom theme functions
			 * @file pagination
			 * @file sociables
			 * @file imageresizing
			 * @file plugin activation
			 * @file plugin activation class
			 */

			function atp_common()
			{
				require_once( THEME_DIR . '/css/skin.php' );
				require_once( FRAMEWORK_DIR . 'common/class_twitter.php' );
				require_once( FRAMEWORK_DIR . 'common/atp_generator.php' );
				require_once( FRAMEWORK_DIR . 'common/pagination.php' );
				require_once( FRAMEWORK_DIR . 'common/sociable-bookmark.php' );
				require_once( FRAMEWORK_DIR . 'includes/image_resize.php' );
				require_once( FRAMEWORK_DIR . 'includes/class-activation.php' );
			}
			
			/** Load Custom Post Types
			 *
			 * @file Slider post type
			 * @file Events post type
			 * @file Portfolio post type
			 * @file Testimonial post type
			 */
			function atp_post_types()
			{
				require_once(THEME_POSTTYPE . '/slider.php');
				require_once(THEME_POSTTYPE . '/menus.php');
				require_once(THEME_POSTTYPE . '/reservations.php');
			}
			
			/** Load Meta Generator Files
			 *
			 * @file Slider,Events,Portfolio,Testimonial
			 * @file Page, Posts
			 * @file Custom Shortcodes Generator
			 */
			function atp_custom_meta()
			{
				require_once(THEME_CUSTOMMETA . '/page-meta.php');
				require_once(THEME_CUSTOMMETA . '/post-meta.php');
				require_once(THEME_CUSTOMMETA . '/reservation-meta.php');
				require_once(THEME_CUSTOMMETA . '/menus-meta.php');
				require_once(THEME_CUSTOMMETA . '/slider-meta.php');
			}
			
			function atp_meta_generators() {
				require_once( THEME_CUSTOMMETA . '/meta-generator.php' );
				require_once( THEME_CUSTOMMETA . '/shortcode-meta.php' );
				require_once( THEME_CUSTOMMETA . '/shortcode-generator.php' );
			}
			
			
			// Admin Interface
			function atp_themepanel()
			{
				// These files build out the options interface.  
				require_once( FRAMEWORK_DIR . 'common/atp_googlefont.php' );
				require_once( FRAMEWORK_DIR . 'admin/admin-interface.php' );
				require_once( FRAMEWORK_DIR . 'admin/theme-options.php' );

				if( isset( $_GET['page'] ) == 'advance' ) {
					require_once( FRAMEWORK_DIR . 'admin/advance-options.php' );
				}
			}
			// class end
			
			/** 
			 * Custom Switch case for fetching
			 * posts, post-types, custom-taxonomies, tags
			 */

			function atp_variable( $type )
			{
				$options = array();
				switch( $type ){
					case 'pages': // Get Page Titles
							$atp_entries = get_pages( 'sort_column=post_parent,menu_order' );
							foreach ( $atp_entries as $atpPage ) {
								$options[$atpPage->ID] = $atpPage->post_title;
							}
							break;
					case 'slider': // Get Slider Slug and Name
							$atp_entries = get_terms( 'slider_cat', 'orderby=name&hide_empty=0' );
							foreach ( $atp_entries as $atpSlider ) {
								$options[$atpSlider->slug] = $atpSlider->name;
								$slider_ids[] = $atpSlider->slug;
							}
							break;
					case 'posts': // Get Posts Slug and Name
							$atp_entries = get_categories( 'hide_empty=0' );
							foreach ( $atp_entries as $atpPosts ) {
								$options[$atpPosts->slug] = $atpPosts->name;
								$atp_posts_ids[] = $atpPosts->slug;
							}
							break;
					case 'categories':
								$atp_entries = get_categories('hide_empty=true');
								foreach ($atp_entries as $atp_posts) {
								$options[$atp_posts->term_id] = $atp_posts->name;
								$atp_posts_ids[] = $atp_posts->term_id;
								}
							break;
							
					case 'foodmenu_cat':
							$atp_entries = get_terms('menutype','orderby=name&hide_empty=0');
							foreach ($atp_entries as $menu_cats) {
								$options[$menu_cats->slug] = $menu_cats->name;
								$menu_catids[] = $menu_cats->slug;
							}
							break;
							
					case 'tags': // Get Taxonomy Tags
							$atp_entries = get_tags( array( 'taxonomy' => 'post_tag' ) );
							foreach ( $atp_entries as $atpTags ) {
								$options[$atpTags->slug] = $atpTags->name;
							}
							break;
					case 'slider_type': // Slider Arrays for Theme Options
							$options = array(
								''				=> 'Select Slider',
								'flexslider'	=>'Flex Slider',
								'carouselslider'=>'Carousel Slider',
								'videoslider'	=>'Single Video',
								'static_image'	=>'Static Image',
								'custom_slider'	=>'Custom Slider'
							);
							break;
				}
				
				return $options;
			}
			
		}
	}

	$atp_theme = new atp_theme();
	$shortname = "atp";
	$url =  FRAMEWORK_URI . 'admin/images/';

	add_action( 'after_setup_theme', 'atp_theme_setup' );
	function atp_theme_setup()
	{
		load_theme_textdomain( 'THEME_FRONT_SITE', get_template_directory() . '/languages' );
		load_theme_textdomain( 'ATP_ADMIN_SITE', get_template_directory() . '/languages' );

		add_filter( 'the_content', 'pre_process_shortcode');
		add_filter( 'widget_text', 'do_shortcode' );
		add_filter( 'wp_trim_excerpt', 'new_excerpt_more' );
		add_filter( 'posts_where', 'multi_tax_terms' );
		add_filter( 'upload_mimes', 'atp_custom_upload_mimes');
		
	}

	/***
	 * Shortcodes p tag Fix
	 */
	
	function pre_process_shortcode($content) {
		global $shortcode_tags;
		foreach ($shortcode_tags as $key => $value){
			 if( @stristr($value, 'iva_') ) {
				//$sys_shortcode_name = str_replace('atp_', '' ,$value);
				$shortcode[$key]=$key;
			}
		}


		$block = join("|",$shortcode);
		 
		// opening tag
		$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		// closing tag
		$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
		 
		return $rep;
		}

	// 
	function new_excerpt_more( $excerpt ) {
		return str_replace( '[...]', '...', $excerpt );
	}

	//  Custom Upload file extension
	function atp_custom_upload_mimes($existing_mimes)
	{
		// add the file extension to the array
		$existing_mimes['eot'] = 'font/eot';
		$existing_mimes['ttf'] = 'font/ttf';
		$existing_mimes['woff'] = 'font/woff';
		$existing_mimes['svg'] = 'font/svg';
		return $existing_mimes;
	}

	/**
	 * Multiple taxonomies
	 */
	function multi_tax_terms($where) {
		global $wp_query, $wpdb;
		$term_ids = array();
		
		if (isset($wp_query->query_vars['term']) && (strpos($wp_query->query_vars['term'], ',') !== false && strpos($where, "AND 0") !== false)) {
			//Get the terms
			$term_arr = explode(",", $wp_query->query_vars['term']);
			foreach ($term_arr as $term_item) {
				$terms[] = get_terms($wp_query->query_vars['taxonomy'], array(
					'slug' => $term_item
				));
			} //$term_arr as $term_item
				
			//Get the id of posts with that term in that taxonomy
			if ($terms){
				foreach ($terms as $term) {
					$term_ids[] = $term[0]->term_id;
				} //$terms as $term
			}
			$post_ids = get_objects_in_term($term_ids, $wp_query->query_vars['taxonomy']);
			
			if (!is_wp_error($post_ids) && count($post_ids)) {
				// Build the new query
				$new_where = " AND $wpdb->posts.ID IN (" . implode(', ', $post_ids) . ") ";
				$where = str_replace("AND 0", $new_where, $where);
			}
			
		} //$wp_query
		
		return $where;
	}

	/***
	 * code that executes when theme is being activated
	 */
	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' && get_option( 'atp_default_template_option_values','defaultoptionsnotexists' ) == 'defaultoptionsnotexists' ){
		
		$default_option_values = 'YToyMzI6e3M6ODoiYXRwX2xvZ28iO3M6NDoibG9nbyI7czoxNToiYXRwX2hlYWRlcl9sb2dvIjtzOjYyOiJodHRwOi8vd3d3LmFpdmFodGhlbWVzLmNvbS92aWN0b3JpYS9maWxlcy8yMDEyLzA2L3ZpY3RvcmlhLnBuZyI7czoxOToiYXRwX2xvZ290aXRsZV9jb2xvciI7czo3OiIjMGQwZDBkIjtzOjE4OiJhdHBfbG9nb3RpdGxlX2ZhY2UiO3M6MDoiIjtzOjE4OiJhdHBfbG9nb3RpdGxlX3NpemUiO3M6NDoiNTBweCI7czoyNDoiYXRwX2xvZ290aXRsZV9saW5laGVpZ2h0IjtzOjQ6IjM0cHgiO3M6MTk6ImF0cF9sb2dvdGl0bGVfc3R5bGUiO3M6Njoibm9ybWFsIjtzOjI1OiJhdHBfbG9nb3RpdGxlX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxNzoiYXRwX3RhZ2xpbmVfY29sb3IiO3M6MDoiIjtzOjE2OiJhdHBfdGFnbGluZV9mYWNlIjtzOjE0OiJHZW9yZ2lhLCBzZXJpZiI7czoxNjoiYXRwX3RhZ2xpbmVfc2l6ZSI7czo0OiIxMnB4IjtzOjIyOiJhdHBfdGFnbGluZV9saW5laGVpZ2h0IjtzOjQ6IjE2cHgiO3M6MTc6ImF0cF90YWdsaW5lX3N0eWxlIjtzOjY6Iml0YWxpYyI7czoyMzoiYXRwX3RhZ2xpbmVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjExOiJhdHBfbG9nb19tdCI7czowOiIiO3M6MTE6ImF0cF9sb2dvX21iIjtzOjA6IiI7czoxODoiYXRwX2N1c3RvbV9mYXZpY29uIjtzOjA6IiI7czoxMDoiYXRwX3RlYXNlciI7czo3OiJkZWZhdWx0IjtzOjE3OiJhdHBfdGVhc2VyX2N1c3RvbSI7czowOiIiO3M6MTg6ImF0cF90ZWFzZXJfdHdpdHRlciI7czoxMzoic3lzdGVtMzJzdG9yZSI7czoxNjoiYXRwX2xheW91dG9wdGlvbiI7czo1OiJib3hlZCI7czoyNDoiYXRwX2Zyb250cGFnZXdpZGdldGNvdW50IjtzOjE6IjMiO3M6MTM6ImF0cF90ZWFzZXJfYmciO3M6NzoiIzU3M2YyZiI7czoyNDoiYXRwX2hvbWVwYWdldGVhc2VyX2NvbG9yIjtzOjc6IiNlM2QyYWEiO3M6MjM6ImF0cF9ob21lcGFnZXRlYXNlcl9mYWNlIjtzOjA6IiI7czoyMzoiYXRwX2hvbWVwYWdldGVhc2VyX3NpemUiO3M6MDoiIjtzOjI5OiJhdHBfaG9tZXBhZ2V0ZWFzZXJfbGluZWhlaWdodCI7czowOiIiO3M6MjQ6ImF0cF9ob21lcGFnZXRlYXNlcl9zdHlsZSI7czowOiIiO3M6MzA6ImF0cF9ob21lcGFnZXRlYXNlcl9mb250dmFyaWFudCI7czowOiIiO3M6MTI6ImF0cF9ob21lcGFnZSI7czoyOiIyNiI7czo5OiJhdHBfc3R5bGUiO3M6MToiMCI7czoyNDoiYXRwX2JvZHlwcm9wZXJ0aWVzX2ltYWdlIjtzOjc1OiJodHRwOi8vd3d3LmFpdmFodGhlbWVzLmNvbS92aWN0b3JpYS9maWxlcy8yMDEyLzA2L3RpbGVhYmxlX3dvb2RfdGV4dHVyZS5wbmciO3M6MjQ6ImF0cF9ib2R5cHJvcGVydGllc19jb2xvciI7czowOiIiO3M6MjQ6ImF0cF9ib2R5cHJvcGVydGllc19zdHlsZSI7czo2OiJyZXBlYXQiO3M6Mjc6ImF0cF9ib2R5cHJvcGVydGllc19wb3NpdGlvbiI7czo5OiJyaWdodCB0b3AiO3M6Mjk6ImF0cF9ib2R5cHJvcGVydGllc19hdHRhY2htZW50IjtzOjU6ImZpeGVkIjtzOjE3OiJhdHBfb3ZlcmxheWltYWdlcyI7czowOiIiO3M6MjM6ImF0cF9zbGlkZXJiZ3Byb3VwX2ltYWdlIjtzOjA6IiI7czoyMzoiYXRwX3NsaWRlcmJncHJvdXBfY29sb3IiO3M6MDoiIjtzOjIzOiJhdHBfc2xpZGVyYmdwcm91cF9zdHlsZSI7czo2OiJyZXBlYXQiO3M6MjY6ImF0cF9zbGlkZXJiZ3Byb3VwX3Bvc2l0aW9uIjtzOjEwOiJjZW50ZXIgdG9wIjtzOjI4OiJhdHBfc2xpZGVyYmdwcm91cF9hdHRhY2htZW50IjtzOjY6InNjcm9sbCI7czoxNDoiYXRwX3RoZW1lY29sb3IiO3M6MDoiIjtzOjEwOiJhdHBfd3JhcGJnIjtzOjA6IiI7czoyOToiYXRwX3N1YmhlYWRlcnByb3BlcnRpZXNfaW1hZ2UiO3M6MDoiIjtzOjI5OiJhdHBfc3ViaGVhZGVycHJvcGVydGllc19jb2xvciI7czo3OiIjZTgxMjQxIjtzOjI5OiJhdHBfc3ViaGVhZGVycHJvcGVydGllc19zdHlsZSI7czo5OiJuby1yZXBlYXQiO3M6MzI6ImF0cF9zdWJoZWFkZXJwcm9wZXJ0aWVzX3Bvc2l0aW9uIjtzOjEwOiJjZW50ZXIgdG9wIjtzOjM0OiJhdHBfc3ViaGVhZGVycHJvcGVydGllc19hdHRhY2htZW50IjtzOjY6InNjcm9sbCI7czoxNzoiYXRwX3N1YmhlYWRlcnRleHQiO3M6MDoiIjtzOjE2OiJhdHBfc3ViaGVhZGVyX3B0IjtzOjA6IiI7czoxNjoiYXRwX3N1YmhlYWRlcl9wYiI7czowOiIiO3M6MTc6ImF0cF9mb290ZXJiZ2NvbG9yIjtzOjA6IiI7czoxOToiYXRwX2Zvb3RlcnRleHRjb2xvciI7czowOiIiO3M6MjE6ImF0cF9mb290ZXJ0aXRsZV9jb2xvciI7czowOiIiO3M6MjA6ImF0cF9mb290ZXJ0aXRsZV9mYWNlIjtzOjA6IiI7czoyMDoiYXRwX2Zvb3RlcnRpdGxlX3NpemUiO3M6MDoiIjtzOjI2OiJhdHBfZm9vdGVydGl0bGVfbGluZWhlaWdodCI7czowOiIiO3M6MjE6ImF0cF9mb290ZXJ0aXRsZV9zdHlsZSI7czowOiIiO3M6Mjc6ImF0cF9mb290ZXJ0aXRsZV9mb250dmFyaWFudCI7czowOiIiO3M6MTU6ImF0cF9jb3B5Ymdjb2xvciI7czowOiIiO3M6MjA6ImF0cF9jb3B5cmlnaHRzX2NvbG9yIjtzOjA6IiI7czoxOToiYXRwX2NvcHlyaWdodHNfZmFjZSI7czoxMToiRHJvaWQgU2VyaWYiO3M6MTk6ImF0cF9jb3B5cmlnaHRzX3NpemUiO3M6NDoiMTFweCI7czoyNToiYXRwX2NvcHlyaWdodHNfbGluZWhlaWdodCI7czo0OiIyMHB4IjtzOjIwOiJhdHBfY29weXJpZ2h0c19zdHlsZSI7czo2OiJub3JtYWwiO3M6MjY6ImF0cF9jb3B5cmlnaHRzX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxNToiYXRwX21haW5tZW51X2JnIjtzOjA6IiI7czoxODoiYXRwX21haW5tZW51X2NvbG9yIjtzOjA6IiI7czoxNzoiYXRwX21haW5tZW51X2ZhY2UiO3M6MDoiIjtzOjE3OiJhdHBfbWFpbm1lbnVfc2l6ZSI7czo0OiIxNnB4IjtzOjIzOiJhdHBfbWFpbm1lbnVfbGluZWhlaWdodCI7czowOiIiO3M6MTg6ImF0cF9tYWlubWVudV9zdHlsZSI7czowOiIiO3M6MjQ6ImF0cF9tYWlubWVudV9mb250dmFyaWFudCI7czowOiIiO3M6MjY6ImF0cF9tYWlubWVudWRyb3Bkb3duX2NvbG9yIjtzOjA6IiI7czoyNToiYXRwX21haW5tZW51ZHJvcGRvd25fZmFjZSI7czowOiIiO3M6MjU6ImF0cF9tYWlubWVudWRyb3Bkb3duX3NpemUiO3M6MDoiIjtzOjMxOiJhdHBfbWFpbm1lbnVkcm9wZG93bl9saW5laGVpZ2h0IjtzOjA6IiI7czoyNjoiYXRwX21haW5tZW51ZHJvcGRvd25fc3R5bGUiO3M6MDoiIjtzOjMyOiJhdHBfbWFpbm1lbnVkcm9wZG93bl9mb250dmFyaWFudCI7czowOiIiO3M6MjI6ImF0cF9tYWlubWVudV9saW5raG92ZXIiO3M6MDoiIjtzOjE5OiJhdHBfbWFpbm1lbnVfc3ViX2JnIjtzOjA6IiI7czoyNjoiYXRwX21haW5tZW51X3N1Yl9saW5raG92ZXIiO3M6MDoiIjtzOjI0OiJhdHBfbWFpbm1lbnVfc3ViX2hvdmVyYmciO3M6MDoiIjtzOjg6ImF0cF9saW5rIjtzOjA6IiI7czoxMzoiYXRwX2xpbmtob3ZlciI7czowOiIiO3M6MTc6ImF0cF9zdWJoZWFkZXJsaW5rIjtzOjA6IiI7czoyMjoiYXRwX3N1YmhlYWRlcmxpbmtob3ZlciI7czowOiIiO3M6MTg6ImF0cF9icmVhZGNydW1ibGluayI7czowOiIiO3M6MjM6ImF0cF9icmVhZGNydW1ibGlua2hvdmVyIjtzOjA6IiI7czoyMzoiYXRwX2VudHJ5dGl0bGVsaW5raG92ZXIiO3M6MDoiIjtzOjE0OiJhdHBfZm9vdGVybGluayI7czowOiIiO3M6MTk6ImF0cF9mb290ZXJsaW5raG92ZXIiO3M6MDoiIjtzOjE3OiJhdHBfY29weXJpZ2h0bGluayI7czowOiIiO3M6MTU6ImF0cF9ib2R5cF9jb2xvciI7czowOiIiO3M6MTQ6ImF0cF9ib2R5cF9mYWNlIjtzOjA6IiI7czoxNDoiYXRwX2JvZHlwX3NpemUiO3M6NDoiMTJweCI7czoyMDoiYXRwX2JvZHlwX2xpbmVoZWlnaHQiO3M6NDoiMThweCI7czoxNToiYXRwX2JvZHlwX3N0eWxlIjtzOjY6Im5vcm1hbCI7czoyMToiYXRwX2JvZHlwX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxMjoiYXRwX2hlYWRpbmdzIjtzOjA6IiI7czoxMjoiYXRwX2gxX2NvbG9yIjtzOjA6IiI7czoxMToiYXRwX2gxX2ZhY2UiO3M6MTE6IkNyZXRlIFJvdW5kIjtzOjExOiJhdHBfaDFfc2l6ZSI7czo0OiIzMHB4IjtzOjE3OiJhdHBfaDFfbGluZWhlaWdodCI7czo0OiIzMnB4IjtzOjEyOiJhdHBfaDFfc3R5bGUiO3M6Njoibm9ybWFsIjtzOjE4OiJhdHBfaDFfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDJfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDJfZmFjZSI7czoxMToiQ3JldGUgUm91bmQiO3M6MTE6ImF0cF9oMl9zaXplIjtzOjQ6IjI0cHgiO3M6MTc6ImF0cF9oMl9saW5laGVpZ2h0IjtzOjQ6IjI3cHgiO3M6MTI6ImF0cF9oMl9zdHlsZSI7czo2OiJub3JtYWwiO3M6MTg6ImF0cF9oMl9mb250dmFyaWFudCI7czowOiIiO3M6MTI6ImF0cF9oM19jb2xvciI7czowOiIiO3M6MTE6ImF0cF9oM19mYWNlIjtzOjExOiJDcmV0ZSBSb3VuZCI7czoxMToiYXRwX2gzX3NpemUiO3M6NDoiMjBweCI7czoxNzoiYXRwX2gzX2xpbmVoZWlnaHQiO3M6NDoiMjNweCI7czoxMjoiYXRwX2gzX3N0eWxlIjtzOjY6Im5vcm1hbCI7czoxODoiYXRwX2gzX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxMjoiYXRwX2g0X2NvbG9yIjtzOjA6IiI7czoxMToiYXRwX2g0X2ZhY2UiO3M6MTE6IkNyZXRlIFJvdW5kIjtzOjExOiJhdHBfaDRfc2l6ZSI7czo0OiIxOHB4IjtzOjE3OiJhdHBfaDRfbGluZWhlaWdodCI7czo0OiIyMHB4IjtzOjEyOiJhdHBfaDRfc3R5bGUiO3M6Njoibm9ybWFsIjtzOjE4OiJhdHBfaDRfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDVfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDVfZmFjZSI7czoxMToiQ3JldGUgUm91bmQiO3M6MTE6ImF0cF9oNV9zaXplIjtzOjQ6IjE0cHgiO3M6MTc6ImF0cF9oNV9saW5laGVpZ2h0IjtzOjQ6IjE3cHgiO3M6MTI6ImF0cF9oNV9zdHlsZSI7czo2OiJub3JtYWwiO3M6MTg6ImF0cF9oNV9mb250dmFyaWFudCI7czowOiIiO3M6MTI6ImF0cF9oNl9jb2xvciI7czowOiIiO3M6MTE6ImF0cF9oNl9mYWNlIjtzOjExOiJDcmV0ZSBSb3VuZCI7czoxMToiYXRwX2g2X3NpemUiO3M6NDoiMTJweCI7czoxNzoiYXRwX2g2X2xpbmVoZWlnaHQiO3M6NDoiMTRweCI7czoxMjoiYXRwX2g2X3N0eWxlIjtzOjY6Im5vcm1hbCI7czoxODoiYXRwX2g2X2ZvbnR2YXJpYW50IjtzOjA6IiI7czoyMDoiYXRwX2VudHJ5dGl0bGVfY29sb3IiO3M6MDoiIjtzOjE5OiJhdHBfZW50cnl0aXRsZV9mYWNlIjtzOjA6IiI7czoxOToiYXRwX2VudHJ5dGl0bGVfc2l6ZSI7czo0OiIxOHB4IjtzOjI1OiJhdHBfZW50cnl0aXRsZV9saW5laGVpZ2h0IjtzOjQ6IjI0cHgiO3M6MjA6ImF0cF9lbnRyeXRpdGxlX3N0eWxlIjtzOjY6Im5vcm1hbCI7czoyNjoiYXRwX2VudHJ5dGl0bGVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjIyOiJhdHBfc2lkZWJhcnRpdGxlX2NvbG9yIjtzOjA6IiI7czoyMToiYXRwX3NpZGViYXJ0aXRsZV9mYWNlIjtzOjA6IiI7czoyMToiYXRwX3NpZGViYXJ0aXRsZV9zaXplIjtzOjA6IiI7czoyNzoiYXRwX3NpZGViYXJ0aXRsZV9saW5laGVpZ2h0IjtzOjQ6IjE2cHgiO3M6MjI6ImF0cF9zaWRlYmFydGl0bGVfc3R5bGUiO3M6Njoibm9ybWFsIjtzOjI4OiJhdHBfc2lkZWJhcnRpdGxlX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoyNDoiYXRwX2Zwd2lkZ2V0X3RpdGxlX2NvbG9yIjtzOjA6IiI7czoyMzoiYXRwX2Zwd2lkZ2V0X3RpdGxlX2ZhY2UiO3M6NzoiQmFuZ2VycyI7czoyMzoiYXRwX2Zwd2lkZ2V0X3RpdGxlX3NpemUiO3M6NDoiMjdweCI7czoyOToiYXRwX2Zwd2lkZ2V0X3RpdGxlX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjI0OiJhdHBfZnB3aWRnZXRfdGl0bGVfc3R5bGUiO3M6MDoiIjtzOjMwOiJhdHBfZnB3aWRnZXRfdGl0bGVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfZm9udHdvZmYiO3M6MDoiIjtzOjExOiJhdHBfZm9udHR0ZiI7czowOiIiO3M6MTE6ImF0cF9mb250c3ZnIjtzOjA6IiI7czoxMToiYXRwX2ZvbnRlb3QiO3M6MDoiIjtzOjEyOiJhdHBfZm9udG5hbWUiO3M6MDoiIjtzOjEzOiJhdHBfZm9udGNsYXNzIjtzOjA6IiI7czoxMjoiYXRwX2V4dHJhY3NzIjtzOjA6IiI7czoxNjoiYXRwX3NsaWRlcnZpc2JsZSI7czoyOiJvbiI7czoxMDoiYXRwX3NsaWRlciI7czoxMDoiZmxleHNsaWRlciI7czoxOToiYXRwX2N5Y2xlc2xpZGVsaW1pdCI7czoxOiIzIjtzOjEyOiJhdHBfdmlkZW9faWQiO3M6MTM5OiI8aWZyYW1lIHdpZHRoPSIxMDIwIiBoZWlnaHQ9IjQwMCIgc3JjPSJodHRwOi8vd3d3LnlvdXR1YmUuY29tL2VtYmVkL0dnUjZkeXprS0hJP3dtb2RlPXRyYW5zcGFyZW50IiBmcmFtZWJvcmRlcj0iMCIgd21vZGU9Ik9wYXF1ZSI+PC9pZnJhbWU+IjtzOjE4OiJhdHBfZmxleHNsaWRlbGltaXQiO3M6MToiMiI7czoxODoiYXRwX2ZsZXhzbGlkZXNwZWVkIjtzOjM6IjUwMCI7czoxODoiYXRwX2ZsZXhzbGlkZWZmZWN0IjtzOjQ6ImZhZGUiO3M6MTc6ImF0cF9mbGV4c2xpZGVkbmF2IjtzOjQ6InRydWUiO3M6MTc6ImF0cF9mbGV4c2xpZGVjbmF2IjtzOjQ6InRydWUiO3M6MjM6ImF0cF9zdGF0aWNfaW1hZ2VfdXBsb2FkIjtzOjYwOiJodHRwOi8vd3d3LmFpdmFodGhlbWVzLmNvbS92aWN0b3JpYS9maWxlcy8yMDEzLzAxL3N0YXRpYy5wbmciO3M6MTU6ImF0cF9zdGF0aWNfbGluayI7czoxOiIjIjtzOjIwOiJhdHBfY29tbWVudHN0ZW1wbGF0ZSI7czo1OiJwb3N0cyI7czoxMzoiYXRwX2Jsb2dhY2F0cyI7YToxOntpOjA7czoxOiIxIjt9czoxNzoiYXRwX3BzZF9pbWdoZWlnaHQiO3M6MDoiIjtzOjE3OiJhdHBfcHMxX2ltZ2hlaWdodCI7czowOiIiO3M6MTc6ImF0cF9wczJfaW1naGVpZ2h0IjtzOjA6IiI7czoxNzoiYXRwX3BzM19pbWdoZWlnaHQiO3M6MDoiIjtzOjE3OiJhdHBfY3VzdG9tc2lkZWJhciI7YToyOntpOjA7czoxMDoiY3VzdG9taG9tZSI7aToxO3M6MTA6Im5ld3NpZGViYXIiO31zOjIyOiJhdHBfdGVhc2VyX2Zvb3Rlcl90ZXh0IjtzOjEwODoiPGgzIGFsaWduPSJjZW50ZXIiPkZvb3RlciBUZWFzZXIgQXJlYSA6IEN1c3RvbSBIVE1MIGFuZCBUZXh0IHRoYXQgd2lsbCBhcHBlYXIgYWJvdmUgdGhlIHNpZGViYXIgZm9vdGVyLjwvaDM+IjtzOjIxOiJhdHBfZm9vdGVyd2lkZ2V0Y291bnQiO3M6MToiNCI7czoxOToiYXRwX2dvb2dsZWFuYWx5dGljcyI7czowOiIiO3M6MTM6ImF0cF9jb3B5cmlnaHQiO3M6NTU6IsKpIDIwMTAtMjAxMyAtIEFsbCBSaWdodHMgUmVzZXJ2ZWQgLVZpY3RvcmlhIFJlc3RhdXJhbnQiO3M6MjA6InN5c19zb2NpYWxfZmlsZV9pY29uIjtzOjE0OiJ5b3V0dWJlXzE2LnBuZyI7czoxOToiYXRwX3NvY2lhbF9ib29rbWFyayI7czoxNDE6IlR3aXR0ZXIjfHR3aXR0ZXJfMTYucG5nI3wjIztGYWNlYm9vayN8ZmFjZWJvb2tfMTYucG5nI3wjIztSU1MjfHJzc18xNi5wbmcjfCMjO1N0dW1ibGUgVXBvbiN8c3R1bWJsZXVwb25fMTYucG5nI3wjIztZb3V0dWJlI3x5b3V0dWJlXzE2LnBuZyN8IyI7czoxNToiYXRwX3JlYWRtb3JldHh0IjtzOjA6IiI7czoxODoiYXRwX3Bvc3RzaW5nbGVwYWdlIjtzOjA6IiI7czoxNToiYXRwX2Vycm9yNDA0dHh0IjtzOjMyOiJPb3BzISBCcm93c2UgdGhyb3VnaCB0aGUgc2l0ZW1hcCI7czoxMToiYXRwX25hbWV0eHQiO3M6MDoiIjtzOjEyOiJhdHBfZW1haWx0eHQiO3M6MDoiIjtzOjEyOiJhdHBfcGhvbmV0eHQiO3M6MDoiIjtzOjEyOiJhdHBfbm90ZXN0eHQiO3M6MDoiIjtzOjEzOiJhdHBfcGVvcGxldHh0IjtzOjA6IiI7czoxMToiYXRwX3RpbWV0eHQiO3M6MDoiIjtzOjE2OiJhdHBfY2xvc2VkbXNndHh0IjtzOjA6IiI7czoxMzoiYXRwX2Nsb3NlZHR4dCI7czowOiIiO3M6MTM6ImF0cF9zdW5kYXl0eHQiO3M6NjoiU3VuZGF5IjtzOjEzOiJhdHBfbW9uZGF5dHh0IjtzOjY6Ik1vbmRheSI7czoxNDoiYXRwX3R1ZXNkYXl0eHQiO3M6NzoiVHVlc2RheSI7czoxNjoiYXRwX3dlZG5lc2RheXR4dCI7czo5OiJXZWRuZXNkYXkiO3M6MTU6ImF0cF90aHVyc2RheXR4dCI7czo4OiJUaHVyc2RheSI7czoxMzoiYXRwX2ZyaWRheXR4dCI7czo2OiJGcmlkYXkiO3M6MTU6ImF0cF9zYXR1cmRheXR4dCI7czo4OiJTYXR1cmRheSI7czoxODoiYXRwX3N1bmRheV9vcGVuaW5nIjtzOjU6IjExOjAwIjtzOjE4OiJhdHBfc3VuZGF5X2Nsb3NpbmciO3M6NToiMjE6MzAiO3M6MTY6ImF0cF9zdW5kYXlfY2xvc2UiO3M6Mjoib24iO3M6MTg6ImF0cF9tb25kYXlfb3BlbmluZyI7czo1OiIwOTowMCI7czoxODoiYXRwX21vbmRheV9jbG9zaW5nIjtzOjU6IjIxOjQ1IjtzOjE5OiJhdHBfdHVlc2RheV9vcGVuaW5nIjtzOjU6IjA5OjAwIjtzOjE5OiJhdHBfdHVlc2RheV9jbG9zaW5nIjtzOjU6IjIxOjQ1IjtzOjIxOiJhdHBfd2VkbmVzZGF5X29wZW5pbmciO3M6NToiMDk6MDAiO3M6MjE6ImF0cF93ZWRuZXNkYXlfY2xvc2luZyI7czo1OiIyMjoxNSI7czoyMDoiYXRwX3RodXJzZGF5X29wZW5pbmciO3M6NToiMDk6MDAiO3M6MjA6ImF0cF90aHVyc2RheV9jbG9zaW5nIjtzOjU6IjIyOjMwIjtzOjE4OiJhdHBfZnJpZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MTg6ImF0cF9mcmlkYXlfY2xvc2luZyI7czo1OiIwMDowMCI7czoyMDoiYXRwX3NhdHVyZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MjA6ImF0cF9zYXR1cmRheV9jbG9zaW5nIjtzOjU6IjAwOjAwIjtzOjIwOiJhdHBfcmVzZXJ2YXRpb25lbWFpbCI7czoyNToic3Jpbml2YXMubmFnaWRpQGdtYWlsLmNvbSI7czoyMDoiYXRwX25vdGlmaWNhdGlvbl9tc2ciO3M6MjM2OiJEZWFyIEFkbWluTmFtZSAgW2NvbnRhY3RfbmFtZV1FbWFpbDpbY29udGFjdF9lbWFpbF1QaG9uZTpbY29udGFjdF9waG9uZV1Zb3UgSGF2ZSAgYSBCb29raW5nIHJlc2VydmF0aW9uIGF0IFtyZXN0YXVyYW50X25hbWVdIGZvciBbbnVtYmVyX29mX3Blb3BsZV0gcGVvcGxlIGF0IFtyZXNlcnZhdGlvbl90aW1lXSBvbiBbcmVzZXJ2YXRpb25fZGF0ZV0uIENsaWVudHMgTWVzc2FnZSA6IFtyZXNlcnZhdGlvbl9ub3RlXSI7czoyNDoiYXRwX2Jvb2tpbmdfdGhhbmt5b3VfbXNnIjtzOjg3OiJUaGFuayB5b3UhIFlvdXIgUmVzZXJ2YXRpb24gaGFzIGJvb2tlZCBhbmQgeW91IHdpbGwgYmUgY29udGFjdGVkIHNvb24gZm9yIGNvbmZpcm1hdGlvbi4iO3M6MTg6ImF0cF9jb25maXJtc3ViamVjdCI7czo1MToiW3Jlc3RhdXJhbnRfbmFtZV0gOiBCb29raW5nIFJlcXVlc3QgSUQgW2Jvb2tpbmdfaWRdIjtzOjExOiJhdHBfY29uZmlybSI7czoyNzQ6IkRlYXIgW2NvbnRhY3RfbmFtZV0NClRoYW5rIHlvdSBmb3IgeW91ciByZXNlcnZhdGlvbiBhdCBbcmVzdGF1cmFudF9uYW1lXSBmb3IgW251bWJlcl9vZl9wZW9wbGVdIHBlb3BsZSBhdCBbcmVzZXJ2YXRpb25fdGltZV0gb24gW3Jlc2VydmF0aW9uX2RhdGVdLiANCg0KWW91ciBjb25maXJtYXRpb24gZm9yIHJlc2VydmF0aW9uIHdpbGwgYmUgZG9uZSBvbiBwaG9uZSB2aWEgb3VyIHN0YWZmIHNvb24uDQoNClNpbmNlcmVseSwNClRoZSBTdGFmZiBhdCBbcmVzdGF1cmFudF9uYW1lXS4iO3M6MTc6ImF0cF9zdGF0dXNzdWJqZWN0IjtzOjU4OiJbcmVzdGF1cmFudF9uYW1lXSA6IEJvb2tpbmcgSUQgW2Jvb2tpbmdfaWRdIFN0YXR1cyBDaGFuZ2VkIjtzOjEwOiJhdHBfc3RhdHVzIjtzOjMxNzoiRGVhciBbY29udGFjdF9uYW1lXSwgDQoNClRoaXMgaXMgYSBjb3VydGVzeSBlLW1haWwgdG8gaW5mb3JtIHlvdSB0aGF0IHRoZSBzdGF0dXMgb2YgeW91ciByZXNlcnZhdGlvbiBhdCBbcmVzdGF1cmFudF9uYW1lXSBmb3IgW251bWJlcl9vZl9wZW9wbGVdIHBlb3BsZSBhdCBbcmVzZXJ2YXRpb25fdGltZV0gb24gW3Jlc2VydmF0aW9uX2RhdGVdIGhhcyBiZWVuIHVwZGF0ZWQuDQoNClRoZSBuZXcgcmVzZXJ2YXRpb24gc3RhdHVzIGlzICJbcmVzZXJ2YXRpb25fc3RhdHVzXSIuDQoNClNpbmNlcmVseSwNClRoZSBTdGFmZiBhdCBbcmVzdGF1cmFudF9uYW1lXS4iO3M6MTk6ImF0cF9yZXNlcnZhdGlvbnBhZ2UiO3M6MjoiMTUiO3M6MjI6ImF0cF9yZXNlcnZhdGlvbmZvcm10eHQiO3M6MTg6Ik1ha2UgYSBSZXNlcnZhdGlvbiI7czoxMjoiYXRwX2ZpcnN0ZGF5IjtzOjE6IjAiO3M6MTQ6ImF0cF90aW1lZm9ybWF0IjtzOjI6IjEyIjtzOjEzOiJhdHBfbWVudW9yZGVyIjtzOjEzOiJkaXNwbGF5X29yZGVyIjtzOjI2OiJhdHBfdGVtcGxhdGVfb3B0aW9uX3ZhbHVlcyI7czowOiIiO30=';
		//add default values for the theme options
		add_option( 'atp_default_template_option_values', $default_option_values, '', 'yes' );
		atp_options();
		update_option_values( $options,unserialize( base64_decode( $default_option_values ) ) );
	}
?>