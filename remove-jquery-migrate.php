<?php
/**
 * Plugin Name: d19 - Remove jQuery Migrate
 * Plugin URI:  https://github.com/d19dotca/wordpress-plugin-remove_jquery_migrate
 * Description: This plugin removes the jQuery Migrate script from the front end of your site.
 * Version:     1.0.0
 * Author:      Dustin Dauncey
 * Author URI:  https://www.d19.ca/
 * Text Domain: remove-jquery-migrate
 * License:     GPLv3
 */

if ( ! function_exists( 'remove_jquery_migrate' ) ) {
	function remove_jquery_migrate( $scripts ) {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];
			if ( $script->deps ) { // Check whether the script has any dependencies
				$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
			}
		}
	}
	add_action( 'wp_default_scripts', 'remove_jquery_migrate' );
}
