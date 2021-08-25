<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'THEME_FRONT_SITE' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo THEME_URI; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php if(get_option('atp_custom_favicon')) { ?>
	<link rel="shortcut icon" href="<?php echo get_option('atp_custom_favicon'); ?>" type="image/x-icon" /> 
<?php } ?>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
<?php
	$atp_style = get_option('atp_style');
	if($atp_style != '0'){ ?>
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/colors/<?php echo $atp_style; ?>" media="screen" />
	<?php } ?>
</head>

<body <?php body_class(); ?>>
<?php
	$homepage_id = get_option('atp_homepage'); //get hompage ID
	if(is_tag() || is_search() || is_404()) {
		$frontpageid = $homepage_id;
	}else {
		$frontpageid = $post->ID;
	}
	
	?>

	<?php if ( get_post_meta($frontpageid, 'page_bg_image', true) ) : ?>
	<img id="pagebg" src="<?php echo get_post_meta($frontpageid, "page_bg_image", true); ?>" />
	<?php endif; ?>

<div id="<?php echo get_option('atp_layoutoption');?>" class="<?php echo atp_generator('sidebaroption',$frontpageid);?>"><div class="bodyoverlay"></div>
	<?php if(get_option('atp_stickybar') != "on" &&  get_option('atp_stickycontent') != '') { ?>
	<div id="trigger" class="tarrow"></div>
	<div id="sticky">
		<?php echo  stripslashes(get_option('atp_stickycontent')); ?>
	</div>
	<!-- #sticky -->
	<?php } ?>
	
	<div id="wrap_all">

		<div id="header" class="header">
			
			<div class="inner">

				<div class="logo">
				<?php atp_generator('logo'); ?>
				</div>
				<!-- .logo -->
			
				<div class="primarymenu">
					<nav><?php atp_generator('atp_primary_menu'); ?></nav>
				</div>
				<!-- #menuwrap -->
			</div>
			<!-- .inner -->
		</div>
		<!-- #header -->
<?php
	// Get Slider based on the option selected in theme options panel
	if(get_option("atp_slidervisble") != "on") {
		$chooseslider=get_option('atp_slider');
		switch ($chooseslider):
			case 'carouselslider':
				get_template_part('slider/carousel','slider');
				break;
			case 'static_image':
				get_template_part( 'slider/static', 'slider' );   	
				break;
			case 'cycleslider':
				get_template_part( 'slider/flex', 'slider' );   	
				break;
			case 'flexslider':
				get_template_part( 'slider/flex', 'slider' );   	
				break;
			case 'videoslider':
				get_template_part( 'slider/video', 'slider' );   	
				break;
			case 'custom_slider':
				get_template_part( 'slider/custom-slider', 'slider' );   	
				break;
		endswitch;
		wp_reset_query();
	}

	/* Frontpage Teaser 
	 * Displays the teaser widget only if option is set on in theme options panel
	 * @homepage_teaser = Widget
	 * Widget Name = Homepage Teaser Text
	 */
	if(get_option('atp_teaser_frontpage') != "on") {
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('homepage_teaser') ) : endif; 
	}

	/* Frontpage Custom 3 Column Widget
	 * frontpagewidgetcounts
	 * Where $column_num = starter column indexing
	 */

	$frontpagewidgetcounts = get_option('atp_frontpagewidgetcount');

	if( $frontpagewidgetcounts ) {

		if($frontpagewidgetcounts == '1') { $frontclass="full_width";}
		if($frontpagewidgetcounts == '2') { $frontclass="one_half";}
		if($frontpagewidgetcounts == '3') { $frontclass="one_third";}

		if($frontpagewidgetcounts) {
			echo '<div class="fp_widgets_wrap">';
			// If widgets are active returns output
			if( is_active_sidebar('frontpagecolumn1') OR is_active_sidebar('frontpagecolumn2') OR is_active_sidebar('frontpagecolumn3') ){
				echo '<div class="frontpage_widgets">';
				for ($i = 1; $i <= $frontpagewidgetcounts; $i++) {
					
			
					$frontlast = ($i == $frontpagewidgetcounts && $frontpagewidgetcounts != 1) ? 'last' : '';
				
					// Column Loop, Returns widget output
					echo'<div class="'.$frontclass.' '. $frontlast.'">';
						if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('frontpagecolumn'.$i)) : endif;
					echo '</div>';
				}
				echo '</div><div class="clear"></div>';	
			}
			echo '</div>';
		}
	}