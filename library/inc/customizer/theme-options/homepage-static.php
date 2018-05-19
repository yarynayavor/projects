<?php


// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'library_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'library_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content']
) );

$wp_customize->add_control( 'library_theme_options[enable_frontpage_content]', array(
	'label'       => esc_html__( 'Enable Content', 'library' ),
	'description' => esc_html__( 'Check to enable content on static front page only.', 'library' ),
	'section'     => 'static_front_page',
	'type'        => 'checkbox'
) );