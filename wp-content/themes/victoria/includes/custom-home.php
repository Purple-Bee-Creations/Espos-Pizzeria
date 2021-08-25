<?php
	global $frontpageid;
	//get sidebaroption selection and decide on main division tag styling
	$sidebaroption = get_post_meta($frontpageid, "sidebar_options", TRUE);
	if(function_exists('icl_object_id')){
		$element_id= icl_object_id($frontpageid, 'page');
	}else{
		 $element_id=$frontpageid;
	}
	
if($sidebaroption != "fullwidth"){ 
	$homeid = "main";
} else 
{
	$homeid= "fullwidth";
}

?>
	<div id="<?php echo $homeid; ?>">
		<div class="content">
		<?php 
		if( !empty( $frontpageid ) ){
			$page_data = get_post( $element_id );
			if(!empty($page_data)){;
				echo do_shortcode( $page_data->post_content );
			}// Output Content
		} else {
			get_template_part('loop');
		}
		?>
		</div>
		<!-- .content -->
	</div>
	<!-- #main -->

	<?php 
	//get the homepage sidebar if layoiut is not FullWidth
	if($sidebaroption != "fullwidth"){ 
		get_sidebar('home');
	}
	?>
	<div class="clear"></div>