<?php


// Add top bar section
$wp_customize->add_section( 'library_top_bar_options', array(
	'title'             => esc_html__( 'Top Bar','library' ),
	'description'       => esc_html__( 'Options for top bar.', 'library' ),
	'panel'             => 'library_sections_panel',
) );

// Show top bar setting and control.
$wp_customize->add_setting( 'library_theme_options[top_bar_show]', array(
	'default'           => $options['top_bar_show'],
	'sanitize_callback' => 'library_sanitize_checkbox',
) );

$wp_customize->add_control( 'library_theme_options[top_bar_show]', array(
	'label'             => esc_html__( 'Show Top Bar', 'library' ),
	'section'           => 'library_top_bar_options',
	'type'				=> 'checkbox',
) );

// Top bar content type setting and control.
$wp_customize->add_setting( 'library_theme_options[top_bar_content_type]', array(
	'default'           => $options['top_bar_content_type'],
	'sanitize_callback' => 'library_sanitize_select',
) );

$wp_customize->add_control( 'library_theme_options[top_bar_content_type]', array(
	'active_callback'=> 'library_is_top_bar_enable',
	'label'          => esc_html__( 'Content Type', 'library' ),
	'section'        => 'library_top_bar_options',
	'type'           => 'select',
	'choices'        => array(
		'custom'     => esc_html__( 'Custom','library'),
		),
) );

// Number of fields setting and control.
$wp_customize->add_setting( 'library_theme_options[top_bar_field_number]', array(
	'default'           => $options['top_bar_field_number'],
	'sanitize_callback' => 'library_sanitize_number_range',
	'validate_callback' => 'library_top_bar_field_number'
) );

$wp_customize->add_control( 'library_theme_options[top_bar_field_number]', array(
	'active_callback'=> 'library_is_top_bar_enable',
	'label'          => esc_html__( 'Number of fields', 'library' ),
	'description'    => sprintf( esc_html__( '%1$sNote%2$s: Max: 3 Refresh after changing this field value.', 'library' ), '<b>', '</b>' ),
	'section'        => 'library_top_bar_options',
	'type'           => 'number',
	'input_attrs'    => array(
		'max' => 3,
		'min' => 1,
	)
) );

for ( $i=1; $i <= intval( $options['top_bar_field_number'] ); $i++ ) { 
	// Field icon setting and control.
	$wp_customize->add_setting( 'library_theme_options[top_bar_icon_'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'library_theme_options[top_bar_icon_'.$i.']', array(
		'active_callback'=> 'library_is_top_bar_enable',
		'label'          => esc_html__( 'Icon #', 'library' ).$i,
		'description'    => sprintf( esc_html__( 'Use font awesome icon: Eg: %1$s. %2$sSee more here%3$s', 'library' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
		'section'        => 'library_top_bar_options',
		'type'           => 'text',
		'input_attrs'    => array(
			'placeholder' => 'fa-phone',
		)
	) );

	// Field value setting and control.
	$wp_customize->add_setting( 'library_theme_options[top_bar_value_'.$i.']', array(
		'sanitize_callback' => 'esc_textarea',
	) );

	$wp_customize->add_control( 'library_theme_options[top_bar_value_'.$i.']', array(
		'active_callback'=> 'library_is_top_bar_enable',
		'label'          => esc_html__( 'Field Value #', 'library' ).$i,
		'section'        => 'library_top_bar_options',
		'type'           => 'textarea',
	) );

	// Field horizontal line setting and control.
	$wp_customize->add_setting( 'library_theme_options[top_bar_hr_'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new library_Customize_Horizontal_Line( $wp_customize, 'library_theme_options[top_bar_hr_'.$i.']', array(
		'active_callback'=> 'library_is_top_bar_enable',
		'label'          => esc_html__( 'Field Value #', 'library' ).$i,
		'section'        => 'library_top_bar_options',
		'type'           => 'hr',
	) ) );
}
