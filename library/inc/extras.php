<?php

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function library_body_classes( $classes ) {
	$options = library_get_theme_options();

	// Add class only when laoder is disabled
	if ( ! $options['loader_enable'] ) {
		$classes[] = 'display-none';
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class for layout
	$classes[] = esc_attr( $options['site_layout'] );

	$sidebar_position = library_layout();

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = esc_attr( $sidebar_position );
	} else {
		$classes[] = 'no-sidebar';
	}

	if ( is_404() ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'library_body_classes' );


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function library_custom_search_form( $form ) {
    $form = '<form action="'. esc_url( home_url( '/' ) ) .'" method="get">
			  <input type="text" name="s" placeholder="' . esc_attr__( 'Search&hellip;', 'library' ) . '">
			  <button type="submit"><i class="fa fa-search"></i></button>
			</form>';

    return $form;
}
add_filter( 'get_search_form', 'library_custom_search_form' );
