<?php


// Add announcements enable section
$wp_customize->add_section( 'library_announcements', array(
	'title'             => esc_html__('Announcements','library'),
	'description'       => esc_html__( 'Announcements options.', 'library' ),
	'panel'             => 'library_sections_panel'
) );

// Add announcements enable setting and control.
$wp_customize->add_setting( 'library_theme_options[announcements_enable]', array(
	'default'           => $options['announcements_enable'],
	'sanitize_callback' => 'library_sanitize_select'
) );

$wp_customize->add_control( 'library_theme_options[announcements_enable]', array(
	'label'             => esc_html__( 'Enable on', 'library' ),
	'section'           => 'library_announcements',
	'type'              => 'select',
	'choices'           => library_enable_disable_options()
) );

// Add announcements title.
$wp_customize->add_setting( 'library_theme_options[announcements_title]', array(
	'default'           => $options['announcements_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'library_theme_options[announcements_title]', array(
	'label'             => esc_html__( 'Title', 'library' ),
	'section'           => 'library_announcements',
	'type'              => 'text',
	'active_callback'	=> 'library_announcements_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'library_theme_options[announcements_title]', array(
		'selector'            => '#recent-news .entry-header .entry-title',
		'render_callback'     => 'library_partial_announcements_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add announcements slider dragable.
$wp_customize->add_setting( 'library_theme_options[announcements_dragable]', array(
	'default'           => $options['announcements_dragable'],
	'sanitize_callback' => 'library_sanitize_checkbox'
) );

$wp_customize->add_control( 'library_theme_options[announcements_dragable]', array(
	'label'             => esc_html__( 'Enable Slide Dragable', 'library' ),
	'section'           => 'library_announcements',
	'type'              => 'checkbox',
	'active_callback'	=> 'library_announcements_active'
) );

// Add announcements slider auto play.
$wp_customize->add_setting( 'library_theme_options[announcements_autoplay]', array(
	'default'           => $options['announcements_autoplay'],
	'sanitize_callback' => 'library_sanitize_checkbox'
) );

$wp_customize->add_control( 'library_theme_options[announcements_autoplay]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'library' ),
	'section'           => 'library_announcements',
	'type'              => 'checkbox',
	'active_callback'	=> 'library_announcements_active'
) );

// Add announcements count.
$wp_customize->add_setting( 'library_theme_options[announcements_count]', array(
	'default'           => $options['announcements_count'],
	'sanitize_callback' => 'absint',
	'validate_callback' => 'library_validate_announcements_count'
) );

$wp_customize->add_control( 'library_theme_options[announcements_count]', array(
	'label'             => esc_html__( 'No. of Articles', 'library' ),
	'description'       => esc_html__( 'Min 1 / Max 12', 'library' ),
	'section'           => 'library_announcements',
	'type'              => 'number',
	'input_attrs'       => array(
		'min' => 1,
		'max' => 12,
		'style' => 'width:100px'
		),
	'active_callback'	=> 'library_announcements_active'
) );

// Add announcements layout.
$wp_customize->add_setting( 'library_theme_options[announcements_layout]', array(
	'default'           => $options['announcements_layout'],
	'sanitize_callback' => 'library_sanitize_select'
) );

$wp_customize->add_control( 'library_theme_options[announcements_layout]', array(
	'label'             => esc_html__( 'Layout', 'library' ),
	'section'           => 'library_announcements',
	'type'              => 'select',
	'choices'           => library_announcements_layout(),
	'active_callback'	=> 'library_announcements_active'
) );

// Add announcements type.
$wp_customize->add_setting( 'library_theme_options[announcements_type]', array(
	'default'           => $options['announcements_type'],
	'sanitize_callback' => 'library_sanitize_select'
) );

$wp_customize->add_control( 'library_theme_options[announcements_type]', array(
	'label'             => esc_html__( 'Content Type', 'library' ),
	'section'           => 'library_announcements',
	'type'              => 'select',
	'choices'           => library_announcements_type(),
	'active_callback'	=> 'library_announcements_active'
) );

// Add announcements type category setting and control
$wp_customize->add_setting(  'library_theme_options[announcements_multiple_category]', array(
	'sanitize_callback' => 'library_sanitize_category_list',
) ) ;

$wp_customize->add_control( new library_Dropdown_Category_Control ( $wp_customize,'library_theme_options[announcements_multiple_category]', array(
	'label'             => esc_html__( 'Select Category', 'library' ),
	'section'           => 'library_announcements',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'library_announcements_multiple_category'
) ) );