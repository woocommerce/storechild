<?php
/**
 * Storechild engine room
 *
 * @package storechild
 */

/**
 * Hooks.
 * Hooks and filters pertaining to different parts of the theme.
 */
require get_stylesheet_directory() . '/inc/functions/hooks.php';
require get_stylesheet_directory() . '/inc/structure/hooks.php';
require get_stylesheet_directory() . '/inc/customizer/hooks.php';

/**
 * Setup.
 * Enqueue styles, specify color functions, etc.
 */
require get_stylesheet_directory() . '/inc/functions/setup.php';

/**
 * Customizer.
 * Adjust Storefront setting defaults with these colors
 */
require get_stylesheet_directory() . '/inc/customizer/display.php';
require get_stylesheet_directory() . '/inc/customizer/settings.php';

/**
 * Structure.
 * Any functions pertaining to the customisation of the Storefront layout.
 */
require get_stylesheet_directory() . '/inc/structure/structure.php';