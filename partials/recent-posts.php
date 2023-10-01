<div class="recent-posts" hx-boost="true">
	<?php

	// Loop through the latest posts and print them:
	$args = array(
		'post_type'      => 'post',  // Specify the post type (you can change it to 'custom_post_type' if needed).
		'posts_per_page' => 5,       // Number of posts to display.
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			// Display post content here.
			?>

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="post-content">
				<?php the_excerpt(); ?>
			</div>

		<?php
		endwhile;
		wp_reset_postdata(); // Reset the post data.
	else :
		// No posts found.
		echo 'No posts found.';
	endif;
	?>
</div>
