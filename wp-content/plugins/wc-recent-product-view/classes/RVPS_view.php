<?php 
// require_once RVPS_PATH . '/views/content/rvps_products_view.php';

if(!class_exists('RVPS_view')){
    class RVPS_view{
        
        public function rvps_show_after_related_products(){
            $rvps_settings = get_option('rvps_settings');

            if(!isset($rvps_settings['rvps_position'])){
                return;
            }

            if( $rvps_settings['rvps_position'] !== 'after_related_product'){
                return;
            }

            if( rvps_products_view() ){
                rvps_products_view();
            }
            // if (function_exists('rvps_products_view')) {
            //     rvps_products_view();
            // }
        }

        public function rvps_show_before_related_products(){
            $rvps_settings = get_option('rvps_settings');

            if(!isset($rvps_settings['rvps_position'])){
                return;
            }

            if( $rvps_settings['rvps_position'] !== 'before_related_product'){
                return;
            }

            if( rvps_products_view() ){
                rvps_products_view();
            }
        }
        
        public function rvps_show_in_shop_page(){
            $rvps_settings = get_option('rvps_settings');

            if(!isset($rvps_settings['rvps_in_shop_page'])){
                return;
            }

            if( $rvps_settings['rvps_in_shop_page'] !== 'enabled'){
                return;
            }

            if( rvps_products_view() ){
                rvps_products_view();
            }
        }

        public function rvps_show_in_cart_page(){
            $rvps_settings = get_option('rvps_settings');

            if(!isset($rvps_settings['rvps_in_cart_page'])){
                return;
            }

            if( $rvps_settings['rvps_in_cart_page'] !== 'enabled'){
                return;
            }

            if( rvps_products_view() ){
                rvps_products_view();
            }
        }

        /*
        public function rvps_show_after_related_products(){
            $rvps_settings = get_option('rvps_settings');
        
            if(!isset($rvps_settings['rvps_position']) || $rvps_settings['rvps_position'] !== 'after_related_product'){
                return;
            }
        
            rvps_products_view();
        }
        
        public function rvps_show_before_related_products(){
            $rvps_settings = get_option('rvps_settings');
        
            if(!isset($rvps_settings['rvps_position']) || $rvps_settings['rvps_position'] !== 'before_related_product'){
                return;
            }
        
            rvps_products_view();
        }
        */
    }

}