<?php
/**
 * Provides the markup for any textarea field
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/admin/partials
 */

if (!empty($atts['label']))
{
	?><th><label for="<?php echo esc_attr($atts['id']); ?>"><?php esc_html_e($atts['label'], 'minitek-wall'); ?>: </label></th><?php
}

?><td>
	<textarea
		class="<?php isset($atts['class']) ? esc_attr($atts['class']) : ''; ?>"
		cols="<?php isset($atts['cols']) ? esc_attr($atts['cols']) : ''; ?>"
		rows="<?php isset($atts['rows']) ? esc_attr($atts['rows']) : ''; ?>"
		id="<?php echo esc_attr( $atts['id'] ); ?>"
		name="<?php echo esc_attr( $atts['name'] ); ?>"
	><?php

	echo esc_textarea( $atts['value'] );

	?></textarea>
	<p class="description"><?php esc_html_e($atts['description'], 'minitek-wall'); ?></p>
</td>