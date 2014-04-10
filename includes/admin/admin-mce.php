<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	add_action( 'admin_init', 'ffs_tinymce_button' );
	add_action( 'admin_print_scripts-post.php', 'get_pp', 20 );
	add_action( 'admin_print_scripts-post-new.php', 'get_pp', 20 );
	
	function ffs_tinymce_button() {
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) )  {
			 add_filter( 'mce_buttons_3', 'ffs_register_tinymce_elements' );
		}
	}
			
	function get_pp() {
		$ffs_options = get_option ('ffs_options_plugin');

		if (empty($ffs_options['ffs_post_types'])) {
			$enable_post_types = array('post', 'page');
		} else {
			$enable_post_types = $ffs_options['ffs_post_types'];
		}
			
		if( in_array(get_post_type(), $enable_post_types)) {
			add_filter( 'mce_external_plugins', 'ffs_add_tinymce_elements' );
		}
	}
	
	function ffs_register_tinymce_elements( $buttons )  {
		array_push(	$buttons, 
     				'ffs_horizontal_tabs',
     				'ffs_vertical_tabs', 
     				'ffs_accordion_tabs', 
					'ffs_dbox', 
					'ffs_one_half_column', 
					'ffs_one_third_column', 
					'ffs_two_third_column', 
					'ffs_one_fourth_column', 
					'ffs_three_fourth_column', 
					'ffs_one_fifth_column', 
					'ffs_sep', 
					'ffs_alerts', 
					'ffs_pbar',
					'ffs_btn'
					);  
		return $buttons;
	}

	function ffs_add_tinymce_elements( $plugin_array )  {
		$plugin_array['ffs_horizontal_tabs']   = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_vertical_tabs'] 	   = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_accordion_tabs']    = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_dbox']   		   = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_one_half_column']   = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_one_third_column']  = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_two_third_column']  = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_one_fourth_column'] = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_three_fourth_column'] = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_one_fifth_column'] = plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_sep'] 		= plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_alerts'] 	= plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_pbar'] 		= plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		$plugin_array['ffs_btn'] 		= plugins_url('/tinymce', __FILE__) . '/ffs.tinymce.js';
		
	
		return $plugin_array;
	}

	foreach( array('post.php','post-new.php') as $hook ) add_action( "admin_head-$hook", 'ffs_admin_head' );
	 
	function ffs_admin_head()  {
		$plugin_url = plugins_url( '/', __FILE__ ); ?>
		<script type='text/javascript'> var my_plugin = { 'url': '<?php echo $plugin_url; ?>' }; </script>
	<?php
}