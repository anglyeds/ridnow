<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */

function progression_studios_add_tab_to_panel( $tabs ) {
	
   $tabs['progression-studios-navigation-font'] = array(
       'name'        => 'progression-studios-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Navigation', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-sub-navigation-font'] = array(
       'name'        => 'progression-studios-sub-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Sub-Navigation', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-top-header-font'] = array(
       'name'        => 'progression-studios-top-header-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Top Header Options', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-body-font'] = array(
       'name'        => 'progression-studios-body-font',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Body Main', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-page-title'] = array(
       'name'        => 'progression-studios-page-title',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Page Title', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-widgets-font'] = array(
       'name'        => 'progression-studios-widgets-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Main', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-copyright-font'] = array(
       'name'        => 'progression-studios-copyright-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Copyright Text', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	

   $tabs['progression-studios-footer-nav-font'] = array(
       'name'        => 'progression-studios-footer-nav-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Navigation', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
	
	
   $tabs['progression-studios-default-headings'] = array(
       'name'        => 'progression-studios-default-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('H1-H6 Headings', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-blog-headings'] = array(
       'name'        => 'progression-studios-blog-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Post Headings', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-sidebar-headings'] = array(
       'name'        => 'progression-studios-sidebar-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Sidebar Options', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-button-typography'] = array(
       'name'        => 'progression-studios-button-typography',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Button Styles', 'habitat-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	

	
	
	
   
	
	
	
    // Return the tabs.
    return $tabs;
}
add_filter( 'tt_font_get_settings_page_tabs', 'progression_studios_add_tab_to_panel' );

/**
 * How to add a font control to your tab
 *
 * @see  parse_font_control_array() - in class EGF_Register_Options
 *       in includes/class-egf-register-options.php to see the full
 *       properties you can add for each font control.
 *
 *
 * @param   array $controls - Existing Controls.
 * @return  array $controls - Controls with controls added/removed.
 *
 * @since 1.0
 * @version 1.0
 *
 */
function progression_studios_add_control_to_tab( $controls ) {

    /**
     * 1. Removing default styles because we add-in our own
     */
    unset( $controls['tt_default_body'] );
    unset( $controls['tt_default_heading_1'] );
    unset( $controls['tt_default_heading_2'] );
    unset( $controls['tt_default_heading_3'] );
    unset( $controls['tt_default_heading_4'] );
    unset( $controls['tt_default_heading_5'] );
    unset( $controls['tt_default_heading_6'] );
	 
	 
    /**
     * 2. Now custom examples that are theme specific
     */
	 
	 
    $controls['progression_studios_top_header_default'] = array(
        'name'       => 'progression_studios_top_header_default',
 	'type'        => 'font',
        'title'      =>  esc_html__('Top Header Font Family', 'habitat-progression'),
        'tab'        => 'progression-studios-top-header-font',
        'properties' => array( 'selector'   => '#habitat-progression-header-top, body #habitat-progression-header-top .sf-menu a' ),
 	'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_weight_style'          => '700',
 		),
    );
	 
	 
    $controls['progression_studios_nav_font_family'] = array(
        'name'       => 'progression_studios_nav_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Navigation Font Family', 'habitat-progression'),
        'tab'        => 'progression-studios-navigation-font',
        'properties' => array( 'selector'   => 'h2.mega-menu-heading, nav#site-navigation' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_weight_style'          => '700',
 		),
    );
	 
	 
    $controls['progression_studios_body_font_family'] = array(
        'name'       => 'progression_studios_body_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Body Font', 'habitat-progression'),
        'tab'        => 'progression-studios-body-font',
        'properties' => array( 'selector'   => 'body, body input, body textarea' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_weight_style'          => 'regular',
 			'font_color'                 => 'rgba(15, 14, 7, 0.67)',
 			'line_height'                => '1.4',
 			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' )
 		),
    );
	 
    $controls['progression_studios_sub_nav_font_family'] = array(
        'name'       => 'progression_studios_sub_nav_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Sub-Navigation Font Family', 'habitat-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => '#progression-checkout-basket .progression-sub-total, #progression-checkout-basket a.checkout-button-header-cart, #progression-checkout-basket a.cart-button-header-cart, #progression-checkout-basket, #panel-search-progression, body .sf-menu ul, #habitat-progression-header-top .sf-menu ul' ),
 	'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_weight_style'          => 'regular',
 		),
    );
	 
	 
    $controls['progression_studios_page_title_font_family'] = array(
        'name'       => 'progression_studios_page_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Title Font', 'habitat-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h1' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'comfortaa',
 			'font_name'                  => 'Comfortaa',
 			'font_color'                 => '#ffffff',
			'font_weight_style'          => '700',
 			'font_size'                  => array( 'amount' => '72', 'unit' => 'px' )
 		),
    );
	 
    $controls['progression_studios_page_sub_title_font_family'] = array(
        'name'       => 'progression_studios_page_sub_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Sub-Title Font', 'habitat-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h4' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_color'                 => '#ffffff',
 			'font_size'                  => array( 'amount' => '28', 'unit' => 'px' )
 		),
    );
    
    	
    $controls['progression_studios_sub_nav_megamenu'] = array(
        'name'       => 'progression_studios_sub_nav_megamenu',
 	'type'        => 'font',
        'title'      =>  esc_html__('Mega Menu Heading', 'habitat-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => 'body header .sf-mega h2.mega-menu-heading a, body header .sf-mega h2.mega-menu-heading' ),
 	'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_weight_style'          => '700',
			'font_color'                 => '#0f0e07',
			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' )
 		),
    );
	 
    $controls['progression_studios_copyright_font_family'] = array(
        'name'       => 'progression_studios_copyright_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Copyright Font', 'habitat-progression'),
        'tab'        => 'progression-studios-copyright-font',
        'properties' => array( 'selector'   => '#copyright-text' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_weight_style'          => 'regular',
 			'font_color'                 => '#545a6e',
 			'line_height'                => '1.6',
 			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' )
 		),
    );
	 
	 
	 
    $controls['progression_studios_footer_nav_link'] = array(
        'name'       => 'progression_studios_footer_nav_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Navigation', 'habitat-progression'),
        'tab'        => 'progression-studios-footer-nav-font',
        'properties' => array( 'selector'   => 'footer#site-footer ul.progression-studios-footer-nav-container-class a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_size'                  => array( 'amount' => '12', 'unit' => 'px' )
 		),
    );
	
    $controls['progression_studios_footer_nav_link_hover'] = array(
        'name'       => 'progression_studios_footer_nav_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Navigation Hover', 'habitat-progression'),
        'tab'        => 'progression-studios-footer-nav-font',
        'properties' => array( 'selector'   => 'footer#site-footer ul.progression-studios-footer-nav-container-class a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_widget_font_heading'] = array(
        'name'       => 'progression_studios_widget_font_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Widget Heading', 'habitat-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer h4.widget-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'comfortaa',
 			'font_name'                  => 'Comfortaa',
 			'font_size'                  => array( 'amount' => '26', 'unit' => 'px' )
 		),
    );
	 
	 
    $controls['progression_studios_widget_font_family'] = array(
        'name'       => 'progression_studios_widget_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Main Font', 'habitat-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' )
 		),
    );
	 
	 
    $controls['progression_studios_widget_font_link'] = array(
        'name'       => 'progression_studios_widget_font_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Link', 'habitat-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
            'font_weight_style'          => '700',
            'font_size'                  => array( 'amount' => '16', 'unit' => 'px' )

 		),
    );
	
    $controls['progression_studios_widget_font_link_hover'] = array(
        'name'       => 'progression_studios_widget_font_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Link Hover', 'habitat-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 	 
	 
	 
    $controls['progression_studios_shop_title'] = array(
        'name'       => 'progression_studios_shop_title',
			'type'        => 'font',
        'title'      =>  esc_html__('Shop Heading', 'habitat-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.woocommerce ul.products li.product .progression-studios-woocommerce-index-container h3' ),
			'default' => array(
			'subset'                     => 'latin',
            'font_size'                  => array( 'amount' => '24', 'unit' => 'px' )                
			),
    );
    
    
    
    $controls['progression_studios_shop_price'] = array(
        'name'       => 'progression_studios_shop_price',
			'type'        => 'font',
        'title'      =>  esc_html__('Shop Price Font', 'habitat-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.woocommerce ul.products li.product span.woocommerce-Price-amount' ),
			'default' => array(
			'subset'                     => 'latin',
            'font_size'                  => array( 'amount' => '22', 'unit' => 'px' ),
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_weight_style'          => 'regular',                
			),
    );
        
    
    
	 
	 
    $controls['progression_studios_shop_sub_title'] = array(
        'name'       => 'progression_studios_shop_sub_title',
			'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Heading', 'habitat-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.woocommerce-shop-single h1' ),
			'default' => array(
			'subset'                     => 'latin',
			),
    );
	 
	 
	 
	 
    $controls['progression_studios_blog_title'] = array(
        'name'       => 'progression_studios_blog_title',
			'type'        => 'font',
        'title'      =>  esc_html__('Blog Heading', 'habitat-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'h2.progression-blog-title' ),
			'default' => array(
			'subset'                     => 'latin',
			'font_size'                  => array( 'amount' => '42', 'unit' => 'px' ),
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran',
 			'font_weight_style'          => '700',                 
			),
    );
	 
	 
    $controls['progression_studios_blog_meta'] = array(
        'name'       => 'progression_studios_blog_meta',
			'type'        => 'font',
        'title'      =>  esc_html__('Blog Meta', 'habitat-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'ul.progression-meta-index, ul.progression-meta-index a' ),
			'default' => array(
			'subset'                     => 'latin',
			'font_size'                  => array( 'amount' => '16', 'unit' => 'px' )
			),
    );
	 
    $controls['progression_studios_blog_meta_hover'] = array(
        'name'       => 'progression_studios_blog_meta_hover',
			'type'        => 'font',
        'title'      =>  esc_html__('Blog Meta Hover', 'habitat-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'ul.progression-meta-index a:hover' ),
			'default' => array(
			'subset'                     => 'latin',
			),
    );
	 
	 
	 
    $controls['progression_studios_button_font_family'] = array(
        'name'       => 'progression_studios_button_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Button Font Family', 'habitat-progression'),
        'tab'        => 'progression-studios-button-typography',
        'properties' => array( 'selector'   => 'ul.filter-button-group li.is-checked, body .woocommerce  ul.products li.product span.onsale, body #content-pro .woocommerce-shop-single  span.onsale, a.more-link, .comment-navigation a, .comment-respond input#submit, input.wpcf7-submit, .post-password-form input[type=submit],
	body #progression-checkout-basket a.checkout-button-header-cart, a.progression-button, body #content-pro .woocommerce p.form-submit input#submit, a.more-link, .width-container-pro .sidebar a.button, .width-container-pro .woocommerce button.button, #content-pro .lost_reset_password input.button, .width-container-pro .woocommerce input.button, .width-container-pro .woocommerce a.button, body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a, body .vc_btn3' ),
 		 'default' => array(
 	 	    'subset'                     => 'latin',
 			'font_id'                    => 'catamaran',
 			'font_name'                  => 'Catamaran', 
            'font_weight_style'                => '700',
 			),
    );
	 
	 
	 
	 
	 
	 
    $controls['progression_studios_heading_h1'] = array(
        'name'       => 'progression_studios_heading_h1',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 1', 'habitat-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h1' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '34', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h2'] = array(
        'name'       => 'progression_studios_heading_h2',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 2', 'habitat-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h2' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
                'text_transform'             => 'uppercase',
 	 			'font_size'                  => array( 'amount' => '30', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h3'] = array(
        'name'       => 'progression_studios_heading_h3',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 3', 'habitat-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h3' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
                'font_id'                    => 'catamaran',
                'font_name'                  => 'Catamaran',
 	 			'font_size'                  => array( 'amount' => '24', 'unit' => 'px' ),
                'font_weight_style'                => '700',
 			),
    );
	
    $controls['progression_studios_heading_h4'] = array(
        'name'       => 'progression_studios_heading_h4',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 4', 'habitat-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h4' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '22', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h5'] = array(
        'name'       => 'progression_studios_heading_h5',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 5', 'habitat-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h5' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
                'font_id'                    => 'catamaran',
                'font_name'                  => 'Catamaran',             
 	 			'font_size'                  => array( 'amount' => '16', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h6'] = array(
        'name'       => 'progression_studios_heading_h6',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 6', 'habitat-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h6' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
 			),
    );
	
	
	
	
    $controls['progression_studios_sidebar_heading'] = array(
        'name'       => 'progression_studios_sidebar_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Heading', 'habitat-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar h4.widget-title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			    'font_id'                    => 'comfortaa',
 			    'font_name'                  => 'Comfortaa',     
                'font_weight_style'          => '700',
 	 			'font_size'                  => array( 'amount' => '26', 'unit' => 'px' ),
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_content'] = array(
        'name'       => 'progression_studios_sidebar_content',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Text', 'habitat-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '16', 'unit' => 'px' ),
 			),
    );
	 
	 
	 
    $controls['progression_studios_sidebar_link'] = array(
        'name'       => 'progression_studios_sidebar_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Link', 'habitat-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => 'body .sidebar a' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
                'font_weight_style'          => '700',
 	 			'font_color'                 => '#238eba',
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_link_hover'] = array(
        'name'       => 'progression_studios_sidebar_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Link Hover', 'habitat-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar a:hover' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_color'                 => '#0f0e07',
 			),
    );
	
	
	

 
	// Return the controls.
    return $controls;
}
add_filter( 'tt_font_get_option_parameters', 'progression_studios_add_control_to_tab' );