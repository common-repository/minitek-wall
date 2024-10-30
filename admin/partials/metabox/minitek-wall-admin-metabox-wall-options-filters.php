<?php
/**
 * Provide the view for the metabox parameters: wall-options/filters
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

// Theme color
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-filters-color';
$atts['label'] = 'Theme color';
$atts['name'] = 'wall-filters-color';
$atts['placeholder'] = '';
$atts['type'] = 'color';
$atts['value'] = '#dd5f5f';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
?></tr><?php

// Border radius
$atts = array();
$atts['description'] = 'In pixels.';
$atts['id'] = 'wall-filters-border-radius';
$atts['label'] = 'Border radius';
$atts['name'] = 'wall-filters-border-radius';
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

// Reset button
$atts = array();
$atts['description'] = 'Resets the grid to its original state.';
$atts['id'] = 'wall-reset-button';
$atts['label'] = 'Reset button';
$atts['name'] = 'wall-reset-button';
$atts['type'] = 'radio';
$atts['value'] = 'yes';
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

// Close on select
$atts = array();
$atts['description'] = 'Close dropdown list when selecting a filter.';
$atts['id'] = 'wall-close-on-select';
$atts['label'] = 'Close on select';
$atts['name'] = 'wall-close-on-select';
$atts['type'] = 'radio';
$atts['value'] = 'yes';
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

?><tr><th colspan="2"><hr /></th></tr><?php

// Mode
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-filters-mode';
$atts['label'] = 'Mode';
$atts['name'] = 'wall-filters-mode';
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

// Ordering
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-filters-ordering';
$atts['label'] = 'Ordering';
$atts['name'] = 'wall-filters-ordering';
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

// Ordering direction
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-filters-direction';
$atts['label'] = 'Ordering direction';
$atts['name'] = 'wall-filters-direction';
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

// Category filters
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-category-filters';
$atts['label'] = 'Category filters';
$atts['name'] = 'wall-category-filters';
$atts['type'] = 'select';
$atts['value'] = '1';
$atts['selections'] = array(
  array(
    'value' => 'none',
    'label' => 'None'
  ),
  array(
    'value' => '1',
    'label' => 'Dropdown list'
  ),
  array(
    'value' => '2',
    'label' => 'Inline buttons'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Category filters title
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-category-filters-title';
$atts['label'] = 'Category filters title';
$atts['name'] = 'wall-category-filters-title';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = 'Filter by category';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// Tag filters
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-tag-filters';
$atts['label'] = 'Tag filters';
$atts['name'] = 'wall-tag-filters';
$atts['type'] = 'select';
$atts['value'] = 'none';
$atts['selections'] = array(
  array(
    'value' => 'none',
    'label' => 'None'
  ),
  array(
    'value' => '1',
    'label' => 'Dropdown list'
  ),
  array(
    'value' => '2',
    'label' => 'Inline buttons'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Tag filters title
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-tag-filters-title';
$atts['label'] = 'Tag filters title';
$atts['name'] = 'wall-tag-filters-title';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = 'Filter by tag';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// Date filters
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-date-filters';
$atts['label'] = 'Date filters';
$atts['name'] = 'wall-date-filters';
$atts['type'] = 'select';
$atts['value'] = 'none';
$atts['selections'] = array(
  array(
    'value' => 'none',
    'label' => 'None'
  ),
  array(
    'value' => '1',
    'label' => 'Dropdown list'
  ),
  array(
    'value' => '2',
    'label' => 'Inline buttons'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Date filters title
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-date-filters-title';
$atts['label'] = 'Date filters title';
$atts['name'] = 'wall-date-filters-title';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = 'Filter by date';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

?><tr><th colspan="2"><hr /></th></tr><?php

// Sorting type
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-sorting-type';
$atts['label'] = 'Sorting type';
$atts['name'] = 'wall-sorting-type';
$atts['type'] = 'select';
$atts['value'] = 'none';
$atts['selections'] = array(
  array(
    'value' => 'none',
    'label' => 'None'
  ),
  array(
    'value' => '1',
    'label' => 'Dropdown list'
  ),
  array(
    'value' => '2',
    'label' => 'Inline buttons'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Title sorting
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-title-sorting';
$atts['label'] = 'Title sorting';
$atts['name'] = 'wall-title-sorting';
$atts['type'] = 'select';
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
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Date created sorting
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-date-sorting';
$atts['label'] = 'Date created sorting';
$atts['name'] = 'wall-date-sorting';
$atts['type'] = 'select';
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
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Comments sorting
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-comments-sorting';
$atts['label'] = 'Comments count sorting';
$atts['name'] = 'wall-comments-sorting';
$atts['type'] = 'select';
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
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr><?php

// Sorting direction
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-sorting-direction';
$atts['label'] = 'Sorting direction';
$atts['name'] = 'wall-sorting-direction';
$atts['type'] = 'select';
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
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
?></tr>