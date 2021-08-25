<?php

	// T O G G L E S
	//--------------------------------------------------------
	function sys_toggle_content( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'heading'	=> '',
		), $atts));
	
		$out= '<div class="simpletoggle">';
		$out .= '<span class="toggle"><a href="#">' .$heading. '</a></span>';
		$out .= '<div class="toggle_content" style="display: none;">';
		$out .= '<div class="toggleinside">';
		$out .= do_shortcode($content);
		$out .= '</div></div></div>';
		
		return $out;
	}
	add_shortcode('toggle', 'sys_toggle_content');

	// F A N C Y   T O G G L E
	//--------------------------------------------------------
	function sys_fancy_toggle_content( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'heading'	=> '',
		), $atts));
		$out= '<div class="fancytoggle">';
		$out .= '<div class="fancytogglebg">';
		$out .= '<span class="toggle"><a href="#">' .$heading. '</a></span>';
		$out .= '<div class="toggle_content" style="display: none;">';
		$out .= '<div class="toggleinside">';
		$out .= do_shortcode($content);
		$out .= '</div></div>';
		$out .= '</div>';
		$out .= '</div>';
		
		return $out;
	}
	add_shortcode('fancytoggle', 'sys_fancy_toggle_content');

	// T A B S G R O U P
 	//--------------------------------------------------------
	function atp_tab_group( $atts, $content ){
		extract(shortcode_atts(array(
			'tabtype'	=> '',
			'position'	=> '',
		), $atts));
	
		$GLOBALS['tab_count'] = 0;
		do_shortcode( $content );
		if($tabtype=="vertabs") {
			$tabtype='vertabs';
		}else{ 
			$tabtype="";
		}
		switch($position){
			case'centertabs':
						$positiontype="centertabs";
						break;
			case'righttabs':
						$positiontype="righttabs";
						break;
			default:
						$positiontype="";
		}
		$customtabcolor = '';
		$return = '<div class="systabspane '.$tabtype.'">';
		if( is_array( $GLOBALS['tabs'] ) ){
			foreach( $GLOBALS['tabs'] as $tab ){ 
				if($tab['tabcolor'] !='') {
					$customtabcolor = ' style="background-color:'.$tab['tabcolor'].'"';
				}
				$tabs[] = '<li ' .$customtabcolor. ' ><a href="#" style="color:'.$tab['textcolor'].';">'.$tab['title'].'</a></li>';
				$panes[] = '<div  class="tab_content">'.do_shortcode($tab['content']).'</div>';
			}
			$return .='<ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<div class="panes">'.implode( "\n", $panes ).'</div>';
		}
		$return.='<div class="clear"></div></div>';
			unset( $GLOBALS['tabs'], $GLOBALS['tab_count'] );
		return $return;
	}
	// T A B S 
	//--------------------------------------------------------
	function atp_tab( $atts, $content ){
		extract(shortcode_atts(array(
			'title'		=> 'Tab %s',
			'tabcolor'	=> 'Tab %s',
			'textcolor'	=> 'Tab %s',
			'icon'		=> 'Tab %s'
		), $atts));

		$x = $GLOBALS['tab_count'];
		$GLOBALS['tabs'][$x] = array(
			'title'		=> sprintf( $title, $GLOBALS['tab_count'] ),
			'tabcolor'	=> sprintf( $tabcolor, $GLOBALS['tab_count'] ),
			'textcolor'	=> sprintf( $textcolor, $GLOBALS['tab_count'] ),
			'icon'		=> sprintf( $icon, $GLOBALS['tab_count'] ),			
			'content'	=>  $content 
		);
		$GLOBALS['tab_count']++;
	}
	add_shortcode( 'minitabs', 'atp_tab_group' );
	add_shortcode( 'tab', 'atp_tab' );

	// P R I C I E G R O U P
 	//--------------------------------------------------------
	function atp_price_group( $atts, $content ){
		extract(shortcode_atts(array(
		), $atts));
		wp_reset_query();
		$GLOBALS['price_count'] = 0;
		$count=0;
		do_shortcode( $content );
		if( is_array( $GLOBALS['price'] ) ){
			foreach( $GLOBALS['price'] as $price ){
				$out .='<div class="block '.$columnid.'">
							<div class="pricebox"><h2>'.$price['title'].'</h2>';
				$bgcolor=$price['headingbgcolor'];
				$color=$price['headingcolor'];
				$bgcolor = $bgcolor?'background-color:'.$bgcolor.';':'';
				$color = $color?'color:'.$color.';':'';
				$extras =	($color!==''||$bgcolor!='')?' style="'.$color.$bgcolor.'"':'';

				$out .="<div class='pricetag' $extras>";
				$out .= $price['heading'];
				$out .='</div>';
				$out .='<div class="pt_desc">'.do_shortcode($price['content']).'</div>';
				$out .='</div>';
				$out .='</div>';
				$count++;
			}
			if($count =="3") { $class="col3"; }
			$return= '<div class="pricetable '.$class.' clearfix"><div class="pricinginner">';
			$return .= $out;
			$return .= '</div>';
		}

		$return.='<div class="clear"></div></div>';
		unset( $GLOBALS['price'], $GLOBALS['price_count'] );

		return $return;
	}
	/*
	 * [pricingcolumns]
	 * [col1 title="Basic Plan" heading="$7.95/pm" headingbgcolor="" headingcolor=""]
	   [/col1]
	   [col2 title="Basic Plan" heading="$7.95/pm"]
	   [/col2]
	   [col3 title="Basic Plan" heading="$7.95/pm"]
	   [/col3]
	 * [pricingcolumns]
 	 */
	
	// P R I C  E 
	//--------------------------------------------------------
	function atp_price( $atts, $content ){
		extract(shortcode_atts(array(
			'title'		=> '',
			'heading'	=> '',
			'headingbgcolor' => '',
			'headingcolor' => '',
			'desc'	=> ''
		), $atts));

		$x = $GLOBALS['price_count'];
		$GLOBALS['price'][$x] = array(
			'title'		=> $title,
			'heading'	=> do_shortcode($heading),
			'headingbgcolor'	=> $headingbgcolor,
			'headingcolor'	=> $headingcolor,
			'content'	=>  $content
		);
		$GLOBALS['price_count']++;
	}
	add_shortcode( 'pricingcolumns', 'atp_price_group' );
	add_shortcode( 'col', 'atp_price' );
?>