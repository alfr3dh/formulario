<?php

/**
 * Fired when the plugin is uninstalled.
 *

 *
 * @link       https://sharabindu.com
 * @since     1.2.6
 *
 * @package    Master_QR_Lite
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}


delete_option('masterqr_settings');

delete_site_option('masterqr_settings');