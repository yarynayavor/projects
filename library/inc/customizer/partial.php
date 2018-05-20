<?php
/**
 * Render the site title for the selective refresh partial.
 *
 * @since library 0.3
 *
 * @return void
 */
function library_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since library 0.3
 *
 * @return void
 */
function library_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Render the category blog two title for the selective refresh partial.
 *
 * @since library 0.3
 * @return string
 */
function library_partial_category_blog_two_title() {
	$options = library_get_theme_options();
	return $options['category_blog_two_title'];
}

/**
 * Render the announcements title for the selective refresh partial.
 *
 * @since library 0.3
 * @return string
 */
function library_partial_announcements_title() {
	$options = library_get_theme_options();
	return $options['announcements_title'];
}

/**
 * Render the category blog three title for the selective refresh partial.
 *
 * @since library 0.3
 * @return string
 */
function library_partial_category_blog_one_title() {
	$options = library_get_theme_options();
	return $options['category_blog_one_title'];
}


/**
 * Render the partners title for the selective refresh partial.
 *
 * @since library 0.3
 * @return string
 */
function library_partial_partner_title() {
	$options = library_get_theme_options();
	return $options['partner_title'];
}
