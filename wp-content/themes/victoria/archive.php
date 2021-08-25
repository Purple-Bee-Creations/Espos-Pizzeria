<?php get_header(); ?>
<?php 
	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */
	global $atp_breadcrumbs;

	?>

	<?php echo atp_generator('subheader',$post->ID); ?>

	<div class="pagemid rightsidebar">

		<div class="inner">

			<div id="main">

				<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>
				<!-- #breadcrumbs -->

				<div class="content">
					<?php

					rewind_posts();
					get_template_part( 'loop' );

					?>
				</div>
				<!-- .content -->

			</div>
			<!-- #main -->

			<?php get_sidebar(); ?>
			<!-- #sidebar -->

			<div class="clear"></div>

		</div>
		<!-- .inner -->

		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>
	</div>
	<!-- .pagemid -->

	<?php get_footer(); ?>