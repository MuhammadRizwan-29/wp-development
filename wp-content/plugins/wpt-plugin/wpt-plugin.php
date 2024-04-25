<?php 
    /* 
    * Plugin Name:       WPT Plugin 
    * Plugin URI:        https://example.com/plugins/the-basics/ 
    * Description:       This plugin directory generated only for how to developed & designed your own plugin.  
    * Version:           1.0.0 
    * Author:            Engr. Muhammad Rizwan Jamali 
    * Author URI:        https://www.linkedin.com/in/muhammad-rizwan-2b7053170 
    * License:           GPL v2 or later 
    * License URI:       https://www.gnu.org/licenses/gpl-2.0.html 
    * Text Domain:       This is developed for only learning purpose. 
    * Domain Path:       /languages 
    */

    // --> Direct access restricted
    if( !defined('ABSPATH') ):
        die("can't access");
    endif;

    /* Activation Hook */
    function wpt_plugin_activate() {
        // Code
        $user = wp_get_current_user();
        $welcome_msg = sprintf("Hello %s! Thank you for activating our plugin.", $user->user_login);
        set_transient( 'wpt_activate_notice', $welcome_msg , 5 );
    }
    register_activation_hook(__FILE__, 'wpt_plugin_activate');

    /** Displaying Notice at ADMIN Level */ 
    function wpt_activate_notice_display(){
        $activation_notice = get_transient( 'wpt_activate_notice' );
        if($activation_notice){
            ?>
            <div class="notice notice-success is-dismissible">
                <p> <?php echo esc_html($activation_notice);?> </p>
            </div>
            <?php
            delete_transient( 'wpt_activate_notice' );
        }
    }
    add_action('admin_notices', 'wpt_activate_notice_display');

    /* De-activation Hook */
    function wpt_plugin_deactivate(){
        // Code
    }
    register_deactivation_hook( __FILE__, 'wpt_plugin_deactivate' );

    /** Show setting in Administration Menu */

    function wpt_show_admin_menu(){

    }
    
    function wpt_menu_option(){
        add_menu_page( 'WPT_PLUGIN_SETTING', 
                        'WPT PLUGIN', 
                        'manage_options', 
                        'wpt-plugin-settings', 
                        'wpt_show_admin_menu', 
                        'dashicons-plugins-checked', 
                        5 
        );
    }

    add_action('admin_menu', 'wpt_menu_option');

    /** Register New Post Type */ 

    function wpt_event_pt(){
        register_post_type('event', array(
            'public' => true,
            'supports' => array('title', 'editor', 'excerpt'),
            'labels' => array(
                'name' => 'Events',
                'add_new' => 'Add New Event', 
                'add_new_item' => 'Add New Event', 
                'all_items' => 'All Events',
                'edit_items' => 'Edit Event',
            ),
            'menu_icon' => 'dashicons-embed-video',
        ));
    }

    add_action('init', 'wpt_event_pt');
?>
