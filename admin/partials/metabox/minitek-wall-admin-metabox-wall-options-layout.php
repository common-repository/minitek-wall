<?php
/**
 * Provide the view for the metabox parameters: wall-options/layout
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

// Preset grids
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-grid';
$atts['label'] = 'Preset grids';
$atts['name'] = 'wall-grid';
$atts['type'] = 'radio';
$atts['value'] = '3a';
$atts['selections'] = array(
  array(
    'value' => '1',
    'label' => 'Masonry - Grid 1',
    'image' => 'masonry/grid1.jpg',
  ),
  array(
    'value' => '3a',
    'label' => 'Masonry - Grid 3a',
    'image' => 'masonry/grid3a.jpg',
  ),
  array(
    'value' => '3b',
    'label' => 'Masonry - Grid 3b',
    'image' => 'masonry/grid3b.jpg',
  ),
  array(
    'value' => '3c',
    'label' => 'Masonry - Grid 3c',
    'image' => 'masonry/grid3c.jpg',
  ),
  array(
    'value' => '4',
    'label' => 'Masonry - Grid 4',
    'image' => 'masonry/grid4.jpg',
  ),
  array(
    'value' => '5',
    'label' => 'Masonry - Grid 5a',
    'image' => 'masonry/grid5a.jpg',
  ),
  array(
    'value' => '5b',
    'label' => 'Masonry - Grid 5b',
    'image' => 'masonry/grid5b.jpg',
  ),
  array(
    'value' => '6',
    'label' => 'Masonry - Grid 6',
    'image' => 'masonry/grid6.jpg',
  ),
  array(
    'value' => '7',
    'label' => 'Masonry - Grid 7',
    'image' => 'masonry/grid7.jpg',
  ),
  array(
    'value' => '8',
    'label' => 'Masonry - Grid 8',
    'image' => 'masonry/grid8.jpg',
  ),
  array(
    'value' => '9',
    'label' => 'Masonry - Grid 9',
    'image' => 'masonry/grid9.jpg',
  ),
  array(
    'value' => '98c',
    'label' => 'Equal Columns',
    'image' => 'masonry/gridc.jpg',
  ),
  array(
    'value' => '9r',
    'label' => 'Rows - Grid 9',
    'image' => 'masonry/gridr9.jpg',
  ),
  array(
    'value' => '12r',
    'label' => 'Rows - Grid 12',
    'image' => 'masonry/gridr12.jpg',
  ),
  array(
    'value' => '16r',
    'label' => 'Rows - Grid 16',
    'image' => 'masonry/gridr16.jpg',
  ),
  array(
    'value' => '99v',
    'label' => 'Vertical List',
    'image' => 'masonry/gridv.jpg',
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-wall-grids.php' );
?></tr><?php

?><tr><th colspan="2"><hr /></th></tr><?php

// Custom Grid
$atts = array();
$atts['description'] = 'Select a custom grid.';
$atts['id'] = 'wall-custom-grid';
$atts['label'] = 'Custom Grid';
$atts['name'] = 'wall-custom-grid';
$atts['type'] = 'text';
$atts['value'] = '';
$atts['pro'] = true;

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// Columns
$atts = array();
$atts['description'] = 'Number of columns for Equal Columns layout.';
$atts['id'] = 'wall-columns';
$atts['label'] = 'Columns';
$atts['name'] = 'wall-columns';
$atts['type'] = 'select';
$atts['value'] = '3';
$atts['selections'] = array(
  array(
    'value' => '1',
    'label' => '1'
  ),
  array(
    'value' => '2',
    'label' => '2'
  ),
  array(
    'value' => '3',
    'label' => '3'
  ),
  array(
    'value' => '4',
    'label' => '4'
  ),
  array(
    'value' => '5',
    'label' => '5'
  ),
  array(
    'value' => '6',
    'label' => '6'
  ),
  array(
    'value' => '7',
    'label' => '7'
  ),
  array(
    'value' => '8',
    'label' => '8'
  ),
  array(
    'value' => '9',
    'label' => '9'
  ),
  array(
    'value' => '10',
    'label' => '10'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Layout mode
$atts = array();
$atts['description'] = 'Masonry: The default layout mode. Items are arranged in a vertically cascading grid. FitRows: Items are arranged into rows. Works well for items that have the same height.';
$atts['id'] = 'wall-layout-mode';
$atts['label'] = 'Layout mode';
$atts['name'] = 'wall-layout-mode';
$atts['type'] = 'select';
$atts['value'] = 'packery';
$atts['selections'] = array(
  array(
    'value' => 'packery',
    'label' => 'Masonry'
  ),
  array(
    'value' => 'fitRows',
    'label' => 'FitRows'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Force equal height
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-force-equal-height';
$atts['label'] = 'Force equal height';
$atts['name'] = 'wall-force-equal-height';
$atts['type'] = 'radio';
$atts['value'] = 'no';
$atts['selections'] = array(
  array(
    'value' => 'yes',
    'label' => 'Yes'
  ),
  array(
    'value' => 'no',
    'label' => 'No'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
?></tr><?php

// Gutter
$atts = array();
$atts['description'] = 'Space around each item (in pixels).';
$atts['id'] = 'wall-gutter';
$atts['label'] = 'Gutter';
$atts['name'] = 'wall-gutter';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '0';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}
else if ( !metadata_exists( 'post', $post_id, $atts['id'] ) ) {
  $atts['value'] = '5';
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// Item border - Item settings
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-item-border';
$atts['label'] = 'Item border';
$atts['name'] = 'wall-item-border';
$atts['type'] = 'radio';
$atts['value'] = 'no';
$atts['selections'] = array(
  array(
    'value' => 'yes',
    'label' => 'Yes'
  ),
  array(
    'value' => 'no',
    'label' => 'No'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
?></tr><?php

// Border size - Item settings
$atts = array();
$atts['description'] = 'In pixels.';
$atts['id'] = 'wall-border-size';
$atts['label'] = 'Border size';
$atts['name'] = 'wall-border-size';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '0';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// Border color - Item settings
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-border-color';
$atts['label'] = 'Border color';
$atts['name'] = 'wall-border-color';
$atts['placeholder'] = '';
$atts['type'] = 'color';
$atts['value'] = '#CCCCCC';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
?></tr><?php

// Border radius - Item settings
$atts = array();
$atts['description'] = 'In pixels.';
$atts['id'] = 'wall-border-radius';
$atts['label'] = 'Border radius';
$atts['name'] = 'wall-border-radius';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '0';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr>