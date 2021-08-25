<?php get_header(); ?>
<?php

	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */

	global $atp_teaser, $atp_breadcrumbs, $readmoretxt;
?>

	<div id="subheader" class="subheader">
		<div class="subheader_teaser">
			<h1><?php _e('Search Results','THEME_FRONT_SITE'); ?></h1>
			<h4><?php _e('Search Results for','THEME_FRONT_SITE'); ?>: <?php $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; wp_reset_query();?></h4>
		</div>
	</div>
	<!-- #subheader -->

	<div class="pagemid rightsidebar">
		
		<div class="inner">

			<div id="main">

				<!-- #breadcrumbs -->
				
				<div class="content">
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<div class="searchresults">
	
						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							
							<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'THEME_FRONT_SITE' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
							<div class="postmeta">
								<div class="postmetadata"><?php echo get_the_date(); ?></div>
							</div>
							<!-- .postmeta -->
							
							<?php 
								global $more; $more = 0;  
								the_excerpt(''); ?>		
							
							<a href="<?php the_permalink() ?>" class="more-link"><?php echo $readmoretxt; ?> &rarr;</a>
						
						</div>
						<!-- #post-<?php the_ID(); ?> -->
					
					</div>
					<!-- .searchresults -->
					
					<div class="divider"></div>

					<?php endwhile; ?>

					<?php
					if(function_exists('atp_pagination')) { 
						atp_pagination(); 
					}?>
					<!-- #pagination -->

					<h2><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'THEME_FRONT_SITE' ); ?></h2>
					<?php get_search_form(); ?>
				
				</div>
				<!-- .content -->
			</div>
			<!-- #main -->

			<aside id="sidebar">
				<div class="content widget">
				<?php if ( ! dynamic_sidebar( 'defaultsidebar' ) ) : ?>
				<?php endif; ?>
				</div>
			</aside>
			<!-- #sidebar -->

			<div class="clear"></div>

		</div>
		<!-- .inner -->
		
		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE'); ?></a></div>
	</div>
	<!-- .pagemid -->
	
<?php get_footer(); ?>