<?php get_header(); ?>	
<?php

	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */

	global $atp_teaser,$atp_breadcrumbs, $comments;
	$sidebaroption = get_post_meta($post->ID, "sidebar_options", TRUE);
?>
	<?php echo atp_generator('subheader',$post->ID); ?>
	<!-- #subheader -->
	<div class="pagemid <?php echo atp_generator('sidebaroption',$post->ID); ?>">
		<div class="inner">
			<div <?php echo atp_generator('atp_layout',$post->ID); ?>>
					<?php
					$breadcrumb = get_post_meta($post->ID,'atp_breadcrumb','true');
					if( $breadcrumb != 'on' ) { ( get_option('atp_breadcrumbs') != 'on' ) ? atp_generator('my_breadcrumb'):''; }?>
					<div class="content">
						<?php get_template_part( 'loop', 'menus' ); ?>
					</div>	<!-- .content -->
			</div><!-- #main -->

			<?php if( $sidebaroption != "fullwidth" ){ get_sidebar(); } ?>
			<div class="clear"></div>
		</div><!-- .inner -->
		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>
	</div><!-- .pagemid -->
<?php get_footer(); ?>