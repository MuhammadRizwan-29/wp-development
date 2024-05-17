<?php
/**
 * Enqueue theme assets
 * 
 * @package wp-aquila
 */

namespace Aquila_Theme\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class Assets{
    use Singleton;

    protected function __construct() {
        // Load classes or initialize functionality here
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // Define hooks here
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles(){
        wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css'), 'all' );
        wp_register_style( 'bootstrap-css', AQUILA_DIR_URI . '/assets/src/library/bootstrap/css/bootstrap.min.css', [], false, 'all' );
        wp_enqueue_style( 'bootstrap-css' );
    }

    public function register_scripts(){
        wp_enqueue_script( 'main-script', AQUILA_DIR_URI . '/assets/main.js', [] , filemtime( AQUILA_DIR_PATH . '/assets/main.js'), true );
        wp_enqueue_script( 'bootstrap-script', AQUILA_DIR_URI . '/assets/src/library/bootstrap/js/bootstrap.min.js', ['jquery'], false, true );
        wp_enqueue_script( 'bootstrap-script' );
    }
}