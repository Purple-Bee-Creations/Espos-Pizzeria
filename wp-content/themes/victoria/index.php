<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
get_header(); 

?>
	<div class="pagemid frontpage">
		<div class="inner">
		<?php get_template_part('loop'); ?>
		</div>
		<!-- inner -->
	<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>
	</div>
	<!-- end:pagemid-->
<?php get_footer(); ?>