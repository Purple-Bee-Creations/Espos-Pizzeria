<?php
/* Food Menus Meta box setup function. */
$prefix = '';

$this->meta_box[]  = array(
	'id'		=> 'menus-meta-box',
	'title'		=> THEMENAME.'&nbsp;Menus Options',
	'page'		=> array('menus'),
	'context'	=> 'normal',
	'priority'	=> 'core',
	'fields'	=> array(
		array(
			'name'	=> 'Full Size Image',
			'id'	=> $prefix . 'fullimg',
			'type'	=> 'upload',
			'desc'	=>'Use this image field only if you want to choose a different image to load when lightbox is opened.',
			'std'	=> ''
		),
		array(
			"name"	=> "Food Price",
			"type"	=> "text",
			"id"	=> $prefix . "price",
			"std"	=> "",
			"title"	=> "Food Item Price",
			"desc"	=> "Enter the price of the menu item excluding the currency symbol"
		),
		
		array(
			"name"	=> "More Food Price",
			"type" => 'addprice',
			"id"	=> $prefix . "moreprice",
			"std"	=> "",
			"title"	=> "Food Item Prices",
			"desc"	=> "Click add Price Enter the price of the menu item including the currency symbol"
		),
		
		array(
			"name"	=> "Menu Item Description",
			"type"	=> "textarea",
			"id"	=> $prefix . "item_desc",
			"std"	=> "",
			"title"	=> "Menu Item Description",
			"desc"	=> "Type the short summary of your food menu item."
		),
		array(
			'name'	=> 'Custom Sidebar',
			'id'	=> $prefix . '_custom_widget',
			'type'	=> 'customselect',
			'desc'	=> 'Select the custom sidebar you want to assign for this page.',
			"std"	=> "",
			"options"=> $sidebarwidget
		),
		array(
			'name'	=> 'Page Background Image',
			'type'	=> 'upload',
			'id'	=> $prefix . 'page_bg_image',
			'std'	=> '',
			'title'	=> 'Background Image',
			'desc'	=> 'Upload the image for the page background'
		),	
		array(
			'name'	=> 'Layout Option',
			'id'	=> $prefix . 'sidebar_options',
			'type'	=> 'select',
			"std"	=> "",
			'desc'	=> 'Select the Layout style you want to use for this page, Left Sidebar, Right Sidebar or Full Width',
			"options"=> array(
				"rightsidebar"	=> "Right Sidebar", 
				"leftsidebar"	=> "Left Sidebar",
				"fullwidth"	=> "Full Width"
			)	
		)
	
	)
);
?>