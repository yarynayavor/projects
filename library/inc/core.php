<?php

/**
 * Include options function.
 */
require get_template_directory() . '/inc/options.php';


// Load customizer defaults values
require get_template_directory() . '/inc/customizer/defaults.php';


/**
 * Merge values from default options array and values from customizer
 *
 * @return array Values returned from customizer
 * @since library 0.3
 */
function library_get_theme_options() {
  $library_default_options = library_get_default_theme_options();

  return array_merge( $library_default_options , get_theme_mod( 'library_theme_options', $library_default_options ) ) ;
}


/**
  * Write message for featured image upload
  *
  * @return array Values returned from customizer
  * @since library 0.3
*/
function library_slider_image_instruction( $content, $post_id ) {
  $allowed = array( 'page' );
  if ( in_array( get_post_type( $post_id ), $allowed ) ) {
    return $content .= '<p><b>' . esc_html__( 'Note', 'library' ) . ':</b>' . esc_html__( ' The recommended size for image is 1170px by 500px while using it for slider', 'library' ) . '</p>';
  } 
  return $content;
}
add_filter( 'admin_post_thumbnail_html', 'library_slider_image_instruction', 10, 2);

/**
 * Add breadcrumb functions.
 */
require get_template_directory() . '/inc/breadcrumb-class.php';
/**
 * Add helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Add structural hooks.
 */
require get_template_directory() . '/inc/structure.php';

/**
 * Add metabox
 */
require get_template_directory() . '/inc/metabox/metabox.php';

/**
 * modules additions.
 */
require get_template_directory() . '/inc/modules/modules.php';

/**
 * Custom widget additions.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load woocommerce compatibility file.
 */
require get_template_directory() . '/inc/woocommerce.php';
/**
 * Load tgmpa
 */
require get_template_directory() . '/inc/tgmpa/tgm-hook.php';