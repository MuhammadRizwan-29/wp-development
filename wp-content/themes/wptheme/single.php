<!-- Header -->
<?php get_header( ); ?>

<div id="primary" class="content-area">
    <main id="main">
        <?php 
            while(have_posts( )): the_post( );
                the_title( );
                the_content();
            endwhile;
        ?>
    </main>
</div>

<!-- Footer -->
<?php get_footer( ); ?>