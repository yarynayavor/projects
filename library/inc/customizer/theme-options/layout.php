<?php


// Add sidebar section
$wp_customize->add_section( 'library_layout', array(
	'title'               => esc_html__('Layout','library'),
	'description'         => esc_html__( 'Layout section options.', 'library' ),
	'panel'               => 'library_theme_options_panel'
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'library_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'library_sanitize_select',
	'default'             => $options['sidebar_position']
) );

$wp_customize->add_control( 'library_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Sidebar Position', 'library' ),
	'section'             => 'library_layout',
	'type'                => 'select',
	'choices'			  => library_sidebar_position(),
) );

// Site layout setting and control.
$wp_customize->add_setting( 'library_theme_options[site_layout]', array(
	'sanitize_callback'   => 'library_sanitize_select',
	'default'             => $options['site_layout']
) );

$wp_customize->add_control( 'library_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'library' ),
	'section'             => 'library_layout',
	'type'                => 'select',
	'choices'			  => library_site_layout(),
) );
