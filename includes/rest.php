<?php

namespace TenUpTheme\REST;

use WP_Query;
use WP_REST_Server;

function setup() {

	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'rest_api_init', $n( 'register_routes' ) );

}

function register_routes() {
	register_rest_route( 'htmx/v1', '/article-card/(?P<id>\d+)', array(
		'methods'  => WP_REST_Server::READABLE,
		'callback' => 'TenUpTheme\REST\get_post',
		'args'     => get_post_args()
	) );

	register_rest_route( 'htmx/v1', '/recent-posts', array(
		'methods'  => WP_REST_Server::READABLE,
		'callback' => 'TenUpTheme\REST\get_recent_posts',
	) );

	register_rest_route( 'htmx/v1', '/comments/(?P<id>\d+)', array(
		'methods'  => WP_REST_Server::READABLE,
		'callback' => 'TenUpTheme\REST\get_comments',
		'args'     => get_post_args()
	) );
}

/**
 * REST - new endpoints to serve HTML for HTMX output.
 *
 * Trying to get custom data out like post by ID.
 *
 * @package TenUpTheme\REST
 */

/**
 * Safety check:
 */
function prefix_get_private_data_permissions_check(): bool {
	// Available to all.
	return true;
}

/**
 * Return HTML at that endpoint.
 */
function get_post( $request ): string {
	get_template_part( 'partials/single', 'post' );

	exit();
}

function get_comments( $request ): string {

	get_template_part( 'partials/comments', null, array(
		'id' => $request['id']
	) );

	exit();
}

function get_post_args(): array {
	$args = array();

	$args['filter'] = array(
		'description' => esc_html__( 'The post ID', 'tenup-theme' ),
		'type'        => 'number',
	);

	return $args;
}

function get_recent_posts(): string {
	get_template_part( 'partials/recent', 'posts' );

	exit();
}
