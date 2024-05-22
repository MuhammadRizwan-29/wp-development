<?php 
/**
 * No Content Template
 * 
 * @package wp-aquila
*/
?>
<section class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title">
            <?php 
                esc_html_e( 'Nothing Found', 'aquila' )
            ?>
        </h1>
    </header>
    <div class="page-content">
        <?php 
            if(is_home() && current_user_can( 'publish_posts' ) ){
                ?>
                <p>
                    <?php 
                        printf(
                            wp_kses( 
                                __( 'Ready to publish your post? <a href="%s">Get started here</a>', 'aquila' ),
                                [
                                    'a' => [
                                        'href' => []
                                    ]
                                ]
                                    ),
                                    esc_url( admin_url( 'post-new.php' ) )
                            );
                    ?>
                </p>
                <?php
            }
        ?>
    </div>
</section>