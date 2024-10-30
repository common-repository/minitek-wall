<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @since		1.0.1
 * @package    	Minitek-Wall
 * @subpackage 	Minitek-Wall/public
 */

class MN_Wall_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since     1.0.1
	 * @access    private
	 * @var       string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since     1.0.1
	 * @access    private
	 * @var       string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since     1.0.1
	 * @param     string    $plugin_name       The name of the plugin.
	 * @param     string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->dataSource = new MN_Wall_Data($this->plugin_name);

		// Add shortcode
		add_shortcode( 'mwall', array( $this, 'mwall_display' ) );

	}

	/**
	 * Display the wall.
	 *
	 * @since     1.0.1
	 */
	public function mwall_display($atts, $content = null ) {

		$atts = shortcode_atts(array('id' => ""), $atts, 'mwall');
		$wall_id = $atts['id'];
		$dynamicCss = new MN_Wall_CSS();
		$wall_options = get_post_meta( $wall_id, '', false );

		// Start inline css
		wp_enqueue_style( $this->plugin_name.'_custom_style', plugin_dir_url( __FILE__ ) . 'css/minitek-wall-public-custom.css', array(), $this->version, 'all' );
		$custom_css = '';

		// Font awesome
		if ($wall_options['wall-font-awesome'][0] == 'yes')
			wp_enqueue_style( $this->plugin_name.'_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->version, 'all' );

		// Lightbox
		if (isset($wall_options['wall-lightbox']) && $wall_options['wall-lightbox'][0] == 'yes')
		{
			wp_enqueue_style( $this->plugin_name.'_lightbox', plugin_dir_url( __FILE__ ) . 'lightbox/lightbox.min.css', array(), $this->version, 'all' );
			wp_enqueue_script( $this->plugin_name.'_lightbox', plugin_dir_url( __FILE__ ) . 'lightbox/lightbox.min.js', array( 'jquery' ), $this->version, false );
		}

		// Wall grid
		$wall_grid = $wall_options['wall-grid'][0];

		if ($wall_grid == '99v')
		{
			$mwall_layout = 'list';
			$mwall_grid = '';
		}
		else if ($wall_grid == '98c')
		{
			$mwall_layout = 'columns';
			$mwall_grid = '';
		}
		else
		{
			$mwall_layout = 'masonry';
			$mwall_grid = 'mwall-grid'.$wall_grid;
		}

		// Ordering
		$this->wall_ordering = $wall_options['wall-posts-ordering'][0];
		$this->wall_ordering_direction = $wall_options['wall-posts-ordering-direction'][0];

		// Start html
		$html = '<div id="mwall_loader_'.$wall_id.'" class="mwall-container-loader mwall-loader"> </div>';
		$html .= '<div id="mwall_container_'.$wall_id.'" class="mwall-container mwall-'.$mwall_layout.
		' '.$mwall_grid.
		' '.$wall_options['wall-class'][0].
		'" data-order="'.$this->wall_ordering.'" data-direction="'.$this->wall_ordering_direction.'">';

		// Filters and Sortings
		if ((isset($wall_options['wall-id-sorting']) && $wall_options['wall-id-sorting'][0] == 'yes') ||
			(isset($wall_options['wall-title-sorting']) && $wall_options['wall-title-sorting'][0] == 'yes') ||
			(isset($wall_options['wall-date-sorting']) && $wall_options['wall-date-sorting'][0] == 'yes') ||
			(isset($wall_options['wall-comments-sorting']) && $wall_options['wall-comments-sorting'][0] == 'yes') ||
			(isset($wall_options['wall-category-filters']) && $wall_options['wall-category-filters'][0] != 'none') ||
			(isset($wall_options['wall-tag-filters']) && $wall_options['wall-tag-filters'][0] != 'none') ||
			(isset($wall_options['wall-date-filters']) && $wall_options['wall-date-filters'][0] != 'none') ||
			(isset($wall_options['wall-reset-button']) && $wall_options['wall-reset-button'][0] == 'yes'))
		{
			// Filters inline css
			$custom_css .= $dynamicCss->getFiltersCss($wall_options, $wall_id);

			$html .= '<div class="mwall-filters-sortings">';

				// Filters
				if ($wall_options['wall-category-filters'][0] != 'none' || 
					$wall_options['wall-tag-filters'][0] != 'none' ||
					$wall_options['wall-date-filters'][0] != 'none')
				{
					$html .= '<div id="mwall_filters_container_'.$wall_id.'" class="mwall-filters-container">';
						$html .= '<div id="mwall_filters_'.$wall_id.'" class="mwall-filters">';
							$html .= $this->wall_create_filters($atts);
						$html .= '</div>';
					$html .= '</div>';
				}

				// Sortings
				if ((isset($wall_options['wall-id-sorting']) && $wall_options['wall-id-sorting'][0] == 'yes') ||
					(isset($wall_options['wall-title-sorting']) && $wall_options['wall-title-sorting'][0] == 'yes') ||
					(isset($wall_options['wall-date-sorting']) && $wall_options['wall-date-sorting'][0] == 'yes') ||
					(isset($wall_options['wall-comments-sorting']) && $wall_options['wall-comments-sorting'][0] == 'yes'))
				{
					$html .= '<div id="mwall_sortings_container_'.$wall_id.'" class="mwall-sortings-container">';
						$html .= '<div id="mwall_sortings_'.$wall_id.'" class="mwall-sortings">';
							$html .= $this->wall_create_sortings($atts);
						$html .= '</div>';
					$html .= '</div>';
				}

				// Reset button
				if (isset($wall_options['wall-reset-button']) && $wall_options['wall-reset-button'][0] == 'yes')
				{
					$html .= '<div class="mwall-reset-container">';
						$html .= '<div class="mwall-reset">';
							$html .= '<button class="btn-reset" id="mwall_reset_'.$wall_id.'">';
								$html .= '<i class="fa fa-undo"></i>&nbsp;&nbsp;'.__('Reset', 'minitek-wall').'';
							$html .= '</button><div class="mwall-filters-loader"> </div>';
						$html .= '</div>';
					$html .= '</div>';
				}

			$html .= '</div>';
		}

		// Wall display
		$html .= $this->wall_create_items_wrapper($atts);
		
		$html .= '</div>';

		// Items styling
		$custom_css .= $dynamicCss->masonryItemCss($wall_options, $wall_id);

		// Responsive levels
		$wall_responsive_levels = $wall_options['wall-responsive-levels'][0];

		if ($wall_responsive_levels == 'yes')
			$custom_css .= $dynamicCss->getResponsiveCss($wall_options, $wall_id);

		// Add inline css
		wp_add_inline_style( $this->plugin_name.'_custom_style', $custom_css );

		// Javascript variables
		$wall_options['wall-effects'][0] = maybe_unserialize($wall_options['wall-effects'][0]);
		$encoded_options = json_encode($wall_options);
		$source = $wall_options['wall-post-type'][0];
		$mwall_ajaxurl = admin_url( 'admin-ajax.php' );

		// Main script
		$html .= '<script type="text/javascript">
			document.addEventListener("DOMContentLoaded", function() {
				Mwall.initialise(
					'.$encoded_options.', 
					\''.$wall_id.'\',
					\''.$source.'\',
					\''.$mwall_ajaxurl.'\'
				);
			});
		</script>';

		return $html;
	}

	/**
	 * Creates the filters.
	 *
	 * @since     1.0.1
	 */
	public function wall_create_filters($atts) {

		$atts = shortcode_atts(array('id' => ""), $atts, 'mwall');
		$wall_id = $atts['id'];
		$page_number = 1;
		$wall_options = get_post_meta( $wall_id, '', false );
		$wall_filters_mode = 'dynamic';
		$utilities = new MN_Wall_Utilities();

		$cat_array = array();
		$tag_array = array();
		$date_array = array();

		// Dynamic filters
		if ($wall_filters_mode == 'dynamic')
		{
			$queryItems = $this->dataSource->wall_get_items($wall_options, false, $page_number);

			foreach ($queryItems as $key => $item)
			{
				switch ($item->post_type)
				{
					case 'post':
					case 'attachment':
					case 'page':
						if ($wall_options['wall-category-filters'][0] != 'none')
							$post_cats = get_the_terms( $item->ID, 'category' );
						
						if ($wall_options['wall-tag-filters'][0] != 'none')
							$post_tags = get_the_terms( $item->ID, 'post_tag' );

						break;
				}
				
				if (!empty($post_cats))
				{
					foreach ($post_cats as $cat)
					{
						if ($cat->term_id)
							$cat_array[$cat->term_id] = $cat;
						else
							$cat_array[$cat->slug] = $cat;
					}
				}
				
				if (!empty($post_tags))
				{
					foreach ($post_tags as $tag)
					{
						if ($tag->term_id)
							$tag_array[$tag->term_id] = $tag;
						else 
							$tag_array[] = $tag;
					}
				}

				if ($wall_options['wall-date-filters'][0] != 'none')
				{
					if (isset($item->post_date) && $item->post_date)
						$date_array[] = date_i18n( 'Y-m', strtotime($item->post_date) );
				}
			}
		}

		// Ordering
		$ordering = 'name';
		$direction = 'asc';
		$direction = $direction == 'asc' ? SORT_ASC : SORT_DESC;

		// Order Categories
		$cat_keys = array_keys($cat_array); // Store original keys
		$cat_column = array();
		$cat_id = array();

		foreach ($cat_array as $key => $cat)
		{
			if (!isset($cat->$ordering))
				return;

			$cat_column[$key] = $cat->$ordering;
			$cat_id[$key] = $cat->term_id;
		}

		array_multisort(
			$cat_column, $direction, 
			$cat_id, $direction, 
			$cat_array, $cat_keys
		);
		$cat_array = array_combine($cat_keys, $cat_array);

		// Order Tags
		$tag_keys = array_keys($tag_array); // Store original keys
		$tag_column = array();
		$tag_id = array();

		foreach ($tag_array as $key => $tag)
		{
			if (!isset($tag->$ordering))
				return;

			$tag_column[$key] = $tag->$ordering;
			$tag_id[$key] = $tag->term_id;
		}
		
		array_multisort(
			$tag_column, $direction, 
			$tag_id, $direction, 
			$tag_array, $tag_keys
		);
		$tag_array = array_combine($tag_keys, $tag_array);

		// Order Dates 
		$date_array = array_unique($date_array);
		
		if ($direction == SORT_ASC)
			sort($date_array);
		else 
			rsort($date_array);

		// Get filters from file
		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'partials/minitek-wall-public-filters.php' );
		$filters = ob_get_clean();

		return $filters;
	}

	/**
	 * Creates the sortings.
	 *
	 * @since     1.0.1
	 */
	public function wall_create_sortings($atts) {

		$atts = shortcode_atts(array('id' => ""), $atts, 'mwall');
		$wall_id = $atts['id'];
		$wall_options = get_post_meta( $wall_id, '', false );
		$wall_filters_mode = isset($wall_options['wall-filters-mode']) ? $wall_options['wall-filters-mode'][0] : 'dynamic';

		// Get sortings from file
		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'partials/minitek-wall-public-sortings.php' );
		$sortings = ob_get_clean();

		return $sortings;
	}

	/**
	 * Creates the items wrapper.
	 *
	 * @since     1.0.1
	 */
	public function wall_create_items_wrapper($atts) {

		$atts = shortcode_atts(array('id' => ""), $atts, 'mwall');
		$wall_id = $atts['id'];
		$wall_options = get_post_meta( $wall_id, '', false );
		$wall_gutter = (int)$wall_options['wall-gutter'][0];

		// Items wrapper
		$html = '<div id="mwall_items_'.$wall_id.'" class="mwall-items" style="margin: -'.$wall_gutter.'px;">';
			$html .= $this->wall_create_items($atts);
		$html .= '</div>';

		// 'No items' message
		$html .= '<div class="mwall-no-items" style="display: none;">';
			$html .= __('No items found.', $this->plugin_name); 
		$html .= '</div>';

		return $html;
	}

	/**
	 * Creates the items.
	 *
	 * @since     1.0.1
	 */
	public function wall_create_items($atts) {

		$atts = shortcode_atts(array('id' => ""), $atts, 'mwall');
		$wall_id = $atts['id'];
		$page_number = 1;
		$wall_options = get_post_meta( $wall_id, '', false );
		$wall_grid = $wall_options['wall-grid'][0];
		$post_type = $wall_options['wall-post-type'][0];
		$utilities = new MN_Wall_Utilities();

		// Layout
		$wall_gutter = (int)$wall_options['wall-gutter'][0];
		$wall_item_border = $wall_options['wall-item-border'][0];
		$wall_border_size = $wall_options['wall-border-size'][0];
		$wall_border_color = $wall_options['wall-border-color'][0];
		$wall_border_radius = $wall_options['wall-border-radius'][0];

		// Columns
		$wall_columns = $wall_options['wall-columns'][0];
		$masColsper = 100 / $wall_columns;
		$masColsper = number_format((float)$masColsper, 4, '.', '');
		$this->cols = 'width: '.$masColsper.'%;';

		// Images
		$wall_show_images = $wall_options['wall-show-images'][0];
		$wall_image_link = $wall_options['wall-image-link'][0];
		$wall_full_image = $wall_options['wall-full-image'][0];

		// Detail box 
		$wall_title_link = $wall_options['wall-title-link'][0];

		// Detail box - Big
		$this->detailBoxBig = $wall_options['wall-detail-box-big'][0];
		$this->detailBoxPositionBig = $wall_options['wall-detail-box-position-big'][0];
		$this->detailBoxBgColorBig = $wall_options['wall-detail-box-bg-color-big'][0];
		$this->detailBoxOpacityBig = $wall_options['wall-detail-box-opacity-big'][0];
		$this->detailBoxTextColorBig = $wall_options['wall-detail-box-text-color-big'][0];
		$this->detailBoxTitleBig = $wall_options['wall-item-title-big'][0];
		$this->detailBoxIntrotextBig = $wall_options['wall-item-introtext-big'][0];
		$this->detailBoxDateBig = $wall_options['wall-item-date-big'][0];
		$this->detailBoxAuthorBig = $wall_options['wall-item-author-big'][0];
		$this->detailBoxCategoryBig = $wall_options['wall-item-category-big'][0];
		$this->detailBoxTagsBig = $wall_options['wall-item-tags-big'][0];
		$this->detailBoxPriceBig = $wall_options['wall-item-price-big'][0];
		$this->detailBoxCommentsBig = $wall_options['wall-item-comments-count-big'][0];
		$this->detailBoxReadmoreBig = $wall_options['wall-item-readmore-big'][0];

		// Detail box - Landscape
		$this->detailBoxLscape = $wall_options['wall-detail-box-landscape'][0];
		$this->detailBoxPositionLscape = $wall_options['wall-detail-box-position-landscape'][0];
		$this->detailBoxBgColorLscape = $wall_options['wall-detail-box-bg-color-landscape'][0];
		$this->detailBoxOpacityLscape = $wall_options['wall-detail-box-opacity-landscape'][0];
		$this->detailBoxTextColorLscape = $wall_options['wall-detail-box-text-color-landscape'][0];
		$this->detailBoxTitleLscape = $wall_options['wall-item-title-landscape'][0];
		$this->detailBoxIntrotextLscape = $wall_options['wall-item-introtext-landscape'][0];
		$this->detailBoxDateLscape = $wall_options['wall-item-date-landscape'][0];
		$this->detailBoxAuthorLscape = $wall_options['wall-item-author-landscape'][0];
		$this->detailBoxCategoryLscape = $wall_options['wall-item-category-landscape'][0];
		$this->detailBoxTagsLscape = $wall_options['wall-item-tags-landscape'][0];
		$this->detailBoxPriceLscape = $wall_options['wall-item-price-landscape'][0];
		$this->detailBoxCommentsLscape = $wall_options['wall-item-comments-count-landscape'][0];
		$this->detailBoxReadmoreLscape = $wall_options['wall-item-readmore-landscape'][0];

		// Detail box - Portrait
		$this->detailBoxPortrait = $wall_options['wall-detail-box-portrait'][0];
		$this->detailBoxPositionPortrait = $wall_options['wall-detail-box-position-portrait'][0];
		$this->detailBoxBgColorPortrait = $wall_options['wall-detail-box-bg-color-portrait'][0];
		$this->detailBoxOpacityPortrait = $wall_options['wall-detail-box-opacity-portrait'][0];
		$this->detailBoxTextColorPortrait = $wall_options['wall-detail-box-text-color-portrait'][0];
		$this->detailBoxTitlePortrait = $wall_options['wall-item-title-portrait'][0];
		$this->detailBoxIntrotextPortrait = $wall_options['wall-item-introtext-portrait'][0];
		$this->detailBoxDatePortrait = $wall_options['wall-item-date-portrait'][0];
		$this->detailBoxAuthorPortrait = $wall_options['wall-item-author-portrait'][0];
		$this->detailBoxCategoryPortrait = $wall_options['wall-item-category-portrait'][0];
		$this->detailBoxTagsPortrait = $wall_options['wall-item-tags-portrait'][0];
		$this->detailBoxPricePortrait = $wall_options['wall-item-price-portrait'][0];
		$this->detailBoxCommentsPortrait = $wall_options['wall-item-comments-count-portrait'][0];
		$this->detailBoxReadmorePortrait = $wall_options['wall-item-readmore-portrait'][0];

		// Detail box - Small
		$this->detailBoxSmall = $wall_options['wall-detail-box-small'][0];
		$this->detailBoxPositionSmall = $wall_options['wall-detail-box-position-small'][0];
		$this->detailBoxBgColorSmall = $wall_options['wall-detail-box-bg-color-small'][0];
		$this->detailBoxOpacitySmall = $wall_options['wall-detail-box-opacity-small'][0];
		$this->detailBoxTextColorSmall = $wall_options['wall-detail-box-text-color-small'][0];
		$this->detailBoxTitleSmall = $wall_options['wall-item-title-small'][0];
		$this->detailBoxIntrotextSmall = $wall_options['wall-item-introtext-small'][0];
		$this->detailBoxDateSmall = $wall_options['wall-item-date-small'][0];
		$this->detailBoxAuthorSmall = $wall_options['wall-item-author-small'][0];
		$this->detailBoxCategorySmall = $wall_options['wall-item-category-small'][0];
		$this->detailBoxTagsSmall = $wall_options['wall-item-tags-small'][0];
		$this->detailBoxPriceSmall = $wall_options['wall-item-price-small'][0];
		$this->detailBoxCommentsSmall = $wall_options['wall-item-comments-count-small'][0];
		$this->detailBoxReadmoreSmall = $wall_options['wall-item-readmore-small'][0];

		// Detail box - Columns
		$this->detailBoxColumns = $wall_options['wall-detail-box-columns'][0];
		$this->detailBoxPositionColumns = $wall_options['wall-detail-box-position-columns'][0];
		$this->detailBoxBgColorColumns = $wall_options['wall-detail-box-bg-color-columns'][0];
		$this->detailBoxOpacityColumns = $wall_options['wall-detail-box-opacity-columns'][0];
		$this->detailBoxTextColorColumns = $wall_options['wall-detail-box-text-color-columns'][0];
		$this->detailBoxTitleColumns = $wall_options['wall-item-title-columns'][0];
		$this->detailBoxIntrotextColumns = $wall_options['wall-item-introtext-columns'][0];
		$this->detailBoxDateColumns = $wall_options['wall-item-date-columns'][0];
		$this->detailBoxAuthorColumns = $wall_options['wall-item-author-columns'][0];
		$this->detailBoxCategoryColumns = $wall_options['wall-item-category-columns'][0];
		$this->detailBoxTagsColumns = $wall_options['wall-item-tags-columns'][0];
		$this->detailBoxPriceColumns = $wall_options['wall-item-price-columns'][0];
		$this->detailBoxCommentsColumns = $wall_options['wall-item-comments-count-columns'][0];
		$this->detailBoxReadmoreColumns = $wall_options['wall-item-readmore-columns'][0];

		// Detail box overall vars
		$this->detailBoxAll = true;
		$this->detailBoxTitleAll = true;
		$this->detailBoxIntrotextAll = true;
		$this->detailBoxDateAll = true;
		$this->detailBoxAuthorAll = true;
		$this->detailBoxCategoryAll = true;
		$this->detailBoxTagsAll = true;
		$this->detailBoxPriceAll = true;
		$this->detailBoxCommentsAll = true;
		$this->detailBoxReadmoreAll = true;

		// Masonry grids
		if ((int)$wall_grid != '98' && (int)$wall_grid != '99')
		{
			if ($this->detailBoxBig == 'no' && $this->detailBoxLscape == 'no' && $this->detailBoxPortrait == 'no' && $this->detailBoxSmall == 'no' && $this->detailBoxColumns == 'no')
				$this->detailBoxAll = false;
			
			if ($this->detailBoxTitleBig == 'no' && $this->detailBoxTitleLscape == 'no' && $this->detailBoxTitlePortrait == 'no' && $this->detailBoxTitleSmall == 'no' && $this->detailBoxTitleColumns == 'no')
				$this->detailBoxTitleAll = false;
			
			if ($this->detailBoxIntrotextBig == 'no' && $this->detailBoxIntrotextLscape == 'no' && $this->detailBoxIntrotextPortrait == 'no' && $this->detailBoxIntrotextSmall == 'no' && $this->detailBoxIntrotextColumns == 'no')
				$this->detailBoxIntrotextAll = false;

			if ($this->detailBoxDateBig == 'no' && $this->detailBoxDateLscape == 'no' && $this->detailBoxDatePortrait == 'no' && $this->detailBoxDateSmall == 'no' && $this->detailBoxDateColumns == 'no')
				$this->detailBoxDateAll = false;

			if ($this->detailBoxAuthorBig == 'no' && $this->detailBoxAuthorLscape == 'no' && $this->detailBoxAuthorPortrait == 'no' && $this->detailBoxAuthorSmall == 'no' && $this->detailBoxAuthorColumns == 'no')
				$this->detailBoxAuthorAll = false;

			if ($this->detailBoxCategoryBig == 'no' && $this->detailBoxCategoryLscape == 'no' && $this->detailBoxCategoryPortrait == 'no' && $this->detailBoxCategorySmall == 'no' && $this->detailBoxCategoryColumns == 'no')
				$this->detailBoxCategoryAll = false;

			if ($this->detailBoxTagsBig == 'no' && $this->detailBoxTagsLscape == 'no' && $this->detailBoxTagsPortrait == 'no' && $this->detailBoxTagsSmall == 'no' && $this->detailBoxTagsColumns == 'no')
				$this->detailBoxTagsAll = false;

			if ($this->detailBoxPriceBig == 'no' && $this->detailBoxPriceLscape == 'no' && $this->detailBoxPricePortrait == 'no' && $this->detailBoxPriceSmall == 'no' && $this->detailBoxPriceColumns == 'no')
				$this->detailBoxPriceAll = false;

			if ($this->detailBoxCommentsBig == 'no' && $this->detailBoxCommentsLscape == 'no' && $this->detailBoxCommentsPortrait == 'no' && $this->detailBoxCommentsSmall == 'no' && $this->detailBoxCommentsColumns == 'no')
				$this->detailBoxCommentsAll = false;

			if ($this->detailBoxReadmoreBig == 'no' && $this->detailBoxReadmoreLscape == 'no' && $this->detailBoxReadmorePortrait == 'no' && $this->detailBoxReadmoreSmall == 'no' && $this->detailBoxReadmoreColumns == 'no')
				$this->detailBoxReadmoreAll = false;
		}
		// Columns / Vertical list grids
		else
		{
			if ($this->detailBoxColumns == 'no')
				$this->detailBoxAll = false;

			if ($this->detailBoxTitleColumns == 'no')
				$this->detailBoxTitleAll = false;

			if ($this->detailBoxIntrotextColumns == 'no')
				$this->detailBoxIntrotextAll = false;

			if ($this->detailBoxDateColumns == 'no')
				$this->detailBoxDateAll = false;

			if ($this->detailBoxAuthorColumns == 'no')
				$this->detailBoxAuthorAll = false;

			if ($this->detailBoxCategoryColumns == 'no')
				$this->detailBoxCategoryAll = false;

			if ($this->detailBoxTagsColumns == 'no')
				$this->detailBoxTagsAll = false;

			if ($this->detailBoxPriceColumns == 'no')
				$this->detailBoxPriceAll = false;

			if ($this->detailBoxCommentsColumns == 'no')
				$this->detailBoxCommentsAll = false;

			if ($this->detailBoxReadmoreColumns == 'no')
				$this->detailBoxReadmoreAll = false;
		}

		// Hover box
		$wall_hover_box = $wall_options['wall-hover-box'][0];
		$wall_hover_bg_color = $wall_options['wall-hover-bg-color'][0];
		$wall_hover_opacity = $wall_options['wall-hover-opacity'][0];
		$wall_hover_text_color = $wall_options['wall-hover-text-color'][0];
		$wall_hover_effect = $wall_options['wall-hover-effect'][0];
		$wall_hover_speed = $wall_options['wall-hover-speed'][0];
		$wall_hover_easing = $wall_options['wall-hover-easing'][0];
		$wall_hover_title = $wall_options['wall-hover-title'][0];
		$wall_hover_introtext = $wall_options['wall-hover-introtext'][0];
		$wall_hover_date = $wall_options['wall-hover-date'][0];
		$wall_hover_category = $wall_options['wall-hover-category'][0];
		$wall_hover_tags = $wall_options['wall-hover-tags'][0];
		$wall_hover_author = $wall_options['wall-hover-author'][0];
		$wall_hover_price = $wall_options['wall-hover-price'][0];
		$wall_hover_comments = $wall_options['wall-hover-comments'][0];
		$wall_hover_link = $wall_options['wall-hover-link'][0];
		$wall_hover_lightbox = isset($wall_options['wall-hover-lightbox']) ? $wall_options['wall-hover-lightbox'][0] : 'no';

		// Hover box background
		$hoverBackgroundColor = $utilities->hex2RGB($wall_hover_bg_color, true);
		$hoverBackgroundOpacity = number_format((float)$wall_hover_opacity, 2, '.', '');

		// Hover effects
		$hoverOffset = '';
		$hoverClass = '';
		$flipBase = '';
		$perspective = '';
		$flipClass = '';
		$hoverEffectClass = '';

		if ($wall_hover_effect == 'no')
			$hoverClass = 'hoverShow';
		else if ($wall_hover_effect == '1')
			$hoverClass = 'hoverFadeIn';
		else if ($wall_hover_effect == '2')
		{
			$flipBase = 'flipBase';
			$perspective = 'perspective';
			$flipClass = 'flipY';
		}
		else if ($wall_hover_effect == '3')
		{
			$flipBase = 'flipBase';
			$perspective = 'perspective';
			$flipClass = 'flipX';
		}
		else if ($wall_hover_effect == '4') {
			$hoverOffset = 'rightOffset';
			$hoverClass = 'slideInRight';
		}
		else if ($wall_hover_effect == '5')
		{
			$hoverOffset = 'leftOffset';
			$hoverClass = 'slideInLeft';
		}
		else if ($wall_hover_effect == '6') 
		{
			$hoverOffset = 'topOffset';
			$hoverClass = 'slideInTop';
		}
		else if ($wall_hover_effect == '7')
		{
			$hoverOffset = 'bottomOffset';
			$hoverClass = 'slideInBottom';
		}
		else if ($wall_hover_effect == '8')
		{
			$hoverOffset = 'zoomOffset';
			$hoverClass = 'zoomIn';
		}

		// Transition styles
		$animated = '';

		if ($wall_hover_effect != 'no' && $wall_hover_effect != '2' && $wall_hover_effect != '3')
		{
			$animated = '
			transition: all '.$wall_hover_speed.'s '.$wall_hover_easing.' 0s;
			-webkit-transition: all '.$wall_hover_speed.'s '.$wall_hover_easing.' 0s;
			-o-transition: all '.$wall_hover_speed.'s '.$wall_hover_easing.' 0s;
			-ms-transition: all '.$wall_hover_speed.'s '.$wall_hover_easing.' 0s;
			';
		}

		$animated_flip = '';

		if ($wall_hover_effect == '2' || $wall_hover_effect == '3')
		{
			$animated_flip = '
			transition: all '.$wall_hover_speed.'s '.$wall_hover_easing.' 0s;
			-webkit-transition: all '.$wall_hover_speed.'s '.$wall_hover_easing.' 0s;
			-o-transition: all '.$wall_hover_speed.'s '.$wall_hover_easing.' 0s;
			-ms-transition: all '.$wall_hover_speed.'s '.$wall_hover_easing.' 0s;
			';
		}

		// Filters data 
		$data = array();
		
		if (isset($_POST['data']))
		{
			$data = stripslashes($_POST['data']);
			$data = json_decode($data);
		}
		
		// Get items
		$queryItems = $this->dataSource->wall_get_items($wall_options, false, $page_number, $data);
		
		if (!$queryItems)
			return;

		// Format items
		$items = $this->dataSource->wall_format_items($queryItems, $wall_options, false, $wall_id);

		// Get grid from file
		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'partials/minitek-wall-public-items.php' );
		$items = ob_get_clean();

		return $items;
	}

	/**
	 * Constructs columns grid item options.
	 *
	 * @since     1.0.1
	 */
	public function getColumnsItemOptions() {

		$utilities = new MN_Wall_Utilities();

		$options = array(
			"db_class" => "",
			"db_position_class" => "",
			"db_bg_class" => "",
			"db_bg_opacity_class" => "",
			"title_class" => "",
			"introtext_class" => "",
			"date_class" => "",
			"category_class" => "",
			"tags_class" => "",
			"author_class" => "",
			"price_class" => "",
			"comments_class" => "",
			"readmore_class" => ""
		);

		$options['db_bg_class'] = $utilities->hex2RGB($this->detailBoxBgColorColumns, true);
		$options['db_bg_opacity_class'] = number_format((float)$this->detailBoxOpacityColumns, 2, '.', '');
		$options['db_position_class'] = 'content-'.$this->detailBoxPositionColumns;

		if ($this->detailBoxColumns == 'no')
			$options['db_class'] = 'db-hidden';

		if ($this->detailBoxTitleColumns == 'no')
			$options['title_class'] = 'title-hidden';

		if ($this->detailBoxIntrotextColumns == 'no')
			$options['introtext_class'] = 'introtext-hidden';

		if ($this->detailBoxDateColumns == 'no')
			$options['date_class'] = 'date-hidden';

		if ($this->detailBoxCategoryColumns == 'no')
			$options['category_class'] = 'category-hidden';

		if ($this->detailBoxTagsColumns == 'no')
			$options['tags_class'] = 'tags-hidden';

		if ($this->detailBoxAuthorColumns == 'no')
			$options['author_class'] = 'author-hidden';

		if ($this->detailBoxPriceColumns == 'no')
			$options['price_class'] = 'price-hidden';

		if ($this->detailBoxCommentsColumns == 'no')
			$options['comments_class'] = 'comments-hidden';

		if ($this->detailBoxReadmoreColumns == 'no')
			$options['readmore_class'] = 'readmore-hidden';

		return $options;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since     1.0.1
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/minitek-wall-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since     1.0.1
	 */
	public function enqueue_scripts() {

		// Spinner
		wp_enqueue_script( $this->plugin_name.'_spin', plugin_dir_url( __FILE__ ) . 'js/spin.min.js', array( 'jquery' ), $this->version, false );

		// Isotope
		wp_enqueue_script( $this->plugin_name.'_isotope', plugin_dir_url( __FILE__ ) . 'js/isotope.pkgd.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'_packery', plugin_dir_url( __FILE__ ) . 'js/packery-mode.pkgd.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'_imagesloaded', plugin_dir_url( __FILE__ ) . 'js/imagesloaded.pkgd.min.js', array( 'jquery' ), $this->version, false );

		// Main script
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/minitekwall.js', array( 'jquery' ), $this->version, false );

	}

}
