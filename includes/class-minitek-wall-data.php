<?php

/**
 * Data source class
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/includes
 */

class MN_Wall_Data {

	/**
	 * The ID of this plugin.
	 *
	 * @since     1.1.0
	 * @access    private
	 * @var       string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * Constructor
	 */
	public function __construct($plugin_name) {

		$this->plugin_name = $plugin_name;

	} // __construct()

	/**
	 * Format item options.
	 *
	 * @since    1.1.0
	 */
	public function wall_format_items($queryItems, $wall_options, $ajax = false, $wall_id = 0) 
	{
		$page = isset($_POST['wall_page']) ? (int)$_POST['wall_page'] : 1;
		$utilities = new MN_Wall_Utilities();
		$dynamicCss = new MN_Wall_CSS();
		$post_type = $wall_options['wall-post-type'][0];
		$wall_grid = $wall_options['wall-grid'][0];
		$wall_title_limit = (int)$wall_options['wall-title-limit'][0];
		$wall_strip_html = $wall_options['wall-strip-html'][0];
		$wall_introtext_limit = $wall_options['wall-introtext-limit'][0];
		$wall_date_format = $wall_options['wall-date-format'][0];
		$wall_hover_title_limit = $wall_options['wall-hover-title-limit'][0];
		$wall_hover_strip_html = $wall_options['wall-hover-strip-html'][0];
		$wall_hover_introtext_limit = $wall_options['wall-hover-introtext-limit'][0];
		$wall_hover_date_format = $wall_options['wall-hover-date-format'][0];
		$wall_image_type = $wall_options['wall-image-type'][0];
		$wall_crop_images = $wall_options['wall-crop-images'][0];
		$wall_image_width = $wall_options['wall-image-width'][0];
		$wall_image_height = $wall_options['wall-image-height'][0];

		if ($wall_grid === '999c') // custom grid
		{
			$custom_grid_id = isset($wall_options['wall-custom-grid'][0]) ? $wall_options['wall-custom-grid'][0] : false;
			$grid_elements = json_decode(get_post_meta( $custom_grid_id, 'grid-elements', true ), false);

			// Init custom grid widths
			if (!$ajax && !empty($grid_elements))
			{
				$grid_columns = get_post_meta( $custom_grid_id, 'grid-columns', true );
				$custom_css = $dynamicCss->initCustomGridWidths($wall_options, $grid_elements, $grid_columns, $wall_id);
				wp_add_inline_style( $this->plugin_name.'_custom_style', $custom_css );
			}

			// Get number of items in custom grid
			$grid = isset($grid_elements) ? count($grid_elements) : false;
			$grid_raw = $wall_grid;

			if (!$grid)
			{
				echo __('Grid not found or does not contain any items.', 'minitek-wall');

				return false;
			}
		}
		else 
		{
			$custom_grid_id = false;
			$grid = (int) $wall_grid;
			$grid_raw = $wall_grid;	
		}

		foreach ($queryItems as $key => $item) 
		{
			// Item index
			if ($ajax)
			{
				$startLimit = (int)$wall_options['wall-initial-items'][0];
				$pageLimit = (int)$wall_options['wall-items-per-page'][0];
				$index = $startLimit + (($page - 2) * $pageLimit) + ($key + 1);
			}
			else
				$index = $key + 1;

			$item->rawIndex = $index;

			if ($index > $grid)
				$item->itemIndex = $utilities->recurseMasItemIndex($index, $grid);
			else
				$item->itemIndex = $index;

			// Item size
			$item->itemSize = $utilities->getMasonryItemSize($grid_raw, $item->itemIndex, $custom_grid_id);

			// Trim title
			$item->short_title = wp_trim_words( $item->post_title, (int)$wall_title_limit);
			$item->hover_title = wp_trim_words( $item->post_title, (int)$wall_hover_title_limit);

			// Trim post content
			if (isset($item->post_content)) 
			{
				if ($wall_strip_html == 'yes')
					$item->post_introtext = wp_trim_words( $item->post_content, $wall_introtext_limit);
				else
					$item->post_introtext = $item->post_content;

				if ($wall_hover_strip_html == 'yes')
					$item->hover_introtext = wp_trim_words( $item->post_content, $wall_hover_introtext_limit);
				else
					$item->hover_introtext = $item->post_content;
			}

			// Format date
			if ($post_type == 'folder' || $post_type == 'rss')
			{
				$item->formatted_date = date_i18n( $wall_date_format, strtotime($item->post_date) );
				$item->hover_formatted_date = date_i18n( $wall_hover_date_format, strtotime($item->post_date) );
			}
			else 
			{
				$item->formatted_date = get_the_date( $wall_date_format, $item->ID );
				$item->hover_formatted_date = get_the_date( $wall_hover_date_format, $item->ID );
			}

			// Format comments count
			if (isset($item->comment_count))
			{
				if ($item->comment_count > 1)
					$item->formatted_comments = $item->comment_count.' <span>'.__( 'comments', 'minitek-wall' ).'</span>';
				else if ($item->comment_count == 1)
					$item->formatted_comments = $item->comment_count.' <span>'.__( 'comment', 'minitek-wall' ).'</span>';
				else
					$item->formatted_comments = '<span>'.__( 'Leave a comment', 'minitek-wall' ).'</span>';
			}
			
			// Switch post type
			switch ($post_type)
			{
				case 'post':
				case 'specific':
					$item->post_categories_raw = get_the_terms( $item->ID, 'category' );
					$item->post_tags_raw = get_the_terms( $item->ID, 'post_tag' );
					$item->link = get_permalink($item->ID);
					$item->author_link = get_author_posts_url($item->post_author);

					break;

				case 'attachment':
					$item->post_categories_raw = get_the_terms( $item->ID, 'category' );
					$item->post_tags_raw = get_the_terms( $item->ID, 'post_tag' );
					$item->link = false;
					$item->author_link = get_author_posts_url($item->post_author);

					break;

				case 'page':
					$item->post_categories_raw = get_the_terms( $item->ID, 'category' );
					$item->post_tags_raw = get_the_terms( $item->ID, 'post_tag' );
					$item->link = get_permalink($item->ID);
					$item->author_link = get_author_posts_url($item->post_author);

					break;

				default:

					break;
			}
			
			// Item image
			if ($wall_image_type == 'featured') // Featured image
			{
				if ($post_type == 'attachment')
				{
					$featured_image = wp_get_attachment_image_src( $item->ID, 'full' );
					$item->post_image = isset($featured_image[0]) ? $featured_image[0] : false;
				}
				else if ($post_type != 'rss')
				{
					$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'full' );
					$item->post_image = isset($featured_image[0]) ? $featured_image[0] : false;
				}

				if (empty($item->post_image))
					$item->post_image = $utilities->wall_post_inline_image($item->post_content);
			}
			else if ($wall_image_type == 'inline') // Inline image
			{
				if ($post_type == 'attachment')
					$item->post_image = wp_get_attachment_image_src( $item->ID, 'full' );
				else
					$item->post_image = $utilities->wall_post_inline_image($item->post_content);
			}
			
			if (empty($item->post_image) && $wall_options['wall-fallback-image'][0])
				$item->post_image = $wall_options['wall-fallback-image'][0];

			// Crop images
			if ($item->post_image && $wall_crop_images == 'yes')
			{
				$image = wp_get_image_editor( $item->post_image );

				if ( ! is_wp_error( $image ) )
				{
					// Check if resized image exists before resizing
					$image_type = wp_check_filetype( $item->post_image );
					$image_name = substr($item->post_image, strrpos($item->post_image, '/') + 1);
					$image_name = substr($image_name, 0, -4);
				
					if (!file_exists(MW__PLUGIN_DIR . 'resized/'.$image_name.'-'.(int)$wall_image_width.'x'.(int)$wall_image_height.'.'.$image_type['ext']))
					{
						// Resize & save image
						$image->resize( (int)$wall_image_width, (int)$wall_image_height, true );
						$filename = $image->generate_filename( (int)$wall_image_width.'x'.(int)$wall_image_height, MW__PLUGIN_DIR . 'resized/', NULL );
				
						if ($saved = $image->save( $filename ))
							$item->post_image = MW__PLUGIN_URL . 'resized/'.$saved['file'];
					}
					else
						$item->post_image = MW__PLUGIN_URL . 'resized/'.$image_name.'-'.(int)$wall_image_width.'x'.(int)$wall_image_height.'.'.$image_type['ext'];
				}
			}

			// Categories / Tags / Date classes
			$item->cat_classes = '';
			$item->tag_classes = '';
			$item->date_classes = '';

			// Categories
			if (isset($item->post_categories_raw) && $item->post_categories_raw)
			{
				$item->post_categories = '';
		
				foreach ($item->post_categories_raw as $key => $cat)
				{						
					if ($post_type == 'ci')
						$cat_link = get_term_meta($cat->term_id, 'mci-category-url', true);
					else 
						$cat_link = get_category_link( $cat->term_id );

					if ($cat_link) 
						$item->post_categories .= '<a href="'.$cat_link.'">'.$cat->name.'</a>';
					else 
						$item->post_categories .= $cat->name;
					
					if ($key < (count($item->post_categories_raw) - 1))
						$item->post_categories .= ', ';

					$item->cat_classes .= 'cat-'.$cat->slug.' ';
				}
			}

			// Tags
			if (isset($item->post_tags_raw) && $item->post_tags_raw)
			{
				$item->post_tags = '';

				foreach ($item->post_tags_raw as $key => $tag)
				{
					if ($post_type == 'ci')
						$tag_link = get_term_meta($tag->term_id, 'mci-tag-url', true);
					else 
						$tag_link = get_tag_link( $tag->term_id );

					if ($tag_link) 
						$item->post_tags .= '<a href="'.$tag_link.'">'.$tag->name.'</a>';
					else 
						$item->post_tags .= $tag->name;
					
					if ($key < (count($item->post_tags_raw) - 1))
						$item->post_tags .= ', ';

					$item->tag_classes .= 'tag-'.$tag->slug.' ';
				}
			}

			// Date 
			$item->date_classes .= 'date-'.date_i18n( 'Y-m', strtotime($item->post_date) ).' ';
		}

		return $queryItems;
	}

	/**
	 * Get items.
	 *
	 * @since    1.1.0
	 */
	public function wall_get_items($wall_options, $ajax = false, $page_number = 1, $filters = false) {

		$post_type = $wall_options['wall-post-type'][0];
		
		$items = $this->wall_query_posts($wall_options, $ajax, $page_number, $filters);

		return $items;

	}

	/**
	 * Count total items.
	 *
	 * @since    1.1.0
	 */
	public function wall_count_items($wall_options) {

		$post_type = $wall_options['wall-post-type'][0];

		$count = $this->wall_count_posts($wall_options);

		return $count;

	}

	/**
	 * Query posts.
	 *
	 * @since    1.0.1
	 */
	public function wall_query_posts($wall_options, $ajax = false, $page_number = 1, $filters = false) {
		
		$cat = '';
		$category__in = '';
		$category__not_in = '';
		$tag__in = '';
		$tag__not_in = '';
		$post_status = 'publish';

		$post_type = $wall_options['wall-post-type'][0];
		$wall_offset = $wall_options['wall-offset'][0];
		$wall_initial_items = $wall_options['wall-initial-items'][0];
		$wall_items_per_page = isset($wall_options['wall-items-per-page']) ? $wall_options['wall-items-per-page'][0] : 3;
		$wall_additional_pages = isset($wall_options['wall-additional-pages']) ? $wall_options['wall-additional-pages'][0] : 3;

		// On page load
		if (!$ajax)
		{
			$posts_per_page = (int)$wall_initial_items;

			// All filters (:same function is used to create filters)
			if ($filters)
			{
				$posts_per_page = (int)$wall_initial_items + (int)$wall_items_per_page * (int)$wall_additional_pages;
			}

			// Offset
			if ($post_type == 'specific') 
			{
				$offset = 0;
			}
			else 
			{
				$offset = (int)$wall_offset;
			}
		}
		// On ajax
		else
		{
			// Get page from $_POST
			$paged = (int)$page_number;

			$posts_per_page = (int)$wall_items_per_page;

			// Offset
			if ($post_type == 'specific')
			{
				$offset = (int)$wall_initial_items + (($paged - 2) * $posts_per_page);
			}
			else 
			{
				$offset = (int)$wall_offset + (int)$wall_initial_items + (($paged - 2) * $posts_per_page);
			}

			// Check for allowed additional pages
			if (($paged > ((int)$wall_additional_pages) + 1) && $wall_additional_pages != '-1')
			{
				return false;
			}
		}

		// Options - Authors
		$wall_author_filtering_type = $wall_options['wall-author-filtering-type'][0];
		$wall_authors = $wall_options['wall-authors'][0];
		$wall_authors = maybe_unserialize($wall_authors);

		if (empty($wall_authors))
		{
			$wall_authors = '';
		}

		if ($wall_author_filtering_type == 'inclusive')
		{
			$author__in = $wall_authors;
			$author__not_in = '';
		}
		else
		{
			$author__not_in = $wall_authors;
			$author__in = '';
		}

		// Options - General
		$wall_exclude_posts = $wall_options['wall-exclude-posts'][0];

		if (preg_match('/^[0-9,]+$/i', $wall_exclude_posts))
		{
			$excluded_posts = trim($wall_exclude_posts, ',');
			$excluded_posts = explode(',', $excluded_posts);
		}
		else
		{
			$excluded_posts = '';
		}

		if (!$excluded_posts)
		{
			$excluded_posts = '';
		}

		$wall_keywords = $wall_options['wall-keywords'][0];
		$wall_keywords = trim($wall_keywords, ' ');


		$wall_posts_ordering = $wall_options['wall-posts-ordering'][0];

		// Add second ordering option (date) - in case first ordering option is the same
		if ($wall_posts_ordering != 'date')
		{
			$wall_posts_ordering = $wall_posts_ordering.' date';
		}

		$wall_posts_ordering_direction = $wall_options['wall-posts-ordering-direction'][0];

		// Switch post types
		switch ($post_type)
		{
			case 'post':

				// Options - Categories
				$wall_category_filtering_type = $wall_options['wall-category-filtering-type'][0];
				$wall_include_children = $wall_options['wall-include-children'][0];

				$wall_categories = $wall_options['wall-categories'][0];
				$wall_categories = maybe_unserialize($wall_categories);

				if (empty($wall_categories))
				{
					$wall_categories = '';
				}

				// Include children
				if ($wall_include_children == 'yes')
				{
					// Inclusive
					if ($wall_category_filtering_type == 'inclusive')
					{
						// Create string of comma separated ids
						$cat = '';

						if (!empty($wall_categories))
						{
							$cat = implode(',', $wall_categories);
						}

						$category__in = '';
						$category__not_in = '';
					}
					// Exclusive
					else
					{
						// Create string of comma separated ids with hyphens
						$hyphen_categories = array();

						foreach($wall_categories as $catid)
						{
							$hyphen_categories[] = '-'.$catid;
						}
						
						$cat = implode(',', $hyphen_categories);
						$category__in = '';
						$category__not_in = '';
					}
				}
				// Do not include children
				else
				{
					// Inclusive
					if ($wall_category_filtering_type == 'inclusive')
					{
						$cat = '';
						$category__in = $wall_categories;
						$category__not_in = '';
					}
					// Exclusive
					else
					{
						$cat = '';
						$category__in = '';
						$category__not_in = $wall_categories;
					}
				}

				// Options - Tags
				$wall_tag_filtering_type = $wall_options['wall-tag-filtering-type'][0];
				$wall_tags = $wall_options['wall-tags'][0];
				$wall_tags = maybe_unserialize($wall_tags);
				
				if (empty($wall_tags))
				{
					$wall_tags = '';
				}

				if ($wall_tag_filtering_type == 'inclusive')
				{
					$tag__in = $wall_tags;
					$tag__not_in = '';
				}
				else
				{
					$tag__not_in = $wall_tags;
					$tag__in = '';
				}

				break;

			case 'attachment':

				$post_status = 'any';

				break;

			case 'page':

				break;

			case 'specific':

				break;

			default:

				break;

		}

		if ($post_type == 'specific')
		{
			// Options - Specific posts
			$wall_include_posts = $wall_options['wall-include-posts'][0];

			if (preg_match('/^[0-9,]+$/i', $wall_include_posts))
			{
				$included_posts = trim($wall_include_posts, ',');
				$included_posts = explode(',', $included_posts);
			}
			else
			{
				$included_posts = '';
			}

			$included_posts = $included_posts ? $included_posts : '-1';

			$args = array(
				'post__in' => $included_posts,
				'ignore_sticky_posts' => true,
				'has_password' => null,
				'post_type' => 'any',
				'post_status' => array('publish', 'any'),
				'posts_per_page' => $posts_per_page,
				'offset' => $offset,
				'order' => $wall_posts_ordering_direction,
				'orderby' => $wall_posts_ordering
			);
		}
		else 
		{
			$args = array(
				'author__in' => $author__in,
				'author__not_in' => $author__not_in,
				'category__in' => $category__in,
				'category__not_in' => $category__not_in,
				'category' => $cat,
				'tag__in' => $tag__in,
				'tag__not_in' => $tag__not_in,
				's' => $wall_keywords,
				'post__not_in' => $excluded_posts,
				'ignore_sticky_posts' => true,
				'has_password' => null,
				'post_type' => $post_type,
				'post_status' => $post_status,
				'posts_per_page' => $posts_per_page,
				'offset' => $offset,
				'order' => $wall_posts_ordering_direction,
				'orderby' => $wall_posts_ordering
			);
		}

		$posts_array = get_posts( $args );
	
		return $posts_array;

	}

	/**
	 * Count total posts.
	 *
	 * @since    1.0.1
	 */
	public function wall_count_posts($wall_options) {

		$cat = '';
		$category__in = '';
		$category__not_in = '';
		$tag__in = '';
		$tag__not_in = '';

		$post_type = $wall_options['wall-post-type'][0];
		$post_status = 'publish';

		// Options - Authors
		$wall_author_filtering_type = $wall_options['wall-author-filtering-type'][0];
		$wall_authors = $wall_options['wall-authors'][0];
		$wall_authors = maybe_unserialize($wall_authors);

		if (empty($wall_authors))
		{
			$wall_authors = '';
		}

		if ($wall_author_filtering_type == 'inclusive')
		{
			$author__in = $wall_authors;
			$author__not_in = '';
		}
		else
		{
			$author__not_in = $wall_authors;
			$author__in = '';
		}

		// Options - General
		$wall_exclude_posts = $wall_options['wall-exclude-posts'][0];

		if (preg_match('/^[0-9,]+$/i', $wall_exclude_posts))
		{
			$excluded_posts = trim($wall_exclude_posts, ',');
			$excluded_posts = explode(',', $excluded_posts);
		}
		else
		{
			$excluded_posts = '';
		}

		if (!$excluded_posts)
		{
			$excluded_posts = '';
		}

		$wall_keywords = $wall_options['wall-keywords'][0];
		$wall_keywords = trim($wall_keywords, ' ');
		$wall_posts_ordering = $wall_options['wall-posts-ordering'][0];

		// Add second ordering option (date) - in case first ordering option is the same
		if ($wall_posts_ordering != 'date')
		{
			$wall_posts_ordering = $wall_posts_ordering.' date';
		}

		$wall_posts_ordering_direction = $wall_options['wall-posts-ordering-direction'][0];

		// Switch post types
		switch ($post_type)
		{
			case 'post':

				// Options - Categories
				$wall_category_filtering_type = $wall_options['wall-category-filtering-type'][0];
				$wall_include_children = $wall_options['wall-include-children'][0];

				$wall_categories = $wall_options['wall-categories'][0];
				$wall_categories = maybe_unserialize($wall_categories);

				if (empty($wall_categories))
				{
					$wall_categories = '';
				}

				// Include children
				if ($wall_include_children == 'yes')
				{
					// Inclusive
					if ($wall_category_filtering_type == 'inclusive')
					{
						// Create string of comma separated ids
						$cat = '';

						if (!empty($wall_categories))
						{
							$cat = implode(',', $wall_categories);
						}

						$category__in = '';
						$category__not_in = '';
					}
					// Exclusive
					else
					{
						// Create string of comma separated ids with hyphens
						$hyphen_categories = array();

						foreach($wall_categories as $catid)
						{
							$hyphen_categories[] = '-'.$catid;
						}

						$cat = implode(',', $hyphen_categories);
						$category__in = '';
						$category__not_in = '';
					}
				}
				// Do not include children
				else
				{
					// Inclusive
					if ($wall_category_filtering_type == 'inclusive')
					{
						$cat = '';
						$category__in = $wall_categories;
						$category__not_in = '';
					}
					// Exclusive
					else
					{
						$cat = '';
						$category__in = '';
						$category__not_in = $wall_categories;
					}
				}

				// Options - Tags
				$wall_tag_filtering_type = $wall_options['wall-tag-filtering-type'][0];
				$wall_tags = $wall_options['wall-tags'][0];
				$wall_tags = maybe_unserialize($wall_tags);

				if (empty($wall_tags))
				{
					$wall_tags = '';
				}

				if ($wall_tag_filtering_type == 'inclusive')
				{
					$tag__in = $wall_tags;
					$tag__not_in = '';
				}
				else
				{
					$tag__not_in = $wall_tags;
					$tag__in = '';
				}

				break;

			case 'attachment':

				$post_status = 'any';

				break;

			case 'page':

				break;

			case 'specific':
	
				break;

			default:

				break;
		}

		if ($post_type == 'specific')
		{
			// Options - Specific posts
			$wall_include_posts = $wall_options['wall-include-posts'][0];

			if (preg_match('/^[0-9,]+$/i', $wall_include_posts))
			{
				$included_posts = trim($wall_include_posts, ',');
				$included_posts = explode(',', $included_posts);
			}
			else
			{
				$included_posts = '';
			}

			$included_posts = $included_posts ? $included_posts : '-1';

			$args = array(
				'post__in' => $included_posts,
				'ignore_sticky_posts' => true,
				'has_password' => null,
				'post_type' => 'any',
				'post_status' => array('publish', 'any'),
				'posts_per_page' => -1,
				'order' => $wall_posts_ordering_direction,
				'orderby' => $wall_posts_ordering
			);
		}
		else 
		{
			$args = array(
				'author__in' => $author__in,
				'author__not_in' => $author__not_in,
				'category__in' => $category__in,
				'category__not_in' => $category__not_in,
				'category' => $cat,
				'tag__in' => $tag__in,
				'tag__not_in' => $tag__not_in,
				's' => $wall_keywords,
				'post__not_in' => $excluded_posts,
				'ignore_sticky_posts' => true,
				'has_password' => null,
				'post_type' => $post_type,
				'post_status' => $post_status,
				'posts_per_page' => -1,
				'order' => $wall_posts_ordering_direction,
				'orderby' => $wall_posts_ordering
			);
		}

		$posts_array = get_posts( $args );

		$total = count($posts_array);

		return $total;

	}

} // class
