<?php

/**
 * CSS class
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/includes
 */

class MN_Wall_CSS {

	/**
	 * Constructor
	 */
	public function __construct() {

		// Nothing to see here...

	} // __construct()

	/**
	 * Inline styling for wall items.
	 * 
	 * @since    1.2.0
	 */
	public function masonryItemCss($wall_options, $wall_id)
	{
		$utilities = new MN_Wall_Utilities();
		$mwall = 'mwall_container_'.$wall_id;
		$css = '';

		// Detail box text color - Columns/List
		if ($wall_options['wall-detail-box-text-color-columns'][0] == 'light-text')
			$db_color = '255,255,255';
		else if ($wall_options['wall-detail-box-text-color-columns'][0] == 'dark-text')
			$db_color = '0,0,0';
		else 
			$db_color = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-columns'][0], true);

		$css .= '
		#'.$mwall.' .mwall-detail-box h3.mwall-title a,
		#'.$mwall.' .mwall-detail-box h3.mwall-title span {
			color: rgba('.$db_color.', 0.9);
		}

		#'.$mwall.' .mwall-detail-box h3.mwall-title a:hover,
		#'.$mwall.' .mwall-detail-box h3.mwall-title a:focus {
			color: rgba('.$db_color.', 1);
		}

		#'.$mwall.' .mwall-detail-box .mwall-item-info {
			color: rgba('.$db_color.', 0.7);
		}

		#'.$mwall.' .mwall-detail-box .mwall-item-info a {
			color: rgba('.$db_color.', 0.8);
		}

		#'.$mwall.' .mwall-detail-box .mwall-item-info a:hover,
		#'.$mwall.' .mwall-detail-box .mwall-item-info a:focus {
			color: rgba('.$db_color.', 1);
			border-bottom: 1px dotted rgba('.$db_color.', 0.8);
		}

		#'.$mwall.' .mwall-detail-box .mwall-s-desc,
		#'.$mwall.' .mwall-detail-box .mwall-desc,
		#'.$mwall.' .mwall-detail-box .mwall-price,
		#'.$mwall.' .mwall-detail-box .mwall-hits,
		#'.$mwall.' .mwall-detail-box .mwall-comments {
			color: rgba('.$db_color.', 0.8);
		}

		#'.$mwall.' .mwall-detail-box .mwall-date {
			color: rgba('.$db_color.', 0.7);
		}

		#'.$mwall.' .mwall-detail-box .mwall-readmore a {
			color: rgba('.$db_color.', 0.7);
			border: 1px solid rgba('.$db_color.', 0.7);
		}

		#'.$mwall.' .mwall-detail-box .mwall-readmore a:hover,
		#'.$mwall.' .mwall-detail-box .mwall-readmore a:focus {
			color: rgba('.$db_color.', 1);
			border: 1px solid rgba('.$db_color.', 1);
		}

		#'.$mwall.' .mwall-detail-box .mwall-comments a,
		#'.$mwall.' .mwall-detail-box .mwall-comments > span {
			color: rgba('.$db_color.', 0.7);
		}

		#'.$mwall.' .mwall-detail-box .mwall-comments a:hover,
		#'.$mwall.' .mwall-detail-box .mwall-comments a:focus {
			color: rgba('.$db_color.', 1);
		}';

		// Detail box - Big
		if ($wall_options['wall-item-title-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-title {
				display: none;
			}';
		}

		if ($wall_options['wall-item-introtext-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-desc {
				display: none;
			}';
		}

		if ($wall_options['wall-item-date-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-date {
				display: none;
			}';
		}

		if ($wall_options['wall-item-category-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-item-category {
				display: none;
			}';
		}

		if ($wall_options['wall-item-tags-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-item-tags {
				display: none;
			}';
		}

		if ($wall_options['wall-item-author-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-item-author {
				display: none;
			}';
		}

		if ($wall_options['wall-item-price-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-price {
				display: none;
			}';
		}

		if ($wall_options['wall-item-comments-count-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-comments {
				display: none;
			}';
		}

		if ($wall_options['wall-item-readmore-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-detail-box .mwall-readmore {
				display: none;
			}';
		}

		// Detail box text color - Big
		if ($wall_options['wall-detail-box-text-color-big'][0] == 'light-text')
			$db_color_big = '255,255,255';
		else if ($wall_options['wall-detail-box-text-color-big'][0] == 'dark-text')
			$db_color_big = '0,0,0';
		else 
			$db_color_big = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-big'][0], true);

		$css .= '
		#'.$mwall.' .mwall-big .mwall-detail-box h3.mwall-title a,
		#'.$mwall.' .mwall-big .mwall-detail-box h3.mwall-title span {
			color: rgba('.$db_color_big.', 0.9);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box h3.mwall-title a:hover,
		#'.$mwall.' .mwall-big .mwall-detail-box h3.mwall-title a:focus {
			color: rgba('.$db_color_big.', 1);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-item-info {
			color: rgba('.$db_color_big.', 0.7);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-item-info a {
			color: rgba('.$db_color_big.', 0.8);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-item-info a:hover,
		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-item-info a:focus {
			color: rgba('.$db_color_big.', 1);
			border-bottom: 1px dotted rgba('.$db_color_big.', 0.8);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-s-desc,
		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-desc,
		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-price,
		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-hits,
		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-comments {
			color: rgba('.$db_color_big.', 0.8);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-date {
			color: rgba('.$db_color_big.', 0.7);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-readmore a {
			color: rgba('.$db_color_big.', 0.7);
			border: 1px solid rgba('.$db_color_big.', 0.7);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-readmore a:hover,
		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-readmore a:focus {
			color: rgba('.$db_color_big.', 1);
			border: 1px solid rgba('.$db_color_big.', 1);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-comments a,
		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-comments > span {
			color: rgba('.$db_color_big.', 0.7);
		}

		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-comments a:hover,
		#'.$mwall.' .mwall-big .mwall-detail-box .mwall-comments a:focus {
			color: rgba('.$db_color_big.', 1);
		}';

		// Images and dimensions - Big
		$bg_big = $utilities->hex2RGB($wall_options['wall-detail-box-bg-color-big'][0], true);
		$bg_opacity_big = number_format((float)$wall_options['wall-detail-box-opacity-big'][0], 2, '.', '');

		$css .= '
		#'.$mwall.' .mwall-big .mwall-photo-link {	
			background-color: rgba('.$bg_big.','.$bg_opacity_big.');
		}';

		if ($wall_options['wall-detail-box-big'][0] == 'yes')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-item-inner {	
				background-color: rgba('.$bg_big.','.$bg_opacity_big.');
			}';

			if ($wall_options['wall-detail-box-position-big'][0] == 'left')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-big .mwall-photo-link {	
						right: 0;
						left: auto;
						top: 0;
						bottom: 0;
						width: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-big .mwall-item-outer-cont .mwall-item-inner {
					bottom: 0;
					left: 0;
					top: 0;
					width: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-big'][0] == 'right')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-big .mwall-photo-link {	
						left: 0;
						right: auto;
						top: 0;
						bottom: 0;
						width: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-big .mwall-item-outer-cont .mwall-item-inner {
					bottom: 0;
					right: 0;
					top: 0;
					width: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-big'][0] == 'top')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-big .mwall-photo-link {	
						right: 0;
						left: 0;
						top: auto;
						bottom: 0;
						height: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-big .mwall-item-outer-cont .mwall-item-inner {
					right: 0;
					left: 0;
					top: 0;
					height: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-big'][0] == 'bottom')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-big .mwall-photo-link {	
						right: 0;
						left: 0;
						bottom: auto;
						top: 0;
						height: 50%;
					}';
					
					$css .= '
					#'.$mwall.' .mwall-big .mwall-item-outer-cont .mwall-item-inner {
						right: 0;
						left: 0;
						bottom: 0;
						height: 50%;
					}';
				}
			}
		}
		else if ($wall_options['wall-detail-box-big'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-big .mwall-item-inner {
				display: none;
			}

			#'.$mwall.' .mwall-big .mwall-item-inner.mwall-no-image {
				display: block;
				background-color: rgba('.$bg_big.','.$bg_opacity_big.');
			}';
		}

		// Detail box - Landscape 
		if ($wall_options['wall-item-title-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-title {
				display: none;
			}';
		}

		if ($wall_options['wall-item-introtext-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-desc {
				display: none;
			}';
		}

		if ($wall_options['wall-item-date-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-date {
				display: none;
			}';
		}

		if ($wall_options['wall-item-category-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-item-category {
				display: none;
			}';
		}

		if ($wall_options['wall-item-tags-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-item-tags {
				display: none;
			}';
		}

		if ($wall_options['wall-item-author-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-item-author {
				display: none;
			}';
		}
		
		if ($wall_options['wall-item-price-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-price {
				display: none;
			}';
		}

		if ($wall_options['wall-item-comments-count-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-comments {
				display: none;
			}';
		}

		if ($wall_options['wall-item-readmore-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-readmore {
				display: none;
			}';
		}

		// Detail box text color - Landscape
		if ($wall_options['wall-detail-box-text-color-landscape'][0] == 'light-text')
			$db_color_lscape = '255,255,255';
		else if ($wall_options['wall-detail-box-text-color-landscape'][0] == 'dark-text')
			$db_color_lscape = '0,0,0';
		else 
			$db_color_lscape = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-landscape'][0], true);

		$css .= '
		#'.$mwall.' .mwall-horizontal .mwall-detail-box h3.mwall-title a,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box h3.mwall-title span {
			color: rgba('.$db_color_lscape.', 0.9);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box h3.mwall-title a:hover,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box h3.mwall-title a:focus {
			color: rgba('.$db_color_lscape.', 1);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-item-info {
			color: rgba('.$db_color_lscape.', 0.7);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-item-info a {
			color: rgba('.$db_color_lscape.', 0.8);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-item-info a:hover,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-item-info a:focus {
			color: rgba('.$db_color_lscape.', 1);
			border-bottom: 1px dotted rgba('.$db_color_lscape.', 0.8);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-s-desc,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-desc,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-price,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-hits,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-comments {
			color: rgba('.$db_color_lscape.', 0.8);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-date {
			color: rgba('.$db_color_lscape.', 0.7);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-readmore a {
			color: rgba('.$db_color_lscape.', 0.7);
			border: 1px solid rgba('.$db_color_lscape.', 0.7);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-readmore a:hover,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-readmore a:focus {
			color: rgba('.$db_color_lscape.', 1);
			border: 1px solid rgba('.$db_color_lscape.', 1);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-comments a,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-comments > span {
			color: rgba('.$db_color_lscape.', 0.7);
		}

		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-comments a:hover,
		#'.$mwall.' .mwall-horizontal .mwall-detail-box .mwall-comments a:focus {
			color: rgba('.$db_color_lscape.', 1);
		}';
		
		// Images and dimensions - Landscape
		$bg_lscape = $utilities->hex2RGB($wall_options['wall-detail-box-bg-color-landscape'][0], true);
		$bg_opacity_lscape = number_format((float)$wall_options['wall-detail-box-opacity-landscape'][0], 2, '.', '');

		$css .= '
		#'.$mwall.' .mwall-horizontal .mwall-photo-link {
			background-color: rgba('.$bg_lscape.','.$bg_opacity_lscape.');
		}';

		if ($wall_options['wall-detail-box-landscape'][0] == 'yes')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-item-inner {	
				background-color: rgba('.$bg_lscape.','.$bg_opacity_lscape.');
			}';

			if ($wall_options['wall-detail-box-position-landscape'][0] == 'left')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-horizontal .mwall-photo-link {	
						right: 0;
						left: auto;
						top: 0;
						bottom: 0;
						width: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-horizontal .mwall-item-outer-cont .mwall-item-inner {
					bottom: 0;
					left: 0;
					top: 0;
					width: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-landscape'][0] == 'right')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-horizontal .mwall-photo-link {	
						left: 0;
						right: auto;
						top: 0;
						bottom: 0;
						width: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-horizontal .mwall-item-outer-cont .mwall-item-inner {
					bottom: 0;
					right: 0;
					top: 0;
					width: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-landscape'][0] == 'top')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-horizontal .mwall-photo-link {	
						right: 0;
						left: 0;
						top: auto;
						bottom: 0;
						height: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-horizontal .mwall-item-outer-cont .mwall-item-inner {
					right: 0;
					left: 0;
					top: 0;
					height: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-landscape'][0] == 'bottom')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-horizontal .mwall-photo-link {	
						right: 0;
						left: 0;
						bottom: auto;
						top: 0;
						height: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-horizontal .mwall-item-outer-cont .mwall-item-inner {
					right: 0;
					left: 0;
					bottom: 0;
					height: 50%;
				}';
			}
		}
		else if ($wall_options['wall-detail-box-landscape'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-horizontal .mwall-item-inner {
				display: none;
			}

			#'.$mwall.' .mwall-horizontal .mwall-item-inner.mwall-no-image {
				display: block;
				background-color: rgba('.$bg_lscape.','.$bg_opacity_lscape.');
			}';
		}

		// Detail box - Portrait 
		if ($wall_options['wall-item-title-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-title {
				display: none;
			}';
		}

		if ($wall_options['wall-item-introtext-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-desc {
				display: none;
			}';
		}

		if ($wall_options['wall-item-date-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-date {
				display: none;
			}';
		}

		if ($wall_options['wall-item-category-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-item-category {
				display: none;
			}';
		}

		if ($wall_options['wall-item-tags-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-item-tags {
				display: none;
			}';
		}

		if ($wall_options['wall-item-author-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-item-author {
				display: none;
			}';
		}

		if ($wall_options['wall-item-price-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-price {
				display: none;
			}';
		}

		if ($wall_options['wall-item-comments-count-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-comments {
				display: none;
			}';
		}

		if ($wall_options['wall-item-readmore-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-readmore {
				display: none;
			}';
		}

		// Detail box text color - Portrait
		if ($wall_options['wall-detail-box-text-color-portrait'][0] == 'light-text')
			$db_color_portrait = '255,255,255';
		else if ($wall_options['wall-detail-box-text-color-portrait'][0] == 'dark-text')
			$db_color_portrait = '0,0,0';
		else 
			$db_color_portrait = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-portrait'][0], true);

		$css .= '
		#'.$mwall.' .mwall-vertical .mwall-detail-box h3.mwall-title a,
		#'.$mwall.' .mwall-vertical .mwall-detail-box h3.mwall-title span {
			color: rgba('.$db_color_portrait.', 0.9);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box h3.mwall-title a:hover,
		#'.$mwall.' .mwall-vertical .mwall-detail-box h3.mwall-title a:focus {
			color: rgba('.$db_color_portrait.', 1);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-item-info {
			color: rgba('.$db_color_portrait.', 0.7);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-item-info a {
			color: rgba('.$db_color_portrait.', 0.8);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-item-info a:hover,
		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-item-info a:focus {
			color: rgba('.$db_color_portrait.', 1);
			border-bottom: 1px dotted rgba('.$db_color_portrait.', 0.8);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-s-desc,
		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-desc,
		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-price,
		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-hits,
		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-comments {
			color: rgba('.$db_color_portrait.', 0.8);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-date {
			color: rgba('.$db_color_portrait.', 0.7);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-readmore a {
			color: rgba('.$db_color_portrait.', 0.7);
			border: 1px solid rgba('.$db_color_portrait.', 0.7);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-readmore a:hover,
		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-readmore a:focus {
			color: rgba('.$db_color_portrait.', 1);
			border: 1px solid rgba('.$db_color_portrait.', 1);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-comments a,
		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-comments > span {
			color: rgba('.$db_color_portrait.', 0.7);
		}

		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-comments a:hover,
		#'.$mwall.' .mwall-vertical .mwall-detail-box .mwall-comments a:focus {
			color: rgba('.$db_color_portrait.', 1);
		}';

		// Images and dimensions - Portrait
		$bg_portrait = $utilities->hex2RGB($wall_options['wall-detail-box-bg-color-portrait'][0], true);
		$bg_opacity_portrait = number_format((float)$wall_options['wall-detail-box-opacity-portrait'][0], 2, '.', '');

		$css .= '
		#'.$mwall.' .mwall-vertical .mwall-photo-link {	
			background-color: rgba('.$bg_portrait.','.$bg_opacity_portrait.');
		}';

		if ($wall_options['wall-detail-box-portrait'][0] == 'yes')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-item-inner {	
				background-color: rgba('.$bg_portrait.','.$bg_opacity_portrait.');
			}';

			if ($wall_options['wall-detail-box-position-portrait'][0] == 'left')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-vertical .mwall-photo-link {	
						right: 0;
						left: auto;
						top: 0;
						bottom: 0;
						width: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-vertical .mwall-item-outer-cont .mwall-item-inner {
					bottom: 0;
					left: 0;
					top: 0;
					width: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-portrait'][0] == 'right')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-vertical .mwall-photo-link {	
						left: 0;
						right: auto;
						top: 0;
						bottom: 0;
						width: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-vertical .mwall-item-outer-cont .mwall-item-inner {
					bottom: 0;
					right: 0;
					top: 0;
					width: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-portrait'][0] == 'top')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-vertical .mwall-photo-link {	
						right: 0;
						left: 0;
						top: auto;
						bottom: 0;
						height: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-vertical .mwall-item-outer-cont .mwall-item-inner {
					right: 0;
					left: 0;
					top: 0;
					height: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-portrait'][0] == 'bottom')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-vertical .mwall-photo-link {	
						right: 0;
						left: 0;
						bottom: auto;
						top: 0;
						height: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-vertical .mwall-item-outer-cont .mwall-item-inner {
					right: 0;
					left: 0;
					bottom: 0;
					height: 50%;
				}';
			}
		}
		else if ($wall_options['wall-detail-box-portrait'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-vertical .mwall-item-inner {
				display: none;
			}

			#'.$mwall.' .mwall-vertical .mwall-item-inner.mwall-no-image {
				display: block;
				background-color: rgba('.$bg_portrait.','.$bg_opacity_portrait.');
			}';
		}

		// Detail box - Small
		if ($wall_options['wall-item-title-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-title {
				display: none;
			}';
		}

		if ($wall_options['wall-item-introtext-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-desc {
				display: none;
			}';
		}

		if ($wall_options['wall-item-date-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-date {
				display: none;
			}';
		}

		if ($wall_options['wall-item-category-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-item-category {
				display: none;
			}';
		}

		if ($wall_options['wall-item-tags-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-item-tags {
				display: none;
			}';
		}

		if ($wall_options['wall-item-author-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-item-author {
				display: none;
			}';
		}

		if ($wall_options['wall-item-price-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-price {
				display: none;
			}';
		}

		if ($wall_options['wall-item-comments-count-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-comments {
				display: none;
			}';
		}

		if ($wall_options['wall-item-readmore-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-detail-box .mwall-readmore {
				display: none;
			}';
		}

		// Detail box text color - Small
		if ($wall_options['wall-detail-box-text-color-small'][0] == 'light-text')
			$db_color_small = '255,255,255';
		else if ($wall_options['wall-detail-box-text-color-small'][0] == 'dark-text')
			$db_color_small = '0,0,0';
		else 
			$db_color_small = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-small'][0], true);

		$css .= '
		#'.$mwall.' .mwall-small .mwall-detail-box h3.mwall-title a,
		#'.$mwall.' .mwall-small .mwall-detail-box h3.mwall-title span {
			color: rgba('.$db_color_small.', 0.9);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box h3.mwall-title a:hover,
		#'.$mwall.' .mwall-small .mwall-detail-box h3.mwall-title a:focus {
			color: rgba('.$db_color_small.', 1);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-item-info {
			color: rgba('.$db_color_small.', 0.7);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-item-info a {
			color: rgba('.$db_color_small.', 0.8);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-item-info a:hover,
		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-item-info a:focus {
			color: rgba('.$db_color_small.', 1);
			border-bottom: 1px dotted rgba('.$db_color_small.', 0.8);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-s-desc,
		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-desc,
		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-price,
		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-hits,
		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-comments {
			color: rgba('.$db_color_small.', 0.8);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-date {
			color: rgba('.$db_color_small.', 0.7);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-readmore a {
			color: rgba('.$db_color_small.', 0.7);
			border: 1px solid rgba('.$db_color_small.', 0.7);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-readmore a:hover,
		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-readmore a:focus {
			color: rgba('.$db_color_small.', 1);
			border: 1px solid rgba('.$db_color_small.', 1);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-comments a,
		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-comments > span {
			color: rgba('.$db_color_small.', 0.7);
		}

		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-comments a:hover,
		#'.$mwall.' .mwall-small .mwall-detail-box .mwall-comments a:focus {
			color: rgba('.$db_color_small.', 1);
		}';
		
		// Images and dimensions - Small
		$bg_small = $utilities->hex2RGB($wall_options['wall-detail-box-bg-color-small'][0], true);
		$bg_opacity_small = number_format((float)$wall_options['wall-detail-box-opacity-small'][0], 2, '.', '');

		$css .= '
			#'.$mwall.' .mwall-small .mwall-photo-link {	
				background-color: rgba('.$bg_small.','.$bg_opacity_small.');
			}';

		if ($wall_options['wall-detail-box-small'][0] == 'yes')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-item-inner {	
				background-color: rgba('.$bg_small.','.$bg_opacity_small.');
			}';

			if ($wall_options['wall-detail-box-position-small'][0] == 'left')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-small .mwall-photo-link {	
						right: 0;
						left: auto;
						top: 0;
						bottom: 0;
						width: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-small .mwall-item-outer-cont .mwall-item-inner {
					bottom: 0;
					left: 0;
					top: 0;
					width: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-small'][0] == 'right')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-small .mwall-photo-link {	
						left: 0;
						right: auto;
						top: 0;
						bottom: 0;
						width: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-small .mwall-item-outer-cont .mwall-item-inner {
					bottom: 0;
					right: 0;
					top: 0;
					width: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-small'][0] == 'top')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-small .mwall-photo-link {	
						right: 0;
						left: 0;
						top: auto;
						bottom: 0;
						height: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-small .mwall-item-outer-cont .mwall-item-inner {
					right: 0;
					left: 0;
					top: 0;
					height: 50%;
				}';
			}
			else if ($wall_options['wall-detail-box-position-small'][0] == 'bottom')
			{
				if ($wall_options['wall-full-image'][0] == 'no')
				{
					$css .= '
					#'.$mwall.' .mwall-small .mwall-photo-link {	
						right: 0;
						left: 0;
						bottom: auto;
						top: 0;
						height: 50%;
					}';
				}
				
				$css .= '
				#'.$mwall.' .mwall-small .mwall-item-outer-cont .mwall-item-inner {
					right: 0;
					left: 0;
					bottom: 0;
					height: 50%;
				}';
			}
		}
		else if ($wall_options['wall-detail-box-small'][0] == 'no')
		{
			$css .= '
			#'.$mwall.' .mwall-small .mwall-item-inner {
				display: none;
			}

			#'.$mwall.' .mwall-small .mwall-item-inner.mwall-no-image {
				display: block;
				background-color: rgba('.$bg_small.','.$bg_opacity_small.');
			}';
		}

		// Hover box text color
		if ($wall_options['wall-hover-text-color'][0] == '2')
			$hb_color = '255,255,255';
		else if ($wall_options['wall-hover-text-color'][0] == '1')
			$hb_color = '0,0,0';
		else 
			$hb_color = $utilities->hex2RGB($wall_options['wall-hover-text-color'][0], true);

		$css .= '
		#'.$mwall.' .mwall-hover-box h3.mwall-title a,
		#'.$mwall.' .mwall-hover-box h3.mwall-title span {
			color: rgba('.$hb_color.', 0.9);
		}

		#'.$mwall.' .mwall-hover-box h3.mwall-title a:hover,
		#'.$mwall.' .mwall-hover-box h3.mwall-title a:focus {
			color: rgba('.$hb_color.', 1);
		}

		#'.$mwall.' .mwall-hover-box .mwall-item-info {
			color: rgba('.$hb_color.', 0.7);
		}

		#'.$mwall.' .mwall-hover-box .mwall-item-info a {
			color: rgba('.$hb_color.', 0.8);
		}

		#'.$mwall.' .mwall-hover-box .mwall-item-info a:hover,
		#'.$mwall.' .mwall-hover-box .mwall-item-info a:focus {
			color: rgba('.$hb_color.', 1);
			border-bottom: 1px dotted rgba('.$hb_color.', 0.8);
		}

		#'.$mwall.' .mwall-hover-box .mwall-s-desc,
		#'.$mwall.' .mwall-hover-box .mwall-desc,
		#'.$mwall.' .mwall-hover-box .mwall-price,
		#'.$mwall.' .mwall-hover-box .mwall-hits,
		#'.$mwall.' .mwall-hover-box .mwall-comments {
			color: rgba('.$hb_color.', 0.8);
		}

		#'.$mwall.' .mwall-hover-box .mwall-date {
			color: rgba('.$hb_color.', 0.7);
		}

		#'.$mwall.' .mwall-hover-box .mwall-readmore a {
			color: rgba('.$hb_color.', 0.7);
			border: 1px solid rgba('.$hb_color.', 0.7);
		}

		#'.$mwall.' .mwall-hover-box .mwall-readmore a:hover,
		#'.$mwall.' .mwall-hover-box .mwall-readmore a:focus {
			color: rgba('.$hb_color.', 1);
			border: 1px solid rgba('.$hb_color.', 1);
		}

		#'.$mwall.' .mwall-hover-box .mwall-comments a,
		#'.$mwall.' .mwall-hover-box .mwall-comments > span {
			color: rgba('.$hb_color.', 0.7) !important;
		}

		#'.$mwall.' .mwall-hover-box .mwall-comments a:hover,
		#'.$mwall.' .mwall-hover-box .mwall-comments a:focus {
			color: rgba('.$hb_color.', 1) !important;
		}';

		return $css;
	}

	/**
	 * Creates inline css for the filters and sortings.
	 *
	 * @since    1.0.1
	 */
	public function getFiltersCss($wall_options, $wall_id) {

		$mwall = 'mwall_container_'.$wall_id;
		$background_color = $wall_options['wall-filters-color'][0];
		$border_radius = (int)$wall_options['wall-filters-border-radius'][0];

		$css = '
		#'.$mwall.' .mwall-buttons a {
			border-radius: '.$border_radius.'px;
		}
		#'.$mwall.' .mwall-buttons a.mwall-filter-active {
			background-color: '.$background_color.';
			border-color: '.$background_color.';
		}
		#'.$mwall.' .mwall-reset .btn-reset {
			border-radius: '.$border_radius.'px;
		}
		#'.$mwall.' .mwall-reset .btn-reset:hover,
		#'.$mwall.' .mwall-reset .btn-reset:focus {
			background-color: '.$background_color.';
			border-color: '.$background_color.';
		}

		#'.$mwall.' .mwall-dropdown .dropdown-label {
			border-radius: '.$border_radius.'px;
		}
		#'.$mwall.' .mwall-dropdown.expanded .dropdown-label {
			border-radius: '.$border_radius.'px '.$border_radius.'px 0 0;
			background-color: '.$background_color.';
			border-color: '.$background_color.';
		}
		#'.$mwall.' .mwall-dropdown ul li a.mwall-filter-active {
			color: '.$background_color.';
		}
		#'.$mwall.' .mwall-dropdown:hover .dropdown-label {
			color: '.$background_color.';
		}
		';

		return $css;

	}

	/**
	 * Creates inline css for the responsive levels.
	 *
	 * @since    1.0.1
	 */
	public function getResponsiveCss($wall_options, $wall_id) {

		$utilities = new MN_Wall_Utilities();
		$mwall = 'mwall_container_'.$wall_id;

		// Responsive levels options
		$wall_l_size = (int)$wall_options['wall-l-size'][0];
		$wall_l_size_min = $wall_l_size - 1;
		$wall_l_height = (int)$wall_options['wall-l-height'][0];

		$wall_m_layout = $wall_options['wall-m-layout'][0];
		$wall_m_size = (int)$wall_options['wall-m-size'][0];
		$wall_m_size_min = $wall_m_size - 1;
		$wall_m_items = (int)$wall_options['wall-m-items'][0];
		$wall_m_height = (int)$wall_options['wall-m-height'][0];

		$wall_s_layout = $wall_options['wall-s-layout'][0];
		$wall_s_size = (int)$wall_options['wall-s-size'][0];
		$wall_s_size_min = $wall_s_size - 1;
		$wall_s_items = (int)$wall_options['wall-s-items'][0];
		$wall_s_height = (int)$wall_options['wall-s-height'][0];

		$wall_xs_layout = $wall_options['wall-xs-layout'][0];
		$wall_xs_size = (int)$wall_options['wall-xs-size'][0];
		$wall_xs_size_min = $wall_xs_size - 1;
		$wall_xs_items = (int)$wall_options['wall-xs-items'][0];
		$wall_xs_height = (int)$wall_options['wall-xs-height'][0];

		$wall_xxs_layout = $wall_options['wall-xxs-layout'][0];
		$wall_xxs_items = (int)$wall_options['wall-xxs-items'][0];
		$wall_xxs_height = (int)$wall_options['wall-xxs-height'][0];

		// Columns layout detail box options
		$detail_box_column = $wall_options['wall-detail-box-columns'][0];
		$detail_box_position_column = $wall_options['wall-detail-box-position-columns'][0];
		$show_title_column = $wall_options['wall-item-title-columns'][0];
		$show_introtext_column = $wall_options['wall-item-introtext-columns'][0];
		$show_date_column = $wall_options['wall-item-date-columns'][0];
		$show_category_column = $wall_options['wall-item-category-columns'][0];
		$show_tags_column = $wall_options['wall-item-tags-columns'][0];
		$show_author_column = $wall_options['wall-item-author-columns'][0];
		$show_price_column = $wall_options['wall-item-price-columns'][0];
		$show_comments_column = $wall_options['wall-item-comments-count-columns'][0];
		$show_readmore_column = $wall_options['wall-item-readmore-columns'][0];
		$bg_columns = $utilities->hex2RGB($wall_options['wall-detail-box-bg-color-columns'][0], true);
		$bg_opacity_columns = number_format((float)$wall_options['wall-detail-box-opacity-columns'][0], 2, '.', '');

		// Start CSS
		$css = '';

		// Large
		$css .= '@media only screen and (min-width:'.$wall_l_size.'px)
		{';
			$css .= '
			#'.$mwall.' .mwall-big {
				height: '.(2*$wall_l_height).'px;
			}
			#'.$mwall.' .mwall-horizontal {
				height: '.($wall_l_height).'px;
			}
			#'.$mwall.' .mwall-vertical {
				height: '.(2*$wall_l_height).'px;
			}
			#'.$mwall.' .mwall-small {
				height: '.($wall_l_height).'px;
			}';

			if ((!isset($wall_options['wall-preserve-aspect-ratio'])
				|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
			{
				$css .= '
				#'.$mwall.'.mwall-columns .mwall-photo-link {
					height: '.$wall_l_height.'px !important;
				}';
			}
		$css .= '
		}';

		// Medium - Masonry
		if ($wall_m_layout == 'masonry')
		{
			$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
			{';
				$css .= '
				#'.$mwall.' .mwall-big {
					height: '.(2*$wall_m_height).'px;
				}
				#'.$mwall.' .mwall-horizontal {
					height: '.($wall_m_height).'px;
				}
				#'.$mwall.' .mwall-vertical {
					height: '.(2*$wall_m_height).'px;
				}
				#'.$mwall.' .mwall-small {
					height: '.($wall_m_height).'px;
				}

				#'.$mwall.' .mwall-big .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-big .mwall-item-inner .mwall-title span {
					font-size: 24px;
					line-height: 28px;
				}
				#'.$mwall.' .mwall-horizontal .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-horizontal .mwall-item-inner .mwall-title span,
				#'.$mwall.' .mwall-vertical .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-vertical .mwall-item-inner .mwall-title span,
				#'.$mwall.' .mwall-small .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-small .mwall-item-inner .mwall-title span {
					font-size: 18px;
					line-height: 20px;
				}';

				if ($wall_options['wall-grid'][0] == '98c')
				{
					if ((!isset($wall_options['wall-preserve-aspect-ratio'])
						|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
					{
						$css .= '
						#'.$mwall.'.mwall-columns .mwall-photo-link {
							height: '.$wall_m_height.'px !important;
						}';
					}
				}
			$css .= '
			}';
		}

		// Medium - Equal columns
		if ($wall_m_layout == 'equal')
		{
			$items_width = number_format((float)(100 / $wall_m_items), 2, '.', '');

			$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
			{ ';
				if ($wall_options['wall-grid'][0] != '99v')
				{
					$css .= 
					'#'.$mwall.' .mwall-item-inner {	
						background-color: rgba('.$bg_columns.','.$bg_opacity_columns.') !important;
					}';
				}

				if ($detail_box_position_column == 'below')
				{
					$css .= '
					#'.$mwall.' .mwall-item {
						height: auto !important;
					}
					#'.$mwall.' .mwall-item-inner {
						position: static;
						width: 100% !important;
					}
					#'.$mwall.'.mwall-masonry .mwall-item-outer-cont .mwall-photo-link {
						z-index: 1;
						width: 100%;
						position: relative;
						display: flex;
						justify-content: center;
						align-items: center;
						overflow: hidden;
						height: '.$wall_m_height.'px !important;
					}';
				} 
				else 
				{
					$css .= '
					#'.$mwall.'.mwall-masonry .mwall-item {
						height: '.$wall_m_height.'px !important;
					}
					#'.$mwall.' .mwall-item-inner {
						width: 100% !important;
						top: auto !important;
						bottom: 0 !important;
						left: 0 !important;
					}
					#'.$mwall.'.mwall-masonry .mwall-item-outer-cont .mwall-photo-link {
						width: 100%;
						height: 100%;
					}';

					if ($detail_box_position_column == 'bottom')
					{
						$css .= '
						#'.$mwall.' .mwall-item-inner {
							height: auto !important;
						}
						#'.$mwall.' .mwall-item-inner.mwall-no-image {
							height: 100% !important;
						}';
					} 
					else 
					{
						$css .= '
						#'.$mwall.' .mwall-item-inner {
							height: 100% !important;
						}';
					}
				}

				if ((!isset($wall_options['wall-preserve-aspect-ratio'])
					|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
				{
					$css .= '
					#'.$mwall.'.mwall-columns .mwall-photo-link {
						height: '.$wall_m_height.'px !important;
					}';
				}

				$css .= '
				#'.$mwall.' .mwall-item {
					width: '.$items_width.'% !important;
				}
				#'.$mwall.' .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-item-inner .mwall-title span {
					font-size: 18px;
					line-height: 24px;
				}';

				// Detail box text color
				if ($wall_options['wall-detail-box-text-color-columns'][0] == 'light-text')
					$db_color = '255,255,255';
				else if ($wall_options['wall-detail-box-text-color-columns'][0] == 'dark-text')
					$db_color = '0,0,0';
				else 
					$db_color = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-columns'][0], true);

				$css .= '
				#'.$mwall.' .mwall-detail-box h3.mwall-title a,
				#'.$mwall.' .mwall-detail-box h3.mwall-title span {
					color: rgba('.$db_color.', 0.9) !important;
				}

				#'.$mwall.' .mwall-detail-box h3.mwall-title a:hover,
				#'.$mwall.' .mwall-detail-box h3.mwall-title a:focus {
					color: rgba('.$db_color.', 1) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info a {
					color: rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-item-info a:focus {
					color: rgba('.$db_color.', 1) !important;
					border-bottom: 1px dotted rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-s-desc,
				#'.$mwall.' .mwall-detail-box .mwall-desc,
				#'.$mwall.' .mwall-detail-box .mwall-price,
				#'.$mwall.' .mwall-detail-box .mwall-hits,
				#'.$mwall.' .mwall-detail-box .mwall-comments {
					color: rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-date {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-readmore a {
					color: rgba('.$db_color.', 0.7) !important;
					border: 1px solid rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-readmore a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-readmore a:focus {
					color: rgba('.$db_color.', 1) !important;
					border: 1px solid rgba('.$db_color.', 1) !important;
				}
				
				#'.$mwall.' .mwall-detail-box .mwall-comments a,
				#'.$mwall.' .mwall-detail-box .mwall-comments > span {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-comments a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-comments a:focus {
					color: rgba('.$db_color.', 1) !important;
				}';
			$css .= '}';

			if ($detail_box_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box {
						display: none !important;
					}
				}';
			}

			if ($show_title_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-title {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-title {
						display: none !important;
					}
				}';
			}

			if ($show_introtext_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-desc {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-desc {
						display: none !important;
					}
				}';
			}

			if ($show_date_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-date {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-date {
						display: none !important;
					}
				}';
			}

			if ($show_category_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-category {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-category {
						display: none !important;
					}
				}';
			}

			if ($show_tags_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-tags {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-tags {
						display: none !important;
					}
				}';
			}

			if ($show_author_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-author {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-author {
						display: none !important;
					}
				}';
			}

			if ($show_price_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-price {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-price {
						display: none !important;
					}
				}';
			}

			if ($show_comments_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-comments {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-comments {
						display: none !important;
					}
				}';
			}

			if ($show_readmore_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-readmore {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_m_size.'px) and (max-width:'.$wall_l_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-readmore {
						display: none !important;
					}
				}';
			}
		}

		// Small - Masonry
		if ($wall_s_layout == 'masonry')
		{
			$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
			{';
				$css .= '
				#'.$mwall.' .mwall-big {
					height: '.(2*$wall_s_height).'px;
				}
				#'.$mwall.' .mwall-horizontal {
					height: '.($wall_s_height).'px;
				}
				#'.$mwall.' .mwall-vertical {
					height: '.(2*$wall_s_height).'px;
				}
				#'.$mwall.' .mwall-small {
					height: '.($wall_s_height).'px;
				}

				#'.$mwall.' .mwall-big .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-big .mwall-item-inner .mwall-title span {
					font-size: 22px;
					line-height: 26px;
				}
				#'.$mwall.' .mwall-horizontal .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-horizontal .mwall-item-inner .mwall-title span,
				#'.$mwall.' .mwall-vertical .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-vertical .mwall-item-inner .mwall-title span,
				#'.$mwall.' .mwall-small .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-small .mwall-item-inner .mwall-title span {
					font-size: 17px;
					line-height: 20px;
				}';

				if ($wall_options['wall-grid'][0] == '98c')
				{
					if ((!isset($wall_options['wall-preserve-aspect-ratio'])
						|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
					{
						$css .= '
						#'.$mwall.'.mwall-columns .mwall-photo-link {
							height: '.$wall_s_height.'px !important;
						}';
					}
				}
			$css .= '
			}';
		}

		// Small - Equal columns
		if ($wall_s_layout == 'equal')
		{
			$items_width = number_format((float)(100 / $wall_s_items), 4, '.', '');

			$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
			{ ';
				if ($wall_options['wall-grid'][0] != '99v')
				{
					$css .= 
					'#'.$mwall.' .mwall-item-inner {	
						background-color: rgba('.$bg_columns.','.$bg_opacity_columns.') !important;
					}';
				}

				if ($detail_box_position_column == 'below')
				{
					$css .= '
					#'.$mwall.' .mwall-item {
						height: auto !important;
					}
					#'.$mwall.' .mwall-item-inner {
						position: static;
						width: 100% !important;
					}
					#'.$mwall.'.mwall-masonry .mwall-item-outer-cont .mwall-photo-link {
						z-index: 1;
						width: 100%;
						position: relative;
						display: flex;
						justify-content: center;
						align-items: center;
						overflow: hidden;
						height: '.$wall_s_height.'px !important;
					}';
				} 
				else 
				{
					$css .= '
					#'.$mwall.'.mwall-masonry .mwall-item {
						height: '.$wall_s_height.'px !important;
					}
					#'.$mwall.' .mwall-item-inner {
						width: 100% !important;
						top: auto !important;
						bottom: 0 !important;
						left: 0 !important;
					}
					#'.$mwall.'.mwall-masonry .mwall-item-outer-cont .mwall-photo-link {
						width: 100%;
						height: 100%;
					}';

					if ($detail_box_position_column == 'bottom')
					{
						$css .= '
						#'.$mwall.' .mwall-item-inner {
							height: auto !important;
						}
						#'.$mwall.' .mwall-item-inner.mwall-no-image {
							height: 100% !important;
						}';
					} 
					else 
					{
						$css .= '
						#'.$mwall.' .mwall-item-inner {
							height: 100% !important;
						}';
					}
				}

				if ((!isset($wall_options['wall-preserve-aspect-ratio'])
					|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
				{
					$css .= '
					#'.$mwall.'.mwall-columns .mwall-photo-link {
						height: '.$wall_s_height.'px !important;
					}';
				}

				$css .= '
				#'.$mwall.' .mwall-item {
					width: '.$items_width.'% !important;
				}
				#'.$mwall.' .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-item-inner .mwall-title span {
					font-size: 18px;
					line-height: 24px;
				}';

				// Detail box text color
				if ($wall_options['wall-detail-box-text-color-columns'][0] == 'light-text')
					$db_color = '255,255,255';
				else if ($wall_options['wall-detail-box-text-color-columns'][0] == 'dark-text')
					$db_color = '0,0,0';
				else 
					$db_color = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-columns'][0], true);

				$css .= '
				#'.$mwall.' .mwall-detail-box h3.mwall-title a,
				#'.$mwall.' .mwall-detail-box h3.mwall-title span {
					color: rgba('.$db_color.', 0.9) !important;
				}

				#'.$mwall.' .mwall-detail-box h3.mwall-title a:hover,
				#'.$mwall.' .mwall-detail-box h3.mwall-title a:focus {
					color: rgba('.$db_color.', 1) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info a {
					color: rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-item-info a:focus {
					color: rgba('.$db_color.', 1) !important;
					border-bottom: 1px dotted rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-s-desc,
				#'.$mwall.' .mwall-detail-box .mwall-desc,
				#'.$mwall.' .mwall-detail-box .mwall-price,
				#'.$mwall.' .mwall-detail-box .mwall-hits,
				#'.$mwall.' .mwall-detail-box .mwall-comments {
					color: rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-date {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-readmore a {
					color: rgba('.$db_color.', 0.7) !important;
					border: 1px solid rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-readmore a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-readmore a:focus {
					color: rgba('.$db_color.', 1) !important;
					border: 1px solid rgba('.$db_color.', 1) !important;
				}
				
				#'.$mwall.' .mwall-detail-box .mwall-comments a,
				#'.$mwall.' .mwall-detail-box .mwall-comments > span {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-comments a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-comments a:focus {
					color: rgba('.$db_color.', 1) !important;
				}';
			$css .= '}';

			if ($detail_box_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box {
						display: none !important;
					}
				}';
			}

			if ($show_title_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-title {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-title {
						display: none !important;
					}
				}';
			}

			if ($show_introtext_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-desc {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-desc {
						display: none !important;
					}
				}';
			}

			if ($show_date_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-date {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-date {
						display: none !important;
					}
				}';
			}

			if ($show_category_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-category {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-category {
						display: none !important;
					}
				}';
			}

			if ($show_tags_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-tags {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-tags {
						display: none !important;
					}
				}';
			}

			if ($show_author_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-author {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-author {
						display: none !important;
					}
				}';
			}

			if ($show_price_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-price {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-price {
						display: none !important;
					}
				}';
			}

			if ($show_comments_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-comments {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-comments {
						display: none !important;
					}
				}';
			}

			if ($show_readmore_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-readmore {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_s_size.'px) and (max-width:'.$wall_m_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-readmore {
						display: none !important;
					}
				}';
			}
		}

		// Extra Small - Masonry
		if ($wall_xs_layout == 'masonry')
		{
			$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
			{';
				$css .= '
				#'.$mwall.' .mwall-big {
					height: '.(2*$wall_xs_height).'px;
				}
				#'.$mwall.' .mwall-horizontal {
					height: '.($wall_xs_height).'px;
				}
				#'.$mwall.' .mwall-vertical {
					height: '.(2*$wall_xs_height).'px;
				}
				#'.$mwall.' .mwall-small {
					height: '.($wall_xs_height).'px;
				}

				#'.$mwall.' .mwall-photo-link {
					width: 100% !important;
					height: 100% !important;
				}';

				if ($wall_options['wall-grid'][0] == '98c')
				{
					if ((!isset($wall_options['wall-preserve-aspect-ratio'])
						|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
					{
						$css .= '
						#'.$mwall.'.mwall-columns .mwall-photo-link {
							height: '.$wall_xs_height.'px !important;
						}';
					}
				}
			$css .= '
			}';
		}

		// Extra Small - Equal columns
		if ($wall_xs_layout == 'equal')
		{
			$items_width = number_format((float)(100 / $wall_xs_items), 4, '.', '');

			$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
			{ ';
				if ($wall_options['wall-grid'][0] != '99v')
				{
					$css .= 
					'#'.$mwall.' .mwall-item-inner {	
						background-color: rgba('.$bg_columns.','.$bg_opacity_columns.') !important;
					}';
				}

				if ($detail_box_position_column == 'below')
				{
					$css .= '
					#'.$mwall.' .mwall-item {
						height: auto !important;
					}
					#'.$mwall.' .mwall-item-inner {
						position: static;
						width: 100% !important;
					}
					#'.$mwall.'.mwall-masonry .mwall-item-outer-cont .mwall-photo-link {
						z-index: 1;
						width: 100%;
						position: relative;
						display: flex;
						justify-content: center;
						align-items: center;
						overflow: hidden;
						height: '.$wall_xs_height.'px !important;
					}';
				} 
				else 
				{
					$css .= '
					#'.$mwall.'.mwall-masonry .mwall-item {
						height: '.$wall_xs_height.'px !important;
					}
					#'.$mwall.' .mwall-item-inner {
						width: 100% !important;
						top: auto !important;
						bottom: 0 !important;
						left: 0 !important;
					}
					#'.$mwall.'.mwall-masonry .mwall-item-outer-cont .mwall-photo-link {
						width: 100%;
						height: 100%;
					}';

					if ($detail_box_position_column == 'bottom')
					{
						$css .= '
						#'.$mwall.' .mwall-item-inner {
							height: auto !important;
						}
						#'.$mwall.' .mwall-item-inner.mwall-no-image {
							height: 100% !important;
						}';
					} 
					else 
					{
						$css .= '
						#'.$mwall.' .mwall-item-inner {
							height: 100% !important;
						}';
					}
				}

				if ((!isset($wall_options['wall-preserve-aspect-ratio'])
					|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
				{
					$css .= '
					#'.$mwall.'.mwall-columns .mwall-photo-link {
						height: '.$wall_xs_height.'px !important;
					}';
				}

				$css .= '
				#'.$mwall.' .mwall-item {
					width: '.$items_width.'% !important;
				}
				#'.$mwall.' .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-item-inner .mwall-title span {
					font-size: 18px;
					line-height: 24px;
				}';

				// Detail box text color
				if ($wall_options['wall-detail-box-text-color-columns'][0] == 'light-text')
					$db_color = '255,255,255';
				else if ($wall_options['wall-detail-box-text-color-columns'][0] == 'dark-text')
					$db_color = '0,0,0';
				else 
					$db_color = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-columns'][0], true);

				$css .= '
				#'.$mwall.' .mwall-detail-box h3.mwall-title a,
				#'.$mwall.' .mwall-detail-box h3.mwall-title span {
					color: rgba('.$db_color.', 0.9) !important;
				}

				#'.$mwall.' .mwall-detail-box h3.mwall-title a:hover,
				#'.$mwall.' .mwall-detail-box h3.mwall-title a:focus {
					color: rgba('.$db_color.', 1) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info a {
					color: rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-item-info a:focus {
					color: rgba('.$db_color.', 1) !important;
					border-bottom: 1px dotted rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-s-desc,
				#'.$mwall.' .mwall-detail-box .mwall-desc,
				#'.$mwall.' .mwall-detail-box .mwall-price,
				#'.$mwall.' .mwall-detail-box .mwall-hits,
				#'.$mwall.' .mwall-detail-box .mwall-comments {
					color: rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-date {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-readmore a {
					color: rgba('.$db_color.', 0.7) !important;
					border: 1px solid rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-readmore a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-readmore a:focus {
					color: rgba('.$db_color.', 1) !important;
					border: 1px solid rgba('.$db_color.', 1) !important;
				}
				
				#'.$mwall.' .mwall-detail-box .mwall-comments a,
				#'.$mwall.' .mwall-detail-box .mwall-comments > span {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-comments a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-comments a:focus {
					color: rgba('.$db_color.', 1) !important;
				}';
			$css .= '}';

			if ($detail_box_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box {
						display: none !important;
					}
				}';
			}

			if ($show_title_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-title {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-title {
						display: none !important;
					}
				}';
			}

			if ($show_introtext_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-desc {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-desc {
						display: none !important;
					}
				}';
			}

			if ($show_date_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-date {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-date {
						display: none !important;
					}
				}';
			}

			if ($show_category_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-category {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-category {
						display: none !important;
					}
				}';
			}

			if ($show_tags_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-tags {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-tags {
						display: none !important;
					}
				}';
			}

			if ($show_author_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-author {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-author {
						display: none !important;
					}
				}';
			}

			if ($show_price_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-price {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-price {
						display: none !important;
					}
				}';
			}

			if ($show_comments_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-comments {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-comments {
						display: none !important;
					}
				}';
			}

			if ($show_readmore_column == 'yes') 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-readmore {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (min-width:'.$wall_xs_size.'px) and (max-width:'.$wall_s_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-readmore {
						display: none !important;
					}
				}';
			}
		}

		// Extra Extra Small - Masonry
		if ($wall_xxs_layout == 'masonry')
		{
			$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
			{';
				$css .= '
				#'.$mwall.' .mwall-big {
					height: '.(2*$wall_xxs_height).'px;
				}
				#'.$mwall.' .mwall-horizontal {
					height: '.($wall_xxs_height).'px;
				}
				#'.$mwall.' .mwall-vertical {
					height: '.(2*$wall_xxs_height).'px;
				}
				#'.$mwall.' .mwall-small {
					height: '.($wall_xxs_height).'px;
				}

				#'.$mwall.' .mwall-photo-link {
					width: 100% !important;
					height: 100% !important;
				}';

				if ($wall_options['wall-grid'][0] == '98c')
				{
					if ((!isset($wall_options['wall-preserve-aspect-ratio'])
						|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
					{
						$css .= '
						#'.$mwall.'.mwall-columns .mwall-photo-link {
							height: '.$wall_xxs_height.'px !important;
						}';
					}
				}
			$css .= '
			}';
		}

		// Extra Extra Small - Equal columns
		if ($wall_xxs_layout == 'equal')
		{
			$items_width = number_format((float)(100 / $wall_xxs_items), 4, '.', '');

			$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
			{ ';
				if ($wall_options['wall-grid'][0] != '99v')
				{
					$css .= 
					'#'.$mwall.' .mwall-item-inner {	
						background-color: rgba('.$bg_columns.','.$bg_opacity_columns.') !important;
					}';
				}

				if ($detail_box_position_column == 'below')
				{
					$css .= '
					#'.$mwall.' .mwall-item {
						height: auto !important;
					}
					#'.$mwall.' .mwall-item-inner {
						position: static;
						width: 100% !important;
					}
					#'.$mwall.'.mwall-masonry .mwall-item-outer-cont .mwall-photo-link {
						z-index: 1;
						width: 100%;
						position: relative;
						display: flex;
						justify-content: center;
						align-items: center;
						overflow: hidden;
						height: '.$wall_xxs_height.'px !important;
					}';
				} 
				else 
				{
					$css .= '
					#'.$mwall.'.mwall-masonry .mwall-item {
						height: '.$wall_xxs_height.'px !important;
					}
					#'.$mwall.' .mwall-item-inner {
						width: 100% !important;
						top: auto !important;
						bottom: 0 !important;
						left: 0 !important;
					}
					#'.$mwall.'.mwall-masonry .mwall-item-outer-cont .mwall-photo-link {
						width: 100%;
						height: 100%;
					}';

					if ($detail_box_position_column == 'bottom')
					{
						$css .= '
						#'.$mwall.' .mwall-item-inner {
							height: auto !important;
						}
						#'.$mwall.' .mwall-item-inner.mwall-no-image {
							height: 100% !important;
						}';
					} 
					else 
					{
						$css .= '
						#'.$mwall.' .mwall-item-inner {
							height: 100% !important;
						}';
					}
				}

				if ((!isset($wall_options['wall-preserve-aspect-ratio'])
					|| $wall_options['wall-preserve-aspect-ratio'][0] == 'no'))
				{
					$css .= '
					#'.$mwall.'.mwall-columns .mwall-photo-link {
						height: '.$wall_xxs_height.'px !important;
					}';
				}

				$css .= '
				#'.$mwall.' .mwall-item {
					width: '.$items_width.'% !important;
				}
				#'.$mwall.' .mwall-item-inner .mwall-title a,
				#'.$mwall.' .mwall-item-inner .mwall-title span {
					font-size: 18px;
					line-height: 24px;
				}';

				// Detail box text color
				if ($wall_options['wall-detail-box-text-color-columns'][0] == 'light-text')
					$db_color = '255,255,255';
				else if ($wall_options['wall-detail-box-text-color-columns'][0] == 'dark-text')
					$db_color = '0,0,0';
				else 
					$db_color = $utilities->hex2RGB($wall_options['wall-detail-box-text-color-columns'][0], true);

				$css .= '
				#'.$mwall.' .mwall-detail-box h3.mwall-title a,
				#'.$mwall.' .mwall-detail-box h3.mwall-title span {
					color: rgba('.$db_color.', 0.9) !important;
				}

				#'.$mwall.' .mwall-detail-box h3.mwall-title a:hover,
				#'.$mwall.' .mwall-detail-box h3.mwall-title a:focus {
					color: rgba('.$db_color.', 1) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info a {
					color: rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-item-info a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-item-info a:focus {
					color: rgba('.$db_color.', 1) !important;
					border-bottom: 1px dotted rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-s-desc,
				#'.$mwall.' .mwall-detail-box .mwall-desc,
				#'.$mwall.' .mwall-detail-box .mwall-price,
				#'.$mwall.' .mwall-detail-box .mwall-hits,
				#'.$mwall.' .mwall-detail-box .mwall-comments {
					color: rgba('.$db_color.', 0.8) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-date {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-readmore a {
					color: rgba('.$db_color.', 0.7) !important;
					border: 1px solid rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-readmore a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-readmore a:focus {
					color: rgba('.$db_color.', 1) !important;
					border: 1px solid rgba('.$db_color.', 1) !important;
				}
				
				#'.$mwall.' .mwall-detail-box .mwall-comments a,
				#'.$mwall.' .mwall-detail-box .mwall-comments > span {
					color: rgba('.$db_color.', 0.7) !important;
				}

				#'.$mwall.' .mwall-detail-box .mwall-comments a:hover,
				#'.$mwall.' .mwall-detail-box .mwall-comments a:focus {
					color: rgba('.$db_color.', 1) !important;
				}';
			$css .= '}';

			if ($detail_box_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box {
						display: none !important;
					}
				}';
			}

			if ($show_title_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-title {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-title {
						display: none !important;
					}
				}';
			}

			if ($show_introtext_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-desc {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-desc {
						display: none !important;
					}
				}';
			}

			if ($show_date_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-date {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-date {
						display: none !important;
					}
				}';
			}

			if ($show_category_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-category {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-category {
						display: none !important;
					}
				}';
			}

			if ($show_tags_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-tags {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-tags {
						display: none !important;
					}
				}';
			}

			if ($show_author_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-author {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-item-author {
						display: none !important;
					}
				}';
			}

			if ($show_price_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-price {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-price {
						display: none !important;
					}
				}';
			}

			if ($show_comments_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-comments {
						display: block !important;
					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-comments {
						display: none !important;
					}
				}';
			}

			if ($show_readmore_column == 'yes') 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-readmore {
						display: block !important;

					}
				}';
			} 
			else 
			{
				$css .= '@media only screen and (max-width:'.$wall_xs_size_min.'px)
				{
					#'.$mwall.' .mwall-detail-box .mwall-readmore {
						display: none !important;
					}
				}';
			}
		}

		// Columns photo-link background color
		if ($wall_options['wall-grid'][0] == '98c')
		{
			$css .= '
			#'.$mwall.' .mwall-photo-link {	
				background-color: rgba('.$bg_columns.','.$bg_opacity_columns.');
			}';
		}

		// List
		if ($wall_options['wall-grid'][0] == '99v')
		{
			$css .= '
			#'.$mwall.'.mwall-list .mwall-item {
				width: 100% !important;
				height: auto !important;
			}
			#'.$mwall.'.mwall-list .mwall-item-inner {
				width: auto !important;
			}
			#'.$mwall.'.mwall-list .mwall-photo-link {
				height: auto !important;
			}
			#'.$mwall.'.mwall-list .mwall-item-inner .mwall-title a,
			#'.$mwall.'.mwall-list .mwall-item-inner .mwall-title span {
				font-size: 18px;
			}
			@media only screen and (max-width: 550px)
			{
				#'.$mwall.'.mwall-list .mwall-cover {
					width: 100%;
					max-width: inherit;
				}
				#'.$mwall.'.mwall-list .mwall-photo-link img {
					width: 100%;
					max-width: 100%;
				}
			}';
		}

		return $css;

	}

} // class
