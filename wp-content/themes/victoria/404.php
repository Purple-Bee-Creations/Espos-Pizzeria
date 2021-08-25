<?php get_header(); ?>
<?php 
	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */
	global $atp_breadcrumbs;
	$atp_error404txt = get_option('atp_error404txt');
	?>

	<?php echo atp_generator( 'subheader', '' ); ?>
	<!-- #subheader -->	

	<!-- pagemid -->
	<div class="pagemid rightsidebar">
		
		<div class="inner">

			<div id="mainfull" class="clearfix">
			
				<div class="content">
				
					<div class="one_third">
						<h3><?php _e('Pages','THEME_FRONT_SITE')?></h3>
						<ul class="sitemap"><?php wp_list_pages('title_li=' ); ?></ul>
					</div>
					<!-- .one_half-->

					<div class="one_third">
						<h3><?php _e('Feed','THEME_FRONT_SITE')?></h3>
						<ul class="sitemap">
							<li><a title="Full content" href="<?php bloginfo('rss2_url'); ?>"><?php _e('Main RSS','THEME_FRONT_SITE'); ?></a></li>
							<li><a title="Comment Feed" href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comment Feed','THEME_FRONT_SITE'); ?></a></li>
						</ul>
					</div>
					<!-- .one_fourth-->

					<div class="one_third last">
						<h3><?php _e('Categories','THEME_FRONT_SITE'); ?></h3>
							<ul class="sitemap"><?php wp_list_categories(''); ?></ul>

						<h3><?php _e('Archives','THEME_FRONT_SITE'); ?></h3>
							<ul class="sitemap">
								<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
							</ul>
					</div>
					<!-- .one_fourth last-->

				</div>
				<!-- .content -->
			</div>
			<!-- #mainfull -->
		</div>
		<!-- .inner -->
		
		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>
	</div>
	<!-- .pagemid -->

	<?php get_footer(); ?>