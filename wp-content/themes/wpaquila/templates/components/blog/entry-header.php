<?php 
/**
 * Blog header
 * 
 * @package wp-aquila
 * */
$the_post_id = get_the_ID();
$has_post_thumnail = get_the_post_thumbnail( $the_post_id );

?>

<header class="entry-header">
    <?php 
        if($has_post_thumnail){
            ?>
            <div class="entry-image mb-3">
                <a href="<?php echo esc_url( get_permalink( ) ); ?>">
                    <?php 
                        the_post_custom_thumbnail(
                            $the_post_id,
                            'feature-thumbnail',
                            [
                                'sizes' => '(max-width: 350px) 350px, 233px',
                                'class' => 'attachment-featured-large size-featured-image'
                            ]
                        );
                    ?>
                </a>
            </div>
            <?php
        }
    ?>
</header>