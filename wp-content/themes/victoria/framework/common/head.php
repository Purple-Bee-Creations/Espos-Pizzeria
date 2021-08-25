<?php
	// REGISTER AND ENQUEUE SCRIPTS
	//--------------------------------------------------------
	function enqueue_scripts() {
		wp_register_script('atp_custom', THEME_JS . '/sys_custom.js', 'jquery','1.0','in_footer');
		wp_register_script('jquery-gmap', 'http://maps.google.com/maps/api/js?sensor=false','jquery','2.0','in_footer');
		wp_register_script('jquery-gmapmin', THEME_JS . '/jquery.gmap.js', 'jquery','2.0','in_footer');
		wp_register_script('sf-hover', THEME_JS .'/hoverIntent.js');
		wp_register_script('sf-menu', THEME_JS .'/superfish.js');
		wp_register_script('atp-form', THEME_JS .'/atp_form.js','jquery','', 'in_footer');
		wp_register_script('atp-jgalleria', THEME_JS .'/src/galleria.js','jquery','','');
		wp_register_script('atp-jgclassic', THEME_JS .'/src/themes/classic/galleria.classic.js','jquery','','');
		wp_register_script('atp-contact', THEME_JS .'/atp_form.js','jquery','', 'in_footer');
		wp_register_script('atp-fitvids', THEME_JS .'/jquery.fitvids.js','jquery','', 'in_footer');
			

		// Enqueue Scripts
		//--------------------------------------------------------
		wp_enqueue_script('jquery');
		wp_enqueue_script('atp-easing', THEME_JS .'/jquery.easing.1.3.js','jquery','','');
		wp_enqueue_script('sf-hover');
		wp_enqueue_script('sf-menu');
		wp_enqueue_script('atp-preloader', THEME_JS .'/jquery.preloadify.min.js','jquery','','');
		wp_enqueue_script('atp-cycle', THEME_JS .'/jquery.cycle.all.min.js','jquery','','');
		wp_register_script('jquery_flex', THEME_JS .'/jquery.flexslider-min.js', 'jquery');	
		wp_enqueue_script('atp-flowtools', THEME_JS .'/jquery.tools.min.js','jquery','','');
		wp_enqueue_script('atp-prettyPhoto', THEME_JS .'/jquery.prettyPhoto.js','jquery','','');
		wp_enqueue_script('atp-lightbox', THEME_JS .'/lightbox/jquery.lightbox.js','jquery','','');
		wp_enqueue_script('atp_custom');
		wp_enqueue_script('atp-fitvids');
		wp_enqueue_script('jquery_flex');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_localize_script( 'jquery', 'atp_panel', array(
			'SiteUrl' => THEME_URI
		));		

		// enqueue scripts in homepage only
		//--------------------------------------------------------
		wp_register_style( 'responsive-style', THEME_CSS . '/responsive.css', array(), '1', 'all' ); 
			
		// E N Q U E U E   S T Y L E S 
		//--------------------------------------------------------
		wp_enqueue_style('prettyphoto-style', THEME_CSS.'/prettyPhoto.css', false, false, 'all');
		wp_enqueue_style('superfish-style', THEME_CSS.'/superfish.css', false, false, 'all');
		wp_enqueue_style('shortcodes-style', THEME_CSS.'/shortcodes.css', false, false, 'all');
		wp_enqueue_style('lightbox-style', THEME_JS.'/lightbox/themes/default/jquery.lightbox.css', false, false, 'all');
		wp_enqueue_style('responsive-style');
		wp_enqueue_style('datepicker-style', FRAMEWORK_URI.'admin/css/datepicker.css', false, false, 'all');
		wp_register_style('flexslider-style', THEME_CSS . '/flexslider.css', array(), '1', 'all' ); 			
		wp_enqueue_style('flexslider-style');
		if ( is_singular() ){
			wp_enqueue_script( 'comment-reply' );
		}	
	}  
	add_action( 'wp_enqueue_scripts','enqueue_scripts');
	
	// E N Q U E U E   S C R I P T S   I N   A D M I N 
	//--------------------------------------------------------
	function admin_enqueue_scripts(){
		wp_enqueue_script('theme-script',FRAMEWORK_URI . 'admin/js/script.js');
		wp_enqueue_script('theme-colorpicker',FRAMEWORK_URI . 'admin/js/colorpicker.js');
		wp_enqueue_script('theme-shortcode',FRAMEWORK_URI . 'admin/js/shortcode.js');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('meta-css', FRAMEWORK_URI . 'admin/css/atpadmin.css');
		wp_enqueue_style('appointment-style', FRAMEWORK_URI.'admin/css/datepicker.css', false, false, 'all');
			wp_localize_script( 'jquery', 'atp_panel', array(
			'SiteUrl' => THEME_URI
		));	
	}
	
	add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts' );
?>