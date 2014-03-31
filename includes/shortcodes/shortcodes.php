<?php 
/*Description Box*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	function ffs_init_shortcodes_style() {
		wp_enqueue_style( 'easyResponsiveTabs', FFS_URI . 'includes/shortcodes/js/tabs/easy-responsive-tabs.css');
		wp_enqueue_style( 'ffs_style',  FFS_URI   . 'includes/shortcodes/css/ffs_style.css');
		wp_enqueue_style( 'font-awesome', FFS_URI . 'includes/shortcodes/css/font-awesome.min.css');
	}
	
	function ffs_init_shortcodes_script() {
		wp_enqueue_script('easyResponsiveTabs', FFS_URI . 'includes/shortcodes/js/tabs/easyResponsiveTabs.js', array( 'jquery' ), '20142803', false );
		wp_enqueue_script('easyResponsiveTabs', FFS_URI . 'includes/shortcodes/js/ffs_script.js', array( 'jquery' ), '20142803', false );
	}
	
	add_action( 'wp_enqueue_scripts', 'ffs_init_shortcodes_style',  5 );
	add_action( 'wp_enqueue_scripts', 'ffs_init_shortcodes_script', 10 );	
	
function ffs_description_box ($atts, $content = null) {
	$out = '';
	shortcode_atts(array(
		  'id'		=> '',
		  'style' 	=> ''
     ), $atts, 'description');
	
	$id = 'desc-box-' . rand( 1, 100 );
	
	if (wp_is_mobile()) {
		$style = ' font-size: 20px; text-transform : uppercase; text-align: center; font-weight: 300; ';
	} else {
		$style = ' font-size: 40px; text-transform : uppercase; text-align: center; font-weight: 300; ';
	}
	
	if (!empty($atts['id']))    { $id 	 = sanitize_html_class($atts['id']); }
	if (!empty($atts['style'])) { $style = esc_html($atts['style']); }
   
    $out .= '<div class="ffs_description" id="'. $id .'">';
	if (!empty($content)) { $out .=	'<div class="text" style="'. $style .'">' . $content . '</div>'; } else 
						  { $out .= '<div class="text" style="'. $style .'">No text Description</div>'; }			
	$out .= '</div>';
	$out .= '<div class="clearfix"></div>';
	
    return $out;
}
add_shortcode ("description_box", "ffs_description_box");


function ffs_info_box_row ($atts, $content = null) {
	 $out = ""; 
	 shortcode_atts(array(
		  'id'	=> '' 
     ), $atts, 'info_box_row');
	 
	 $id = 'info-box-row-' . rand( 1, 100 );
	 
	 if (isset($atts['id'])) { $id = sanitize_html_class($atts['id']); }
	 
	 $out .= '<div class="info-box-row clearfix" id="'. $id .'">';
		$out .=	ffs_esc_content_pbr(do_shortcode($content));
	 $out .= '</div>';
	 $out .= '<div class="clearfix"></div>';
	 
	 return $out;
	 
}
add_shortcode('info_box_row', 'ffs_info_box_row');

/*Add information box into content block*/
function ffs_info_box ($atts, $content = null) {
	$out = '';
	
	shortcode_atts(array(
		  'column'			=> '',
		  'title'	   		=> '', 
		  'link'			=> '',
		  'image' 			=> '', 
		  'icon'			=> '',
		  'styletext'	  	=> '',
		  'styletitle'		=> '',
		  'styleicon'		=> '',
		  'last'			=> ''
     ), $atts, 'info_box');
	
	 $id 		 = 'info-box-' . rand( 1, 100 );
	 $image   	 = ''; 
	 $title		 = '';
	 $column 	 = '';
	 $icon		 = 'fa-check-square-o';
	 $styletext  = 'text-align:center; font-size:13px; ';
	 $styletitle = 'text-align:center; font-size:20px; text-transform: uppercase; ';
	 $styleicon	 = 'background-color:#000; color:#fff; border-radius:50%; ';
	 $last       =  false;

	 if (isset($atts['column'])) 		{ $column 		 = sanitize_html_class($atts['column']); } 
	 if (isset($atts['title'])) 		{ $title 		 = esc_attr($atts['title']); }
	 if (isset($atts['image'])) 		{ $image 		 = esc_url ($atts['image']); }
	 if (isset($atts['styletext'])) 	{ $styletext  	 = esc_html($atts['styletext']); }
	 if (isset($atts['styletitle'])) 	{ $styletitle 	 = esc_html($atts['styletitle']); }
	 if (isset($atts['last'])) 			{ $last 		 = 'last'; } else { $last = ''; }
	 if (isset($atts['styleicon'])) 	{ $styleicon 	 = 'styleicon'; } 
	 if (isset($atts['icon'])) 			{ $icon 		 = 'icon'; } 
	 
	 
	 
	 $out .= '<div class="'. $column .' info-box ' . $last . '" id="' . $id . '">';
		if ($image != '') {  
			$out .= '<img class="icon" src="' . esc_url($image) .'" title="' . $title   . '" />'; 
		}  else {
			$out .= '<span class="ffs-icon-container"><i class="fa '. $icon .'" style="'.$styleicon.'"></i></span>';
		}
		
		if ($title   != '') {  $out .= '<div class="infobox-title" style="' . $styletitle .'">'  . $title   . '</div>'; }
		if ($content != '') {  $out .= '<div class="infobox-text"  style="' . $styletext  .'" >' . $content . '</div>'; }
		
	 $out .= '</div>';
	return $out;	 
} 
add_shortcode ("info_box", "ffs_info_box");

function ffs_tabs($atts, $content = null) {
	$output = '';
	$tab_titles = array();
	$tabs_class = 'tab_titles';
	shortcode_atts(array('id' => '', 'type' => '', 'width' => '', 'fit' => ''), $atts, 'tabs');
	
	$id 	= 'ffs-tabbed-' . rand( 1, 100 );
	$type 	= 'default';
	$width 	= 'auto';
	$fit	= 'false';
	
	if (isset($atts['id'])) 	{ $id 	 = sanitize_html_class($atts['id']); }
	if (isset($atts['type'])) 	{ $type  = esc_js($atts['type']); }
	if (isset($atts['width'])) 	{ $width = esc_js($atts['width']); }
	if (isset($atts['fit'])) 	{ $fit 	 = esc_js($atts['fit']); }
	
	
	$output .= '<script type="text/javascript"> ';
		$output .= 'jQuery(document).ready(function() { ';
			$output .= 'jQuery("#'.$id.'").easyResponsiveTabs({ ';
			$output .= '    type: 	"'.$type.'", ';
			$output .= '    width: "'.$width.'", ';
			$output .= '    fit: 	'.$fit;
			$output .= '    }); ';
		$output .= '	}); ';
	$output .= '</script>';
	
	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	if ( isset( $matches[1] ) ) { $tabs = $matches[1]; } 
	
	$output .= '<div id="'.$id.'" class="ffs-tabbed-nav">';
		$output .= '<ul class="resp-tabs-list">';
	if (count($tabs)) {
		foreach ($tabs as $tab) {
			$output .= '<li>' . esc_html($tab[0]) . '</li>';
		}
	}	
	$output .= '</ul>';
	
	$output .= '<div class="resp-tabs-container">';
			$output .= ffs_esc_content_pbr(do_shortcode($content));
		$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="clearfix"></div>';
	return $output;
}
add_shortcode('tabs', 'ffs_tabs');

function ffs_tab ( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		$class = '';
		if ( $title != 'Tab' ) {
			 $class = ' tab-' . sanitize_title( $title );
		}
		return '<div class="ffs_tab' . esc_attr( $class ) . '">' . do_shortcode( $content ) . '</div>';
} 
add_shortcode( 'tab', 'ffs_tab', 99 );


function ffs_height_separator ( $atts, $content = null) {
	extract( shortcode_atts( array( 'height'  => '20'), $atts ) );
    if($height == '') {
      $return = '';
    } else{
      $return = 'style="height: '.$height.'px;"';
    }
      
     return '<div class="clear"></div><div class="gap" ' . $return . '></div>';
}
add_shortcode( 'sep', 'ffs_height_separator' );


function ffs_esc_content_pbr($content = null) {
	 $content = preg_replace( '%<p>&nbsp;\s*</p>%', '', $content );
	 $Old     = array( '<br />', '<br>' );
	 $New     = array( '','' );
	 $content = str_replace( $Old, $New, $content );
	 return $content;
}



function ffs_sep ($atts, $content = null) {
	$out = '';
	shortcode_atts(array(
		  'id'		=> '',
		  'height'	=> '',
		  'style' 	=> ''
     ), $atts, 'description');
	
	$id = 'ffs-sep-' . rand( 1, 100 );
	
	$style  = 'border-bottom:1px solid #ebebeb; ';
	$height = 10;
	
	if (!empty($atts['id']))    { $id = sanitize_html_class($atts['id']); }
	if (!empty($atts['height']))    { $height = sanitize_html_class($atts['height']); }
	if (!empty($atts['style'])) { $style = esc_html($atts['style']); }
	
	
   
    $out .= '<div class="ffs-sep" id="'. $id .'" style="'.$style.' height:'.$height.'px; "></div>';
	$out .= '<div class="clearfix"></div>';
	
    return $out;
}
add_shortcode ("sep", "ffs_sep");