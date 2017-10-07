<?php

/**
 * Map Location Shortcode
 */



// [pro_google_maps location_columns_pro="" etc...]
add_shortcode( 'pro_google_maps', 'pro_google_maps_func' );
function pro_google_maps_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
	   'map_address_pro' => '1600 Holloway Ave, San Francisco, CA 94132',
	   'map_height_pro' => '500px',
	   'map_zoom_pro' => '12',
	   'map_pin_heading_pro' => '',
	   'map_pin_text_pro' => '',
	   'map_type_pro' => 'ROADMAP',
	   'map_image_pro' => '',
	   'map_pin_open_close' => '',
	   'map_center_address_pro' => '',
		
		'second_map_address_pro' => '',
		'second_map_pin_heading_pro' => '',
		'second_map_pin_text_pro' => '',
		'second_map_image_pro' => '',
		'second_map_pin_open_close' => '',
		
		'third_map_address_pro' => '',
		'third_map_pin_heading_pro' => '',
		'third_map_pin_text_pro' => '',
		'third_map_image_pro' => '',
		'third_map_pin_open_close' => '',
		
		'fourth_map_address_pro' => '',
		'fourth_map_pin_heading_pro' => '',
		'fourth_map_pin_text_pro' => '',
		'fourth_map_image_pro' => '',
		'fourth_map_pin_open_close' => '',
		
		'fifth_map_address_pro' => '',
		'fifth_map_pin_heading_pro' => '',
		'fifth_map_pin_text_pro' => '',
		'fifth_map_image_pro' => '',
		'fifth_map_pin_open_close' => '',
		
   ), $atts ) );
   
	wp_enqueue_script( 'google_maps_pro' );
		wp_enqueue_script( 'gomap_pro' );
		
	$output_pro = '';
	
	STATIC $idpro = 0;
	$idpro++;
	
	ob_start();
	?>
		
		<div id="pro-google-container-pro-<?php echo esc_attr($idpro) ?>">
			<div id="pro-google-map-listing-<?php echo esc_attr($idpro) ?>" style="height:<?php echo esc_attr( $map_height_pro ) ?>"></div>
		</div>
		
		<script type="text/javascript"> 
		jQuery(document).ready(function($) {
			'use strict';
			
		    $("#pro-google-map-listing-<?php echo esc_attr($idpro) ?>").goMap({ 
				 <?php if($map_center_address_pro): ?>address: '<?php echo esc_attr( $map_center_address_pro ) ?>',<?php endif; ?>
		        markers: [
					{address: '<?php echo esc_attr( $map_address_pro ) ?>',  
					<?php if($map_image_pro): ?>
					<?php $image = wp_get_attachment_image_src($map_image_pro, 'large'); ?>
					icon: '<?php echo esc_attr($image[0]);?>',<?php endif; ?><?php if($map_pin_heading_pro): ?>html: {content: "<div class='google-maps-pin'><h6><?php echo esc_attr( $map_pin_heading_pro ) ?></h6><div class='google-maps-pin-text'><?php echo esc_attr( $map_pin_text_pro ) ?></div></div>", popup:<?php if($map_pin_open_close): ?>true<?php else: ?>false<?php endif; ?> }<?php endif; ?>}
					<?php if($second_map_address_pro): ?>,{address: '<?php echo esc_attr( $second_map_address_pro ) ?>',  
					<?php if($second_map_image_pro): ?>
					<?php $image = wp_get_attachment_image_src($second_map_image_pro, 'large'); ?>
					icon: '<?php echo esc_attr($image[0]);?>',<?php endif; ?><?php if($second_map_pin_heading_pro): ?>html: {content: "<div class='google-maps-pin'><h6><?php echo esc_attr( $second_map_pin_heading_pro ) ?></h6><div class='google-maps-pin-text'><?php echo esc_attr( $second_map_pin_text_pro ) ?></div></div>", popup:<?php if($second_map_pin_open_close): ?>true<?php else: ?>false<?php endif; ?> }<?php endif; ?>}<?php endif; ?>
					<?php if($third_map_address_pro): ?>,{address: '<?php echo esc_attr( $third_map_address_pro ) ?>',  
					<?php if($third_map_image_pro): ?>
					<?php $image = wp_get_attachment_image_src($third_map_image_pro, 'large'); ?>
					icon: '<?php echo esc_attr($image[0]);?>',<?php endif; ?><?php if($third_map_pin_heading_pro): ?>html: {content: "<div class='google-maps-pin'><h6><?php echo esc_attr( $third_map_pin_heading_pro ) ?></h6><div class='google-maps-pin-text'><?php echo esc_attr( $third_map_pin_text_pro ) ?></div></div>", popup:<?php if($third_map_pin_open_close): ?>true<?php else: ?>false<?php endif; ?> }<?php endif; ?>}<?php endif; ?>
					<?php if($fourth_map_address_pro): ?>,{address: '<?php echo esc_attr( $fourth_map_address_pro ) ?>',  
					<?php if($fourth_map_image_pro): ?>
					<?php $image = wp_get_attachment_image_src($fourth_map_image_pro, 'large'); ?>
					icon: '<?php echo esc_attr($image[0]);?>',<?php endif; ?><?php if($fourth_map_pin_heading_pro): ?>html: {content: "<div class='google-maps-pin'><h6><?php echo esc_attr( $fourth_map_pin_heading_pro ) ?></h6><div class='google-maps-pin-text'><?php echo esc_attr( $fourth_map_pin_text_pro ) ?></div></div>", popup:<?php if($fourth_map_pin_open_close): ?>true<?php else: ?>false<?php endif; ?> }<?php endif; ?>}<?php endif; ?>
					<?php if($fifth_map_address_pro): ?>,{address: '<?php echo esc_attr( $fifth_map_address_pro ) ?>',  
					<?php if($fifth_map_image_pro): ?>
					<?php $image = wp_get_attachment_image_src($fifth_map_image_pro, 'large'); ?>
					icon: '<?php echo esc_attr($image[0]);?>',<?php endif; ?><?php if($fifth_map_pin_heading_pro): ?>html: {content: "<div class='google-maps-pin'><h6><?php echo esc_attr( $fifth_map_pin_heading_pro ) ?></h6><div class='google-maps-pin-text'><?php echo esc_attr( $fifth_map_pin_text_pro ) ?></div></div>", popup:<?php if($fifth_map_pin_open_close): ?>true<?php else: ?>false<?php endif; ?> }<?php endif; ?>}<?php endif; ?>
				],
				scrollwheel: false, 
				disableDoubleClickZoom: true,
				zoom: <?php echo esc_attr( $map_zoom_pro ) ?>,
				maptype: '<?php echo esc_attr( $map_type_pro ) ?>' 
		    }); 

		});
		</script>

    <?php
	
   	return $output_pro. ob_get_clean();
	
}


add_action( 'vc_before_init', 'pro_google_maps_integrateVC' );
function pro_google_maps_integrateVC() {
   vc_map( array(
      "name" => esc_html__( "Pro Map", "pro-elements" ),
	  "description" => esc_html__( "Google Maps Location", "pro-elements" ),
      "base" => "pro_google_maps",
	  "weight" => 100,
      "class" => "",
      "category" => esc_html__( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(
         
			
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Map Address", "pro-elements" ),
             "param_name" => "map_address_pro",
             "value" => esc_html__( "1600 Holloway Ave, San Francisco, CA 94132", "pro-elements" ),
          ),
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Map Pin Heading", "pro-elements" ),
             "param_name" => "map_pin_heading_pro",
             "value" => "",
          ),
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Map Pin Text", "pro-elements" ),
             "param_name" => "map_pin_text_pro",
             "value" => "",
          ),
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Map Height", "pro-elements" ),
             "param_name" => "map_height_pro",
             "value" => esc_html__( "500px", "pro-elements" ),
          ),
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Map Zoom", "pro-elements" ),
             "param_name" => "map_zoom_pro",
             "value" => esc_html__( "12", "pro-elements" ),
          ),
          array(
            "type" => "attach_image",
 			"class" => "",
             "heading" => esc_html__( "Custom Map Pin", "pro-elements" ),
             "param_name" => "map_image_pro",
             "value" => "",
          ),
          array(
            "type" => "checkbox",
 			"class" => "",
             "heading" => esc_html__( "Open Map Marker Automatically", "pro-elements" ),
             "param_name" => "map_pin_open_close",
             "value" => "",
          ),
   
          array(
             "type" => "dropdown",
 			"class" => "",
             "heading" => esc_html__( "Map Type", "pro-elements" ),
             "param_name" => "map_type_pro",
 			"value"       => array(
 			        'Road Map'   => 'ROADMAP',
 			        'Hybrid Map'   => 'HYBRID',
 			        'Satellite Map'	  => 'SATELLITE',
 			        'Terrain Map'   => 'TERRAIN',
 			),
 			"std"         => 'ROADMAP',
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Optional - Over-ride Map Center Address", "pro-elements" ),
             "description" => esc_html__( "Only works when map markers are closed by default.", "pro-elements" ),
			 
             "param_name" => "map_center_address_pro",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Second Map Address", "pro-elements" ),
             "param_name" => "second_map_address_pro",
             "value" => "",
				 'group' => esc_html__( 'Second Pin', 'pro-elements' )
          ),
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Second Map Pin Heading", "pro-elements" ),
             "param_name" => "second_map_pin_heading_pro",
             "value" => "",
				 'group' => esc_html__( 'Second Pin', 'pro-elements' )
          ),
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Second Map Pin Text", "pro-elements" ),
             "param_name" => "second_map_pin_text_pro",
             "value" => "",
				 'group' => esc_html__( 'Second Pin', 'pro-elements' )
          ),
           array(
             "type" => "attach_image",
  			"class" => "",
              "heading" => esc_html__( "Second Custom Map Pin", "pro-elements" ),
              "param_name" => "second_map_image_pro",
              "value" => "",
				  'group' => esc_html__( 'Second Pin', 'pro-elements' )
           ),
           array(
             "type" => "checkbox",
  			"class" => "",
              "heading" => esc_html__( "Second Open Map Marker Automatically", "pro-elements" ),
              "param_name" => "second_map_pin_open_close",
              "value" => "",
				  'group' => esc_html__( 'Second Pin', 'pro-elements' )
           ),
			 
			 
          array(
             "type" => "textfield",
 			"holder" => "div",
  			"class" => "",
              "heading" => esc_html__( "Third Map Address", "pro-elements" ),
              "param_name" => "third_map_address_pro",
              "value" => "",
 				 'group' => __( 'Third Pin', 'pro-elements' )
           ),
           array(
             "type" => "textfield",
 			"holder" => "div",
  			"class" => "",
              "heading" => esc_html__( "Third Map Pin Heading", "pro-elements" ),
              "param_name" => "third_map_pin_heading_pro",
              "value" => "",
 				 'group' => esc_html__( 'Third Pin', 'pro-elements' )
           ),
           array(
             "type" => "textfield",
 			"holder" => "div",
  			"class" => "",
              "heading" => esc_html__( "Third Map Pin Text", "pro-elements" ),
              "param_name" => "third_map_pin_text_pro",
              "value" => "",
 				 'group' => esc_html__( 'Third Pin', 'pro-elements' )
           ),
            array(
              "type" => "attach_image",
   			"class" => "",
               "heading" => esc_html__( "Third Custom Map Pin", "pro-elements" ),
               "param_name" => "third_map_image_pro",
               "value" => "",
 				  'group' => esc_html__( 'Third Pin', 'pro-elements' )
            ),
            array(
              "type" => "checkbox",
   			"class" => "",
               "heading" => esc_html__( "Third Open Map Marker Automatically", "pro-elements" ),
               "param_name" => "third_map_pin_open_close",
               "value" => "",
 				  'group' => esc_html__( 'Third Pin', 'pro-elements' )
            ),
			 
			 
            array(
               "type" => "textfield",
   			"holder" => "div",
    			"class" => "",
                "heading" => esc_html__( "Fourth Map Address", "pro-elements" ),
                "param_name" => "fourth_map_address_pro",
                "value" => "",
   				 'group' => esc_html__( 'Fourth Pin', 'pro-elements' )
             ),
             array(
               "type" => "textfield",
   			"holder" => "div",
    			"class" => "",
                "heading" => esc_html__( "Fourth Map Pin Heading", "pro-elements" ),
                "param_name" => "fourth_map_pin_heading_pro",
                "value" => "",
   				 'group' => esc_html__( 'Fourth Pin', 'pro-elements' )
             ),
             array(
               "type" => "textfield",
   			"holder" => "div",
    			"class" => "",
                "heading" => esc_html__( "Fourth Map Pin Text", "pro-elements" ),
                "param_name" => "fourth_map_pin_text_pro",
                "value" => "",
   				 'group' => esc_html__( 'Fourth Pin', 'pro-elements' )
             ),
              array(
                "type" => "attach_image",
     			"class" => "",
                 "heading" => esc_html__( "Fourth Custom Map Pin", "pro-elements" ),
                 "param_name" => "fourth_map_image_pro",
                 "value" => "",
   				  'group' => esc_html__( 'Fourth Pin', 'pro-elements' )
              ),
              array(
                "type" => "checkbox",
     			"class" => "",
                 "heading" => esc_html__( "Fourth Open Map Marker Automatically", "pro-elements" ),
                 "param_name" => "fourth_map_pin_open_close",
                 "value" => "",
   				  'group' => esc_html__( 'Fourth Pin', 'pro-elements' )
              ),
				  
              array(
                 "type" => "textfield",
     			"holder" => "div",
      			"class" => "",
                  "heading" => esc_html__( "Fifth Map Address", "pro-elements" ),
                  "param_name" => "fifth_map_address_pro",
                  "value" => "",
     				 'group' => esc_html__( 'Fifth Pin', 'pro-elements' )
               ),
               array(
                 "type" => "textfield",
     			"holder" => "div",
      			"class" => "",
                  "heading" => esc_html__( "Fifth Map Pin Heading", "pro-elements" ),
                  "param_name" => "fifth_map_pin_heading_pro",
                  "value" => "",
     				 'group' => esc_html__( 'Fifth Pin', 'pro-elements' )
               ),
               array(
                 "type" => "textfield",
     			"holder" => "div",
      			"class" => "",
                  "heading" => esc_html__( "Fifth Map Pin Text", "pro-elements" ),
                  "param_name" => "fifth_map_pin_text_pro",
                  "value" => "",
     				 'group' => esc_html__( 'Fifth Pin', 'pro-elements' )
               ),
                array(
                  "type" => "attach_image",
       			"class" => "",
                   "heading" => esc_html__( "Fifth Custom Map Pin", "pro-elements" ),
                   "param_name" => "fifth_map_image_pro",
                   "value" => "",
     				  'group' => esc_html__( 'Fifth Pin', 'pro-elements' )
                ),
                array(
                  "type" => "checkbox",
       			"class" => "",
                   "heading" => esc_html__( "Fifth Open Map Marker Automatically", "pro-elements" ),
                   "param_name" => "fifth_map_pin_open_close",
                   "value" => "",
     				  'group' => esc_html__( 'Fifth Pin', 'pro-elements' )
                ),
			 
      )
   ) );
}