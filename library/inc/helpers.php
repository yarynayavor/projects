<?php

if( ! function_exists( 'library_check_enable_status' ) ):
	/**
	 * Check status of content.
	 *
	 * @since library 0.3
	 */
  	function library_check_enable_status( $input, $content_enable ){
		 $options = library_get_theme_options();

		 // Content status.
		 $content_status = $options[ $content_enable ];

		 // Get Page ID outside Loop.
		 $query_obj = get_queried_object();
		 $page_id   = null;
	    if ( is_object( $query_obj ) && 'WP_Post' == get_class( $query_obj ) ) {
	    	$page_id = get_queried_object_id();
	    }

		 // Front page displays in Reading Settings.
		 $page_on_front  = get_option( 'page_on_front' );

		 if ( ( ! is_home() && is_front_page() ) && ( ( 'static-frontpage' === $content_status ) || ( 'entire-site' === $content_status ) ) ) {
			$input = true;
		 }
		 else {
			$input = false;
		 }
		 return ( $input );

  	}
endif;
add_filter( 'library_section_status', 'library_check_enable_status', 10, 2 );


if ( ! function_exists( 'library_is_sidebar_enable' ) ) :
	/**
	 * Check if sidebar is enabled in meta box first then in customizer
	 *
	 * @since library 0.3
	 */
	function library_is_sidebar_enable() {
		$options               = library_get_theme_options();
		$sidebar_position      = $options['sidebar_position'];

		if ( is_home() ) {
			$post_id = get_option( 'page_for_posts' );
			if( ! empty( $post_id ) )
				$post_sidebar_position = get_post_meta( $post_id, 'library-sidebar-position', true );
			else
				$post_sidebar_position = '';
		} elseif( is_archive() || is_search() ) {
			$post_sidebar_position = '';
		} else {
			$post_sidebar_position = get_post_meta( get_the_id(), 'library-sidebar-position', true );
		}

		if ( ( $sidebar_position == 'no-sidebar' && $post_sidebar_position == "" ) || $post_sidebar_position == 'no-sidebar' ) {
			return false;
		} else {
			return true;
		}

	}
endif;


if ( ! function_exists( 'library_is_frontpage_content_enable' ) ) :
	/**
	 * Check home page ( static ) content status.
	 *
	 *.0
	 *
	 * @param bool $status Home page content status.
	 * @return bool Modified home page content status.
	 */
	function library_is_frontpage_content_enable( $status ) {
		if ( is_front_page() ) {
			$options = library_get_theme_options();
			$front_page_content_status = $options['enable_frontpage_content'];
			if ( false === $front_page_content_status ) {
				$status = false;
			}
		}
		return $status;
	}

endif;
add_filter( 'library_filter_frontpage_content_enable', 'library_is_frontpage_content_enable' );

add_action( 'library_action_pagination', 'library_pagination', 10 );
if ( ! function_exists( 'library_pagination' ) ) :

	/**
	 * pagination.
	 *
	 * @since library 0.3
	 */
	function library_pagination() {
		$options = library_get_theme_options();
		if ( true == $options['pagination_enable'] ) {
			$pagination = $options['pagination_type'];
			if ( $pagination == 'default' ) :
				the_posts_navigation();
			elseif ( $pagination == 'numeric' ) :
				the_posts_pagination( array(
				    'mid_size' => 4,
				    'prev_text' => esc_html__( 'Previous Posts', 'library' ),
				    'next_text' => esc_html__( 'Next Posts', 'library' ),
				) );
			endif;
		}
	}

endif;


add_action( 'library_action_post_pagination', 'library_post_pagination', 10 );
if ( ! function_exists( 'library_post_pagination' ) ) :

	/**
	 * post pagination.
	 *
	 * @since library 0.3
	 */
	function library_post_pagination() {
		the_post_navigation();
	}
endif;


/**
 * long excerpt
 *
 * @since library 0.3
 * @return  long excerpt value
 */
function library_excerpt_length( $length ){
	if ( is_admin() ) {
		return $length;
	}
	$options = library_get_theme_options();
	$length = $options['long_excerpt_length'];
	return (int)$length;
}
add_filter( 'excerpt_length', 'library_excerpt_length' );

// read more
function library_excerpt_more( $more ){
	if ( is_admin() ) {
		return $more;
	}
	return  '&hellip;';
}
add_filter( 'excerpt_more', 'library_excerpt_more' );

/**
 * custom excerpt function
 *
 * @since library 0.3
 * @return  no of words to display
 */
function library_trim_content( $length = 40, $post_obj = null ) {
	global $post;
	if ( is_null( $post_obj ) ) {
		$post_obj = $post;
	}

	$length = absint( $length );
	if ( $length < 1 ) {
		$length = 40;
	}

	$source_content = $post_obj->post_content;
	if ( ! empty( $post_obj->post_excerpt ) ) {
		$source_content = $post_obj->post_excerpt;
	}

	$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
	$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );

   return apply_filters( 'library_trim_content', $trimmed_content );
}

if ( ! function_exists( 'library_footer_sidebar_class' ) ) :
	/**
	 * Count the number of footer sidebars to enable dynamic classes for the footer
	 *
	 * @since library 0.3
	 */
	function library_footer_sidebar_class() {
		$data = array();
		$active_id = array();
	   	$count = 0;

	   	if ( is_active_sidebar( 'footer-1' ) ) {
	   		$active_id[] = '1';
	      	$count++;
	   	}

	   	if ( is_active_sidebar( 'footer-2' ) ){
	   		$active_id[] = '2';
	      	$count++;
		}

	   	if ( is_active_sidebar( 'footer-3' ) ){
	   		$active_id[] = '3';
	      	$count++;
	   	}

	   	$class = '';

	   	switch ( $count ) {
        	case '1':
            $class = 'one';
            break;
        	case '2':
            $class = 'two';
            break;
        	case '3':
            $class = 'three';
            break;
	   	}

		$data['active_id'] = $active_id;
		$data['class']     = $class;

	   	return $data;
	}
endif;


if ( ! function_exists( 'library_custom_content_width' ) ) :

	/**
	 * Custom content width.
	 *
	 * @since 1.0
	 */
	function library_custom_content_width() {

		global $content_width;
		$sidebar_position = library_layout();
		switch ( $sidebar_position ) {

		  case 'no-sidebar':
		    $content_width = 1170;
		    break;

		  case 'left-sidebar':
		  case 'right-sidebar':
		    $content_width = 819;
		    break;

		  default:
		    break;
		}
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$content_width = 1170;
		}

	}
endif;
add_action( 'template_redirect', 'library_custom_content_width' );


if ( ! function_exists( 'library_layout' ) ) :
	/**
	 * Check home page layout option
	 *
	 * @since library 0.3
	 *
	 * @return string library layout value
	 */
	function library_layout() {
		$options = library_get_theme_options();

		$sidebar_position = $options['sidebar_position'];
		$sidebar_position = apply_filters( 'library_sidebar_position', $sidebar_position );
		// Check if single and static blog page
		if ( is_singular() || is_home() ) {
			if ( is_home() ) {
				$post_sidebar_position = get_post_meta( get_option( 'page_for_posts' ), 'library-sidebar-position', true );
			} else {
				$post_sidebar_position = get_post_meta( get_the_ID(), 'library-sidebar-position', true );
			}
			if ( isset( $post_sidebar_position ) && ! empty( $post_sidebar_position ) ) {
				$sidebar_position = $post_sidebar_position;
			}
		}
		return $sidebar_position;
	}
endif;


if ( ! function_exists( 'library_header_image_meta_option' ) ) :
	/**
	 * Check header image option meta
	 *
	 * @since library 0.3
	 *
	 * @return string Header image meta option
	 */
	function library_header_image_meta_option() {

		if ( is_archive() || is_404() || is_search() ) {
			return get_header_image();
		} else {
			global $post;
			$post_id = $post->ID;

			$header_image_meta = get_post_meta( $post_id, 'library-header-image', true );

			if ( 'enable' == $header_image_meta && has_post_thumbnail( $post_id ) ) {
				return wp_get_attachment_url( get_post_thumbnail_id( $post_id ) );
			}elseif ( '' == $header_image_meta && get_header_image() ) {
				return get_header_image();
			} elseif ( 'disable' == $header_image_meta ) {
				return false;
			} elseif ( 'show-both' == $header_image_meta ) {
				$header_image_both_flag = array( get_header_image(), 'show-both' );
				return $header_image_both_flag;
			}
		}
	}
endif;


if ( ! function_exists( 'library_title_as_per_template' ) ) :
	/**
	 * Return title as per template rendered
	 *
	 * @since library 0.3
	 *
	 * @return string Template title
	 */
	function library_title_as_per_template() {
		if ( is_singular() ) {
			the_title();
		} elseif( is_404() ) {
			echo esc_html__( '404 Page', 'library' );
		} elseif( is_search() ){
			echo esc_html__( 'Search Page', 'library' );
		} elseif ( is_archive() ) {
			the_archive_title();
		} elseif ( is_home() ) {
			echo esc_html__( 'Blog Page', 'library' );
		}
	}
endif;


