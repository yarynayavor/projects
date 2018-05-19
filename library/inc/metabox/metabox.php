<?php


// Include slider layout meta
require get_template_directory() . '/inc/metabox/sidebar-layout.php';

// Include header image meta
require get_template_directory() . '/inc/metabox/header-image.php';

/**
 * Adds meta box to the post editing screen
 */
function library_custom_meta() {
	// Sidebar layout meta
    add_meta_box( 'library_sidebar_layout_meta', esc_html__( 'Sidebar Layout', 'library' ), 'library_sidebar_position_callback', array( 'post', 'page', 'jetpack-testimonial' ) );
	
	// Header image meta
    add_meta_box( 'library_header_image', esc_html__( 'Header Image', 'library' ), 'library_header_image_callback', array( 'post', 'page' ) );
}
add_action( 'add_meta_boxes', 'library_custom_meta' );


