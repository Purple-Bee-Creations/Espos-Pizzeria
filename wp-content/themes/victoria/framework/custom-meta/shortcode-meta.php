<?php
/* Shortcode Generator Meta box setup function. */
	$atp_shortcodes = array(
	//LAYOUTS
	//--------------------------------
	"Layouts"=>array(
		'name'		=> __('Layouts','atp_admin'),
		'value'		=>'Layouts',
		'subtype'	=> true,
		'options'	=> array(
				array(
					'name'		=> __('Two Column Layout','atp_admin'),
					'value'		=>'one_half_layout',
					'options'	=> array (
						array(
							'name'	=> __('One Half Content','atp_admin'),
							'id'	=> 'layout_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Half Last Content','atp_admin'),
							'id'	=> 'layout_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array(
					'name'		=> __('Three Column Layout','atp_admin'),
					'value'		=> 'one_third_layout',
					'options'	=> array (
						array(
							'name'	=> __('One Third Content','atp_admin'),
							'id'	=> 'one_third_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Third Content','atp_admin'),
							'id'	=> 'one_third_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Third Last Content','atp_admin'),
							'id'	=> 'one_third_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('Four Column Layout','atp_admin'),
					'value'		=> 'one_fourth_layout',
					'options'	=> array (
						array(
							'name'	=> __('One Fourth Content','atp_admin'),
							'id'	=> 'one_fourth_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Content','atp_admin'),
							'id'	=> 'one_fourth_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Content','atp_admin'),
							'id'	=> 'one_fourth_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Last Content','atp_admin'),
							'id'	=> 'one_fourth_4',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('Five Column Layout','atp_admin'),
					'value'		=> 'one_fifth_layout',
					'options'	=> array (
						array(
							'name'	=> __('One Fifth Content','atp_admin'),
							'id'	=> 'one_fifth_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth Content','atp_admin'),
							'id'	=> 'one_fifth_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth Content','atp_admin'),
							'id'	=> 'one_fifth_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth Content','atp_admin'),
							'id'	=> 'one_fifth_4',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth Last Content','atp_admin'),
							'id'	=> 'one_fifth_5',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('Six Column Layout','atp_admin'),
					'value'		=> 'one_sixth_layout',
					'options'	=> array (
						array(
							'name'	=> __('One Sixth Content','atp_admin'),
							'id'	=> 'one_sixth_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth Content','atp_admin'),
							'id'	=> 'one_sixth_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth Content','atp_admin'),
							'id'	=> 'one_sixth_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth Content','atp_admin'),
							'id'	=> 'one_sixth_4',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth Content','atp_admin'),
							'id'	=> 'one_sixth_5',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth Last Content','atp_admin'),
							'id'	=> 'one_sixth_6',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('One Third - Two Third','atp_admin'),
					'value'		=> 'one_3rd_2rd',
					'options'	=> array (
						array(
							'name'	=> __('One Third Content','atp_admin'),
							'id'	=> 'one3rd2rd_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Two Third Content Last','atp_admin'),
							'id'	=> 'one3rd2rd_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('Two Third - One Third','atp_admin'),
					'value'		=> 'two_3rd_1rd',
					'options'	=> array (
						array(
							'name'	=> __('Two Third Content','atp_admin'),
							'id'	=> 'two3rd1rd_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Third Last Content','atp_admin'),
							'id'	=> 'one3rd2rd_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('One Fourth - Three Fourth','atp_admin'),
					'value'		=> 'One_4th_Three_4th',
					'options'	=> array (
						array(
							'name'	=> __('One Fourth Content','atp_admin'),
							'id'	=> 'One4thThree4th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Three Fourth Last Content','atp_admin'),
							'id'	=> 'One4thThree4th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('Three Fourth - One Fourth','atp_admin'),
					'value'		=> 'Three_4th_One_4th',
					'options'	=> array (
						array(
							'name'	=> __('Three Fourth Content','atp_admin'),
							'id'	=> 'Three4thOne4th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Last Content','atp_admin'),
							'id'	=> 'Three4thOne4th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('One Fourth - One Fourth - One Half','atp_admin'),
					'value'		=> 'One_4th_One_4th_One_half',
					'options'	=> array (
						array(
							'name'	=> __('One Fourth Content','atp_admin'),
							'id'	=> 'One4thOne4thOnehalf_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Content','atp_admin'),
							'id'	=> 'One4thOne4thOnehalf_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Half Last Content','atp_admin'),
							'id'	=> 'One4thOne4thOnehalf_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('One Half - One Fourth - One Fourth','atp_admin'),
					'value'		=> 'One_half_One_4th_One_4th',
					'options'	=> array (
						array(
							'name'	=> __('One Half Content','atp_admin'),
							'id'	=> 'OnehalfOne4thOne4th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Content','atp_admin'),
							'id'	=> 'OnehalfOne4thOne4th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Last Content','atp_admin'),
							'id'	=> 'OnehalfOne4thOne4th_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('One Fourth - One Half - One Fourth','atp_admin'),
					'value'		=> 'One_4th_One_half_One_4th',
					'options'	=> array (
						array(
							'name'	=> __('One Fourth Content','atp_admin'),
							'id'	=> 'One4thOnehalfOne4th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Half Content','atp_admin'),
							'id'	=> 'One4thOnehalfOne4th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Last Content','atp_admin'),
							'id'	=> 'One4thOnehalfOne4th_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('One Fifth - Four Fifth','atp_admin'),
					'value'		=> 'One_5th_Four_5th',
					'options'	=> array (
						array(
							'name'	=> __('One Fifth Content','atp_admin'),
							'id'	=> 'One5thFour5th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Four Fifth Last Content','atp_admin'),
							'id'	=> 'One5thFour5th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('Four Fifth - One Fifth','atp_admin'),
					'value'		=> 'Four_5th_One_5th',
					'options'	=> array (
						array(
							'name'	=> __('Four Fifth Content','atp_admin'),
							'id'	=> 'Four5thOne5th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth Last Content','atp_admin'),
							'id'	=> 'Four5thOne5th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('Two Fifth - Three Fifth','atp_admin'),
					'value'		=> 'Two_5th_Three_5th',
					'options'	=> array (
						array(
							'name'	=> __('Two Fifth Content','atp_admin'),
							'id'	=> 'Two5thThree5th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Three Fifth Last Content','atp_admin'),
							'id'	=> 'Two5thThree5th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				array( 
					'name'		=> __('Three Fifth - Two Fifth','atp_admin'),
					'value'		=> 'Three_5th_Two_5th',
					'options'	=> array (
						array(
							'name'	=> __('Three Fifth Content','atp_admin'),
							'id'	=> 'Three5thTwo5th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Two Fifth Last Content','atp_admin'),
							'id'	=> 'Three5thTwo5th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
			),
		),
	//TYPOGRAPHY
	//--------------------------------
	"Typography"=>array(
		'name'		=> __('Typography','atp_admin'),
		'value'		=> 'Typography',
		'subtype'	=> true,
		'options'	=> array(
		//DROPCAP 1 
		//--------------------------------
				array(
					'name'		=> __('Drop Cap 1','atp_admin'),
					'value'		=> 'dropcap1',
					'options'	=> array (
						array(
							'name'	=> __('Dropcap Text','atp_admin'),
							'id'	=> 'dropcap_text',
							'std'	=> '',
							'type'	=> 'text',
						),
						array(
							'name'	=> __('Color (optional)','atp_admin'),
							'id'	=> 'color',
							'std'	=> '',
							'options'	=> array(
								'black'	=> 'Black',
								'blue'	=> 'Blue',
								'cyan'	=> 'Cyan',
								'green'	=> 'Green',
								'magenta'=> 'Magenta',
								'navy'	=> 'Navy',
								'orange'=> 'Orange',
								'pink'	=> 'Pink',
								'red'	=> 'Red',
								'yellow'=> 'Yellow',
							),
							'type' => 'select',
						),
					)
				),
		// DROPCAP 2 
		//--------------------------------
		array(
					'name'		=> __('Drop Cap 2','atp_admin'),
					'value'		=> 'dropcap2',
					'options'	=> array (
						array(
							'name'	=> __('Dropcap Text','atp_admin'),
							'id'	=> 'dropcap_text',
							'std'	=> '',
							'type'	=> 'text',
							),
						array(
							'name'	=> __('Background Color','atp_admin'),
							'id'	=> 'bgcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
					)
				),
		// DROPCAP 3 
		//--------------------------------
				array(
					'name'		=> __('Drop Cap 3','atp_admin'),
					'value'		=> 'dropcap3',
					'options'	=> array (
						array(
							'name'	=> __('Dropcap Text','atp_admin'),
							'id'	=> 'dropcap_text',
							'std'	=> '',
							'type'	=> 'text',
							),
						array(
							'name'	=> __('Color (optional)','atp_admin'),
							'id'	=> 'color',
							'std'	=> '',
							'type'	=> 'color',
						),
					)
				),
		//	BLOCKQUOTE 
		//--------------------------------
				array(
					'name'		=> __('Block Quotes','atp_admin'),
					'value'		=> 'blockquote',
					'options'	=> array (
						array(
							'name'	=> __('Align (optional)','atp_admin'),
							'id'	=> 'align',
							'std'	=> '',
							'options'=> array(
								''			=> __('Choose one...','atp_admin'),
								'left'		=> __('Left','atp_admin'),
								'right'		=> __('Right','atp_admin'),
								'center'	=> __('Center','atp_admin'),
							),
							'type' => 'select',
						),
						array(
							'name' => __('Cite Link', 'ATP_ADMIN_SITE'),
							'desc' => 'The link displays after the Citation.',
							'info' => '(optional)',
							'id' => 'citelink',
							'std' => '',
							'type' => 'text',
							'inputsize' => '53'
						),
						array(
							'name' => __('Width', 'ATP_ADMIN_SITE'),
							'desc' => 'Type the width in % or px, if you wish to use the blockquote in a specific width.',
							'info' => '(optional)',
							'id' => 'width',
							'std' => '',
							'type' => 'text',
							'inputsize' => '53'
						),
						array(
							'name'	=> __('Cite (optional)','atp_admin'),
							'id'	=> 'cite',
							'std'	=> '',
							'type'	=> 'text',
							),
						array(
							'name'	=> __('Content','atp_admin'),
							'id'	=> 'content',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
		//	STYLED LISTS
		//--------------------------------
				array(
					'name'		=> __('Styled List','atp_admin'),
					'value'		=> 'styledlist',
					'options'	=> array (
						array(
							'name'	=> __('List Style','atp_admin'),
							'id'	=> 'style',
							'std'	=> '',
							'options'=> array(
								'disc'	=> 'disc',
								'circle'	=> 'circle',
								'square'	=> 'square',
								'arrow1'	=> 'arrow1',
								'arrow2'	=> 'arrow2',
								'arrow3'	=> 'arrow3',
								'arrow4'	=> 'arrow4',
								'arrow5'	=> 'arrow5',
								'bullet1'	=> 'bullet1',
								'bullet2'	=> 'bullet2',
								'bullet3'	=> 'bullet3',
								'bullet4'	=> 'bullet4',
								'bullet5'	=> 'bullet5',
								'star1'		=> 'star1',
								'star2'		=> 'star2',
								'star3'		=> 'star3',
								'plus'		=> 'plus',
								'minus'		=> 'minus',
								'pointer'	=> 'pointer',
								'style1'	=> 'style1',
								'check'		=> 'check',
							),
							'type' => 'select',
						),
						array(
							'name'	=> __('Color (optional)','atp_admin'),
							'id'	=> 'color',
							'std'	=> '',	
							'options' => array(
								'black'	=> 'Black',
								'blue'	=> 'Blue',
								'cyan'	=> 'Cyan',
								'green'	=> 'Green',
								'magenta'=> 'Magenta',
								'navy'	=> 'Navy',
								'orange'=> 'Orange',
								'pink'	=> 'Pink',
								'red'	=> 'Red',
								'yellow'=> 'Yellow',
							),
							'type' => 'select',
						),
						array(
							'name'	=> __('Content','atp_admin'),
							'id'	=> 'content',
							'std'	=> '',
							'desc'	=> __('For List Content use HTML Elements &lt;ul&gt;&lt;li&gt;List Item&lt;/li>&lt;/ul>','atp_admin'),
							'type'	=> 'textarea'
						),
					)
				),
		// ICONS
		//--------------------------------
			array(
					'name'		=> __('Icon Text','atp_admin'),
					'value'		=> 'icon',
					'options'	=> array (
						array(
							'name'	=> __('Icon Style','atp_admin'),
							'id'	=> 'style',
							'std'	=> 'email',
							'options' => array(
									'male'		=> 'Male',
									'female'	=> 'Female',
									'zip'		=> 'Zip',
									'movie'		=> 'Movie',
									'addbook'	=> 'Address Book',
									'arrow'		=> 'Arrow',
									'calc'		=> 'Calc',
									'dollar'	=> 'Dollar',
									'pound'		=> 'Pound',
									'euro'		=> 'Euro',
									'yen'		=> 'Yen',
									'error'		=> 'Error',
									'exclamation'	=> 'Exclamation',
									'feed'		=> 'Feed',
									'help'		=> 'Help',
									'home'		=> 'Home',
									'mail'		=> 'Email',
									'medal'		=> 'Medal',
									'new'		=> 'New',
									'word'		=> 'Word',
									'pdf'		=> 'PDF',
									'phone'		=> 'Phone',
									'print'		=> 'Print',
									'star'		=> 'Star',
									'support'	=> 'Support',
									'vcard'		=> 'Vcard',
									'disk'		=> 'Disk',
									'monitor'	=> 'Monitor',
									'download'	=> 'Download',
									'pin'		=> 'Pin',
									'location'		=> 'location',
									'find'		=> 'Find',

								),
							'type'	=> 'select',
							),
							array(
								'name'	=> __('Color (optional)','atp_admin'),
								'id'	=> 'color',
								'std'	=> '',
								'options' => array(
									'black'	=> 'Black',
									'blue'	=> 'Blue',
									'cyan'	=> 'Cyan',
									'green'	=> 'Green',
									'magenta'=> 'Magenta',
									'gray'	=> 'Gray',
									'orange'=> 'Orange',
									'pink'	=> 'Pink',
									'red'	=> 'Red',
									'yellow'=> 'Yellow',
								),
								'type'	=> 'select',
							),
							array(
								'name'	=> __('Icon Text','atp_admin'),
								'id'	=> 'text',
								'std'	=> '',
								'type'	=> 'textarea'
							),
						)
					),
		// ICONS LINKS
		//--------------------------------
		array(
					'name'		=> __('Icon Links','atp_admin'),
					'value'		=> 'iconlinks',
					'options'	=> array (
						array(
							'name'	=> __('Icon Style','atp_admin'),
							'id'	=> 'style',
							'std'	=> 'email',
							'options' => array(
									'male'		=> 'Male',
									'female'	=> 'Female',
									'zip'		=> 'Zip',
									'movie'		=> 'Movie',
									'addbook'	=> 'Address Book',
									'arrow'		=> 'Arrow',
									'calc'		=> 'Calc',
									'dollar'	=> 'Dollar',
									'pound'		=> 'Pound',
									'euro'		=> 'Euro',
									'yen'		=> 'Yen',
									'error'		=> 'Error',
									'exclamation'	=> 'Exclamation',
									'feed'		=> 'Feed',
									'help'		=> 'Help',
									'home'		=> 'Home',
									'mail'		=> 'Email',
									'medal'		=> 'Medal',
									'new'		=> 'New',
									'word'		=> 'Word',
									'pdf'		=> 'PDF',
									'phone'		=> 'Phone',
									'print'		=> 'Print',
									'star'		=> 'Star',
									'support'	=> 'Support',
									'vcard'		=> 'Vcard',
									'disk'		=> 'Disk',
									'monitor'	=> 'Monitor',
									'download'	=> 'Download',
									'pin'		=> 'Pin',
									'location'		=> 'location',
									'find'		=> 'Find',
								),
							'type'	=> 'select',
							),
						array(
							'name'	=> __('Href','atp_admin'),
							'id'	=> 'href',
							'std'	=> '',
							'desc'	=> __('Use "http://" Before the URL','atp_admin'),
							'type'	=> 'text',
							'inputsize'	=>'60',
							),
						array(
							'name'	=> __('Target (optional)','atp_admin'),
							'id'	=> 'target',
							'std'	=> '',
							'options'=> array(
								''			=> __('Choose one...','atp_admin'),
								'_blank'	=> __('Open the linked document in a new window or tab','atp_admin'),
								'_self'		=> __('Open the linked document in the same frame as it was clicked.','atp_admin'),
								'_parent'	=> __('Open the linked document in the parent frameset','atp_admin'),
								'_top'		=> __('Open the linked document in the full body of the window','atp_admin'),
								),
							'type'	=> 'select',
							),
						array(
							'name' => __('Color (optional)','atp_admin'),
							'id' => 'color',
							'std' => '',
							'options' => array(
								'black'	=> 'Black',
								'blue'	=> 'Blue',
								'cyan'	=> 'Cyan',
								'green'	=> 'Green',
								'magenta'=> 'Magenta',
								'navy'	=> 'Navy',
								'orange'=> 'Orange',
								'pink'	=> 'Pink',
								'red'	=> 'Red',
								'yellow'=> 'Yellow',
								),
							'type' => 'select',
						),
						array(
							'name'	=> __('Icon Text','atp_admin'),
							'id'	=> 'text',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
		// HIGHLIGHT 
		//--------------------------------
				array(
					'name'		=> __('Highlight','atp_admin'),
					'value'		=> 'highlight',
					'options'	=> array (
						array(
							'name'	=> __('BG Color','atp_admin'),
							'id'	=> 'bgcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Text Color','atp_admin'),
							'id'	=> 'textcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Highlight Text','atp_admin'),
							'id'	=> 'text',
							'std'	=> '',
							'type'	=> 'textarea',
						),
					)
				),
		// FANCY HEADING 
		//--------------------------------
				array(
					'name'		=> __('Fancy Heading','atp_admin'),
					'value'		=> 'fancyheading',
					'options'	=> array (
						array(
							'name'	=> __('BG Color','atp_admin'),
							'id'	=> 'bgcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Text Color','atp_admin'),
							'id'	=> 'textcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Fancy Heading Text','atp_admin'),
							'id'	=> 'text',
							'std'	=> '',
							'type'	=> 'textarea',
						),
					)
				),
			),
		),
	// TYPOGRAPHY END
	//--------------------------------
	// BUTTON
	//--------------------------------
		"Button"=>array(
			'name'		=> __('Button','atp_admin'),
			'value'		=> 'Button',
			'options'	=> array (
				array(
					'name'	=> __('Id (optional)','atp_admin'),
					'id'	=> 'id',
					'std'	=> '',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Class (optional)','atp_admin'),
					'id'	=> 'class',
					'std'	=> '',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Link','atp_admin'),
					'id'	=> 'link',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '50',
				),
				array(
					'name'	=> __('Target (optional)','atp_admin'),
					'id'	=> 'linktarget',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','atp_admin'),				
						'_blank'	=> __('Open the linked document in a new window or tab','atp_admin'),
						'_self'		=> __('Open the linked document in the same frame as it was clicked.','atp_admin'),
						'_parent'	=> __('Open the linked document in the parent frameset','atp_admin'),
						'_top'		=> __('Open the linked document in the full body of the window','atp_admin'),
						),
					'type'	=> 'select',
					),
				array(
					'name'	=> __('Color (optional)','atp_admin'),
					'id'	=> 'color',
					'std'	=> '',
					'options' => array(
						''			=> __('Choose one...','atp_admin'),				
						'gray'		=> 'Gray',
						'brown'		=> 'Brown',
						'cyan'		=> 'Cyan',
						'orange'	=> 'Orange',
						'red'		=> 'Red',
						'magenta'	=> 'Magenta',
						'yellow'	=> 'Yellow',
						'blue'		=> 'Blue',
						'pink'		=> 'Pink',
						'green'		=> 'Green',
						'black'		=> 'Black',
						'white'		=> 'White',
						),
					'type' => 'select',
				),
				array(
					'name'	=> __('Align (optional)','atp_admin'),
					'id'	=> 'align',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','atp_admin'),
						'left'		=> __('Left','atp_admin'),
						'right'		=> __('Right','atp_admin'),
						'center'	=> __('Center','atp_admin'),
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('BG Color','atp_admin'),
					'id'	=> 'bgcolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Hover BG Color','atp_admin'),
					'id'	=> 'hoverbgcolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Hover Text Color','atp_admin'),
					'id'	=> 'hovertextcolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Text Color','atp_admin'),
					'id'	=> 'textcolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Button Size','atp_admin'),
					'id'	=> 'size',
					'std'	=> '',
					'type'	=> 'select',
					'options'=> array(
						''		=> __('Choose one...','atp_admin'),
						'small'	=> 'Small',
						'medium'=> 'Medium',
						'large'	=> 'Large',
					),
				),
				array(
					'name'	=> __('Full (optional)','atp_admin'),
					'id'	=> 'style',
					'desc'	=> __('Check this if you wish to display the button in full width.','atp_admin'),
					'std'	=> 'true',
					'type'	=> 'checkbox',
				),
				array(
					'name'	=> __('Button Width','atp_admin'),
					'id'	=> 'width',
					'std'	=> '',
					'desc'	=> __('Use % or px as units for width, do not leave only numbers.','atp_admin'),
					'type'	=> 'text',
				),

				array(
					'name'	=> __('Button Text','atp_admin'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'text',
				),
			)
		),
		// D I V I D E R S
		//--------------------------------------------------------
	'Divider'=>array(
			'name'		=>__('Divider','ATP_ADMIN_SITE'),
			'value'		=>'divider',
			'subtype'	=> true,
			'options'	=> array(
						array(
							'name'		=> __('Divider With Top Text','ATP_ADMIN_SITE'),
							'value'		=>'divider_top',
							'options'	=> array (
							
								array(
									'name'	=> __('Text','ATP_ADMIN_SITE'),
									'desc'	=> __('Enter The Divider Text.','ATP_ADMIN_SITE'),
									'id'	=> 'text',
									'std'	=> 'TOP',
									'type'	=> 'text',
									'inputsize'	=> '30',
								),
								
								
							)
						
						),
					array(
						'name'		=> __('Clear Both','ATP_ADMIN_SITE'),
						'value'		=>'clear',
						'options'	=> array ()
					
					),
					
					array(
						'name'		=> __('Divider','ATP_ADMIN_SITE'),
						'value'		=>'divider',
						'options'	=> array ()
					
					),
					
					array(
						'name'		=> __('Divider With Line','ATP_ADMIN_SITE'),
						'value'		=>'divider_line',
						'options'	=> array ()
					
					),
					array(
						'name'		=> __('Divider With Space','ATP_ADMIN_SITE'),
						'value'		=>'divider_space',
						'options'	=> array ()
					
					),
				
				),
		),
		
		// TABLE
		//--------------------------------
		"Table"=>array(
			'name'		=> __('Table','atp_admin'),
			'value'		=> 'Table',
			'options'	=> array (
				array(
					'name'	=> __('Table Width','atp_admin'),
					'id'	=> 'width',
					'std'	=> '',
					'desc'	=> __('Use % or px as units for width, do not leave only numbers.','atp_admin'),
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Align (optional)','atp_admin'),
					'id'	=> 'align',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','atp_admin'),
						'left'		=> __('Left','atp_admin'),
						'right'		=> __('Right','atp_admin'),
						'center'	=> __('Center','atp_admin'),
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('Table Content','atp_admin'),
					'id'	=> 'text',
					'std'	=> '',
					'desc'	=> __('For Table use HTML Elements &lt;table&gt;&lt;tr&gt;&lt;td>content&lt;/td>&lt;/tr>&lt;/table>','atp_admin'),
					'type'	=> 'textarea',
				),
			)
		),
		// TOGGLE
		//--------------------------------
		"Toggle"=>array(
			'name'		=> __('Toggle','atp_admin'),
			'value'		=> 'Toggle',
			'options'	=> array (
				array(
					'name'	=> __('Toggle Heading','atp_admin'),
					'id'	=> 'heading',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '70',
				),
				array(
					'name'	=> __('Toggle Content','atp_admin'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'textarea',
				),
			)
		),
		// FANCY TOGGLE
		//--------------------------------
		"Fancy Toggle"=>array(
			'name'		=> __('Fancy Toggle','atp_admin'),
			'value'		=> 'FancyToggle',
			'options'	=> array (
				array(
					'name'	=> __('Fancy Toggle. Heading','atp_admin'),
					'id'	=> 'heading',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '70',
				),
				array(
					'name'	=> __('Fancy Toggle. Content','atp_admin'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'textarea',
				),
			)
		),
		//BOXES
		//--------------------------------
		"Boxes"=>array(
			'name'		=> __('Boxes','atp_admin'),
			'value'		=>'Boxes',
			'subtype'	=> true,
			'options'	=> array(
			// FANCY BOX
			//--------------------------------
					array(
						'name'		=> __('Fancy Box','atp_admin'),
						'value'		=> 'fancybox',
						'options'	=> array (
							array(
								'name'	=> __('Title','atp_admin'),
								'id'	=> 'title',
								'std'	=> '',
								'type'	=> 'text',
								'inputsize'	=> '30',
							),
							array(
								'name'	=> __('Large Heading','atp_admin'),
								'id'	=> 'heading',
								'std'	=> '',
								'type'	=> 'text',
								'inputsize'	=> '30',
							),
							array(
								'name'	=> __('Title BG Color','atp_admin'),
								'id'	=> 'bgcolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Title Color','atp_admin'),
								'id'	=> 'titlecolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Border Color','atp_admin'),
								'id'	=> 'bordercolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Box BG Color','atp_admin'),
								'id'	=> 'boxbgcolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Text Color','atp_admin'),
								'id'	=> 'textcolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Corner Ribbon','atp_admin'),
								'id'	=> 'ribbon',
								'std'	=> '',
								'desc'	=> __('Corner Ribbon (Range from 01 - 64)','atp_admin'),
								'type' => 'text',
							),
							array(
								'name'	=> __('Box Content','atp_admin'),
								'id'	=> 'text',
								'std'	=> '',
								'type' => 'textarea',
							),
						)
					),
			// MINIMAL BOX 
			//--------------------------------
					array(
						'name'		=> __('Minimal Box','atp_admin'),
						'value'		=> 'minimalbox',
						'options'	=> array (
							array(
								'name'	=> __('Title','atp_admin'),
								'id'	=> 'title',
								'std'	=> '',
								'type'	=> 'text',
								'inputsize'	=> '30',
							),
							array(
								'name'	=> __('Large Heading','atp_admin'),
								'id'	=> 'heading',
								'std'	=> '',
								'type'	=> 'text',
								'inputsize'	=> '30',
							),
							array(
								'name'	=> __('Title Color','atp_admin'),
								'id'	=> 'titlecolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Title BG Color','atp_admin'),
								'id'	=> 'titlebgcolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Corner Ribbon','atp_admin'),
								'id'	=> 'ribbon',
								'std'	=> '',
								'desc'	=> __('Corner Ribbon (Range from 01 - 64)','atp_admin'),
								'type' => 'text',
							),
							array(
								'name'	=> __('Box Content','atp_admin'),
								'id'	=> 'text',
								'std'	=> '',
								'type' => 'textarea',
							),
						)
					),
			// FRAMED BOX 
			//--------------------------------
					array(
						'name'		=> __('Framed Box','atp_admin'),
						'value'		=> 'framedbox',
						'options'	=> array (
							array(
								'name'	=> __('Background Color','atp_admin'),
								'id'	=> 'bgcolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Border Color','atp_admin'),
								'id'	=> 'bordercolor',
								'std'	=> '',
								'type' => 'color',
							),
							array(
								'name'	=> __('Padding','atp_admin'),
								'id'	=> 'padding',
								'std'	=> '',
								'desc'	=> __('You can use any valid value for CSS padding property (default: 20px 20px 20px 20px)','atp_admin'),
								'type' => 'text',
							),
							array(
								'name'	=> __('Corner Ribbon','atp_admin'),
								'id'	=> 'ribbon',
								'std'	=> '',
								'desc'	=> __('Corner Ribbon (Range from 01 - 64)','atp_admin'),
								'type' => 'text',
							),
							array(
								'name'	=> __('Width','atp_admin'),
								'id'	=> 'width',
								'std'	=> '',
								'desc'	=> __('Use % or px as units for width, do not leave only numbers.','atp_admin'),
								'type'	=> 'text',
							),
							array(
								'name'	=> __('Height','atp_admin'),
								'id'	=> 'height',
								'std'	=> '',
								'desc'	=> __('Use % or px as units for height, do not leave only numbers.','atp_admin'),
								'type'	=> 'text',
							),
							array(
								'name'	=> __('Box Content','atp_admin'),
								'id'	=> 'text',
								'std'	=> '',
								'type' => 'textarea',
							),
						)
					),

		// M E S S A G E   B O X  
		//--------------------------------------------------------
		array(
			'name'		=> __('Message Box','ATP_ADMIN_SITE'),
			'value'		=> 'messagebox',
			'options'	=> array (
				array(
					'name'	=> __('Message Type','ATP_ADMIN_SITE'),
					'desc'	=> __('Choose the Message Box Type Error, Notice, Success etc','ATP_ADMIN_SITE'),
					'id'	=> 'msgtype',
					'std'	=> '',
					'options'=> array(
						'error'		=> __('Error','ATP_ADMIN_SITE'),
						'info'		=> __('Info','ATP_ADMIN_SITE'),
						'alert'		=> __('Alert','ATP_ADMIN_SITE'),
						'success'	=> __('Success','ATP_ADMIN_SITE'),
						'download'	=> __('Download','ATP_ADMIN_SITE'),
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('Message Text','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the content you wish to display for the message box','ATP_ADMIN_SITE'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'textarea',
				),
			)
		),
			// NOTE BOX 
			//--------------------------------
					array(
						'name'		=> __('Note Box','atp_admin'),
						'value'		=> 'notebox',
						'options'	=> array (
							array(
								'name'	=> __('Title (Optional)','atp_admin'),
								'id'	=> 'title',
								'std'	=> '',
								'type'	=> 'text',
								'inputsize'	=> '70',
							),
							array(
								'name'	=> __('Align (Optional)','atp_admin'),
								'id'	=> 'align',
								'std'	=> '',
								'options'=> array(
									''			=> __('Choose one...','atp_admin'),
									'left'		=> __('Left','atp_admin'),
									'right'		=> __('Right','atp_admin'),
									'center'	=> __('Center','atp_admin'),
								),
								'type' => 'select',
							),
							array(
								'name'	=> __('Width (Optional)','atp_admin'),
								'id'	=> 'width',
								'std'	=> '',
								'desc'	=> __('Use % or px as units for width, do not leave only numbers.','atp_admin'),
								'type'	=> 'text',
							),
							array(
								'name'	=> __('Message Text','atp_admin'),
								'id'	=> 'text',
								'std'	=> '',
								'type'	=> 'textarea',
							),
						)
					),
				),
			),
			// TABS 
			//--------------------------------
			"Tabs"=>array(
			'name'		=> __('Tabs','atp_admin'),
			'value'		=>'Tabs',
			'subtype'	=> true,
			'options'	=> array(
				array(
					'name'		=> __('Tab 2','atp_admin'),
					'value'		=>'2',
					'options'	=> array (
						array(
							'name'	=> __('Tab 1 Title','atp_admin'),
							'id'	=> 'title_1',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Tab 1 Bgcolor','atp_admin'),
							'id'	=> 'titlebgcolor_1',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 1 Title Color','atp_admin'),
							'id'	=> 'titlecolor_1',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 1 Content','atp_admin'),
							'id'	=> 'text_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						
						array(
							'name'	=> __('Tab 2 Title','atp_admin'),
							'id'	=> 'title_2',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
							array(
							'name'	=> __('Tab 2 Bgcolor','atp_admin'),
							'id'	=> 'titlebgcolor_2',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 2 Title Color','atp_admin'),
							'id'	=> 'titlecolor_2',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 2 Content','atp_admin'),
							'id'	=> 'text_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Tabs Type ','atp_admin'),
							'id'	=> 'ctabs',
							'desc'	=>'Choose Tabs Types',
							'std'	=> '',
							'options'=> array(
										'vertabs' => __('Vertical','atp_admin'),
										'horitabs' => __('Horizontal','atp_admin'),

										),
								'type'	=> 'select',
							),
					),
				),
				array(
					'name'		=> __('Tab 3','atp_admin'),
					'value'		=>'3',
					'options'	=> array (
						array(
							'name'	=> __('Tab 1 Title','atp_admin'),
							'id'	=> 'title_1',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
							array(
							'name'	=> __('Tab 1 Bgcolor','atp_admin'),
							'id'	=> 'titlebgcolor_1',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 1 Title Color','atp_admin'),
							'id'	=> 'titlecolor_1',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 1 Content','atp_admin'),
							'id'	=> 'text_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
		
						array(
							'name'	=> __('Tab 2 Title','atp_admin'),
							'id'	=> 'title_2',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Tab 2 Bgcolor','atp_admin'),
							'id'	=> 'titlebgcolor_2',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 2 Title Color','atp_admin'),
							'id'	=> 'titlecolor_2',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 2 Content','atp_admin'),
							'id'	=> 'text_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Tab 3 Title','atp_admin'),
							'id'	=> 'title_3',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
							array(
							'name'	=> __('Tab 3 Bgcolor','atp_admin'),
							'id'	=> 'titlebgcolor_3',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 3 Title Color','atp_admin'),
							'id'	=> 'titlecolor_3',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 3  Content','atp_admin'),
							'id'	=> 'text_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
					'name'	=> __('Tabs Type ','atp_admin'),
					'id'	=> 'ctabs',
					'desc'	=>'Choose Tabs Types',
					'std'	=> '',
					'options'=> array(
						'vertabs' => __('Vertical','atp_admin'),
						'horitabs' => __('Horizontal','atp_admin'),

					),
					'type'	=> 'select',
				),
						
					),
				),	
			)
		),
	
		//--------------------------------
		// IMAGE
		//--------------------------------
		"Image"=>array(
			'name'		=> __('Image','atp_admin'),
			'value'		=> 'image',
			'options'	=> array (
				array(
					'name'	=> __('Image URL','atp_admin'),
					'id'	=> 'imagesrc',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '70',
				),
				array(
					'name'	=> __('Title','atp_admin'),
					'id'	=> 'title',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '70',
				),
				array(
					'name'	=> __('Caption','atp_admin'),
					'id'	=> 'caption',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '70',
				),
				array(
					'name'	=> __('Class','atp_admin'),
					'id'	=> 'class',
					'desc'	=> 'Add sub class for the image if you want to assign any new class for the image',
					'std'	=> 'image',
					'type'	=> 'text',
					'inputsize' => '70',
				),
				array(
					'name'	=> __('Link','atp_admin'),
					'id'	=> 'alink',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '70',
				),
				array(
					'name'	=> __('Link Target (optional)','atp_admin'),
					'id'	=> 'target',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','atp_admin'),				
						'_blank'	=> __('Open the linked document in a new window or tab','atp_admin'),
						'_self'		=> __('Open the linked document in the same frame as it was clicked.','atp_admin'),
						'_parent'	=> __('Open the linked document in the parent frameset','atp_admin'),
						'_top'		=> __('Open the linked document in the full body of the window','atp_admin'),
						),
					'type'	=> 'select',
					),
				array(
					'name'	=> __('Lightbox','atp_admin'),
					'id'	=> 'lightbox',
					'std'	=> '',
					'type'	=> 'checkbox',
				),
				array(
					'name'	=> __('Align (Optional)','atp_admin'),
					'id'	=> 'align',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','atp_admin'),
						'left'		=> __('Left','atp_admin'),
						'right'		=> __('Right','atp_admin'),
						'center'	=> __('Center','atp_admin'),
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('Width','atp_admin'),
					'id'	=> 'width',
					'std'	=> '',
					'desc'	=> __('Do not use % or px as units for height, Write only numbers','atp_admin'),
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Height','atp_admin'),
					'id'	=> 'height',
					'std'	=> '',
					'desc'	=> __('Do not use % or px as units for height, Write only numbers','atp_admin'),
					'type'	=> 'text',
				),

			)
		),
		
		// Mini Gallery
		//--------------------------------
		
		"Mini Gallery"=>array(
			'name'		=> __('Mini Gallery','atp_admin'),
			'value'		=> 'minigallery',
			'options'	=> array (
				
				array(
					'name'	=> __('Width','atp_admin'),
					'id'	=> 'width',
					'std'	=> '',
					'desc'	=> __('Do not use % or px as units for width, Write only numbers.','atp_admin'),
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Height','atp_admin'),
					'id'	=> 'height',
					'std'	=> '',
					'desc'	=> __('Do not use % or px as units for height, Write only numbers.','atp_admin'),
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Class','atp_admin'),
					'id'	=> 'class',
					'desc'	=> 'Add sub class for the images if you want to assign any new class for the images but use spaces between multiple classes no commas',
					'std'	=> 'image',
					'type'	=> 'text',
				),
				array( "name"	=> "images url(s)",
							"desc"	=> "Please enter image url(s) in each separated lines.",
							"id"	=> "textarea_url",
							"std"	=> "5",
							"type"	=> "textarea",
							'options'	=>'',
							"inputsize" => "70"),
			)
		),
	


		// PHOTOFRAME
		//--------------------------------
		"Photo Frame"=>array(
			'name'		=> __('Photo Frame','atp_admin'),
			'value'		=> 'photoframe',
			'options'	=> array (
				array(
					'name'	=> __('Image URL','atp_admin'),
					'id'	=> 'imagesrc',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '70',
				),
				array(
					'name'	=> __('Alt','atp_admin'),
					'id'	=> 'alt',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '50',
				),
				
				array(
					'name'	=> __('Width','atp_admin'),
					'id'	=> 'width',
					'std'	=> '',
					'desc'	=> __('Use % or px as units for width, do not leave only numbers.','atp_admin'),
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Height','atp_admin'),
					'id'	=> 'height',
					'std'	=> '',
					'desc'	=> __('Use % or px as units for height, do not leave only numbers.','atp_admin'),
					'type'	=> 'text',
				),

			)
		),
	//GALLERIA
	//--------------------------------
		"Galleria"=>array(
			'name'		=> __('Galleria','atp_admin'),
			'value'		=>'galleria',
			'subtype'	=> true,
			'desc'	=>'',
			'inputsize'	=>'',
			'options'	=> array(
				array(
					'name'		=> __('Attachment','atp_admin'),
					'value'		=>'attachment',
					'desc'	=>'',
					'inputsize'	=>'',
					'options'	=> array (
					array(
					'name'	=> __('Width ','atp_admin'),
					'id'	=> 'width',
					'desc'	=> __('Enter the Width','atp_admin'),
					'std'	=> '',
					'inputsize'	=>'',
					'options'	=>'',
					'type'	=> 'text',
				),
			 array(
					'name'	=> __('Height ','atp_admin'),
					'id'	=> 'height',
					'desc'	=> __('Enter the Height','atp_admin'),
					'std'	=> '',
					'inputsize'	=>'',
					'options'	=>'',
					'type'	=> 'text',
				),
				
					array(
					'name'	=> __('Transition','atp_admin'),
					'id'	=> 'transition',
					'std'	=> 'fade',
					'desc'	=>'',
					'inputsize'	=>'',
					'options'=> array(
							'fade'		=> 'Fade',
							'flash'		=> 'Flash',
							'slide'		=> 'slide',
							'fadeslide'	=> 'fade & slide',
						),
					'type' => 'select',
				),
				
					array(
					'name'	=> __('Autoplay','atp_admin'),
					'id'	=> 'autoplay',
					'std'	=>'fade',
					'desc'	=>'',
					'inputsize'	=>'',
					'options'=> array(
							'false'		=> 'Stop',
							'1000'	=> '1000',
							'1500'	=> '1500',
							'2000'	=> '2000',
							'2500'	=> '2500',
							'3000'	=> '3000',
							'3500'	=> '3500',
							'4000'	=> '4000',
							'4500'	=> '4500',
							'5000'	=> '5000',
							'5500'	=> '5500',
							'6000'	=> '6000',
							'6500'	=> '6500',
							'7000'	=> '7000',
							'7500'	=> '7500',
							'8000'	=> '8000',
							'8500'	=> '8500',
							'9000'	=> '9000',
							'9500'	=> '9500',
						
						),
					'type' => 'select',
				),
					),
				),
		array(
					'name'		=> __('External Images','atp_admin'),
					'value'		=>'galleriaurl',
					'desc'	=>'',
					'inputsize'	=>'',
					'options'	=> array (
						array(
					'name'	=> __('Width ','atp_admin'),
					'id'	=> 'width',
					'desc'	=> __('Enter the Width','atp_admin'),
					'std'	=> '',
					'inputsize'	=>'',
					'options'	=>'',
					'type'	=> 'text',
				),
			 array(
					'name'	=> __('Height ','atp_admin'),
					'id'	=> 'height',
					'desc'	=> __('Enter the Height','atp_admin'),
					'std'	=> '',
					'inputsize'	=>'',
					'options'	=>'',
					'type'	=> 'text',
				),
				
					array(
					'name'	=> __('Transition','atp_admin'),
					'id'	=> 'transition',
					'std'	=> 'fade',
					'desc'	=>'',
					'inputsize'	=>'',
					'options'=> array(
							'fade'		=> 'Fade',
							'flash'		=> 'Flash',
							'slide'		=> 'slide',
							'fadeslide'	=> 'fade & slide',
						),
					'type' => 'select',
				),
				
					array(
					'name'	=> __('Autoplay','atp_admin'),
					'id'	=> 'autoplay',
					'std'	=>'fade',
					'desc'	=>'',
					'inputsize'	=>'',
					'options'=> array(
							'false'		=> 'Stop',
							'1000'	=> '1000',
							'1500'	=> '1500',
							'2000'	=> '2000',
							'2500'	=> '2500',
							'3000'	=> '3000',
							'3500'	=> '3500',
							'4000'	=> '4000',
							'4500'	=> '4500',
							'5000'	=> '5000',
							'5500'	=> '5500',
							'6000'	=> '6000',
							'6500'	=> '6500',
							'7000'	=> '7000',
							'7500'	=> '7500',
							'8000'	=> '8000',
							'8500'	=> '8500',
							'9000'	=> '9000',
							'9500'	=> '9500',
						
						),
					'type' => 'select',
				),
			array( "name"	=> "images url(s)",
						"desc"	=> "Please enter image url(s) in each separate lines.",
						"id"	=> "textarea_url",
						"std"	=> "5",
						"type"	=> "textarea",
						'options'	=>'',
						"inputsize" => "70"),
					),
				),			
			)
		),
		// Galleria end	
		//	WIDGETS
		//--------------------------------
		"Widgets"=>array(
			'name'		=>__('Widgets','atp_admin'),
			'value'		=>'widgets',
			'subtype'	=> true,
			'options'	=> array(
			// CONTACT FORM
			//--------------------------------
				array(
					'name'		=> __('Contact Form','atp_admin'),
					'value'		=>'Contactform',
					'options'	=> array (
						array(
							'name'	=> __('Email Id','atp_admin'),
							'id'	=> 'emailid',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Success Message','atp_admin'),
							'id'	=> 'successmessage',
							'std'	=> '',
							'desc'	=> __('Enter Success Message','atp_admin'),
							'type'	=> 'text',
							'inputsize'	=> '50',
						),
					)
				),
			// TWITTER
			//--------------------------------
				array(
					'name'		=> __('Twitter','atp_admin'),
					'value'		=>'twitter',
					'options'	=> array (
						array(
					'name'	=> __('Twitter Id','ATP_ADMIN_SITE'),
					'desc'	=> 'Twitter ID: <small>Use your Id from twitter url <em>http://twitter.com/<span style="color:red">username</span></em></small>',
					'id'	=> 'username',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				array(
					'name'	=> __('consumerkey','ATP_ADMIN_SITE'),
					'desc'	=> 'Enter Your Twitter consumer Key.',
					'id'	=> 'consumerkey',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				array(
					'name'	=> __('Consumer Secret','ATP_ADMIN_SITE'),
					'desc'	=> 'Enter Your Twitter Consumer Secret.',
					'id'	=> 'consumersecret',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				array(
					'name'	=> __('Access Token','ATP_ADMIN_SITE'),
					'desc'	=> 'Enter Your Twitter Access Token.',
					'id'	=> 'accesstoken',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				array(
					'name'	=> __('Access Token Secret','ATP_ADMIN_SITE'),
					'desc'	=> 'Enter Your Twitter Access Token Secret.',
					'id'	=> 'accesstokensecret',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				array(
					'name'	=> __('Limit','ATP_ADMIN_SITE'),
					'desc'	=> 'Type the number of tweets you wish to display.',
					'id'	=> 'limit',
					'std'	=> '4',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
					)
				),
			// FLICKR
			//--------------------------------
				array(
					'name'		=> __('Flickr','atp_admin'),
					'value'		=>'flickr',
					'options'	=> array (
						array(
							'name'	=> __('Flickr Id','atp_admin'),
							'id'	=> 'id',
							'std'	=> '',
							'desc'	=> __('Flickr ID: <small>find your Id from <a href="http://idgettr.com" target="_blank">idGettr</a></small>','atp_admin'),
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Limit','atp_admin'),
							'id'	=> 'limit',
							'std'	=> '3',
							'type'	=> 'text',
							'desc'	=> __('Flickr Photos Limit.','atp_admin'),
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Type','atp_admin'),
							'id'	=> 'type',
							'desc'	=> __('Choose Photos Type','atp_admin'),
							'std'	=> 'user',
							'options' => array(
								'user'	=> __('User','atp_admin'),
								'group'	=> __('Group','atp_admin'),
							),
							'type' => 'select',
						),
						array(
							'name'	=> __('Display','atp_admin'),
							'id'	=> 'display',
							'desc'	=> __('Choose Display Type','atp_admin'),
							'std'	=> 'random',
							'options' => array(
								'random'	=> __('Random','atp_admin'),
								'latest'	=> __('Latest','atp_admin'),
							),
							'type' => 'select',
						),
					)
				),
			// POPULAR POSTS
			//--------------------------------
				array(
					'name'		=> __('Popular Posts','atp_admin'),
					'value'		=>'popularposts',
					'options'	=> array (
						array(
							'name'	=> __('Limit','atp_admin'),
							'id'	=> 'limit',
							'std'	=> '3',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
						'name'	=> __('Thumbnail','atp_admin'),
						'id'	=> 'thumb',
						'std'	=> '',
						'type'	=> 'checkbox',
						),
					)
				),
			// RECENT POSTS
			//--------------------------------
				array(
					'name'		=> __('Recent Posts','atp_admin'),
					'value'		=>'recentposts',
					'options'	=> array (
						array(
							'name'	=> __('Limit','atp_admin'),
							'id'	=> 'limit',
							'std'	=> '3',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array( 
							"name"	=> "Categories",
							"desc"	=> "Select the categories to hold the posts",
							"id"	=> "cat_id",
							"std"	=> "random",
							"type"	=> "multiselect",
							'inputsize'	=>'',
							"options" => $this->atp_variable('categories')
							),

						array(
						'name'	=> __('Thumbnail','atp_admin'),
						'id'	=> 'thumb',
						'std'	=> '',
						'type'	=> 'checkbox',
						),
					)
				),
			
			// CONTACT INFO
			//--------------------------------
				array(
					'name'		=> __('Contact Info','atp_admin'),
					'value'		=>'contactinfo',
					'options'	=> array (
						array(
							'name'	=> __('Name','atp_admin'),
							'id'	=> 'name',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Address','atp_admin'),
							'id'	=> 'address',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('State','atp_admin'),
							'id'	=> 'state',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('City','atp_admin'),
							'id'	=> 'city',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Zip','atp_admin'),
							'id'	=> 'zip',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Phone','atp_admin'),
							'id'	=> 'phone',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Mobile','atp_admin'),
							'id'	=> 'mobile',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Website URL','atp_admin'),
							'id'	=> 'website',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),

						array(
							'name'	=> __('Email','atp_admin'),
							'id'	=> 'email',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
					)
				),
			)
		),
	//WIDGETS END
	//--------------------------------
	// GOOGLE MAP
	//--------------------------------
	//--------------------------------------------------------
		"Google Map"=>array(
			'name'		=> __('Google map','ATP_ADMIN_SITE'),
			'value'		=>'gmap',
			'options'	=> array (
				array(
					'name'	=> __('Width','ATP_ADMIN_SITE'),
					'desc'	=> 'Use % or px as units for Width, do not leave only numbers.',
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Height','ATP_ADMIN_SITE'),
					'desc'	=> 'Use % or px as units for Height, do not leave only numbers.',
					'id'	=> 'height',
					'std'	=> '300',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Address','ATP_ADMIN_SITE'),
					'desc'	=> 'Type the address you wish to display for the map u can use multiple address EX: Address1 | Address2 | Address3 .',
					'info'	=> '(optional)',
					'id'	=> 'address',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Latitude','ATP_ADMIN_SITE'),
					'id'	=> 'latitude',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				array(
					'name'	=> __('longitude','ATP_ADMIN_SITE'),
					'id'	=> 'longitude',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				array(
					'name'	=> __('Zoom','ATP_ADMIN_SITE'),
					'desc'	=> 'The initial Map zoom level. Required. (Zoom Range : 1-19)',
					'id'	=> 'zoom',
					'std'	=> '12',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Marker Description','ATP_ADMIN_SITE'),
					'desc'	=> 'You can use multiple Marker Description - Example: Description1 | Description2 | Description3.',
					'id'	=> 'marker_desc',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Info Window','ATP_ADMIN_SITE'),
					'desc'	=> 'Check this if you wish to open the marker window by default',
					'id'	=> 'infowindow',
					'std'	=> '',
					'type'	=> 'checkbox',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Controller','ATP_ADMIN_SITE'),
					'desc'	=> 'Check this if you wish to disable the Controller',
					'id'	=> 'controller',
					'std'	=> '',
					'type'	=> 'checkbox',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Google map stylers Color','ATP_ADMIN_SITE'),
					'desc'	=> 'Use Colorpicker to Googlemap stylers color',
					'id'	=> 'stylerscolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Gmap Types','ATP_ADMIN_SITE'),
					'desc'	=> 'HYBRID: <em>This map type displays a transparent layer of major streets on satellite images.</em> <br> ROADMAP: 						<em>This map type displays a normal street map.<br> SATELLITE: This map type displays satellite images.</em><br> TERRAIN: <em>This map type displays maps with physical features such as terrain and vegetation.</em>',
					'id'	=> 'types',
					'std'	=>'ROADMAP',
					'options'=> array(
								'ROADMAP'	=> 'Default road map',
								'SATELLITE'	=> 'Google Earth satellite',
								'HYBRID'	=> 'Hybrid',
								'TERRAIN'	=> 'Terain',
								),
					'type' => 'select',
				),
			)
		),
		// VIDEOS
		//--------------------------------
		"Videos"=>array(
			'name'		=>__('Video','atp_admin'),
			'value'		=>'video',
			'subtype'	=> true,
			'options'	=> array(
				
				// VIMEO
				//--------------------------------
				array(
					'name'		=> __('Vimeo','atp_admin'),
					'value'		=>'vimeo',
					'options'	=> array (				
						array(
							'name'	=> __('Width','atp_admin'),
							'id'	=> 'width',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Height','atp_admin'),
							'id'	=> 'height',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Clip id','atp_admin'),
							'id'	=> 'clipid',
							'std'	=> '',
							'desc'	=> __('The number from the clips URL (e.g. http://vimeo.com/123456)','atp_admin'),
							'type'	=> 'textarea',
						),
						array(
							'name'	=> __('Byline','atp_admin'),
							'id'	=> 'byline',
							'desc'	=> 'on/off',
							'std'	=>'true',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('title','atp_admin'),
							'id'	=> 'title',
							'desc'	=> 'on/off',
							'std'	=>'true',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Portrait','atp_admin'),
							'id'	=> 'portrait',
							'desc'	=> 'on/off',
							'std'	=>'true',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('autoplay','atp_admin'),
							'id'	=> 'autoplay',
							'desc'	=> 'on/off',
							'std'	=>'true',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('loop','atp_admin'),
							'id'	=> 'loop',
							'desc'	=> 'on/off',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('html5','atp_admin'),
							'id'	=> 'html5',
							'desc'	=> 'on/off',
							'type'	=> 'checkbox',
						),	
					)
				),
			)
		),
		//--------------------------------
		// Today Special
		//--------------------------------
		"Today Special"=>array(
			'name'		=> __('Today Special','atp_admin'),
			'value'		=> 'todayspecial',
			'options'	=> array(
				array(
					'name'	=> __('Todayspecial Limit','atp_admin'),
					'id'	=> 'limit',
					'desc'	=> __('Number of items to show per page','atp_admin'),
					'std'	=> '',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('More Button Text','atp_admin'),
					'id'	=> 'readmore',
					'desc'	=> __('Read More Text','atp_admin'),
					'std'	=> 'Readmore Text',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Content Limits','atp_admin'),
					'id'	=> 'limitcontent',
					'desc'	=> __('Enter the content character limits (default : 200)','atp_admin'),
					'std'	=> '100',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Image Height(Optional)','atp_admin'),
					'id'	=> 'imgheight',
					'desc'	=> __('Enter the Image height','atp_admin'),
					'std'	=> '',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Tags (optional)','atp_admin'),
					'id'	=> 'tags',
					'std'	=> '',
					'desc'	=> __('Hold Control/Command key to select multiple tags','atp_admin'),
					'options'=>	$this->atp_variable('tags'),
					'type'	=> 'multiselect',
				),
				array(
					'name'	=> __('Title','atp_admin'),
					'id'	=> 'title',
					'desc'	=> __('If the option is on, it will display title of item.','atp_admin'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),
				array(
					'name'	=> __('Description','atp_admin'),
					'id'	=> 'desc',
					'desc'	=> __('If the option is on, it will display description of item.','atp_admin'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),
				array(
					'name'	=> __('Pagination','atp_admin'),
					'id'	=> 'pagination',
					'desc'	=> __('If the option is on, it will display pagination, displaying all posts.','atp_admin'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),
				array(
					'name'	=> __('Display More Button','atp_admin'),
					'id'	=> 'morebutton',
					'desc'	=> __('If the option is on, readmore button will display on item.','atp_admin'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),	
				
			),
		),
		//--------------------------------
		// Food Menu 
		//--------------------------------
		"Food Menu"=>array(
			'name'		=> __('Food Menu','atp_admin'),
			'value'		=> 'foodspecial',
			'options'	=> array(
				array(
					'name'	=> __('Menu Items Limit','atp_admin'),
					'id'	=> 'limit',
					'desc'	=> __('Number of items to show per page','atp_admin'),
					'std'	=> '',
					'type'	=> 'text',
				),
			
				array(
					'name'	=> __('Character Limits','atp_admin'),
					'id'	=> 'limitcontent',
					'desc'	=> __('Enter the content character limits (default : 200)','atp_admin'),
					'std'	=> '200',
					'type'	=> 'text',
				),
			
				array(
					'name'	=> __('Categories (optional)','atp_admin'),
					'id'	=> 'cats',
					'std'	=> '',
					'desc'	=> __('Multiple Categories ','atp_admin'),
					'options'=>	$this->atp_variable('foodmenu_cat'),
					'type'	=> 'multiselect',
				),
				array(
					'name'	=> __('Title','atp_admin'),
					'id'	=> 'title',
					'desc'	=> __('If the option is checked, it will display title of Item.','atp_admin'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),
				array(
					'name'	=> __('Thumbnail','atp_admin'),
					'id'	=> 'thumb',
					'desc'	=> __('If the option is checked, it will display thumbnail','atp_admin'),
					'std'	=> '',
					'type'	=> 'checkbox',
				),
				array(
					'name'	=> __('Title Link','atp_admin'),
					'id'	=> 'titlelink',
					'desc'	=> __('If the option is checked, It will display the title href link to its post.','atp_admin'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),
				array(
					'name'	=> __('Description','atp_admin'),
					'id'	=> 'desc',
					'desc'	=> __('If the option is checked, it will display description of Item.','atp_admin'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),
				array(
					'name'	=> __('Pagination','atp_admin'),
					'id'	=> 'pagination',
					'desc'	=> __('If the option is checked, it will display pagination, displaying all posts.','atp_admin'),
					'std'	=> false,
					'type'	=> 'checkbox'
				),
				array(
					'name'	=> __('Two Columns','atp_admin'),
					'id'	=> 'columns',
					'desc'	=> __('If the option is checked, it will display the list in 2 columns layout.','atp_admin'),
					'std'	=> false,
					'type'	=> 'checkbox'
				),
			),	
		),	

	);

	function handleAdminMenu() {
		// You have to add one to the "post" writing/editing page, and one to the "page" writing/editing page
		add_meta_box('ShortcodeGenId', 'Shortcodes Generator', 'ShortcodeGenForm', 'post', 'normal','high');
		add_meta_box('ShortcodeGenId', 'Shortcodes Generator', 'ShortcodeGenForm', 'page', 'normal','high');
		add_meta_box('ShortcodeGenId', 'Shortcodes Generator', 'ShortcodeGenForm', 'menus', 'normal','high');
	}

	function typeeditor($type,$id,$atpoptions,$name,$desc,$std,$inputsize) {
		switch ($type) {
			case 'upload':
				echo '<td><table>';
				echo '<tr valign="top">';
				echo '<th scope="row">Upload Image</th>';
				echo '<td><label for="upload_image">';
				echo '<input value="'.$std.'" type="text" name="'.$id.'"  id="'.$id.'" size="50%" />';
				echo '<input class="upload_image_button"  name="'.$id.'" type="button" value="Upload Image" />';
				echo '</label></td><td id="id="'.$id.'"></td>';
				echo '</tr></table></td>';	
				break;
			case 'color':
				$inputsize = isset($inputsize) ? $inputsize : '10';
				echo '<script type="text/javascript" language="javascript">';
				echo 'jQuery(document).ready(function(){
						jQuery("#',$id,'").ColorPicker({
							color: "#0000ff",
							onShow: function (colpkr) {
								jQuery(colpkr).fadeIn(500);
							return false;
						},
						onHide: function (colpkr) {
							jQuery(colpkr).fadeOut(500);
							return false;
						},
						onChange: function (hsb, hex, rgb) {
							jQuery("#',$id,' div").css("backgroundColor", "#" + hex);
							jQuery("#',$id,'").next("input").attr("value","#" + hex);
						}
					});
				});</script>';
				echo '<th scope="row">',$name,'</th>';
				echo '<td><div id="', $id, '" class="colorSelector"><div style="background-color: #0000ff"></div></div><input size="10" type="color" name="', $id, '" id="', $id, '" value="', $std, '" size="', $inputsize, '" /></td>';
				break;
			case 'text':
				$inputsize = isset($inputsize) ? $inputsize : '10';
				echo '<th scope="row">',$name,'</th>';
				echo '<td><input type="text" name="', $id, '" id="', $id, '" value="', $std, '" size="', $inputsize, '" /> <span class="smalltext">', $desc,'</span></td>';
				break;
			case 'textarea':
				echo '<th scope="row">',$name,'</th>';
				echo '<td><textarea name="', $id, '" id="', $id, '" cols="60" rows="4" style="width:97%"></textarea><p><span class="smalltext">', $desc,'</span></p></td>';
				break;
			case 'select':
				echo '<th scope="row">',$name,'</th>';
				echo '<td><div class="', $id, '"><select  name="', $id, '" id="', $id, '">';
				foreach ($atpoptions as $optionkey => $option) {
					echo '<option value="',$optionkey,'">', $option, '</option>';
				}
				echo '</select></div></td>';
				break;
			case 'multiselect':           
				echo '<th scope="row">',$name,'</th>';
				echo '<td><div class="', $id, '"><select size="5" style="height:auto;" multiple="multiple" name="', $id, '[]" id="', $id, '">';	
				foreach ($atpoptions as $optionkey => $option) {
					echo '<option value="',$optionkey,'">', $option, '</option>';
				}
				echo '</select></td>';
				break;
			case 'radio':
				foreach ($atpoptions as $option) {
				echo '<th scope="row">',$name,'</th>';
				echo '<td><input class="atp-button" type="radio" name="', $id, '" value="', $option['value'], '" />', $option['name'],'</td>';
				}
				break;
			case 'checkbox':
				echo '<th scope="row">',$name,'</th>';
				echo '<td><span class="on_off"><input type="checkbox" class="atp-button" value="',$std,'" name="', $id, '" id="', $id, '"', $std ? ' checked="checked"' : '', ' /></span> <span class="smalltext">', $desc,'</span></td>';
				break;
		}
	}

	function ShortcodeGenForm($type) {?>
	<div class="atp_meta_options"> 
	<div class="glowbg">
	<div class="glowborder">
			<div class="atp_inputs">
				<div class="primary_select">
				<table class="shortcodestab" cellspacing="5"  cellpadding="5">
				<tr>
					<th scope="row">Shortcodes</th>
					<td><select id="primary_select">
							<option value="">Choose one</option>
							<?php global $atp_shortcodes; 
								foreach($atp_shortcodes as $shortcodes) {
									echo '<option value="'.$shortcodes['value'].'">'.$shortcodes['name'].'</option>';
								} ?>
						</select>
					</td>
				</tr>
				</table>
				</div>
			<?php
			global $atp_shortcodes; 
			foreach($atp_shortcodes as $shortcodes) { 
				echo '<div class="secondary_select" id="secondary_'.$shortcodes['value'].'">'; 
				if(isset($shortcodes['subtype'])){
					echo '<div class="secondaryselect">';
					echo '<table class="shortcodestab" cellspacing="5" cellpadding="5"><tr><th scope="row">Type:</th><td>';
					echo '<select name="atp_'.$shortcodes['value'].'_selector">';
					echo '<option value="">Choose one...</option>';
					foreach($shortcodes['options'] as $sub_shortcode) {
						echo '<option value="'.$sub_shortcode['value'].'">'.$sub_shortcode['name'].'</option>';
					}
					echo '</select>';
					echo '</td></tr>';
					echo '</table></div>';
					foreach($shortcodes['options'] as $sub_shortcode) {
						echo '<div id="atp-'.$sub_shortcode['value'].'" class="tertiary_select">';
						echo '<table class="shortcodestab" cellspacing="5"  cellpadding="5">';
						foreach($sub_shortcode['options'] as $option){
							echo '<tr>';
							$option['id']=''.$shortcodes['value'].'_'.$sub_shortcode['value'].'_'.$option['id'];
							if(!isset($option['desc'])) { $option['desc']=''; }
							if(!isset($option['inputsize'])) { $option['inputsize']=''; }
							if(!isset($option['std'])) { $option['std']=''; }
							if(!isset($option['options'])) { $option['options']=''; }
							typeeditor($option['type'],$option['id'],$option['options'],$option['name'],$option['desc'],$option['std'],$option['inputsize']);	
							echo '</tr>';
						}
						echo '</table></div>';
					}
				} else {	
					echo '<table class="shortcodestab" cellspacing="5" cellpadding="5">';
					foreach($shortcodes['options'] as $option){
						echo '<tr>';
						$option['id']=''.$shortcodes['value'].'_'.$option['id'];
						if(!isset($option['desc'])) { $option['desc']=''; }
							if(!isset($option['inputsize'])) { $option['inputsize']=''; }
							if(!isset($option['std'])) { $option['std']=''; }
							if(!isset($option['options'])) { $option['options']=''; }
						typeeditor($option['type'],$option['id'],$option['options'],$option['name'],$option['desc'],$option['std'],$option['inputsize']); 	echo '</tr>';
					} echo '</table>';
				} 
				?>
				</div>
			<?php
			} ?>
		<br />
		<input type="button" id="sendtoeditor" class="button" value="<?php _e('Send to Editor','atp_admin') ?>"/>
		</div>
		</div>
		</div>
		</div>
	<?php 
	}
?>