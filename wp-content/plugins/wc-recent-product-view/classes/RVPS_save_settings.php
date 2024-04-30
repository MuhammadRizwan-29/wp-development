<?php 
/**
 * @package  wc recently viewed products
 * 
*/

if(!defined('ABSPATH')){
    die("don't access.");
}

if(!class_exists('RVPS_save_settings')){
    class RVPS_save_settings{

        public function rvps_save_admin_field_settings(){
            // Check the nonse data
            check_admin_referer( 'rvps_save_settings_fields_verify' );

            if(!current_user_can( 'manage_options' )){
                wp_die("You're not allowed to edit settings");
            }
            
            $rvps_label = sanitize_text_field( $_POST['rvps_label'] );
            $rvps_numb_products = sanitize_text_field( $_POST['rvps_numb_products'] );
            $rvps_position = sanitize_text_field( $_POST['rvps_position'] );
            $rvps_in_shop_page = sanitize_text_field( $_POST['rvps_in_shop_page'] );
            $rvps_in_cart_page = sanitize_text_field( $_POST['rvps_in_cart_page'] );

            $values = array(
                'rvps_label' => $rvps_label,
                'rvps_numb_products' => $rvps_numb_products,
                'rvps_position' => $rvps_position,
                'rvps_in_shop_page' => $rvps_in_shop_page,
                'rvps_in_cart_page' => $rvps_in_cart_page,
            );

            update_option('rvps_settings', $values);
            $redirect_url = admin_url('admin.php?page=rvps_settings&success=' . urlencode('Settings saved'));
            wp_redirect($redirect_url);
            exit();
        }
    }
}