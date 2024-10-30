<?php
/**
 * Provide the view for the metabox parameters: wall-options/detail-box
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */
?>

<div id="mwall-admin-metabox-detail-box-general">
<table class="form-table">
<tbody>
<?php

  // Title limit - Item settings
  $atts = array();
  $atts['description'] 	= 'Word limit for title.';
  $atts['id'] = 'wall-title-limit';
  $atts['label'] = 'Title limit';
  $atts['name'] = 'wall-title-limit';
  $atts['placeholder'] = '';
  $atts['type'] = 'text';
  $atts['value'] = '8';

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
  ?></tr><?php

  // Title link - Item settings
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-title-link';
  $atts['label'] = 'Enable title link';
  $atts['name'] = 'wall-title-link';
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

  // Introtext limit - Item settings
  $atts = array();
  $atts['description'] = 'Word limit for introtext.';
  $atts['id'] = 'wall-introtext-limit';
  $atts['label'] = 'Introtext limit';
  $atts['name'] = 'wall-introtext-limit';
  $atts['placeholder'] = '';
  $atts['type'] = 'text';
  $atts['value'] = '15';

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
  ?></tr><?php

  // Strip html - Item settings
  $atts = array();
  $atts['description'] = 'If disabled, the introtext limit will be ignored.';
  $atts['id'] = 'wall-strip-html';
  $atts['label'] = 'Strip introtext html';
  $atts['name'] = 'wall-strip-html';
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

  // Date format - Item settings
  $atts = array();
  $atts['description'] = 'Documentation on date and time formatting.';
  $atts['id'] = 'wall-date-format';
  $atts['label'] = 'Date format';
  $atts['name'] = 'wall-date-format';
  $atts['placeholder'] = '';
  $atts['type'] = 'text';
  $atts['value'] = 'l F d';
  $atts['desc_link'] = 'https://codex.wordpress.org/Formatting_Date_and_Time';

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
  ?></tr><?php

?>
</tbody>
</table>
</div>

<div id="mwall-admin-metabox-detail-box-tabs">
  <h2 class="nav-tab-wrapper current">
    <a class="nav-tab nav-tab-active" href="javascript:;"><?php echo esc_html__( 'Big', 'minitek-wall' ); ?></a>
    <a class="nav-tab" href="javascript:;"><?php echo esc_html__( 'Landscape', 'minitek-wall' ); ?></a>
    <a class="nav-tab" href="javascript:;"><?php echo esc_html__( 'Portrait', 'minitek-wall' ); ?></a>
    <a class="nav-tab" href="javascript:;"><?php echo esc_html__( 'Small', 'minitek-wall' ); ?></a>
    <a class="nav-tab" href="javascript:;"><?php echo esc_html__( 'Columns / Vertical list', 'minitek-wall' ); ?></a>
  </h2>
</div>

<div id="mwall-admin-metabox-detail-box-tabs-content">

  <div id="mwall-admin-metabox-detail-box-big">
  <table class="form-table">
  <tbody>

    <tr><th colspan="2"><h3><?php esc_html_e( 'Big item settings', 'minitek-wall' ); ?></h3></th></tr>

    <?php
    // Detail box - Big
    $atts = array();
    $atts['description'] = 'The box that contains all post data.';
    $atts['id'] = 'wall-detail-box-big';
    $atts['label'] = 'Show detail box';
    $atts['name'] = 'wall-detail-box-big';
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

    // Detail box position - Big
    $atts = array();
    $atts['description'] = 'If no image is found, the position will default to "Cover".';
    $atts['id'] = 'wall-detail-box-position-big';
    $atts['label'] = 'Detail box position';
    $atts['name'] = 'wall-detail-box-position-big';
    $atts['type'] = 'select';
    $atts['value'] = 'left';
    $atts['selections'] = array(
      array(
        'value' => 'top',
        'label' => 'Top'
      ),
      array(
        'value' => 'right',
        'label' => 'Right'
      ),
      array(
        'value' => 'bottom',
        'label' => 'Bottom'
      ),
      array(
        'value' => 'left',
        'label' => 'Left'
      ),
      array(
        'value' => 'cover',
        'label' => 'Cover'
      )
    );

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
    ?></tr><?php

    // Detail box background color - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-bg-color-big';
    $atts['label'] = 'Background color';
    $atts['name'] = 'wall-detail-box-bg-color-big';
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

    // Background color opacity - Big
    $atts = array();
    $atts['description'] = 'Accepts values from 0 up to 1 with 2 decimals (e.g., 0.75).';
    $atts['id'] = 'wall-detail-box-opacity-big';
    $atts['label'] = 'Background color opacity';
    $atts['name'] = 'wall-detail-box-opacity-big';
    $atts['placeholder'] = '';
    $atts['type'] = 'text';
    $atts['value'] = '0.75';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
    ?></tr><?php

    // Text color - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-text-color-big';
    $atts['label'] = 'Detail box text color';
    $atts['name'] = 'wall-detail-box-text-color-big';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#ffffff';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Title - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-title-big';
    $atts['label'] = 'Show title';
    $atts['name'] = 'wall-item-title-big';
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

    // Introtext - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-introtext-big';
    $atts['label'] = 'Show introtext';
    $atts['name'] = 'wall-item-introtext-big';
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

    // Date - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-date-big';
    $atts['label'] = 'Show date';
    $atts['name'] = 'wall-item-date-big';
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

    // Category - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-category-big';
    $atts['label'] = 'Show category';
    $atts['name'] = 'wall-item-category-big';
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

    // Tags - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-tags-big';
    $atts['label'] = 'Show tags';
    $atts['name'] = 'wall-item-tags-big';
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

    // Author - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-author-big';
    $atts['label'] = 'Show author';
    $atts['name'] = 'wall-item-author-big';
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

    // Comments count - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-comments-count-big';
    $atts['label'] = 'Show comments count';
    $atts['name'] = 'wall-item-comments-count-big';
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

    // Read more - Big
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-readmore-big';
    $atts['label'] = 'Show Read more button';
    $atts['name'] = 'wall-item-readmore-big';
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

  ?>
  </tbody>
  </table>
  </div>

  <div id="mwall-admin-metabox-detail-box-landscape" class="hidden">
  <table class="form-table">
  <tbody>

    <tr><th colspan="2"><h3><?php esc_html_e( 'Landscape item settings', 'minitek-wall' ); ?></h3></th></tr>

    <?php
    // Detail box - Landscape
    $atts = array();
    $atts['description'] = 'The box that contains all post data.';
    $atts['id'] = 'wall-detail-box-landscape';
    $atts['label'] = 'Show detail box';
    $atts['name'] = 'wall-detail-box-landscape';
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

    // Detail box position - Landscape
    $atts = array();
    $atts['description'] = 'If no image is found, the position will default to "Cover".';
    $atts['id'] = 'wall-detail-box-position-landscape';
    $atts['label'] = 'Detail box position';
    $atts['name'] = 'wall-detail-box-position-landscape';
    $atts['type'] = 'select';
    $atts['value'] = 'left';
    $atts['selections'] = array(
      array(
        'value' => 'top',
        'label' => 'Top'
      ),
      array(
        'value' => 'right',
        'label' => 'Right'
      ),
      array(
        'value' => 'bottom',
        'label' => 'Bottom'
      ),
      array(
        'value' => 'left',
        'label' => 'Left'
      ),
      array(
        'value' => 'cover',
        'label' => 'Cover'
      )
    );

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
    ?></tr><?php

    // Detail box background color - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-bg-color-landscape';
    $atts['label'] = 'Background color';
    $atts['name'] = 'wall-detail-box-bg-color-landscape';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#1b98e0';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Background color opacity - Landscape
    $atts = array();
    $atts['description'] = 'Accepts values from 0 up to 1 with 2 decimals (e.g., 0.75).';
    $atts['id'] = 'wall-detail-box-opacity-landscape';
    $atts['label'] = 'Background color opacity';
    $atts['name'] = 'wall-detail-box-opacity-landscape';
    $atts['placeholder'] = '';
    $atts['type'] = 'text';
    $atts['value'] = '0.75';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
    ?></tr><?php

    // Text color - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-text-color-landscape';
    $atts['label'] = 'Detail box text color';
    $atts['name'] = 'wall-detail-box-text-color-landscape';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#ffffff';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Title - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-title-landscape';
    $atts['label'] = 'Show title';
    $atts['name'] = 'wall-item-title-landscape';
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

    // Introtext - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-introtext-landscape';
    $atts['label'] = 'Show introtext';
    $atts['name'] = 'wall-item-introtext-landscape';
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

    // Date - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-date-landscape';
    $atts['label'] = 'Show date';
    $atts['name'] = 'wall-item-date-landscape';
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

    // Category - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-category-landscape';
    $atts['label'] = 'Show category';
    $atts['name'] = 'wall-item-category-landscape';
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

    // Tags - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-tags-landscape';
    $atts['label'] = 'Show tags';
    $atts['name'] = 'wall-item-tags-landscape';
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

    // Author - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-author-landscape';
    $atts['label'] = 'Show author';
    $atts['name'] = 'wall-item-author-landscape';
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

    // Comments count - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-comments-count-landscape';
    $atts['label'] = 'Show comments count';
    $atts['name'] = 'wall-item-comments-count-landscape';
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

    // Read more - Landscape
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-readmore-landscape';
    $atts['label'] = 'Show Read more button';
    $atts['name'] = 'wall-item-readmore-landscape';
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

  ?>
  </tbody>
  </table>
  </div>

  <div id="mwall-admin-metabox-detail-box-portrait" class="hidden">
  <table class="form-table">
  <tbody>

    <tr><th colspan="2"><h3><?php esc_html_e( 'Portrait item settings', 'minitek-wall' ); ?></h3></th></tr>

    <?php
    // Detail box - Portrait
    $atts = array();
    $atts['description'] = 'The box that contains all post data.';
    $atts['id'] = 'wall-detail-box-portrait';
    $atts['label'] = 'Show detail box';
    $atts['name'] = 'wall-detail-box-portrait';
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

    // Detail box position - Portrait
    $atts = array();
    $atts['description'] = 'If no image is found, the position will default to "Cover".';
    $atts['id'] = 'wall-detail-box-position-portrait';
    $atts['label'] = 'Detail box position';
    $atts['name'] = 'wall-detail-box-position-portrait';
    $atts['type'] = 'select';
    $atts['value'] = 'bottom';
    $atts['selections'] = array(
      array(
        'value' => 'top',
        'label' => 'Top'
      ),
      array(
        'value' => 'right',
        'label' => 'Right'
      ),
      array(
        'value' => 'bottom',
        'label' => 'Bottom'
      ),
      array(
        'value' => 'left',
        'label' => 'Left'
      ),
      array(
        'value' => 'cover',
        'label' => 'Cover'
      )
    );

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
    ?></tr><?php

    // Detail box background color - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-bg-color-portrait';
    $atts['label'] = 'Background color';
    $atts['name'] = 'wall-detail-box-bg-color-portrait';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#e66eb8';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Background color opacity - Portrait
    $atts = array();
    $atts['description'] = 'Accepts values from 0 up to 1 with 2 decimals (e.g., 0.75).';
    $atts['id'] = 'wall-detail-box-opacity-portrait';
    $atts['label'] = 'Background color opacity';
    $atts['name'] = 'wall-detail-box-opacity-portrait';
    $atts['placeholder'] = '';
    $atts['type'] = 'text';
    $atts['value'] = '0.75';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
    ?></tr><?php

    // Text color - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-text-color-portrait';
    $atts['label'] = 'Detail box text color';
    $atts['name'] = 'wall-detail-box-text-color-portrait';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#ffffff';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Title - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-title-portrait';
    $atts['label'] = 'Show title';
    $atts['name'] = 'wall-item-title-portrait';
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

    // Introtext - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-introtext-portrait';
    $atts['label'] = 'Show introtext';
    $atts['name'] = 'wall-item-introtext-portrait';
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

    // Date - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-date-portrait';
    $atts['label'] = 'Show date';
    $atts['name'] = 'wall-item-date-portrait';
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

    // Category - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-category-portrait';
    $atts['label'] = 'Show category';
    $atts['name'] = 'wall-item-category-portrait';
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

    // Tags - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-tags-portrait';
    $atts['label'] = 'Show tags';
    $atts['name'] = 'wall-item-tags-portrait';
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

    // Author - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-author-portrait';
    $atts['label'] = 'Show author';
    $atts['name'] = 'wall-item-author-portrait';
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

    // Comments count - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-comments-count-portrait';
    $atts['label'] = 'Show comments count';
    $atts['name'] = 'wall-item-comments-count-portrait';
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

    // Read more - Portrait
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-readmore-portrait';
    $atts['label'] = 'Show Read more button';
    $atts['name'] = 'wall-item-readmore-portrait';
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

  ?>
  </tbody>
  </table>
  </div>

  <div id="mwall-admin-metabox-detail-box-small" class="hidden">
  <table class="form-table">
  <tbody>

    <tr><th colspan="2"><h3><?php esc_html_e( 'Small item settings', 'minitek-wall' ); ?></h3></th></tr>

    <?php
    // Detail box - Small
    $atts = array();
    $atts['description'] = 'The box that contains all post data.';
    $atts['id'] = 'wall-detail-box-small';
    $atts['label'] = 'Show detail box';
    $atts['name'] = 'wall-detail-box-small';
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

    // Detail box position - Small
    $atts = array();
    $atts['description'] = 'If no image is found, the position will default to "Cover".';
    $atts['id'] = 'wall-detail-box-position-small';
    $atts['label'] = 'Detail box position';
    $atts['name'] = 'wall-detail-box-position-small';
    $atts['type'] = 'select';
    $atts['value'] = 'cover';
    $atts['selections'] = array(
      array(
        'value' => 'top',
        'label' => 'Top'
      ),
      array(
        'value' => 'right',
        'label' => 'Right'
      ),
      array(
        'value' => 'bottom',
        'label' => 'Bottom'
      ),
      array(
        'value' => 'left',
        'label' => 'Left'
      ),
      array(
        'value' => 'cover',
        'label' => 'Cover'
      )
    );

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
    ?></tr><?php

    // Detail box background color - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-bg-color-small';
    $atts['label'] = 'Background color';
    $atts['name'] = 'wall-detail-box-bg-color-small';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#24a9b7';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Background color opacity - Small
    $atts = array();
    $atts['description'] = 'Accepts values from 0 up to 1 with 2 decimals (e.g., 0.75).';
    $atts['id'] = 'wall-detail-box-opacity-small';
    $atts['label'] = 'Background color opacity';
    $atts['name'] = 'wall-detail-box-opacity-small';
    $atts['placeholder'] = '';
    $atts['type'] = 'text';
    $atts['value'] = '0.75';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
    ?></tr><?php

    // Text color - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-text-color-small';
    $atts['label'] = 'Detail box text color';
    $atts['name'] = 'wall-detail-box-text-color-small';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#ffffff';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Title - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-title-small';
    $atts['label'] = 'Show title';
    $atts['name'] = 'wall-item-title-small';
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

    // Introtext - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-introtext-small';
    $atts['label'] = 'Show introtext';
    $atts['name'] = 'wall-item-introtext-small';
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

    // Date - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-date-small';
    $atts['label'] = 'Show date';
    $atts['name'] = 'wall-item-date-small';
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

    // Category - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-category-small';
    $atts['label'] = 'Show category';
    $atts['name'] = 'wall-item-category-small';
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

    // Tags - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-tags-small';
    $atts['label'] = 'Show tags';
    $atts['name'] = 'wall-item-tags-small';
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

    // Author - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-author-small';
    $atts['label'] = 'Show author';
    $atts['name'] = 'wall-item-author-small';
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

    // Comments count - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-comments-count-small';
    $atts['label'] = 'Show comments count';
    $atts['name'] = 'wall-item-comments-count-small';
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

    // Read more - Small
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-readmore-small';
    $atts['label'] = 'Show Read more button';
    $atts['name'] = 'wall-item-readmore-small';
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

  ?>
  </tbody>
  </table>
  </div>

  <div id="mwall-admin-metabox-detail-box-columns" class="hidden">
  <table class="form-table">
  <tbody>

    <tr><th colspan="2"><h3><?php esc_html_e( 'Columns / Vertical list item settings', 'minitek-wall' ); ?></h3></th></tr>

    <?php
    // Detail box - Columns
    $atts = array();
    $atts['description'] = 'The box that contains all post data.';
    $atts['id'] = 'wall-detail-box-columns';
    $atts['label'] = 'Show detail box';
    $atts['name'] = 'wall-detail-box-columns';
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

    // Detail box position - Columns
    $atts = array();
    $atts['description'] = 'This setting has no effect for the grid "Vertical list".';
    $atts['id'] = 'wall-detail-box-position-columns';
    $atts['label'] = 'Detail box position';
    $atts['name'] = 'wall-detail-box-position-columns';
    $atts['type'] = 'select';
    $atts['value'] = 'below';
    $atts['selections'] = array(
      array(
        'value' => 'below',
        'label' => 'Outside below'
      ),
      array(
        'value' => 'bottom',
        'label' => 'Inside bottom'
      ),
      array(
        'value' => 'cover',
        'label' => 'Cover'
      )
    );

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
    ?></tr><?php

    // Detail box background color - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-bg-color-columns';
    $atts['label'] = 'Background color';
    $atts['name'] = 'wall-detail-box-bg-color-columns';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#1b98e0';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Background color opacity - Columns
    $atts = array();
    $atts['description'] = 'Accepts values from 0 up to 1 with 2 decimals (e.g., 0.75).';
    $atts['id'] = 'wall-detail-box-opacity-columns';
    $atts['label'] = 'Background color opacity';
    $atts['name'] = 'wall-detail-box-opacity-columns';
    $atts['placeholder'] = '';
    $atts['type'] = 'text';
    $atts['value'] = '0.75';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
    ?></tr><?php

    // Text color - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-detail-box-text-color-columns';
    $atts['label'] = 'Detail box text color';
    $atts['name'] = 'wall-detail-box-text-color-columns';
    $atts['placeholder'] = '';
    $atts['type'] = 'color';
    $atts['value'] = '#ffffff';

    if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
      $atts['value'] = get_post_meta($post_id, $atts['id'], true);
    }

    apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

    ?><tr><?php
    include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-color.php' );
    ?></tr><?php

    // Title - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-title-columns';
    $atts['label'] = 'Show title';
    $atts['name'] = 'wall-item-title-columns';
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

    // Introtext - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-introtext-columns';
    $atts['label'] = 'Show introtext';
    $atts['name'] = 'wall-item-introtext-columns';
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

    // Date - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-date-columns';
    $atts['label'] = 'Show date';
    $atts['name'] = 'wall-item-date-columns';
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

    // Category - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-category-columns';
    $atts['label'] = 'Show category';
    $atts['name'] = 'wall-item-category-columns';
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

    // Tags - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-tags-columns';
    $atts['label'] = 'Show tags';
    $atts['name'] = 'wall-item-tags-columns';
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

    // Author - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-author-columns';
    $atts['label'] = 'Show author';
    $atts['name'] = 'wall-item-author-columns';
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

    // Comments count - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-comments-count-columns';
    $atts['label'] = 'Show comments count';
    $atts['name'] = 'wall-item-comments-count-columns';
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

    // Read more - Columns
    $atts = array();
    $atts['description'] = '';
    $atts['id'] = 'wall-item-readmore-columns';
    $atts['label'] = 'Show Read more button';
    $atts['name'] = 'wall-item-readmore-columns';
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

  ?>
  </tbody>
  </table>
  </div>

</div>