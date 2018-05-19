<?php 

// Add archive section
$wp_customize->add_section( 'library_archive_option', array(
	'title'             => esc_html__( 'Archive Options','library' ),
	'description'       => esc_html__( 'These options works only on archive pages.', 'library' ),
	'panel'             => 'library_theme_options_panel',
) );

// Show archive content type setting and control.
$wp_customize->add_setting( 'library_theme_options[archive_content_type]', array(
	'default'           => $options['archive_content_type'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'library_theme_options[archive_content_type]', array(
	'label'             => esc_html__( 'Archive Content', 'library' ),
	'section'           => 'library_archive_option',
	'type'				=> 'radio',
	'choices'			=> array( 'excerpt' => esc_html__( 'Excerpt', 'library' ),
								  'content' => esc_html__( 'Full Content', 'library' )
									 ),
) );

// Show archive image setting and control.
$wp_customize->add_setting( 'library_theme_options[archive_image]', array(
	'default'           => $options['archive_image'],
	'sanitize_callback' => 'library_sanitize_checkbox',
) );

$wp_customize->add_control( 'library_theme_options[archive_image]', array(
	'label'       => esc_html__( 'Hide Featured Image', 'library' ),
	'description' => esc_html__( 'Check to hide featured images.', 'library' ),
	'section'     => 'library_archive_option',
	'type'        => 'checkbox',
) );

// Show archive meta setting and control.
$wp_customize->add_setting( 'library_theme_options[archive_meta]', array(
	'default'           => $options['archive_meta'],
	'sanitize_callback' => 'library_sanitize_checkbox',
) );

$wp_customize->add_control( 'library_theme_options[archive_meta]', array(
	'label'             => esc_html__( 'Hide Meta', 'library' ),
	'description'       => esc_html__( 'Check to hide meta like date, author, category.', 'library' ),
	'section'           => 'library_archive_option',
	'type'				=> 'checkbox',
) );
