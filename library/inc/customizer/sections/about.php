<?php

// Add about enable section
$wp_customize->add_section( 'library_about_section', array(
	'title'             => esc_html__('Announcement','library'),
	'description'       => esc_html__( 'Announcement section options.', 'library' ),
	'panel'             => 'library_sections_panel'
) );

// Add about enable setting and control.
$wp_customize->add_setting( 'library_theme_options[about_section_enable]', array(
	'default'           => $options['about_section_enable'],
	'sanitize_callback' => 'library_sanitize_select'
) );

$wp_customize->add_control( 'library_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'Enable on', 'library' ),
	'section'           => 'library_about_section',
	'type'              => 'select',
	'choices'           => library_enable_disable_options()
) );

// Add enable page select setting and control.
$wp_customize->add_setting( 'library_theme_options[about_content_page]', array(
	'sanitize_callback' => 'library_sanitize_page'
) );

$wp_customize->add_control( 'library_theme_options[about_content_page]', array(
	'label'           	=> esc_html__( 'Select Page', 'library' ),
	'description'		=> esc_html__( 'Set the image size of selected page to 1200px by 800px.','library' ),
	'section'         	=> 'library_about_section',
	'type'            	=> 'dropdown-pages',
	'active_callback' 	=> 'library_is_about_active',
) );
