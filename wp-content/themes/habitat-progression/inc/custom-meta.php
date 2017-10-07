<?php

add_action( 'cmb2_admin_init', 'progression_studios_page_meta_box' );
function progression_studios_page_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_settings',
		'title'         => esc_html__('Page Settings', 'habitat-progression'),
		'object_types'  => array( 'page' ), // Post type,
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Sub-title', 'habitat-progression'),
		'id'         => $prefix . 'sub_title',
		'type'       => 'text',
	) );

	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Sidebar Display', 'habitat-progression'),
		'id'         => $prefix . 'page_sidebar',
		'type'       => 'select',
		'options'     => array(
			'hidden-sidebar'   => esc_html__( 'Hide Sidebar', 'habitat-progression' ),
			'right-sidebar'    => esc_html__( 'Right Sidebar', 'habitat-progression' ),
			'left-sidebar'    => esc_html__( 'Left Sidebar', 'habitat-progression' ),
		),
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Page Title Background Image', 'habitat-progression'),
		'id'         => $prefix . 'header_image',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Logo', 'habitat-progression'),
		'id'         => $prefix . 'disable_logo_page_title',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Page Title', 'habitat-progression'),
		'id'         => $prefix . 'disable_page_title',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Footer', 'habitat-progression'),
		'id'         => $prefix . 'disable_footer_per_page',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Header', 'habitat-progression'),
		'id'         => $prefix . 'header_disabled',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Floating Header', 'habitat-progression'),
		'id'         => $prefix . 'header_floated',
		'type'       => 'checkbox',
	) );	
	

	
}

add_action( 'cmb2_admin_init', 'progression_studios_page_header_meta_box' );
function progression_studios_page_header_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_header',
		'title'         => esc_html__('Header Settings', 'habitat-progression'),
		'object_types'  => array( 'page' ), // Post type,
	) );

	
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Custom logo for page', 'habitat-progression'),
		'desc' => esc_html__('Must be same size as the main logo.', 'habitat-progression'),
		'id'         => $prefix . 'custom_page_logo',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Navigation Text Color', 'habitat-progression'),
		'id'         => $prefix . 'custom_page_nav_color',
		'type'       => 'select',
		'options'     => array(
			'progression_studios_default_navigation_color'    => esc_html__( 'Default Color', 'habitat-progression' ),
			'progression_studios_force_dark_navigation_color'    => esc_html__( 'Force Text Black', 'habitat-progression' ),
			'progression_studios_force_light_navigation_color'   => esc_html__( 'Force Text White', 'habitat-progression' ), 
		),
	) );
	


	
}





add_action( 'cmb2_admin_init', 'progression_studios_post_meta_box' );
function progression_studios_post_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_post',
		'title'         => esc_html__('Post Settings', 'habitat-progression'),
		'object_types'  => array( 'post' ), // Post type
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Image Gallery', 'habitat-progression'),
		'desc' => esc_html__('Add-in images to display a gallery.', 'habitat-progression'),
		'id'         => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Audio/Video Embed', 'habitat-progression'),
		'desc'       => esc_html__('Paste in your video url or embed code', 'habitat-progression'),
		'id'         => $prefix . 'video_post',
		'type'       => 'text',
	) );

	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Featured Image Link', 'habitat-progression'),
		'id'         => $prefix . 'blog_featured_image_link',
		'type'       => 'select',
		'options'     => array(
			'progression_link_default'   => esc_html__( 'Default link to post', 'habitat-progression' ), // {#} gets replaced by row number
			'progression_link_lightbox'    => esc_html__( 'Link to image in lightbox pop-up', 'habitat-progression' ),
			'progression_link_url'    => esc_html__( 'Link to URL', 'habitat-progression' ),
			'progression_link_url_new_window'    => esc_html__( 'Link to URL (New Window)', 'habitat-progression' ),
			'progression_lightbox_video'    => esc_html__( 'Link to video (Youtube/Vimeo/.MOV)', 'habitat-progression' ),
		),

	) );
	

	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Optional Link', 'habitat-progression'),
		'desc' => esc_html__('Make your post link to another page or video pop-up.', 'habitat-progression'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );
	
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Featured Image on Post Page', 'habitat-progression'),
		'id'         => $prefix . 'disable_featured_image',
		'type'       => 'checkbox',
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Sidebar on Post Page', 'habitat-progression'),
		'id'         => $prefix . 'disable_sidebar_post',
		'type'       => 'checkbox',
	) );
	

}





add_action( 'cmb2_admin_init', 'progression_studios_program_meta_box' );
function progression_studios_program_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_program',
		'title'         => esc_html__('Program Settings', 'habitat-progression'),
		'object_types'  => array( 'program' ), // Post type
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Program Sub-headline', 'habitat-progression'),
		'id'         => $prefix . 'program_subheadline',
		'type'       => 'text',
	) );

	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Featured Image Link', 'habitat-progression'),
		'id'         => $prefix . 'blog_featured_image_link',
		'type'       => 'select',
		'options'     => array(
			'progression_link_hidden'   => esc_html__( 'No link to post', 'habitat-progression' ), // {#} gets replaced by row number
			'progression_link_default'   => esc_html__( 'Default link to post', 'habitat-progression' ), // {#} gets replaced by row number
			'progression_link_lightbox'    => esc_html__( 'Link to image in lightbox pop-up', 'habitat-progression' ),
			'progression_link_url'    => esc_html__( 'Link to URL', 'habitat-progression' ),
			'progression_link_url_new_window'    => esc_html__( 'Link to URL (New Window)', 'habitat-progression' ),
			'progression_lightbox_video'    => esc_html__( 'Link to video (Youtube/Vimeo/.MOV)', 'habitat-progression' ),
		),

	) );
	

	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Optional Link', 'habitat-progression'),
		'desc' => esc_html__('Make your post link to another page or video pop-up.', 'habitat-progression'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );

}




add_action( 'cmb2_admin_init', 'progression_studios_event_meta_box' );
function progression_studios_event_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_events',
		'title'         => esc_html__('Event Settings', 'habitat-progression'),
		'object_types'  => array( 'event' ), // Post type
	) );
	

    $progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Page Title Background Image', 'habitat-progression'),
		'id'         => $prefix . 'header_image',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );    

}


