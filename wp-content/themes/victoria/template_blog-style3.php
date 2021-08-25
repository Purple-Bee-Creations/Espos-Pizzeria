<?php
/*
Template Name: Blog Style 3
*/
get_header();
?>
<?php
	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */

	global $atp_teaser, $atp_breadcrumbs, $comments, $atp_pagination, $readmoretxt, $paged;
	$sidebaroption = get_post_meta($post->ID, "sidebar_options", TRUE);
	$subheader_teaser_options = get_post_meta($post->ID, "subheader_teaser_options", true);
	$height = get_option('atp_ps3_imgheight')? get_option('atp_ps3_imgheight'): '100';
	$cats='';

?>
 <?php echo atp_generator('subheader',$post->ID); ?>
	<!-- #subheader -->

	<div class="pagemid <?php echo atp_generator('sidebaroption',$post->ID); ?>">
		
		<div class="inner">

				<div <?php echo atp_generator('atp_layout',$post->ID); ?>>
	
				<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>
				<!-- #breadcrumbs -->	

				<div class="content">	 
					<?php
					if(is_array($blog_all_cats=get_option('atp_blogcats')) && count($blog_all_cats)>0) {
					$cats=implode(",",$blog_all_cats);
					}		
					if ( get_query_var('paged') ) {
						$paged = get_query_var('paged');
					}
					elseif ( get_query_var('page') ) {
						$paged = get_query_var('page');
					} else {
						$paged = 1;  
					}
					query_posts("cat=$cats.&paged=$paged");
					?>
					<?php
						// Column Indexing
						$column="3";
						$c="0";
						if (have_posts()) : while (have_posts()) : the_post(); 
						$c++;
						$last = ($c == $column && $column != 1) ? 'last ' : '';
					?>
					<div id="post-<?php the_ID(); ?>" class="post3 <?php echo $last; ?>">
			
						<div class="post_content">
						
							<?php 
							if( has_post_thumbnail()){ 
								$width=($sidebaroption==="fullwidth") ?'270':'170'; ?>
								<div class="postimg">	
									<?php echo atp_generator('getPostAttachments',$post->ID,'','',$width,$height,''); ?>
								</div>
				
							<?php } ?>
							<!-- .postimg -->

							<div class="post-info">
								<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'THEME_FRONT_SITE' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<?php echo atp_generator('postmetaStyle3'); ?>
							</div>
							<!-- .post-info -->
		
							<?php 
								global $more; $more = 0;  
								excerpt('20'); ?>		
							
							<a href="<?php the_permalink() ?>" class="more-link"><?php echo $readmoretxt;?></a>
					
						</div>
						<!-- .post_content -->
					
					</div>
					<!-- #post-<?php the_ID();?> -->
					
					<?php if($c == $column){ $c = 0; echo '<div class="divider_line"></div>'; } // Add divider after each row ?>

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
				</div>
				<!-- .content -->
			
			</div>
			<!-- #main -->
	
			<?php if($sidebaroption != "fullwidth"){ get_sidebar(); } ?>
			<!-- #sidebar -->

			<div class="clear"></div>
		
		</div>
		<!-- .inner -->
		
		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>
	</div>
	<!-- .pagemid-->
	
<?php get_footer(); ?>