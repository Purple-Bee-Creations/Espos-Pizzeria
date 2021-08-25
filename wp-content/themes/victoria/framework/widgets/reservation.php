<?php
/**
 * Plugin Name: Table Reservation
 * Description: A widget used for displaying Reservation form.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
	// Register Widget 
	function reservation_form_widgets() {
		register_widget( 'reservation_widget' );
	}

	// Define the Widget as an extension of WP_Widget
	class reservation_widget extends WP_Widget {
		/* constructor */
		function reservation_widget() {
			
			// Widget Settings
			$widget_ops = array( 
				'classname'		=> 'reservation_widget',
				'description'	=> __('Table Reservation Widget for Sidebar or any Widgetized Area.', 'atp_admin')
			);

			// Widget control settings.
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'reservation_widget'
			);

			// Create the widget.
			$this->WP_Widget('reservation_widget', THEMENAME.' - Table Reservation', $widget_ops, $control_ops );
		}

		// outputs the content of the widget
		function widget($args,$instance) {
		
			extract( $args );
			if(isset($instance['semail'])){
				$semail = $instance['semail'];
			}
	
			/* Our variables from the widget settings. */
			/* Get all the Business hours*/
			$people_txt		 = get_option('atp_peopletxt') ? get_option('atp_peopletxt') : 'People';
			$time_txt		 = get_option('atp_timetxt') ? get_option('atp_timetxt') : 'Time';
			$closedmsg_txt	 = get_option('atp_closedmsgtxt') ? get_option('atp_closedmsgtxt') : 'Sorry Closed this day';
			$sunday_hours	 = get_option('atp_sunday');
			$monday_hours	 = get_option('atp_monday');
			$tuesday_hours	 = get_option('atp_tuesday');
			$wednesday_hours = get_option('atp_wednesday');
			$thursday_hours	 = get_option('atp_thursday');
			$friday_hours	 = get_option('atp_friday');
			$saturday_hours	 = get_option('atp_saturday');
			
			//get timeformat
			$timeformat = get_option('atp_timeformat');
			$firstday	= get_option('atp_firstday');

			$title = $instance['reservation_title'];
		
			$reservationtitle	="Table Reservation";

			/* Before widget (defined by themes). */
			echo $before_widget;
			/* Title of widget (before and after defined by themes). */
			if($title) 
			echo $before_title.$title.$after_title; ?>
			<script type="text/javascript">
			/* <![CDATA[ */
			<?php $day_array=array('sunday_hours','monday_hours','tuesday_hours','wednesday_hours','thursday_hours','friday_hours','saturday_hours');
					foreach ($day_array as $days){
					$daytext=$ $days;

					?>
					var <?php echo $days ?> = new Array('<?php echo ltrim(substr($daytext['opening'],0,2),'0');?>','<?php echo ltrim(substr($daytext['closing'],0,2),'0');?>','<?php echo ltrim(substr($daytext['opening'],3,2),'0');?>','<?php echo ltrim(substr($daytext['closing'],3,2),'0');?>','<?php echo $daytext['close'];?>','<?php echo $timeformat;?>');
					<?php
					}
				?>
						var calander_business_hours = new Array(monday_hours,tuesday_hours,wednesday_hours,thursday_hours,friday_hours,saturday_hours,sunday_hours);
				

				//get the working hours when selected any date on the calendar
				function onSelectCalendarDate(dateText, inst) {

					var date;
					if(dateText == '')
						date = new Date();
					else
						date = 	jQuery("#widgetdateselect").datepicker('getDate');
					
					var dayOfWeek = date.getUTCDay();
				
					var applicable_hours = calander_business_hours[dayOfWeek];
					if(applicable_hours[0] == '')
						applicable_hours[0] ='0';
					
					if(applicable_hours[1] == '')
						applicable_hours[1] ='0';
						
					if(applicable_hours[2] == '')
						applicable_hours[2] ='0';
					
					if(applicable_hours[3] == '')
						applicable_hours[3] ='0';
						
					var start_hours = parseInt(applicable_hours[0]);
					var close_hours = parseInt(applicable_hours[1]);
					var start_mins = parseInt(applicable_hours[2]);
					var close_mins = parseInt(applicable_hours[3]);
					var closed = applicable_hours[4];
					var format = applicable_hours[5];

					var options_str = ''; //stores options of the hours

					//handle 24 or 12 hours 
					if(format == 24){
						//handle exceptional cases like close time more than midnight 12
						if(close_hours < start_hours)
							close_hours = 24;
						
						loop_index = 0;
						while(start_hours <= close_hours)  {
						
							start_hours = (start_hours < 10 ? '0' : '') + start_hours
							
							if(loop_index++ == 0) {
								if(start_mins == 0) options_str +='<option value="'+start_hours+':00">'+start_hours+':00</option>';
								if(start_mins <= 15) options_str +='<option value="'+start_hours+':15">'+start_hours+':15</option>';
								if(start_mins <= 30) options_str +='<option value="'+start_hours+':30">'+start_hours+':30</option>';
								if(start_mins <= 45) options_str +='<option value="'+start_hours+':45">'+start_hours+':45</option>';
								start_hours++;
								continue;
							}
							if(start_hours == close_hours) {
								if(close_mins > 0) options_str +='<option value="'+start_hours+':00">'+start_hours+':00</option>';
								if(close_mins > 15) options_str +='<option value="'+start_hours+':15">'+start_hours+':15</option>';
								if(close_mins > 30) options_str +='<option value="'+start_hours+':30">'+start_hours+':30</option>';
								
							} else {
								options_str +='<option value="'+start_hours+':00">'+start_hours+':00</option>';
								options_str +='<option value="'+start_hours+':15">'+start_hours+':15</option>';
								options_str +='<option value="'+start_hours+':30">'+start_hours+':30</option>';
								options_str +='<option value="'+start_hours+':45">'+start_hours+':45</option>';
							}
							
							start_hours++;
						
						}
					}else if(format == 12){
						
						//handle exceptional cases like close time more than midnight 12
						if(close_hours < start_hours)
							close_hours = 24;
						
						loop_index =0;
						while(start_hours <= close_hours)  {							
														
							am_or_pm = start_hours - 12 >= 0? 'PM':'AM';
							if(start_hours>12) {
								hours_label = start_hours - 12;
							}else{ 
								hours_label = start_hours
							}
							hours_label = (hours_label < 10 ? '0' : '') + hours_label;
							
							if(loop_index++ == 0) {
										if(start_mins == 0) options_str +='<option value="'+hours_label+':00'+am_or_pm+'">'+hours_label+':00'+am_or_pm+'</option>';
										if(start_mins <= 15) options_str +='<option value="'+hours_label+':15'+am_or_pm+'">'+hours_label+':15'+am_or_pm+'</option>';
										if(start_mins <= 30) options_str +='<option value="'+hours_label+':30'+am_or_pm+'">'+hours_label+':30'+am_or_pm+'</option>';
										if(start_mins <= 45) options_str +='<option value="'+hours_label+':45'+am_or_pm+'">'+hours_label+':45'+am_or_pm+'</option>';
										start_hours++;
										continue;
									}
									if(start_hours == close_hours) {
										if(close_mins > 0) options_str +='<option value="'+hours_label+':00'+am_or_pm+'">'+hours_label+':00'+am_or_pm+'</option>';
										if(close_mins > 15) options_str +='<option value="'+hours_label+':15'+am_or_pm+'">'+hours_label+':15'+am_or_pm+'</option>';
										if(close_mins > 30) options_str +='<option value="'+hours_label+':30'+am_or_pm+'">'+hours_label+':30'+am_or_pm+'</option>';
										
									} else {
										options_str +='<option value="'+hours_label+':00'+am_or_pm+'">'+hours_label+':00'+am_or_pm+'</option>';
										options_str +='<option value="'+hours_label+':15'+am_or_pm+'">'+hours_label+':15'+am_or_pm+'</option>';
										options_str +='<option value="'+hours_label+':30'+am_or_pm+'">'+hours_label+':30'+am_or_pm+'</option>';
										options_str +='<option value="'+hours_label+':45'+am_or_pm+'">'+hours_label+':45'+am_or_pm+'</option>';
									}
							
							start_hours++;
						}
					}

					jQuery('#reservationtime')
						.find('option')
						.remove()
						.end()
						.append(options_str);
					
				 	if(closed=='on') {
				 		jQuery('#reservationtime_para').hide();
				 		jQuery('#reservationtime_closed_para').show();
				 	} else {
				 		jQuery('#reservationtime_para').show();
				 		jQuery('#reservationtime_closed_para').hide();
					}
				}	

					
				jQuery(document).ready(function() {

					jQuery("#widgetdateselect").datepicker({
						dateFormat: "yy-mm-dd", 
						minDate: 0,
						//dayNamesMin : [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
						//monthNames: [ "Januar", "Februar", "Marts", "April", "Maj", "Juni", "Juli", "August", "September", "Oktober", "November", "December" ],
						firstDay:<?php echo ($firstday !='') ? $firstday :'0';?>,
						altField: "#dateselect",
						onSelect: onSelectCalendarDate
					});
					onSelectCalendarDate(jQuery("#widgetdateselect").datepicker(),'');					
				});	
			/* ]]> */
			</script>

			<div id="reservationform">
				<div id="formstatus"></div>
				<?php $reservation_pageid=get_option('atp_reservationpage'); 
				$time_txt=get_option('atp_timetxt')?get_option('atp_timetxt'):'Time';
				?>
				
				<form action="<?php echo esc_url(get_permalink($reservation_pageid)); ?>" method="post">
					<div id="reservations-calendar-main">
						<p><div id="widgetdateselect"></div><input type="hidden" name="dateselect" id="dateselect" value=""></p>
					</div>
					<p class="people center"><label><?php echo $people_txt; ?></label>
					<select id="numberofpeople" name="numberofpeople">
					<?php $people = get_option('atp_people') ? get_option('atp_people') : '12'; ?>
					<?php for($i = 0; $i <= $people; $i++ ) {
						echo '<option value="'.$i.'">'.$i.'</option>';
					}?>
					</select>
					</p>
					<p class="time center" id='reservationtime_para'>
						<label><?php echo $time_txt; ?></label>
						<select id="reservationtime" name="reservationtime">
						</select>
					</p>
					<p id='reservationtime_closed_para' style='display:none'>
						<?php echo $closedmsg_txt; ?>
					</p>
					<div class="clear"></div>
					<p><input class="txt input_medium" type="hidden" name="status" id="status" value="unconfirmed" /></p>							
					<p class="center"><button class="button large green"><span><?php echo get_option('atp_reservationformtxt') ? get_option('atp_reservationformtxt') :'Reserve Table'; ?></span></button></p>
					<div class="clear"></div>
				</form>
			</div>
<?php
			/* After widget (defined by themes). */
			echo $after_widget;
		}

		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['reservation_title'] = strip_tags( $new_instance['reservation_title'] );
			return $instance;
		}

		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args( (array) $instance, array( 'reservation_title' => '' ) );
			$reservation_title = strip_tags($instance['reservation_title']);
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'reservation_title' ); ?>"><?php _e('Title:', 'THEME_FRONT_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('reservation_title'); ?>" name="<?php echo $this->get_field_name('reservation_title'); ?>" value="<?php echo $reservation_title; ?>" style="width:100%;" />
			</p>
		<?php 
		} 
	} 
	
	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'reservation_form_widgets' );
	
?>