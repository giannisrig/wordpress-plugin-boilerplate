<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.apto.gr
 * @since             1.0.0
 * @package           AptoName
 *
 * @wordpress-plugin
 * Plugin Name:       Apto Name
 * Plugin URI:        https://www.apto.gr
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            APTO OE
 * Author URI:        https://www.apto.gr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aptoname
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'APTONAME_VERSION', '1.0.0' );

require_once 'vendor/autoload.php';


use AptoName\Includes\AptoName;
use AptoName\Includes\Activator;
use AptoName\Includes\Deactivator;

/**
 * The code that runs during plugin activation.
 * This action is documented in:
 * @see \AptoName\Includes\Activator
 */
function activate_apto_name() {
    Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in:
 * @see \AptoName\Includes\Deactivator
 */
function deactivate_apto_name() {
    Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_apto_name' );
register_deactivation_hook( __FILE__, 'deactivate_apto_name' );


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function runAptoName() {

    $plugin = new AptoName();
    $plugin->run();

}
runAptoName();



