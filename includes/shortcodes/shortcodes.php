<?php 
/*Description Box*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	function ffs_init_shortcodes_style() {
		wp_enqueue_style( 'easyResponsiveTabs', FFS_URI . 'includes/shortcodes/js/tabs/easy-responsive-tabs.css');
		wp_enqueue_style( 'ffs_style',  		FFS_URI . 'includes/shortcodes/css/ffs_style.css');
		wp_enqueue_style( 'font-awesome',		FFS_URI . 'includes/shortcodes/css/font-awesome.min.css');
		wp_enqueue_style( 'boostrap',			FFS_URI . 'includes/shortcodes/bootstrap/css/bootstrap.min.css');
	}
	
	function ffs_init_shortcodes_script() {
		wp_enqueue_script('easyResponsiveTabs', FFS_URI . 'includes/shortcodes/js/tabs/easyResponsiveTabs.js', array( 'jquery' ), '20142803', true );
		wp_enqueue_script('easyResponsiveTabs', FFS_URI . 'includes/shortcodes/js/ffs_script.js', array( 'jquery' ), '20142803', true );
		wp_enqueue_script('boostrap',			FFS_URI . 'includes/shortcodes/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '20142803', true );
	}
	
	add_action( 'wp_enqueue_scripts', 'ffs_init_shortcodes_style',  99 );
	add_action( 'wp_enqueue_scripts', 'ffs_init_shortcodes_script', 100 );	
	
function ffs_description_box ($atts, $content = null) {
	$out = '';
	shortcode_atts(array(
		  'id'		=> '',
		  'style' 	=> ''
     ), $atts, 'ffs_dbox');
	
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
add_shortcode ("ffs_dbox", "ffs_description_box");


function ffs_ibox_row_shortcode ($atts, $content = null) {
	 $out = ""; 
	 shortcode_atts(array(
		  'id'	=> '' 
     ), $atts, 'ffs_ibox_row');
	 
	 $id = 'info-box-row-' . rand( 1, 100 );
	 
	 if (isset($atts['id'])) { $id = sanitize_html_class($atts['id']); }
	 
	 $out .= '<div class="info-box-row clearfix" id="'. $id .'">';
		$out .=	ffs_esc_content_pbr(do_shortcode($content));
	 $out .= '</div>';
	 $out .= '<div class="clearfix"></div>';
	 
	 return $out;
	 
}
add_shortcode('ffs_ibox_row', 'ffs_ibox_row_shortcode');

/*Add information box into content block*/
function ffs_info_box ($atts, $content = null) {
	$out = '';
	
	shortcode_atts(array(
		  'column'			=> '',
		  'title'	   		=> '', 
		  'link'			=> '',
		  'image' 			=> '', 
		  'icon'			=> '',
		  'icon_position'	=> '',
		  'styletext'	  	=> '',
		  'styletitle'		=> '',
		  'styleicon'		=> '',
		  'last'			=> ''
     ), $atts, 'ffs_info_box');
	
	 $id 		 = 'info-box-' . rand( 1, 100 );
	 $image   	 = ''; 
	 $title		 = '';
	 $column 	 = '';
	 $icon_position = 'center';
	 $icon		 = 'fa-check-square-o';
	 $styletext  = 'font-size:13px; ';
	 $styletitle = 'font-size:20px; text-transform: uppercase; ';
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
	 if (isset($atts['icon_position'])) { $icon_position = sanitize_html_class($atts['icon_position']);} 
	 
	 if ($icon_position == 'left') {
		$styletext  .= $styletext . 'text-align:left; ';
		$styletitle .= $styletitle . 'text-align:left; ';
	 } else if ($icon_position == 'right') {
		$styletext  .= $styletext . 'text-align:right; ';
		$styletitle .= $styletitle . 'text-align:right; ';
	 } else {
		$styletext  .= $styletext . 'text-align:center; ';
		$styletitle .= $styletitle . 'text-align:center; ';
	 }
	 
	 $out .= '<div id="'.$id.'" class="'. $column .' info-box ' . $icon_position . ' ' . $last . '" >';
		if (($image != '') || ($icon != '')) {
			$out .= '<div class="ffs-icon-box">';
			if ($image != '') {  
				$out .= '<img class="icon" src="' . esc_url($image) .'" title="' . $title   . '" />'; 
			} else {
				if ($icon != '') {
					$out .= '<span class="ffs-icon-container"><i class="fa '. $icon .'" style="'.$styleicon.'"></i></span>';
				}
			}	
			$out .= '</div>';
		}
		
		$out .= '<div class="ffs-content-box">';
			if ($title   != '') {  $out .= '<div class="infobox-title" style="' . $styletitle .'">'  . $title   . '</div>'; }
			if ($content != '') {  $out .= '<div class="infobox-text"  style="' . $styletext  .'" >' . $content . '</div>'; }
		$out .= '</div>';
		
	 $out .= '</div>';
	return $out;	 
} 
add_shortcode ("ffs_ibox", "ffs_info_box");

function ffs_tabs_shortcode($atts, $content = null) {
	$output	    = '';
	$tab_titles = array();
	$tabs_class = 'tab_titles';
	shortcode_atts(array('id' => '', 'type' => '', 'width' => '', 'fit' => ''), $atts, 'ffs_tabs');
	
	$id 	= 'ffs-tabbed-' . rand( 1, 100 );
	$type 	= 'default';
	$width 	= 'auto';
	$fit	= 'false';
	$link   = '#';
	
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
add_shortcode('ffs_tabs', 'ffs_tabs_shortcode');

function ffs_tab_shortcode ( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts));
		$class = '';
		if ( $title != 'Tab' ) {
			 $class = ' tab-' . sanitize_title( $title );
		}
		return '<div class="ffs_tab' . esc_attr( $class ) . '">' . do_shortcode( $content ) . '</div>';
} 
add_shortcode( 'ffs_tab', 'ffs_tab_shortcode', 99 );


function ffs_height_separator ( $atts, $content = null) {
	extract( shortcode_atts( array( 'height'  => '20'), $atts ), 'fss_sep' );
    if($height == '') {
      $return = '';
    } else{
      $return = 'style="height: '.$height.'px;"';
    }
      
     return '<div class="clear"></div><div class="gap" ' . $return . '></div>';
}
add_shortcode( 'fss_sep', 'ffs_height_separator' );

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
add_shortcode ("ffs_sep", "ffs_sep");

function ffs_alert_shortcode ($atts, $content = null) {
	$out = '';
	shortcode_atts(array(
		  'id'		=> '',
		  'type'	=> ''
     ), $atts, 'fss_alert');
	
	$id = 'ffs-alert-' . rand( 1, 100 );
	$type	= '';
	
	
	if (!empty($atts['id']))    { $id   = sanitize_html_class($atts['id']); }
	if (!empty($atts['type']))  { $type = sanitize_html_class($atts['type']); }
	
	
	$out .= '<div id="'.$id.'" class="alert '.$type.'">';
		$out .= '<span class="close" data-dismiss="alert">&times;</span>';
		$out .= ffs_esc_content_pbr($content);
	$out .= '</div>';
	$out .= '<div class="clearfix"></div>';
    return $out;
}
add_shortcode ("ffs_alert", "ffs_alert_shortcode");


function ffs_pbar_shortcode ($atts, $content = null) {
	$out = '';
	shortcode_atts(array(
		  'id'		 => '',
		  'type'	 => '',
		  'active'   => '',
		  'stripped' => ''
     ), $atts, 'fss_alert');
	
	$id = 'ffs-pbar-' . rand( 1, 100 );
	$type	= '';
	$active = false;
	$stripped = false;
	
	if (!empty($atts['id']))    { $id   = sanitize_html_class($atts['id']); }
	if (!empty($atts['type']))  { $type = sanitize_html_class($atts['type']); }
	if (!empty($atts['active']))  { $active = sanitize_html_class($atts['active']); }
	if (!empty($atts['stripped']))  { $stripped = sanitize_html_class($atts['stripped']); }
	
	$class .= $type;
	if ($stripped)	{ $class  .= ' progress-striped'; }
	if ($active) 	{ $class  .= ' active'; }
	
	
	
	$out .= '<div id="'.$id.'" class="progress '.$class.'">';
		$out .= ffs_esc_content_pbr(do_shortcode($content));
	$out .= '</div>';
	$out .= '<div class="clearfix"></div>';
    return $out;
}
add_shortcode ("ffs_pbar", "ffs_pbar_shortcode");

function ffs_bar_shortcode ( $atts, $content = null ) {
		shortcode_atts(array(
							'type'	=> '',
							'width' => ''
		), $atts, 'ffs_bar');
		
		$type	= '';
		$width  = '60%';
		
		if (!empty($atts['type']))  { $type = sanitize_html_class($atts['type']); }
		if (!empty($atts['width']))    { $width   = esc_attr($atts['width']); }
		 
		return '<div class="bar '.$type.'" style="width: '.$width.';"></div>';
} 
add_shortcode( 'ffs_bar', 'ffs_bar_shortcode', 99 );


/*
	Size: Default, mini, small, large
	Color: Default, primary, info, success, warning, danger, inverse
	Type: link, button, input, sumbit
	State: active, disabled
	Text color: #fff
	Icon: Font Awesome
	Icon position: left, right
	
*/

function ffs_btn_shortcode ( $atts, $content = null ) {
		$out = '';
		shortcode_atts(array(
							'size'		 	=> '',
							'color' 	 	=> '',
							'type'		 	=> '',
							'state'		 	=> '',
							'text_color'	=> '',
							'icon'		 	=> '',
							'icon_position' => ''
							
							
		), $atts, 'ffs_bar');
		
		$id 	= 'ffs-button-' . rand( 1, 1000 );
		$size	= 'small';
		$color  = 'primary';
		$type	= 'link';
		$state	= '';
		$text_color = '#fff';
		$icon 	= '';
		$icon_position 	= 'left';
		$link   = "#";
		
		$options = '';
		
		if (!empty($atts['size']))   { $size  = sanitize_html_class($atts['size']); 	}
		if (!empty($atts['color']))  { $color = sanitize_html_class($atts['color']); 	}
		if (!empty($atts['type']))   { $type  = sanitize_html_class($atts['type']);		}
		if (!empty($atts['state']))  { $state = sanitize_html_class($atts['state']); 	}
		if (!empty($atts['text_color']))  { $text_color = sanitize_html_class($atts['text_color']); }
		
		if (!empty($atts['icon']))  { $icon = sanitize_html_class($atts['icon']); }
		if (!empty($atts['icon_position']))  { $icon_position = sanitize_html_class($atts['icon_position']); }
		if (!empty($atts['link']))  { $link = esc_url(sanitize_html_class($atts['link'])); }
		
		if (($size == 'mini') || ($size == 'small') || ($size == 'large')) {
			$options .= ' btn-' . $size;
		} 
			
		if (
			($color == 'primary') 	|| 
			($color == 'info') 		|| 
			($color == 'success') 	|| 
			($color == 'warning') 	|| 
			($color == 'danger') 	|| 
			($color == 'inverse')
			) {
			 $options .= ' btn-' . $color;
		} 	
		
		$options .= ' '. $state;
		$text_color = '#' .$text_color;
		
		$content = do_shortcode(ffs_esc_content_pbr($content));
		
		if ($type == 'link') {
			$out  = '<a href="'.$link.'" class="btn'.$options.'" style="color:'.$text_color.';" target="_blank">';
				if ($icon != '') { 
					if ($icon_position == 'right') { $out  .= $content; }
					if ($icon != '') { 
						$out  .= '<span class="ffs-icon-container '.$icon_position.'"><i class="fa '. $icon .'"></i></span>';
					}	
					if ($icon_position == 'left') {
						$out  .= $content;
					}
				} else {
						$out  .= $content;
				}				
			$out  .= '</a>';
		} else if ($type == 'input') {
			$out  = '<input type="button" class="btn'.$options.'" value="'.$content.'" style="color:'.$text_color.';" />';
		} else if ($type == 'submit') {
			$out  = '<input type="submit" class="btn'.$options.'" value="'.$content.'" style="color:'.$text_color.';" />';
		} else {
			$out  = '<button class="btn'.$options.'" style="color:'.$text_color.';" >';
				if ($icon != '') { 
					if ($icon_position == 'right') { $out  .= $content; }
					if ($icon != '') { 
						$out  .= '<span class="ffs-icon-container '.$icon_position.'"><i class="fa '. $icon .'"></i></span>';
					}	
					if ($icon_position == 'left') {
						$out  .= $content;
					}
				} else {
						$out  .= $content;
				}				
			$out  .= '</button>';
		}
		
		return $out;
} 
add_shortcode( 'ffs_btn', 'ffs_btn_shortcode', 99 );


function ffs_esc_content_pbr($content = null) {
	 $content = preg_replace( '%<p>&nbsp;\s*</p>%', '', $content );
	 $Old     = array( '<br />', '<br>' );
	 $New     = array( '','' );
	 $content = str_replace( $Old, $New, $content );
	 return $content;
}