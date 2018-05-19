<?php
/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'library_reset_section', array(
	'title'             => esc_html__('Reset all settings','library'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'library' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'library_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'library_sanitize_checkbox',
	'transport'			  => 'postMessage'
) );

$wp_customize->add_control( 'library_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'library' ),
	'section'           => 'library_reset_section',
	'type'              => 'checkbox',
) );