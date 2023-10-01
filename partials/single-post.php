<?php

$post_id       = get_the_ID();
$comment_count = get_comments_number( $post_id );

get_header(); ?>

<article class="entry">
	<h1 class="entry__title"><?php the_title(); ?></h1>

	<div class="entry__content">
		<?php the_content(); ?>
	</div>
</article>

<div class="comments">
	<h2>Comments</h2>

	<?php if ( $comment_count > 0 ): ?>
		<button hx-target="this" hx-swap="outerHTML" hx-trigger="click" hx-get="/wp-json/htmx/v1/comments/<?php echo $post_id; ?>">Show <?php echo $comment_count; ?> comments</button>
	<?php endif; ?>

	<?php get_template_part( 'partials/comment', 'form' ); ?>
</div>
<?php get_footer(); ?>
