<?php
/**
 * Plugin Name: Business Hours Widget
 * Description: A widget used for displaying business hours.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
	// Register Widget 
	function businesshours_widgets() {
		register_widget( 'businesshours_widgets' );
	}
	
	// Define the Widget as an extension of WP_Widget
	class businesshours_widgets extends WP_Widget {
		/* constructor */
		function businesshours_widgets() {
			
			/* Widget settings. */
			$widget_ops = array(
				'classname'		=> 'businesshours_widgets',
				'description'	=> __('Display Business Hours .', 'atp_admin')
			);

			/* Widget control settings. */
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'businesshours_widgets'
			);

			/* Create the widget. */
			$this->WP_Widget( 'businesshours_widgets',THEMENAME.'- Business Hours', $widget_ops, $control_ops );
		}

		// outputs the content of the widget
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$businesshours_title = $instance['businesshours_title'];
		
			$group_days=$instance['group_days'];

			$before_title	='<h3 class="widget-title">';
			$after_title	= '</h3>';
			$before_widget	='<div id="businesshours" class="widget businesshours">';
			$after_widget	='<div class="clear"></div></div>';
			$closed_txt=get_option('atp_closedtxt')?get_option('atp_closedtxt'):'Closed';
			/* Before widget (defined by themes). */
			echo $before_widget;
			/* Title of widget (before and after defined by themes). */
			$out='';//stores the output
			echo $before_title.$businesshours_title.$after_title;

			
		
			$week_hours = array(
							'Sunday'	=> get_option('atp_sunday'),
							'Monday'	=> get_option('atp_monday'),
							'Tuesday'	=> get_option('atp_tuesday'),
							'Wednesday'	=> get_option('atp_wednesday'),
							'Thursday'	=> get_option('atp_thursday'),
							'Friday'	=> get_option('atp_friday'),
							'Saturday'	=> get_option('atp_saturday')
							);
			$i =0; 
			// 24 Hous Format
			if(get_option('atp_timeformat')=='24'){
				
				foreach($week_hours as $week_day => $day_hours) {
					if($day_hours['close']=='on') {
						$arr[$i]=$closed_txt;
						//$out.='<p><span>'.$week_day.':</span><strong>Closed</strong></p>';
					} else {
					
						list($open_hours,$open_min) = explode(':',$day_hours['opening']);
						list($close_hours,$close_min) = explode(':',$day_hours['closing']);
						// $arr[$i]=$day_hours['opening'].' - '.$day_hours['closing'];
						$arr[$i]= sprintf('%02d:%02d',$open_hours,$open_min).' -'.sprintf('%02d:%02d',$close_hours,$close_min);
					}
					$i++;
				}
				
			}else if(get_option('atp_timeformat')=='12'){

				foreach($week_hours as $week_day => $day_hours) {
	
					if($day_hours['close']=='on') {
						$arr[$i]=$closed_txt;
					} else {
						list($open_hours,$open_min) = explode(':',$day_hours['opening']);
						list($close_hours,$close_min) = explode(':',$day_hours['closing']);

 							$day_hours['opening'] = $day_hours['opening'].':'.'00';
							 $day_hours['closing'] = $day_hours['closing'].':'.'00';
							$arr[$i]=date("g:i A", strtotime($day_hours['opening'])).' - '.date("g:i A", strtotime($day_hours['closing']));
			
					}
					$i++;
				}
			}
			
		$array_days=array('atp_sundaytxt','atp_mondaytxt','atp_tuesdaytxt','atp_wednesdaytxt','atp_thursdaytxt','atp_fridaytxt','atp_saturdaytxt');
		$arr_weekdays=array();
		foreach($array_days as $days){
			$arr_weekdays[]=get_option($days);
		}
		//print_r($arr_weekdays);


	// Grouping Days
	if($group_days==="true") {
		$tmp_arr = array();
		$tmp_arr = $arr;
		for($i=1;$i<=6;$i++) {
			if($arr[$i] != $arr[$i-1]) {
				$tmp_arr[$i]=$arr[$i];
			} else {
				unset($tmp_arr[$i]);
			}
		}
		$prev_key =0;
		foreach($tmp_arr as $key => $val) { 
			if(!isset($tmp_arr[$key+1]) && $key<6){
				echo '<p><span class="days">'.$arr_weekdays[$key].' - ';
				 if(key($tmp_arr)!=''){
				$next_key = key($tmp_arr);
				echo $arr_weekdays[$next_key-1].'  </span><span class="hours">'.$tmp_arr[$key].'</span></p>';
				} else {
					echo  $arr_weekdays[6].' </span><span class="hours">'.$tmp_arr[$key].'</span></p>';
				}
				//prev($tmp_arr);
			
			} else {
				echo '<p><span class="days">'.$arr_weekdays[$key].'  </span><span class="hours">'.$val.'</span></p>';
			}
		next($tmp_arr);
		}
		}else {
			// With Out Grouping Days
			for($number=0;$number<=6; $number++)
		{
		echo '<p><span class="days">'.$arr_weekdays[$number].'</span><span class="hours">'.$arr[$number].'</span></p>';
	
		}
		}
			// 12 Hours Format
			echo $out;
			/* After widget (defined by themes). */
			echo $after_widget;
		}

		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['businesshours_title'] = strip_tags( $new_instance['businesshours_title'] );
			$instance['group_days'] = strip_tags( $new_instance['group_days'] );
			return $instance;
		}

		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args( (array) $instance, array( 
				'businesshours_title' => '',
				'group_days'=>'') 
				);
			$businesshours_title = strip_tags($instance['businesshours_title']);
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'businesshours_title' ); ?>"><?php _e('Title:', 'THEME_FRONT_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'businesshours_title' ); ?>" name="<?php echo $this->get_field_name( 'businesshours_title' ); ?>" value="<?php echo $businesshours_title; ?>" type="text" style="width:100%;" />
			</p>
		

			<p>
			<input type="checkbox" value="true" id="<?php echo $this->get_field_id( 'group_days' ); ?>" name="<?php echo $this->get_field_name( 'group_days' ); ?>" <?php  if( $instance['group_days']=="true") { echo "checked"; } ?> class="checkbox" /> <label for="<?php echo $this->get_field_id( 'group_days' ); ?>"><?php _e('Check this if you wish to group the days, if time for the days are same.?', 'atp_admin'); ?></label>		</p>
		<?php 
		} 
	}
	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'businesshours_widgets' );
 ?>