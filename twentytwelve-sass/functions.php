<?php
add_action( 'wp_enqueue_scripts', 'enqueue_twentytwelve_sass', 11);

/**
 * Unregister default stylesheet and dependency, enqueue our SASS generated css, reregister IE.
 *
 * @since 1.0
 */
function enqueue_twentytwelve_sass() {
	global $wp_styles;

	wp_deregister_style( 'twentytwelve-style' );
	wp_deregister_style( 'twentytwelve-ie' );

	wp_enqueue_style( 'twentytwelve_sass', get_stylesheet_directory_uri() . '/stylesheets/style.css' );
	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve_sass' ), '20121010' );
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}