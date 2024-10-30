<?php
/**
 * Provides a list of post categories.
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
	<select 
		multiple="multiple"
		aria-label="<?php isset($atts['aria']) ? esc_attr(_e($atts['aria'], 'minitek-wall')) : ''; ?>"
		class="<?php isset($atts['class']) ? esc_attr($atts['class']) : ''; ?>"
		id="<?php echo esc_attr( $atts['id'] ); ?>"
		name="<?php echo esc_attr( $atts['name'] ); ?>"
	><?php
	
		$categories_all = get_categories(); 
		
		foreach ($categories_all as $category)
		{
			if (in_array($category->cat_ID, $atts['value']))
			{
				$selected = 'selected';
			}
			else
			{
				$selected = '';
			}

			?><option <?php echo $selected; ?> value="<?php echo esc_attr($category->cat_ID); ?>" ><?php echo esc_html($category->name); ?></option><?php

		}

	?></select>

	<p class="description"><?php esc_html_e($atts['description'], 'minitek-wall'); ?></p>
</td>