<?php

	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */
	global $relatedposts,$atp_singlefeaturedimg, $aboutauthor, $atp_singlenavigation, $comments;
	$sidebaroption = get_post_meta($post->ID, "sidebar_options", TRUE);
	?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>"  <?php post_class();?>>
		
		<h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'THEME_FRONT_SITE' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php echo atp_generator('postmetaStyle1'); ?>

		<?php 
		// Get info from options panel to display the post featured image
		if($atp_singlefeaturedimg != 'on') {
				
				$width=($sidebaroption==="fullwidth") ?'920':'640'; 
				$height = "300";
			?>
			<div  class="postimg">
				<?php echo atp_generator('getPostAttachments',$post->ID,'','',$width,'',''); ?>	
			</div>
			<!-- .postimg -->
		<?php	
		}
		?>

		<?php the_content(); ?>
		
		<span class="posttags"><?php the_tags(); ?></span><br />

		<?php
		if(get_option('atp_aboutauthor') != "on") { 
			echo atp_generator('aboutauthor');
		}
		?>	
		<!-- #entry-author-info -->
		
		<?php if(get_option('atp_singlenavigation') != 'on') { ?>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php previous_post_link('%link') ?></div>
			<div class="nav-next"><?php next_post_link('%link') ?></div>
		</div>
		<!-- #nav-below-->
		<?php } ?>

	</div>
	<!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>
	<?php  if($relatedposts != "on") { 
			echo atp_generator('relatedposts',$post->ID);
		} ?>
	<!-- .singlepostlists -->

	<div class="clear"></div>


	<?php
	if($comments=="posts" ||  $comments=="both") {
		comments_template('', true); 
	}
	?>
	<!-- #comments -->

	<?php else: ?>
	<h2><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'THEME_FRONT_SITE' ); ?></h2>
	<?php endif; ?>