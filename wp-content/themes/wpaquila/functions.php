<?php 
/**
 * Theme Functions
 * 
 * @package wp-aquila
 */

function aqulia_enqueue_scripts(){
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory() . 'stylesheet.css'), 'all' );
}
add_action('wp_enqueue_scripts', 'aqulia_enqueue_scripts');
?>

