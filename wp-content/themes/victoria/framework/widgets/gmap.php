<?php
/**
 * googlmap_Widget' is the widget class used below.
 */
	function gmap_widgets() {
		register_widget( 'gmap_widgets' );
	}
	class gmap_widgets extends WP_Widget {
		/**
		* googlemap widget setup.
		*/
		function gmap_widgets() {
			global $theme_name;
			/* Widget settings. */
			$widget_ops = array(
				'classname'		=> 'gmap_widgets',
				'description'	=> __('Add Google Map to your sidebar  .', 'atp_admin')
			);
	
			/* Widget control settings. */
			$control_ops = array(
				'width'		=> 500,
				'height'	=> 550,
				'id_base'	=> 'gmap_widgets'
			);
	
			/* Create the widget. */
			$this->WP_Widget( 'gmap_widgets',THEMENAME.' - Google Map', $widget_ops, $control_ops );
		}

		/**
		* How to display the widget on the screen.
		*/
		function widget( $args, $instance ) {
			extract( $args );
			wp_print_scripts('jquery-gmap');
			wp_print_scripts('jquery-gmapmin');
	
			$g_title = $instance['g_title'];
			$g_address = $instance['g_address'];
			$g_latitude = !empty($instance['g_latitude'])?$instance['g_latitude']:'';
			$g_longitude = !empty($instance['g_longitude'])?$instance['g_longitude']:'';
			$g_zoom = (int)$instance['g_zoom'];
			$g_html = $instance['g_html'];
			$g_height = (int)$instance['g_height'];
	
			echo $before_widget;
			echo $before_title.$g_title.$after_title;
			$id = rand(1,400);
		?>
	<div class="atpmap" id="gmap_widget_<?php echo $id;?>"  style="height:<?php echo $g_height;?>px"></div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
	
		jQuery("#gmap_widget_<?php echo $id;?>").gMap({
		icon: {
		    image: '<?php echo THEME_URI; ?>/images/gmap_marker.png',
	        iconsize: [20, 32],
	        iconanchor: [0, 32],
	        infowindowanchor: [20, 0],
		    },
		zoom: <?php echo $g_zoom;?>,
		markers:[
			<?php
			if($g_latitude && $g_longitude)
			{
           echo '{';
			echo 'latitude:"'.$g_latitude.'",';
	    	echo 'longitude:"'.$g_longitude.'",';
			echo 'html:"_latlng"';
        	echo '},';
			}
			
			$counts=count($instance['g_address']);
			//echo $instance['g_address'][1];
			$i=1;
				for($j=0; $j<$counts; $j++) {
				$html_address=$instance['g_html'][$j] ? $instance['g_html'][$j]: "_address";
			echo '{';
			echo 'address:" '.$instance['g_address'][$j].'",';
	    	echo 'html:" '.html_entity_decode($html_address).'"';
			echo '}';
			
			
			if($counts!=$i)
			{
			echo ',';
			}
			$i++;
			}
			?>

		],
		controls: false,
		
	});
});
</script>
<?php
	/* After widget (defined by themes). */
	echo $after_widget;
	//$instance['g_address'] =array();
}
/**
 * Update the Contact Widget Settings.
 */
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	/* Strip tags for title and name to remove HTML (important for text inputs). */
	$instance['g_title'] = strip_tags( $new_instance['g_title'] );
	
	$instance['g_address'] = $new_instance['g_address']; 
	//echo $days = implode(",",$new_instance['g_address']); 

	$instance['g_latitude'] = strip_tags( $new_instance['g_latitude'] );
	$instance['g_longitude'] = strip_tags( $new_instance['g_longitude'] );
	$instance['g_zoom'] = strip_tags( $new_instance['g_zoom'] );
	$instance['g_height'] = strip_tags( $new_instance['g_height'] );
	$instance['g_html'] =$new_instance['g_html'];
	return $instance;
}
function form( $instance ) {
	/* Set up some default widget settings. */
		$instance = wp_parse_args( (array) $instance, array( 'g_title' => '', 'g_address' => '', 'g_latitude' => '' , 'g_longitude' => '' , 'g_zoom' => '' , 'g_html' => '' , 'g_height' => ''  ) );
		$g_title = strip_tags($instance['g_title']);
		$g_latitude = strip_tags($instance['g_latitude']);	
		$g_longitude = strip_tags($instance['g_longitude']);	
		$g_zoom = strip_tags($instance['g_zoom']);	
		$g_height = strip_tags($instance['g_height']);			
	$g_popup = isset( $instance['g_popup'] ) ? (bool) $instance['g_popup'] : false;
	$g_address = isset($instance['g_address']) ? $instance['g_address'] : array();
	$g_html = isset($instance['g_html']) ? $instance['g_html'] : array();
?>
<!-- Google Map Widget Input -->
<p>
<label for="<?php echo $this->get_field_id( 'g_title' ); ?>"><?php _e('Title:', 'example'); ?></label>
<input id="<?php echo $this->get_field_id( 'g_title' ); ?>" name="<?php echo $this->get_field_name( 'g_title' ); ?>" value="<?php echo $g_title; ?>" type="text" style="width:100%;" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'g_latitude' ); ?>"><?php _e('Latitude:', 'example'); ?></label>
<input id="<?php echo $this->get_field_id( 'g_latitude' ); ?>" name="<?php echo $this->get_field_name( 'g_latitude' ); ?>" value="<?php echo $g_latitude; ?>" type="text" style="width:100%;" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'g_longitude' ); ?>"><?php _e('Longitude:', 'example'); ?></label>
<input id="<?php echo $this->get_field_id( 'g_longitude' ); ?>" name="<?php echo $this->get_field_name( 'g_longitude' ); ?>" value="<?php echo $g_longitude; ?>" type="text" style="width:100%;" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'g_zoom' ); ?>"><?php _e('Zoom value from 1 to 19:', 'example'); ?></label>
<input id="<?php echo $this->get_field_id( 'g_zoom' ); ?>" name="<?php echo $this->get_field_name( 'g_zoom' ); ?>" value="<?php echo $g_zoom; ?>" type="text" style="width:100%;" />
</p>
<p>
<?php
	echo '<table id="custom_widget_table1" cellpadding="0" cellspacing="0">';
	echo '<tbody>'; 
	$counts = count($instance['g_address']);
	for($i=0; $i<$counts; $i++) {
			$gadd=isset($instance['g_address'][$i]) ? $instance['g_address'][$i] :'';
			$ghtml=isset($instance['g_html'][$i]) ? $instance['g_html'][$i] :'';
		echo '<tr><td>Address<input type="text"  name="'.$this->get_field_name( 'g_address' ).'[]"  value="'. $gadd.'" class="widefat" size="30" style="width:97%" /></td><td>Description<input type="text"  name="'.$this->get_field_name( 'g_html' ).'[]"  value="'. $ghtml.'"  size="30" style="width:97%" /></td><td><a class="button-primary" href="javascript:void(0);return false;" onClick="jQuery(this).parent().parent().remove();"><span>Delete</span></a></td></tr>';
	}
	echo '</tbody></table><input type="button" class="button-primary" name="add_custom_widget" value="Add Address" onClick="addWidgetRow()" value="Add New" />';
	?>
<script type="text/javascript" language="javascript">
function addWidgetRow(){
	jQuery('table#custom_widget_table1').append('<tr><td>Address<input type="text" id="g_address[]" name="<?php echo $this->get_field_name( 'g_address' ); ?>[]" value="" class="widefat" size="30" style="width:97%" /></td><td>Description<input type="text" id="g_html[]" name="<?php echo $this->get_field_name( 'g_html' ); ?>[]" value="" size="30" style="width:97%" /></td><td><a class="button-primary" href="javascript:void(0);return false;" onClick="jQuery(this).parent().parent().remove();"><span>Delete</span></a></td></tr>');
}
</script>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'g_height' ); ?>"><?php _e('Height:', 'example'); ?></label>
<input id="<?php echo $this->get_field_id( 'g_height' ); ?>" name="<?php echo $this->get_field_name( 'g_height' ); ?>" value="<?php echo $instance['g_height']; ?>" type="text" style="width:100%;" />
</p>
<?php }
}
add_action( 'widgets_init', 'gmap_widgets' );
 ?>