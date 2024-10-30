<?php
/**
 * Provide the view for the metabox parameters: wall-options/pagination
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

// Pagination type - Pagination
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-pagination-type';
$atts['label'] = 'Pagination type';
$atts['name'] = 'wall-pagination-type';
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

?><tr><th colspan="2"><hr /></th></tr><?php

// Initial Items - Pagination
$atts = array();
$atts['description'] = 'The amount of items to be initially loaded in the grid.';
$atts['id'] = 'wall-initial-items';
$atts['label'] = 'Initial items';
$atts['name'] = 'wall-initial-items';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '3';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// Items per page - Pagination
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-items-per-page';
$atts['label'] = 'Items per page';
$atts['name'] = 'wall-items-per-page';
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

// Additional pages - Pagination
$atts = array();
$atts['description'] = 'Additional pages after initial items. Enter -1 for no limit.';
$atts['id'] = 'wall-additional-pages';
$atts['label'] = 'Additional pages';
$atts['name'] = 'wall-additional-pages';
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

// Show remaining items - Pagination
$atts = array();
$atts['description'] = 'Show count of remaining items.';
$atts['id'] = 'wall-remaining-items';
$atts['label'] = 'Show remaining items';
$atts['name'] = 'wall-remaining-items';
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

// Reset button - Pagination
$atts = array();
$atts['description'] = 'If there are active filters, a reset button will be displayed next to the pagination button.';
$atts['id'] = 'wall-pagination-reset';
$atts['label'] = 'Reset button';
$atts['name'] = 'wall-pagination-reset';
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

// Scroll to top - Pagination
$atts = array();
$atts['description'] = 'Scrolls to the top of the widget container after loading a new page (does not apply for Load more button and Infinite scroll.';
$atts['id'] = 'wall-scroll-to-top';
$atts['label'] = 'Scroll to top';
$atts['name'] = 'wall-scroll-to-top';
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

?><tr><th colspan="2"><hr /></th></tr><?php

// Arrows style - Pagination
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-pagination-arrows';
$atts['label'] = 'Arrows style';
$atts['name'] = 'wall-pagination-arrows';
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

?><tr><th colspan="2"><hr /></th></tr><?php

// Theme color - Pagination
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-pagination-color';
$atts['label'] = 'Theme color';
$atts['name'] = 'wall-pagination-color';
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

// Text color - Pagination
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-pagination-text-color';
$atts['label'] = 'Text color';
$atts['name'] = 'wall-pagination-text-color';
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

// Border radius - Pagination
$atts = array();
$atts['description'] = 'In pixels.';
$atts['id'] = 'wall-pagination-border-radius';
$atts['label'] = 'Border radius';
$atts['name'] = 'wall-pagination-border-radius';
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