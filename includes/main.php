<?php
/**
 * Register hooks in WordPress
 *
 * @package WordPress_ACF_Permalinks
 */

require 'class-acf-permalink-adapter.php';
require 'class-field-permalink-formatter.php';
require 'class-field-permalink-formatter-context.php';

require 'formatter/class-default-formatter.php';
require 'formatter/class-checkbox-formatter.php';
require 'formatter/class-datepicker-formatter.php';

$adapter = new \AcfPermalinks\AcfPermalinkAdapter();

$adapter->add_formatter(new \AcfPermalinks\Formatter\DefaultFormatter());
$adapter->add_formatter(new \AcfPermalinks\Formatter\CheckboxFormatter());
$adapter->add_formatter(new \AcfPermalinks\Formatter\DatepickerFormatter());

add_filter( 'wpcfp_get_post_metadata', array( $adapter, 'get_post_metadata' ), 1, 2 );
