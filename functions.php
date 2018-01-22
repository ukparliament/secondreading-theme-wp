<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Add custom styles
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// Add ellipses to excerpts
function trim_excerpt($text) {
    return $text . '&hellip;';
}
add_filter('get_the_excerpt', 'trim_excerpt', 99);

// Change the excerpt length (by overwriting parent themes function)
remove_filter('excerpt_length', 'colormag_excerpt_length', 12);
add_filter('excerpt_length', 'colormag_excerpt_length_child', 12);

function colormag_excerpt_length_child($length) {
   return 30;
}
