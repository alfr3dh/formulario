<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since     1.2.6
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since     1.2.6
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */


class Master_QR_Lite {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since   1.2.6
	 * @access   protected
	 * @var      Master_QR_Lite_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since   1.2.6
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since   1.2.6
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since   1.2.6
	 */
	public function __construct() {
		if ( defined( 'MASTER_QR_LITE_VERSION' ) ) {
			$this->version = MASTER_QR_LITE_VERSION;
		} else {
			$this->version = '1.2.6';
		}
		
		$this->plugin_name = 'Master_QR_Lite';
	
		
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		


	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Master_QR_Lite_Loader. Orchestrates the hooks of the plugin.
	 * - Master_QR_Lite_i18n. Defines internationalization functionality.
	 * - Master_QR_Lite_Admin. Defines all hooks for the admin area.
	 * - Master_QR_Lite_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since   1.2.6
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-masterqr-lite-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-masterqr-lite-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-masterqr-lite-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class_maserqr_list_view.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class_masterqr_print.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-masterqr-lite-public.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/masterqr-lite-func.php';

		$this->loader = new Master_QR_Lite_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Master_QR_Lite_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since   1.2.6
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Master_QR_Lite_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since   1.2.6
	 * @access   private
	 */

	private function define_admin_hooks() {
		
		$plugin_admin = new Master_QR_Lite_Admin( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'admin_menu_define' );	
		$this->loader->add_action( 'admin_init', $plugin_admin, 'qcr_settings_page' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'qcr_metabox_page' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'qrc_save_post_meta' );
		$this->loader->add_filter( 'plugin_action_links_' .plugin_basename( dirname( __DIR__ ).'/master-qr-lite.php' ), $plugin_admin, 'plugin_settings_link');

		$this->loader->add_filter( 'admin_footer_text', $plugin_admin, 'adminFooterTextQR', 1, 1);


	}


	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since   1.2.6
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Master_QR_Lite_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$this->loader->add_filter('the_content' , $plugin_public,'qcr_code_element');

		$this->loader->add_filter('woocommerce_product_tabs' , $plugin_public,'woomaster_custom_product_tabs');
	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since   1.2.6
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since    1.2.6
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since    1.2.6
	 * @return    Master_QR_Lite_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since    1.2.6
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

