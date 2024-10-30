<?php
/**
 * Provides the markup for wall grids
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
	<div class="custom-radio-info">
		<h3><?php esc_html_e('Items sizes:', 'minitek-wall'); ?></h3>
		<ul>
			<li><b>B</b>: <?php esc_html_e( 'Big', 'minitek-wall' ); ?></li>
			<li><b>L</b>: <?php esc_html_e( 'Landscape', 'minitek-wall' ); ?></li>
			<li><b>P</b>: <?php esc_html_e( 'Portrait', 'minitek-wall' ); ?></li>
			<li><b>S</b>: <?php esc_html_e( 'Small', 'minitek-wall' ); ?></li>
			<li><b>C</b>: <?php esc_html_e( 'Equal Columns', 'minitek-wall' ); ?></li>
			<li><b>V</b>: <?php esc_html_e( 'Vertical List', 'minitek-wall' ); ?></li>
		</ul>
		<p class="description"><?php esc_html_e( 'You can configure each size separately with the Detail box parameters.', 'minitek-wall' ); ?></p>
	</div>

	<fieldset>
		<?php
		foreach ($atts['selections'] as $selection)
		{
			if (is_array($selection))
			{
				$label = $selection['label'];
				$value = $selection['value'];

				if (isset($selection['image']))
				{
					$image = $selection['image'];
				}
				else 
				{
					$image = false;
				}
			} 
			else 
			{
				$label = strtolower( $selection );
				$value = strtolower( $selection );
				$image = strtolower( $selection );
			}

			?><div class="custom-radio">				
				<label>
					<p><?php echo $label; ?></p>
					<div class="custom-radio-wrap">
						<img alt="<?php echo esc_html_e( $label, 'minitek-wall' ); ?>" src="<?php echo esc_url( MW__ADMIN_PLUGIN_URL . 'images/'.$image ); ?>">
					</div>
					<input
						type="radio"
						name="<?php echo esc_attr( $atts['name'] ); ?>"
						value="<?php echo esc_attr( $value ); ?>" 
						class="custom-radio-input" <?php
						checked($atts['value'], $value); ?>
					>
				</label>	
			</div><?php
		}
	?></fieldset>
</td>
