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
        
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <?php 
                if ( have_posts() ) {
                ?>
                <div class="post-wrap">
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

                } else {
                    get_template_part( '/templates/no-content' );
                }
                ?>                
                </div>
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
            <div class="col-lg-4 col-md-4 col-sm-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
    </main>
</div>

<?php 
    get_footer(); 
?>
