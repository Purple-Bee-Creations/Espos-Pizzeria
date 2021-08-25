<?php

	/**
	 * G O O G L E   C H A R T
	 *--------------------------------------------------------
	 * http://blue-anvil.com/archives/8-fun-useful-shortcode-functions-for-wordpress/
	 */

	function chart_shortcode( $atts,$content = null) {
		extract(shortcode_atts(array(
			'title'	=> '',
			'width'	=> '',
			'height'=> '',
			'extras'=> '',
			'type'	=> ''
			), $atts));
		$chartid='chart_div'.rand(1,100);
		switch($type){
			case'Gauge':
					$chartpackage='gauge';
					break;
			case'Table':
					$chartpackage='table';
					break;
			case'Geo':
					$chartpackage='geochart';
					break;
			default:
					$chartpackage='corechart';
		}
		
		$out = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';
		$out .= '<script type="text/javascript">';
        $out .= 'google.load("visualization", "1", {packages:["'.$chartpackage.'"]});';
		$out .= 'google.setOnLoadCallback(drawChart);';
		$out .= 'function drawChart() {';
		$out .= $content;
		if ($extras != '') { $extras = ', '.$extras; }
			$out .= 'var options = { "title" : "'.$title.'", "width" : '.$width.', "height" : '.$height.' '.$extras.' };';
		if(($type=="Gauge") || ($type=="Table")){
			$out .='var chart = new google.visualization.'.$type.'(document.getElementById("'.$chartid.'"));';
		}else{
			$out .='var chart = new google.visualization.'.$type.'Chart(document.getElementById("'.$chartid.'"));';
		}
		
		$out .= 'chart.draw(data,options); }';
		$out .= '</script>';
		$out .= '<div id="'.$chartid.'" class="clearfix"></div>';
		return $out;
	}
	add_shortcode('chart', 'chart_shortcode');
?>