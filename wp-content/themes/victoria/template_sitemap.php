<?php
/*
Template Name: Site Map
*/
get_header();
?>
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

	<div class="pagemid">

		<div class="inner">	

			<div id="mainfull">

				<?php $atp_breadcrumbs ? my_breadcrumb():''; ?>
				<!-- #breadcrumbs -->

				<div class="content">
					
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						
						<?php the_content(); ?> 

					<?php endwhile; endif; ?>

					<div class="one_fourth">
						<h3><?php _e('Pages', 'THEME_FRONT_SITE'); ?></h3>
						<ul class="sitemap"><?php wp_list_pages('title_li='); ?></ul>
					</div>
		
					<div class="one_fourth">
						<h3><?php _e('Feeds', 'THEME_FRONT_SITE'); ?></h3>
						<ul class="sitemap">
							<li><a title="<?php _e('Main RSS', 'THEME_FRONT_SITE'); ?>" href="<?php bloginfo('rss2_url'); ?>"><?php _e('Main RSS', 'THEME_FRONT_SITE'); ?></a></li>
							<li><a title="<?php _e('Comment Feed', 'THEME_FRONT_SITE'); ?>" href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comment Feed', 'THEME_FRONT_SITE'); ?></a></li>
						</ul>
					</div>
		
					<div class="one_fourth">
						<h3><?php _e('Categories', 'THEME_FRONT_SITE'); ?></h3>
						<ul class="sitemap"><?php $args = array('title_li' => ''); wp_list_categories($args); ?></ul>
					</div>
		
					<div class="one_fourth last">
						<h3><?php _e('Archives', 'THEME_FRONT_SITE'); ?></h3>
						<ul class="sitemap">
							<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
						</ul>
					</div>
				</div>
				<!-- .content -->
			</div>	
			<!-- #mainfull -->

			<div class="clear"></div>
		</div>
		<!-- .inner -->
		
		<div class="clear"></div>
		
		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>
	</div>
	<!-- .pagemid -->

<?php get_footer(); ?>