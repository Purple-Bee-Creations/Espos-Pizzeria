<?php

	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */

	global $atp_pagination;
	$sidebaroption = get_post_meta($post->ID, "sidebar_options", TRUE);
	
	?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div <?php post_class('menulist');?> id="post-<?php the_ID(); ?>">
		<div class="menuthumb">
		<?php if( has_post_thumbnail()){ $width= '80';  $height = '80'; ?>
			<div class="menuimg" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px; ">
			<?php echo atp_resize($post->ID,'',$width,$height,'image',''); ?>
			</div>
		<?php } ?>

		<div class="pricebox">
		<?php
			$item_price = get_post_meta(get_the_id(),'price',true);
			if($item_price) { 
				echo '<span class="price">'. $item_price.'</span>';
			} 
			$moreprices = get_post_meta(get_the_id(),'moreprice',true);
			if(is_array($moreprices)){ 
				foreach($moreprices as $itemprice) {
				echo '<span class="price">'. $itemprice. '</span>';
				}
			}?>
		</div>

		</div>
		<!-- .menuimg -->

		<div class="menu-info">
			<h4 class="menu-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'THEME_FRONT_SITE' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h4>
			<?php echo get_post_meta($post->ID,'item_desc',TRUE); ?>
			<?php if(function_exists('the_ratings')) the_ratings();?>
		</div>
		<!-- .menu-info -->

	</div>
	<!-- .menulist-->
	<?php endwhile; ?>

	<?php 
	if(function_exists('atp_pagination')) { 
		atp_pagination(); 
	} ?>
	<!-- #pagination -->
	<?php else : ?>
	<h2><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'THEME_FRONT_SITE' ); ?></h2>
	<?php get_search_form(); ?>
	<?php endif; ?>