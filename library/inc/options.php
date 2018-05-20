<?php

function library_site_layout() {
  $library_site_layout = array(
    'wide'  => esc_html__( 'Wide', 'library' ),
    'boxed' => esc_html__( 'Boxed', 'library' ),
  );

  $output = apply_filters( 'library_site_layout', $library_site_layout );

  return $output;
}

/**
 * Sidebar position
 * @return array Sidbar positions
 */
function library_sidebar_position() {
  $library_sidebar_position = array(
    'right-sidebar' => esc_html__( 'Right', 'library' ),
    'left-sidebar'  => esc_html__( 'Left', 'library' ),
    'no-sidebar'    => esc_html__( 'No Sidebar', 'library' ),
  );

  $output = apply_filters( 'library_sidebar_position', $library_sidebar_position );

  return $output;
}

/**
 * Header image options
 * @return array Header image options
 */
function library_header_image() {
  $library_header_image = array(
    'enable' => esc_html__( 'Enable( Featured Image )', 'library' ),
    'show-both' => esc_html__( 'Show Both( Featured and Header Image )', 'library' ),
    'disable'  => esc_html__( 'Disable', 'library' ),
  );

  $output = apply_filters( 'library_header_image', $library_header_image );

  return $output;
}

/**
 * Pagination
 *
 * @return array site pagination options
 */
function library_pagination_options() {
  $options = library_get_theme_options();
  $library_pagination_options = array(
    'numeric'=> esc_html__( 'Numeric', 'library' ),
    'default'=> esc_html__( 'Default(Older/Newer)', 'library' ),
  );

  $pagination_type = $options['pagination_type'];
  if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
        $library_pagination_options['infinite-click'] = 'Infinite Click';
        $library_pagination_options['infinite-scroll'] = 'Infinite Scroll';
    } elseif( 'infinite-click' == $pagination_type || 'infinite-scroll' == $pagination_type ) {
      $options['pagination_type'] = 'numeric';
      set_theme_mod( 'library_theme_options', $options );
    }

  $output = apply_filters( 'library_pagination_options', $library_pagination_options );

  return $output;
}


/**
 * Slider
 * @return array slider options
 */
function library_enable_disable_options() {
  $library_enable_disable_options = array(
    'static-frontpage'  => esc_html__( 'Static Frontpage', 'library' ),
    'disabled'          => esc_html__( 'Disabled', 'library' ),
  );

  $output = apply_filters( 'library_enable_disable_options', $library_enable_disable_options );

  return $output;
}


/**
 * Enabling options
 * @return array Enable options
 */
function library_enable_entire_option() {
  $library_enable_entire_option = array(
    'static-frontpage'  => esc_html__( 'Static Frontpage', 'library' ),
    'disabled'          => esc_html__( 'Disabled', 'library' ),
    'entire-site'          => esc_html__( 'Entrie Site', 'library' ),
  );

  $output = apply_filters( 'library_enable_entire_option', $library_enable_entire_option );

  return $output;
}


/**
 * Slider effects
 * @return array Slider effects
 */
function library_slider_effect() {
  $library_slider_effect = array(
    'fade'                                        => esc_html__( 'Fade', 'library' ),
    'cubic-bezier(0.250, 0.250, 0.750, 0.750)'    => esc_html__( 'Linear', 'library' ),
  );

  $output =  apply_filters( 'library_slider_effect', $library_slider_effect );

  // Sort array in ascending order, according to the key:
  if ( ! empty( $output ) ) {
    ksort( $output );
  }

  return $output;
}



/**
 * Category blog two content type
 * @return array Category blog two content type options
 */
function library_category_blog_two_type() {
  $library_category_blog_two_type = array(
    'multiple-category' => esc_html__( 'Multiple Category', 'library' ),
    'recent-posts'      => esc_html__( 'Recent Posts', 'library' ),
  );

  $output = apply_filters( 'library_category_blog_two_type', $library_category_blog_two_type );

  return $output;
}

/**
 * Category blog two content layout
 * @return array Category blog two content type options
 */
function library_category_blog_two_layout() {
  $library_category_blog_two_layout = array(
    3  => esc_html__( '3 Column', 'library' ),
    4  => esc_html__( '4 Column', 'library' ),
  );

  $output = apply_filters( 'library_category_blog_two_layout', $library_category_blog_two_layout );

  return $output;
}


/**
 * Category blog two content type
 * @return array Category blog two content type options
 */
function library_announcements_type() {
  $library_announcements_type = array(
    'multiple-category' => esc_html__( 'Multiple Category', 'library' ),
    'recent-posts'      => esc_html__( 'Recent Posts', 'library' ),
  );

  $output = apply_filters( 'library_announcements_type', $library_announcements_type );

  return $output;
}

/**
 * announcements content layout
 * @return array announcements content type options
 */
function library_announcements_layout() {
  $library_announcements_layout = array(
    3  => esc_html__( '3 Column', 'library' ),
    4  => esc_html__( '4 Column', 'library' ),
  );

  $output = apply_filters( 'library_announcements_layout', $library_announcements_layout );

  return $output;
}


/**
 * Category blog three content layout
 * @return array Category blog three content type options
 */
function library_category_blog_first_layout() {
  $library_category_blog_first_layout = array(
    4  => esc_html__( '4 Column', 'library' ),
    5  => esc_html__( '5 Column', 'library' ),
    6  => esc_html__( '6 Column', 'library' ),
  );

  $output = apply_filters( 'library_category_blog_first_layout', $library_category_blog_first_layout );

  return $output;
}

/**
 * Category blog three content type
 * @return array Category blog three content type options
 */
function library_category_blog_first_type() {
  $library_category_blog_first_type = array(
    'category'          => esc_html__( 'Categories', 'library' ),
    'sub-category'      => esc_html__( 'Sub Categories', 'library' ),
  );

  $output = apply_filters( 'library_category_blog_first_type', $library_category_blog_first_type );

  return $output;
}