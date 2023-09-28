<?php

/**
 * @wordpress-plugin
 * Plugin Name:       QR Code Composer
 * Plugin URI:        https://wordpress.org/plugins/qr-code-composer/
 * Description:   This plugin generates QR codes for URLs. It will automatically generate a QR code for the current page URL.
 * Version:           1.8.0
 * Author:            Sharabindu
 * Author URI:        https://sharabindu.com/plugins/qr-code-composer/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       qr-code-composer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 *Include plugin.php
 *Check Qr composer Pro Version is enable.
 * Then Deactive Pro version and activate Lite version
 */

include_once(ABSPATH.'wp-admin/includes/plugin.php');
if( is_plugin_active('qrc_composer_pro/qrc_composer_pro.php') ){
     add_action('update_option_active_plugins', 'deactivate_QRCpro_version');
}
function deactivate_QRCpro_version(){
   deactivate_plugins('qrc_composer_pro/qrc_composer_pro.php');
}

/**
 * Currently plugin version.
 * Start at version 1.8.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'QRC_COMPOSER_VERSION', '1.8.0' );

/**
 * The core plugin path that is used to define internationalization
 */
define( 'QRC_COMPOSER_PATH', plugin_dir_path(__FILE__));

/**
 * The core plugin url that is used to define internationalization
 */
define( 'QRC_COMPOSER_URL', plugin_dir_url(__FILE__));



/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-qrc_composer-activator.php
 */
function activate_qrc_composer() {


	require_once QRC_COMPOSER_PATH . 'includes/class-qrc_composer-activator.php';
	Qrc_composer_Activator::activate();
	add_option('qrc_composer_do_activation_edirect', true);

	}



/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-qrc_composer-deactivator.php
 */
function deactivate_qrc_composer() {
	require_once QRC_COMPOSER_PATH . 'includes/class-qrc_composer-deactivator.php';
	Qrc_composer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_qrc_composer' );
register_deactivation_hook( __FILE__, 'deactivate_qrc_composer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require QRC_COMPOSER_PATH . 'includes/class-qrc_composer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.8.0
 */
function run_qrc_composer() {

	$plugin = new Qrc_composer();
	$plugin->run();
	
}
run_qrc_composer();

