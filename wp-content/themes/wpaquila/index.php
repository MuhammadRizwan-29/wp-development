<?php 
    /* Main Template */ 

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
                    ?>
                    <div class="row">
                    <?php 
                        while ( have_posts() ) : the_post();
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
                                </div>
                            </div>
                        </div>
                        <?php   
                        endwhile;
                    ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="container">
                    <p><?php esc_html_e( 'No posts found.', 'wpaquila' ); ?></p>
                </div>
                <?php
            }
        ?>
    </main>
</div>

<?php 
    get_footer(); 
?>
