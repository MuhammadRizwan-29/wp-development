<?php 
/**
 * @package  wc recently viewed products
 * 
*/

// if(!defined('ABSPATH')){
//     die("don't access.");
// }

if(!class_exists('RVPS')){
    class RVPS{
        /** Start session if not exist */ 
        public function rvps_start_session(){
            if(!session_id()){
                session_start();
            }
        }
        /** Create Session name */ 
        public function rvps_session_name(){
            if(is_user_logged_in(  )){
                $user_id = get_current_user_id(  );
                $rvps_session_name = 'rvps_products_'.$user_id;
            }else{
                $rvps_session_name = 'rvps_products_guest';
            }
            return $rvps_session_name;
        }
        /** Initialize Session for Login User */
        public function rvps_session_init(){
            $session_name = $this->rvps_session_name();
            if(!isset($_SESSION[$session_name])){
                $_SESSION[$session_name] = serialize (array());
            }
        }

        /** Get Current User Sessions */
        public function rvps_get_products(){
            $session_name = $this->rvps_session_name();

            if(!isset($_SESSION[$session_name])){
                return false;
            }

            return unserialize($_SESSION[$session_name]);
        }

        /** Update User Session */
        public function rvps_update_products(){
            $session_name = $this->rvps_session_name();
            if( !is_product() ){
                return false;
            }

            $viewed_products = $this->rvps_get_products();
            // $updated_products = array();
            if( !in_array( get_the_ID(), $viewed_products ) ){
                $viewed_products[] = get_the_ID(  );
            } else {
                $current_product_key = array_search( get_the_ID(), $viewed_products );
                unset($viewed_products[$current_product_key]);
                $viewed_products[] = get_the_ID(  );
            }
            $_SESSION[$session_name] = serialize( $viewed_products);
        }
    }
}