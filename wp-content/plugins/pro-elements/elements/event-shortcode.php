<?php

/**
 * Event Shortcode
 */


// [pro_event heading_pro="" event_description_pro="" etc...]
add_shortcode( 'pro_event', 'pro_event_func' );
function pro_event_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
	  'event_cat_pro' => '',
	  'grid_columns' => '3',
	  'event_posts_pro' => '99',
   ), $atts ) );
   
	$output_pro = '';	
	
	$output_pro .= '<div class="event-container-pro">';
	
	
	$postIds = $event_cat_pro; // get custom field value
    $arrayIds = explode(',', $postIds); // explode value into an array of ids
    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
    {
        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
        {
            $arrayIds = array(); // reset array
            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
        }
    }
	
	
	if ( $event_cat_pro ) {
	   	$carousel_query = new WP_Query(
	   		array(
	   	        'post_type' => 'event',
	   	        'posts_per_page' => $event_posts_pro,
			
				'tax_query' => array(
				        // Note: tax_query expects an array of arrays!
				        array(
				            'taxonomy' => 'event-category', // my guess
				            'field'    => 'slug',
				            'terms'    => $arrayIds
				        )
				 ),
			 
	   		)
	    );
	} else {
	   	$carousel_query = new WP_Query(
	   		array(
	   	        'post_type' => 'event',
	   	        'posts_per_page' => $event_posts_pro,

	   		)
	    );
	}
	
	$count = 1; $count_2 = 1;
	
	ob_start();
	?>
		<div class="event-list-pro">
			<?php 
			$count = 1;
			$col_count_progression = $grid_columns;
			while ($carousel_query->have_posts()) : $carousel_query->the_post();		
			?>
				<div class="event-item-pro grid<?php echo esc_attr($grid_columns) ?>column-progression <?php if ($count == $grid_columns) { echo 'lastcolumn-progression';}; ?>">
					<?php get_template_part( 'template-parts/visual-composer/content', 'event' );	?>
				</div>	
				<?php if ($count == $grid_columns) { echo '<div class="clearfix-pro"></div>'; $count = 0;}; ?>
			<?php  $count ++; endwhile ; ?>
			<div class="clearfix-pro"></div>
			<?php wp_reset_query(); ?>
		</div>
		
   <?php
	
   	return '</div><!-- close .event-container-pro --><div class="clearfix-pro"></div>' . $output_pro. ob_get_clean();
	
}


add_action( 'vc_before_init', 'pro_event_integrateVC' );
function pro_event_integrateVC() {
   vc_map( array(
      "name" => __( "Pro Events", "pro-elements" ),
	  "description" => __( "List your Event items", "pro-elements" ),
      "base" => "pro_event",
	  "weight" => 100,
      "class" => "",
      "category" => __( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(
         array(
            "type" => "textfield",
			"holder" => "div",
			"class" => "",
            "heading" => __( "Narrow Event Categories", "pro-elements" ),
            "param_name" => "event_cat_pro",
            "value" => __( "", "pro-elements" ),
			"description" => __( "Enter Event category slugs to display a specific category. Add-in multiple category slugs separated by a comma to use multiple categories. (Leave blank to pull in all event posts).", "pro-elements" ),
         ),		 
         array(
            "type" => "dropdown",
			"class" => "",
            "heading" => __( "Grid Columns", "pro-elements" ),
            "param_name" => "grid_columns",
			"value"       => array(
			        '1 Column'   	=> '1',
			        '2 Columns'  	=> '2',
			        '3 Columns'		=> '3',
			        '4 Columns'  	=> '4',
					'5 Columns'  	=> '5',
					'6 Columns'  	=> '6',
			),
			"std"         => '3',
         ),		 
	
         array(
            "type" => "textfield",
			"holder" => "div",
			"class" => "",
            "heading" => __( "Number of Event Posts", "pro-elements" ),
            "param_name" => "event_posts_pro",
			"value" => __( "", "pro-elements" ),
			"description" => __( "Enter the number of event posts you wish to display on the page.", "pro-elements" ),
         ),
      )
   ) );
}