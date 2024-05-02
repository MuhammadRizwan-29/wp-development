<?php 
/**
 * @package  wc recently viewed products
 */

/**********************************
 * Direct access don't allowed 
***********************************/

if(!defined('ABSPATH')){
    die("don't access.");
}

if(!function_exists('rvps_activation')){
    function rvps_activation(){
        //--> Check if rvps_settings option not found
        if(!get_option( 'rvps_settings')){
            add_option( 'rvps_settings', array(
                'rvps_label'            => 'Recently Viewed Products',
                'rvps_numb_products'    => 4,
                'rvps_position'         => 'after_related_product',
                'rvps_in_shop_page'     => '',
                'rvps_in_cart_page'     => 'enabled',
            ) );
        }
    }
}