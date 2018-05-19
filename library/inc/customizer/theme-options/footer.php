<?php


/*Footer Section*/
$wp_customize->add_section( 'library_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'library' ),
		'priority'   			=> 900,
		'panel'      			=> 'library_theme_options_panel',
	)
);

// scroll top visible
$wp_customize->add_setting( 'library_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback'		=> 'library_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'library_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'library' ),
		'section'    			=> 'library_section_footer',
		'type'		 			=> 'checkbox',
    )
);