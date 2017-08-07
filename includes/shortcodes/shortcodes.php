<?php 
/*Description Box*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	function fruitful_init_shortcodes_style() {
		wp_enqueue_style( 'ffs-easyResponsiveTabs',	FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/js/tabs/easy-responsive-tabs.css');
		wp_enqueue_style( 'ffs-fontawesome',		FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/css/font-awesome.min.css');
		wp_enqueue_style( 'ffs-styles',  			FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/css/ffs_styles.css');
		//if ( !fruitful_is_bootstrap_css_loaded() )
			//wp_enqueue_style( 'ffs-boostrap',			FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/bootstrap/css/bootstrap.min.css');
	}
	
	function fruitful_init_shortcodes_script() {
		wp_enqueue_script('ffs-easyResponsiveTabs', FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/js/tabs/easyResponsiveTabs.js', array( 'jquery' ), '20142803', true );
		wp_enqueue_script('ffs-script', 			FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/js/fss_script.js', array( 'jquery' ), '20142803', true );
		if ( !fruitful_is_js_loaded('bootstrap.min.js') ) {
			wp_enqueue_script( 'ffs-bootstrap', FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '20142803', true );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'fruitful_init_shortcodes_style',  99 );
	add_action( 'wp_enqueue_scripts', 'fruitful_init_shortcodes_script', 100 );	
	
	function fruitful_is_js_loaded($script_filename) {
		global $wp_scripts;
		
		$script_filename = trim($script_filename);
		if( !$script_filename ) return false;
		
		foreach ( $wp_scripts->registered as $script_dep ) {
			if( stristr($script_dep->src, $script_filename) !== FALSE ) {
				return true;
			}
		};
		
		return false;
	}
	
	function fruitful_is_bootstrap_css_loaded() {
		global $wp_styles;
		
		foreach( $wp_styles->queue as $style ) :
			if ( preg_match('/\b(\w*bootstrap\w*)\b/', $style, $matches) ) return true;
		endforeach;
		
		return false;
	}
	
function fruitful_description_box ($atts, $content = null) {
	$out = '';
	extract(shortcode_atts(array(
		  'id'		=> '',
		  'style' 	=> '',
		  'shadowtype'	=> ''
     ), $atts, 'fruitful_dbox'));
	
	$id = 'desc-box-' . rand( 1, 100 );
	
	if (wp_is_mobile()) {
		$style = ' font-size: 20px; text-transform : uppercase; text-align: center; font-weight: 300; line-height: 1.2;';
	} else {
		$style = ' font-size: 40px; text-transform : uppercase; text-align: center; font-weight: 300; line-height: 1.2;';
	}
	
	if (!empty($atts['id']))	{ $id 	 = sanitize_html_class($atts['id']); }
	if (!empty($atts['style']))	{ $style = esc_html($atts['style']); }
	if (!empty($atts['shadowtype'])){ $type = esc_html($atts['shadowtype']); }
	
	$out .= '<div class="fruitful_description_box">';   
		$out .= '<div class="fruitful_description ';
			if (!empty($atts['shadowtype'])){ $out .= 'shadow-'.$type; } else { $out .= 'shadow-type-1';}
		$out .= ' " id="'. $id .'">';
			$out .= '<span class="top_line"></span>';
				if (!empty($content)) { $out .=	'<div class="text" style="'. $style .'">' . $content . '</div>'; } else 
							  { $out .= '<div class="text" style="'. $style .'">No text Description</div>'; }		
			$out .= '<span class="bottom_line"></span>';
		$out .= '</div>';
	$out .= '</div>';	
	$out .= '<div class="clearfix"></div>';
	
    return $out;
}
add_shortcode ("fruitful_dbox", "fruitful_description_box");


function fruitful_ibox_row_shortcode ($atts, $content = null) {
	$out = ""; 
	extract(shortcode_atts(array(
		  'id'	=> '' 
    ), $atts, 'fruitful_ibox_row'));
	 
	$id = 'info-box-row-' . rand( 1, 100 );

	if (isset($atts['id'])) { $id = sanitize_html_class($atts['id']); }

	$out .= '<div class="info-box-row clearfix" id="'. $id .'">';
	$out .=	fruitful_sh_esc_content_pbr(do_shortcode($content));
	$out .= '</div>';
	$out .= '<div class="clearfix"></div>';

	return $out;
	 
}
add_shortcode('fruitful_ibox_row', 'fruitful_ibox_row_shortcode');

/*Add information box into content block*/
function fruitful_info_box ($atts, $content = null) {
	$image = $title = $column = $class = $styletext = $styletitle = $out = $link = '';
	$last =  false;
	extract(shortcode_atts(array(
		  'column'			=> '',
		  'title'	   		=> '', 
		  'class'	   		=> '', 
		  'link'			=> '#',
		  'image' 			=> '', 
		  'alt' 			=> '', 
		  'icon'			=> 'fa-check-square-o',
		  'icon_position'	=> 'center',
		  'styletext'	  	=> 'font-size:13px; ',
		  'styletitle'		=> 'font-size:20px; text-transform: uppercase; ',
		  'styleicon'		=> 'background-color:#000; color:#fff; border-radius:50%; ',
		  'last'			=> ''
     ), $atts));
	
	 $id = 'info-box-' . rand( 1, 100 );
	 
	 if (isset($column)) 		{ $column		= sanitize_html_class($column); } 
	 if (isset($title)) 		{ $title		= esc_attr($title); }
	 if (isset($class)) 		{ $class		= sanitize_html_class($class); }
	 if (isset($image)) 		{ $image		= esc_url ($image); }
	 if (isset($alt)) 			{ $alt			= esc_html ($alt); }
	 if (isset($styletext)) 	{ $styletext	= esc_html($styletext); }
	 if (isset($styletitle)) 	{ $styletitle	= esc_html($styletitle); }
	 if (isset($last)) 			{ if ($last) $last = 'last'; } else { $last = ''; }
	 if (isset($icon_position)) { $icon_position = sanitize_html_class($icon_position);} 
	 if (isset($icon))			{ $icon			= sanitize_html_class($icon);} 
	 
	 
	 if ($icon_position == 'left') {
		$styletext  = 'text-align:left; '.$styletext ;
		$styletitle = 'text-align:left; '.$styletitle ;
	 } else if ($icon_position == 'right') {
		$styletext  = 'text-align:right; '.$styletext ;
		$styletitle = 'text-align:right; '.$styletitle ;
	 } else {
		$styletext  = 'text-align:center; '.$styletext ;
		$styletitle = 'text-align:center; '.$styletitle	;
	 }
	 
	 $out .= '<div id="'.$id.'" class="'.$class.' '. $column .' ffs-info-box ' . $icon_position . ' ' . $last . '" >';
	 if (($link != '') && ($link != '#')) {
		$out .= '<a href="'.fruitful_sh_esc_link($link).'">';
	 }
		if (($image != '') || ($icon != '')) {
			$out .= '<div class="ffs-icon-box">';
			if ($image != '') {  
				$out .= '<img class="icon" src="' . esc_url($image) .'" title="' . $title   . '" alt="' . $alt . '" />'; 
			} else {
				if ($icon != '')  $out .= '<span class="ffs-icon-container"><i class="fa '. $icon .'" style="'.$styleicon.'"></i></span>';
				
			}	
			$out .= '</div>';
		}
		
		$out .= '<div class="ffs-content-box">';
			if ($title   != '') {  $out .= '<div class="infobox-title" style="' . $styletitle .'">'  . $title   . '</div>'; }
			if ($content != '') {  $out .= '<div class="infobox-text"  style="' . $styletext  .'" >' . fruitful_sh_esc_content_pbr(do_shortcode($content)) . '</div>'; }
		$out .= '</div>';
		
		if (($link != '') && ($link != '#')) {
			$out .= '</a>';
		}
	 $out .= '</div>';
	return $out;	 
} 
add_shortcode ("fruitful_ibox", "fruitful_info_box");



function fruitful_tabs_shortcode($atts, $content = null) {
	$output	    = '';
	$tab_titles = array();
	$tabs_class = 'tab_titles';
	extract(shortcode_atts( array(
		'id' 		=> '', 
		'type' 		=> '', 
		'width' 	=> '', 
		'fit' 		=> '', 
		'widthtab' 	=> '', 
		'tabcolor' 	=> '#71AFFF', 
		'closed' 	=> 'true'
	), $atts, 'fruitful_tabs'));
	static $tab_id = 0;
  	++$tab_id;
	$id 	= 'ffs-tabbed-' . $tab_id;
	$type 	= 'default';
	$width 	= 'auto';
	$fit	= 'false';
	$link   = '#';
	$widthtab	= '30%';
	
	if (isset($atts['id'])) 	{ $id 	 = sanitize_html_class($atts['id']); }
	if (isset($atts['type'])) 	{ $type  = esc_js($atts['type']); }
	if (isset($atts['width'])) 	{ $width = esc_js($atts['width']); }
	if (isset($atts['fit'])) 	{ $fit 	 = esc_js($atts['fit']); }
	if (isset($atts['widthtab'])) 	{ $widthtab  = esc_js($atts['widthtab']); }
	if (isset($atts['tabcolor'])) 	{ $tabcolor  = esc_html($atts['tabcolor']); }
	if (isset($atts['closed'])) 	{ $closed  	 = esc_html($atts['closed']); }
	
	
	
	$output .= '<script type="text/javascript"> ';
		$output .= 'jQuery(document).ready(function() { ';
			$output .= 'jQuery("#'.$id.'").easyResponsiveTabs({ ';
			$output .= '    type: 	"'.$type.'", ';
			$output .= '    width:  "'.$width.'", ';
			$output .= '    fit: 	 '.$fit;
			$output .= '}); ';
			$output .= 'var cont_width = jQuery("#'.$id.'.resp-vtabs").outerWidth() - jQuery("#'.$id.'.resp-vtabs .resp-tabs-list").outerWidth() - 3;';
			$output .= 'jQuery("#'.$id.'.resp-vtabs .resp-tabs-container").css({"width":cont_width});';
		$output .= '}); ';
	$output .= '</script>';
	$output .= '<style type="text/css">'."\n";
		$output .= '#'.$id.' li.resp-tab-active,'."\n";
		$output .= '#'.$id.'.resp-tabs-list li:hover{border-top-color:'.$tabcolor.'; border-bottom-color:'.$tabcolor.';}'."\n";
		$output .= '#'.$id.'.resp-vtabs li.resp-tab-active,'."\n";
		$output .= '#'.$id.'.resp-vtabs .resp-tabs-list li:hover{border-left-color:'.$tabcolor.'; border-top-color:#C1C1C1; border-right-color:'.$tabcolor.';  border-bottom-color:#C1C1C1;}'."\n";
		if ($type == 'accordion')
		$output .= '#'.$id.'.ffs-tabbed-nav h2.resp-accordion.resp-tab-active {background:none repeat scroll 0 0 '.$tabcolor.' !important;}'."\n";
	$output .= '</style>';
	
	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	if ( isset( $matches[1] ) ) { $tabs = $matches[1]; } 
	
	$output .= '<div id="'.$id.'" class="ffs-tabbed-nav">';
		$output .= '<ul class="resp-tabs-list"';
			if ($type == 'vertical') { $output .= ' style="width:'.$widthtab.'"'; }
			if ($type == 'accordion') { 
				if ($closed == 'true') { 
					$output .= ' data-closed="closed"'; 
				}
			}
		$output .= '>';
			
	if (count($tabs)) {
		foreach ($tabs as $tab) {
			$output .= '<li>' . esc_html($tab[0]) . '</li>';
		}
	}	
	$output .= '</ul>';
	
	$output .= '<div class="resp-tabs-container">';
			$output .= fruitful_sh_esc_content_pbr(do_shortcode($content));
		$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="clearfix"></div>';
	return $output;
}
add_shortcode('fruitful_tabs', 'fruitful_tabs_shortcode');

function fruitful_tab_shortcode ( $atts, $content = null ) {
	extract(shortcode_atts( array( 
		'title' => 'Tab' 
	), $atts));
	$class = '';
	if ( $title != 'Tab' ) {
		 $class = ' tab-' . sanitize_title( $title );
	}
	return '<div class="fruitful_tab' . esc_attr( $class ) . '">' . do_shortcode( $content ) . '</div>';
} 
add_shortcode( 'fruitful_tab', 'fruitful_tab_shortcode', 99 );

function fruitful_tab_link_shortcode ( $atts, $content = null ) {
	extract(shortcode_atts( array( 
		'item' => '1' 
	), $atts));
	return '<a href="#" onclick = "js_link_to_tab(this, ' . $item . ')">' . do_shortcode( $content ) . '</a>';
} 
add_shortcode( 'fruitful_tab_link', 'fruitful_tab_link_shortcode', 100 );

function fruitful_sep ($atts, $content = null) {
	$out = $height = $style = '';
	extract(shortcode_atts(array(
		  'id'		=> 'ffs-sep-' . rand( 1, 100 ),
		  'height'	=> 10,
		  'style' 	=> 'border-bottom:1px solid #ebebeb; '
     ), $atts));
	
	if (!empty($id))    	{ $id = sanitize_html_class($id); }
	if (!empty($height))    { $height = sanitize_html_class($height); }
	if (!empty($style)) 	{ $style = esc_html($style); }
	
    $out .= '<div class="ffs-sep" id="'. $id .'" style="'.$style.' height:'.$height.'px; "></div><div class="clearfix"></div>';
	
    return $out;
}
add_shortcode ("fruitful_sep", "fruitful_sep");

function fruitful_alert_shortcode ($atts, $content = null) {
	$out = $type = '';
	extract(shortcode_atts(array(
		  'id'		=> 'ffs-alert-' . rand( 1, 100 ),
		  'type'	=> ''
     ), $atts, 'fss_alert'));
	
	$array_class = array();
	$array_class[] = 'alert';
	$array_class[] = 'alert-dismissible';
	
	if (!empty($id))	$id   = sanitize_html_class($id); 
	if (!empty($type))	$array_class[] = sanitize_html_class($type); 
	
	$out .= '<div class="ffs-bs">';	
		$out .= '<div id="'.$id.'" class="'.implode(' ', $array_class).'">';
			$out .= '<button type="button" class="close" data-dismiss="alert" aria-label="'.__('Close', 'ffs').'"><span aria-hidden="true">&times;</span></button>';
			$out .= fruitful_sh_esc_content_pbr($content);
		$out .= '</div>';
	$out .= '</div>';
	$out .= '<div class="clearfix"></div>';
	
    return $out;
}
add_shortcode ("fruitful_alert", "fruitful_alert_shortcode");


function fruitful_pbar_shortcode ($atts, $content = null) {
	$out = $type = $class = '';
	extract(shortcode_atts(array(
		'id' => 'ffs-pbar-' . rand( 1, 250 )
     ), $atts));
	
	$array_class = array();
	$array_class[]  = 'progress';
	
	if (!empty($id)) 
		$id = sanitize_html_class($id); 
	
	$out .= '<div id="'.$id.'" class="'.implode(' ', $array_class).'">';
		$out .= fruitful_sh_esc_content_pbr(do_shortcode($content));
	$out .= '</div>';
    
	return '<span class="ffs-bs">'. $out . '</span><div class="clearfix"></div>';
}
add_shortcode ("fruitful_pbar", "fruitful_pbar_shortcode");

/*
	Types: 
		- progress-bar-success
		- progress-bar-info
		- progress-bar-warning
		- progress-bar-danger
*/
function fruitful_bar_shortcode ( $atts, $content = null ) {
	$type = $width = '';
	extract(shortcode_atts(array(
						'type'		=> '',
						'active'    => false,
						'stripped'  => false,
						'width' 	=> '60%',
							
	), $atts));
	
	$stripped = filter_var($stripped, FILTER_VALIDATE_BOOLEAN);
	$active   = filter_var($active, FILTER_VALIDATE_BOOLEAN);
	
	$array_class = array();
	$array_class[] = 'progress-bar';
	
	if (!empty($type)) 		
		$array_class[] = sanitize_html_class($type);
	if ($active) $array_class[] = 'active'; 
	if (!empty($width)) 	
		$width = esc_attr($width);
	if ($stripped) $array_class[]  = 'progress-bar-striped';	
	 
	return '<div class="'.implode(' ', $array_class).'" style="width: '.$width.';"></div>';
} 
add_shortcode( 'fruitful_bar', 'fruitful_bar_shortcode', 99 );


/*
	Size: Default, mini, small, large
	Color: Default, primary, info, success, warning, danger, inverse
	Type: link, button, input, sumbit
	State: active, disabled
	Text color: #fff
	Icon: Font Awesome
	Icon position: left, right
	
*/

function fruitful_btn_shortcode ( $atts, $content = null ) {
		$out = $size = $color = $type = $state = $text_color = $icon = $icon_position = $link = $options = $target = $target_output = "";
		extract(shortcode_atts(array(
									'size'		 	=> 'small',
									'color' 	 	=> 'primary',
									'type'		 	=> 'link',
									'state'		 	=> '',
									'text_color'	=> 'fff',
									'icon'		 	=> '',
									'icon_position' => 'left',
									'link'			=> '#',
									'target'		=> ''
							
		), $atts));
		
		$id = 'ffs-button-' . rand( 1, 1000 );
		
		if (!empty($size))	
		$size  = sanitize_html_class($size);
		if (!empty($color))	
		$color = sanitize_html_class($color); 	
		if (!empty($type))	
		$type  = sanitize_html_class($type);	
		if (!empty($state))	
		$state = sanitize_html_class($state); 
		if (!empty($text_color)) 
		$text_color = esc_attr($text_color);
		
		if (!empty($icon))	
		$icon = sanitize_html_class($icon); 
		if (!empty($icon_position)) 
		$icon_position = sanitize_html_class($icon_position);
		if (!empty($link))		
		$link = fruitful_sh_esc_link($link); 
		if (!empty($target)) 	
		$target = sanitize_html_class($target); 
		
		if (($size == 'mini') || ($size == 'small') || ($size == 'large')) $options .= ' btn-' . $size;
		
			
		if (($color == 'primary') 	|| 
			($color == 'info') 		|| 
			($color == 'success') 	|| 
			($color == 'warning') 	|| 
			($color == 'danger') 	|| 
			($color == 'inverse')
			) {
			 $options .= ' btn-' . $color;
		} 	
		
		$options   .= ' '. $state;
		$text_color = '#' .$text_color;
		
		$content = do_shortcode(fruitful_sh_esc_content_pbr($content));
		
		if ($target == '_blank'){
			$target_output = 'target="_blank"';
		} else {
			$target_output = '';
		}
		
		if ($type == 'link') {
			$out  = '<a href="'.$link.'" class="btn'.$options.'" style="color:'.$text_color.';" '.$target_output.'>';
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
		
		return  '<span class="ffs-bs">'. $out . '</span>';
} 
add_shortcode( 'fruitful_btn', 'fruitful_btn_shortcode', 99 );


function fruitful_sh_esc_content_pbr($content = null) {
	 $content = preg_replace( '%<p>&nbsp;\s*</p>%', '', $content );
	 $Old     = array( '<br />', '<br>' );
	 $New     = array( '','' );
	 $content = str_replace( $Old, $New, $content );
	 return $content;
}

function fruitful_sh_esc_link($link){
	$link = esc_url(str_replace('”','',str_replace('“','',$link)));
	return $link;
}

function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
	global $wpcommentspopupfile, $wpcommentsjavascript;

	$id = get_the_ID();
	$title = get_the_title();
	$number = get_comments_number( $id );

	if ( false === $zero ) {
		/* translators: %s: post title */
		$zero = sprintf( __( 'No Comments<span class="screen-reader-text"> on %s</span>' ), $title );
	}

	if ( false === $one ) {
		/* translators: %s: post title */
		$one = sprintf( __( '1 Comment<span class="screen-reader-text"> on %s</span>' ), $title );
	}

	if ( false === $more ) {
		/* translators: 1: Number of comments 2: post title */
		$more = _n( '%1$s Comment<span class="screen-reader-text"> on %2$s</span>', '%1$s Comments<span class="screen-reader-text"> on %2$s</span>', $number );
		$more = sprintf( $more, number_format_i18n( $number ), $title );
	}

	if ( false === $none ) {
		/* translators: %s: post title */
		$none = sprintf( __( 'Comments Off<span class="screen-reader-text"> on %s</span>' ), $title );
	}
	
	$out = '';

	if ( 0 == $number && !comments_open() && !pings_open() ) {
		$out .= '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
		return;
	}

	if ( post_password_required() ) {
		_e( 'Enter your password to view comments.' );
		return;
	}

	$out .= '<a href="';
	if ( $wpcommentsjavascript ) {
		if ( empty( $wpcommentspopupfile ) )
			$home = home_url();
		else
			$home = get_option('siteurl');
		$out .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
		$out .= '" onclick="wpopen(this.href); return false"';
	} else {
		// if comments_popup_script() is not in the template, display simple comment link
		if ( 0 == $number ) {
			$respond_link = get_permalink() . '#respond';
			/**
			 * Filter the respond link when a post has no comments.
			 *
			 * @since 4.4.0
			 *
			 * @param string $respond_link The default response link.
			 * @param integer $id The post ID.
			 */
			$out .= apply_filters( 'respond_link', $respond_link, $id );
		} else {
			$out .= get_comments_link();
		}
		$out .= '"';
	}

	if ( !empty( $css_class ) ) {
		$out .= ' class="'.$css_class.'" ';
	}
	
	$attributes = '';
	/**
	 * Filter the comments popup link attributes for display.
	 *
	 * @since 2.5.0
	 *
	 * @param string $attributes The comments popup link attributes. Default empty.
	 */
	echo apply_filters( 'comments_popup_link_attributes', $attributes );

	$out .= '>';
	$out .= get_comments_number_text( $zero, $one, $more );
	$out .= '</a>';
	return $out;
}

function fruitful_load_template_part() {  
	ob_start();  
	get_template_part( 'content', get_post_format() );
	$var = ob_get_contents();  
	ob_end_clean();  
	return $var;  
}

function fruitful_recent_posts($atts){
		
		$posts = $cat = $out = '';
		$this_id = get_the_ID();
		extract(shortcode_atts(array(
			'posts'		 	=> 4,
			'cat' 	 	=> ''
		), $atts));	

		if(!empty($cat)) {
			$cats = explode(", ", $cat);
			$args = array(
				'orderby'    	=> 'date',
				'order'			=> 'DESC',
				'post_type'   	=> 'post',
				'post_status'   => 'publish',
				'post__not_in'	=> array($this_id),
				'ignore_sticky_posts' => true,
				'posts_per_page'=> $posts,
				'tax_query' => array(
					array(				
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => $cats 
					)
				)
			);
		} else {
			$args = array(
				'orderby'    	=> 'date',
				'order'			=> 'DESC',
				'post_type'   	=> 'post',
				'post_status'   => 'publish',
				'post__not_in'	=> array($this_id),
				'ignore_sticky_posts' => true,
				'posts_per_page'=> $posts
			);
		}

		$out .= '<div class="recent-posts blog-grid blog">';
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post();
				$content = fruitful_load_template_part();
				if ( !empty( $content ) ) {
					$out .= $content;
				} else {
					$day = get_the_date('d'); 
					$month_abr = get_the_date('M');
					$the_ID = get_the_ID();
					$post_class = get_post_class();
					$the_permalink = get_the_permalink();
					$title = esc_attr( sprintf( __( 'Permalink to %s', 'fruitful' ), the_title_attribute( 'echo=0' ) ) );
					$the_title = get_the_title();
					$the_post_thumbnail = get_the_post_thumbnail();
					$the_excerpt = get_the_excerpt();
					if( empty($the_excerpt) ) {
						$the_excerpt = get_the_content();
					}
					$the_category = get_the_category_list( ', ', 'fruitful' );
					$comments =	get_comments_popup_link( __( 'Leave a comment', 'fruitful' ), __( '1 Comment', 'fruitful' ), __( '% Comments', 'fruitful' ) );				
		
					$out .= '<article id="post-'.$the_ID.'" class="blog_post blog '.implode(' ', $post_class).'">';
		
						$out .= '<a href="'.$the_permalink.'" rel="bookmark">
							<div class="date_of_post updated">
								<span class="day_post">'.$day.'</span>
								<span class="month_post">'.$month_abr.'</span>
							</div>
						</a>';
		
						$out .= '<div class="post-content">	
						<header class="post-header">
							<h2 class="post-title entry-title">
								<a href="'.$the_permalink.'" title="'.$title.'" rel="bookmark">'.$the_title.'</a>
							</h2>
						</header><!-- .entry-header -->';
						$out .= '<div class="entry-content">';
							if ( has_post_thumbnail() && ! post_password_required() ) :
										$out .='<div class="entry-thumbnail">'
											.$the_post_thumbnail.
										'</div>';
							endif;
							$out .= do_shortcode($the_excerpt).
						'</div><!-- .entry-content -->';
						$out .= '<footer class="entry-meta">
							<span class="author-link author"><a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ))).'">'.get_the_author().'</a></span>
							<span class="cat-links">
							Posted in '.$the_category.'
							</span>
							<span class="comments-link">
							'.$comments.'
							</span> ';
						$out .= '</footer>
						</div>
					</article>';
					$out .= '<div class="clearfix"></div>';
				}
			endwhile;
		}
		$out .= '</div>';
			
		wp_reset_postdata();
		if(isset($out)) return $out;
}

add_shortcode ("fruitful_recent_posts", "fruitful_recent_posts");



function fruitful_recent_posts_slider($atts){
	//Add FlexSlider
	wp_enqueue_style( 'flex-slider', 			FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/flex_slider/slider.css');
	wp_enqueue_script('flex-fitvid-j',			FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/flex_slider/jquery.flexslider-min.js', array( 'jquery' ), '20130930', false );
	wp_enqueue_script('flex-slider', 			FRUITFUL_SHORTCODE_URI . 'includes/shortcodes/js/slider_init.js', array( 'jquery' ));
	
	$posts = $cat = $out = '';
	$this_id = get_the_ID();
	
	extract(shortcode_atts(array(
		'posts'		 	=> 4,
		'cat' 	 	=> ''
	), $atts));	

	if(!empty($cat)) {
		$cats = explode(", ", $cat);
		$args = array(
			'orderby'    	=> 'date',
			'order'			=> 'DESC',
			'post_type'   	=> 'post',
			'post_status'   => 'publish',
			'post__not_in'	=> array($this_id),
			'ignore_sticky_posts' => true,
			'posts_per_page'=> $posts,
			'tax_query' => array(
				array(				
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $cats 
				)
			)
		);
	} else {
		$args = array(
			'orderby'    	=> 'date',
			'order'			=> 'DESC',
			'post_type'   	=> 'post',
			'post_status'   => 'publish',
			'post__not_in'	=> array($this_id),
			'ignore_sticky_posts' => true,
			'posts_per_page'=> $posts
		);
	}

	$my_query = new WP_Query($args);

	if( $my_query->have_posts() ) {

		$out .= '<div class="flexslider blog-grid blog">
					<ul class="slides">';
			
			while ($my_query->have_posts()) : $my_query->the_post();
				$content = fruitful_load_template_part();
				
				$out .= '<li>';

				if ( !empty( $content ) ) {
					$out .= $content;
				} else {

					$day 		 = get_the_date('d'); 
					$month_abr = get_the_date('M');
					$the_ID = get_the_ID();
					$post_class = get_post_class();
					$the_permalink = get_the_permalink();
					$title = esc_attr( sprintf( __( 'Permalink to %s', 'fruitful' ), the_title_attribute( 'echo=0' ) ) );
					$the_title = get_the_title();
					$the_post_thumbnail = get_the_post_thumbnail();
					$the_excerpt = get_the_excerpt();
					if( empty($the_excerpt) ) {
						$the_excerpt = get_the_content();
					}
					
					$the_category = get_the_category_list( ', ', 'fruitful' );
					$comments =	get_comments_popup_link( __( 'Leave a comment', 'fruitful' ), __( '1 Comment', 'fruitful' ), __( '% Comments', 'fruitful' ) );

					$out .= '<article id="post-'.$the_ID.'" class="blog_post blog '.implode(' ', $post_class).'">';
						$out .= '<a href="'.$the_permalink.'" rel="bookmark">
									<div class="date_of_post updated">
										<span class="day_post">'.$day.'</span>
										<span class="month_post">'.$month_abr.'</span>
									</div>
								</a>';
						$out .= '<div class="post-content">	
									<header class="post-header">
										<h2 class="post-title entry-title">
											<a href="'.$the_permalink.'" title="'.$title.'" rel="bookmark">'.$the_title.'</a>
										</h2>
									</header><!-- .entry-header -->';
						$out .= '<div class="entry-content">';
							if ( has_post_thumbnail() && ! post_password_required() ) :
								$out .='<div class="entry-thumbnail">'
									.$the_post_thumbnail.
								'</div>';
							endif;
						$out .= do_shortcode($the_excerpt).
						'</div><!-- .entry-content -->';
						$out .= '<footer class="entry-meta">
							<span class="author-link author"><a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ))).'">'.get_the_author().'</a></span>
								<span class="cat-links">
								Posted in '.$the_category.'
								</span>
								<span class="comments-link">
								'.$comments.'
							</span> ';
						$out .= '</footer>
							</div>
					</article>';
				$out .= '</li>';
				}
			endwhile;
		$out .= '</ul>';
		$out .= '</div>';
		$out .= '<div class="clearfix"></div>';
	}
	wp_reset_postdata();
	return $out;
}

add_shortcode ("fruitful_recent_posts_slider", "fruitful_recent_posts_slider");