<?php
/**
 * General setup hooks and filters
 *
 * @package storechild
 */

/**
 * Add Storechild specific CSS selectors based on customizer settings
 */
add_action( 'wp_enqueue_scripts', 					'storechild_add_customizer_css', 1000 );