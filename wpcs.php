<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/memob0x
 * @since             0.1.0
 * @package           Wpcs
 *
 * @wordpress-plugin
 * Plugin Name:       wordpress-components
 * Plugin URI:        https://github.com/memob0x/wordpress-components
 * Description:       Automatically enqueue js and css resources when DOM elements are actually rendered. 
 * Version:           0.1.0
 * Author:            memob0x
 * Author URI:        https://github.com/memob0x
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpcs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.1.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPCS_VERSION', '0.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpcs-activator.php
 */
function activate_wpcs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpcs-activator.php';
	Wpcs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpcs-deactivator.php
 */
function deactivate_wpcs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpcs-deactivator.php';
	Wpcs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpcs' );
register_deactivation_hook( __FILE__, 'deactivate_wpcs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpcs.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_wpcs() {

	$plugin = new Wpcs();
	$plugin->run();

}
run_wpcs();
