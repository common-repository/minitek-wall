<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/includes
 */

class MN_Wall {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.1
	 * @access   protected
	 * @var      MN_Wall_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.1
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.1
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
	 * @since    1.0.1
	 */
	public function __construct() {

		$this->plugin_name = 'minitek-wall';
		$this->version = '1.2.1';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_metabox_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - MN_Wall_Loader. Orchestrates the hooks of the plugin.
	 * - MN_Wall_i18n. Defines internationalization functionality.
	 * - MN_Wall_Admin. Defines all hooks for the admin area.
	 * - MN_Wall_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-minitek-wall-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-minitek-wall-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-minitek-wall-admin.php';

		/**
		 * The class responsible for defining all actions relating to metaboxes.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-minitek-wall-admin-metaboxes.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-minitek-wall-public.php';

		/**
		 * The class responsible for sanitizing user input
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-minitek-wall-sanitize.php';

		/**
		 * The class that contains all utilities functions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-minitek-wall-utilities.php';

		/**
		 * The class that creates dynamic css
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-minitek-wall-css.php';

		/**
		 * The class that contains all data source functions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-minitek-wall-data.php';

		$this->loader = new MN_Wall_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the MN_Wall_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.1
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new MN_Wall_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new MN_Wall_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// mwall post type
		$this->loader->add_action( 'init', $plugin_admin, 'mwall_register_post_type' );

		// Add admin menu
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_menu' );

		// Re-order admin menu
		$this->loader->add_filter( 'custom_menu_order', $plugin_admin, 'mwall_edit_admin_menu_order' );

		// Add shortcode column to mwall post_type
		$this->loader->add_filter( 'manage_mwall_posts_columns' , $plugin_admin, 'mwall_add_shortcode_column' );
		$this->loader->add_action( 'manage_mwall_posts_custom_column' , $plugin_admin, 'mwall_posts_shortcode_display', 10, 2 );

		// Custom action (delete_cropped_images)
		$this->loader->add_action( 'admin_post_mwall_delete_cropped_images', $plugin_admin, 'mwall_delete_cropped_images' );

		// Show admin notices 
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'mwall_admin_notices' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new MN_Wall_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		// Handle ajax requests (wp_ajax_*action*)
		// Load items
		$this->loader->add_action( 'wp_ajax_wall_create_items', $plugin_public, 'wall_create_items' );
		$this->loader->add_action( 'wp_ajax_nopriv_wall_create_items', $plugin_public, 'wall_create_items' );

		// Load filters
		$this->loader->add_action( 'wp_ajax_wall_create_filters', $plugin_public, 'wall_create_filters' );
		$this->loader->add_action( 'wp_ajax_nopriv_wall_create_filters', $plugin_public, 'wall_create_filters' );
	}

	/**
	 * Register all of the hooks related to metaboxes.
	 *
	 * @since 	 1.0.1
	 * @access 	 private
	 */
	private function define_metabox_hooks() {

		$plugin_metaboxes = new MN_Wall_Admin_Metaboxes( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_metaboxes, 'enqueue_scripts' );

		/* Fire our meta box setup function on the post editor screen. */
		// mwall
		$this->loader->add_action( 'load-post.php', $plugin_metaboxes, 'mwall_meta_boxes_setup' );
		$this->loader->add_action( 'load-post-new.php', $plugin_metaboxes, 'mwall_meta_boxes_setup' );
		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.1
	 */
	public function run() {

		$this->loader->run();

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since    1.0.1
	 * @return   string    The name of the plugin.
	 */
	public function get_plugin_name() {

		return $this->plugin_name;

	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since    1.0.1
	 * @return   MN_Wall_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {

		return $this->loader;

	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since    1.0.1
	 * @return   string    The version number of the plugin.
	 */
	public function get_version() {

		return $this->version;
		
	}

}
