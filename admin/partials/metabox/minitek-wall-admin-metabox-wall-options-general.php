<?php
/**
 * Provide the view for the metabox parameters: wall-options/general
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

 // Grid class - General settings
 $atts = array();
 $atts['description'] = 'An optional class to be applied to the grid container.';
 $atts['id'] = 'wall-class';
 $atts['label'] = 'Grid class';
 $atts['name'] = 'wall-class';
 $atts['placeholder'] = '';
 $atts['type'] = 'text';
 $atts['value'] = '';

 if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
     $atts['value'] = get_post_meta($post_id, $atts['id'], true);
 }

 apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

 ?><tr><?php
 include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
 ?></tr><?php

 ?><tr><th colspan="2"><hr /></th></tr><?php

 // Load FontAwesome - General settings
 $atts = array();
 $atts['description'] = 'Disable if you are already using the FontAwesome library in your template.';
 $atts['id'] = 'wall-font-awesome';
 $atts['label'] = 'Load FontAwesome';
 $atts['name'] = 'wall-font-awesome';
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

 // Load Lightbox2 - General settings
 $atts = array();
 $atts['description'] = 'Disable if you are already using the Lightbox2 library in your template.';
 $atts['id'] = 'wall-lightbox';
 $atts['label'] = 'Load Lightbox2';
 $atts['name'] = 'wall-lightbox';
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
 ?></tr>
