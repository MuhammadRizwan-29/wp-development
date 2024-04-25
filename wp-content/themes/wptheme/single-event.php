<?php
	/*
	Template Name: Single Event Post
	*/
	
	// Header
	get_header();
	?>
	<div class="wpt_event_post_template">
		<div class="wpt_event_post--inner">
			<?php 
				$event_post = new WP_Query(array(
					'post_type' => 'event',
					'p' => get_the_ID(),
				));
				while($event_post -> have_posts()){ // Loop start
					$event_post -> the_post();
					?>
						<!-- Single Event Title -->
						<div class="wpt__event--head">
							<h1><?php the_title(); ?></h1>
						</div>
						
						<!-- Single Event Meta Data -->
						<div class="wpt__event--metadata">
							
						</div>
						
						<!-- Single Event Content -->
						<div class="wpt__event--content">
							<?php the_content(); ?>
						</div>
					<?php
				} // end of Loop
			?>
		</div>
	</div>
	
	<?php 
	get_footer();
?>

