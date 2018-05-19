<?php

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function library_jetpack_setup() {
	$options = library_get_theme_options();

	$pagination_type	= isset( $options['pagination_type'] ) ? $options['pagination_type'] : '';
	$type = '';
	
	if ( in_array( $pagination_type, array( 'infinite-click', 'infinite-scroll' ) ) ) {
		if ( 'infinite-click' == $pagination_type ) {
			$type = 'click';
		} elseif( 'infinite-scroll' == $pagination_type ){
			$type = 'scroll';
		}
		
		// Add theme support for Infinite Scroll.
		add_theme_support( 'infinite-scroll', array(
			'type'		=> $type,
			'container' => 'main',
			'render'    => 'library_infinite_scroll_render',
			'footer'    => 'page',
		) );
	}

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'library_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function library_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			$library_cat_id = get_queried_object_id();
			$options = library_get_theme_options();
			$archive_grid_layout = ! empty( $options['archive_grid_category'] ) ? $options['archive_grid_category'] : array();
			if ( in_array( $library_cat_id, $archive_grid_layout ) ) :
				get_template_part( 'template-parts/content', 'grid' );
			else :
				get_template_part( 'template-parts/content', get_post_format() );
			endif;
		endif;
	}
}
