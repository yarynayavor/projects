<?php

$wp_customize->add_section( 'library_breadcrumb', array(
	'title'             => esc_html__('Breadcrumb','library'),
	'description'       => esc_html__( 'Breadcrumb section options.', 'library' ),
	'panel'             => 'library_theme_options_panel'
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'library_theme_options[breadcrumb_enable]', array(
	'sanitize_callback'	=> 'library_sanitize_checkbox',
	'default'          	=> $options['breadcrumb_enable']
) );

$wp_customize->add_control( 'library_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'library' ),
	'section'          	=> 'library_breadcrumb',
	'type'             	=> 'checkbox',
) );

// Breadcrumb seperator.
$wp_customize->add_setting( 'library_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator']
) );

$wp_customize->add_control( 'library_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Breadcrumb Seperator', 'library' ),
	'section'          	=> 'library_breadcrumb',
	'type'             	=> 'text',
	'input_attrs'		=> array(
		'style' => 'width:100px'
		),
	'active_callback'	=> 'library_is_breadcrumb_enable'
) );