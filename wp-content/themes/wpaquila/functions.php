<?php 
/**
 * Theme Functions
 * 
 * @package wp-aquila
 */

function aqulia_enqueue_scripts(){

    wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all' );

    wp_register_style( 'bootstrap', get_template_directory_uri(  ) . '/assets/src/library/bootstrap/css/bootstrap.min.css', [], filemtime(get_template_directory() . '/style.css'), 'all' );

    wp_enqueue_script( 'main-script', get_template_directory_uri(  ) . '/assets/main.js', [] , filemtime(get_template_directory() . '/assets/main.js'), true );

    wp_enqueue_style( 'bootstrap' );
}
add_action('wp_enqueue_scripts', 'aqulia_enqueue_scripts');
?>

