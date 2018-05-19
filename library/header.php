<?php
	/**
	 * library_doctype hook
	 *
	 * @hooked library_doctype -  10
	 *
	 */
	do_action( 'library_doctype' );

?>
<head>
<?php
	/**
	 * library_before_wp_head hook
	 *
	 * @hooked library_head -  10
	 *
	 */
	do_action( 'library_before_wp_head' );

	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * library_page_start hook
	 *
	 * @hooked library_page_start -  10
	 *
	 */
	do_action( 'library_page_start' );

	/**
	 * library_top_bar hook
	 *
	 * @hooked library_add_top_bar -  10
	 *
	 */
	do_action( 'library_top_bar' );

	/**
	 * library_header hook
	 *
	 * @hooked library_header_start       - 10
	 * @hooked library_site_branding_start- 20
	 * @hooked library_site_logo          - 30
	 * @hooked library_site_header        - 40
	 * @hooked library_site_branding_end  - 50
	 * @hooked library_navigation         - 60
	 * @hooked library_header_end         - 100
	 *
	 */
	do_action( 'library_header' );

	/**
	 * library_mobile_menu hook
	 *
	 * @hooked library_mobile_menu -  10
	 *
	 */
	do_action( 'library_mobile_menu' );

	/**
	 * library_content_start hook
	 *
	 * @hooked library_content_start -  10
	 *
	 */
	do_action( 'library_content_start' );

	if( is_home() || !is_front_page() ) { 
		/**
		 * library_banner_image_action hook
		 *
		 * @hooked library_custom_header -  10
		 */
		do_action( 'library_banner_image_action' );
	}
	/**
	 * library_modules hook
	 *
	 * @hooked library_content_start -  10
	 *
	 */
	do_action( 'library_modules' );

	/**
	 * library_loader_action hook
	 *
	 * @hooked library_loader -  10
	 *
	 */
	do_action( 'library_loader_action' );

	/**
	 * library_breadcrumb_action hook
	 *
	 * @hooked library_add_breadcrumb -  10
	 *
	 */
	do_action( 'library_breadcrumb_action' );
	/**
	* library_primary_content hook
	*
	* @hooked library_add_slider_section - 10
	* @hooked library_add_about_section - 20
	* @hooked library_add_category_blog_one - 30
	* @hooked library_add_category_blog_two - 50
	* @hooked library_add_category_blog_three - 60
	*
	*/
	do_action( 'library_primary_content' );