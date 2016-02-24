<?php
/**
 * Storechild_Template Class
 *
 * @author   WooThemes
 * @package  Storechild
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild_Template' ) ) {
	/**
	 * The Storechild Template Class
	 */
	class Storechild_Template {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'storefront_header', array( $this, 'primary_navigation_wrapper' ),       45 );
			add_action( 'storefront_header', array( $this, 'primary_navigation_wrapper_close' ), 65 );
		}

		/**
		 * Primary navigation wrapper
		 *
		 * @return void
		 */
		public function primary_navigation_wrapper() {
			echo '<section class="storechild-primary-navigation">';
		}

		/**
		 * Primary navigation wrapper close
		 *
		 * @return void
		 */
		public function primary_navigation_wrapper_close() {
			echo '</section>';
		}
	}
}

return new Storechild_Template();
