<?php 
/**
 * Header Template
 * 
 * @package wp-aquila
 */
?>
<!doctype html>
<html lang="<?php language_attributes( ); ?>">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WP-Aquila</title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class( ); ?>>
        <?php 
            if(function_exists('wp_body_open')){
                wp_body_open();
            }  
        ?>
        <header class="header-main">
            <?php get_template_part('/templates/header/nav' ); ?>
        </header>