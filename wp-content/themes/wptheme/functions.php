<?php 
    // Importing Style Files
    function wpt_resource(){
        wp_enqueue_style("wpt-stylefile", get_stylesheet_uri());
    }

    // Calling Function
    add_action("wp_enqueue_scripts", "wpt_resource");
?>