<?php
/**
 * Provides the markup for a radio field
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/admin/partials
 */

if (!empty($atts['label']))
{
	?><th><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'minitek-wall' ); ?>: </label></th><?php
}

if (empty($atts['value']))
{
	$atts['value'] = '0';
}

?><td>
	<fieldset><?php
		foreach ($atts['selections'] as $selection)
		{
			if (is_array($selection))
			{
				$label = $selection['label'];
				$value = $selection['value'];
			}
			else
			{
				$label = strtolower( $selection );
				$value = strtolower( $selection );
			}

			?><label>
				<input
					type="radio"
					name="<?php echo esc_attr( $atts['name'] ); ?>"
					value="<?php echo esc_attr( $value ); ?>" <?php
					checked( $atts['value'], $value ); ?>
				>

				<span><?php echo esc_html_e( $label, 'minitek-wall' ); ?></span><?php

				if (array_key_exists('desc', $selection))
				{
					?><code><?php echo esc_html_e( $selection['desc'], 'minitek-wall' ); ?></code><?php
				}
			?></label>
			</br><?php
		}

		?><p class="description"><?php esc_html_e( $atts['description'], 'minitek-wall' ); ?></p>
	</fieldset>
</td>
