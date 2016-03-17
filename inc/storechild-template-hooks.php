<?php
/**
 * Storechild hooks
 *
 * @package storechild
 */

add_action( 'init', 'storechild_hooks' );

/**
 * Add and remove Storechild/Storefront functions.
 *
 * @return void
 */
function storechild_hooks() {
	add_action( 'storefront_header', 'storechild_primary_navigation_wrapper',       45 );
	add_action( 'storefront_header', 'storechild_primary_navigation_wrapper_close', 65 );
}
