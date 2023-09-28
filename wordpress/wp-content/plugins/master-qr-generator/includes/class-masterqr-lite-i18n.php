<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sharabindu.com
 * @since     1.2.6
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since     1.2.6
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class Master_QR_Lite_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since   1.2.6
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'master-qr-generator',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
