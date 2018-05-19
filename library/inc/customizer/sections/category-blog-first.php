<?php
/**
<<<<<<< HEAD
* Category Blog one options
=======
* Category Blog Three options
>>>>>>> 7489da0054be6c4ea1ff2a2379700a7f28a0146e

*/

// Add category blog one enable section
$wp_customize->add_section( 'library_category_blog_first', array(
	'title'             => esc_html__('First Category Blog','library'),
	'description'       => esc_html__( 'First Category Blog options.', 'library' ),
	'panel'             => 'library_sections_panel'
) );

// Add category blog one enable setting and control.
$wp_customize->add_setting( 'library_theme_options[category_blog_one_enable]', array(
	'default'           => $options['category_blog_one_enable'],
	'sanitize_callback' => 'library_sanitize_select'
) );

$wp_customize->add_control( 'library_theme_options[category_blog_one_enable]', array(
	'label'             => esc_html__( 'Enable on', 'library' ),
	'section'           => 'library_category_blog_first',
	'type'              => 'select',
	'choices'           => library_enable_disable_options()
) );

// Add category blog one title.
$wp_customize->add_setting( 'library_theme_options[category_blog_one_title]', array(
	'default'           => $options['category_blog_one_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'library_theme_options[category_blog_one_title]', array(
	'label'             => esc_html__( 'Title', 'library' ),
	'section'           => 'library_category_blog_first',
	'type'              => 'text',
	'active_callback'	=> 'library_category_blog_first_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'library_theme_options[category_blog_one_title]', array(
		'selector'            => '#popular-courses .entry-header .entry-title',
		'render_callback'     => 'library_partial_category_blog_one_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add category blog one slider dragable.
$wp_customize->add_setting( 'library_theme_options[category_blog_one_dragable]', array(
	'default'           => $options['category_blog_one_dragable'],
	'sanitize_callback' => 'library_sanitize_checkbox'
) );

$wp_customize->add_control( 'library_theme_options[category_blog_one_dragable]', array(
	'label'             => esc_html__( 'Enable Slide Dragable', 'library' ),
	'section'           => 'library_category_blog_first',
	'type'              => 'checkbox',
	'active_callback'	=> 'library_category_blog_first_active'
) );

// Add category blog one slider auto play.
$wp_customize->add_setting( 'library_theme_options[category_blog_one_autoplay]', array(
	'default'           => $options['category_blog_one_autoplay'],
	'sanitize_callback' => 'library_sanitize_checkbox'
) );

$wp_customize->add_control( 'library_theme_options[category_blog_one_autoplay]', array(
	'label'             => esc_html__( 'Enable Slide Auto Slide', 'library' ),
	'section'           => 'library_category_blog_first',
	'type'              => 'checkbox',
	'active_callback'	=> 'library_category_blog_first_active'
) );

// Add category blog one layout.
$wp_customize->add_setting( 'library_theme_options[category_blog_one_layout]', array(
	'default'           => $options['category_blog_one_layout'],
	'sanitize_callback' => 'library_sanitize_select'
) );

$wp_customize->add_control( 'library_theme_options[category_blog_one_layout]', array(
	'label'             => esc_html__( 'Layout', 'library' ),
	'section'           => 'library_category_blog_first',
	'type'              => 'select',
	'choices'           => library_category_blog_first_layout(),
	'active_callback'	=> 'library_category_blog_first_active'
) );

// Add category blog one layout.
$wp_customize->add_setting( 'library_theme_options[category_blog_one_type]', array(
	'default'           => $options['category_blog_one_type'],
	'sanitize_callback' => 'library_sanitize_select'
) );

$wp_customize->add_control( 'library_theme_options[category_blog_one_type]', array(
	'label'             => esc_html__( 'Content Type', 'library' ),
	'section'           => 'library_category_blog_first',
	'type'              => 'select',
	'choices'           => library_category_blog_first_type(),
	'active_callback'	=> 'library_category_blog_first_active'
) );

// Add category blog one icon
$wp_customize->add_setting( 'library_theme_options[category_blog_one_icon]', array(
	'default'           => $options['category_blog_one_icon'],
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'library_theme_options[category_blog_one_icon]', array(
	'label'             => esc_html__( 'Icon', 'library' ),
	'description'       => sprintf( __( 'Use font awesome icon: Eg: %1$s. %2$sSee more here%3$s', 'library' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
	'section'           => 'library_category_blog_first',
	'type'              => 'text',
	'active_callback'	=> 'library_category_blog_first_active'
) );

// Add category blog one type category setting and control
$wp_customize->add_setting(  'library_theme_options[category_blog_one_parent_category]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new library_Dropdown_Taxonomies_Control ( $wp_customize,'library_theme_options[category_blog_one_parent_category]', array(
	'label'             => esc_html__( 'Select Parent Category', 'library' ),
	'section'           => 'library_category_blog_first',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'library_category_blog_first_sub_category'
) ) );
