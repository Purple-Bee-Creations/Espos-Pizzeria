<?php get_header(); ?>	
<?php

	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */

	global $atp_teaser, $atp_breadcrumbs;
	$sidebaroption = get_post_meta($post->ID, "sidebar_options", TRUE);
	$subheader_teaser_options = get_post_meta($post->ID, "subheader_teaser_options", true);
?>
	 <?php echo atp_generator('subheader',$post->ID); ?>	
	<!-- #subheader -->

	<div class="pagemid <?php echo atp_generator('sidebaroption',$post->ID); ?>">

		<div class="inner">

			<div <?php echo atp_generator('atp_layout',$post->ID); ?>>

				<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>
				<!-- #breadcrumbs -->	

				<div class="content">
					
					<?php get_template_part( 'loop', 'single' ); ?>
				
				</div>
				<!-- .content -->
	
			</div>
			<!-- #main -->

			<?php if($sidebaroption != "fullwidth"){ get_sidebar(); } ?>
			<!-- #sidebar -->

			<div class="clear"></div>
		
		</div>
		<!-- .inner -->

		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>

	</div>
	<!-- .pagemid -->
	
<?php get_footer(); ?>