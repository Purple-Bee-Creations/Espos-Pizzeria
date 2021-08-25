<?php // Custom Homepage Sidebar ?>
	<div id="sidebar">
		<div class="content">
<?php
	/**
	 * Check if opted homepage widget is active 
	 * else shows empty sidebar
	 */

	 $page_ids= get_option('atp_homepage');
	 $widgets= get_post_meta($page_ids, 'custom_widget', true);
	 $widget=strtolower(preg_replace('/\s+/', '-',$widgets));

	/**
	 * If current page falls under widget pages
	 * then display sidebar widgets accordingly
	 * Otherwise display default widgets
	 */
    if($widget) {
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-'.$widget) ) : endif;
    }else{
		if ( ! dynamic_sidebar( 'defaultsidebar' ) ) : ?>

			<div id="archives" class="syswidget">
							<h3><span><?php _e( 'Archives', 'THEME_FRONT_SITE' ); ?></span></h3>
						<div class="content">
							<ul>
								<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
							</ul>
						</div>
					</aside>

					<aside id="meta" class="syswidget">
							<h3><span><?php _e( 'Meta', 'THEME_FRONT_SITE' ); ?></span></h3>
							<div class="content">
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
						</div>
					</div>
				<?php endif; // end sidebar widget area 
				} 
			?>
	</div>
</div>