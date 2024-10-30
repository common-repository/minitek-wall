<?php
/**
 * The metabox-specific functionality of the plugin.
 *
 * @since      	1.0.1
 * @package 	Minitek-Wall
 * @subpackage 	Minitek-Wall/admin
 */

class MN_Wall_Admin_Metaboxes {

	/**
	 * The ID of this plugin.
	 *
	 * @since 		1.0.1
	 * @access 		private
	 * @var 		string 			$plugin_name 		The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 		1.0.1
	 * @access 		private
	 * @var 		string 			$version 			The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.1
	 * @param 		string 			$plugin_name 		The name of this plugin.
	 * @param 		string 			$version 			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Includes the JavaScript necessary to control the functionality of the meta boxes.
	 *
	 * @since    	1.0.1
	 */
	public function enqueue_scripts() {

		if ( 'mwall' === get_current_screen()->id ) {

			wp_enqueue_script(
				$this->plugin_name . '-tabs',
				plugins_url( 'minitek-wall/admin/js/minitek-wall-admin-tabs.js' ),
				array( 'jquery' ),
				$this->version
			);

		}

	}

	/**
	 * Meta box setup function for mwall.
	 *
	 * @since 		1.0.1
	 */
	public function mwall_meta_boxes_setup() {

		/* Add meta boxes on the 'add_meta_boxes' hook. */
		add_action( 'add_meta_boxes', array( $this, 'mwall_add_meta' ) );

		/* Save post meta on the 'save_post' hook. */
		add_action( 'save_post', array( $this, 'mwall_save_meta' ) );

	}

	/**
	 * Create one or more meta boxes to be displayed on the post editor screen - mwall
	 *
	 * @since 		1.0.1
	 */
	public function mwall_add_meta() {

		add_meta_box(
			'mwall_options',
			apply_filters( $this->plugin_name . '-metabox-title-wall-options', esc_html__( 'Wall Options', 'minitek-wall' ) ),
			array( $this, 'mwall_metabox'),
			'mwall', // post type
			'normal',
			'default',
			array(
				'file' => 'wall-options'
			)
		);

	}

	/**
	 * Calls a metabox file specified in the add_meta_box args - mwall
	 *
	 * @since 		1.0.1
	 * @return 	void
	 */
	public function mwall_metabox( $post, $params ) {

		if ( ! is_admin() ) { return; }
		if ( 'mwall' !== $post->post_type ) { return; }

		if ( ! empty( $params['args']['classes'] ) ) {

			$classes = 'repeater ' . $params['args']['classes'];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/metabox/minitek-wall-admin-metabox-' . $params['args']['file'] . '-tabs.php' );
		include( plugin_dir_path( __FILE__ ) . 'partials/metabox/minitek-wall-admin-metabox-' . $params['args']['file'] . '.php' );

	}

	/**
	 * Returns an array of the all the metabox fields and their respective types - mwall
	 *
	 * @since 		1.0.1
	 * @access 		public
	 * @return 		array 		Metabox fields and types
	 */
	private function mwall_get_metabox_fields() {

		$fields = array();

		// General settings
		$fields[] = array( 'wall-class', 'text' );
		$fields[] = array( 'wall-font-awesome', 'select' );
		$fields[] = array( 'wall-lightbox', 'select' );

		// Data source
		$fields[] = array( 'wall-post-type', 'radio' );
		$fields[] = array( 'wall-category-filtering-type', 'radio' );
		$fields[] = array( 'wall-categories', 'select' );
		$fields[] = array( 'wall-include-children', 'radio' );
		$fields[] = array( 'wall-tag-filtering-type', 'radio' );
		$fields[] = array( 'wall-tags', 'select' );
		$fields[] = array( 'wall-include-posts', 'textarea' );
		$fields[] = array( 'wall-author-filtering-type', 'radio' );
		$fields[] = array( 'wall-authors', 'select' );
		$fields[] = array( 'wall-exclude-posts', 'textarea' );
		$fields[] = array( 'wall-offset', 'text' );
		$fields[] = array( 'wall-keywords', 'textarea' );
		$fields[] = array( 'wall-posts-ordering', 'select' );
		$fields[] = array( 'wall-posts-ordering-direction', 'radio' );

		// Layout
		$fields[] = array( 'wall-grid', 'radio' );
		$fields[] = array( 'wall-columns', 'select' );
		$fields[] = array( 'wall-layout-mode', 'select' );
		$fields[] = array( 'wall-force-equal-height', 'radio' );
		$fields[] = array( 'wall-gutter', 'text' );
		$fields[] = array( 'wall-item-border', 'radio' );
		$fields[] = array( 'wall-border-size', 'text' );
		$fields[] = array( 'wall-border-color', 'color' );
		$fields[] = array( 'wall-border-radius', 'text' );

		// Image settings
		$fields[] = array( 'wall-show-images', 'radio' );
		$fields[] = array( 'wall-image-link', 'radio' );
		$fields[] = array( 'wall-image-type', 'radio' );
		$fields[] = array( 'wall-full-image', 'radio' );
		$fields[] = array( 'wall-crop-images', 'radio' );
		$fields[] = array( 'wall-image-width', 'text' );
		$fields[] = array( 'wall-image-height', 'text' );
		$fields[] = array( 'wall-preserve-aspect-ratio', 'radio' );
		$fields[] = array( 'wall-fallback-image', 'text' );

		// Detail box - General
		$fields[] = array( 'wall-title-limit', 'text' );
		$fields[] = array( 'wall-title-link', 'radio' );
		$fields[] = array( 'wall-introtext-limit', 'text' );
		$fields[] = array( 'wall-strip-html', 'radio' );
		$fields[] = array( 'wall-date-format', 'text' );

		// Detail box - Big
		$fields[] = array( 'wall-detail-box-big', 'radio' );
		$fields[] = array( 'wall-detail-box-position-big', 'radio' );
		$fields[] = array( 'wall-detail-box-bg-color-big', 'color' );
		$fields[] = array( 'wall-detail-box-opacity-big', 'text' );
		$fields[] = array( 'wall-detail-box-text-color-big', 'color' );
		$fields[] = array( 'wall-item-title-big', 'radio' );
		$fields[] = array( 'wall-item-introtext-big', 'radio' );
		$fields[] = array( 'wall-item-date-big', 'radio' );
		$fields[] = array( 'wall-item-category-big', 'radio' );
		$fields[] = array( 'wall-item-tags-big', 'radio' );
		$fields[] = array( 'wall-item-author-big', 'radio' );
		$fields[] = array( 'wall-item-comments-count-big', 'radio' );
		$fields[] = array( 'wall-item-readmore-big', 'radio' );

		// Detail box - Landscape
		$fields[] = array( 'wall-detail-box-landscape', 'radio' );
		$fields[] = array( 'wall-detail-box-position-landscape', 'radio' );
		$fields[] = array( 'wall-detail-box-bg-color-landscape', 'color' );
		$fields[] = array( 'wall-detail-box-opacity-landscape', 'text' );
		$fields[] = array( 'wall-detail-box-text-color-landscape', 'color' );
		$fields[] = array( 'wall-item-title-landscape', 'radio' );
		$fields[] = array( 'wall-item-introtext-landscape', 'radio' );
		$fields[] = array( 'wall-item-date-landscape', 'radio' );
		$fields[] = array( 'wall-item-category-landscape', 'radio' );
		$fields[] = array( 'wall-item-tags-landscape', 'radio' );
		$fields[] = array( 'wall-item-author-landscape', 'radio' );
		$fields[] = array( 'wall-item-comments-count-landscape', 'radio' );
		$fields[] = array( 'wall-item-readmore-landscape', 'radio' );

		// Detail box - Portrait
		$fields[] = array( 'wall-detail-box-portrait', 'radio' );
		$fields[] = array( 'wall-detail-box-position-portrait', 'radio' );
		$fields[] = array( 'wall-detail-box-bg-color-portrait', 'color' );
		$fields[] = array( 'wall-detail-box-opacity-portrait', 'text' );
		$fields[] = array( 'wall-detail-box-text-color-portrait', 'color' );
		$fields[] = array( 'wall-item-title-portrait', 'radio' );
		$fields[] = array( 'wall-item-introtext-portrait', 'radio' );
		$fields[] = array( 'wall-item-date-portrait', 'radio' );
		$fields[] = array( 'wall-item-category-portrait', 'radio' );
		$fields[] = array( 'wall-item-tags-portrait', 'radio' );
		$fields[] = array( 'wall-item-author-portrait', 'radio' );
		$fields[] = array( 'wall-item-comments-count-portrait', 'radio' );
		$fields[] = array( 'wall-item-readmore-portrait', 'radio' );

		// Detail box - Small
		$fields[] = array( 'wall-detail-box-small', 'radio' );
		$fields[] = array( 'wall-detail-box-position-small', 'radio' );
		$fields[] = array( 'wall-detail-box-bg-color-small', 'color' );
		$fields[] = array( 'wall-detail-box-opacity-small', 'text' );
		$fields[] = array( 'wall-detail-box-text-color-small', 'color' );
		$fields[] = array( 'wall-item-title-small', 'radio' );
		$fields[] = array( 'wall-item-introtext-small', 'radio' );
		$fields[] = array( 'wall-item-date-small', 'radio' );
		$fields[] = array( 'wall-item-category-small', 'radio' );
		$fields[] = array( 'wall-item-tags-small', 'radio' );
		$fields[] = array( 'wall-item-author-small', 'radio' );
		$fields[] = array( 'wall-item-comments-count-small', 'radio' );
		$fields[] = array( 'wall-item-readmore-small', 'radio' );

		// Detail box - Columns
		$fields[] = array( 'wall-detail-box-columns', 'radio' );
		$fields[] = array( 'wall-detail-box-position-columns', 'radio' );
		$fields[] = array( 'wall-detail-box-bg-color-columns', 'color' );
		$fields[] = array( 'wall-detail-box-opacity-columns', 'text' );
		$fields[] = array( 'wall-detail-box-text-color-columns', 'color' );
		$fields[] = array( 'wall-item-title-columns', 'radio' );
		$fields[] = array( 'wall-item-introtext-columns', 'radio' );
		$fields[] = array( 'wall-item-date-columns', 'radio' );
		$fields[] = array( 'wall-item-category-columns', 'radio' );
		$fields[] = array( 'wall-item-tags-columns', 'radio' );
		$fields[] = array( 'wall-item-author-columns', 'radio' );
		$fields[] = array( 'wall-item-comments-count-columns', 'radio' );
		$fields[] = array( 'wall-item-readmore-columns', 'radio' );

		// Hover box
		$fields[] = array( 'wall-hover-box', 'radio' );
		$fields[] = array( 'wall-hover-bg-color', 'color' );
		$fields[] = array( 'wall-hover-opacity', 'text' );
		$fields[] = array( 'wall-hover-text-color', 'color' );
		$fields[] = array( 'wall-hover-effect', 'radio' );
		$fields[] = array( 'wall-hover-speed', 'text' );
		$fields[] = array( 'wall-hover-easing', 'radio' );
		$fields[] = array( 'wall-hover-title', 'radio' );
		$fields[] = array( 'wall-hover-title-limit', 'text' );
		$fields[] = array( 'wall-hover-introtext', 'radio' );
		$fields[] = array( 'wall-hover-introtext-limit', 'text' );
		$fields[] = array( 'wall-hover-strip-html', 'text' );
		$fields[] = array( 'wall-hover-date', 'text' );
		$fields[] = array( 'wall-hover-date-format', 'text' );
		$fields[] = array( 'wall-hover-category', 'text' );
		$fields[] = array( 'wall-hover-tags', 'text' );
		$fields[] = array( 'wall-hover-author', 'text' );
		$fields[] = array( 'wall-hover-comments', 'text' );
		$fields[] = array( 'wall-hover-link', 'radio' );
		$fields[] = array( 'wall-hover-lightbox', 'radio' );

		// Pagination
		$fields[] = array( 'wall-initial-items', 'text' );

		// Effects
		$fields[] = array( 'wall-effects', 'checkbox' );
		$fields[] = array( 'wall-transition-duration', 'text' );
		$fields[] = array( 'wall-transition-stagger', 'text' );

		// Filters
		$fields[] = array( 'wall-filters-color', 'color' );
		$fields[] = array( 'wall-filters-border-radius', 'text' );
		$fields[] = array( 'wall-reset-button', 'radio' );
		$fields[] = array( 'wall-close-on-select', 'radio' );
		$fields[] = array( 'wall-category-filters', 'select' );
		$fields[] = array( 'wall-category-filters-title', 'text' );
		$fields[] = array( 'wall-tag-filters', 'select' );
		$fields[] = array( 'wall-tag-filters-title', 'text' );
		$fields[] = array( 'wall-date-filters', 'select' );
		$fields[] = array( 'wall-date-filters-title', 'text' );
		$fields[] = array( 'wall-sorting-type', 'select' );
		$fields[] = array( 'wall-title-sorting', 'select' );
		$fields[] = array( 'wall-date-sorting', 'select' );
		$fields[] = array( 'wall-comments-sorting', 'select' );
		$fields[] = array( 'wall-sorting-direction', 'select' );

		// Responsive levels
		$fields[] = array( 'wall-responsive-levels', 'radio' );
		$fields[] = array( 'wall-l-size', 'text' );
		$fields[] = array( 'wall-l-height', 'text' );
		$fields[] = array( 'wall-m-layout', 'radio' );
		$fields[] = array( 'wall-m-size', 'text' );
		$fields[] = array( 'wall-m-items', 'select' );
		$fields[] = array( 'wall-m-height', 'text' );
		$fields[] = array( 'wall-s-layout', 'radio' );
		$fields[] = array( 'wall-s-size', 'text' );
		$fields[] = array( 'wall-s-items', 'select' );
		$fields[] = array( 'wall-s-height', 'text' );
		$fields[] = array( 'wall-xs-layout', 'radio' );
		$fields[] = array( 'wall-xs-size', 'text' );
		$fields[] = array( 'wall-xs-items', 'select' );
		$fields[] = array( 'wall-xs-height', 'text' );
		$fields[] = array( 'wall-xxs-layout', 'radio' );
		$fields[] = array( 'wall-xxs-items', 'select' );
		$fields[] = array( 'wall-xxs-height', 'text' );

		return $fields;

	}

	/**
	 * Saves metabox data - mwall
	 *
	 * @since 		1.0.1
	 * @access 		public
	 * @param 		int 		$post_id 		The post ID
	 * @param 		object 		$object 		The post object
	 * @return 		void
	 */
	public function mwall_save_meta( $post_id, $object = null) {

		//wp_die( '<pre>' . print_r( $_POST ) . '</pre>' );

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return $post_id; }
		if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }

    	if (!isset($_POST['post_type'])) { return; }

		$safe_post_type = $this->sanitizer( 'text', $_POST['post_type'] );
		if ( $safe_post_type !== 'mwall' ) { return $post_id; }

		$nonce_check = $this->check_nonces( $_POST, $type = 'wall' );

		if ( 0 < $nonce_check ) { return $post_id; }

		$metas = $this->mwall_get_metabox_fields();

		foreach ( $metas as $meta ) {

			$name = $this->sanitizer( 'text', $meta[0] );
			$type = $meta[1];

			if (is_array($_POST[$name])) {
				$new_value = $this->sanitizer( 'array', $_POST[$name] );
			} else {
				$new_value = $this->sanitizer( $type, $_POST[$name] );
			}

			update_post_meta( $post_id, $name, $new_value );

		} // foreach

	}

	/**
	 * Check each nonce. If any don't verify, $nonce_check is increased.
	 * If all nonces verify, returns 0.
	 *
	 * @since 		1.0.1
	 * @access 		public
	 * @return 		int 		The value of $nonce_check
	 */
	private function check_nonces( $posted, $type ) {

		$nonces = array();
		$nonce_check = 0;

		$nonces[] = $type.'_options';

		foreach ( $nonces as $nonce ) {

			if ( ! isset( $posted[$nonce] ) ) { $nonce_check++; }
			if ( isset( $posted[$nonce] ) && ! wp_verify_nonce( $posted[$nonce], $this->plugin_name ) ) { $nonce_check++; }

		}

		return $nonce_check;

	}

	/**
	 * Sanitizes input.
	 *
	 * @since 		1.0.1
	 * @access 		public
	 * @return 		array 		Metabox fields and types
	 */
	private function sanitizer( $type, $data ) {

		if ( empty( $type ) ) { return; }
		if ( empty( $data ) ) { return; }

		$return = '';
		$sanitizer = new MN_Wall_Sanitize();

		$sanitizer->set_data( $data );
		$sanitizer->set_type( $type );

		$return = $sanitizer->clean();

		unset( $sanitizer );

		return $return;

	}

}
