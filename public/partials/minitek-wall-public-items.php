<?php
/**
 * This file is used to markup the grid items.
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/public/partials
 */

if ($wall_options['wall-grid'][0] == '98c')
{
	include( plugin_dir_path( __FILE__ ) . 'grids/masonry-columns.php' );
}
else if ($wall_options['wall-grid'][0] == '99v')
{
	include( plugin_dir_path( __FILE__ ) . 'grids/masonry-list.php' );
}
else
{
	include( plugin_dir_path( __FILE__ ) . 'grids/masonry.php' );
}
