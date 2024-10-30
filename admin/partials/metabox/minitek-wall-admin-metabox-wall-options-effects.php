<?php
/**
 * Provide the view for the metabox parameters: wall-options/effects
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

// Effects - Effects
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-effects';
$atts['label'] = 'Effects';
$atts['name'] = 'wall-effects[]'; // [] for array
$atts['type'] = 'checkbox';
$atts['value'] = array('fade');
$atts['selections'] = array(
  array(
    'value' => 'fade',
    'label' => 'Fade'
  ),
  array(
    'value' => 'scale',
    'label' => 'Scale'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-checkbox.php' );
?></tr><?php

// Transition duration - Effects
$atts = array();
$atts['description'] = 'The duration of the transition in milliseconds.';
$atts['id'] = 'wall-transition-duration';
$atts['label'] = 'Transition duration';
$atts['name'] = 'wall-transition-duration';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '400';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// Transition stagger - Effects
$atts = array();
$atts['description'] = 'In milliseconds. Items transition will occur incrementally with a time delay.';
$atts['id'] = 'wall-transition-stagger';
$atts['label'] = 'Transition stagger';
$atts['name'] = 'wall-transition-stagger';
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