<?php

/**
 * Fired during plugin activation
 *
 * @link       https://sharabindu.com
 * @since     1.2.6
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since     1.2.6
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class Master_QR_Lite_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since   1.2.6
	 */
	public static function activate() {

	flush_rewrite_rules();


		$tmp = get_option( 'masterqr_settings' );
		if(isset($_POST['action']) && current_user_can('manage_options')) {

		  update_option( 'masterqr_settings' , sanitize_text_field($_POST['masterqr_settings']));

		}



		
	}

}
