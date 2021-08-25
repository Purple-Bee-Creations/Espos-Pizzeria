<?php 

	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */
	global $sidebaroption, $atp_singlenavigation,$comments;
	
	$item_price = get_post_meta($post->ID,'price',TRUE);
	$moreprices = get_post_meta(get_the_id(),'moreprice',true);
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>"  <?php post_class('menus_single');?>>

	<div class="menu_content">
		
		<h2 class="entry-title"><?php the_title(); ?></h2>

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

		
		<?php
		if( has_post_thumbnail()){
			$width = ($sidebaroption === "fullwidth") ? '920' : '660' ; 
			$height = get_option('atp_psd_imgheight') ? get_option('atp_psd_imgheight'): '200';
		?>

		<div class="menus_single_img">
		<?php echo atp_generator('getPostAttachments',$post->ID,'','',$width,'',''); ?>
		</div>
		<!-- .menus_single_img -->
		<div class="clear"></div>
		<?php } ?>

		<?php the_content(); ?>
		<div class="clear"></div>

		<div class="posttags"><?php the_tags(); ?></div>

	</div>
	<!-- .menu_content -->

</div>
<!-- .menu_single -->

<?php edit_post_link( __( 'Edit Item', 'THEME_FRONT_SITE' ), '<span class="edit-link">', '</span>' ); ?>

<?php if($atp_singlenavigation) { ?>
	<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php previous_post_link('%link') ?></div>
			<div class="nav-next"><?php next_post_link('%link') ?></div>
	</div>
<!-- #nav-below -->
<?php } ?>
	
<div class="clear"></div>


<?php endwhile; else: ?>
<h2><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'THEME_FRONT_SITE' ); ?></h2>
<?php endif; ?>