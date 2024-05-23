<?php 
/**
 * Theme Functions
 * 
 * @package wp-aquila
 */



if( !defined( 'AQUILA_DIR_PATH' ) ){
    define( 'AQUILA_DIR_PATH', untrailingslashit( get_template_directory(  )));
}

if( !defined( 'AQUILA_DIR_URI' ) ){
    define( 'AQUILA_DIR_URI', untrailingslashit( get_template_directory_uri(  )));
}

require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once AQUILA_DIR_PATH . '/inc/helpers/template-tags.php';
require_once AQUILA_DIR_PATH . '/inc/classes/class-meta-boxes.php';

function aquila_get_theme_instance(){
    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
    \AQUILA_THEME\Inc\Meta_Boxes::get_instance();
}

aquila_get_theme_instance();

?>

