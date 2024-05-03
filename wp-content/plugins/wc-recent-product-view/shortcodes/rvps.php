<?php 

if(!function_exists('rvps_shortcode')){
    function rvps_shortcode( $atts, $content = null ){
        shortcode_atts( array(
            'column' => 4,
            'num_products' => 4,
        ), $atts , 'rvps' );

        return rvps_products_view($column, $num_products);
    }
}