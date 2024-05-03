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

if(file_exists( dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if(!class_exists('WPMRPlugin')){
    
    class WPMRPlugin{
        /** Constructor of Class*/ 

        public $plugin;

       function  __construct(){
            add_action('init', array($this, 'book_cpt') );
            $this->plugin = plugin_basename( __FILE__ );
        }

        function register(){

            /** Hooks & Filters */ 
            add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );

            add_action( 'admin_menu', array($this, 'add_admin_pages') );

            add_filter( "plugin_action_links_$this->plugin" , array($this, 'settings_link') );

        }

        /** Register at Admin Menu*/ 
        public function add_admin_pages(){
            add_menu_page( 'WPMR Plugin', 'WPMR', 'manage_options', 'wpmr_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        /** Plugin Settings Links */
        public function settings_link($links){
            /** Add Custom Setting Link */
            $settings_link = '<a href="admin.php?page=wpmr_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        /** Setting Template */ 
        public function admin_index(){
            /** Require Template */
            require_once plugin_dir_path( __FILE__ ) .'templates/admin.php';
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

        /** Custom Script Added */
        function enqueue(){
            wp_enqueue_style( 'wpmrstyle', plugins_url( '/assets/style.css', __FILE__ ) );
            wp_enqueue_script( 'wpmrsript', plugins_url( '/assets/script.js', __FILE__ ) );
        }
    }

    $wpmrplugin = new WPMRPlugin();
    $wpmrplugin->register();
}

/** Hooks */ 
// --> Activation
register_activation_hook( __FILE__ , array($wpmrplugin, 'activation') );

// --> Deactivation
register_deactivation_hook( __FILE__ , array($wpmrplugin, 'deactivation') );

// --> Uninstall

?>