<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://sharabindu.com
 * @since     1.2.6
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since     1.2.6
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class Master_QR_Lite_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since   1.2.6
	 */
	public static function deactivate() {

		flush_rewrite_rules();
	}

}
