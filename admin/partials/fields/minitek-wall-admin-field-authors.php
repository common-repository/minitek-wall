<?php
/**
 * Provides a list of post authors.
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/admin/partials
 */

if ( ! empty( $atts['label'] ) ) {

	?><th><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'minitek-wall' ); ?>: </label></th><?php

}

?><td>
	<select 
	multiple="multiple"
	aria-label="<?php isset($atts['aria']) ? esc_attr(_e($atts['aria'], 'minitek-wall')) : ''; ?>"
	class="<?php isset($atts['class']) ? esc_attr($atts['class']) : ''; ?>"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"><?php
	
	$args = array(
	   'who'   => 'authors'
	);
	
	$authors_all = get_users( $args ); 
	
	foreach ( $authors_all as $author ) {

		if(in_array($author->ID, $atts['value'])){
			$selected = 'selected';
			}
		else{
			$selected = '';
			} ?>

		<option <?php echo $selected; ?> value="<?php echo esc_attr( $author->ID ); ?>" ><?php echo esc_html( $author->display_name ); ?></option>
		<?php

	} // foreach

	?>
	</select>
<p class="description"><?php esc_html_e( $atts['description'], 'minitek-wall' ); ?></p>
</td>