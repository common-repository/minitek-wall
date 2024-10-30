<?php
/**
 * This file is used to markup the Wall filters.
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/public/partials
 */

$category_title = isset($wall_options['wall-category-filters-title'][0])
	? $wall_options['wall-category-filters-title'][0] 
	: 'Filter by category';

$tag_title = isset($wall_options['wall-tag-filters-title'][0])
	? $wall_options['wall-tag-filters-title'][0] 
	: 'Filter by tag';

$date_title = isset($wall_options['wall-date-filters-title'][0])
? $wall_options['wall-date-filters-title'][0] 
: 'Filter by date';

// Category filters
if ($wall_options['wall-category-filters'][0] != 'none')
{
	if (!empty($cat_array))
	{
		// Dropdown list
		if ($wall_options['wall-category-filters'][0] == '1')
		{
			?><div class="mwall-filters-group">
				<div class="mwall-dropdown">
					<div class="dropdown-label cat-label">
						<span data-label="<?php echo __($category_title, 'minitek-wall'); ?>">
							<i class="fa fa-angle-down"></i><span><?php echo __($category_title, 'minitek-wall'); ?></span>
						</span>
					</div>
					<ul class="button-group button-group-category" data-filter-group="category">

						<li>
							<a href="#" data-id="0" data-filter="" class="mwall-filter mwall-filter-active"><?php 
								echo __('Show all', 'minitek-wall'); 
							?></a>
						</li><?php

						foreach ($cat_array as $key => $category)
						{ 
							?><li>
								<a href="#" data-id="<?php echo $key; ?>" data-filter=".cat-<?php echo $category->slug; ?>" class="mwall-filter"><?php 
									echo $category->name; 
								?></a>
							</li><?php
						}
					?></ul>
				</div>
			</div><?php
		}
		// Inline buttons
		else if ($wall_options['wall-category-filters'][0] == '2')
		{
			?><div class="mwall-filters-group button-group button-group-category mwall-buttons" data-filter-group="category">
				<span><?php echo __($category_title, 'minitek-wall'); ?></span>
				<ul>
					<li>
						<a href="#" data-id="0" data-filter="" class="mwall-filter mwall-filter-active"><?php 
							echo __('Show all', 'minitek-wall'); 
						?></a>
					</li><?php
		
					foreach ($cat_array as $key => $category)
					{
						?><li>
							<a href="#" data-id="<?php echo $key; ?>" data-filter=".cat-<?php echo $category->slug; ?>" class="mwall-filter"><?php 
								echo $category->name; 
							?></a>
						</li><?php
					}
				?></ul>
			</div><?php
		}
	}
}

// Tag filters
if ($wall_options['wall-tag-filters'][0] != 'none')
{
	if (!empty($tag_array))
	{
		// Dropdown list
		if ($wall_options['wall-tag-filters'][0] == '1')
		{
			?><div class="mwall-filters-group">
				<div class="mwall-dropdown">
					<div class="dropdown-label tag-label">
						<span data-label="<?php echo __($tag_title, 'minitek-wall'); ?>">
							<i class="fa fa-angle-down"></i><span><?php echo __($tag_title, 'minitek-wall'); ?></span>
						</span>
					</div>
					<ul class="button-group button-group-tag" data-filter-group="tag">
						<li>
							<a href="#" data-id="0" data-filter="" class="mwall-filter mwall-filter-active"><?php 
								echo __('View all', 'minitek-wall'); 
							?></a>
						</li><?php

						foreach ($tag_array as $key => $tag)
						{
							?><li>
								<a href="#" data-id="<?php echo $key; ?>" data-filter=".tag-<?php echo $tag->slug; ?>" class="mwall-filter"><?php 
									echo $tag->name; 
								?></a>
							</li><?php
						}
					?></ul>
				</div>
			</div><?php
		}
		// Inline buttons
		else if ($wall_options['wall-tag-filters'][0] == '2')
		{
			?><div class="mwall-filters-group button-group button-group-tag mwall-buttons" data-filter-group="tag">
				<span><?php echo __($tag_title, 'minitek-wall'); ?></span>
				<ul>
					<li>
						<a href="#" data-id="0" data-filter="" class="mwall-filter mwall-filter-active"><?php 
							echo __('Show all', 'minitek-wall'); 
						?></a>
					</li><?php

					foreach ($tag_array as $key => $tag)
					{ 
						?><li>
							<a href="#" data-id="<?php echo $key; ?>" data-filter=".tag-<?php echo $tag->slug; ?>" class="mwall-filter"><?php 
								echo $tag->name; 
							?></a>
						</li><?php
					} 
				?></ul>
			</div><?php
		}
	}
}

// Date filters
if ($wall_options['wall-date-filters'][0] != 'none')
{
	if (!empty($date_array))
	{
		// Dropdown list
		if ($wall_options['wall-date-filters'][0] == '1')
		{
			?><div class="mwall-filters-group">
				<div class="mwall-dropdown">
					<div class="dropdown-label date-label">
						<span data-label="<?php echo __($date_title, 'minitek-wall'); ?>">
							<i class="fa fa-angle-down"></i><span><?php echo __($date_title, 'minitek-wall'); ?></span>
						</span>
					</div>
					<ul class="button-group button-group-date" data-filter-group="date">
						<li>
							<a href="#" data-id="0" data-filter="" class="mwall-filter mwall-filter-active"><?php 
								echo __('Show all', 'minitek-wall'); 
							?></a>
						</li><?php

						foreach ($date_array as $date)
						{ 
							?><li>
								<a href="#" data-id="<?php echo $date; ?>" data-filter=".date-<?php echo $date; ?>" class="mwall-filter"><?php 
									echo date_i18n( 'M Y', strtotime($date) ); 
								?></a>
							</li><?php
						} 
					?></ul>
				</div>
			</div><?php
		}
		// Inline buttons
		else if ($wall_options['wall-date-filters'][0] == '2')
		{
			?><div class="mwall-filters-group button-group button-group-date mwall-buttons" data-filter-group="date">
				<span><?php echo __($date_title, 'minitek-wall'); ?></span>
				<ul>
					<li>
						<a href="#" data-id="0" data-filter="" class="mwall-filter mwall-filter-active"><?php 
							echo __('Show all', 'minitek-wall'); 
						?></a>
					</li><?php
		
					foreach ($date_array as $date)
					{
						?><li>
							<a href="#" data-id="<?php echo $date; ?>" data-filter=".date-<?php echo $date; ?>" class="mwall-filter"><?php 
								echo date_i18n( 'M Y', strtotime($date) ); 
							?></a>
						</li><?php
					}
				?></ul>
			</div><?php
		}
	}
}