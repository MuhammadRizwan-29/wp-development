<?php 
/**
 * @package  wc recently viewed products
 * 
*/

if(!defined('ABSPATH')){
    die("don't access.");
}

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
        }
    }
}