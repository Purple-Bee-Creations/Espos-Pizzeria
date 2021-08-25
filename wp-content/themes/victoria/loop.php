<?php
	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */
	global $readmoretxt;
	$sidebaroption = get_post_meta($post->ID, "sidebar_options", TRUE);
	?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div <?php post_class();?> id="post-<?php the_ID(); ?>">
	
		<div class="post_content">
			
			<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'THEME_FRONT_SITE' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="postmeta">
				<div class="postmetadata">
					<span><img src="<?php echo get_template_directory_uri();?>/images/date_micon.png" alt="" style="vertical-align:middle;" /> <?php the_time('j M, y'); ?>&nbsp;/&nbsp;</span>
					<span><img src="<?php echo get_template_directory_uri();?>/images/postedin_micon.png" alt=" " style="vertical-align:middle;" /> <?php the_category(', ') ?>&nbsp;/&nbsp;</span>
					<span><img src="<?php echo get_template_directory_uri(); ?>/images/author_micon.png" alt="" style="vertical-align:middle;" /> <?php the_author_posts_link(); ?>&nbsp;/&nbsp;</span>
					<span><img src="<?php echo get_template_directory_uri(); ?>/images/comments_micon.png" alt="" style="vertical-align:middle;" /> <?php comments_popup_link( __( '0 Comments', 'THEME_FRONT_SITE' ), __( '1 Comment', 'THEME_FRONT_SITE' ), __( '% Comments', 'THEME_FRONT_SITE' ) );?> </span>
				</div>		
			</div>
			<!-- .postmeta -->
	
			<?php
			if( has_post_thumbnail()){
				$width = ($sidebaroption === "fullwidth") ? '960' : '640' ; 
				$height = get_option('atp_psd_imgheight')? get_option('atp_psd_imgheight'): '150';
			?>
			<div class="postimg">
			<?php echo atp_generator('getPostAttachments',$post->ID,'','',$width,'',''); ?>
			</div>
			<!-- .postimg -->
			<?php } ?>
			<div class="clear"></div>

			<?php 
			global $more; $more = 0; 
			the_excerpt('');
			?>
			
			<p><a href="<?php the_permalink() ?>" ><?php echo $readmoretxt;?></a></p>

		</div>
	</div>
	
	<?php 
	endwhile; 
	?>

	<?php 
	if(function_exists('atp_pagination')) { 
		atp_pagination(); 
	} ?>
	<!-- #pagination -->
	<?php else : ?>
	<h2><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'THEME_FRONT_SITE' ); ?></h2>
	<?php get_search_form(); ?>
	<?php endif; ?>