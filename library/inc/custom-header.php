<?php


/**
 * Set up the WordPress core custom header feature.
 *
 * @uses library_header_style()
 */
function library_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'library_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'library_custom_header_setup' );



if ( ! function_exists( 'library_custom_header' ) ) :
	/**
	 * Custom Header Codes
	 *
	 * @since library 0.3
	 *
	 */
	function library_custom_header() {
		
		/**
		 * Filter the default twentysixteen custom header sizes attribute.
		 *
		 * @since library 0.3
		 *
		 */
		$header_image_meta = library_header_image_meta_option();

		if ( ( '' == $header_image_meta && ! get_header_image() ) || ! $header_image_meta ) {
			return;
		}
		?>
		<section id="banner-image">
            <div class="black-overlay"></div>
          	<div class="container">
              	<div class="banner-wrapper">
	                <div class="page-title">
	                  <header class="entry-header">
	                    <h2 class="entry-title">
	                    	<?php library_title_as_per_template();?>
	                    </h2>
	                  </header>
	                </div><!-- end .page-title -->
                </div><!-- end .container -->
         	</div><!-- end .banner-wrapper -->
	        </section><!-- end #banner-image -->
		<?php
	}
endif;
add_action( 'library_banner_image_action', 'library_custom_header', 10 );

if ( ! function_exists( 'library_header_inline_css' ) ) :
	// Add Custom Css
	function library_header_inline_css() {
		$options = library_get_theme_options();
		
		$css = '';
		global $wp_query, $post;
		
		// Get front page ID
		$page_on_front	  = get_option('page_on_front');
		$page_for_posts   = get_option('page_for_posts');
		// Get Page ID outside Loop
		$page_id          = $wp_query->get_queried_object_id( $post );

		if( ( is_home() && $page_on_front == $page_id ) ) {
			return;
		}
		else {
			// Set header image by comparing the meta values
			$header_image = library_header_image_meta_option();

			if ( is_array( $header_image ) ) {
				$header_image = $header_image[0];
			} else {
				$header_image = $header_image;
			}

			$css .= '
			#banner-image {
				background-image: url("'.esc_url( $header_image ).'");
			}';
		}
	wp_add_inline_style( 'library-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'library_header_inline_css', 10 );