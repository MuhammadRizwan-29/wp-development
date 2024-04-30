<?php 
    /**
     * Plugin Name: WC Recent Product View
     * Description: Show those products which are viewed by the user in the woo-commerce plugin store.
     * Author: Muhammad Rizwan
     * Version: 1.0.0
     * Text Domain: rvps
    */

?>
<?php 

/**********************************
 * Direct access don't allowed 
***********************************/

if(!defined('ABSPATH')){
    die("don't access.");
}

/**********************************
 * Check WordPress Commerce Version 
***********************************/

if(version_compare(get_bloginfo('version'), '6.0', '<')){
    die("don't access.");
}

/**********************************
 * Constants 
***********************************/
 // --> Plugin Path
 define('RVPS_PATH', plugin_dir_path( __FILE__ ));

 // --> Plugin Path URL
 define('RVPS_URI', plugin_dir_url( __FILE__ ));

/**********************************
 * Check WooCommerec is Active 
***********************************/

if( in_array('woocommerce/woocommerce.php', 
    apply_filters('active_plugins', get_option('active_plugins'))) ){

    if( !class_exists('RVPS_core') ){ // Check class if already exist
        class RVPS_core{
            public function __construct(){
                //--> Files
                require(RVPS_PATH.'/includes/activation.php');
                require(RVPS_PATH.'/views/admin/setting_page.php');

                //--> Classes
                require(RVPS_PATH.'/classes/RVPS_setting_page.php');
                require(RVPS_PATH.'/classes/RVPS_save_settings.php');

                
                //--> Hooks
                /** Activation Hook */ 
                register_activation_hook( __FILE__, 'rvps_activation' );
                /** Setting Page in ADMIN MENU */  
                add_action( 'admin_menu', array(new RVPS_setting_page(), 'rvps_create_setting_page') );
                
                add_action('admin_post_rvps_save_settings_fields', array(new RVPS_save_settings(), 'rvps_save_admin_field_settings'));
                
                //--> Shortcodes

            }
        }
        $RVPS_core = new RVPS_core();
    }

}
?>