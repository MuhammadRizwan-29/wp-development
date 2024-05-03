<?php 

/**
 *
 *  Uninstall Plugin
 * @package wpmr-plugin
 * 
***/ 

/** Direct access forbidden */ 
if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
}

/** Clear DB stored data */
$books = get_post( array(
    'post_type' => 'book',
    'numberposts' => -1
) );

foreach($books as $book){
    wp_delete_post( $book->ID, true );
}