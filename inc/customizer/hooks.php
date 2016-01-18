<?php
/**
 * General setup hooks and filters
 *
 * @package storechild
 */

/**
 * Customizer default color tweaks
 */

add_filter( 'storefront_default_text_color', 'storechild_color_black' );
add_filter( 'storefront_default_heading_color', 'storechild_color_black' );