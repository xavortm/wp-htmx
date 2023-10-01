<?php
// Check if comments are open and if there are comments.
if ( comments_open() || get_comments_number() ) :
	comment_form();
endif;
?>
