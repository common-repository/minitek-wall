<?php
/**
 * Provide the view for the metabox parameters: wall-options/data-source
 *
 * @since 		  1.1.0
 * @package 	  Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

 // Items type ?>
<div id="mwall-admin-metabox-data-source-items-type">
<table class="form-table">
<tbody>
<?php

  // Post types
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-post-type';
  $atts['label'] = 'Items type';
  $atts['name'] = 'wall-post-type'; // append [] for array
  $atts['type'] = 'radio';
  $atts['value'] = 'post';
  $atts['selections'] = array(
    array(
      'value' => 'post',
      'label' => 'Posts'
    ),
    array(
      'value' => 'attachment',
      'label' => 'Media (Images)'
    ),
    array(
      'value' => 'page',
      'label' => 'Pages'
    ),
    array(
      'value' => 'specific',
      'label' => 'Specific items'
    ),
    array(
      'value' => 'product',
      'label' => 'Products',
      'disabled' => true
    ),
    array(
      'value' => 'folder',
      'label' => 'Folder',
      'disabled' => true
    ),
    array(
      'value' => 'rss',
      'label' => 'RSS',
      'disabled' => true
    ),
    array(
      'value' => 'ci',
      'label' => 'Custom items',
      'disabled' => true
    )
  );

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
  ?></tr><?php

?>
</tbody>
</table>
</div>

<?php
// Posts ?>
<div id="mwall-admin-metabox-data-source-posts" class="hidden">
<table class="form-table">
<tbody>
<?php

  ?><tr><th colspan="2"><h4><?php esc_html_e( 'Categories', 'minitek-wall' ); ?></h4></th></tr><?php

  // Category filtering type
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-category-filtering-type';
  $atts['label'] = 'Category filtering type';
  $atts['name'] = 'wall-category-filtering-type';
  $atts['type'] = 'radio';
  $atts['value'] = 'inclusive';
  $atts['selections'] = array(
    array(
      'value' => 'inclusive',
      'label' => 'Inclusive'
    ),
    array(
      'value' => 'exclusive',
      'label' => 'Exclusive'
    )
  );

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
  ?></tr><?php

  // Categories
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-categories';
  $atts['label'] = 'Categories';
  $atts['name'] = 'wall-categories[]'; // [] for array
  $atts['type'] = 'select';
  $atts['value'] = array();

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-categories.php' );
  ?></tr><?php

  // Include children
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-include-children';
  $atts['label'] = 'Include children';
  $atts['name'] = 'wall-include-children';
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

  ?><tr><th colspan="2"><h4><?php esc_html_e( 'Tags', 'minitek-wall' ); ?></h4></th></tr><?php

  // Tag filtering type
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-tag-filtering-type';
  $atts['label'] = 'Tag filtering type';
  $atts['name'] = 'wall-tag-filtering-type';
  $atts['type'] = 'radio';
  $atts['value'] = 'inclusive';
  $atts['selections'] = array(
    array(
      'value' => 'inclusive',
      'label' => 'Inclusive'
    ),
    array(
      'value' => 'exclusive',
      'label' => 'Exclusive'
    )
  );

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
  ?></tr><?php

  // Tags
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-tags';
  $atts['label'] = 'Tags';
  $atts['name'] = 'wall-tags[]'; // [] for array
  $atts['type'] = 'select';
  $atts['value'] = array();

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-tags.php' );
  ?></tr><?php

?>
</tbody>
</table>
</div>

<?php
// Media ?>
<div id="mwall-admin-metabox-data-source-media" class="hidden"></div>

<?php
// Pages ?>
<div id="mwall-admin-metabox-data-source-pages" class="hidden"></div>

<?php 
// Specific items ?>
<div id="mwall-admin-metabox-data-source-specific" class="hidden">
<table class="form-table">
<tbody>
<?php

  ?><tr><th colspan="2"><h4><?php esc_html_e( 'Specific Items', 'minitek-wall' ); ?></h4></th></tr><?php

  // Post Ids
  $atts = array();
  $atts['description'] = "Enter the IDs of the posts to be included, separated by commas. Retrieves any type except revisions and types with ‘exclude_from_search’ set to true.";
  $atts['id'] = 'wall-include-posts';
  $atts['label'] = 'Include IDs';
  $atts['name'] = 'wall-include-posts';
  $atts['placeholder'] = '';
  $atts['type'] = 'textarea';
  $atts['value'] = '';

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-textarea.php' );
  ?></tr><?php

?>
</tbody>
</table>
</div>
  
<?php
// Authors ?>
<div id="mwall-admin-metabox-data-source-authors">
<table class="form-table">
<tbody>
<?php

  ?><tr><th colspan="2"><h4><?php esc_html_e( 'Authors', 'minitek-wall' ); ?></h4></th></tr><?php

  // Author filtering type
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-author-filtering-type';
  $atts['label'] = 'Author filtering type';
  $atts['name'] = 'wall-author-filtering-type';
  $atts['type'] = 'radio';
  $atts['value'] = 'inclusive';
  $atts['selections'] = array(
    array(
      'value' => 'inclusive',
      'label' => 'Inclusive'
    ),
    array(
      'value' => 'exclusive',
      'label' => 'Exclusive'
    )
  );

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-radio.php' );
  ?></tr><?php

  // Authors
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-authors';
  $atts['label'] = 'Authors';
  $atts['name'] = 'wall-authors[]'; // [] for array
  $atts['type'] = 'select';
  $atts['value'] = array();

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-authors.php' );
  ?></tr><?php

?>
</tbody>
</table>
</div>

<?php
// Date range ?>
<div id="mwall-admin-metabox-data-source-dates">
<table class="form-table">
<tbody>
<?php

  ?><tr><th colspan="2"><h4><?php esc_html_e( 'Date Range', 'minitek-wall' ); ?></h4></th></tr><?php

  // Start date
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-start-date';
  $atts['label'] = 'Start date';
  $atts['name'] = 'wall-start-date';
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

  // End date
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-end-date';
  $atts['label'] = 'End date';
  $atts['name'] = 'wall-end-date';
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

?>
</tbody>
</table>
</div>

<?php
// Items type: General ?>
<div id="mwall-admin-metabox-data-source-general">
<table class="form-table">
<tbody>
<?php

  ?><tr><th colspan="2"><h4><?php esc_html_e( 'General', 'minitek-wall' ); ?></h4></th></tr><?php

  // Exclude items
  $atts = array();
  $atts['description'] = 'Enter the IDs of the items to be excluded, separated by commas.';
  $atts['id'] = 'wall-exclude-posts';
  $atts['label'] = 'Exclude items';
  $atts['name'] = 'wall-exclude-posts';
  $atts['placeholder'] = '';
  $atts['type'] = 'textarea';
  $atts['value'] = '';

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr id="mwall-admin-metabox-field-exclude"><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-textarea.php' );
  ?></tr><?php

  // Offset
  $atts = array();
  $atts['description'] = 'Integer. The first x items will be skipped.';
  $atts['id'] = 'wall-offset';
  $atts['label'] = 'Offset';
  $atts['name'] = 'wall-offset';
  $atts['placeholder'] = '';
  $atts['type'] = 'text';
  $atts['value'] = '0';

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr id="mwall-admin-metabox-field-offset"><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-text.php' );
  ?></tr><?php

  // Keywords
  $atts = array();
  $atts['description'] = 'Display items that match these keywords. Separate multiple keywords with spaces. Prepending a keyword with a hyphen will exclude items matching that keyword.';
  $atts['id'] = 'wall-keywords';
  $atts['label'] = 'Keywords';
  $atts['name'] = 'wall-keywords';
  $atts['placeholder'] = '';
  $atts['type'] = 'textarea';
  $atts['value'] = '';

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr id="mwall-admin-metabox-field-keywords"><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-textarea.php' );
  ?></tr><?php

  // Ordering
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-posts-ordering';
  $atts['label'] = 'Ordering';
  $atts['name'] = 'wall-posts-ordering';
  $atts['type'] = 'select';
  $atts['value'] = 'date';
  $atts['selections'] = array(
    array(
      'value' => 'author',
      'label' => 'Author'
    ),
    array(
      'value' => 'title',
      'label' => 'Title'
    ),
    array(
      'value' => 'date',
      'label' => 'Date created'
    ),
    array(
      'value' => 'modified',
      'label' => 'Date modified'
    ),
    array(
      'value' => 'comment_count',
      'label' => 'Number of comments'
    )
  );

  if ( ! empty( get_post_meta($post_id, $atts['id'], true) ) ) {
    $atts['value'] = get_post_meta($post_id, $atts['id'], true);
  }

  apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

  ?><tr><?php
  include( MW__ADMIN_PLUGIN_DIR . 'partials/fields/' . $this->plugin_name . '-admin-field-select.php' );
  ?></tr><?php

  // Ordering direction
  $atts = array();
  $atts['description'] = '';
  $atts['id'] = 'wall-posts-ordering-direction';
  $atts['label'] = 'Ordering direction';
  $atts['name'] = 'wall-posts-ordering-direction';
  $atts['type'] = 'radio';
  $atts['value'] = 'DESC';
  $atts['selections'] = array(
    array(
      'value' => 'ASC',
      'label' => 'Ascending'
    ),
    array(
      'value' => 'DESC',
      'label' => 'Descending'
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