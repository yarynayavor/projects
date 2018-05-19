<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function library_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'library' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'library' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for ($i=1; $i < 4; $i++) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer ', 'library' ).$i,
			'id'            => 'footer-'.$i,
			'description'   => esc_html__( 'Add footer widgets here.', 'library' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'library_widgets_init' );

/**
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/recent-posts.php';

/**
 * Include Social Link widget file
 */
require get_template_directory() . '/inc/widgets/social-link.php';

/**
 * Register widgets
 */
function library_register_widget() {
	// Register Recent Post widget
	register_widget( 'library_Recent_Posts' );

	// Register Social Link widget
	register_widget( 'library_Social_Link' );
}
add_action( 'widgets_init', 'library_register_widget' );