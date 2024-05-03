<?php 
    /**
     * Plugin Name: WPMR Plugin
     * Description: Content is the king
     * Version: 1.0.0
     * Author: Muhammad Rizwan
     * Author URI: www.braincrop.net
     * */ 

/** Direct Access Forbidden */ 
if(!defined('ABSPATH')){
    die ('You have no access.');
}

if(!class_exists('WPMRPlugin')){
    
    class WPMRPlugin{
        /** Constructor of Class*/ 
       function  __construct(){
            add_action('init', array($this, 'book_cpt') );
        }

        /** Activation */ 
        function activation(){

            /* Generate CPT */
            $this->book_cpt();

            /* Flush rewrite rules */
            flush_rewrite_rules(  );
            
        }

        /** Deactivation */ 
        function deactivation(){

            /* Flush rewrite rules */
            flush_rewrite_rules(  );
        }

        /** Uninstall */ 
        function uninstall(){
            /* Delete CPT */

            /* delete all data of plugin from DB */
        }

        /** Custom CPT for Book */ 
        function book_cpt(){
            register_post_type( 'book', array(
                'public' => true,
                'supports' => array('title', 'editor'),
                'labels' => array(
                    'name' => 'Books',
                    'singular_name' => 'Book',
                    'add_new' => 'Add New Book',
                    'add_new_item' => 'Add New Book',
                    'all_items' => 'All Books',
                    'edit_item' => 'Edit Book'
                ),
                'menu_icon' => 'dashicons-book-alt',
            ) );
        }
    }

    $wpmrplugin = new WPMRPlugin();
}

/** Hooks */ 
// --> Activation
register_activation_hook( __FILE__ , array($wpmrplugin, 'activation') );

// --> Deactivation
register_deactivation_hook( __FILE__ , array($wpmrplugin, 'deactivation') );

// --> Uninstall

?>