<?php
// Output comment with ID.

if ( ! isset( $args['id'] ) ) {
	return;
}

$post_id = $args['id'];

$comments = get_comments( array(
	'post_id' => $post_id,
	'status'  => 'approve',
) );

if ( $comments ) :
	echo '<div class="comments-section">';

	foreach ( $comments as $comment ) :
		echo '<div class="comment">';
		echo '<p>' . esc_html( $comment->comment_content ) . '</p>';
		echo '<p class="comment-author">By: ' . esc_html( $comment->comment_author ) . '</p>';
		echo '</div>';
	endforeach;

	echo '</div>';
else :
	echo 'No comments found.';
endif;
?>
