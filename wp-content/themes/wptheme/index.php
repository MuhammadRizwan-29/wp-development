<?php 
    get_header();
?>

<!-- Showing post -->

<?php 
if(have_posts( )):
    while(have_posts(  )):
        the_post(  );
        ?>
        <h1> <a href="<?php get_permalink();?>"><?php the_title( ) ?>;</a></h1>
        <p><?php the_content( ) ?>;</p>
    <?php
    endwhile;
endif;
?>

<?php 
    get_footer();
?>