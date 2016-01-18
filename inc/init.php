<?php
/**
 * Storechild engine room
 *
 * @package storechild
 */

/**
 * Hooks & Filters.
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
require get_stylesheet_directory() . '/inc/functions/plugged.php';

/**
 * Customizer.
 * Adjust Storefront setting defaults with these colors
 */
require get_stylesheet_directory() . '/inc/customizer/display.php';
require get_stylesheet_directory() . '/inc/customizer/controls.php';
require get_stylesheet_directory() . '/inc/customizer/colors.php';

/**
 * Structure.
 * Any functions pertaining to the customisation of the Storefront layout.
 */
require get_stylesheet_directory() . '/inc/structure/structure.php';

/**
 * Storefront Extensions.
 * Declares incompatibility with specific extensions.
 * Modifies extensions current behaviour to suit the child theme.
 */
require get_stylesheet_directory() . '/inc/functions/storefront-extensions.php';
