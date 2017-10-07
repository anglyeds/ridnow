<?php
/**
 * Sanitorium Theme Customizer
 *
 * @package Sanitorium
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sanitorium_customize_register( $wp_customize ) {

//Add a class for titles
    class sanitorium_info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#ee6133',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','sanitorium'),
			'description'	=> __('Select color from here.','sanitorium'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('topbar_color', array(
		'default' => '#f6f6f6',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'topbar_color',array(
			'description'	=> __('Select color for topbar.','sanitorium'),
			'section' => 'colors',
			'settings' => 'topbar_color'
		))
	);
	
	$wp_customize->add_section('headercont_section',array(
		'title'	=> __('Topbar Icons','sanitorium'),
		'description'	=> __('Add topbar social icons links here.','sanitorium'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('facebook_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('facebook_link',array(
		'label'	=> __('Add facebook icon link','sanitorium'),
		'section'	=> 'headercont_section',
		'setting'	=> 'facebook_link',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('twitter_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitter_link',array(
		'label'	=> __('Add twitter icon link','sanitorium'),
		'section'	=> 'headercont_section',
		'setting'	=> 'twitter_link',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('linked_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('linked_link',array(
		'label'	=> __('Add linkedin icon link','sanitorium'),
		'section'	=> 'headercont_section',
		'setting'	=> 'linked_link',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('gplus_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('gplus_link',array(
		'label'	=> __('Add google plus icon link','sanitorium'),
		'section'	=> 'headercont_section',
		'setting'	=> 'gplus_link',
		'type'		=> 'text'
	));
	
	$wp_customize->add_section('appoint_sec',array(
		'title'	=> __('Appointment Details','sanitorium'),
		'description'	=> __('Add appointment details here.','sanitorium'),
		'priority'		=> null
	));
	
	$wp_customize->add_setting('firstcol_num',array(
		'default'	=> __('Call Today 012 345 6789','sanitorium'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('firstcol_num',array(
		'label'	=> __('Add call details here','sanitorium'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'firstcol_num',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('firstcol_text',array(
		'default'	=> __('Lorem ipsum dolor sit amet','sanitorium'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('firstcol_text',array(
		'label'	=> __('Add call text here','sanitorium'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'firstcol_text',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('secondcol_num',array(
		'default'	=> __('Open Hours','sanitorium'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('secondcol_num',array(
		'label'	=> __('Add hours text here.','sanitorium'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'secondcol_num',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('secondcol_text',array(
		'default'	=> __('Mon - Sat: 8 am - 5 pm, Sunday: CLOSED','sanitorium'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('secondcol_text',array(
		'label'	=> __('Add hours time here.','sanitorium'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'secondcol_text',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('thirdcol_num',array(
		'default'	=> __('Make an Appointment','sanitorium'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('thirdcol_num',array(
		'label'	=> __('Add appointment title here','sanitorium'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'thirdcol_num',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('thirdcol_text',array(
		'default'	=> __('Its so fast','sanitorium'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('thirdcol_text',array(
		'label'	=> __('Add appointment subtitle here','sanitorium'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'thirdcol_text',
		'type'		=> 'text'
	));
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'sanitorium'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567)','sanitorium'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitorium_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','sanitorium'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sanitorium_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','sanitorium'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sanitorium_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','sanitorium'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slidelink_text',array(
		'default'	=> __('Read More','sanitorium'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slidelink_text',array(
		'label'	=> __('Add slider link text here.','sanitorium'),
		'section'	=> 'slider_section',
		'setting'	=> 'slidelink_text',
		'type'		=> 'text'
	));
	
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider','sanitorium'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	
}
add_action( 'customize_register', 'sanitorium_customize_register' );

//Integer
function sanitorium_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}	

function sanitorium_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.woocommerce ul.products li.product .price,
				.top-social a:hover,
				.main-nav ul li a:hover{
					color:<?php echo esc_html(get_theme_mod('color_scheme','#ee6133')); ?>;
				}
				a.blog-more:hover,
				.nav-links .current, 
				.nav-links a:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.top-right .social-icons a:hover,
				.blog-date .date,
				#appoint,
				#services-box:hover{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#ee6133')); ?>;
				}
				.top-social a:hover .fa{ border:1px solid <?php echo esc_html(get_theme_mod('color_scheme','#ee6133')); ?>;}
				#topbar{ background-color:<?php echo esc_html(get_theme_mod('topbar_color','#f6f6f6')); ?>;}
		</style>
	<?php }
add_action('wp_head','sanitorium_css');

function sanitorium_custom_customize_enqueue() {
	wp_enqueue_script( 'sanitorium-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'sanitorium_custom_customize_enqueue' );