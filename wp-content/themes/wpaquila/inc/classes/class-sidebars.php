<?php
/**
 * Sidebars
 * 
 * @package wp-aquila
 */

namespace Aquila_Theme\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Sidebars{
    use Singleton;

    protected function __construct() {
        // Load classes or initialize functionality here
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // Define hooks here
        add_action( 'widgets_init', [$this, 'register_sidebars'] );
    }
    
    public function register_sidebars(){
        
        register_sidebar( [
            'name' => __('Sidebar', 'aquila'),
            'id' => 'sidebar-1',
            'description' => __('Main sidebar', 'aquila'),
            'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ] );

        register_sidebar( [
            'name' => __('Footer', 'aquila'),
            'id' => 'sidebar-2',
            'description' => __('Footer sidebar', 'aquila'),
            'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ] );
    }
}