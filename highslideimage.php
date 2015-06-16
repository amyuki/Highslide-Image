<?php
/*
Plugin Name: Highslide Image
Plugin URI: http://lab.szeching.com/highslideimage.html
Description: Easy making <a href="http://highslide.com/">Highslide</a> popups on images.
Version:  1.0
Author: Yuki Cheung
Author URI: http://szeching.com/
*/
add_action('admin_init','highslideimage_tinymce_button');
add_action( 'init', 'register_shortcodes');

function highslideimage_tinymce_button(){
	if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
		add_filter('mce_buttons','highslideimage_register_tinymce_buttons');
		add_filter('mce_external_plugins','highslideimage_add_tinymce_buttons');
	}
}
function highslideimage_register_tinymce_buttons($buttons){
	array_push($buttons, 'highslideimage');
      return $buttons;
}


function highslideimage_add_tinymce_buttons($plugin_array){
	$plugin_array['highslideimage'] = plugins_url('/js/mybuttons.js',__FILE__);
	return $plugin_array;
}

function register_shortcodes(){
	add_shortcode('highslideimage', 'highslideimage_function');
}

function highslideimage_function($atts,$content){
	extract(shortcode_atts(array(
		'fullsize' => '',
		'thumbnail' => '',
	), $atts));
	return '<a href="'.$fullsize.'" class="highslide" onclick="return hs.expand(this)" title="'.$content.'"><img src="'.$thumbnail.'"  alt="image" title="Click to enlarge" /></a>';
}

?>