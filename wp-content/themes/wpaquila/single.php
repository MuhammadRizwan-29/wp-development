<?php 
/**
 * Single Post Template
 * 
 * @package WP-Aquila
 */

    get_header();
?>

<div class="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php 
            if ( have_posts() ) {
                ?>
                <div class="container">
                    <?php 
                        if ( is_home() && ! is_front_page() ) {
                            ?>
                            <header class="mb-5">
                                <h1 class="page-title">
                                    <?php single_post_title(); ?>
                                </h1>
                            </header>
                            <?php
                        }
                        while(have_posts(  )): the_post();
                            get_template_part( 'templates/content' );
                        endwhile;
                    ?>
                    
                </div>
                <div class="container">
                    <div class="aquila-paginations">
                        <div class="prev">
                            <span class="pagination-link">
                                <?php 
                                    previous_post_link(  );
                                ?>
                            </span>
                        </div>
                        <div class="next">
                           <span class="pagination-link">
                                <?php 
                                    next_post_link(  );
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                get_template_part( '/templates/no-content' );
            }
        ?>
    </main>
</div>

<?php 
    get_footer(); 
?>
