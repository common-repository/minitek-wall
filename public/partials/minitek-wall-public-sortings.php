<?php
/**
 * This file is used to markup the Wall sortings.
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/public/partials
 */

// Active sorting direction
$asc_dir_active = '';
$desc_dir_active = '';

if ($this->wall_ordering_direction == 'ASC')
{
	$asc_dir_active = 'mwall-filter-active';
}
else
{
	$desc_dir_active = 'mwall-filter-active';
}

// Active sorting
$author_sort_active = '';
$title_sort_active = '';
$date_sort_active = '';
$modified_sort_active = '';
$comment_count_sort_active = '';

switch ($this->wall_ordering)
{
	case 'title';
		$title_sort_active = 'mwall-filter-active';

		break;

	case 'date';
		$date_sort_active = 'mwall-filter-active';

		break;

	case 'modified';
		$modified_sort_active = 'mwall-filter-active';

		break;

	case 'comment_count';
		$comment_count_sort_active = 'mwall-filter-active';

		break;
}


// Inline sortings
if ($wall_options['wall-sorting-type'][0] == '2')
{
	?><div class="mwall-sortings-group sorting-group sorting-group-filters mwall-buttons">
		<span><?php echo __( 'Sort by', 'minitek-wall' ); ?></span>
		<ul><?php
			// Title sorting
			if ($wall_options['wall-title-sorting'][0] == 'yes')
			{
				?><li>
					<a href="#" data-sort-value="title" class="mwall-filter <?php echo $title_sort_active;?>"><?php 
						echo __( 'Title', 'minitek-wall' ); 
					?></a>
				</li><?php
			}

			// Date created sorting
			if ($wall_options['wall-date-sorting'][0] == 'yes')
			{
				?><li>
					<a href="#" data-sort-value="date" class="mwall-filter <?php echo $date_sort_active;?>"><?php 
						echo __( 'Date created', 'minitek-wall' ); 
					?></a>
				</li><?php
			}

			// Comments sorting
			if ($wall_options['wall-comments-sorting'][0] == 'yes')
			{
				?><li>
					<a href="#" data-sort-value="comment_count" class="mwall-filter <?php echo $comment_count_sort_active;?>"><?php 
						echo __( 'Comments count', 'minitek-wall' ); 
					?></a>
				</li><?php
			}
		?></ul>
	</div><?php 

	// Inline direction
	if ($wall_options['wall-sorting-direction'][0] == 'yes')
	{ 
		?><div class="mwall-sortings-group sorting-group sorting-group-direction mwall-buttons">
			<span><?php echo __( 'Sorting direction', 'minitek-wall' ); ?></span>
			<ul>
				<li>
					<a href="#" data-sort-value="asc" class="mwall-filter <?php echo $asc_dir_active; ?>"><?php 
						echo __( 'Ascending', 'minitek-wall' ); 
					?></a>
				</li>
				<li>
					<a href="#" data-sort-value="desc" class="mwall-filter <?php echo $desc_dir_active; ?>"><?php 
						echo __( 'Descending', 'minitek-wall' ); 
					?></a>
				</li>
			</ul>
		</div><?php
	}
}

// Dropdown sortings
if ($wall_options['wall-sorting-type'][0] == '1')
{
	?><div class="mwall-sortings-group">
		<div class="mwall-dropdown">
			<div class="dropdown-label sorting-label">
				<span data-label="<?php echo __( 'Sort by', 'minitek-wall' ); ?>">
					<i class="fa fa-angle-down"></i><span><?php echo __( 'Sort by', 'minitek-wall' ); ?></span>
				</span>
			</div>
			<ul class="sorting-group sorting-group-filters"><?php 
				// Title sorting
				if ($wall_options['wall-title-sorting'][0] == 'yes')
				{
					?><li>
						<a href="#" data-sort-value="title" class="mwall-filter <?php echo $title_sort_active;?>"><?php 
							echo __( 'Title', 'minitek-wall' ); 
						?></a>
					</li><?php
				}

				// Date created sorting
				if ($wall_options['wall-date-sorting'][0] == 'yes')
				{
					?><li>
						<a href="#" data-sort-value="date" class="mwall-filter <?php echo $date_sort_active;?>"><?php 
							echo __( 'Date created', 'minitek-wall' ); 
						?></a>
					</li><?php
				}

				// Comments sorting
				if ($wall_options['wall-comments-sorting'][0] == 'yes')
				{
					?><li>
						<a href="#" data-sort-value="comment_count" class="mwall-filter <?php echo $comment_count_sort_active;?>"><?php 
							echo __( 'Comments count', 'minitek-wall' ); 
						?></a>
					</li><?php
				}
			?></ul>
		</div>
	</div><?php 

	// Dropdown sorting direction
	if ($wall_options['wall-sorting-direction'][0] == 'yes')
	{
		?><div class="mwall-sortings-group">
			<div class="mwall-dropdown">
				<div class="dropdown-label sorting-label">
					<span data-label="<?php echo __( 'Sorting direction', 'minitek-wall' ); ?>">
						<i class="fa fa-angle-down"></i><span><?php echo __( 'Sorting direction', 'minitek-wall' ); ?></span>
					</span>
				</div>
				<ul class="sorting-group sorting-group-direction">
					<li>
						<a href="#" data-sort-value="asc" class="mwall-filter <?php echo $asc_dir_active; ?>"><?php 
							echo __( 'Ascending', 'minitek-wall' ); 
						?></a>
					</li>
					<li>
						<a href="#" data-sort-value="desc" class="mwall-filter <?php echo $desc_dir_active; ?>"><?php 
							echo __( 'Descending', 'minitek-wall' ); 
						?></a>
					</li>
				</ul>
			</div>
		</div><?php
	}
}