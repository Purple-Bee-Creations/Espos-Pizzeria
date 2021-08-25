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

				<?php  $breadcrumb=get_post_meta($post->ID,'breadcrumb','true');
				if($breadcrumb!='on') { (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):''; }  ?>
				<!-- #breadcrumbs -->

				<div class="content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<?php the_content(); ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'THEME_FRONT_SITE' ), 'after' => '</div>' ) ); ?>
			
					</div>
					<!-- #post-<?php the_ID(); ?> -->

					<?php endwhile; ?>
	
					<?php edit_post_link( __( 'Edit', 'THEME_FRONT_SITE' ), '<span class="edit-link">', '</span>' ); ?>
	
					<?php 
					if($comments=="pages" ||  $comments=="both") {
						comments_template('', true); 
					}?>
					<!-- #comments -->

				</div>
				<!-- .content -->
			</div>
			<!-- #main -->

			<?php 
			if($sidebaroption != "fullwidth"){ 
				get_sidebar(); 
			} ?>
			<!-- #sidebar -->

			<div class="clear"></div>
		
		</div>
		<!-- .inner -->
		
		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>
	
	</div>
	<!-- .pagemid -->

	<?php get_footer(); ?>