<?php

//Turn on submit anchor
add_filter( 'gform_confirmation_anchor', '__return_true' );

/* <~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~< Extras >~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~> */

/* Custom Post Types - Uncomment to start creating easy CTP's ~~~~> */
/*
require(TERX_CHILD_INCLUDES . 'custom-post-type.php');//Load Parent Class
require(TERX_CHILD_INCLUDES . 'custom-post-type-skeleton.php');//Load a starter skeleton CPT
*/

/* Enqueue Scripts - Uncomment to load js/scripts.js ~~~~> */
/*
function terx_enqueue_child_scripts(){
	wp_enqueue_script('terx_child_scripts',TERX_CHILD_JS . 'scripts.js',array('terx_scripts'));
}
add_action('wp_print_scripts','terx_enqueue_child_scripts',101);
*/

/* Child Shortcode System - Uncomment to add custom shortcodes ~~~~> */
/*
//Shortcode callback
function terx_gray_box( $atts, $content = null ){ return '<div class="gray-box">' . do_shortcode($content) . '</div>'; }
add_shortcode('gray-box','terx_gray_box');

//Prevent autop from breaking nested shortcodes by adding it to this array
$terx_child_shortcodes_for_filter = array('gray-box');
*/

/* Child Help - Uncomment to add custom theme help ~~~~> */
/*
//Custom Shortcode section
$terx_child_shortcodes = array('[gray-box]' => 'A gray box with rounded corners');

//Main section
$terx_child_help = array('Help Section Title' => '<p>This is a paragraph of help text</p>','Help Section Title 2' => '<p>This is a paragraph of help text 2</p>');
*/
?>