<?php
/**
 * Provide the view for the metabox parameters: wall-options/responsive
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

// Enable responsive levels
$atts = array();
$atts['description'] = 'If disabled, the wall layout will be the same for all screen sizes.';
$atts['id'] = 'wall-responsive-levels';
$atts['label'] = 'Enable responsive levels';
$atts['name'] = 'wall-responsive-levels';
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

?><tr><th colspan="2"><h4><?php esc_html_e( 'Large screen', 'minitek-wall' ); ?></h4></th></tr><?php

// L size limit - Responsive levels
$atts = array();
$atts['description'] = 'Lower size limit in pixels.';
$atts['id'] = 'wall-l-size';
$atts['label'] = 'Size limit';
$atts['name'] = 'wall-l-size';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '1200';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// L cell height - Responsive levels
$atts = array();
$atts['description'] = 'Cell height in pixels.';
$atts['id'] = 'wall-l-height';
$atts['label'] = 'Cell height';
$atts['name'] = 'wall-l-height';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '240';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

?><tr><th colspan="2"><h4><?php esc_html_e( 'Medium screen', 'minitek-wall' ); ?></h4></th></tr><?php

// M size - Responsive levels
$atts = array();
$atts['description'] = 'Lower size limit in pixels.';
$atts['id'] = 'wall-m-size';
$atts['label'] = 'Size limit';
$atts['name'] = 'wall-m-size';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '980';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// M cell height - Responsive levels
$atts = array();
$atts['description'] = 'Cell height in pixels.';
$atts['id'] = 'wall-m-height';
$atts['label'] = 'Cell height';
$atts['name'] = 'wall-m-height';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '240';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// M layout - Responsive
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-m-layout';
$atts['label'] = 'Layout';
$atts['name'] = 'wall-m-layout';
$atts['type'] = 'radio';
$atts['value'] = 'masonry';
$atts['selections'] = array(
  array(
    'value' => 'masonry',
    'label' => 'Masonry grid'
  ),
  array(
    'value' => 'equal',
    'label' => 'Equal columns'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
?></tr><?php

// M items - Responsive
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-m-items';
$atts['label'] = 'Items per row';
$atts['name'] = 'wall-m-items';
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

?><tr><th colspan="2"><h4><?php esc_html_e( 'Small screen', 'minitek-wall' ); ?></h4></th></tr><?php

// S size - Responsive
$atts = array();
$atts['description'] = 'Lower size limit in pixels.';
$atts['id'] = 'wall-s-size';
$atts['label'] = 'Size limit';
$atts['name'] = 'wall-s-size';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '768';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// S cell height - Responsive
$atts = array();
$atts['description'] = 'Cell height in pixels.';
$atts['id'] = 'wall-s-height';
$atts['label'] = 'Cell height';
$atts['name'] = 'wall-s-height';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '240';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// S layout - Responsive
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-s-layout';
$atts['label'] = 'Layout';
$atts['name'] = 'wall-s-layout';
$atts['type'] = 'radio';
$atts['value'] = 'masonry';
$atts['selections'] = array(
  array(
    'value' => 'masonry',
    'label' => 'Masonry grid'
  ),
  array(
    'value' => 'equal',
    'label' => 'Equal columns'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
?></tr><?php

// S items - Responsive
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-s-items';
$atts['label'] = 'Items per row';
$atts['name'] = 'wall-s-items';
$atts['type'] = 'select';
$atts['value'] = '2';
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

?><tr><th colspan="2"><h4><?php esc_html_e( 'Extra small screen', 'minitek-wall' ); ?></h4></th></tr><?php

// XS size limit - Responsive
$atts = array();
$atts['description'] = 'Lower size limit in pixels.';
$atts['id'] = 'wall-xs-size';
$atts['label'] = 'Size limit';
$atts['name'] = 'wall-xs-size';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '480';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// XS cell height - Responsive
$atts = array();
$atts['description'] = 'Cell height in pixels.';
$atts['id'] = 'wall-xs-height';
$atts['label'] = 'Cell height';
$atts['name'] = 'wall-xs-height';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '240';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// XS layout - Responsive
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-xs-layout';
$atts['label'] = 'Layout';
$atts['name'] = 'wall-xs-layout';
$atts['type'] = 'radio';
$atts['value'] = 'masonry';
$atts['selections'] = array(
  array(
    'value' => 'masonry',
    'label' => 'Masonry grid'
  ),
  array(
    'value' => 'equal',
    'label' => 'Equal columns'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
?></tr><?php

// XS items - Responsive
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-xs-items';
$atts['label'] = 'Items per row';
$atts['name'] = 'wall-xs-items';
$atts['type'] = 'select';
$atts['value'] = '2';
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

?><tr><th colspan="2"><h4><?php esc_html_e( 'Extra extra small screen', 'minitek-wall' ); ?></h4></th></tr><?php

// XXS cell height - Responsive
$atts = array();
$atts['description'] = 'Cell height in pixels.';
$atts['id'] = 'wall-xxs-height';
$atts['label'] = 'Cell height';
$atts['name'] = 'wall-xxs-height';
$atts['placeholder'] = '';
$atts['type'] = 'text';
$atts['value'] = '240';

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
?></tr><?php

// XXS layout - Responsive
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-xxs-layout';
$atts['label'] = 'Layout';
$atts['name'] = 'wall-xxs-layout';
$atts['type'] = 'radio';
$atts['value'] = 'masonry';
$atts['selections'] = array(
  array(
    'value' => 'masonry',
    'label' => 'Masonry grid'
  ),
  array(
    'value' => 'equal',
    'label' => 'Equal columns'
  )
);

if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
  $atts['value'] = get_post_meta($post_id, $atts['id'], true);
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><tr><?php
include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
?></tr><?php

// XXS items - Responsive
$atts = array();
$atts['description'] = '';
$atts['id'] = 'wall-xxs-items';
$atts['label'] = 'Items per row';
$atts['name'] = 'wall-xxs-items';
$atts['type'] = 'select';
$atts['value'] = '1';
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
?></tr>