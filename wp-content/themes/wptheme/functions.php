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
?>