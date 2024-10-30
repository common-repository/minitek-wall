<?php
/**
 * Provides a color selector.
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/admin/partials
 */

if (!empty($atts['label']))
{
	?><th><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'minitek-wall' ); ?>: </label></th><?php
}

?><td>
	<input
		class="<?php isset($atts['class']) ? esc_attr($atts['class']) : ''; ?>"
		id="<?php echo esc_attr( $atts['id'] ); ?>"
		name="<?php echo esc_attr( $atts['name'] ); ?>"
		placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
		type="<?php echo esc_attr( $atts['type'] ); ?>"
		value="<?php echo esc_attr( $atts['value'] ); ?>" 
	/><?php

	if (!empty($atts['description']))
	{
		?><p class="description"><?php esc_html_e( $atts['description'], 'minitek-wall' ); ?></p><?php
	} 
?></td>