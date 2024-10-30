<?php

/**
 * @package           	Minitek-Wall
 * @since				1.0.1
 *
 * @wordpress-plugin
 * Plugin Name:       	Minitek Wall
 * Plugin URI:        	https://www.minitek.gr/wordpress/plugins/minitek-wall
 * Description:       	A powerful masonry layout system for displaying content in WordPress.
 * Version:           	1.2.1
 * Author:            	Minitek.gr
 * Author URI:        	https://www.minitek.gr/
 * License:           	GPL3
 * License URI:       	https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain:       	minitek-wall
 * Domain Path:       	/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MW__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MW__ADMIN_PLUGIN_DIR', plugin_dir_path( __FILE__ ).'admin/' );
define( 'MW__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'MW__ADMIN_PLUGIN_URL', plugin_dir_url( __FILE__ ).'admin/' );

/**
 * The code that runs during plugin activation.
 */
function activate_mn_wall() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-minitek-wall-activator.php';
	MN_Wall_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_mn_wall() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-minitek-wall-deactivator.php';
	MN_Wall_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mn_wall' );
register_deactivation_hook( __FILE__, 'deactivate_mn_wall' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-minitek-wall.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    	1.0.1
 */
function run_mn_wall() {

	$plugin = new MN_Wall();
	$plugin->run();

}

run_mn_wall();
