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

<!-- Event CUSTOM POST TYPE -->
<div class="event--post__data">
	<h2 class="wpt_event--heading">Most Trending Topics</h2>
	<div class="event--post__inner">
		<?php 
			// Register our post-type here
			$event_post = new WP_Query(array(
				'post_type' => 'event',
				'post_per_page' => 3, // If call all post use -1
			));
			
			while($event_post->have_posts(  )):
				$event_post->the_post(); 
				?>
				<div class="wpt_single_event">
					<h1 class="wpt_single_event_heading">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>
					<div class="wpt_event--meta">
						<span>
							<b>Date:</b> <?php echo get_the_date(); ?>
						</span>
						<span>
							<b>Author:</b><?php echo get_the_author(); ?>
						</span>
					</div>
					<div class="wpt_event_content">
						<?php the_excerpt();?>
					</div>
				</div>
			<?php	
			endwhile;
		?>
	</div>
</div>
<!-- end of Event CUSTOM POST TYPE -->
<?php 
	do_shortcode('[wptshortcode]');
 ?>
<?php 
    get_footer();
?>