<?php
/**
 * Menu
 *
 * This is the template for all registered menus
 *
 * @package Theme Palace
 * @subpackage library
 * @since 0.3
 */

if ( ! function_exists( 'library_navigation' ) ) :
	/**
	 * Add primary menu
	 *
	 * @since library 0.3
	 *
	 */
	function library_navigation() {
		?>
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
        <?php 
        endif;
	}
endif;
add_action( 'library_header', 'library_navigation', 60 );


if ( ! function_exists( 'library_mobile_menu' ) ) :
	/**
	 * Add mobile menu
	 */

	function library_mobile_menu() { ?>
		<!-- Mobile Menu -->
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
	        <nav id="sidr-left-top" class="mobile-menu sidr left">
	          <div class="site-branding text-center">
	          	<?php library_site_logo();?>
	          	<?php library_site_header(); ?>
	          </div>
	          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul' ) ); ?>
	        </nav><!-- end left-menu -->

	        <a id="sidr-left-top-button" class="menu-button right" href="#sidr-left-top"><i class="fa fa-bars"></i></a>
	    <?php endif; 
	}
endif;
add_action( 'library_mobile_menu','library_mobile_menu', 70 );