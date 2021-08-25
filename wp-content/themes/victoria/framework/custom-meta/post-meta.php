<?php
	//
	//--------------------------------------------------------
	$prefix = '';
	$this->meta_box[] = array(
		'id'		=> 'post-meta-box',
		'title'		=> THEMENAME.'&nbsp;Post Options',
		'page'		=> array('post'),
		'context'	=> 'normal',
		'priority'	=> 'high',
		'fields'	=> array(
			
				// C U S T O M   S U B H E A D E R   T E A S E R 
			//--------------------------------------------------------
			array(
				'name'	=> __('Subheader Options','ATP_ADMIN_SITE'),
				'desc'	=> __('Select the Teaser type mode you want to display in subheader of the this Post','ATP_ADMIN_SITE'),
				'id'	=> $prefix . 'subheader_teaser_options',
				'std'	=> '',
				'type'	=> 'select',
				'options'=> array(
							'default'	=> 'Default ( Options Panel )',
							'twitter'	=> 'Twitter', 	
							'custom'	=> 'Custom', 
							'customhtml'	=> 'Custom Html',
							'disable'	=> 'Disable')
			),
			// T E A S E R   T E X T 
			//--------------------------------------------------------
			array(
				'name'	=> __('Teaser Text','ATP_ADMIN_SITE'),
				'desc'	=> __('Type the text you wish to display in the subheader of this page/post. If you wish to use bold text then use strong element example &lt;strong&gt;bold text &lt;/strong&gt;','ATP_ADMIN_SITE'),
				'id'	=> $prefix .'page_desc',
				'title'	=> 'Title &amp; Teaser Text',
				'class'	=> 'sub_teaser_option custom',
				'std'	=> '',
				'type'	=> 'textarea',
			),
			// C U S T O M   H T M L 
			//--------------------------------------------------------
			array(
				'name'	=> __('Custom HTML / Shortcode','ATP_ADMIN_SITE'),
				'desc'	=> __('Type any text or shortcode you wish to display in the subheader area. This field supports shortcode','ATP_ADMIN_SITE'),
				'id'	=> $prefix .'custom_html',
				'title'	=> 'Custom Text / Shortcode',
				'class'	=> 'sub_teaser_option customhtml',
				'std'	=> '',
				'type'	=> 'textarea',
			),
			// P A G E   B A C K G R O U N D
			//--------------------------------------------------------
			array(
				'name'	=> __('Page Background Image','ATP_ADMIN_SITE'),
				'desc'	=> __('Upload the image for the page background','ATP_ADMIN_SITE'),
				'id'	=> $prefix .'page_bg_image',
				'std'	=> '',
				'title'	=> 'Background Image',
				'type'	=> 'upload',
			),
			// S U B H E A D E R   C O L O R
			//--------------------------------------------------------
			array(
				'name'	=> __('Subheader Background','ATP_ADMIN_SITE'),
				'desc'	=> __('Choose the color for subheader background','ATP_ADMIN_SITE'),
				'id'	=> $prefix .'subheader_bg_color',
				'std'	=> '',
				'title'	=> 'Subheader Background',
				'type'	=> 'color',
			),
			// S U B H E A D E R   B A C K G R O U N D 
			//--------------------------------------------------------
			array(
				'name'	=> __('Subheader Image','ATP_ADMIN_SITE'),
				'desc'	=> __('Upload Subheader Image','ATP_ADMIN_SITE'),
				'id'	=> $prefix.'subheader_img',
				'type'	=> 'upload',
				'std' 	=> '',
				
			),
			// C U S T O M   S I D E B A R 
			//--------------------------------------------------------
			array(
				'name'	=> __('Custom Sidebar','ATP_ADMIN_SITE'),
				'desc'	=> __('Select the Sidebar you want to assign for this page.','ATP_ADMIN_SITE'),
				'id'	=> $prefix . 'custom_widget',
				'std'	=> '',
				'type'	=> 'customselect',
				'options'=> $sidebarwidget
			),
			// S I D E B A R   P O S I T I O N 
			//--------------------------------------------------------
			array(
				'name'	=> __('Layout Option','ATP_ADMIN_SITE'),
				'desc'	=> __('Select the Layout style you want to use for this page, Left Sidebar or Right Sidebar or Full Width.','ATP_ADMIN_SITE'),
				'id'	=> $prefix . 'sidebar_options',
				'std'	=> 'rightsidebar',
				'type'	=> 'layout',
				'options'=> array(
								'rightsidebar'	=>  FRAMEWORK_URI . 'admin/images/right-sidebar.png', 
								'leftsidebar'	=>  FRAMEWORK_URI . 'admin/images/left-sidebar.png',
								'fullwidth'	=>  FRAMEWORK_URI . 'admin/images/fullwidth.png')	
			),
			// B R E A D C R U M B 
			//--------------------------------------------------------
			array(
				'name'	=> __('Breadcrumb','ATP_ADMIN_SITE'),
				'desc'	=> __('Check this if you wish to disable the breadcrumb for this page.','ATP_ADMIN_SITE'),
				'id'	=> $prefix.'breadcrumb',
				'std' 	=> '',
				'type'	=> 'checkbox',
			),
		)
	);
?>