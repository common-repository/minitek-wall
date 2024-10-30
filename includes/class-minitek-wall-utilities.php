<?php

/**
 * Utilities class
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/includes
 */

class MN_Wall_Utilities {

	/**
	 * Constructor
	 */
	public function __construct() {

		// Nothing to see here...

	} // __construct()

	/**
	 * Converts hexadecimal color codes to RGB.
	 *
	 * @since    1.0.1
	 */
	public function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {

		$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr);
		$rgbArray = array();

		if (strlen($hexStr) == 6)
		{
			$colorVal = hexdec($hexStr);
			$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
			$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
			$rgbArray['blue'] = 0xFF & $colorVal;
		}
		elseif (strlen($hexStr) == 3)
		{
			$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
			$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
			$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
		}
		else
		{
			return false;
		}

		return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray;

	}

	/**
	 * Array_unique for multi-dimensional arrays
	 * with fallback for simple arrays
	 *
	 * @since    1.0.1
	 */
	public function unique_multidim_array($array, $key) {

		$temp_array = array();
		$key_array = array();

		foreach($array as $val)
		{
			// For products
			if (isset($val->$key))
			{
				if (!in_array($val->$key, $key_array)) {
					$key_array[] = $val->$key;
					$temp_array[] = $val->$key;
				}
			}
			// For posts
			else
			{
				$temp_array[] = $val;
			}
		}

		if (!empty($temp_array))
		{
			return array_unique($temp_array);
		}
		else
		{
			return array_unique($array);
		}

	}

	/**
	 * Finds grid item size.
	 *
	 * @since    1.0.1
	 */
	public function getMasonryItemSize($gridType, $item_index, $gridId = false) {

		switch ($gridType)
		{
			// Preset grids
			case '1':
				$item_size = 'mwall-big';
				break;

			case '3a':
				if ($item_index == '1') {
					$item_size = 'mwall-big';
				} else {
					$item_size = 'mwall-horizontal';
				}
				break;

			case '3b':
				if ($item_index == '2') {
					$item_size = 'mwall-big';
				} else {
					$item_size = 'mwall-horizontal';
				}
				break;

			case '3c':
				if ($item_index == '1') {
					$item_size = 'mwall-big';
				} else {
					$item_size = 'mwall-vertical';
				}
				break;

			case '4':
				if ($item_index == '1') {
					$item_size = 'mwall-big';
				} else if ($item_index == '2') {
					$item_size = 'mwall-horizontal';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			case '5':
				if ($item_index == '1' || $item_index == '5') {
					$item_size = 'mwall-horizontal';
				} else if ($item_index == '2' || $item_index == '4') {
					$item_size = 'mwall-small';
				} else {
					$item_size = 'mwall-big';
				}
				break;

			case '5b':
				if ($item_index == '3') {
					$item_size = 'mwall-big';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			case '6':
				if ($item_index == '1') {
					$item_size = 'mwall-big';
				} else if ($item_index == '3') {
					$item_size = 'mwall-horizontal';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			case '7':
				if ($item_index == '1') {
					$item_size = 'mwall-big';
				} else if ($item_index == '2') {
					$item_size = 'mwall-horizontal';
				} else if ($item_index == '4') {
					$item_size = 'mwall-vertical';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			case '8':
				if ($item_index == '1' || $item_index == '7' || $item_index == '8') {
					$item_size = 'mwall-horizontal';
				} else if ($item_index == '2') {
					$item_size = 'mwall-big';
				} else if ($item_index == '6') {
					$item_size = 'mwall-vertical';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			case '9':
				if ($item_index == '1') {
					$item_size = 'mwall-big';
				} else if ($item_index == '2') {
					$item_size = 'mwall-horizontal';
				} else if ($item_index == '4' || $item_index == '5' || $item_index == '6') {
					$item_size = 'mwall-vertical';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			case '9r':
				if ($item_index == '1' || $item_index == '2' || $item_index == '3') {
					$item_size = 'mwall-horizontal';
				} else if ($item_index == '4' || $item_index == '5') {
					$item_size = 'mwall-big';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			case '11r':
				if ($item_index == '8' || $item_index == '9' || $item_index == '10' || $item_index == '11') {
					$item_size = 'mwall-horizontal';
				} else if ($item_index == '1' || $item_index == '2' || $item_index == '6' || $item_index == '7') {
					$item_size = 'mwall-big';
				} else {
					$item_size = 'mwall-vertical';
				}
				break;

			case '12r':
				if ($item_index == '1' || $item_index == '2' || $item_index == '3' || $item_index == '4') {
					$item_size = 'mwall-horizontal';
				} else if ($item_index == '10' || $item_index == '11' || $item_index == '12') {
					$item_size = 'mwall-big';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			case '16r':
				if ($item_index == '1' || $item_index == '5' || $item_index == '7' || $item_index == '15') {
					$item_size = 'mwall-horizontal';
				} else {
					$item_size = 'mwall-small';
				}
				break;

			default:
				$item_size = '';
		}

		return $item_size;

	}

	/**
	 * Finds grid item index.
	 *
	 * @since    1.0.1
	 */
	public static function recurseMasItemIndex($item_index, $gridType) {

		$item_index = $item_index - $gridType;

		if ($item_index > $gridType) {
			$item_index = self::recurseMasItemIndex($item_index, $gridType);
		}

		return $item_index;

	}

	/**
	 * Finds image in text.
	 *
	 * @since    1.0.1
	 */
	public function wall_post_inline_image($text) {

		$text_temp = strip_tags($text, '<img>');
		preg_match('/<img[^>]+>/i', $text_temp, $new_image);
		$src = false;

		if ($new_image && function_exists('mb_convert_encoding'))
		{
			$new_image[0] = mb_convert_encoding($new_image[0], 'HTML-ENTITIES', 'UTF-8');
			$doc = new DOMDocument();
			$doc->loadHTML($new_image[0]);
			$xpath = new DOMXPath($doc);
			$src = $xpath->evaluate("string(//img/@src)");
		}

		return $src;

	}

	/**
	 * Formats name into safe slug.
	 *
	 * @since    1.1.0
	 */
	public function clean_name($name) {

		$name_fixed = preg_replace('/(?=\P{Nd})\P{L}/u', '-', $name);
		$name_fixed = preg_replace('/[\s-]{2,}/u', '-', $name_fixed);
		$name_fixed = htmlspecialchars($name_fixed);
		$name_fixed = trim($name_fixed, "-");

		return $name_fixed;

	}

} // class
