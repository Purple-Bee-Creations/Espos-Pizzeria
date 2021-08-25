<?php get_header(); ?>
<?php
	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */

	 global $atp_teaser, $atp_pagination, $readmoretxt;
	$sidebaroption = get_post_meta($post->ID, "sidebar_options", TRUE);
	$subheader_teaser_options = get_post_meta($post->ID, "subheader_teaser_options", true);
	?>
<?php 
	
	if($atp_teaser !="disable") { 	
		if($subheader_teaser_options !="disable") { ?>
	<div class="subheader" id="subheader">
		<div class="subheader_teaser">
			<div class='subtitle'>
				<h1><?php printf( __( 'Tag Archives: %s', '<?php _e('Top','THEME_FRONT_SITE')?>' ), '<span>' . single_cat_title( '', false ) . '</span>' );?></h1>
			</div>
			<?php 
				$category_description = category_description();
				if ( ! empty( $category_description ) )
				echo '<div class="sub-desc">' . $category_description . '</div>'; 
			?>
		</div>
	</div>
	<?php } 
	} 
	?>
	<!-- #subheader -->

	<div class="pagemid">
		
		<div class="inner">

			<div <?php echo atp_generator('atp_layout',$post->ID); ?>>

				<?php  $breadcrumb=get_post_meta($post->ID,'breadcrumb','true');
				if($breadcrumb!='on') { (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):''; }  ?>
				<!-- #breadcrumbs -->
				
				<div class="content">

	<ul class="list-square">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li <?php post_class('taglist');?> id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( "Permanent Link to %s", 'THEME_FRONT_SITE' ), esc_attr( get_the_title() ) ); ?>"><?php the_title(); ?></a>
				</li>
				<?php endwhile; endif;?>
				</ul>
				<?php 
				if(function_exists('atp_pagination')) {
					atp_pagination(); 
				} ?>
				<!-- #pagination -->
		

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