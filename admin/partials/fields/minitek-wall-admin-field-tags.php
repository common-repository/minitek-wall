<?php
/**
 * Provides a list of post tags.
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
	<select 
		multiple="multiple"
		aria-label="<?php isset($atts['aria']) ? esc_attr(_e($atts['aria'], 'minitek-wall')) : ''; ?>"
		class="<?php isset($atts['class']) ? esc_attr($atts['class']) : ''; ?>"
		id="<?php echo esc_attr( $atts['id'] ); ?>"
		name="<?php echo esc_attr( $atts['name'] ); ?>"
	><?php
	
	$args = array(
	   'hide_empty' => false
	);
	
	$tags_all = get_tags( $args ); 
	
	foreach ($tags_all as $tag)
	{
		if (in_array($tag->term_id, $atts['value']))
		{
			$selected = 'selected';
		}
		else
		{
			$selected = '';
		} 
		
		?><option <?php echo $selected; ?> value="<?php echo esc_attr( $tag->term_id ); ?>" ><?php echo esc_html( $tag->name ); ?></option><?php
	}

	?></select>
	<p class="description"><?php esc_html_e( $atts['description'], 'minitek-wall' ); ?></p>
</td>