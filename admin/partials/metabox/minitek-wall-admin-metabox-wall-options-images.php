<?php
/**
 * Provide the view for the metabox parameters: wall-options/images
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

// Show images - Image settings
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-show-images';
$atts['label'] = 'Show images';
$atts['name'] = 'wall-show-images';
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

// Enable image link - Image settings
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-image-link';
$atts['label'] = 'Enable image link';
$atts['name'] = 'wall-image-link';
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

// Image type - Image settings
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-image-type';
$atts['label'] = 'Image type';
$atts['name'] = 'wall-image-type';
$atts['type'] = 'radio';
$atts['value'] = 'featured';
$atts['selections'] = array(
  array(
    'value' => 'featured',
    'label' => 'Featured',
    'desc' => 'If not found, the inline image will be used instead.'
  ),
  array(
    'value' => 'inline',
    'label' => 'Inline',
    'desc' => 'The first image found in the post content.'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
?></tr><?php

// Full size image - Image settings
$atts = array();
$atts['description'] = 'If enabled, the image will cover the whole item container and will be visible behind the detail box.';
$atts['id'] = 'wall-full-image';
$atts['label'] = 'Full size image';
$atts['name'] = 'wall-full-image';
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

// Crop images - Image settings
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-crop-images';
$atts['label'] = 'Crop images';
$atts['name'] = 'wall-crop-images';
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

// Image width - Image settings
$atts = array();
$atts['description'] = 'In pixels.';
$atts['id'] = 'wall-image-width';
$atts['label'] = 'Image width';
$atts['name'] = 'wall-image-width';
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

// Image height - Image settings
$atts = array();
$atts['description'] = 'In pixels.';
$atts['id'] = 'wall-image-height';
$atts['label'] = 'Image height';
$atts['name'] = 'wall-image-height';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '300';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// Preserve aspect ratio - Image settings
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-preserve-aspect-ratio';
$atts['label'] = 'Preserve aspect ratio';
$atts['name'] = 'wall-preserve-aspect-ratio';
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

// Fallback image - Image settings
$atts = array();
$atts['description'] = 'Absolute url. The fallback image will be displayed if there is no featured or inline image.';
$atts['id'] = 'wall-fallback-image';
$atts['label'] = 'Fallback image';
$atts['name'] = 'wall-fallback-image';
$atts['placeholder'] = 'Path to image';
$atts['type'] = 'text';
$atts['value'] = '';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr>