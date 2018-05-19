<?php

if ( ! function_exists( 'library_doctype' ) ) :

	function library_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'library_doctype', 'library_doctype', 10 );


if ( ! function_exists( 'library_head' ) ) :

	function library_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'library_before_wp_head', 'library_head', 10 );


if ( ! function_exists( 'library_page_start' ) ) :

	function library_page_start() {
		?>
		<div id="page" class="hfeed site">
			<div class="site-inner">
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'library' ); ?></a>
		<?php
	}
endif;
add_action( 'library_page_start', 'library_page_start', 10 );


if ( ! function_exists( 'library_header_start' ) ) :

	function library_header_start() {
		?>
        <header id="masthead" class="site-header">
            <div class="container">
		<?php
	}
endif;
add_action( 'library_header', 'library_header_start', 10 );


if ( ! function_exists( 'library_site_branding_start' ) ) :

	function library_site_branding_start() {
		?>
        <div class="site-branding align-left"><!-- use align-right class to change logo position -->
		<?php
	}
endif;
add_action( 'library_header', 'library_site_branding_start', 20 );


if ( ! function_exists( 'library_site_logo' ) ) :

	function library_site_logo() {
		?>
	        <div class="site-logo">
	        	<?php
	        	if ( function_exists( 'the_custom_logo' ) ) {
	        		the_custom_logo();
	        	}
	        	?>
	        </div><!-- end .site-logo -->
		<?php
	}
endif;
add_action( 'library_header', 'library_site_logo', 30 );


if ( ! function_exists( 'library_site_header' ) ) :

	function library_site_header() {
		?>
        <div id="site-header">
            <?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
        </div><!-- end #site-header -->
		<?php
	}
endif;
add_action( 'library_header', 'library_site_header', 40 );


if ( ! function_exists( 'library_site_branding_end' ) ) :
	/**
	 * Start div id #masthead
	 *
	 * @since library 0.3
	 *
	 */
	function library_site_branding_end() {
		?>
	    </div><!--end .site-branding-->
		<?php
	}
endif;
add_action( 'library_header', 'library_site_branding_end', 50 );


if ( ! function_exists( 'library_header_end' ) ) :
	/**
	 * End header class id #masthead
	 *
	 * @since library 0.3
	 *
	 */
	function library_header_end() {
		?>
        	</div><!-- end .menu-wrapper -->
        </header><!--end .site-header-->
		<?php
	}
endif;
add_action( 'library_header', 'library_header_end', 100 );


if ( ! function_exists( 'library_content_start' ) ) :
	/**
	 * Start div id #content
	 *
	 * @since library 0.3
	 *
	 */
	function library_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'library_content_start', 'library_content_start', 10 );


if ( ! function_exists( 'library_content_end' ) ) :
	/**
	 * End div id #content
	 *
	 * @since library 0.3
	 *
	 */
	function library_content_end() {
		?>
		</div><!--end .site-content-->
		<?php
	}
endif;
add_action( 'library_content_end', 'library_content_end', 100 );


if ( ! function_exists( 'library_footer_start' ) ) :
	/**
	 * End div id #content
	 *
	 * @since library 0.3
	 *
	 */
	function library_footer_start() {
		$footer_sidebar_data = library_footer_sidebar_class();
		$class               = $footer_sidebar_data['class'];
		?>
		<footer id="colophon" class="site-footer <?php echo esc_attr( $class );?>-col" role="contentinfo">
		<?php
	}
endif;
add_action( 'library_footer', 'library_footer_start', 10 );


if ( ! function_exists( 'library_footer' ) ) :
	/**
	 * End div id #content
	 *
	 * @since library 0.3
	 *
	 */
	function library_footer() {

		$footer_sidebar_data = library_footer_sidebar_class();
		$active_id           = $footer_sidebar_data['active_id'];

		if ( empty( $active_id ) ) {
			return;
		} ?>
        <div class="container page-section">
	      	<?php for ( $i=0; $i < count( $active_id ); $i++ ) { ?>

			<div class="column-wrapper">
	      		<?php 
	      		if ( is_active_sidebar( 'footer-'.absint( $active_id[ $i ] ).'' ) ){
	      			dynamic_sidebar( 'footer-'.absint( $active_id[ $i ] ).'' );
	      		}
	      		?>
	      	</div>
	      	<?php } ?>
        </div><!-- end .container -->
		<?php
	}
endif;
add_action( 'library_footer', 'library_footer', 30 );


if ( ! function_exists( 'library_copyright' ) ) :
	/**
	 * End div class .site-info
	 *
	 * @since library 0.3
	 *
	 */
	function library_copyright() { 
		$theme_data = wp_get_theme(); ?>
		
	    <div class="site-info copyright text-center">
	    	<div class="container">
	      		<?php echo sprintf( _x( 'Наукова бібліотека Львівського національного університету імені Івана Франка', '1: Year, 2: Site Title with home URL', 'library' ), date( 'Y' ) )?>
	    	</div>
	    </div><!-- end .site-info -->  	
	<?php
	}
endif;
add_action( 'library_footer', 'library_copyright', 40 );


if ( ! function_exists( 'library_footer_end' ) ) :
	/**
	 * End footer id #colophon
	 *
	 * @since library 0.3
	 *
	 */
	function library_footer_end() {
		?>
        </footer><!-- end .site-footer -->
		<?php
	}
endif;
add_action( 'library_footer', 'library_footer_end', 100 );


if ( ! function_exists( 'library_back_to_top' ) ) :
	/**
	 * Back to top class .backtotop
	 *
	 * @since library 0.3
	 *
	 */
	function library_back_to_top() {
		$options = library_get_theme_options();
		if ( $options['scroll_top_visible'] ) : ?>
        	<div class="backtotop"><i class="fa fa-angle-up fa-2x"></i></div><!--end .backtotop-->
		<?php 
		endif;
	}
endif;
add_action( 'library_back_to_top', 'library_back_to_top', 10 );


if ( ! function_exists( 'library_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since library 0.3
	 */
	function library_add_breadcrumb() {
		$options = library_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		$args = array(
			'show_on_front'   => false,
			'show_title'      => true,
			'show_browse'     => false,
		);
		echo '<div class="container">';
		breadcrumb_trail( $args );
		echo '</div>';
		
		return;
	}
endif;
add_action( 'library_breadcrumb_action', 'library_add_breadcrumb' , 10 );


if ( ! function_exists( 'library_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since library 0.3
	 *
	 */
	function library_page_end() {
		?>
				</div><!--end .site-inner -->
		</div><!-- end #page-->
		<?php
	}
endif;
add_action( 'library_page_end', 'library_page_end', 100 );


if ( ! function_exists( 'library_page_section' ) ) :
	/**
	 * Start div class .container .page-section
	 *
	 * @since library 0.3
	 *
	 */
	function library_page_section() {
		?>
		<div class="container page-section">
		<?php
	}
endif;
add_action( 'library_page_section', 'library_page_section', 10 );


if ( ! function_exists( 'library_page_section_end' ) ) :
	/**
	 * Start div class .container .page-section
	 *
	 * @since library 0.3
	 *
	 */
	function library_page_section_end() {
		?>
		</div><!-- end .page-section" -->
		<?php
	}
endif;
add_action( 'library_page_section_end', 'library_page_section_end', 10 );