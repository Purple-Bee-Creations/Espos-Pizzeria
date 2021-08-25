<?php
add_action('init','atp_options');
// Get theme version from style.css

	if (!function_exists('atp_options')) {
		$options = array();
		function atp_options(){
			
			global $options, $atp_options, $url, $shortname,$atp_theme;
	
			$easeing_options=array(
				'linear'	 => 'linear',
				'swing'		 => 'swing',
				'jswing'	 => 'jswing',
				'easeInQuad' => 'easeInQuad',
				'easeInCubic'=> 'easeInCubic',
				'easeInQuart'=> 'easeInQuart',
				'easeInQuint'=> 'easeInQuint',
				'easeInSine' => 'easeInSine',
				'easeInExpo' => 'easeInExpo',
				'easeInCirc' => 'easeInCirc',
				'easeInElastic' => 'easeInElastic',
				'easeInBack' => 'easeInBack',
				'easeInBounce' => 'easeInBounce',
				'easeOutQuad' => 'easeOutQuad',
				'easeOutCubic' => 'easeOutCubic',
				'easeOutQuart' => 'easeOutQuart',
				'easeOutQuint' => 'easeOutQuint',
				'easeOutSine' => 'easeOutSine',
				'easeOutExpo' => 'easeOutExpo',
				'easeOutCirc' => 'easeOutCirc',
				'easeOutElastic' => 'easeOutElastic',
				'easeOutBounce' => 'easeOutBounce',
				'easeInOutQuad' => 'easeInOutQuad',
				'easeInOutCubic' => 'easeInOutCubic',
				'easeInOutQuart' => 'easeInOutQuart',
				'easeInOutQuint' => 'easeInOutQuint',
				'easeInOutSine' => 'easeInOutSine',
				'easeInOutExpo' => 'easeInOutExpo',
				'easeInOutCirc' => 'easeInOutCirc',
				'easeInOutElastic' => 'easeInOutElastic',
				'easeInOutBack' => 'easeInOutBack',
				'easeInOutBounce' => 'easeInOutBounce'
			);

			$fontface = array(
				' ' 										=> 'Select a font',
				'Arial'										=> 'Arial',
				'Verdana'									=> 'Verdana',
				'Tahoma'									=> 'Tahoma',
				'Sans-serif'								=> 'Sans-serif',
				'Lucida Grande'								=> 'Lucida Grande',
				'Georgia, serif'							=> 'Georgia',
				'Trebuchet MS, Tahoma, sans-serif'			=> 'Trebuchet',
				'Times New Roman, Geneva, sans-serif'		=> 'Times New Roman',
				'Palatino,Palatino Linotyp,serif'			=> 'Palatino',
				'Helvetica Neue, Helvetica, sans-serif'		=> 'Helvetica'
			);
			

			$slider_speed=array();
			for($i=500;$i<=3000;$i+=100) {
				$slider_speed[$i]=$i;
			}
				
			$slider_interval=array();
			for($i=1000;$i<=4900;$i+=300) {
				$slider_interval[$i]=$i;
			}
		
			// get color stylesheet
			$colors=array();
			if(is_dir(THEME_DIR . "/colors/")) {
				if($style_dirs = opendir(THEME_DIR . "/colors/")) {
					while(($color = readdir($style_dirs)) !== false) {
						if(stristr($color, ".css") !== false) {
							$colors[$color] = $color;
						}
					}
				}
			}
			$colors_select = $colors;
			array_unshift($colors_select,'Default Color');
			/** END: prepare options for both homepages and page options **/
		
			// ***** Image Alignment radio box
			$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center");
			
			// ***** Image Links to Options
			$options_image_link_to = array(
					'image'	=> 'The Image',
					'post'	=> 'The Post'); 
					
			$body_repeat = array(
					'repeat'	=> 'Repeat',
					'no-repeat'	=> 'No Repeat',
					'repeat-x'	=> 'Repeat X',
					'repeat-y'	=> 'Repeat Y');
					
			$body_pos = array(
					'left top'		=> 'Left Top',
					'left_center'	=> 'Left Center',
					'left_bottom'	=> 'Left Bottom',
					'right_top'		=> 'Right Top',
					'right_center'	=> 'Right Center',
					'right_bottom'	=> 'Right Bottom',
					'center top'	=> 'Center Top',
					'center_center'	=> 'Center Center',
					'center_bottom'	=> 'Center Bottom');
					
			$body_attachment_style=array(
					'fixed'		=> 'Fixed',
					'scroll'	=> 'Scroll');

			//More Options
			$uploads_arr = wp_upload_dir();
			$all_uploads_path = $uploads_arr['path'];
			$all_uploads = get_option('atp_uploads');
			
			// G E N E R A L 
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name'	=> 'General','icon' => $url.'cog-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------


					$options[] = array( 'name'	=> 'Logo Type',
										'desc'	=> __('Select which logo type you want to display Text / Logo Image for the theme.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_logo',
										'std'	=> 'title',
										'class'	=> 'select300',
										'options' => array(	
														'logo'	=> 'Logo',
														'title'	=> 'Text',
														),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Logo Image',
										'desc'	=> __('Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_header_logo',
										'std'	=> '',
										'class' => 'atplogo logo',
										'type'	=> 'upload');
	
					$options[] = array(	'name'	=> 'Site Title',
										'desc'	=> __('Site Title if you don\'t want to use the logo image.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_logotitle',
										'std'	=> array(	
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'color'		=> '',
														'fontvariant' => ''),
								
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Site Description',
										'desc'	=> __('Site Description (In a few words, explain what this site is about.)','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_tagline',
										'std'	=> array(
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'color'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');
										
					$options[] = array( 'name'	=> 'Logo Top Padding',
										'desc'	=> __('Logo Top Padding - example : 20px 0 20px 0','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_logo_mt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333'
										);
					$options[] = array( 'name'	=> 'Logo Bottom Padding',
										'desc'	=> __('Logo Bottom Padding - example : 20px 0 20px 0 ','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_logo_mb',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333'
										);
					$options[] = array( 'name'	=> 'Custom Favicon',
										'desc'	=> __("Upload a 16px x 16px ICO icon format that will represent your website's favicon.","ATP_ADMIN_SITE"),
										'id'	=> $shortname.'_custom_favicon',
										'std'	=> '',
										'type'	=> 'upload'); 

					$options[] = array( 'name'	=> 'Subheader Teaser',
										'desc'	=> __('Teaser call out for the subheader section of the theme.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_teaser',
										'std'	=> 'default',
										'class'	=> 'select300',
										'options' => array( 
														'default'	=> 'Default (post title)',
														'custom'	=> 'Custom Teaser',
														'twitter'   => 'Twitter Tweets',
														'disable'	=> 'Disable Subheader'),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Custom Teaser Text',
								'desc'	=> 'Enter Custom Teaser Text',
								'id'	=> $shortname.'_teaser_custom',
								'class' => 'atpteaseroption custom',
								'std'	=> '',
								'type'	=> 'textarea'
								);

									
					$options[] = array( 'name'	=> 'Breadcrumbs',
										'desc'	=> 'Check this if you wish to disable the breadcrumbs option for the theme which appears in the subheader. If you wish to disable the breadcrumb for a specific page then go to edit page',
										'id'  	=> $shortname.'_breadcrumbs',
										'std' 	=> 'true',
										'type' 	=> 'checkbox');

					$options[] = array( 'name'	=> 'Layout Option',
										'desc'	=> __('Select the layout option BOXED LAYOUT or STRETCHED LAYOUT','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_layoutoption',
										'std'	=> 'boxed',
										'class'	=> 'select300',
										'options'=> array(
														'stretched'	=> 'Stretched',
														'boxed'		=> 'Boxed'),
										'type'	=> 'select');

			// H O M E P A G E 
			//------------------------------------------------------------------------------------------
			$options[] = array( 'name'	=> 'Homepage', 'icon' => $url.'home-icon.png', 'type' => 'heading');
			//------------------------------------------------------------------------------------------

					$options[] = array( 'name'	=> 'Homepage Teaser',
										'desc'	=> 'Check this if you wish to disable the frontpage teaser widget above the slider. <br><br> To add the content in the Homepage Teaser section Go to WP-Admin > widgets, Add content/text in widget <strong>Homepage Teaser Text</strong>',
										'id'	=> $shortname.'_teaser_frontpage',
										'std'	=> '',
										'type'	=> 'checkbox');
	
					$options[] = array(	'name'	=> 'Homepage Teaser Background',
										'desc'	=> __('Background Color for the Homepage Teaser Area Below the Header.','ATP_ADMIN_SITE'),									
										'id'	=> $shortname.'_teaser_bg',
										'std'	=> '', 
										'type'	=> 'color');
					$options[] = array(	'name'	=> 'Homepage Teaser Font',
										'desc'	=> 'Select the Color and Font Properties for Homepage Teaser Font',
										'id'	=> $shortname.'_homepageteaser',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array( 'name' => 'Frontpage Widgets',
										'desc' => 'Select the columns you wish to display the widgets below the Frontpage Slider. After that Save changes and place the content in the widgets for that Go to WP-Admin > widgets, Add content/text in widget <strong>Frontpage Column1, Frontpage Column2, and Frontpage Column3  </strong>',
										'id'   => $shortname.'_frontpagewidgetcount',
										'std'  => '3',
										'type' => 'images',
										'options' => array(
														'1' => $url . 'columns/1col.png',
														'2' => $url . 'columns/2col.png',
														'3' => $url . 'columns/3col.png')
													);

		
				//---------------------------------------------------------------------------------------------------
				$options[] = array( 'name' => 'Twitter API','icon' => $url.'twitter-icon.png','type' => 'heading');
				//---------------------------------------------------------------------------------------------------
					$options[] = array( 'name'	=> 'Twitter Username',
										'desc'	=> 'Enter Twitter username to display tweets in subheader area of the theme. <br>You will need to visit <a href="https://dev.twitter.com/apps/" target="_blank">https://dev.twitter.com/apps/</a>, sign in with your account and create your own keys.',
										'id'	=> $shortname.'_teaser_twitter',
										'std'	=> '',
										'inputsize' => '330',
										'type'	=> 'text');
									
					$options[] = array( "name"	=> "Twitter Consumer key",
										"desc"	=> "Twitter Consumer key",
										"id"	=> $shortname."_consumerkey",
										'inputsize' => '330',
										"std"	=> "",
										"type"	=> "text");
					$options[] = array( "name"	=> "Twitter Consumer secret",
										"desc"	=> "Twitter Consumer secret",
										"id"	=> $shortname."_consumersecret",
										'inputsize' => '330',
										"std"	=> "",
										"type"	=> "text");

					$options[] = array( "name"	=> "Twitter Access token",
										"desc"	=> "Twitter Access token",
										"id"	=> $shortname."_accesstoken",
										'inputsize' => '330',
										"std"	=> "",
										"type"	=> "text");
					$options[] = array( "name"	=> "Twitter Token secret",
										"desc"	=> "Twitter Access secret",
										"id"	=> $shortname."_accesstokensecret",
										'inputsize' => '330',
										"std"	=> "",
										"type"	=> "text");		
			// C O L O R S 
			//------------------------------------------------------------------------------------------
			$options[] = array('name' => 'Skinning','icon' => $url.'colors-icon.png', 'type' =>'heading');
			//------------------------------------------------------------------------------------------

				//------------------------------------------------------------
				$options[] = array('name' => 'Body Settings','type' => 'subnav');
				//------------------------------------------------------------

					$options[] =array(	'name'	=> 'Colors Scheme',
										'desc'	=> __('Select the alternative color scheme for this Theme ','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_style',
										'class'	=> 'select300',
										'std'	=> '',
										'options'=> $colors_select,
										'type'	=> 'select');

					$options[] = array(	'name'	=> 'Body Background Properties',
										'desc'	=> __('Select the Background Image for Body and assign its Properties according to your requirements.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_bodyproperties',
										'std'	=> array(
														'image'		=> '',
														'color'		=> '',
														'style' 	=> 'repeat',
														'position'	=> 'center top',
														'attachment'=> 'scroll'),
										'type'	=> 'background');
		
					$options[] = array( 'name' => 'Background Pattern Images',
										'desc' => __('Pattern overlay on the body background color or image, displays on if the layout is selected as boxed in General Options Panel','ATP_ADMIN_SITE'),
										'id'   => $shortname.'_overlayimages',
										'std'  => '',
										'type' => 'images',
										'options' => array(
														''			   => $url . 'patterns/pat0.png',
														'pattern1.png' => $url . 'patterns/pat1.png',
														'pattern2.png' => $url . 'patterns/pat2.png',
														'pattern3.png' => $url . 'patterns/pat3.png',
														'pattern4.png' => $url . 'patterns/pat4.png',
														'pattern5.png' => $url . 'patterns/pat5.png',
														'pattern6.png' => $url . 'patterns/pat6.png',
														'pattern7.png' => $url . 'patterns/pat7.png',
														'pattern8.png' => $url . 'patterns/pat8.png'),
												);

					$options[] = array(	'name'	=> 'Slider Background Properties',
										'desc'	=> __('Select the Background Image for Body and assign its Properties according to your requirements.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_sliderbgproup',
										'std'	=> array(
														'image'		=> '',
														'color'		=> '',
														'style' 	=> 'repeat',
														'position'	=> 'center top',
														'attachment'=> 'scroll'),
										'type'	=> 'background');

					$options[] = array(	'name'	=> 'Theme Color',
										'desc'	=> __('Theme Color set to default with theme if you choose color from here it will change all the links and backgrounds used in the theme.','ATP_ADMIN_SITE'),									
										'id'	=> $shortname.'_themecolor',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Content Area Background Color',
										'desc'	=> __('This will apply color to the content area of theme which is of width 980px wide.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_wrapbg',
										'std'	=> '', 
										'type'	=> 'color');
										
				//------------------------------------------------------------
				$options[] = array('name' => 'Subheader','type' => 'subnav');
				//------------------------------------------------------------

					$options[] = array(	'name'	=> 'Subheader Background Properties',
										'desc'	=> __('Select the Background Image for Subheader and assign its Properties according to your requirements.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheaderproperties',
										'std'	=> array(
														'image'		=> '',
														'color'		=> '',
														'style' 	=> 'repeat',
														'position'	=> 'center top',
														'attachment'=> 'scroll'),
										'type'	=> 'background');

					$options[] = array(	'name'	=> 'Subheader Text Color',
										'desc'	=> __('Text Color for the Suheader Area Below the Header in sub pages.','ATP_ADMIN_SITE'),									
										'id'	=> $shortname.'_subheadertext',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array( 'name'	=> 'Subheader Padding Top',
										'desc'	=> __('Subheader Padding Top','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheader_pt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333'
										);
	
					$options[] = array( 'name'	=> 'Subheader Padding Bottom',
										'desc'	=> __('Subheader Padding Bottom','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheader_pb',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333'
										);
		
				//------------------------------------------------------------
				$options[] = array('name' => 'Footer','type' => 'subnav');
				//------------------------------------------------------------

					$options[] = array(	'name'	=> 'Footer Background Color',
										'desc'	=> __('Footer background color includes the sidebar footer widgets area as well. you can disable this sidebar footer area in Footer Tab and disable the sidebar footer.', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footerbgcolor',
										'std'	=> '', 
										'type'	=> 'color');
		
					$options[] = array(	'name'	=> 'Footer Text Color',
										'desc'	=> __('Footer text including paragraph element, (without links).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footertextcolor',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Footer Widget Titles',
										'desc'	=> __('Select the Color and Font Properties for Footer Widget Title.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footertitle',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',	
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');


					$options[] = array(	'name'	=> 'Copyright Background Color',
										'desc'	=> __('Copyright area below the footer sidebar footer. (background color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_copybgcolor',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Copyright Font',
										'desc'	=> __('Select the Color and Font Properties for Copyright Font.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_copyrights',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

				//------------------------------------------------------------
				$options[] = array('name' => 'Primary Menu','type' => 'subnav');
				//------------------------------------------------------------

					$options[] = array(	'name'	=> 'Menu Bar Background',
										'desc'	=> __('Menu Bar Background Color below the header - primary menu.', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_bg',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Font and Link Color',
										'desc'	=> __('Select the Color and Font Properties for Menu Parent List Font','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu',
										'std'	=> array(
														'size' 		=> '',
														'lineheight'=> '',
														'style' 	=> '',
														'fontvariant' =>'',
														'color' 	=> ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Menu Font Dropdown Link Color',
										'desc'	=> __('Select the Color and Font Properties for Menu Dropdown Font','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenudropdown',
										'std'	=> array(
														'size' 		=> '',
														'lineheight'=> '',
														'style' 	=> '',
														'fontvariant' =>'',
														'color' 	=> ''),
										'type'	=> 'typography');
									
					$options[] = array(	'name'	=> 'Menu Link Hover',
										'desc'	=> __('Menu Hover Link Color (parent menu link hover color) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_linkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Hover BG Color',
										'desc'	=> __('Menu Hover Background Color', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_sub_bg',
										'std'	=> '', 
										'type'	=> 'color');

			
					$options[] = array(	'name'	=> 'Menu Dropdown Link Hover Color',
										'desc'	=> __('Dropdown Menu Hover Link Color (.sf-menu li li a:hover color) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_sub_linkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Dropdown Hover BG Color',
										'desc'	=> __('Dropdown Menu Hover BG Color (s.f-menu li li:hover ) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_sub_hoverbg',
										'std'	=> '', 
										'type'	=> 'color');
										
										
				//------------------------------------------------------------
				$options[] = array('name' => 'Links','type' => 'subnav');
				//------------------------------------------------------------

					$options[] = array(	'name'	=> 'Link Color',
										'desc'	=> __('Default theme links color','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_link',
										'std'	=> '', 
										'type'	=> 'color');
			
					$options[] = array(	'name'	=> 'Link Hover Color',
										'desc'	=> __('Default theme links mousehover color','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_linkhover',
										'std'	=> '', 
										'type'	=> 'color');
			
					$options[] = array(	'name'	=> 'Subheader Link Color',
										'desc'	=> __('Links under subheader section','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheaderlink',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Subheader Link Hover Color',
										'desc'	=> __('Links mouse-hover under subheader section','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheaderlinkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Breadcrumb Link Color',
										'desc'	=> __('Breadcrumbs below the subheader section, (link color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_breadcrumblink',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Breadcrumb Link Hover Color',
										'desc'	=> __('Breadcrumbs below the subheader section, (link hover color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_breadcrumblinkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Blog Post Title Link Hover',
										'desc'	=> __('Blog Post Title Link Hover color.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_entrytitlelinkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Footer Link Color',
										'desc'	=> __('Footer containing links under widget or text widget, (link color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footerlink',
										'std'	=> '', 
										'type'	=> 'color');
			
					$options[] = array(	'name'	=> 'Footer Link Hover Color',
										'desc'	=> __('Footer content containing any links under widget or text widget, (link hover color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footerlinkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Copyright Link Color',
										'desc'	=> __('Copyright content containing any links color. (link color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_copyrightlink',
										'std'	=> '', 
										'type'	=> 'color');

				//------------------------------------------------------------
				$options[] = array('name' => 'Typography','type' => 'subnav');
				//------------------------------------------------------------
				
				//---------------------------------------------------------------------------------------------------
					$options[] = array( 'name'	=> 'Select Font Family', 'desc' => '<h3>Font Family</h3> Select the Fonts as standards fonts or google webfonts. If you select the headings font it will replace all the heading font family for the whole theme including footer and sidebar widget titles.', 'type' => 'subsection');
					//---------------------------------------------------------------------------------------------------					
										
					$options[] = array( 
										"name" 		=> "Body Font Face",
										"desc" 		=> "Select a font family for body text",
										"id" 		=> $shortname.'_bodyfont',
										"options" 	=> $fontface,
										'class'	=> 'select300',
										"preview" 	=> array(
															"text" 		=> "This is my preview text!", //this is the text from preview box
															"size" 		=> "25px"
										),
										"type" 		=> "atpfontfamily");

					$options[] = array( 
										"name" 		=> "Headings Font Face",
										"desc" 		=> "Select a font family for Headings ( h1, h2, h3, h4, h5, h6 )",
										"id" 		=> $shortname.'_headingsfont',
										"options" 	=> $fontface,
										'class'	=> 'select300',
										"preview" 	=> array(
															"text" 		=> "This is my preview text!", //this is the text from preview box
															"size" 		=> "25px"
										),
										"type" 		=> "atpfontfamily");
										
					$options[] = array( 
										"name" 		=> "Menu Font Face",
										"desc" 		=> "Select a font family for Top Navigation Menu",
										"id" 		=> $shortname.'_mainmenufont',
										"options" 	=> $fontface,
										'class'	=> 'select300',
										"preview" 	=> array(
															"text" 		=> "This is my preview text!", //this is the text from preview box
															"size" 		=> "25px"
										),
										"type" 		=> "atpfontfamily");

					$options[] = array(	'name'	=> 'Body Font',
										'desc'	=> __('Select the Color Properties for Body Font','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_bodyp',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',	
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');
		
					//$options[] = array(	'name'	=> 'All Headings',
									//'desc'	=> __('All Headings elements. (color).', 'ATP_ADMIN_SITE'),
										//'id'	=> $shortname.'_headings',
										//'std'	=> '', 
										//'type'	=> 'color');

					$options[] = array(	'name'	=> 'Heading 1',
										'desc'	=> 'Select the Color  Properties for H1 Heading.',
										'id'	=> $shortname.'_h1',
										'std'	=> array(
														'color'		=> '',
														'size' 		=> '',
														'lineheight'=> '',
														'style' 	=> '',
														'fontvariant' => ''),
										
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 2',
										'desc'	=> 'Select the Color Properties for H2 Heading.',
										'id'	=> $shortname.'_h2',
										'std'	=> array(
														'color'		=> '',
														'size' 		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 3',
										'desc'	=> 'Select the Color Properties for H3 Heading.',
										'id'	=> $shortname.'_h3',
										'std'	=> array(
														'color'		=> '',
														'size' 		=> '',
														'lineheight'=> '',
														'style' 	=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 4',
										'desc'	=> 'Select the Color Properties for H4 Heading.',
										'id'	=> $shortname.'_h4',
										'std'	=> array(
														'color'		=> '',
														'size' 		=> '',
														'lineheight'=> '',
														'style' 	=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 5',
										'desc'	=> 'Select the Color Properties for H5 Heading.',
										'id'	=> $shortname.'_h5',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 6',
										'desc'	=> 'Select the Color Properties for H6 Heading.',
										'id'	=> $shortname.'_h6',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Blog Post Title',
										'desc'	=> 'Select the Color  Properties for  Blog Post Titles',
										'id'	=> $shortname.'_entrytitle',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Sidebar Widget Titles',
										'desc'	=> 'Select the Color  Properties for sidebar Widget Titles',
										'id'	=> $shortname.'_sidebartitle',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Frontpage Widget Titles',
										'desc'	=> 'Select the Color  Properties for sidebar Footer Widget Titles',
										'id'	=> $shortname.'_fpwidget_title',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					//---------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'Custom Font', 'type' => 'subnav');
					//---------------------------------------------------------------------------------------------------

					$options[] = array(	'name'	=> 'Custom Font <strong>.woff</strong>',
										'desc'	=> 'Upload Custom Font .woff.',
										'id'	=> $shortname.'_fontwoff',
										'std'	=> '', 
										'type'	=> 'upload');

					$options[] = array(	'name'	=> 'Custom Font <strong>.ttf</strong>',
										'desc'	=> 'Upload Custom Font .ttf',
										'id'	=> $shortname.'_fontttf',
										'std'	=> '', 
										'type'	=> 'upload');

					$options[] = array(	'name'	=> 'Custom Font <strong>.svg</strong>',
										'desc'	=> 'Upload Custom Font .svg',
										'id'	=> $shortname.'_fontsvg',
										'std'	=> '', 
										'type'	=> 'upload');

					$options[] = array(	'name'	=> 'Custom Font <strong>.eot</strong>',
										'desc'	=> 'Upload Custom Font .eot',
										'id'	=> $shortname.'_fonteot',
										'std'	=> '', 
										'type'	=> 'upload');

					$options[] = array(	'name'	=> 'Font Name',
										'desc'	=> 'Enter Font Name Select the name as mentioned in fontface css in the downloaded readme file of your custom font',
										'id'	=> $shortname.'_fontname',
										'std'	=> '', 
										'inputsize' => '333',
										'type'	=> 'text');

					$options[] = array(	'name'	=> 'Custom Fonts Headings and class Names',
										'desc'	=> 'Enter your own custom elements to which you want to assign this custom font. Ex: h1,h2,h3, .class1,.class2',
										'id'	=> $shortname.'_fontclass',
										'std'	=> '', 
										'inputsize' => '',
										'type'	=> 'textarea');

				//------------------------------------------------------------
				$options[] = array('name' => 'Custom Skinning','type' => 'subnav');
				//------------------------------------------------------------

					$options[] = array( 'name'	=> 'Custom CSS',
										'desc'	=> __('Quickly add some CSS of your own choice to your theme by adding it to this block.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_extracss',
										'std'	=> '',
										'type'	=> 'textarea');
		
			// S L I D E R S
			//------------------------------------------------------------------------
			$options[] = array( 'name'	=> 'Sliders',
								'icon'	=> $url.'slider-icon.png',
								'type'	=> 'heading');

					$options[]=	array(	'name'	=> 'Slider',
								'desc'	=> 'Check this if you wish to disable the Frontpage Slider',
								'id'	=> $shortname.'_slidervisble',
								'std'	=> '',
								'type'	=> 'checkbox');

			$options[] = array( 'name'	=> 'Select Slider',
								'desc'	=> 'Select which slider you want to use for the Frontpage of the theme.<br/> 
											<strong>Note:</strong> If you choose cycle slider it will not work in responsive, 
											kindly use flex slider instead of cycle slider.',
								'id'	=> $shortname.'_slider',
								'std'	=> 'videoslider',
								'class'	=> 'select300',
								'options' => $atp_theme->atp_variable('slider_type'),
								'type'	=> 'select');
		
			$options[] = array( 'name'	=> 'Video Embed Code',
								'desc'	=> 'Enter the video embed code which will display on your frontpage slider area.',
								'id'	=> $shortname.'_video_id',
								'class' => 'atpsliders videoslider',
								'std'	=> '',
								'type'	=> 'textarea',
								'inputsize' => '');

			$options[] = array( 'name'	=> 'FlexSlider Slides Limits',
										'desc'	=> __('Enter the limit for Slides you want to hold on the Flex Slider','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexslidelimit',
										'std'	=> '',
										'class' => 'atpsliders flexslider',
										'type'	=> 'text',
										'inputsize' => '70');

					$options[] = array( 'name'	=> 'FlexSlider Slides Speed',
										'desc'	=> __('Enter the limit for Slide speed you want to set','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexslidespeed',
										'std'	=> '500',
										'class' => 'atpsliders flexslider',
										'options'=> $slider_speed,
										'type'	=> 'select',
										);

					$options[] = array( 'name'	=> 'Slider Effect',
										'desc'	=> __('String: Select your animation type, "fade" or "slide"','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexslideffect',
										'std'	=> 'flexslider',
										'class' => 'atpsliders flexslider',
										'options' => array( 
														'fade'	=> 'Fade',
														'slide'	=> 'Slide'
													),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Direction Nav',
										'desc'	=> __('Select: Create navigation for previous/next navigation arrows?','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexslidednav',
										'class' => 'atpsliders flexslider',
										'std'	=> '',
										'options' => array( 
														'true'	=> 'True',
														'false'	=> 'False'
													),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Control Nav',
										'desc'	=> __('Create navigation for paging control of each slide?','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexslidecnav',
										'class' => 'atpsliders flexslider',
										'std'	=> '',
										'options' => array( 
														'true'	=> 'True',
														'false'	=> 'False'
													),
										'type'	=> 'select');


					$options[] = array( 'name'		=> 'Static Image',
										'desc'		=> 'Upload the image size 980 x 400 pixels to display on the homepage instead of slider.',
										'id'		=> $shortname.'_static_image_upload',
										'class' 	=> 'atpsliders static_image',
										'std'		=> '',
										'type'		=> 'upload');

					$options[] = array( 'name'		=> 'StaticImage Slider URL',
										'desc'		=> 'Enter the external or any URL to link to this static image.',
										'id'		=> $shortname.'_static_link',
										'class'	 	=> 'atpsliders static_image',
										'std'		=> '',
										'type'		=> 'text',
										'inputsize' => '70');
										
					$options[] = array( 'name'		=> 'Custom Slider',
										'desc'		=> 'Use in Your custom slider Plugin shortcodes Example : [revslider id="1"]',
										'id'		=> $shortname.'_customslider',
										'std'		=> '',
										'class' 	=> 'atpsliders custom_slider',
										'type'		=> 'textarea',
										'inputsize' => '');					

									
			// P O S T   O P T I O N S 
			//------------------------------------------------------------------------
			$options[] = array( 'name'	=> 'Post Options',
								'icon'	=> $url.'post-icon.png',
								'type'	=> 'heading');

					$options[] = array(	'name'	=> 'About Author',
										'desc'	=> __('Check this if you wish to disable the Author Info Box in post single page at the end of the post','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_aboutauthor',
										'std'	=> '',
										'type'	=> 'checkbox');	

					$options[] = array(	'name'	=> 'Related Posts',
										'desc'	=> __('Check this if you wish to disable the related posts in post single page (based on tags).','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_relatedposts',
										'std'	=> '',
										'type'	=> 'checkbox');	

					$options[] = array(	'name'	=> 'Post / Page Comments',
										'desc'	=> __('Select if you want to display comments on posts and/or pages.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_commentstemplate',
										'std'	=> 'fullpage',
										'options'	=> array(
														'posts'	=> 'Posts Only',
														'pages'	=> 'Pages Only', 
														'both'	=> 'Pages/posts',
														'none'	=> 'None'),
										'type'	=> 'select');
					$options[] = array( 'name'	=> 'Blog Page Template',
										'desc'	=> __('Selected categories will hold the posts to display in blog page template. ( template : template_blog.php)','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_blogacats',
										'std'	=> '',
										'type'	=> 'multicheck',
										'options'	=> $atp_theme->atp_variable('categories')
										);
										
					$options[] = array( 'name'	=> 'Default Blog Style Image Height',
								'desc'	=> 'Enter the height of the default blog post style featured image. Default height is 150px.',
								'id'	=> $shortname.'_psd_imgheight',
								'std'	=> '',
								'type'	=> 'text',
								'inputsize'=> '100');

					$options[] = array( 'name'	=> 'Blog Style 1 Image Height',
										'desc'	=> 'Enter the height of the blog post style 1 featured image. Default height is 150px.',
										'id'	=> $shortname.'_ps1_imgheight',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '100');

					$options[] = array( 'name'	=> 'Blog Style 2 Image Height',
										'desc'	=> 'Enter the height of the blog post style 2 featured image. Default height is 150px.',
										'id'	=> $shortname.'_ps2_imgheight',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '100');

					$options[] = array( 'name'	=> 'Blog Style 3 Image Height',
										'desc'	=> 'Enter the height of the blog post style 3 featured image. Default height is 150px.',
										'id'	=> $shortname.'_ps3_imgheight',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '100');


					$options[] = array(	'name'	=> 'Single Page Pagination(Next/Previous)',
										'desc'	=> __('Check this if you wish to disable next/previous Post Single Page','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_singlenavigation',
										'std'	=> '',
										'type'	=> 'checkbox');

					$options[] = array(	"name"	=> "Post Single Page Featured Image",
										"desc"	=> 'Check this if you wish to disable Featured Image on post single page',
										"id"	=> $shortname."_singlefeaturedimg",
										"std"	=> "",
										"type"	=> "checkbox"
										);
															
			// C U S T O M   S I D E B A R 
			//------------------------------------------------------------------------
			$options[] = array( 'name'	=> 'Custom Sidebar',
								'icon'	=> $url.'sidebar-icon.png',
								'type'	=> 'heading');

					$options[] = array( 'name'	=> 'Custom Sidebars',
										'desc'	=> __('Create the desired name for your site sidebars and go to widgets which will appear in rightsidebar below the footer column widgets. After assigning the widgets in the prefered sidebar you can assign the sidebar to individual pages/posts. Find the custom sidebar in rightside of the wordpress admin panels.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_customsidebar',
										'std'	=> '',
										'type'	=> 'customsidebar');

				// F O O T E R 
				//------------------------------------------------------------------------
				$options[] = array( 'name'	=> 'Footer Settings',
									'icon'	=> $url.'footer-icon.png',
									'type'	=> 'heading');

						$options[] = array( 'name'	=> 'Footer Teaser',
									'desc'	=> 'Check this if you wish to disable the Teaser on Footer above the sidebar footer.',
									'id'	=> $shortname.'_teaser_footer',
									'std'	=> '',
									'type'	=> 'checkbox');
		
						$options[] = array( 'name'	=> 'Footer Teaser Text',
											'desc'	=> 'Custom HTML and Text that will appear above the sidebar footer.',
											'id'	=> $shortname.'_teaser_footer_text',
											'std'	=> '',
											'type'	=> 'textarea'); 

						$options[] = array(	'name'	=> 'Footer Sidebar',	
											'desc'	=> 'Check this if you wish to disable Sidebar Footer containing the widgets with columnized in Footer.',
											'id'	=> $shortname.'_footer_sidebar',
											'std'	=> '',
											'type'	=> 'checkbox');
						
						$options[] = array( 'name' => 'Footer Columns',
											'desc' => "Select the Columns Layout Style from below images to display on footer sidebar area and after selecting save the options and go to your widgets panel and assign the widgets in each column",
											'id'   => $shortname.'_footerwidgetcount',
											'std'  => '2',
											'type' => 'images',
											'options' => array(
													'2' => $url . 'columns/2col.png',
													'3' => $url . 'columns/3col.png',
													'4' => $url . 'columns/4col.png',
													'5' => $url . 'columns/5col.png',
													'6' => $url . 'columns/6col.png',
													'half_one_half' => $url . 'columns/half_one_half.png',
													'half_one_third' => $url . 'columns/half_one_third.png',
													'one_half_half' => $url . 'columns/one_half_half.png',
													'one_third_half' => $url . 'columns/one_third_half.png'
													)
											);

						$options[] = array(	'name'	=> 'Google Analytics',
											'desc'	=> 'Paste your Google Analytics code here which starts from &lt;script> here. This will be added into the footer of your theme.',
											'id'	=> $shortname.'_googleanalytics',
											'std'	=> '',
											'type'	=> 'textarea');

						$options[] = array(	'name'	=> 'Footer Copyright Notice',
											'desc'	=> 'Here you can place the Footer Copyright Content',
											'id'	=> $shortname.'_copyright',
											'std'	=> '',
											'type'	=> 'textarea');	

										
			// S O C I A B L E S
			//------------------------------------------------------------------------
			$options[] = array( 'name'	=> 'Sociables',
								'icon'	=> $url.'link-icon.png',
								'type'	=> 'heading');

					$options[] = array(	'name'	=> 'Sociables',	
										'desc'	=> __('Click Add New to add sociables where you can edit/add/delete.<br><br> If you want to have a different icon please you icon png or gif file in sociables directory located in theme images directory','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_social_bookmark',
										'std'	=> '',
										'type'	=> 'custom_socialbook_mark');

			//Sticky Bar
			// -----------------------------------------------------------------------
			
			$options[] = array( 'name'	=> 'Sticky Bar',
								'icon'	=> $url.'sticky-icon.png',
								'type'	=> 'heading');
			
				$options[] = array( 'name'	=> 'Sticky Notice Bar',
									'desc'	=> 'Check this if you wish to hide the sticky bar on top.',
									'id'	=> $shortname.'_stickybar',
									'std'	=> '',
									'type'	=> 'checkbox');
	
				$options[] = array( 'name'	=> 'Sticky Content',
									'desc'	=> 'Type the content you wish to display in sticky bar',
									'id'	=> $shortname.'_stickycontent',
									'std'	=> '',
									'type'	=> 'textarea');
									
				$options[] = array( 'name'	=> 'Sticky Bar Background Color',
									'desc'	=> 'Select the color you want to assign for the Sticky Bar',
									'id'	=> $shortname.'_stickybarcolor',
									'std'	=> '',
									'type'	=> 'color');
		
			// L A N G U A G E S
			//------------------------------------------------------------------------
			$options[] = array( 'name'	=> 'Language',
								'icon'	=> $url.'lang-icon.png',
								'type'	=> 'heading');

				//------------------------------------------------------------
				$options[] = array('name' => 'General Labels','type' => 'subnav');
				//------------------------------------------------------------

					$options[] = array( 'name'	=> 'Readmore',
										'desc'	=> __('Readmore text which appears on Post Excerpt.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_readmoretxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Post Single Page',
										'desc'	=> __('Custom text which appears on Post Single Page in Subheader Area.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_postsinglepage',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');
	
					$options[] = array( 'name'	=> '404 Page',
										'desc'	=> __('Custom text which appears on 404 Error page','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_error404txt',
										'std'	=> '',
										'type'	=> 'textarea');

				//------------------------------------------------------------
				$options[] = array('name' => 'Forms Labels','type' => 'subnav');
				//------------------------------------------------------------
					$options[] = array( 'name'	=> 'Name Text',
										'desc'	=> __('Custom text which appears on Reservation Form','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_nametxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Email Text',
										'desc'	=> __('Custom text which appears on Reservation Form','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_emailtxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Phone Text',
										'desc'	=> __('Custom text which appears on Reservation Form','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_phonetxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Notes Text',
										'desc'	=> __('Custom text which appears on Reservation Form','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_notestxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'People Text',
										'desc'	=> __('Custom text which appears on Reservation Form','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_peopletxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Time Text',
										'desc'	=> __('Custom text which appears on Reservation Form','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_timetxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Closed Message',
										'desc'	=> __('Custom text which appears on Reservation Form','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_closedmsgtxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

				//------------------------------------------------------------
				$options[] = array('name' => 'Week Days Text','type' => 'subnav');
				//------------------------------------------------------------

					$options[] = array( 'name'	=> 'Closed Text',
										'desc'	=> __('Custom text which appears on Business Hours when the day is closed','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_closedtxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Sunday Text',
										'desc'	=> 'Sunday - which appears in Business Hours widget',
										'id'	=> $shortname.'_sundaytxt',
										'std'	=>'Sunday',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Monday Text',
										'desc'	=> 'Monday - which appears in Business Hours widget',
										'id'	=> $shortname.'_mondaytxt',
										'std'	=> 'Monday',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Tuesday Text',
										'desc'	=> 'Tuesday - which appears in Business Hours widget',
										'id'	=> $shortname.'_tuesdaytxt',
										'std'	=> 'Tuesday',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Wednesday Text',
										'desc'	=> 'Wednesday - which appears in Business Hours widget',
										'id'	=> $shortname.'_wednesdaytxt',
										'std'	=> 'Wednesday',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Thursday Text',
										'desc'	=> 'Thursday - which appears in Business Hours widget',
										'id'	=> $shortname.'_thursdaytxt',
										'std'	=> 'Thursday',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Friday Text',
										'desc'	=> 'Friday - which appears in Business Hours widget',
										'id'	=> $shortname.'_fridaytxt',
										'std'	=> 'Friday',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Saturday Text',
										'desc'	=> 'Saturday - which appears in Business Hours widget',
										'id'	=> $shortname.'_saturdaytxt',
										'std'	=> 'Saturday',
										'type'	=> 'text',
										'inputsize'=> '333');
					//------------------------------------------------------------
					$options[] = array('name' => 'Reservation Status Text','type' => 'subnav');
					//------------------------------------------------------------

					$options[] = array( 'name'	=> 'Reservation Cancelled',
										'desc'	=> 'Text which appears in the Admin area as Reservation Cancelled',
										'id'	=> $shortname.'_reserveCancel',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Reservation Confirmed',
										'desc'	=> 'Text which appears in the Admin area as Reservation Confirmed',
										'id'	=> $shortname.'_reserveConfirm',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Reservation UnConfirmed',
										'desc'	=> 'Text which appears in the Admin area as Reservation Un Confirmed',
										'id'	=> $shortname.'_reserveUnConfirm',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');
					
		// *******************************************************************//
		// ***** Business Hours
		// *******************************************************************//
		
		$options[] = array( 'name'	=> 'Business Hours',
						'icon'	=> $url.'time-icon.png',
						'type'	=> 'heading');

				$options[] = array(	'name'	=> 'Sunday',
									'desc'	=> '',
									'id'	=> $shortname.'_sunday',
									'std'	=> '',
									'type'	=> 'businesshours');

				$options[] = array(	'name'	=> 'Monday',
									'desc'	=> '',
									'id'	=> $shortname.'_monday',
									'std'	=> '',
									'type'	=> 'businesshours');

				$options[] = array(	'name'	=> 'Tuesday',
									'desc'	=> '',
									'id'	=> $shortname.'_tuesday',
									'std'	=> '',
									'type'	=> 'businesshours');

				$options[] = array(	'name'	=> 'Wednesday',
									'desc'	=> '',
									'id'	=> $shortname.'_wednesday',
									'std'	=> '',
									'type'	=> 'businesshours');

				$options[] = array(	'name'	=> 'Thursday',
									'desc'	=> '',
									'id'	=> $shortname.'_thursday',
									'std'	=> '',
									'type'	=> 'businesshours');

				$options[] = array(	'name'	=> 'Friday',
									'desc'	=> '',
									'id'	=> $shortname.'_friday',
									'std'	=> '',
									'type'	=> 'businesshours');

				$options[] = array(	'name'	=> 'Saturday',
									'desc'	=> '',
									'id'	=> $shortname.'_saturday',
									'std'	=> '',
									'type'	=> 'businesshours');

		//-------------------------------------------------------------------------------------------------------------
		$options[] = array( 'name'	=> 'E-mails Setup',
							'icon'	=> $url.'email-icon.png',
							'type'	=> 'heading');
		//-------------------------------------------------------------------------------------------------------------
				$options[] = array( 'name'	=> 'Shortcodes for Email Setup',
									'desc'	=> __('Custom shortcodes defined for this theme in use for the Email Message systems<br><br> 
									<b>[contact_name]</b> - <em>Name of the Customer</em><br>
									<b>[contact_email]</b> - <em>Email of the Customer</em> <br>
									<b>[reservation_date]</b> - <em>Date of Reservation</em> <br>
									<b>[reservation_time]</b> - <em>Time of Reservation</em><br>
									<b>[booking_id]</b> - <em>Reservation Booking Id</em><br>
									<b>[contact_phone]</b> - <em>Customer Phone Number </em><br>
									<b>[reservation_note]</b> - <em>Reservation Instructions or Note</em>.<br>', 'ATP_ADMIN_SITE'),
									'type'	=> 'subsection');
				
				$options[] = array(	'name'	=> 'Reservation E-mail ID',
									'desc'	=> "Enter your E-mail address to use on the Reservation Page Template. Ex: name@yoursite.com ",
									'id'	=> $shortname.'_reservationemail',
									'std'	=> '',
									'inputsize'	=> '333',
									'type'	=> 'text');
				
				$options[] = array(	'name'	=> 'Admin Notification Email',
									'desc'	=> '',
									'id'	=> $shortname.'_notification_msg',
									'std'	=>'Name  [contact_name]
											Email:[contact_email]
											You Have a Booking reservation at [restaurant_name] for [number_of_people] people at [reservation_time] on [reservation_date]. ',
									'inputsize'	=> '333',
									'type'	=> 'text');
									
				$options[] = array(	'name'	=> 'Reservation Form Thank you message',
									'desc'	=> '',
									'id'	=> $shortname.'_booking_thankyou_msg',
									'std'	=>'Thank you! Your Reservation has booked and you will be contacted soon for confirmation.',
									'type'	=> 'textarea');
								
				$options[] = array(	'name'	=> 'Confirm E-mail Subject Field',
									'desc'	=> '',
									'id'	=> $shortname.'_confirmsubject',
									'std'	=>'[restaurant_name] : Booking Request ID [booking_id]',
									'type'	=> 'textarea');

				$options[] = array('name'	=> 'Please Confirm E-mail Message',
									'desc'	=> '',
									'id'	=> $shortname.'_confirm',
									'std'	=>'Dear [contact_name]
											Thank you for your reservation at [restaurant_name] for [number_of_people] at
											 [reservation_time] on [reservation_date]. The last thing we require from
											you is to please confirm your reservation.
												Sincerely,
												The staff at [restaurant_name].',
									'type'	=> 'textarea');
	
				$options[] = array(	'name'	=> 'Status Changed Subject Field',
									'desc'	=> '',
									'id'	=> $shortname.'_statussubject',
									'std'	=>' [restaurant_name] : Booking ID [booking_id] Status Changed',
									'type'	=> 'textarea');

				$options[] = array(	'name'	=> 'Reservation Status Changed E-mail Message',
									'desc'	=> '',
									'id'	=> $shortname.'_status',
									'std'	=> 'Dear [contact_name],
											This is a courtesy e-mail to inform you that the status of your 
											reservation at [restaurant_name] for [number_of_people] at [reservation_time] on [reservation_date] 
											has been updated.
											The new reservation status is "[reservation_status]".
											Sincerely,
											The staff at [restaurant_name].',
									'type'	=> 'textarea');
			//-------------------------------------------------------------------------------------------------------------
			$options[] = array( 'name'	=> THEMENAME .' Options',
								'icon'	=> $url.'cog-icon.png',
								'type'	=> 'heading');
			//-------------------------------------------------------------------------------------------------------------
					$options[] = array( 'name'	=> 'Reservation Page',
										'desc'	=> 'The WordPress page template used to display the Reservation Form.',
										'id'	=> $shortname.'_reservationpage',
										'std'	=> '',
										'type'	=> 'select',
										'options'=> $atp_theme->atp_variable('pages')
										);

					$options[] = array( 'name'	=> 'Peoples Limit',
										'desc'	=> 'Number of peoples which displays on the reservation calender widget.',
										'id'	=> $shortname.'_people',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');
					
					$options[] = array( 'name'	=> 'Reservation Button Text',
										'desc'	=> 'Custom text which appears in Button Text Reservation Form',
										'id'	=> $shortname.'_reservationformtxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '333');

					$options[] = array( 'name'	=> 'Calendar Week Start Day',
										'desc'	=> 'Set the first day of the week: Sunday is 0, Monday is 1, etc.',
										'id'	=> $shortname.'_firstday',
										'std'	=> '',
										'type'	=> 'select',
										'options'	=> array(
														'0' => 'Sunday',
														'1' => 'Monday',
														'2' => 'Tuesday',
														'3' => 'Wednesday',
														'4' => 'Thursday',
														'5' => 'Friday',
														'6' => 'Saturday',
														),
													);

					$options[] = array( 'name'	=> 'Time Format',
										'desc'	=> 'Defatult Time Format for displaying business hours widget',
										'id'	=> $shortname.'_timeformat',
										'std'	=> '',
										'type'	=> 'select',
										'options'	=> array(
														'12' => '12 Hours Format',
														'24' => '24 Hours Format',
														),
													);
					$options[] = array( 'name'	=> 'Menu Order',
										'desc'	=> 'Displaying order for the Food Menu on Menu Page Template',
										'id'	=> $shortname.'_menuorder',
										'std'	=> '',
										'type'	=> 'select',
										'options'	=> array(	
													'none'	=>'None',
													'id' => 'ID',
													'count' => 'Count',
													'name'	=> 'Name',
													'slug'	=> 'Slug',
													'term_group' => 'Term Group',
													'display_order' => 'Display Order',
														),			
													);
					$options[] = array(	'name'	=> 'Price Background Color',
										'desc'	=> __('Price Background Color for the Food Items.','ATP_ADMIN_SITE'),									
										'id'	=> $shortname.'_pricebgcolor',
										'std'	=> '', 
										'type'	=> 'color');

		}
	}
?>