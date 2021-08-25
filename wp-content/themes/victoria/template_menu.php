<?php
/*
Template Name: Menu
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
	
	<div class="pagemid <?php atp_generator('sidebaroption',$post->ID); ?>">
		
		<div class="inner">

			<div <?php echo atp_generator('atp_layout',$post->ID); ?>>
			
				<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>
				<!-- #breadcrumbs -->
				
				<div class="content">
					<?php // the_content(); ?>
					
					<div class="menus_container clearfix">
						<?php
						/**
						 * Retrieve the terms in a given taxonomy or list of taxonomies.
						 * orderby - Default is 'name'. Can be name, count, term_group, slug or nothing
						 * (will use term_id), Passing a custom value other than these will cause it to
						 * order based on the custom value.
						 * order - Default is ASC. Can use DESC
						 */
						
						$atpmenuorder = get_option('atp_menuorder');


					if($atpmenuorder== 'display_order'){ 
						$menus_array =get_terms('menutype','hide_empty=0&orderby='.$atpmenuorder.'&order=ASC');
						foreach ($menus_array as $menus){
							$dynamic_menus[$menus->slug] = $menus->name;
							$t_id = $menus->term_id; 	
							$term_meta = get_option("taxonomy_$t_id");
							$menuorders[] = $term_meta['display_order'];
						}

						$menuorders=array_unique($menuorders);
						sort($menuorders);
					
						foreach($menuorders as $menut) {
							foreach ($menus_array as $menus) {
								$dynamic_menus[$menus->slug] = $menus->name;
								$t_id = $menus->term_id; 	
								$term_meta = get_option("taxonomy_$t_id");
								if($term_meta['display_order'] == $menut ) {
									echo '<div class="menus_cat_item">';
									echo '<h3 class="menu-title"><a href="'.get_term_link($menus->slug,'menutype') .'">'.$menus->name.'</a></h3>';
									echo '<div class="menus_cat">';
									if($term_meta['img']!=''){
										echo '<a href="'.get_term_link($menus->slug,'menutype') .'">';
										echo atp_resize('',$term_meta['img'],420,200,'imgborder','');
										echo '</a>';	
									}else{
										// No Image
									}
									echo '</div>';	
									//echo '<h5 class="menu-description">'.$menus->description.'</h5>';
									echo '</div>';
								}
							}
						}
					}else{
						$menus_array =get_terms('menutype','hide_empty=0&orderby='.$atpmenuorder.'&order=ASC');
						foreach ($menus_array as $menus) {
							$dynamic_menus[$menus->slug] = $menus->name;
							$t_id = $menus->term_id; 	
							$term_meta = get_option("taxonomy_$t_id");
						
							echo '<div class="menus_cat_item">';
							echo '<h3 class="menu-title"><a href="'.get_term_link($menus->slug,'menutype') .'">'.$menus->name.'</a></h3>';
							echo '<div class="menus_cat">';
							if($term_meta['img']!=''){
								echo '<a href="'.get_term_link($menus->slug,'menutype') .'">';
								echo atp_resize('',$term_meta['img'],420,200,'imgborder','');
								echo '</a>';	
							}else{
								// No Image
							}
							echo '</div>';	
							//echo '<h5 class="menu-description">'.$menus->description.'</h5>';
							echo '</div>';
						}
					} ?>
					</div>
					<!-- .menus_container -->
					
					<div class="clear"></div>
					
					<?php edit_post_link(__('Edit', 'THEME_FRONT_SITE'), '<span class="edit-link">', '</span>'); ?>
				</div>
				<!-- .content -->
			</div>
			<!-- #main -->

			<?php if($sidebaroption != "fullwidth"){ get_sidebar(); } ?>
			<!-- #sidebar -->

		</div>
		<!-- inner -->
	<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>
	</div>
	<!-- end:pagemid-->
<?php get_footer(); ?>