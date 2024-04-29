<?php 
    /**
     * Plugin Name: WC Recent Product View
     * Description: Show those products which are viewed by the user in the woo-commerce plugin store.
     * Author: Muhammad Rizwan
     * Version: 1.0.0
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

                //--> Classes

                //--> Hooks
                register_activation_hook( __FILE__, 'rvps_activation' );

                //--> Shortcodes
            }
        }
        $RVPS_core = new RVPS_core();
    }

}
?>