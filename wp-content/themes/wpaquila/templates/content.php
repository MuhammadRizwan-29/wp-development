<?php 
/**
 * Content template
 * 
 * @package wp-aquila
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <?php 
        get_template_part( 'templates/components/blog/entry-header' );
        get_template_part( 'templates/components/blog/entry-meta' );
        get_template_part( 'templates/components/blog/entry-content' );
        get_template_part( 'templates/components/blog/entry-footer' );
    ?>
</article>