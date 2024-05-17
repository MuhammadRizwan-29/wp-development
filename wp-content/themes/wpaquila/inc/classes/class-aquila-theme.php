<?php
/**
 * Main Theme Class
 * 
 * @package wp-aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME {
    use Singleton;

    protected function __construct() {
        // Load classes or initialize functionality here
        $this->setup_hooks();
        Assets::get_instance();
    }

    protected function setup_hooks() {
        // Define hooks here
        add_action( 'after_setup_theme', [ $this, 'setup_theme'] );
    }

    public function setup_theme(){

        add_theme_support( 'title-tag' );

        add_theme_support( 'custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ] );

        add_theme_support( 'custom-background', [
            'default-color' => '#fff',
            'default-image' => '',
        ] );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'gallery',
            'caption',
            'script',
            'style',
        ] );

        add_editor_style(  );

        add_theme_support( 'wp-block-styles' );
        
        add_theme_support( 'align-wide' );
    }

}
