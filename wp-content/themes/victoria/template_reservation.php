<?php
/*
Template Name: Reservation
*/
get_header();
?>
<?php

	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */

	global $atp_teaser, $atp_breadcrumbs;
	$sidebaroption = get_post_meta($post->ID, "sidebar_options", TRUE);
	$subheader_teaser_options = get_post_meta($post->ID, "subheader_teaser_options", true);
	?>
	<?php if ( get_post_meta($post->ID, 'page_bg_image', true) ) : ?>
	<img id="pagebg" src="<?php echo get_post_meta($post->ID, "page_bg_image", true); ?>" />
	<?php endif; ?>
 <?php echo atp_generator('subheader',$post->ID); ?>
	<!-- #subheader -->

	<div class="pagemid fullwidth">
		
		<div class="inner">
	
			<div id="mainfull">
			
				<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>
				<!-- #breadcrumbs -->
			
				<div class="content">
					<?php 
						the_content();
					
						$people_txt	= get_option('atp_peopletxt') ? get_option('atp_peopletxt') : 'People';
						$time_txt	= get_option('atp_timetxt') ? get_option('atp_timetxt') : 'Time';
						$name_txt	= get_option('atp_nametxt') ? get_option('atp_nametxt') : 'Name';
						$phone_txt	= get_option('atp_phonetxt') ? get_option('atp_phonetxt') : 'Phone';
						$email_txt	= get_option('atp_emailtxt') ? get_option('atp_emailtxt') : 'Email';
						$notes_txt	= get_option('atp_notestxt') ? get_option('atp_notestxt') : 'Notes';
						$closedmsgtxt = get_option('atp_closedmsgtxt') ? get_option('atp_closedmsgtxt') : 'Closed';
						$firstday	= get_option('atp_firstday') ? get_option('atp_firstday') : '';

						// Get Hours settings from theme options panel
						$sunday_hours = get_option('atp_sunday');
						$monday_hours = get_option('atp_monday');
						$tuesday_hours = get_option('atp_tuesday');
						$wednesday_hours = get_option('atp_wednesday');
						$thursday_hours = get_option('atp_thursday');
						$friday_hours = get_option('atp_friday');
						$saturday_hours = get_option('atp_saturday');

						$timeformat = get_option('atp_timeformat');//get timeformat
					?>
					<script type="text/javascript">
					function validateresult() {
					jQuery.post('<?php echo get_template_directory_uri(); ?>/reservation_insert.php', 
						jQuery("#reserveformid").serialize(),
						function(responseText) {
							document.getElementById("formstatus").innerHTML=responseText;
							if(responseText.search('success')>-1){
								document.reserveform.reset();
							}
						});
					}
					</script>
					<script type="text/javascript">
					/* <![CDATA[ */
				
					<?php 
					$day_array=array('sunday_hours','monday_hours','tuesday_hours','wednesday_hours','thursday_hours','friday_hours','saturday_hours');
					foreach ($day_array as $days){
					$daytext =$ $days;?>
					var <?php echo $days ?> = new Array('<?php echo ltrim(substr($daytext['opening'],0,2),'0');?>','<?php echo ltrim(substr($daytext['closing'],0,2),'0');?>','<?php echo ltrim(substr($daytext['opening'],3,2),'0');?>','<?php echo ltrim(substr($daytext['closing'],3,2),'0');?>','<?php echo $daytext['close'];?>','<?php echo $timeformat;?>');
					<?php	} ?>
						var calander_business_hours = new Array(monday_hours,tuesday_hours,wednesday_hours,thursday_hours,friday_hours,saturday_hours,sunday_hours);
						//get the working hours when selected any date on the calendar
						function onSelectCalendarDate(dateText, inst) {
					
							var date;
							if(dateText == '')
								date = new Date();
							else
								date = jQuery("#widgetdateselect").datepicker('getDate');
								
							var dayOfWeek = date.getUTCDay();	
							var applicable_hours = calander_business_hours[dayOfWeek];
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
										if(close_mins > 45) options_str +='<option value="'+hours_label+':45'+am_or_pm+'">'+hours_label+':45'+am_or_pm+'</option>';
										
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
							<?php if(isset($_POST['reservationtime']) && $_POST['reservationtime']) {  ?>
							jQuery("#reservationtime").val('<?php echo $_POST['reservationtime']; ?>');
							<?php } ?>
							if(closed=='on') {
								jQuery('#reservationtime_para').hide();
								jQuery('#reservationtime_closed_para').show();
							} else {
								jQuery('#reservationtime_para').show();
								jQuery('#reservationtime_closed_para').hide();
							}
							
							//select numberofpeople
							<?php if(isset($_POST['numberofpeople']) && $_POST['numberofpeople']) {  ?>
							jQuery("#numberofpeople").val('<?php echo $_POST['numberofpeople']; ?>');
							<?php } ?>
						}

						jQuery(document).ready(function() {
							jQuery("#widgetdateselect").datepicker({
								dateFormat: "yy-mm-dd", 
								minDate: 0,
								//dayNamesMin : [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
								//monthNames: [ "Januar", "Februar", "Marts", "April", "Maj", "Juni", "Juli", "August", "September", "Oktober", "November", "December" ],
								firstDay:<?php echo ($firstday !='') ? $firstday :'0';?>,
								altField: "#dateselect",
								<?php if(isset( $_POST['dateselect'])){ ?>defaultDate: '<?php echo $_POST['dateselect']; ?>',<?php } ?>
								onSelect: onSelectCalendarDate
							});
							<?php if(isset( $_POST['dateselect'])){ ?>
							onSelectCalendarDate('<?php echo $_POST['dateselect']; ?>',jQuery("#widgetdateselect").datepicker());
							<?php } else { ?>
							onSelectCalendarDate('',jQuery("#widgetdateselect").datepicker());
							<?php } ?>
						});	
					/* ]]> */
					</script>
					<div id="reservationform">
						<div id="formstatus"></div>
						
						<form id="reserveformid" name="reserveform" action="<?php echo get_template_directory_uri();?>/reservation_insert.php" method="post">
							<div class="one_third">
								
								<h4><?php echo $reservationleftsidetext; ?></h4>
								<div id="widgetdateselect" name="widgetdateselect"></div>	
								<input type="hidden" name="dateselect" id="dateselect" value="">
							</div>
							
							<div class="two_third last">
								<div class="reservationform">
									<h4><?php echo $reservationinformationtext; ?></h4>
									<p>
									<span class="people">
									<label><?php echo $people_txt; ?></label>
									<select id="numberofpeople" name="numberofpeople">
									<?php $people = get_option('atp_people') ? get_option('atp_people') : '12'; ?>
									<?php for($i = 0; $i <= $people; $i++ ) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									}?>
									</select>
									</span>
									<!-- .people -->
									<span id="reservationtime_para"  class="time">
										<label><?php echo $time_txt; ?></label>
										<select id="reservationtime" name="reservationtime">
										</select>
									</span>
									<!-- .time -->
									
									<span id='reservationtime_closed_para' style='display:none'>
										<span class="closed"><?php echo $closedmsgtxt; ?></span>
									<!-- .closed -->
									</span>
									</p>
									<p><label><?php echo $name_txt; ?></label><input class="txt input_medium" type="text" name="contactname" id="contactname" value="" /></p>	
									<p><label><?php echo $phone_txt; ?></label><input class="txt input_medium" type="text" name="contactphone" id="contactphone" value="" /><//p>
									<p><label><?php echo $email_txt; ?></label><input class="txt input_medium" type="text" name="contactemail" id="contactemail" value="" /></p>
									<p><label><?php echo $notes_txt; ?></label><textarea class="input_medium" name="reservationinstructions" rows="6" cols="20"></textarea></p>
									<p><input class="txt input_medium" type="hidden" name="status" id="status" value="unconfirmed" /></p>							
									<p class="submit"><label id="load"></label><a class="button medium red" onclick="validateresult()"><span><?php echo get_option('atp_reservationformtxt') ? get_option('atp_reservationformtxt') :'Reserve Table'; ?></span></a></p>
								</div>
								<!-- .reservationform -->
							</div>
							<!-- .two_third / last -->
						</form>

						<div class="clear"></div>
					</div>
					<!-- #reservationform -->

				</div>
				<!-- .content -->
			</div>
			<!-- #main -->
			
			<div class="clear"></div>

		</div>
		<!-- .inner -->
	
		<div id="back_to_top"><a href="#header"><?php _e('Top','THEME_FRONT_SITE')?></a></div>

	</div>
	<!-- .pagemid -->
	
<?php get_footer(); ?>