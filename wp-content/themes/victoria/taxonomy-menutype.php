<?php get_header(); ?>
<?php

	/**
	 * Required variables for taxonomy
	 */

	global $wp_query; 
	
	$taxonomy_archive_query_obj = $wp_query->get_queried_object();// Get taxonomy object
	$taxonomy_term_nice_name = $taxonomy_archive_query_obj->name; // Taxonomy term name
	$term_id = $taxonomy_archive_query_obj->term_taxonomy_id; // Taxonomy term id
	$taxonomy_short_name = $taxonomy_archive_query_obj->taxonomy; // Get taxonomy shortname
	$taxonomy_raw_obj = get_taxonomy($taxonomy_short_name); // Get taxonomy raw object
	$taxonomy_full_name = $taxonomy_raw_obj->labels->name;
	
?>
<?php 

	if($atp_teaser !="disable") { 
	?>
	<div id="subheader" class="subheader">
		<div class="subheader_teaser">
			<div class="subtitle"><h1><?php _e($taxonomy_term_nice_name,'THEME_FRONT_SITE'); ?></h1></div>
		</div>
	</div>
	<?php } ?>
	<!-- #subheader -->

	<div class="pagemid">
		
		<div class="inner">

			<div id="main">

				<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>
				<!-- #breadcrumbs -->
<a href="javascript:go(-1)">Go Back</a>

				<div class="content">
				<?php
					if ( get_query_var('paged') ) {
						$paged = get_query_var('paged');
					}
					elseif ( get_query_var('page') ) {
						$paged = get_query_var('page');
					} else {
						$paged = 1;  
					}
					query_posts( array_merge( array(
						'posts_per_page' => -1,
						'paged'=>$paged
						), $wp_query->query ) );
					get_template_part( 'loop', 'taxonomy' );?>

				</div>
				<!-- .content -->
			
			</div>
			<!-- #main -->

			<?php get_sidebar(); ?>
			<!-- #sidebar -->
			
		</div>
		<!-- .inner -->

		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>

	</div>
	<!-- .pagemid -->

<?php get_footer(); ?>