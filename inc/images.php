<?php
/**
 * Custom image sizes
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// general
add_image_size('preview-image', 300, 200, TRUE);
add_image_size('thumb-image', 600, 9999, FALSE);
add_image_size('big-image', 1024, 9999, FALSE);

// Gallery
add_image_size('galthumb-image', 500, 300, TRUE);

// Blog
add_image_size('blog-image', 650, 440, TRUE);