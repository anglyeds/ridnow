<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */


if ( ! function_exists( 'progression_studios_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since progression 1.0
 */
	
function progression_studios_setup() {
	
	/* Set Revslider and Visual Composer as embeded in theme */
	if(function_exists( 'set_revslider_as_theme' )){
		add_action( 'init', 'progression_studios_custom_slider_rev' );
		function progression_studios_custom_slider_rev() { set_revslider_as_theme(); }
	}
	add_action( 'vc_before_init', 'progression_studios_SetAsTheme' );
	function progression_studios_SetAsTheme() { vc_set_as_theme( $disable_updater = true ); }

	
	// Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	add_image_size('progression-blog', 900, 600, true);
	add_image_size('habitat-progression-events', 1095, 780, true);
    add_image_size('progression-program', 800, 800, true);
	
        
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on pro, use a find and replace
	 * to change 'habitat-progression' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'habitat-progression', get_template_directory() . '/languages' );
	

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'quote', 'link', 'image' ) );

	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'progression-studios-header-top-left' => esc_html__( 'Top Left Menu', 'habitat-progression' ),
		'progression-studios-header-top-right' => esc_html__( 'Top Right Menu', 'habitat-progression' ),
		'progression-studios-primary' => esc_html__( 'Primary Menu', 'habitat-progression' ),
		'progression-studios-mobile-menu' => esc_html__( 'Mobile Primary Menu', 'habitat-progression' ),
		'progression-studios-footer-menu' => esc_html__( 'Footer Menu', 'habitat-progression' ),
	) );
	
	
}
endif; // progression_studios_setup
add_action( 'after_setup_theme', 'progression_studios_setup' );


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since pro 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 1200; /* pixels */


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since pro 1.0
 */
function progression_studios_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'habitat-progression' ),
		'description'   => esc_html__('Default sidebar', 'habitat-progression'),
		'id' => 'progression-studios-sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '</div><div class="sidebar-divider-pro"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Mobile/Tablet Sidebar', 'habitat-progression' ),
		'description'   => esc_html__('Mobile/Tablet sidebar', 'habitat-progression'),
		'id' => 'progression-studios-mobile-sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '</div><div class="sidebar-divider-pro"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Top Left', 'habitat-progression' ),
		'description'   => esc_html__('Left widget area above the navigation', 'habitat-progression'),
		'id' => 'progression-studios-header-top-left',
		'before_widget' => '<div id="%1$s" class="header-top-item widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Top Right', 'habitat-progression' ),
		'description'   => esc_html__('Right widget area above the navigation', 'habitat-progression'),
		'id' => 'progression-studios-header-top-right',
		'before_widget' => '<div id="%1$s" class="header-top-item widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Shop Sidebar', 'habitat-progression' ),
		'description'   => esc_html__('Sidebar on shop pages', 'habitat-progression'),
		'id' => 'progression-studios-sidebar-shop',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '</div><div class="sidebar-divider-pro"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	

	register_sidebar( array(
		'name' => esc_html__( 'Footer Widgets Row 1', 'habitat-progression' ),
		'description' => esc_html__( 'First row of foooter widgets', 'habitat-progression' ),
		'id' => 'progression-studios-footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Widgets Row 2', 'habitat-progression' ),
		'description' => esc_html__( 'Second row of footer widgets', 'habitat-progression' ),
		'id' => 'progression-studios-footer-widgets-second-row',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	
}
add_action( 'widgets_init', 'progression_studios_widgets_init' );




/**
 * Enqueue scripts and styles
 */
function progression_studios_scripts() {
	wp_enqueue_style( 'progression-style', get_stylesheet_uri());
	wp_enqueue_style( 'progression-google-fonts', progression_studios_fonts_url(), array( 'progression-style' ), '1.0.0' );
	wp_enqueue_script( 'progression-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'progression-scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'wp_enqueue_scripts', 'progression_studios_scripts' );



/**
 * Enqueue google fonts
 */
function progression_studios_fonts_url() {
    $progression_studios_font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'habitat-progression' ) ) {
        $progression_studios_font_url = add_query_arg( 'family', urlencode( 'Catamaran:400,700|Comfortaa:300,400,700|&subset=latin' ), "//fonts.googleapis.com/css" );
    }
	 
    return $progression_studios_font_url;
}



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom Metabox Fields
 */
require get_template_directory() . '/inc/custom-meta.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/default-customizer.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/mega-menu/mega-menu-framework.php';



/**
 * WooCommerce Functions
 */
if ( ! function_exists( 'woocommerce' ) ) require get_template_directory() . '/inc/woocommerce-functions.php';

/**
 * Load Plugin habitatation
 */
require get_template_directory() . '/inc/tgm-plugin-activation/plugin-activation.php';
