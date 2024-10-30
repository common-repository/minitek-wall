<?php
/**
 * Provide the view for the metabox parameters: wall-options
 *
 * @since 		1.0.1
 * @package 	Minitek-Wall
 * @subpackage 	Minitek-Wall/admin/partials
 */

wp_nonce_field( $this->plugin_name, 'wall_options' );

$post_id = get_the_ID();

?>
<div id="mwall-admin-metabox-options">
<?php

	// General settings ?>
	<div id="mwall-admin-metabox-general-settings" class="inside">
	<table class="form-table">
	<tbody><?php 

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-general.php' );

	?></tbody>
	</table>
	</div>
	<?php

	// Data source ?>
	<div id="mwall-admin-metabox-data-source" class="inside hidden">
		
		<?php
		// Data source options ?>
		<div id="mwall-admin-metabox-data-source-options"><?php

			include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-data-source.php' );
			
		?></div>

	</div>
	<?php

	// Layout ?>
	<div id="mwall-admin-metabox-layout" class="inside hidden">
	<table class="form-table">
	<tbody><?php

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-layout.php' );
		
	?></tbody>
	</table>
	</div>
	<?php

	// Image settings ?>
	<div id="mwall-admin-metabox-image-settings" class="inside hidden">
	<table class="form-table">
	<tbody><?php

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-images.php' );
		
	?></tbody>
	</table>
	</div>
	<?php

	// Detail box settings ?>
	<div id="mwall-admin-metabox-detail-box" class="inside hidden"><?php

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-detail-box.php' );

	?></div>
	<?php

	// Hover box settings ?>
	<div id="mwall-admin-metabox-hover-box" class="inside hidden">
	<table class="form-table">
	<tbody><?php

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-hover-box.php' );

	?></tbody>
	</table>
	</div>
	<?php

	// Pagination ?>
	<div id="mwall-admin-metabox-pagination" class="inside hidden">
	<table class="form-table">
	<tbody><?php

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-pagination.php' );

	?></tbody>
	</table>
	</div>
	<?php

	// Effects ?>
	<div id="mwall-admin-metabox-effects" class="inside hidden">
	<table class="form-table">
	<tbody>
	<?php

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-effects.php' );

	?></tbody>
	</table>
	</div>
	<?php

	// Filters ?>
	<div id="mwall-admin-metabox-filters" class="inside hidden">
	<table class="form-table">
	<tbody><?php

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-filters.php' );

	?></tbody>
	</table>
	</div>
	<?php

	// Responsive levels ?>
	<div id="mwall-admin-metabox-responsive-levels" class="inside hidden">
	<table class="form-table">
	<tbody><?php

		include( plugin_dir_path( __FILE__ ) . 'minitek-wall-admin-metabox-' . $params['args']['file'] . '-responsive.php' );

	?></tbody>
	</table>
	</div>

</div>
