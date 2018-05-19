<?php

// Add excerpt section
$wp_customize->add_section( 'library_excerpt_section', array(
	'title'             => esc_html__('Excerpt','library'),
	'description'       => esc_html__( 'Excerpt section options.', 'library' ),
	'panel'             => 'library_theme_options_panel'
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'library_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'library_sanitize_number_range',
	'validate_callback' => 'library_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length']
) );

$wp_customize->add_control( 'library_theme_options[long_excerpt_length]', array(
	'label'       => esc_html__( 'Blog Page Excerpt Length', 'library' ),
	'description' => esc_html__( 'Total words to be displayed in archive page/search page.', 'library' ),
	'section'     => 'library_excerpt_section',
	'type'        => 'number',
	'input_attrs' => array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

// Read more text.
$wp_customize->add_setting( 'library_theme_options[read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			  => $options['read_more_text']
) );

$wp_customize->add_control( 'library_theme_options[read_more_text]', array(
	'label'       => esc_html__( 'Read More Text', 'library' ),
	'section'     => 'library_excerpt_section',
	'type'        => 'text',
) );