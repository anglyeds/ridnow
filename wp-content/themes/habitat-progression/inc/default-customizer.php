<?php
/**
 * Progression Theme Customizer
 *
 * @package pro
 */

get_template_part('inc/customizer/new', 'controls');
get_template_part('inc/customizer/typography', 'controls');


/* Remove Default Theme Customizer Panels that aren't useful */
function progression_studios_change_default_customizer_panels ( $wp_customize ) {
	$wp_customize->remove_section("themes"); //Remove Active Theme + Theme Changer
   $wp_customize->remove_section("static_front_page"); // Remove Front Page Section		
}
add_action( "customize_register", "progression_studios_change_default_customizer_panels" );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function progression_studios_customize_preview_js() {
	wp_enqueue_script( 'progression_studios_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'progression_studios_customize_preview_js' );


function progression_studios_customizer( $wp_customize ) {
	
	
	/* Panel - General */
	$wp_customize->add_panel( 'progression_studios_general_panel', array(
		'priority'    => 3,
		'title'       => esc_html__( 'General', 'habitat-progression' ),
		 ) 
 	);
	
	
	/* Section - General - General Layout */
	$wp_customize->add_section( 'progression_studios_section_general_layout', array(
		'title'          => esc_html__( 'General Options', 'habitat-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_site_boxed' ,array(
		'default' => 'full-width-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_site_boxed', array(
		'label'    => esc_html__( 'Site Layout', 'habitat-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 10,
		'choices'     => array(
			'full-width-pro' => esc_html__( 'Full Width', 'habitat-progression' ),
			'boxed-pro' => esc_html__( 'Boxed', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_site_width',array(
		'default' => '1200',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_site_width', array(
		'label'    => esc_html__( 'Site Width(px)', 'habitat-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 961,
			'max'  => 4500,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_select_color', array(
		'label'    => esc_html__( 'Mouse Selection Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 20,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_bg', array(
		'default'	=> '#0eb2d7',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_select_bg', array(
		'label'    => esc_html__( 'Mouse Selection Background', 'habitat-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 25,
		)) 
	);
	
	
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_boxed_background_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_boxed_background_color', array(
		'label'    => esc_html__( 'Boxed Background Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 50,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_boxed_bg_image' ,array(		
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_boxed_bg_image', array(
		'label'    => esc_html__( 'Boxed Background Image', 'habitat-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 51,
		))
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_boxed_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_boxed_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'habitat-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 52,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'habitat-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'habitat-progression' ),
		),
		))
	);
	
	
	
	
	
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_caption' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_caption', array(
		'label'    => esc_html__( 'Lightbox Captions', 'habitat-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 100,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_play' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_play', array(
		'label'    => esc_html__( 'Lightbox Gallery Play/Pause', 'habitat-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 110,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_count' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_count', array(
		'label'    => esc_html__( 'Lightbox Gallery Count', 'habitat-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 150,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	
	
	
	
	
	
	
	/* Section - General - Page Loader */
	$wp_customize->add_section( 'progression_studios_section_page_transition', array(
		'title'          => esc_html__( 'Page Loader', 'habitat-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 26,
		) 
	);

	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_transition' ,array(
		'default' => 'transition-off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_transition', array(
		'label'    => esc_html__( 'Display Page Loader?', 'habitat-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'priority'   => 10,
		'choices'     => array(
			'transition-on-pro' => esc_html__( 'On', 'habitat-progression' ),
			'transition-off-pro' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_transition_loader' ,array(
		'default' => 'sk-rectangle-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_transition_loader', array(
		'label'    => esc_html__( 'Page Loader Animation', 'habitat-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'type' => 'select',
		'priority'   => 15,
		'choices' => array(
	        'cube-grid-pro' => esc_html__( 'Cube Grid Animation', 'habitat-progression' ),
	        'rotating-plane-pro' => esc_html__( 'Rotating Plane Animation', 'habitat-progression' ),
	        'double-bounce-pro' => esc_html__( 'Doube Bounce Animation', 'habitat-progression' ),
	        'sk-rectangle-pro' => esc_html__( 'Rectangle Animation', 'habitat-progression' ),
			'sk-cube-pro' => esc_html__( 'Wandering Cube Animation', 'habitat-progression' ),
			'sk-chasing-dots-pro' => esc_html__( 'Chasing Dots Animation', 'habitat-progression' ),
			'sk-circle-child-pro' => esc_html__( 'Circle Animation', 'habitat-progression' ),
			'sk-folding-cube' => esc_html__( 'Folding Cube Animation', 'habitat-progression' ),
		
		 ),
		)
	);


	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_loading_text_new' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control( 'progression_studios_loading_text_new', array(
		'label'    => esc_html__( 'Optional Loading Text', 'habitat-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'type' => 'text',
		'priority'   => 25,
		)
	);


	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_text', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_text', array(
		'label'    => esc_html__( 'Page Loader Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 30,
	) ) 
	);


	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_bg', array(
		'default' => '#0eb2d7',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_bg', array(
		'label'    => esc_html__( 'Page Loader Background', 'habitat-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 35,
	) ) 
	);
	
	
	
	
	
	
	


	/* Section - Footer - Scroll To Top */
	$wp_customize->add_section( 'progression_studios_section_scroll', array(
		'title'          => esc_html__( 'Scroll To Top Button', 'habitat-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 100,
	) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_pro_scroll_top', array(
		'default' => 'scroll-on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_pro_scroll_top', array(
		'label'    => esc_html__( 'Scroll To Top Button', 'habitat-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 10,
		'choices'     => array(
			'scroll-on-pro' => esc_html__( 'On', 'habitat-progression' ),
			'scroll-off-pro' => esc_html__( 'Off', 'habitat-progression' ),
		),
	) ) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		) 
	);
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_color', array(
		'label'    => esc_html__( 'Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 15,
		) ) 
	);


	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_bg_color', array(
		'default' => 'rgba(0,0,0,  0.3)',
		'sanitize_callback' => 'progression_studios_sanitize_text',
		) 
	);
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_bg_color', array(
		'label'    => esc_html__( 'Background', 'habitat-progression' ),
		'default' => 'rgba(0,0,0,  0.3)',
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 20,
		) ) 
	);

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_border_color', array(
		'default' => 'rgba(255,255,255,  0.2)',
		'sanitize_callback' => 'progression_studios_sanitize_text',
		) 
	);
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_border_color', array(
		'label'    => esc_html__( 'Border', 'habitat-progression' ),
		'default' => 'rgba(255,255,255,  0.2))',
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 25,
		) ) 
	);

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_hvr_color', array(
		'label'    => esc_html__( 'Hover Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 30,
		) ) 
	);
	
	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_bg_color', array(
		'default' => '#0eb2d7',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_hvr_bg_color', array(
		'label'    => esc_html__( 'Hover Background', 'habitat-progression' ),
		'default' => '#0b356b',
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 40,
		) ) 
	);

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_border_color', array(
		'default' => '#0eb2d7',
		'sanitize_callback' => 'progression_studios_sanitize_text',
		) 
	);
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_hvr_border_color', array(
		'label'    => esc_html__( 'Border', 'habitat-progression' ),
		'default' => '#0b356b',
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 50,
		) ) 
	);
	
	
	/* Section - General - Custom CSS */
	$wp_customize->add_section( 'progression_studios_section_css', array(
		'title'          => esc_html__( 'Custom CSS', 'habitat-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 150,
	) );
	
	/* Setting - General - Custom CSS */
	$wp_customize->add_setting( 'progression_studios_custom_css' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control( 'progression_studios_custom_css', array(
		'description'          => esc_html__( 'Add-in any custom styles here', 'habitat-progression' ),
		'section' => 'progression_studios_section_css',
		'type' => 'textarea',
		'priority'   => 10,
		)
	);
	
	
	
	
	
	
	
	/* Panel - Header */
	$wp_customize->add_panel( 'progression_studios_header_panel', array(
		'priority'    => 5,
		'title'       => esc_html__( 'Header', 'habitat-progression' ),
		) 
	);
	
	
	/* Section - General - Site Logo */
	$wp_customize->add_section( 'progression_studios_section_logo', array(
		'title'          => esc_html__( 'Logo', 'habitat-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_theme_logo' ,array(
		'default' => get_template_directory_uri().'/images/logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_theme_logo', array(
		'section' => 'progression_studios_section_logo',
		'priority'   => 10,
		))
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_width',array(
		'default' => '176',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_width', array(
		'label'    => esc_html__( 'Logo Width (px)', 'habitat-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_top',array(
		'default' => '-50',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_top', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'habitat-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 20,
		'choices'     => array(
			'min'  => -100,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_bottom',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_bottom', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'habitat-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_logo_location' ,array(
		'default' => 'progression-studios-logo-location-inline',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_logo_location', array(
		'label'    => esc_html__( 'Logo Location', 'habitat-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 30,
		'choices'     => array(
			'progression-studios-logo-location-inline' => esc_html__( 'Inline w/Navigation', 'habitat-progression' ),
			'progression-studios-logo-location-below' => esc_html__( 'Below', 'habitat-progression' ),
		),
		))
	);
	
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_logo_position' ,array(
		'default' => 'progression-studios-logo-position-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_logo_position', array(
		'label'    => esc_html__( 'Logo Position', 'habitat-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 50,
		'choices'     => array(
			'progression-studios-logo-position-left' => esc_html__( 'Left', 'habitat-progression' ),
			'progression-studios-logo-position-center' => esc_html__( 'Center', 'habitat-progression' ),
			'progression-studios-logo-position-right' => esc_html__( 'Right', 'habitat-progression' ),
		),
		))
	);
	


	/* Section - Header - Header Options */
	$wp_customize->add_section( 'progression_studios_section_header_bg', array(
		'title'          => esc_html__( 'Header Options', 'habitat-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 20,
		) 
	);
	

	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_width' ,array(
		'default' => 'progression-studios-header-normal-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_width', array(
		'label'    => esc_html__( 'Desktop Header Width', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-header-full-width' => esc_html__( 'Full Width', 'habitat-progression' ),
			'progression-studios-header-normal-width' => esc_html__( 'Default', 'habitat-progression' ),
		),
		))
	);
	


	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_background_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_header_background_color', array(
		'label'    => esc_html__( 'Header Background Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 15,
		)) 
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_shadow' ,array(
		'default' =>  '',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_header_shadow', array(
		'default' =>  '',
		'label'    => esc_html__( 'Header Border Bottom', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 15,
		)) 
	);
	

	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_header_bg_image' ,array(
		'default' => get_template_directory_uri().'/images/page-title.jpg',
		
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_header_bg_image', array(
		'label'    => esc_html__( 'Header Background Image', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 40,
		))
	);
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 50,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'habitat-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'habitat-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_one_page_nav' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_one_page_nav', array(
		'label'    => esc_html__( 'One Page Navigation', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 55,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_section( 'progression_studios_section_mobile_header', array(
		'title'          => esc_html__( 'Tablet/Mobile Header Options', 'habitat-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 23,
		) 
	);
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_mobile_header_bg', array(
		'label'    => esc_html__( 'Tablet/Mobile Background Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 10,
		)) 
	);

	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_nav_padding' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_nav_padding', array(
		'label'    => esc_html__( 'Tablet/Mobile Nav Padding', 'habitat-progression' ),
		'description'    => esc_html__( 'Optional padding above/below the Navigation. Example: 20', 'habitat-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_width' ,array(
		'default' => '100',
        'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_width', array(
		'default' => '100',
        'label'    => esc_html__( 'Tablet/Mobile Logo Width', 'habitat-progression' ),
		'description'    => esc_html__( 'Optional logo width. Example: 180', 'habitat-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_margin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_margin', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Margin Top/Bottom', 'habitat-progression' ),
		'description'    => esc_html__( 'Optional logo margin. Example: 25', 'habitat-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	
	
	
	
	/* Section - Header - Sticky Header */
	$wp_customize->add_section( 'progression_studios_section_sticky_header', array(
		'title'          => esc_html__( 'Sticky Header Options', 'habitat-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 25,
		) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_header_sticky' ,array(
		'default' => 'none-sticky-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_sticky', array(
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 10,
		'choices'     => array(
			'sticky-pro' => esc_html__( 'Sticky Header', 'habitat-progression' ),
			'none-sticky-pro' => esc_html__( 'Disable Sticky Header', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_header_background_color', array(
		'default' => 'rgba(13,13,51,0.9)',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_sticky_header_background_color', array(
		'default' => 'rgba(13,13,51,0.9)',
		'label'    => esc_html__( 'Sticky Header Background', 'habitat-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 15,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_header_bborder_color', array(
		'default' => 'rgba(255,255,255, 0.15)',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_sticky_header_bborder_color', array(
		'default' => 'rgba(255,255,255, 0.15)',
		'label'    => esc_html__( 'Sticky Header Border Bottom', 'habitat-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 17,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_logo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_sticky_logo', array(
		'label'    => esc_html__( 'Sticky Logo', 'habitat-progression' ),
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 20,
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_width',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_width', array(
		'label'    => esc_html__( 'Sticky Logo Width (px)', 'habitat-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'habitat-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 30,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_top',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_top', array(
		'label'    => esc_html__( 'Sticky Logo Margin Top (px)', 'habitat-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'habitat-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 40,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_bottom',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_bottom', array(
		'label'    => esc_html__( 'Sticky Logo Margin Bottom (px)', 'habitat-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'habitat-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 50,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_padding',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_nav_padding', array(
		'label'    => esc_html__( 'Sticky Nav Padding Top/Bottom', 'habitat-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'habitat-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 60,
		'choices'     => array(
			'min'  => 0,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color', array(
		'label'    => esc_html__( 'Sticky Nav Font Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 70,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color_hover', array(
		'label'    => esc_html__( 'Sticky Nav Font Hover Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 80,
		)) 
	);
	
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_bg', array(
		'label'    => esc_html__( 'Sticky Nav Background Color', 'habitat-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 100,
		)) 
	);
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_hover_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_hover_bg', array(
		'label'    => esc_html__( 'Sticky Nav Hover Background', 'habitat-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 105,
		)) 
	);
	
	
	
	
	
	
	
	
  	/* Section - Header - Header Icons */
  	$wp_customize->add_section( 'progression_studios_section_header_icons', array(
  		'title'          => esc_html__( 'Header Social Icons', 'habitat-progression' ),
  		'panel'          => 'progression_studios_header_panel', // Not typically needed.
  		'priority'       => 100,
  	) );
	
	
	/* Section - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_icon_location' ,array(
		'default' => 'icon-right-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_icon_location', array(
		'label'    => esc_html__( 'Header Icon Location', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'priority'   => 2,
		'choices'     => array(
			'icon-right-pro' => esc_html__( 'Top Right', 'habitat-progression' ),
			'icon-left-pro' => esc_html__( 'Top Left', 'habitat-progression' ),
			'inline-pro' => esc_html__( 'Navigation', 'habitat-progression' ),
		),
		))
	);
	
	/* Section - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_icon_radius' ,array(
		'default' => 'circle-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_icon_radius', array(
		'label'    => esc_html__( 'Icon Border Radius', 'habitat-progression' ),
		'description'    => esc_html__( 'Does not apply to inline nav icons.', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'priority'   => 3,
		'choices'     => array(
			'circle-pro' => esc_html__( 'Circle', 'habitat-progression' ),
			'rounded-pro' => esc_html__( 'Rounded', 'habitat-progression' ),
			'square-pro' => esc_html__( 'Square', 'habitat-progression' ),
		),
		))
	);
	

	
	
 	/* Setting - Header - Header Icons */
 	$wp_customize->add_setting( 'progression_studios_header_icon_color', array(
 		'default'	=> '#ffffff',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_header_icon_color', array(
 		'label'    => esc_html__( 'Icon Color', 'habitat-progression' ),
 		'section'  => 'progression_studios_section_header_icons',
 		'priority'   => 5,
 		)) 
 	);
	
 	/* Setting - Header - Header Icons */
 	$wp_customize->add_setting( 'progression_studios_header_icon_bg_color', array(
 		'default'	=> '#d82255',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_header_icon_bg_color', array(
 		'label'    => esc_html__( 'Icon Background', 'habitat-progression' ),
 		'section'  => 'progression_studios_section_header_icons',
 		'priority'   => 8,
 		)) 
 	);
	
	
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_facebook', array(
		'label'          => esc_html__( 'Facebook Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 10,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_twitter', array(
		'label'          => esc_html__( 'Twitter Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 15,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_instagram' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_instagram', array(
		'label'          => esc_html__( 'Instagram Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 20,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_spotify' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_spotify', array(
		'label'          => esc_html__( 'Spotify Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_youtube' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_youtube', array(
		'label'          => esc_html__( 'Youtube Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_vimeo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_vimeo', array(
		'label'          => esc_html__( 'Vimeo Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_google_plus' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_google_plus', array(
		'label'          => esc_html__( 'Google + Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 40,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_pinterest' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_pinterest', array(
		'label'          => esc_html__( 'Pinterest Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 45,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_soundcloud' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_soundcloud', array(
		'label'          => esc_html__( 'Soundcloud Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 50,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_linkedin' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 52,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_snapchat' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_snapchat', array(
		'label'          => esc_html__( 'Snapchat Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 55,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_tumblr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_tumblr', array(
		'label'          => esc_html__( 'Tumblr Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 60,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_flickr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_flickr', array(
		'label'          => esc_html__( 'Flickr Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 65,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_dribbble' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_dribbble', array(
		'label'          => esc_html__( 'Dribbble Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 70,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_vk' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_vk', array(
		'label'          => esc_html__( 'VK Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 75,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_wordpress' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_wordpress', array(
		'label'          => esc_html__( 'WordPress Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 80,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_houzz' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_houzz', array(
		'label'          => esc_html__( 'Houzz Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 85,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_behance' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_behance', array(
		'label'          => esc_html__( 'Behance Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 90,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_github' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_github', array(
		'label'          => esc_html__( 'GitHub Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 95,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_lastfm' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_lastfm', array(
		'label'          => esc_html__( 'Last.fm Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 100,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_medium' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_medium', array(
		'label'          => esc_html__( 'Medium Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 105,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_tripadvisor' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_tripadvisor', array(
		'label'          => esc_html__( 'Trip Advisor Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 110,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_twitch' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_twitch', array(
		'label'          => esc_html__( 'Twitch Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 115,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_yelp' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_yelp', array(
		'label'          => esc_html__( 'Yelp Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 120,
		)
	);
	
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_mail' ,array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'progression_studios_header_mail', array(
		'label'          => esc_html__( 'E-mail Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 150,
		)
	);
	
	
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_align' ,array(
		'default' => 'progression-studios-nav-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_align', array(
		'label'    => esc_html__( 'Navigation Alignment', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-nav-left' => esc_html__( 'Left', 'habitat-progression' ),
			'progression-studios-nav-center' => esc_html__( 'Center', 'habitat-progression' ),
			'progression-studios-nav-right' => esc_html__( 'Right', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_background_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_nav_background_color', array(
		'label'    => esc_html__( 'Navigation Main Background', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 11,
		)) 
	);
	
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_font_size',array(
		'default' => '16',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_font_size', array(
		'label'    => esc_html__( 'Navigation Font Size', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 500,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_padding',array(
		'default' => '30',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_padding', array(
		'label'    => esc_html__( 'Navigation Padding Top/Bottom', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 505,
		'choices'     => array(
			'min'  => 5,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_left_right',array(
		'default' => '18',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_left_right', array(
		'label'    => esc_html__( 'Navigation Padding Left/Right', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 8,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_font_color', array(
		'label'    => esc_html__( 'Navigation Font Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color_hover', array(
		'default'	=> '#d82255',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_font_color_hover', array(
		'label'    => esc_html__( 'Navigation Font Hover Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg', array(
		'label'    => esc_html__( 'Navigation Item Background', 'habitat-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg_hover', array(
		'label'    => esc_html__( 'Navigation Item Background Hover', 'habitat-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_ltterspacing',array(
		'default' => '1.5',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_ltterspacing', array(
		'label'          => esc_html__( 'Navigation Letter-Spacing (Ex: 0.5)', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 540,
		'choices'     => array(
			'min'  => 0,
			'max'  => 10,
			'step' => 0.5
		), ) ) 
	);
	
	
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_background', array(
		'default'	=> '#db444e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_highlight_background', array(
		'label'    => esc_html__( 'Highlight Button Background', 'habitat-progression' ),
		'description'    => esc_html__( 'Add class "highlight-button" to a navigation menu item to create a button.', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 580,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_hover_text', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_highlight_hover_text', array(
		'label'    => esc_html__( 'Highlight Button Text Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 590,
		)) 
	);
	

	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_search' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_search', array(
		'label'    => esc_html__( 'Search Icon in Navigation', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 600,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_cart', array(
		'label'    => esc_html__( 'Cart Icon in Navigation', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 620,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_color', array(
		'label'    => esc_html__( 'Cart Count Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 625,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_background', array(
		'default'	=> '#0eb2d7',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_background', array(
		'label'    => esc_html__( 'Cart Count Background', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 650,
		)) 
	);
	
	
	
	
	
	
	
	
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );	
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_bg', array(
		'default' => '#ffffff',
		'label'    => esc_html__( 'Sub-Navigation Background Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 10,
		)) 
	);
	
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_font_size',array(
		'default' => '15',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_font_size', array(
		'label'    => esc_html__( 'Navigation Font Size', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_ltterspacing' ,array(
		'default' => '0.5',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_ltterspacing', array(
		'label'          => esc_html__( 'Sub-Navigation Letter-Spacing (EX: 0.5px)', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 515,
		'choices'     => array(
			'min'  => 0,
			'max'  => 10,
			'step' => 0.5
		), ) ) 
	);

	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_font_color', array(
		'default'	=> '#565656',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_font_color', array(
		'label'    => esc_html__( 'Sub-Navigation Font Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_hover_font_color', array(
		'default'	=> '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_hover_font_color', array(
		'label'    => esc_html__( 'Sub-Navigation Font Hover Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_bg_hovr_clr', array(
		'default'	=> 'rgba(255,255,255, 0.04)',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_bg_hovr_clr', array(
		'default'	=> 'rgba(255,255,255, 0.04)',
		
		'label'    => esc_html__( 'Sub-Navigation Background Hover Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 540,
		)) 
	);
	
	
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_border_color', array(
		'default'	=> 'rgba(0,0,0, 0.08)',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_border_color', array(
		'default'	=> 'rgba(0,0,0, 0.08)',
		
		'label'    => esc_html__( 'Sub-Navigation and Cart Border', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 550,
		)) 
	);
	
	
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_onoff' ,array(
		'default' => 'on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_top_header_onoff', array(
		'label'    => esc_html__( 'Display Top Header Bar?', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 10,
		'choices'     => array(
			'on-pro' => esc_html__( 'On', 'habitat-progression' ),
			'off-pro' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_background', array(
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_background', array(
		'label'    => esc_html__( 'Top Header Background Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 20,
		)) 
	);
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_transform' ,array(
		'default' => 'on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_top_header_transform', array(
		'label'    => esc_html__( 'Top Header Text Transform?', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 520,
		'choices'     => array(
			'on-pro' => esc_html__( 'Uppercase', 'habitat-progression' ),
			'off-pro' => esc_html__( 'Normal', 'habitat-progression' ),
		),
		))
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_font_size',array(
		'default' => '14',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_font_size', array(
		'label'    => esc_html__( 'Top Header Font Size', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 530,
		'choices'     => array(
			'min'  => 5,
			'max'  => 25,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_padding',array(
		'default' => '15',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_padding', array(
		'label'    => esc_html__( 'Top Header Padding Above/Below', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 535,
		'choices'     => array(
			'min'  => 5,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_color', array(
		'default' => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_color', array(
		'label'    => esc_html__( 'Top Header Font/Link Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 550,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_hover_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_hover_color', array(
		'label'    => esc_html__( 'Top Header Font/Link Hover Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 555,
		)) 
	);

	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_sub_bg', array(
		'label'    => esc_html__( 'Sub Navigation Background', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 565,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_color', array(
		'default' => '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_color', array(
		'label'    => esc_html__( 'Sub Navigation Font Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 570,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_hover_color', array(
		'default' => '#3f3f3f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_hover_color', array(
		'label'    => esc_html__( 'Sub Navigation Font Hover Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 575,
		)) 
	);
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_border_color', array(
		'default' => 'rgba(255,255,255,0.08)',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_border_color', array(
		'label'    => esc_html__( 'Top Header Border Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 575,
		)) 
	);
	
	
	
	
	
	
	/* Panel - Body */
	$wp_customize->add_panel( 'progression_studios_body_panel', array(
		'priority'    => 8,
        'title'       => esc_html__( 'Body', 'habitat-progression' ),
    ) );
	 
	 
	 
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_color', array(
 		'default'	=> '#0eb2d7',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_color', array(
 		'label'    => esc_html__( 'Default Link Color', 'habitat-progression' ),
 		'section'  => 'tt_font_progression-studios-body-font',
 		'priority'   => 500,
 		)) 
 	);
	
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_hover_color', array(
 		'default'	=> '#31343f',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_hover_color', array(
 		'label'    => esc_html__( 'Default Hover Link Color', 'habitat-progression' ),
 		'section'  => 'tt_font_progression-studios-body-font',
 		'priority'   => 510,
 		)) 
 	);
	
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_background_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_background_color', array(
		'label'    => esc_html__( 'Body Background Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 510,
		)) 
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image' ,array(		
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_body_bg_image', array(
		'label'    => esc_html__( 'Body Background Image', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 511,
		))
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_body_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 520,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'habitat-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'habitat-progression' ),
		),
		))
	);
	
	
	
	
	
	
	
	
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_width' ,array(
		'default' => 'progression-studios-page-title-normal-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_title_width', array(
		'label'    => esc_html__( 'Page Title Width', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 5,
		'choices'     => array(
			'progression-studios-page-title-full-width' => esc_html__( 'Full Width', 'habitat-progression' ),
			'progression-studios-page-title-normal-width' => esc_html__( 'Default', 'habitat-progression' ),
		),
		))
	);
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_top',array(
		'default' => '80',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_top', array(
		'label'    => esc_html__( 'Page Title Top Padding', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 501,
		'choices'     => array(
			'min'  => 0,
			'max'  => 160,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_bottom',array(
		'default' => '75',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_bottom', array(
		'label'    => esc_html__( 'Page Title Bottom Padding', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 515,
		'choices'     => array(
			'min'  => 0,
			'max'  => 160,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_page_title_bg_image', array(
		'label'    => esc_html__( 'Page Title Background Image', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 535,
		))
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_title_image_position', array(
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 536,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'habitat-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_page_title_bg_color', array(
		'label'    => esc_html__( 'Page Title Background Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 550,
		)) 
	);
    

	
	
	/* Section - Blog - Index Post Options */
   $wp_customize->add_section( 'progression_studios_section_blog_index', array(
   	'title'          => esc_html__( 'Index Post Options', 'habitat-progression' ),
   	'panel'          => 'progression_studios_body_panel', // Not typically needed.
   	'priority'       => 560,
   ) 
	);
	
	

   /* Section - Blog - Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_index_bg', array(
		'default' => '#f7f8f8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_index_bg', array(
		'label'    => esc_html__( 'Post Content Background', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 45,
		)) 
	);
	
	
	


   /* Section - Blog - Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_transition' ,array(
		'default' => 'progression-studios-blog-image-scale',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_blog_transition', array(
		'label'    => esc_html__( 'Post Image Hover Effect', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'type' => 'select',
		'priority'   => 105,
		'choices' => array(
			'progression-studios-blog-image-scale' => esc_html__( 'Zoom', 'habitat-progression' ),
			'progression-studios-blog-image-zoom-grey' => esc_html__( 'Greyscale', 'habitat-progression' ),
			'progression-studios-blog-image-zoom-sepia' => esc_html__( 'Sepia', 'habitat-progression' ),
			'progression-studios-blog-image-zoom-saturate' => esc_html__( 'Saturate', 'habitat-progression' ),
			'progression-studios-blog-image-zoom-shine' => esc_html__( 'Shine', 'habitat-progression' ),
			'progression-studios-blog-image-no-effect' => esc_html__( 'No Effect', 'habitat-progression' ),
		
		 ),
		)
	);
	
	
   /* Section - Blog - Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_image_opacity_default',array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_image_opacity_default', array(
		'label'    => esc_html__( 'Image Transparency Default', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 105,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
	
   /* Section - Blog - Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_image_opacity',array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_image_opacity', array(
		'label'    => esc_html__( 'Image Transparency on Fade', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 106,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
	
   /* Section - Blog - Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_image_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_image_bg', array(
		'label'    => esc_html__( 'Post Image Background Color', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 110,
		)) 
	);
	
	
	
	
   
	
	
	
	
	
	
   /* Section - Blog - Post Options */
   $wp_customize->add_section( 'progression_studios_section_blog_post', array(
   	'title'          => esc_html__( 'Post Options', 'habitat-progression' ),
   	'panel'          => 'progression_studios_body_panel', // Not typically needed.
   	'priority'       => 570,
   ) 
	);
	
	
   /* Section - Blog - Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_sidebar' ,array(
		'default' => 'none',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_sidebar', array(
		'label'    => esc_html__( 'Shop Post Sidebar', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'priority'   => 6,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'habitat-progression' ),
			'right' => esc_html__( 'Right', 'habitat-progression' ),
			'none' => esc_html__( 'No Sidebar', 'habitat-progression' ),
		),
		))
	);
	
	
	
   /* Section - Blog - Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_sidebar' ,array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sidebar', array(
		'label'    => esc_html__( 'Blog Post Sidebar', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'priority'   => 6,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'habitat-progression' ),
			'right' => esc_html__( 'Right', 'habitat-progression' ),
			'none' => esc_html__( 'No Sidebar', 'habitat-progression' ),
		),
		))
	);
	
	
	

   /* Section - Blog - Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_nav' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_nav', array(
		'label'    => esc_html__( 'Blog Post Navigation', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'priority'   => 7,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_sharing' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sharing', array(
		'label'    => esc_html__( 'Post Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'priority'   => 8,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	

  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_facebook' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_facebook', array(
		'label'          => esc_html__( 'Facebook Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 9,
		)
	
	);
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_twitter' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_twitter', array(
		'label'          => esc_html__( 'Twitter Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 10,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_pinterest' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_pinterest', array(
		'label'          => esc_html__( 'Pinterest Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 15,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_vk' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_vk', array(
		'label'          => esc_html__( 'VK Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 20,
		)
	
	);
	
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_google' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_google', array(
		'label'          => esc_html__( 'Google+ Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 20,
		)
	
	);
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_reddit' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_reddit', array(
		'label'          => esc_html__( 'Reddit Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 25,
		)
	
	);
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_linkedin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 30,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_tumblr' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_tumblr', array(
		'label'          => esc_html__( 'Tumblr Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 35,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_stumble' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_stumble', array(
		'label'          => esc_html__( 'StumbleUpon Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 38,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_mail' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_mail', array(
		'label'          => esc_html__( 'Email Sharing', 'habitat-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 40,
		)
	
	);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_font_size',array(
		'default' => '14',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_font_size', array(
		'label'    => esc_html__( 'Button Font Size', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 600,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font', array(
		'label'    => esc_html__( 'Button Font Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 635,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background', array(
		'default'	=> '#0eb2d7',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background', array(
		'label'    => esc_html__( 'Button Background Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 640,
		)) 
	);
	
	
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font_hover', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font_hover', array(
		'label'    => esc_html__( 'Button Hover Font Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 650,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background_hover', array(
		'default'	=> '#2b3245',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background_hover', array(
		'label'    => esc_html__( 'Button Hover Background Color', 'habitat-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 680,
		)) 
	);
	
	
	
	
	
	
	
	
	
	
	
	

	/* Panel - Footer */
	$wp_customize->add_panel( 'progression_studios_footer_panel', array(
		'priority'    => 10,
        'title'       => esc_html__( 'Footer', 'habitat-progression' ),
    ) 
 	);
	
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_footer_width' ,array(
		'default' => 'progression-studios-footer-normal-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_width', array(
		'label'    => esc_html__( 'Footer Width', 'habitat-progression' ),
 		'section' => 'tt_font_progression-studios-widgets-font',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-footer-full-width' => esc_html__( 'Full Width', 'habitat-progression' ),
			'progression-studios-footer-normal-width' => esc_html__( 'Default', 'habitat-progression' ),
		),
		))
	);


	/* Setting - Footer - Footer Main */
 	$wp_customize->add_setting( 'progression_studios_footer_divider', array(
 		'default'	=> '#000000',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_divider', array(
 		'label'    => esc_html__( 'Footer Divider Color', 'habitat-progression' ),
 		'section' => 'tt_font_progression-studios-widgets-font',
 		'priority'   => 505,
 		)) 
 	);
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting('progression_studios_footer_divider_height',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_divider_height', array(
		'label'    => esc_html__( 'Footer Divider Height', 'habitat-progression' ),
 		'section' => 'tt_font_progression-studios-widgets-font',
		'priority'   => 508,
		'choices'     => array(
			'min'  => 0,
			'max'  => 25,
			'step' => 1
		), ) ) 
	);
	
	
	
	
	/* Setting - Footer - Footer Main */
 	$wp_customize->add_setting( 'progression_studios_footer_background', array(
 		'default'	=> '#0ed768',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_background', array(
 		'label'    => esc_html__( 'Footer Background', 'habitat-progression' ),
 		'section' => 'tt_font_progression-studios-widgets-font',
 		'priority'   => 510,
 		)) 
 	);
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_footer_main_bg_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_footer_main_bg_image', array(
		'label'    => esc_html__( 'Footer Background Image', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-widgets-font',
		'priority'   => 535,
		))
	);
	
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_main_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_main_image_position', array(
		'section' => 'tt_font_progression-studios-widgets-font',
		'priority'   => 536,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'habitat-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'habitat-progression' ),
		),
		))
	);
	

	/* Setting - Footer - Footer Navigation */
	$wp_customize->add_setting( 'progression_studios_footer_nav_location' ,array(
		'default' => 'bottom',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_nav_location', array(
		'label'    => esc_html__( 'Footer Navigation Location', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-footer-nav-font',
		'priority'   => 5,
		'choices'     => array(
			'top' => esc_html__( 'Top', 'habitat-progression' ),
			'middle' => esc_html__( 'Middle', 'habitat-progression' ),
			'bottom' => esc_html__( 'Bottom', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - Footer - Footer Navigation */
	$wp_customize->add_setting( 'progression_studios_footer_nav_align' ,array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_nav_align', array(
		'label'    => esc_html__( 'Footer Navigation Alignment', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-footer-nav-font',
		'priority'   => 10,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'habitat-progression' ),
			'center' => esc_html__( 'Center', 'habitat-progression' ),
			'right' => esc_html__( 'Right', 'habitat-progression' ),
		),
		))
	);
	
	
	
	
	

	
	
	
	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_section( 'progression_studios_section_widget_layout', array(
		'title'          => esc_html__( 'Footer Widgets', 'habitat-progression' ),
		'panel'          => 'progression_studios_footer_panel', // Not typically needed.
		'priority'       => 450,
		) 
	);
	
 	/* Setting - Footer - Footer Widgets */
 	$wp_customize->add_setting( 'progression_studios_footer_widget_count' ,array(
 		'default' => 'footer-3-pro',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_widget_count', array(
 		'label'    => esc_html__( 'Footer Widget Row 1 Count', 'habitat-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
 		'priority'   => 10,
 		'choices'     => array(
 			'footer-1-pro' => '1',
 			'footer-2-pro' => '2',
			'footer-3-pro' => '3',
			'footer-4-pro' => '4',
			'footer-5-pro' => '5',
 		),
 		))
 	);
	
 	/* Setting - Footer - Footer Widgets */
 	$wp_customize->add_setting( 'progression_studios_footer_widget_count_row_two' ,array(
 		'default' => 'footer-3-pro',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_widget_count_row_two', array(
 		'label'    => esc_html__( 'Footer Widget Row 2 Count', 'habitat-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
 		'priority'   => 10,
 		'choices'     => array(
 			'footer-1-pro' => '1',
 			'footer-2-pro' => '2',
			'footer-3-pro' => '3',
			'footer-4-pro' => '4',
			'footer-5-pro' => '5',
 		),
 		))
 	);
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_widgets_margin_top',array(
		'default' => '75',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_widgets_margin_top', array(
		'label'    => esc_html__( 'Footer Widget Margin Top', 'habitat-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_widgets_margin_bottom',array(
		'default' => '65',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_widgets_margin_bottom', array(
		'label'    => esc_html__( 'Footer Widget Margin Bottom', 'habitat-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
		'priority'   => 22,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	
	
	
	
	
	
	
	
	
	 
	 
	 
	
	
	 
	 
	 
	 
  	
	 
	 

	 
	 
  	/* Section - Footer - Footer Icons */
  	$wp_customize->add_section( 'progression_studios_section_footer_icons', array(
  		'title'          => esc_html__( 'Footer Icons', 'habitat-progression' ),
  		'panel'          => 'progression_studios_footer_panel', // Not typically needed.
  		'priority'       => 500,
  	) );
	
	

	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_location' ,array(
		'default' => 'bottom',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_location', array(
		'label'    => esc_html__( 'Footer Icon Location', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 2,
		'choices'     => array(
			'top' => esc_html__( 'Top', 'habitat-progression' ),
			'middle' => esc_html__( 'Middle', 'habitat-progression' ),
			'bottom' => esc_html__( 'Bottom', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_location_align' ,array(
		'default' => 'center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_location_align', array(
		'label'    => esc_html__( 'Footer Icon Alignment', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 3,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'habitat-progression' ),
			'center' => esc_html__( 'Center', 'habitat-progression' ),
			'right' => esc_html__( 'Right', 'habitat-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_text' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_text', array(
		'label'    => esc_html__( 'Footer Icon Text', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 4,
		'choices'     => array(
			'on' => esc_html__( 'On', 'habitat-progression' ),
			'off' => esc_html__( 'Off', 'habitat-progression' ),
		),
		))
	);
	
	

	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_radius' ,array(
		'default' => 'rounded-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_radius', array(
		'label'    => esc_html__( 'Icon Border Radius', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 5,
		'choices'     => array(
			'circle-pro' => esc_html__( 'Circle', 'habitat-progression' ),
			'rounded-pro' => esc_html__( 'Rounded', 'habitat-progression' ),
			'square-pro' => esc_html__( 'Square', 'habitat-progression' ),
		),
		))
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_icon_size',array(
		'default' => '24',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_icon_size', array(
		'label'    => esc_html__( 'Icon Size', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 6,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_top',array(
		'default' => '0', /* 35 */
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_top', array(
		'label'    => esc_html__( 'Icon Margin Top', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 7,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_bottom',array(
		'default' => '0', /* 25 */
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_bottom', array(
		'label'    => esc_html__( 'Icon Margin Bottom', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 8,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_sides',array(
		'default' => '8',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_sides', array(
		'label'    => esc_html__( 'Icon Margin Left/Right', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 9,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_icon_border_color', array(
 		'default'	=> '#484859',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_icon_border_color', array(
 		'label'    => esc_html__( 'Footer Icon Border', 'habitat-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 10,
 		)) 
 	);
	
	
	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_icon_color', array(
 		'default'	=> '#ffffff',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_icon_color', array(
 		'label'    => esc_html__( 'Footer Icon Color', 'habitat-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 11,
 		)) 
 	);
	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_icon_bg_color', array(
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_icon_bg_color', array(
 		'label'    => esc_html__( 'Footer Icon Background', 'habitat-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 12,
 		)) 
 	);
	
	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_facebook', array(
		'label'          => esc_html__( 'Facebook Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 13,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_twitter', array(
		'label'          => esc_html__( 'Twitter Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 15,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_instagram' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_instagram', array(
		'label'          => esc_html__( 'Instagram Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 20,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_spotify' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_spotify', array(
		'label'          => esc_html__( 'Spotify Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_youtube' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_youtube', array(
		'label'          => esc_html__( 'Youtube Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_vimeo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_vimeo', array(
		'label'          => esc_html__( 'Vimeo Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_google_plus' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_google_plus', array(
		'label'          => esc_html__( 'Google + Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 40,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_pinterest' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_pinterest', array(
		'label'          => esc_html__( 'Pinterest Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 45,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_soundcloud' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_soundcloud', array(
		'label'          => esc_html__( 'Soundcloud Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 50,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_linkedin' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 52,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_snapchat' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_snapchat', array(
		'label'          => esc_html__( 'Snapchat Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 55,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_tumblr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_tumblr', array(
		'label'          => esc_html__( 'Tumblr Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 60,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_flickr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_flickr', array(
		'label'          => esc_html__( 'Flickr Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 65,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_dribbble' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_dribbble', array(
		'label'          => esc_html__( 'Dribbble Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 70,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_vk' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_vk', array(
		'label'          => esc_html__( 'VK Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 75,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_wordpress' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_wordpress', array(
		'label'          => esc_html__( 'WordPress Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 80,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_houzz' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_houzz', array(
		'label'          => esc_html__( 'Houzz Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 85,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_behance' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_behance', array(
		'label'          => esc_html__( 'Behance Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 90,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_github' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_github', array(
		'label'          => esc_html__( 'GitHub Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 95,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_lastfm' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_lastfm', array(
		'label'          => esc_html__( 'Last.fm Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 100,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_medium' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_medium', array(
		'label'          => esc_html__( 'Medium Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 105,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_tripadvisor' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_tripadvisor', array(
		'label'          => esc_html__( 'Trip Advisor Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 110,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_twitch' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_twitch', array(
		'label'          => esc_html__( 'Twitch Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 115,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_yelp' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_yelp', array(
		'label'          => esc_html__( 'Yelp Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 120,
		)
	);
	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_mail' ,array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'progression_studios_footer_mail', array(
		'label'          => esc_html__( 'E-mail Icon', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 150,
		)
	);
	
	
	
	
	
	
	
	
	
	
	
  	/* Section - Footer - Footer Logo */
  	$wp_customize->add_section( 'progression_studios_section_footer_image', array(
  		'title'          => esc_html__( 'Footer Logo', 'habitat-progression' ),
  		'panel'          => 'progression_studios_footer_panel', // Not typically needed.
  		'priority'       => 550,
  	) );
	
	/* Setting - Footer - Footer Logo */
	$wp_customize->add_setting( 'progression_studios_footer_image_location' ,array(
		'default' => 'middle',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_image_location', array(
		'label'    => esc_html__( 'Footer Logo Location', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 2,
		'choices'     => array(
			'top' => esc_html__( 'Top', 'habitat-progression' ),
			'middle' => esc_html__( 'Middle', 'habitat-progression' ),
			'bottom' => esc_html__( 'Bottom', 'habitat-progression' ),
		),
		))
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_logo_link' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_logo_link', array(
		'label'    => esc_html__( 'Footer Logo Link', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'type' => 'text',
		'priority'   => 3,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_image_location_align' ,array(
		'default' => 'center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_image_location_align', array(
		'label'    => esc_html__( 'Footer Logo Alignment', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 4,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'habitat-progression' ),
			'center' => esc_html__( 'Center', 'habitat-progression' ),
			'right' => esc_html__( 'Right', 'habitat-progression' ),
		),
		))
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_logo_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
        'default' => get_template_directory_uri().'/images/logo-footer.png',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_footer_logo_image', array(
		'label'    => esc_html__( 'Footer Logo', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 5,
		))
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_width',array(
		'default' => '176',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_width', array(
		'label'    => esc_html__( 'Footer Logo Width', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 10,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_margin_top',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_margin_top', array(
		'label'    => esc_html__( 'Footer Logo Margin Top', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 15,
		'choices'     => array(
			'min'  => -100,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_margin_bottom',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_margin_bottom', array(
		'label'    => esc_html__( 'Footer Logo Margin Bottom', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_margin_right',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_margin_right', array(
		'label'    => esc_html__( 'Footer Logo Margin Right', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_margin_left',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_margin_left', array(
		'label'    => esc_html__( 'Footer Logo Margin Left', 'habitat-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 30,
		'choices'     => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1
		), ) ) 
	);
	
	
	
	
	
	
	
	
	
	 
	 

	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_footer_copyright' ,array(
		'default' =>  '2016 All Rights Reserved.  Developed by ProgressionStudios',
		'sanitize_callback' => 'progression_studios_sanitize_text',
	) );
	$wp_customize->add_control( 'progression_studios_footer_copyright', array(
		'label'          => esc_html__( 'Copyright Text', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'type' => 'textarea',
		'priority'   => 10,
		)
	
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_bg', array(
		'sanitize_callback' => 'progression_studios_sanitize_text',
		'default' 			=> '#ffffff',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_copyright_bg', array(
		'label'    => esc_html__( 'Copyright Background', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 150,
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link', array(
		'default' => '#545a6e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link', array(
		'label'    => esc_html__( 'Copyright Link Color', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 530,
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link_hover', array(
		'default' => '#999999',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link_hover', array(
		'label'    => esc_html__( 'Copyright Link Hover Color', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 540,
		)) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_copyright_location' ,array(
		'default' => 'center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_copyright_location', array(
		'label'    => esc_html__( 'Copyright Text Alignment', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 560,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'habitat-progression' ),
			'center' => esc_html__( 'Center', 'habitat-progression' ),
			'right' => esc_html__( 'Right', 'habitat-progression' ),
		),
		))
	);
	
	
 	
	
	

  
  
   
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link', array(
		'default' => '#0f0e07',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link', array(
		'label'    => esc_html__( 'Heading Link Color', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 5,
		)) 
	);
	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link_hover', array(
		'default' => '#0eb2d7',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link_hover', array(
		'label'    => esc_html__( 'Heading Hover Color', 'habitat-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 10,
		)) 
	);
	
	
	
	
	
   

	
	

	
  	/* Section - Body - Shop Options */
  	$wp_customize->add_section( 'progression_studios_section_shop_index', array(
  		'title'          => esc_html__( 'Shop Options', 'habitat-progression' ),
  		'panel'          => 'progression_studios_body_panel', // Not typically needed.
  		'priority'       => 700,
  	) );
	
	/* Section - Body - Shop Options */
	$wp_customize->add_setting( 'progression_studios_shop_columns' ,array(
		'default' => '3',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	
	
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_columns', array(
		'label'    => esc_html__( 'Shop Columns', 'habitat-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 20,
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
		))
	);

	/* Section - Body - Shop Options */
	$wp_customize->add_setting( 'progression_studios_shop_posts_Page' ,array(
		'default' =>  '9',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_shop_posts_Page', array(
		'label'          => esc_html__( 'Shop Posts Per Page', 'habitat-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'type' => 'text',
		'priority'   => 30,
		)
	
	);
	
	
	
}
add_action( 'customize_register', 'progression_studios_customizer' );

function progression_studios_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//no-HTML text
function progression_studios_sanitize_choices( $input ) {
	return wp_filter_nohtml_kses( $input );
}


function progression_studios_customizer_styles() {
	global $post;
	//https://codex.wordpress.org/Function_Reference/wp_add_inline_style
	wp_enqueue_style( 'progression-studios-custom-style', get_template_directory_uri() . '/css/progression_studios_custom_styles.css' );
    if( (is_page() && get_post_meta($post->ID, 'progression_studios_header_floated', true) == 'on' ) || (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below') ) {
		$progression_studios_blog_header_img = "";
		$progression_studios_shop_header_img = "";
		$progression_studios_page_header_img = "";
		$progression_studios_product_header_img = "";
		$progression_studios_page_bg_img = "";
		$progression_studios_header_position_img = "";	
        if (class_exists('Woocommerce')) {
            global $woocommerce; global $post;
            if(is_shop() || is_singular( 'product')  || is_tax( 'product_cat')  || is_tax( 'product_tag') ){
				$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
				if(get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true)){
					$progression_studios_shop_header_img = "body #header-container-logo-progression {background-image:url('" . esc_url( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true) )."'); }";
				} else {
					$progression_studios_shop_header_img = "";
				}
            } else {
				$progression_studios_shop_header_img = "";
			}
        } else {
			$progression_studios_shop_header_img = "";
		}
        if( get_option( 'page_for_posts' ) ) {
			$cover_page = get_page( get_option( 'page_for_posts' ) );
			if( is_home() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) || is_singular( 'post') && get_post_meta($cover_page->ID, 'progression_studios_header_image', true)|| is_category() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ) {
				$progression_studios_blog_header_img = "body #header-container-logo-progression {background-image:url('" . esc_url( get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ) . "'); }";
			} else {
				$progression_studios_blog_header_img = "";
			}
        }
        if(is_page() && get_post_meta($post->ID, 'progression_studios_header_image', true)) {
            $progression_studios_page_header_img = "body #header-container-logo-progression {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_image', true) ). "'); }";
        } else {
			$progression_studios_page_header_img = "";
		}
    } elseif( (is_page() && !get_post_meta($post->ID, 'progression_studios_header_floated', true) == 'on' ) && (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-inline') ) {    
        if (class_exists('Woocommerce')) {
            global $woocommerce;
			$progression_studios_blog_header_img = "";
			$progression_studios_shop_header_img = "";
			$progression_studios_page_header_img = "";
			$progression_studios_product_header_img = "";
			$progression_studios_page_bg_img = "";
			$progression_studios_header_position_img = "";
            if(is_shop() || is_singular( 'product')  || is_tax( 'product_cat')  || is_tax( 'product_tag') ) {
				$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
				if(get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true)){
					$progression_studios_product_header_img = "body #progression-studios-header-position {background-image:url('" . esc_url( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true) ) . "'); }";
				} else {
					$progression_studios_product_header_img = "";
				}
            } else {
				$progression_studios_product_header_img = "";
			}
        } else {
			$progression_studios_product_header_img = "";
		}
        if( get_option( 'page_for_posts' ) ) {
			$cover_page = get_page( get_option( 'page_for_posts' ) );
			if( is_home() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) || is_singular( 'post') && get_post_meta($cover_page->ID, 'progression_studios_header_image', true)|| is_category( ) && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ){
				$progression_studios_page_bg_img = "body #progression-studios-header-position {background-image:url('" . esc_url( get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ) ."'); }";
			} else {
				$progression_studios_page_bg_img = "";
			}
        } else {
			$progression_studios_page_bg_img = "";
		}
		
        if(is_page() && get_post_meta($post->ID, 'progression_studios_header_image', true)){
            $progression_studios_header_position_img = "body #progression-studios-header-position {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_image', true) ). "'); }";
        } else {
			$progression_studios_header_position_img = "";
		}   
    } else {
		$progression_studios_blog_header_img = "";
		$progression_studios_shop_header_img = "";
		$progression_studios_page_header_img = "";
		$progression_studios_product_header_img = "";
		$progression_studios_page_bg_img = "";
		$progression_studios_header_position_img = "";
	}    
	

	if(is_page() && get_post_meta($post->ID, 'progression_studios_disable_footer_per_page', true) == 'on' ) {
		$progression_studios_footer_display = "footer#site-footer {display:none;}";
	} else {
		$progression_studios_footer_display = "";
	}
	
	if(is_page() && get_post_meta($post->ID, 'progression_studios_header_disabled', true) == 'on' ) {
		$progression_studios_header_display = "#progression-studios-header-position {display:none;}";
	} else {
		$progression_studios_header_display = "";
	}
	
	if(is_page() && get_post_meta($post->ID, 'progression_studios_header_floated', true) == 'on' ) {
		$progression_studios_header_pstn = "#progression-studios-header-position {position: absolute;}";
	} else {
		$progression_studios_header_pstn = "";
	}
        
        
    if( get_option( 'page_for_posts' ) ) {
		$cover_page = get_page( get_option( 'page_for_posts' ) );
        if( (is_home() && (get_post_meta($cover_page->ID, 'progression_studios_header_floated', true) == 'on')) || (is_archive('post') && (get_post_meta($cover_page->ID, 'progression_studios_header_floated', true) == 'on')) || (is_singular('post') && (get_post_meta($cover_page->ID, 'progression_studios_header_floated', true) == 'on')) || (is_category() && (get_post_meta($cover_page->ID, 'progression_studios_header_floated', true) == 'on')) ){
            $progression_studios_header_pstn_pro = "#progression-studios-header-position {position: absolute;}";
        } else {
			$progression_studios_header_pstn_pro = "";
		}
    } else {
		$progression_studios_header_pstn_pro = "";
	} 
        
    if (class_exists('Woocommerce')) {
        global $woocommerce;
        if(is_shop() || is_singular( 'product')  || is_tax( 'product_cat')  || is_tax( 'product_tag') ){
			$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
			if ($your_shop_page !="") {
				if(get_post_meta($your_shop_page->ID, 'progression_studios_header_floated', true) == 'on'){
					$progression_studios_header_pstn_shop = "#progression-studios-header-position {position: absolute;}";
				} else {
				$progression_studios_header_pstn_shop = "";
				}
			} else {
				$progression_studios_header_pstn_shop = "";
			}
		} else {
			$progression_studios_header_pstn_shop = "";
		}	
    } else {
		$progression_studios_header_pstn_shop = "";
	}       
    
	if( get_option( 'page_for_posts' ) ) {
		$customizer_cover_page = get_page( get_option( 'page_for_posts' ) );
		if(is_home() && get_post_meta($customizer_cover_page->ID, 'progression_studios_disable_footer_per_page', true) ){
			$progression_studios_footer_display_index = "footer#site-footer {display:none;}";
		} else {
			$progression_studios_footer_display_index = "";
		}
	} else {
		$progression_studios_footer_display_index = "";
	}	
	
	
    if( is_singular('event') && get_post_meta($post->ID, 'progression_studios_header_image', true) && (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-inline') ) {
        $progression_studios_event_header =  "body.single-event #progression-studios-header-position {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_image', true) ) . "'); }";
    } else {
		$progression_studios_event_header = "";
	}
	
    if( (is_singular('event') && get_post_meta($post->ID, 'progression_studios_header_floated', true) == 'on' ) || (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below') ) { 
        $progression_studios_event_header_img = "body.single-event #header-container-logo-progression {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_image', true) ) . "'); }";
    } else {
		$progression_studios_event_header_img = "";
	}
	
	if ( get_theme_mod( 'progression_studios_nav_background_color')) {
		$progression_studios_nav_bg_pro = "body .progression-studios-transparent-header .progression-sticky-scrolled header#masthead-pro, body header#masthead-pro { background:" . esc_attr( get_theme_mod('progression_studios_nav_background_color') ) . ";}";
	 } else {
		 $progression_studios_nav_bg_pro = "";
	 }
	 
	if ( get_theme_mod( 'progression_studios_header_shadow')) {
		$progression_studios_shadow_head = "
			header#masthead-pro #header-border-bottom-progression-studios {	height:1px; margin-top:-1px; background:" . esc_attr( get_theme_mod('progression_studios_header_shadow') ) . ";}
			@media only screen and (max-width: 959px) {
				.progression-studios-transparent-header header#masthead-pro #header-border-bottom-progression-studios { background:" . esc_attr( get_theme_mod('progression_studios_header_shadow') ). ";}
			}";
	} else {
		$progression_studios_shadow_head = "";
	}
	
	if ( get_theme_mod( 'progression_studios_sticky_header_bborder_color', 'rgba(255,255,255, 0.15)')) {
		$progression_studios_sticky_border_pro = ".progression-sticky-scrolled header#masthead-pro #header-border-bottom-progression-studios,	.progression-studios-transparent-header .progression-sticky-scrolled header#masthead-pro #header-border-bottom-progression-studios {height:1px; margin-top:-1px; background:" . esc_attr( get_theme_mod('progression_studios_sticky_header_bborder_color', 'rgba(255,255,255, 0.15)') ). ";}";
	} else {
		$progression_studios_sticky_border_pro = "";
	}
	
	
	if ( get_theme_mod( 'progression_studios_header_background_color')) {
		$progression_studios_header_container_bg = "background-color:" . esc_attr( get_theme_mod('progression_studios_header_background_color') ). ";";
	} else {
		$progression_studios_header_container_bg = "";
	}
	if ( get_theme_mod( 'progression_studios_header_bg_image', get_template_directory_uri() . '/images/page-title.jpg' ) ) {
		$progression_studios_header_container_img = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_header_bg_image', get_template_directory_uri() . '/images/page-title.jpg' ) ) . ");";
	} else {
		$progression_studios_header_container_img = "";
	}	
	if ( get_theme_mod( 'progression_studios_header_bg_image_image_position', 'cover') == 'cover') {
		$progression_studios_header_container_display = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	} else {
		$progression_studios_header_container_display = "background-repeat:repeat-all;";
	}		
	
	
	if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-inline' ) { 		
		if ( get_theme_mod( 'progression_studios_header_background_color')) {
			$progression_studios_header_container_bg_inline = "background-color:" . esc_attr( get_theme_mod('progression_studios_header_background_color') ). ";";
		} else {
			$progression_studios_header_container_bg_inline = "";
		}
		if ( get_theme_mod( 'progression_studios_header_bg_image', get_template_directory_uri() . '/images/page-title.jpg' ) ) {
			$progression_studios_header_container_img_inline = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_header_bg_image', get_template_directory_uri() . '/images/page-title.jpg' ) ) . ");";
		} else {
			$progression_studios_header_container_img_inline = "";
		}	
		if ( get_theme_mod( 'progression_studios_header_bg_image_image_position', 'cover') == 'cover') {
			$progression_studios_header_container_display_inline = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
		} else {
			$progression_studios_header_container_display_inline = "background-repeat:repeat-all;";
		}	

	} else {
		$progression_studios_header_container_img_inline = "";
		$progression_studios_header_container_bg_inline = "";
		$progression_studios_header_container_display_inline = "";
	}
	
	
	if ( get_theme_mod( 'progression_studios_page_title_bg_color') ) {
		$progression_studios_page_title_bg_style = "background-color:" . esc_attr( get_theme_mod('progression_studios_page_title_bg_color') ) . ";";
	} else {
		$progression_studios_page_title_bg_style = "";
	}	
	if ( get_theme_mod( 'progression_studios_page_title_bg_image') ) {
		$progression_studios_page_title_bg_img_pro = "background-image:url('" . esc_attr( get_theme_mod( 'progression_studios_page_title_bg_image' ) ). "');";
	} else {
		$progression_studios_page_title_bg_img_pro = "";
	}
	if ( get_theme_mod( 'progression_studios_page_title_image_position', 'cover') == 'cover') {
		$progression_studios_page_title_bg_repeat = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	} else { 
		$progression_studios_page_title_bg_repeat = "background-repeat:repeat-all;";
	}

                
	if ( get_theme_mod( 'progression_studios_sticky_header_background_color', 'rgba(13,13,51,0.9)')) {
		$progression_studios_sticky_header_bg_style = "body .progression-studios-transparent-header .progression-sticky-scrolled header#masthead-pro, body .progression-sticky-scrolled header#masthead-pro { background:" . esc_attr( get_theme_mod('progression_studios_sticky_header_background_color', 'rgba(13,13,51,0.9)') ) .";}";
	} else {
		$progression_studios_sticky_header_bg_style = "";
	}
		
	
	
	if ( get_theme_mod( 'progression_studios_sticky_logo_width', '0') != '0') {
		$progression_studios_sticky_width_logo_style = "width:" . esc_attr( get_theme_mod('progression_studios_sticky_logo_width', '70') ) . "px;";
	} else {
		$progression_studios_sticky_width_logo_style = "";
	}
	if ( get_theme_mod( 'progression_studios_sticky_logo_margin_top', '0') != '0') {
		$progression_studios_sticky_top_pdng = "padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_top', '31') ) . "px;";
	} else {
		$progression_studios_sticky_top_pdng = "";
	}
	if ( get_theme_mod( 'progression_studios_sticky_logo_margin_bottom', '0') != '0') {
		$progression_studios_sticky_bottom_pdng = "padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_bottom', '31') ) . "px;";
	} else {
		$progression_studios_sticky_bottom_pdng = "";
	}
	
	
	if ( get_theme_mod( 'progression_studios_sticky_nav_padding', '0') != '0') {
		$progression_studios_sticky_nav_padding_style ="
		.progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count {top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding', '35') - 7 ) . "px;}
		.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding', '35') - 1 ) . "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding', '35') - 1 ) . "px;
		}
		.progression-sticky-scrolled #habitat-header-search-icon i.fa-search, .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding', '35')  ) . "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding', '35')  ) . "px;
		}
		.progression-sticky-scrolled .sf-menu a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding', '35') ) . "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding', '35') ) . "px;
		}";
	} else {
		$progression_studios_sticky_nav_padding_style = "";
	}
	
	if ( get_theme_mod( 'progression_studios_sticky_nav_font_color')) {
		$progression_studios_sticky_nav_font_color_style = "
		.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression-sticky-scrolled #habitat-header-search-icon i.fa-search, .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag, .progression-sticky-scrolled #progression-shopping-cart-count a, .progression-sticky-scrolled .sf-menu a {
			color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ) . ";
		}";
	} else {
		$progression_studios_sticky_nav_font_color_style = "";
	}
	
	if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover')) {
		$progression_studios_sticky_nav_font_color_hover_style = ".progression-sticky-scrolled #habitat-header-search-icon:hover i.fa-search, .progression-sticky-scrolled #habitat-header-search-icon.active-search-icon-pro i.fa-search, .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a i.fa-shopping-bag, .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, .progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a  {
			color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
		}";
	} else {
		$progression_studios_sticky_nav_font_color_hover_style = "";
	}

	
	if ( get_theme_mod( 'progression_studios_nav_bg')) {
		$progression_studios_nav_bg_pro_syle = "background:" . esc_attr( get_theme_mod('progression_studios_nav_bg') ) . ";";
	} else {
		$progression_studios_nav_bg_pro_syle = "";
	}


	if ( get_theme_mod( 'progression_studios_footer_icon_bg_color') ) {
		$progression_studios_footer_icn_bg = "background:" . esc_attr( get_theme_mod('progression_studios_footer_icon_bg_color', '#31343f') ) . ";";
	} else {
		$progression_studios_footer_icn_bg = "";
	}
	if ( get_theme_mod( 'progression_studios_footer_icon_border_color', '#484859') ) {
		$progression_studios_footer_icn_bg_brdr = "border:1px solid" . esc_attr( get_theme_mod('progression_studios_footer_icon_border_color', '#484859') ) . ";";
	} else {
		$progression_studios_footer_icn_bg_brdr = "";
	}

	
	
   if ( get_theme_mod( 'progression_single_sharing_facebook', '1') ) {
      $progression_studios_single_sharing_facebook = ".single-social-sharing a.facebook-share, .single-shop-social-sharing a.facebook-share { display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_facebook = "";
	}
	
   if (get_theme_mod( 'progression_single_sharing_twitter', '1') ) {
      $progression_studios_single_sharing_twitter = ".single-social-sharing a.twitter-share, .single-shop-social-sharing a.twitter-share {  display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_twitter = "";
	}
	
   if ( get_theme_mod( 'progression_single_sharing_pinterest', '1') ) {
      $progression_studios_single_sharing_pinterest = ".single-social-sharing a.pinterest-share, .single-shop-social-sharing a.pinterest-share { display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_pinterest = "";
	}
	
   if ( get_theme_mod( 'progression_single_sharing_google', '1') ) {
      $progression_studios_single_sharing_google = ".single-social-sharing a.google-share, .single-shop-social-sharing a.google-share { display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_google = "";
	}
	
   if ( get_theme_mod( 'progression_single_sharing_reddit') ) {
      $progression_studios_single_sharing_reddit = ".single-social-sharing a.reddit-share, .single-shop-social-sharing a.reddit-share {  display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_reddit = "";
	}
	
   if ( get_theme_mod( 'progression_single_sharing_linkedin') ) {
      $progression_studios_single_sharing_linkedin = ".single-social-sharing a.linkedin-share, .single-shop-social-sharing a.linkedin-share { display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_linkedin = "";
	}
	
   if ( get_theme_mod( 'progression_single_sharing_tumblr') ) {
      $progression_studios_single_sharing_tumblr = ".single-social-sharing a.tumblr-share, .single-shop-social-sharing a.tumblr-share {  display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_tumblr = "";
	}
	
   if ( get_theme_mod( 'progression_single_sharing_stumble') ) {
      $progression_studios_single_sharing_stumble = ".single-social-sharing a.stumble-share, .single-shop-social-sharing a.stumble-share {  display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_stumble = "";
	}
	
   if (get_theme_mod( 'progression_single_sharing_mail', '1') ) {
      $progression_studios_single_sharing_mail = ".single-social-sharing a.mail-share, .single-shop-social-sharing a.mail-share { display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_mail = "";
	}
	
   if ( get_theme_mod( 'progression_single_sharing_vk') ) {
      $progression_studios_single_sharing_vk = ".single-social-sharing a.vk-share, .single-shop-social-sharing a.vk-share { display:inline-block;}";
	}	else {
		$progression_studios_single_sharing_vk = "";
	}	
	
	if ( get_theme_mod( 'progression_studios_nav_bg_hover')) {
	 $progression_studios_nav_bg_hover = ".sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a { background:" . esc_attr( get_theme_mod('progression_studios_nav_bg_hover') ). "; }";
	} else {
		$progression_studios_nav_bg_hover = "";
	}	
	
	if ( get_theme_mod( 'progression_studios_sticky_nav_font_bg')) {
		$progression_studios_sticky_nav_font_bg_style = ".progression-sticky-scrolled .sf-menu a { background:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_bg') ) . "; }";
	} else {
		$progression_studios_sticky_nav_font_bg_style = "";
	}	
	
	if ( get_theme_mod( 'progression_studios_sticky_nav_font_hover_bg')) {
		$progression_studios_sticky_nav_font_hover_bg_style = ".progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a { background:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_hover_bg') ) . "; }";
	} else {
		$progression_studios_sticky_nav_font_hover_bg_style = "";
	}	
	
	if ( get_theme_mod( 'progression_studios_sub_nav_ltterspacing', '0.5')) {
		$progression_studios_sub_nav_ltterspacing_style = ".sf-menu li li a { letter-spacing:" . esc_attr( get_theme_mod('progression_studios_sub_nav_ltterspacing', '0.5') ) . "px; font-size:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '15') ) . "px; }";
	} else {
		$progression_studios_sub_nav_ltterspacing_style = "";
	}
	

	if ( get_theme_mod( 'progression_studios_sticky_nav_font_color')) {
		$progression_studios_sticky_nav_font_color_option = "
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #habitat-header-search-icon i.fa-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a,
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #habitat-header-search-icon i.fa-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a {
			color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ) . ";
		}";
	} else {
		$progression_studios_sticky_nav_font_color_option = "";
	}

	if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover')) {
		$progression_studios_sticky_nav_font_color_hover_option = "
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled #habitat-header-search-icon:hover i.fa-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #habitat-header-search-icon.active-search-icon-pro i.fa-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a i.fa-shopping-bag, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #habitat-header-search-icon:hover i.fa-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #habitat-header-search-icon.active-search-icon-pro i.fa-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a i.fa-shopping-bag, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a {
				color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
			}";
	} else {
		$progression_studios_sticky_nav_font_color_hover_option = "";
	}

	
	if ( get_theme_mod( 'progression_studios_top_header_onoff', 'on-pro') == 'off-pro') {
		$progression_studios_top_header_onoff_style = "display:none;";
	} else {
		$progression_studios_top_header_onoff_style = "";
	}
	if ( get_theme_mod( 'progression_studios_top_header_transform') == 'off-pro') {
		$progression_studios_top_header_transform_style = "text-transform:none;";
	} else {
		$progression_studios_top_header_transform_style = "";
	}

	if( (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-inline') && (get_theme_mod( 'progression_studios_logo_position', 'progression-studios-logo-position-left' ) == 'progression-studios-logo-position-left') ) {      
		$progression_studios_theme_logo_width_left = ".habitat-header-left {margin-left: " . ( esc_attr( get_theme_mod('progression_studios_theme_logo_width', '176')) + (esc_attr( get_theme_mod('progression_studios_nav_left_right', '18'))) + 30 ) . "px; }";
    } else {
		$progression_studios_theme_logo_width_left = "";
	}	

	if( (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-inline') && (get_theme_mod( 'progression_studios_logo_position', 'progression-studios-logo-position-left' ) == 'progression-studios-logo-position-right') ) {      
		$progression_studios_theme_logo_width_right =".habitat-header-left {margin-right: ". ( esc_attr( get_theme_mod('progression_studios_theme_logo_width', '176')) + (esc_attr( get_theme_mod('progression_studios_nav_left_right', '18'))) + 30 ) . "px; }";
    } else {
		$progression_studios_theme_logo_width_right = "";
	}

	if ( get_theme_mod( 'progression_studios_top_header_background')) {
		$progression_studios_top_header_background_var = "#habitat-progression-header-top { background:" . esc_attr( get_theme_mod('progression_studios_top_header_background') ) . "; }";
	} else {
		$progression_studios_top_header_background_var = "";
	}

	if ( get_theme_mod( 'progression_studios_header_icon_location', 'icon-right-pro') == 'inline-pro') {
		$progression_studios_header_icon_location_var = "#main-nav-mobile .progression-studios-social-icons{ display:none;} #progression-inline-icons {display:block;}";
	} else {
		$progression_studios_header_icon_location_var = "";
	}

	if ( get_theme_mod( 'progression_studios_header_icon_location') == 'icon-left-pro') {
		$progression_studios_header_icon_location_display = ".habitat-header-icons-left {display:block;}";
	} else {
		$progression_studios_header_icon_location_display = "";
	}

	if ( get_theme_mod( 'progression_studios_header_icon_location', 'icon-right-pro') == 'icon-right-pro') {
		$progression_studios_header_icon_location_right = ".habitat-header-icons-right {display:block;}";
	} else {
		$progression_studios_header_icon_location_right = "";
	}
	
	if ( get_theme_mod( 'progression_studios_nav_cart', 'off', true) == 'off') {
		$progression_studios_nav_cart_var = "#progression-shopping-cart-toggle {display:none;}";
	} else {
		$progression_studios_nav_cart_var = "";
	}
	
	if ( get_theme_mod( 'progression_studios_nav_search', 'off') == 'off') {
		$progression_studios_nav_search_onoff = "#habitat-header-search-icon {display:none;}";
	} else {
		$progression_studios_nav_search_onoff = "";
	}

	if ( get_theme_mod( 'progression_studios_header_icon_radius') == 'rounded-pro') {
		$progression_studios_header_icon_radius_var = "#main-nav-mobile  .progression-studios-social-icons a, #habitat-progression-header-top  .progression-studios-social-icons a {border-radius: 3px;}";
	} else {
		$progression_studios_header_icon_radius_var = "";
	}

	if ( get_theme_mod( 'progression_studios_header_icon_radius') == 'square-pro') {
		$progression_studios_header_icon_radius_square = "#main-nav-mobile  .progression-studios-social-icons a, #habitat-progression-header-top  .progression-studios-social-icons a {border-radius: 0px;}";
	} else {
		$progression_studios_header_icon_radius_square = "";
	}
	
	if ( get_theme_mod( 'progression_studios_copyright_bg', '#ffffff')) {
		$progression_studios_copyright_bg_var = "#progression-studios-copyright {background:" . esc_attr( get_theme_mod('progression_studios_copyright_bg', '#ffffff') ) . ";}";
	} else {
		$progression_studios_copyright_bg_var = "";
	}
	
	if ( get_theme_mod( 'progression_studios_footer_main_bg_image') ) {
		$progression_studios_footer_main_bg_image_var = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_footer_main_bg_image') ) . ");";
	} else {
		$progression_studios_footer_main_bg_image_var = "";
	}
	
	if ( get_theme_mod( 'progression_studios_main_image_position', 'cover') == 'cover') {
		$progression_studios_page_title_bg_repeat_main = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	} else { 
		$progression_studios_page_title_bg_repeat_main = "background-repeat:repeat-all;";
	}	

	if ( get_theme_mod( 'progression_studios_footer_nav_align') == 'left' ) {
      $progression_studios_footer_nav_align_left = "ul.progression-studios-footer-nav-container-class { float:left; }";
	}	else {
		$progression_studios_footer_nav_align_left = "";
	}
	
	if ( get_theme_mod( 'progression_studios_footer_nav_align') == 'center' ) {
      $progression_studios_footer_nav_align_cnt = "ul.progression-studios-footer-nav-container-class { float:none; text-align:center; }";
	}	else {
		$progression_studios_footer_nav_align_cnt = "";
	}	
	
	
   if ( get_theme_mod( 'progression_studios_footer_icon_radius') == 'circle-pro' ) {
      $progression_studios_footer_icon_circle = "footer#site-footer .progression-studios-social-icons i {border-radius: 60px;}";
	}	else {
		$progression_studios_footer_icon_circle = "";
	}
	
	
   if (  get_theme_mod( 'progression_studios_footer_icon_radius') == 'square-pro' ) {
      $progression_studios_footer_icon_radius_square = "footer#site-footer .progression-studios-social-icons i {border-radius: 0px;}";
	}	else {
		$progression_studios_footer_icon_radius_square = "";
	}	
	
	
   if ( get_theme_mod( 'progression_studios_footer_icon_text', 'off' ) ) {
      $progression_studios_footer_hide_icon_text = "footer#site-footer .progression-studios-social-icons span {display:none;}";
	}	else {
		$progression_studios_footer_hide_icon_text = "";
	}	


   if ( get_theme_mod( 'progression_studios_footer_copyright_location') == 'right' ) {
      $progression_studios_footer_copyright_right = "#copyright-text {float:right;}";
	}	else {
		$progression_studios_footer_copyright_right = "";
	}
	
   if (  get_theme_mod( 'progression_studios_footer_copyright_location', 'center' ) == 'center' ) {
      $progression_studios_footer_copyright_center = "#copyright-text {float:none; text-align:center;}";
	}	else {
		$progression_studios_footer_copyright_center = "";
	}

	
   if ( get_theme_mod( 'progression_studios_footer_icon_location_align') == 'right' ) {
      $progression_studios_footer_icon_location_right = "footer#site-footer .progression-studios-social-icons {float:right;}";
	}	else {
		$progression_studios_footer_icon_location_right = "";
	}
	
	
   if ( get_theme_mod( 'progression_studios_footer_icon_location_align') == 'left' ) {
      $progression_studios_footer_icon_left = "footer#site-footer .progression-studios-social-icons {float:left;}";
	}	else {
		$progression_studios_footer_icon_left = "";
	}	


   if ( get_theme_mod( 'progression_studios_footer_image_location_align') == 'right' ) {
      $progression_studios_footer_image_location_right = "#progression-studios-footer-logo {float:right;}";
	}	else {
		$progression_studios_footer_image_location_right = "";
	}
	
   if ( get_theme_mod( 'progression_studios_footer_image_location_align', 'center') == 'center' ) {
      $progression_studios_footer_iamge_align_center = "#progression-studios-footer-logo {float:none; text-align:center; display:block; margin-left:auto; margin-right:auto; }";
	}	else {
		$progression_studios_footer_iamge_align_center = "";
	}

	if ( get_theme_mod( 'progression_studios_mobile_header_bg')) {
		$progression_studios_mobile_header_bg_var = ".progression-studios-transparent-header header#masthead-pro, header#masthead-pro {  background:" . esc_attr( get_theme_mod('progression_studios_mobile_header_bg') ) ."; }";
	} else {
		$progression_studios_mobile_header_bg_var = "";
	}
	if ( get_theme_mod( 'progression_studios_mobile_header_logo_width', '100')) {
		$progression_studios_mobile_header_width_var = "body #logo-pro img { width:" . esc_attr( get_theme_mod('progression_studios_mobile_header_logo_width', '100') ) . "px; }";
	} else {
		$progression_studios_mobile_header_width_var = "";
	}
	if ( get_theme_mod( 'progression_studios_mobile_header_logo_margin')) {
		$progression_studios_mobile_header_logo_margin_var = "body #logo-pro img { padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ) . "px; }";
	} else {
		$progression_studios_mobile_header_logo_margin_var = "";
	}
	if ( get_theme_mod( 'progression_studios_mobile_header_nav_padding')) {
		$progression_studios_mobile_header_nav_padding_var = "
		#progression-shopping-cart-count span.progression-cart-count {top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 7 ) . "px;}
		#progression-inline-icons .progression-studios-social-icons a { padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 2 ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 2 ) . "px;}
		.mobile-menu-icon-pro {padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 3 ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 3 ) . "px; }
		#habitat-header-search-icon i.fa-search, #progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag {padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 1 ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 1 ) . "px;}
		.sf-menu a {padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') ) . "px;padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') ) . "px;}
		}";
	} else {
		$progression_studios_mobile_header_nav_padding_var = "";
	}

	if (get_theme_mod( 'progression_studios_pro_scroll_top') == "scroll-off-pro") {
		$progression_studios_pro_scroll_top_var = "display:none;";
	} else {
		$progression_studios_pro_scroll_top_var = "";
	}

	if ( get_theme_mod( 'progression_studios_body_bg_image') ) {
		$progression_studios_body_bg_image_var = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_body_bg_image') ). ");";
	} else {
		$progression_studios_body_bg_image_var = "";
	}
	if ( get_theme_mod( 'progression_studios_body_bg_image_image_position', 'cover') == 'cover') {
		$progression_studios_body_bg_repeat_main = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	} else { 
		$progression_studios_body_bg_repeat_main = "background-repeat:repeat-all;";
	}	
	
	if ( get_theme_mod( 'progression_studios_blog_index_bg', '#f7f8f8')) {
		$progression_studios_blog_index_bg_var = ".progression-studios-shop-text-container, .progression-blog-content, .progression-program-content, .progression-program-container, body.blog .progression-studios-feaured-image, body.single-post .progression-studios-feaured-image { background:" . esc_attr( get_theme_mod('progression_studios_blog_index_bg', '#f7f8f8') ) . "; }";
	} else {
		$progression_studios_blog_index_bg_var = "";
	}	
	
	if ( get_theme_mod( 'progression_studios_blog_image_bg')) {
		$progression_studios_blog_image_bg_var = ".woocommerce-shop-single .thumbnails a, .progression-studios-feaured-image { background:" . esc_attr( get_theme_mod('progression_studios_blog_image_bg') ) . "; }";
	} else {
		$progression_studios_blog_image_bg_var = "";
	}	

	if ( get_theme_mod( 'progression_studios_blog_post_sharing') == 'off') {
		$progression_studios_blog_post_sharing_var = ".single-shop-social-sharing, .single-social-sharing {display:none;}";
	} else {
		$progression_studios_blog_post_sharing_var = "";
	}	
	
	if ( get_theme_mod( 'progression_studios_blog_post_nav') == 'off') {
		$progression_studios_blog_post_nav_var = ".progression-single-container .progression-studios-post-navigation {display:none;}";
	} else {
		$progression_studios_blog_post_nav_var = "";
	}

	if ( get_theme_mod( 'progression_studios_blog_post_sharing') == 'off' && get_theme_mod( 'progression_studios_blog_post_nav') == 'off') {
		$progression_studios_blog_post_sharing_tvar = ".progression-studios-divider.remove-navigation-sharing {display:none;}";
	} else {
		$progression_studios_blog_post_sharing_tvar = "";
	}

   if ( get_theme_mod( 'progression_studios_lightbox_play') == 'off' ) {
      $progression_studios_lightbox_play_btn = ".pp_default .pp_details .pp_nav .pp_play {display:none !important;}";
	}	else {
		$progression_studios_lightbox_play_btn = "";
	}

   if ( get_theme_mod( 'progression_studios_lightbox_count') == 'off' ) {
      $progression_studios_lightbox_count_off = ".pp_default .pp_details .pp_nav .currentTextHolder {display:none !important;} ";
	} else {
		$progression_studios_lightbox_count_off = "";
	}
	
   if ( get_theme_mod( 'progression_studios_lightbox_caption') == 'off' ) {
      $progression_studios_lightbox_caption_off = ".pp_description, .ppt {display:none !important;}";
	} else {
		$progression_studios_lightbox_caption_off = "";
	}

	if ( get_theme_mod( 'progression_studios_site_boxed') == 'boxed-pro') {
		$progression_studios_site_boxed_var = "
			margin-top:25px;
			overflow:hidden;
			position:relative;
			box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
			width:" . esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;
			margin-left:auto; margin-right:auto; 
			background-color:" . esc_attr(get_theme_mod('progression_studios_boxed_background_color', '#ffffff')) . ";";
	} else {
		$progression_studios_site_boxed_var = "";
	}
		
	if (( get_theme_mod( 'progression_studios_site_boxed') == 'boxed-pro') && ( get_theme_mod( 'progression_studios_boxed_bg_image') )) {
		$progression_studios_site_boxed_bg_pro = "background-image:url(". esc_attr( get_theme_mod( 'progression_studios_boxed_bg_image') ) . ");";
	} else {
		$progression_studios_site_boxed_bg_pro = "";
	}	
			
	if (( get_theme_mod( 'progression_studios_site_boxed') == 'boxed-pro') && ( get_theme_mod( 'progression_studios_boxed_bg_image_image_position', 'cover') ) == 'cover' ) {
		$progression_studios_boxed_bg_image_image_position_var = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	} else { 
		$progression_studios_boxed_bg_image_image_position_var = "background-repeat:repeat-all;";
	}

	if ( get_theme_mod( 'progression_studios_site_boxed') == 'boxed-pro') {
		$progression_studios_site_boxed_var_secondary = "
		#boxed-layout-pro .width-container-pro {
			width:90%;
		}
		@media only screen and (min-width: 959px) {
			#boxed-layout-pro [data-vc-full-width-init='true'][data-vc-stretch-content='true'] {
				width:" . esc_attr(get_theme_mod('qube_ezio_pro_site_width', '1200')) . "px !important;
				left:50% !important;
				margin-left:-". esc_attr(get_theme_mod('qube_ezio_pro_site_width', '1200') / 2) . "px;
			}
		}
		@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) { 
			body #boxed-layout-pro { width:92%; } 
		}";
	} else {
		$progression_studios_site_boxed_var_secondary = "";
	}
	

	$progression_studios_custom_css = "
	    
	a:hover { color:" . esc_attr( get_theme_mod('progression_studios_default_link_hover_color', '#31343f') ) . ";}
	
	ul.product_list_widget .star-rating, .woocommerce ul.products li.product span.woocommerce-Price-amount, .woocommerce-shop-single .star-rating:before, .woocommerce-shop-single .star-rating, body #content-pro .woocommerce-shop-single span.woocommerce-Price-amount, .woocommerce ul.products li.product .star-rating:before, .woocommerce ul.products li.product .star-rating,
	a, .tags-progression a:hover, .comment-form-rating .stars a:hover { color:" . esc_attr( get_theme_mod('progression_studios_default_link_color', '#0eb2d7') ) . ";}
	.search-form input.search-field:focus, .post-password-form input#pwbox-1168:focus, .comment-respond input:focus, .comment-respond textarea:focus, .wpcf7-form input:focus, .wpcf7-form textarea:focus {
		border-color:" . esc_attr( get_theme_mod('progression_studios_default_link_color', '#0eb2d7') ). "; 
	}
	
	body #logo-pro img {
		width:" . esc_attr( get_theme_mod('progression_studios_theme_logo_width', '176') ). "px;
		margin-top:" . esc_attr( get_theme_mod('progression_studios_theme_logo_margin_top', '-50') ). "px;
		margin-bottom:" . esc_attr( get_theme_mod('progression_studios_theme_logo_margin_bottom', '0') ). "px;
	}
	
	footer#site-footer .progression-studios-social-icons a {
		margin-left:" . esc_attr( get_theme_mod('progression_studios_footer_margin_sides', '8') ) . "px;
		margin-right:" . esc_attr( get_theme_mod('progression_studios_footer_margin_sides', '8') ) . "px;
	}
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.active-mobile-icon-pro .mobile-menu-icon-pro,
	.mobile-menu-icon-pro:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #habitat-header-search-icon:hover i.fa-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #habitat-header-search-icon.active-search-icon-pro i.fa-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a i.fa-shopping-bag, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #habitat-header-search-icon:hover i.fa-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #habitat-header-search-icon.active-search-icon-pro i.fa-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a i.fa-shopping-bag, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	#habitat-header-search-icon:hover i.fa-search, #habitat-header-search-icon.active-search-icon-pro i.fa-search, #progression-shopping-cart-toggle.activated-class a i.fa-shopping-bag, #progression-inline-icons .progression-studios-social-icons a:hover, #progression-shopping-cart-count a.progression-count-icon-nav:hover, .sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a, .sf-menu li.current_page_parent a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#d82255') ) . ";
	}

	#progression-checkout-basket ul#progression-cart-small li.empty { font-size:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '15') ) . "px; }
	.progression-sticky-scrolled #progression-checkout-basket, .progression-sticky-scrolled #progression-checkout-basket a, .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,

	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	.progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	.progression_studios_force_light_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	
	.sf-menu li.sfHover.highlight-button li a, .sf-menu li.current-menu-item.highlight-button li a,
	.progression-sticky-scrolled #progression-checkout-basket a.cart-button-header-cart:hover,
	.progression-sticky-scrolled #progression-checkout-basket a.checkout-button-header-cart:hover,
	#progression-checkout-basket a.cart-button-header-cart:hover,
	#progression-checkout-basket a.checkout-button-header-cart:hover,
	#progression-checkout-basket, #progression-checkout-basket a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a { color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_color', '#565656') ) . "; }
	.sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a { 
		background:none;
	}
	
	.progression-sticky-scrolled .sf-menu li.sfHover li h2.mega-menu-heading a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li h2.mega-menu-heading a,
	.progression-sticky-scrolled #progression-checkout-basket a:hover, .progression-sticky-scrolled #progression-checkout-basket ul#progression-cart-small li h6, .progression-sticky-scrolled #progression-checkout-basket .progression-sub-total span.total-number-add, .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,

	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	
	.sf-menu li.sfHover.highlight-button li a:hover, .sf-menu li.current-menu-item.highlight-button li a:hover,
	#progression-checkout-basket a.cart-button-header-cart, #progression-checkout-basket a.checkout-button-header-cart,
	.sf-menu li.sfHover li h2.mega-menu-heading a:hover, .sf-menu li.sfHover li h2.mega-menu-heading a,
	#progression-checkout-basket a:hover, #progression-checkout-basket ul#progression-cart-small li h6, #progression-checkout-basket .progression-sub-total span.total-number-add,
	.sf-menu li.sfHover li a:hover, .sf-menu li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a { 
		background:" . esc_attr( get_theme_mod('progression_studios_sub_nav_bg_hovr_clr', 'rgba(255,255,255, 0.04)') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_hover_font_color', '#000000') ) . ";
	}
	body .sf-mega ul:after {
		background:" . esc_attr( get_theme_mod('progression_studios_sub_nav_bg_hovr_clr', 'rgba(255,255,255, 0.04)') ) . ";
	}
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	#progression-shopping-cart-count span.progression-cart-count { 
		background:" . esc_attr( get_theme_mod('progression_studios_nav_cart_background', '#0eb2d7') ) . "; 
		color:" . esc_attr( get_theme_mod('progression_studios_nav_cart_color', '#ffffff') ) . ";
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_background', '#db444e') ) . "; 
	}
	.sf-menu li.current-menu-item.highlight-button a:before,.sf-menu li.highlight-button a:before { 
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_background', '#db444e') ) . ";  opacity:1; width:100%;		
	}
	
	.sf-menu li.highlight-button a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_hover_text', '#ffffff') ) . ";
	}
	
	sf-menu li.highlight-button a:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . "; 
	}
	
	body nav#site-navigation { letter-spacing: " . esc_attr( get_theme_mod('progression_studios_nav_ltterspacing', '1.5') ) . "px;}
	#progression-shopping-cart-count span.progression-cart-count {top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 7 ) . "px;}
	#progression-inline-icons .progression-studios-social-icons a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 1 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 1 ) . "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '16') + 1 ) . "px;
	}
	.mobile-menu-icon-pro {
		min-width:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '16') + 6 ) . "px;
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 3 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 3 ) . "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '16') + 6 ) . "px;
	}
	#habitat-header-search-icon i.fa-search {
		min-width:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '16') ) . "px;
	}
	#habitat-header-search-icon i.fa-search, #progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30')  ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') ) . "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '16')  ) . "px;
	}
	#progression-shopping-cart-count a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . ";
	}
	#progression-checkout-basket, #panel-search-progression, .sf-menu ul { background:" . esc_attr( get_theme_mod('progression_studios_sub_nav_bg', '#ffffff') ) . "; }
	.sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') ) . "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '16') ) . "px;
		$progression_studios_nav_bg_pro_syle
	}
        
	body .sf-menu li.highlight-button a {
        font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '16') -1 ) . "px;
    }
    
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #habitat-header-search-icon i.fa-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #habitat-header-search-icon i.fa-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . ";
	}

	footer#site-footer .progression-studios-social-icons {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_footer_margin_top', '0') ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_footer_margin_bottom', '0') ) . "px;
	}
	footer#site-footer .progression-studios-social-icons span {
		color:" . esc_attr( get_theme_mod('progression_studios_footer_icon_color', '#ffffff') ) . ";
	}
	
	footer#site-footer .progression-studios-social-icons i {
		$progression_studios_footer_icn_bg
		color:" . esc_attr( get_theme_mod('progression_studios_footer_icon_color', '#ffffff') ) . ";
		$progression_studios_footer_icn_bg_brdr
	}
	
	#header-container-logo-progression {
		$progression_studios_header_container_bg
		$progression_studios_header_container_img
		$progression_studios_header_container_display
	}
	
	#progression-studios-header-position {
		$progression_studios_header_container_bg_inline
		$progression_studios_header_container_img_inline
		$progression_studios_header_container_display_inline
	}
	
	#habitat-progression-header-top {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '14') ) . "px;
		$progression_studios_top_header_onoff_style		
		$progression_studios_top_header_transform_style
	}	
	
	
	$progression_studios_single_sharing_facebook
	$progression_studios_single_sharing_twitter
	$progression_studios_single_sharing_pinterest
	$progression_studios_single_sharing_google
	$progression_studios_single_sharing_reddit
	$progression_studios_single_sharing_linkedin
	$progression_studios_single_sharing_tumblr
	$progression_studios_single_sharing_stumble
	$progression_studios_single_sharing_mail
	$progression_studios_single_sharing_vk
	
	
	#page-title-pro {
		$progression_studios_page_title_bg_style
		$progression_studios_page_title_bg_img_pro
		$progression_studios_page_title_bg_repeat
		padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '80') ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '75') ) . "px;
	}	
	
	
	body .progression-sticky-scrolled #logo-pro img {
		$progression_studios_sticky_width_logo_style
		$progression_studios_sticky_top_pdng
		$progression_studios_sticky_bottom_pdng
	}	
	
	$progression_studios_blog_header_img
	$progression_studios_shop_header_img
	$progression_studios_page_header_img
	$progression_studios_product_header_img
	$progression_studios_page_bg_img
	$progression_studios_header_position_img

	$progression_studios_footer_display
	$progression_studios_footer_display_index
	$progression_studios_header_display
	$progression_studios_header_pstn
	$progression_studios_header_pstn_pro
	$progression_studios_header_pstn_shop

	$progression_studios_event_header
	$progression_studios_event_header_img

	$progression_studios_nav_bg_pro
	$progression_studios_shadow_head

	$progression_studios_sticky_border_pro
	$progression_studios_sticky_header_bg_style
	$progression_studios_sticky_nav_padding_style
	$progression_studios_sticky_nav_font_color_style
	$progression_studios_sticky_nav_font_color_hover_style
	$progression_studios_sticky_nav_font_color_option
	$progression_studios_sticky_nav_font_color_hover_option
	$progression_studios_sticky_nav_font_bg_style
	$progression_studios_sticky_nav_font_hover_bg_style

	$progression_studios_nav_bg_hover
	$progression_studios_sub_nav_ltterspacing_style

	$progression_studios_theme_logo_width_left
	$progression_studios_theme_logo_width_right

	$progression_studios_top_header_background_var
	$progression_studios_header_icon_location_var
	$progression_studios_header_icon_location_display
	$progression_studios_header_icon_location_right
	$progression_studios_nav_cart_var
	$progression_studios_nav_search_onoff
	$progression_studios_header_icon_radius_var
	$progression_studios_header_icon_radius_square

	$progression_studios_copyright_bg_var
	$progression_studios_footer_nav_align_cnt
	$progression_studios_footer_nav_align_left
	$progression_studios_footer_icon_circle
	$progression_studios_footer_icon_radius_square
	$progression_studios_footer_hide_icon_text
	$progression_studios_footer_copyright_right
	$progression_studios_footer_copyright_center
	$progression_studios_footer_icon_left
	$progression_studios_footer_icon_location_right
	$progression_studios_footer_image_location_right
	$progression_studios_footer_iamge_align_center

	$progression_studios_blog_index_bg_var
	$progression_studios_blog_image_bg_var
	$progression_studios_blog_post_sharing_var
	$progression_studios_blog_post_nav_var
	$progression_studios_blog_post_sharing_tvar

	$progression_studios_lightbox_play_btn
	$progression_studios_lightbox_count_off
	$progression_studios_lightbox_caption_off

	$progression_studios_site_boxed_var_secondary
	
	
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,
	.sf-menu li.current-menu-item.highlight-button a:hover:before, .sf-menu li.highlight-button a:hover:before {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_background', '#db444e') ) . ";
		width:100%;
	}
	
	.woocommerce-shop-single .thumbnails img, .progression-studios-feaured-image a img{ opacity:" . esc_attr( get_theme_mod('progression_studios_blog_image_opacity_default', '1') ) . ";}
	.woocommerce-shop-single .thumbnails a:hover img, .progression-studios-feaured-image:hover a img { opacity:" . esc_attr( get_theme_mod('progression_studios_blog_image_opacity', '1') ) . ";}	
	.progression-studios-woocommerce-index-container a h3, h2.progression-blog-title a, h2.program-index-headline a { color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link', '#0f0e07') ) . "; }
	.progression-studios-woocommerce-index-container a:hover h3, h2.progression-blog-title a:hover, h2.program-index-headline a:hover { color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link_hover', '#0eb2d7') ) . "; }	

	/* Navigation Padding Left/Right */
	@media only screen and (min-width: 959px) {
		.progression_studios_header_sidebar_forced header#masthead-pro .sf-menu li.highlight-button {
			margin-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ) . "px;
			margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ) . "px;
			width:" . esc_attr( 300 - get_theme_mod('progression_studios_nav_left_right', '18') - get_theme_mod('progression_studios_nav_left_right', '18') ) . "px;
		}
	}
	.sf-menu a:before {
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ) . "px;
	}
	.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
	   width: -moz-calc(100% - " . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) . "px);
	   width: -webkit-calc(100% - " . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) . "px);
	   width: calc(100% - " . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) . "px);
	}
	#progression-inline-icons .progression-studios-social-icons a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4 ) . "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4 ) . "px;
	}
	.sf-menu a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ) . "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ) . "px;
	}
	#habitat-header-search-icon i.fa-search {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18')) . "px;
		padding-right:10px;
	}
	#progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag { 
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18')) . "px;
		padding-right:5px;
	}
	.sf-menu li.highlight-button { 
		margin-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7 ) . "px;
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7 ) . "px;
	}
	.sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 15 ) . "px;
	}
	.sf-arrows .sf-with-ul:after { 
		right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 9 ) . "px;
	}
	
	@media only screen and (min-width: 960px) and (max-width: 1300px) {
		.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
		   width: -moz-calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) - 6) . "px);
		   width: -webkit-calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) - 6) . "px);
		   width: calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) - 6) . "px);
		}		
		.sf-menu a:before {
			margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4 ) . "px;
		}
		.sf-menu a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4 ) . "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4 ) . "px;
		}
		#habitat-header-search-icon i.fa-search {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4) . "px;
			padding-right:8px;
		}
		#progression-shopping-cart-count a.progression-count-icon-nav i.fa-shopping-bag { 
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4) . "px;
			padding-right:5px;
		}
		#progression-inline-icons .progression-studios-social-icons a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 8 ) . "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 8 ) . "px;
		}
		.sf-menu li.highlight-button { 
			margin-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 10 ) . "px;
			margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 10 ) . "px;
		}
		.sf-arrows .sf-with-ul {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 13 ) . "px;
		}
		.sf-arrows .sf-with-ul:after { 
			right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 7 ) . "px;
		}
	}
	

	
	.sf-menu li li a,
	.sf-mega h2.mega-menu-heading, .sf-mega ul, body .sf-mega ul, #progression-checkout-basket .progression-sub-total, #progression-checkout-basket ul#progression-cart-small li { border-color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_border_color', 'rgba(0,0,0, 0.08)') ) . ";}
	

	#habitat-progression-header-top .sf-menu a {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '14') ) . "px;
	}
	.habitat-header-left .widget, .habitat-header-right .widget {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '15') ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '15') ) . "px;
	}
	#habitat-progression-header-top .sf-menu a {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '15') + 2 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '15') + 2 ) . "px;
	}
	#habitat-progression-header-top  .progression-studios-social-icons a {
		margin-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '15') - 4 ) . "px;
		margin-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '15') - 4 ) . "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '14') - 2 ) . "px;
		min-width:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '14') - 1 ) . "px;
		background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color', '#d82255') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_header_icon_color', '#ffffff') ) . ";
	}
    
	body {
		$progression_studios_body_bg_image_var
		$progression_studios_body_bg_repeat_main
		background-color:" . esc_attr( get_theme_mod('progression_studios_background_color', '#ffffff') ) . ";
	}
	
	#pro-scroll-top { 
		$progression_studios_pro_scroll_top_var
		color:" . esc_attr(get_theme_mod('progression_studios_scroll_color', '#ffffff')) . "; 
		background: " . esc_attr(get_theme_mod('progression_studios_scroll_bg_color', 'rgba(0,0,0,  0.3)')) . "; 
		border-top:1px solid " .  esc_attr(get_theme_mod('progression_studios_scroll_border_color', 'rgba(255,255,255,  0.2)')) . "; 
		border-left:1px solid " . esc_attr(get_theme_mod('progression_studios_scroll_border_color', 'rgba(255,255,255,  0.2)')) . "; 
		border-right:1px solid " .  esc_attr(get_theme_mod('progression_studios_scroll_border_color', 'rgba(255,255,255,  0.2)')) . "; 
	}
	#pro-scroll-top:hover {  
		background: ". esc_attr(get_theme_mod('progression_studios_scroll_hvr_bg_color', '#0eb2d7')) . "; 
		border-color:" . esc_attr(get_theme_mod('progression_studios_scroll_hvr_border_color', '#0eb2d7')) . "; 
	}	
        
        
	#main-nav-mobile .progression-studios-social-icons a {
		background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color', '#d82255') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_header_icon_color', '#ffffff') ) . ";
	}
	#habitat-progression-header-top a, #habitat-progression-header-top .sf-menu a, #habitat-progression-header-top {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_color', '#cccccc') ) . ";
	}
	#habitat-progression-header-top a:hover, #habitat-progression-header-top .sf-menu a:hover, #habitat-progression-header-top .sf-menu li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_hover_color', '#ffffff') ) . ";
	}
	#habitat-progression-header-top .sf-menu ul {
		background:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_bg', '#ffffff') ) . ";
	}

	
	.progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	
	.progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	
	#habitat-progression-header-top .sf-menu li.sfHover li a, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li a, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_color', '#888888') ) . ";
	}
	
	.progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_top_header_color #habitat-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	
	.progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_top_header_color #habitat-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	
	#habitat-progression-header-top .sf-menu li.sfHover li a:hover, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover a, #habitat-progression-header-top .sf-menu li.sfHover li li a:hover, #habitat-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, #habitat-progression-header-top .sf-menu li.sfHover li li li a:hover, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, #habitat-progression-header-top .sf-menu li.sfHover li li li li a:hover, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #habitat-progression-header-top .sf-menu li.sfHover li li li li li a:hover, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #habitat-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_hover_color', '#3f3f3f') ) . ";
	}
    #habitat-progression-header-top {border-bottom: 1px solid " . esc_attr(get_theme_mod('progression_studios_top_header_border_color', 'rgba(255,255,255,0.08)')) . "; }
        
	footer#site-footer .progression-studios-social-icons i {
		font-size:" . esc_attr( get_theme_mod('progression_studios_footer_icon_size', '24') ) . "px;
		min-width:" . esc_attr( get_theme_mod('progression_studios_footer_icon_size', '24') + 1 ) . "px;
	}
	

	#progression-studios-footer-divider {
		background:" . esc_attr( get_theme_mod('progression_studios_footer_divider', '#000000') ) . ";
		height:" . esc_attr( get_theme_mod('progression_studios_footer_divider_height', '0') ) . "px;
	}
	
	footer#site-footer #progression-studios-copyright a { color:" . esc_attr( get_theme_mod('progression_studios_copyright_link', '#545a6e') ) . "; }
	footer#site-footer #progression-studios-copyright a:hover { color:" . esc_attr( get_theme_mod('progression_studios_copyright_link_hover', '#999999') ) . "; }
	
	
	.comment-body, body .woocommerce .woocommerce-MyAccount-content { border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#0eb2d7') ) . "; }
	
	footer#site-footer .widget .price_slider .ui-slider-handle, .sidebar .widget .price_slider .ui-slider-handle, footer#site-footer .widget .price_slider .ui-slider-range, .sidebar .widget .price_slider .ui-slider-range  {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#0eb2d7') ) . ";
	} 
	
	footer#site-footer {
		background:" . esc_attr( get_theme_mod('progression_studios_footer_background', '#0ed768') ) . ";
		$progression_studios_footer_main_bg_image_var
		$progression_studios_page_title_bg_repeat_main
	}	
	
	.sidebar .tagcloud a, #site-footer .tagcloud a,
	#infinite-nav-pro a, ul.filter-button-group li.is-checked, ul.filter-button-group li:hover, body .woocommerce ul.products li.product span.onsale, body #content-pro .woocommerce-shop-single  span.onsale, a.more-link, .comment-navigation a, .comment-respond input#submit, input.wpcf7-submit, .post-password-form input[type=submit],
 	a.progression-button, body #content-pro .woocommerce p.form-submit input#submit, a.more-link, .width-container-pro .sidebar a.button, .width-container-pro .woocommerce button.button, #content-pro .lost_reset_password input.button, .width-container-pro .woocommerce input.button, .width-container-pro .woocommerce a.button, body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a,
    body.woocommerce .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li.active a {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#0eb2d7') ) . ";
	}
    body.woocommerce .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li a {
        border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#0eb2d7') ) . ";    
    }    
	#content-pro ul.page-numbers li a:hover, #content-pro ul.page-numbers li span.current {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#0eb2d7') ) . ";
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#0eb2d7') ) . ";
	}
	.comment-respond input#submit, input.wpcf7-submit {
		font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '14') ) . "px;
	}
	a.progression-button, body #content-pro .woocommerce p.form-submit input#submit, a.more-link, .width-container-pro .sidebar a.button, .width-container-pro .woocommerce button.button, #content-pro .lost_reset_password input.button, .width-container-pro .woocommerce input.button, .width-container-pro .woocommerce a.button  {
		font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '14') ) . "px;
	}
	
	.sidebar .tagcloud a:hover, #site-footer .tagcloud a:hover,
	#infinite-nav-pro a:hover, a.more-link:hover, .comment-navigation a:hover, .post-password-form input[type=submit]:hover, .comment-respond input#submit:hover, input.wpcf7-submit:hover,
	a.progression-button:hover, body #content-pro .woocommerce p.form-submit input#submit:hover, a.more-link:hover, .width-container-pro .sidebar a.button:hover, .width-container-pro .woocommerce button.button:hover, #content-pro .lost_reset_password input.button:hover, .width-container-pro .woocommerce input.button:hover, .width-container-pro .woocommerce a.button:hover {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#2b3245') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_button_font_hover', '#ffffff') ) . ";
	}
	
	#progression-studios-lower-widget-container .widget, #widget-area-progression .widget {
		padding:" . esc_attr( get_theme_mod('progression_studios_widgets_margin_top', '75') ) . "px 0px ". esc_attr( get_theme_mod('progression_studios_widgets_margin_bottom', '65') ) . "px 0px;
	}
	
	
	#progression-studios-footer-logo {
		max-width:" . esc_attr( get_theme_mod('progression_studios_footer_logo_width', '176') ) . "px;
		padding-top:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_top', '0') ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_bottom', '0') ) . "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_right', '0') ) . "px;
		padding-left:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_left', '0') ) . "px;
	}
	
	@media only screen and (max-width: 959px) { 
		$progression_studios_mobile_header_nav_padding_var
		$progression_studios_mobile_header_logo_margin_var
		$progression_studios_mobile_header_width_var
		$progression_studios_mobile_header_bg_var
	}
	

	.width-container-pro { 
		width:" . esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;
	}
	header .sf-mega, #habitat-progression-header-top .sf-mega {
		width:" . esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;
		margin-left:-". esc_attr( get_theme_mod('progression_studios_site_width', '1200') / 2 ) . "px;
	}
	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
		.width-container-pro {
			width:94%; 
			position:relative;
			padding:0px;
		}
		footer#site-footer.progression-studios-footer-full-width .width-container-pro,
		.progression-studios-page-title-full-width #page-title-pro .width-container-pro,
		.progression-studios-header-full-width #habitat-progression-header-top .width-container-pro,
		.progression-studios-header-full-width header#masthead-pro .width-container-pro {
			width:94%; 
			position:relative;
			padding:0px;
		}
		#habitat-progression-header-top .sf-mega,
		header .sf-mega {
			width:100%; 
			left:0px;
			margin-left:auto;
		}
	}

	#boxed-layout-pro {
		$progression_studios_site_boxed_var
		$progression_studios_site_boxed_bg_pro
		$progression_studios_boxed_bg_image_image_position_var
	}	
	
	.sk-folding-cube .sk-cube:before, .sk-circle .sk-child:before, .sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-fading-circle .sk-circle:before, .sk-cube-grid .sk-cube{ 
		background-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#ffffff')) . ";
	}
	#page-loader-pro {
		background:" . esc_attr(get_theme_mod('progression_studios_page_loader_bg', '#0eb2d7')) . ";
		color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#ffffff')) . "; 
	}
	
		
	::-moz-selection {
		color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#0eb2d7') ) . ";
	}	
	::selection {
		color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#0eb2d7') ) . ";
	}	
	
	" . esc_attr(get_theme_mod('progression_studios_custom_css')) . "
	
	";
        wp_add_inline_style( 'progression-studios-custom-style', $progression_studios_custom_css );
}
add_action( 'wp_enqueue_scripts', 'progression_studios_customizer_styles' );