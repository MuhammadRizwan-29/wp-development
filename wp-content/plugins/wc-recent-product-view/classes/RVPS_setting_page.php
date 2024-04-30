<?php 
/**
 * @package  wc recently viewed products
 */

if(!defined('ABSPATH')){
    die("don't access.");
}

if(!class_exists('RVPS_setting_page')){
    class RVPS_setting_page{
        public function rvps_create_setting_page(){
            add_submenu_page('woocommerce', 
            __('WC Recently Viewed Products', 'rvps'),
            __('WC Recently Viewed Products', 'rvps'),
            'manage_options', 'rvps_settings',
            'rvps_setting_page_cb'
        );
        }
    }
}