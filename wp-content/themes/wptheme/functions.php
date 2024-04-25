<?php 
    // Importing Style Files
    function wpt_resource(){
        wp_enqueue_style("wpt-stylefile", get_stylesheet_uri());
        wp_enqueue_script( "wpt_scriptfile", get_template_directory_uri() ."/js/index.js");
    }

    // Calling Function
    add_action("wp_enqueue_scripts", "wpt_resource");

    // Register Menu
    function wpt_nav_menu(){
        register_nav_menus(
            array(
                'main_menu' => __('Main Menu')
            )
        );
    }
    add_action( 'init', 'wpt_nav_menu');

    /* Provide Custom Support */
    // --> Header
    function wpt_add_widget_support(){
        $args = array(
            // 'default-image' => get_template_directory_uri(  ) . 'img/default-image.jpg',
            // 'default-text-color' => '000',
            'width' => 1000,
            'height' => 250,
            'flex-width' => true,
            'flex-height' => true,
        );
        add_theme_support('custom-header', $args);
    }
    add_action('after_setup_theme', 'wpt_add_widget_support');

    // --> Logo
    function wpt_logo_setup_widget(){
        $args = array(
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('site-title', 'site-description'),
            'unlink-homepage-logo' => true,
        );
        add_theme_support( 'custom-logo', $args );
    }
    add_action( 'after_setup_theme', 'wpt_logo_setup_widget' );

    // --> Widgets
    function wpt_widget_support(){
        // Primary Sidebar Widget
        register_sidebar(
            array(
                'name' => __('Primary Sidebar', 'theme_name'),
                'id'   => 'sidebar-1',
            )
        );
        // Secondary Sidebar Widget
        register_sidebar(
            array(
                'name' => __('Secondary Sidebar', 'theme_name'),
                'id'   => 'sidebar-2',
            )
        );
    }
    add_action('widgets_init', 'wpt_widget_support');
?>