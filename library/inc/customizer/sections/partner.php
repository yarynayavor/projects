<?php


// Add Partners enable section
$wp_customize->add_section( 'library_partner', array(
	'title'             => esc_html__('Partners','library'),
	'description'       => esc_html__( 'Partners options.', 'library' ),
	'panel'             => 'library_sections_panel'
) );

// Add Partners enable setting and control.
$wp_customize->add_setting( 'library_theme_options[partner_enable]', array(
	'default'           => $options['partner_enable'],
	'sanitize_callback' => 'library_sanitize_select'
) );

$wp_customize->add_control( 'library_theme_options[partner_enable]', array(
	'label'             => esc_html__( 'Enable on', 'library' ),
	'section'           => 'library_partner',
	'type'              => 'select',
	'choices'           => library_enable_disable_options()
) );

// Add Partners title.
$wp_customize->add_setting( 'library_theme_options[partner_title]', array(
	'default'           => $options['partner_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'library_theme_options[partner_title]', array(
	'label'             => esc_html__( 'Title', 'library' ),
	'section'           => 'library_partner',
	'type'              => 'text',
	'active_callback'	=> 'library_partner_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'library_theme_options[partner_title]', array(
		'selector'            => '#our-partners .container .entry-header .entry-title',
		'render_callback'     => 'library_partial_partner_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add partner slider dragable.
$wp_customize->add_setting( 'library_theme_options[partner_dragable]', array(
	'default'           => $options['partner_dragable'],
	'sanitize_callback' => 'library_sanitize_checkbox'
) );

$wp_customize->add_control( 'library_theme_options[partner_dragable]', array(
	'label'             => esc_html__( 'Enable Slide Dragable', 'library' ),
	'section'           => 'library_partner',
	'type'              => 'checkbox',
	'active_callback'	=> 'library_partner_active'
) );

// Add category blog two slider auto play.
$wp_customize->add_setting( 'library_theme_options[partner_autoplay]', array(
	'default'           => $options['partner_autoplay'],
	'sanitize_callback' => 'library_sanitize_checkbox'
) );

$wp_customize->add_control( 'library_theme_options[partner_autoplay]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'library' ),
	'section'           => 'library_partner',
	'type'              => 'checkbox',
	'active_callback'	=> 'library_partner_active'
) );

// Add no of Partners.
$wp_customize->add_setting( 'library_theme_options[no_of_partner]', array(
	'default'           => $options['no_of_partner'],
	'sanitize_callback' => 'absint',
	'validate_callback' => 'library_validate_partner_count'
) );

$wp_customize->add_control( 'library_theme_options[no_of_partner]', array(
	'label'             => esc_html__( 'No of partners', 'library' ),
	'description'		=> esc_html__( 'Min 1 / Max 15. Notice: Please refresh after the number of features is set to see the effects.' , 'library' ),
	'section'           => 'library_partner',
	'type'              => 'number',
	'input_attrs' 		=> array(
		'min' => 1,
		'max' => 15,
		'style' => 'width:100px'
		),
	'active_callback'	=> 'library_partner_active'
) );


for ( $i = 1; $i <= $options['no_of_partner']; $i++ ) { 

	// Add Partners image.
	$wp_customize->add_setting( 'library_theme_options[partner_page_'. $i .']',
	  array(
	    'sanitize_callback' 	=> 'library_sanitize_page',
	  )
	);
	$wp_customize->add_control( 'library_theme_options[partner_page_'. $i .']',
	    array(
	    	'label'       		=> sprintf( esc_html__( 'Select Page # %s', 'library' ), $i ),
			'section'     		=> 'library_partner',
			'type'				=> 'dropdown-pages',
			'active_callback'	=> 'library_partner_active',
	    )
	);
}
