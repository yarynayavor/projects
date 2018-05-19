<?php

// Add sidebar section
$wp_customize->add_section( 'library_pagination', array(
	'title'               => esc_html__('Pagination','library'),
	'description'         => esc_html__( 'Pagination section options.', 'library' ),
	'panel'               => 'library_theme_options_panel'
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'library_theme_options[pagination_enable]', array(
	'sanitize_callback'   => 'library_sanitize_checkbox',
	'default'             => $options['pagination_enable']
) );

$wp_customize->add_control( 'library_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'library' ),
	'section'             => 'library_pagination',
	'type'                => 'checkbox',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'library_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'library_sanitize_select',
	'default'             => $options['pagination_type']
) );

$wp_customize->add_control( 'library_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'library' ),
	'section'             => 'library_pagination',
	'type'                => 'select',
	'choices'			  => library_pagination_options(),
	'active_callback'	  => 'library_is_pagination_enable'
) );
