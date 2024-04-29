<!-- Header -->
<?php get_header( ); ?>

<div id="primary" class="content-area wpt__post--template">
    <main id="main">
        <?php 
            while(have_posts( )): the_post( );?>
			<div class="wpt_post--featureimg">
				<?php the_post_thumbnail();?>
			</div>
			<div class="wpt__post--body">
				<div class="wpt__post--title">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="wpt__post--inner">
					<?php the_content(); ?>
				</div>
			</div>
			<?php
            endwhile;
        ?>
		<div class="wpt__related--post">
			<?php 
				// Related Post 
				
				$current_post_id = get_the_ID(); //--> Get Id of Current Post
				
				$categories = get_the_category($current_post_id); //--> Get Category of Current Post
				
				if ($categories) {
					
					// --> Storing ID's of same categories
					
					$category_ids = array();
					foreach ($categories as $category) {
						$category_ids[] = $category->term_id;
					}
					
					// --> Related Post Query
					$related_args = array(
					'post__not_in' => array($current_post_id), // Exclude current post
					'category__in' => $category_ids, // Posts in the same categories
					'posts_per_page' => 3, // Number of related posts to display
					'orderby' => 'aend', // You can change this to other criteria like 'date' or 'title'
					);

					$related_query = new WP_Query($related_args);
					
					// --> Display Content
					if ($related_query->have_posts()) {
					echo '<h2>Related Posts</h2>';
					echo '<ul class="related-posts">';
					while ($related_query->have_posts()) {
						$related_query->the_post();
						echo '<li>';
						if (has_post_thumbnail()) {
							echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</a>';
						}
						echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
						echo '</li>';
					}
					echo '</ul>';
					}

					// Restore original post data
					wp_reset_postdata();
					}
			?>
		</div>
    </main>
</div>

<!-- Footer -->
<?php get_footer( ); ?>