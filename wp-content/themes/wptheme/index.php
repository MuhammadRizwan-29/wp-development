<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WPT Theme Development</title>
        <meta charset="utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1">
    </head>
</html>
<?php 
    get_header();
?>

<!-- Showing post -->
<section class="container">
    <div class="main__content">
<?php 
    wp_nav_menu( array(
        'theme_location' => 'custom-menu',
        'container' => 'nav',
        'container_class' => 'custom-menu-class',
        'menu_class'=> 'custom-menu-list',
    ) );
?>
<?php 
if(have_posts( )):
    while(have_posts(  )):
        the_post(  );
        ?>
        <h1> <a href="<?php the_permalink();?>"><?php the_title( ); ?></a></h1>
        <p><?php the_content( ); ?></p>
    <?php
    endwhile;
endif;
?>
</div>
<sidebar class="main__sidebar">
    <?php get_sidebar(); ?>
</sidebar>

</section>

<?php 
    get_footer();
?>