<?php
/**
 * Default ACF Permalink Formatter
 *
 * @package WordPress_ACF_Permalinks
 */

namespace AcfPermalinks\Formatter;

use AcfPermalinks\Field_Permalink_Formatter;
use AcfPermalinks\Field_Permalink_Formatter_Context;

/**
 * Datepicker_Formatter.
 */
class Datepicker_Formatter implements Field_Permalink_Formatter {

	/**
	 * Checks is formatter can support field.
	 *
	 * @param Field_Permalink_Formatter_Context $context Formatting context.
	 *
	 * @return boolean
	 */
	function supports( Field_Permalink_Formatter_Context $context ) {
		$acf_options = $context->acf_field_options();

		return 'date_picker' == $acf_options['type'];
	}

	/**
	 * Performs field value formatting.
	 *
	 * @param Field_Permalink_Formatter_Context $context Formatting context.
	 *
	 * @return mixed
	 */
	function format( Field_Permalink_Formatter_Context $context ) {
		$context->terminate();

		$date_value = date_create( $context->value_original() );

		return $this->format_value( $date_value, $context->permalink_options() );
	}

	/**
	 * Format single value.
	 *
	 * @param \DateTime $value             Field value.
	 * @param array     $permalink_options Permalink options.
	 *
	 * @return string
	 */
	private function format_value( \DateTime $value, $permalink_options ) {
		// TODO et format.
		$format = 'Y-m-d';

		return $value->format( $format );
	}
}
