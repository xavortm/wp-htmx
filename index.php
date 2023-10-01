<?php
/**
 * The main template file
 *
 * @package TenUpTheme
 */

get_header(); ?>

	<p>Hello world, this is an HTMX demo.</p>

	<div>
		<button hx-get="/wp-json/htmx/v1/recent-posts" hx-swap="outerHTML" hx-trigger="click">Load most recent posts...</button>
	</div>

<?php
get_footer();
