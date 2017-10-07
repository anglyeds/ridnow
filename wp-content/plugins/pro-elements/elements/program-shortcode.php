<?php

/**
 * Program Shortcode
 */


// [progression_program heading_pro="" program_description_pro="" etc...]
add_shortcode( 'progression_program', 'progression_program_func' );
function progression_program_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
		
	  'progression_studios_program_columns' => '2',
	  'program_post_count' => '12',
	  'program_pagination' => 'pagination_off',
	  'program_filter_categories' => '',
	  'program_heading_size' => '',
	  'program_subheadline_size' => '',
	  'program_description_size' => '',
	  'program_heading_color' => '',
	  'program_subheadline_color' => '',
	  'program_description_color' => '',
	  'program_description_hidden' => '',
	  
	  'program_text_bg_color' => '',
	  'button_bg_color' => '',
	  'button_text_color' => '',
	  
	  'program_sorting_pro' => '',
	  'program_filter_text' => 'All',
	  'program_padding' => '0',
	  
	  'program_filter_text_color' => '',
	  'program_filter_size' => '',
		 
   ), $atts ) );
   
    $output_pro = '';
	
	
	STATIC $idpro = 0;
	$idpro++;
	
	ob_start();
	?>
	

	
	<?php
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	
	global $blogloop;
	global $post;
	
	$postIds = $program_filter_categories; // get custom field value
    $arrayIds = explode(',', $postIds); // explode value into an array of ids
    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
    {
        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
        {
            $arrayIds = array(); // reset array
            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
        }
	 }

	 
	 if ( $program_filter_categories ) {
		 
	 	$blogloop = new WP_Query(
	 		array(
	 	        'post_type' => 'program',
	 			  'paged' => $paged,
	 	        'posts_per_page' => $program_post_count,
  				'tax_query' => array(
  				        // Note: tax_query expects an array of arrays!
  				        array(
  				            'taxonomy' => 'program-category', // 
  				            'field'    => 'slug',
  				            'terms'    => $arrayIds,
  				        )
  				 ),
	 		)
	  	);
		 
	}
	else {
			 
		 	$blogloop = new WP_Query(
		 		array(
		 	        'post_type' => 'program',
		 			  'paged' => $paged,
		 	        'posts_per_page' => $program_post_count,
		 		)
		  	);
			 
		 	
	}
	
	?>
	
	
	
	
		<?php if($program_sorting_pro == 'true' ): ?>
		<ul class="filter-button-group port-filter-group-<?php echo esc_attr($idpro) ?> noselect" style="<?php if($program_filter_text_color) : ?>color:<?php echo esc_attr($program_filter_text_color) ?>;<?php endif; ?><?php if($program_text_bg_color) : ?>font-size:<?php echo esc_attr($program_filter_size) ?>;<?php endif; ?>">
			<?php if($program_filter_categories): ?>
			
				<?php
					$i = 0;

					$args = array(
					    'hide_empty'             => '0',
					    'slug'              => $arrayIds,
					); 
				
					$terms = get_terms( 'program-category', $args );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="is-checked" data-filter="*">' . $program_filter_text .'</li> ';	
				
						foreach ( $terms as $term ) { 
						if ($i == 0) {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						} else if ($i > 0)  {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						}
						$i++;
						}
					}	
				?>
			<?php else: ?>
				<?php
					$i = 0;
					$terms = get_terms( 'program-category', 'hide_empty=0' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="is-checked" data-filter="*">' . $program_filter_text .'</li> ';	
				
						foreach ( $terms as $term ) { 
						if ($i == 0) {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						} else if ($i > 0)  {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						}
						$i++;
						}
					}	
				?>
			<?php endif ?>		
		</ul>
		<div class="clearfix-pro"></div>
		<?php endif ?>
		
		<div class="progression-masonry-margins progression-studios-program-vc">
		<div class="progression-program-masonry<?php echo esc_attr($idpro) ?>" style="margin-top:-<?php echo esc_attr($program_padding) ?>px; margin-right:-<?php echo esc_attr($program_padding)  ?>px; margin-left:-<?php echo esc_attr($program_padding)?>px;">
				
				
				<?php  $col_count_progression = $progression_studios_program_columns; $count=1; $row=0;
					while($blogloop->have_posts()): $blogloop->the_post(); 
					if($count >= $progression_studios_program_columns+1) { $count = 1; }
					if($row >= 2) { $row = 0; }
				?>	
					<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr($progression_studios_program_columns) ?> <?php  $terms = get_the_terms( $post->ID , 'program-category' );  if ( !empty( $terms ) ) : 	foreach ( $terms as $term ) { 	$term_link = get_term_link( $term, 'program-category' ); if( is_wp_error( $term_link ) ) continue; echo " ". $term->slug ; } endif; echo ' row-count-pro-'.$row;?>">
						<div class="progression-masonry-inline-padding" style="padding:<?php echo esc_attr($program_padding) ?>px;">
							<?php include(locate_template('template-parts/visual-composer/content-program.php')); ?>
						</div>
					</div>
				<?php  $count++; if($count >= $progression_studios_program_columns+1){ $row++; }
				endwhile; // end of the loop. ?>

			<div class="clearfix-pro"></div>
			
		</div><!-- close .progression-program-masonry-->
		
		</div><!-- close .progression-masonry-margins -->
			<script type="text/javascript">
			jQuery(document).ready(function($) {
				'use strict';
		
				/* Default Isotope Load Code */
				var $container = $('.progression-program-masonry<?php echo esc_attr($idpro) ?>').isotope();
				$container.imagesLoaded( function() {
					$(".progression-masonry-item").addClass('opacity-progression');
					$container.isotope({
						itemSelector: '.progression-masonry-item',
						transitionDuration: '0.4s',

						masonry: {
						    columnWidth: '.progression-masonry-col-<?php echo esc_attr($progression_studios_program_columns) ?>',
						},hiddenStyle: {
							opacity: 0
						},
						visibleStyle: {
							opacity: 1
						}
			 		});
				});
				/* END Default Isotope Code */
		
		
				<?php if($program_sorting_pro == 'true' ): ?>
				$('.port-filter-group-<?php echo esc_attr($idpro) ?>').on( 'click', 'li', function() {
				  var filterValue = $(this).attr('data-filter');
				  $container.isotope({ filter: filterValue });
				});
		
		    	  $('.port-filter-group-<?php echo esc_attr($idpro) ?>').each( function( i, buttonGroup ) {
		    		var $buttonGroup = $( buttonGroup );
		    		$buttonGroup.on( 'click', 'li', function() {
		    		  $buttonGroup.find('.is-checked').removeClass('is-checked');
		    		  $( this ).addClass('is-checked');
		    		});
		    	  });
				<?php endif ?>
		
				<?php if($program_pagination == 'load_more' || $program_pagination == 'infinite_pro' ): ?>
				/* Begin Infinite Scroll */
				$container.infinitescroll({
					errorCallback: function(){  $('#infinite-nav-pro').delay(500).fadeOut(500, function(){ $(this).remove(); }); },
				  navSelector  : '#infinite-nav-pro',    // selector for the paged navigation 
				  nextSelector : '.nav-previous a',  // selector for the NEXT link (to page 2)
				  itemSelector : '.progression-masonry-item',     // selector for all items you'll retrieve
			   		loading: {
			   		 	img: '<?php echo esc_url( get_template_directory_uri() );?>/images/loader-dark.gif',
			   			 msgText: "",
			   		 	finishedMsg: "<div id='no-more-posts'><?php esc_html_e( "No more posts", "invested-progression" ); ?></div>",
			   		 	speed: 0, }
				  },
				  // trigger Isotope as a callback
				  function( newElements ) {

				    var $newElems = $( newElements );

				   	$(".progression-program-item-image [data-rel^='prettyPhoto']").prettyPhoto({
				 				theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
				   			hook: 'data-rel',
				 				opacity: 0.7,
				   			show_title: false, /* true/false */
				   			deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
				   			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
				   			custom_markup: '',
				 				default_width: 900,
				 				default_height: 506,
				   			social_tools: '' /* html or false to disable */
				   	});
	

			
						$newElems.imagesLoaded(function(){
							$(".progression-masonry-item").addClass('opacity-progression');
						    $container.isotope( 'appended', $newElems );

					});

				  }
				);
			    /* END Infinite Scroll */
				<?php endif; ?>
		
		
				<?php if($program_pagination == 'load_more'): ?>
				/* PAUSE FOR LAOD MORE */
				$(window).unbind('.infscr');
				// Resume Infinite Scroll
				$('.nav-previous a').click(function(){
					$container.infinitescroll('retrieve');
					return false;
				});
				/* End Infinite Scroll */
				<?php endif; ?>
		
			});
			</script>
			<div class="clearfix-pro"></div>
			
			
			<?php if($program_pagination == 'default'): ?>
				<?php progression_studios_show_pagination_links_blog(); ?>
			<?php endif ?>
	
	
			<?php if($program_pagination == 'load_more'): ?>
				<?php if ( $blogloop->max_num_pages > 1 ) : ?>
					<div id="progression-load-more-manual"><div id="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( __( 'Load More', 'pro-elements' ), $blogloop->max_num_pages ); ?></div></div></div>
				<?php endif ?>
			<?php endif ?>
	
	
			<?php if($program_pagination == 'infinite_pro'): ?>
				<?php if ( $blogloop->max_num_pages > 1 ) : ?><div id="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( __( 'Load More', 'pro-elements' ), $blogloop->max_num_pages ); ?></div></div><?php endif ?>
			<?php endif ?>
	
	
			<?php wp_reset_query(); ?>
			


	<?php wp_reset_postdata();?>
		
	<?php
	
	return $output_pro. ob_get_clean();

}


add_action( 'vc_before_init', 'progression_program_integrateVC' );
function progression_program_integrateVC() {
   vc_map( array(
      "name" => __( "Pro Programs", "pro-elements" ),
	  "description" => __( "Programs post list", "pro-elements" ),
      "base" => "progression_program",
	  "weight" => 100,
      "class" => "",
      "category" => __( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Program Columns", "pro-elements" ),
            "param_name" => "progression_studios_program_columns",
				"value"       => array(
					'1 Column'   	=> '1',
					'2 Columns'  	=> '2',
			),
			"std"         => '2',
         ),
			
         array(
            "type" => "dropdown",
			"class" => "",
            "heading" => __( "Program Column Padding", "pro-elements" ),
            "param_name" => "program_padding",
			"value"       => array(
						'0px'				=> '0',
						'1px'				=> '1',
						'2px'				=> '2',
						'3px'				=> '3',
						'4px'				=> '4',
						'5px'				=> '5',
						'6px'				=> '6',
						'7px'				=> '7',
						'8px'				=> '8',
						'9px'				=> '9',
						'10px'				=> '10',
						'11px'				=> '11',
						'12px'				=> '12',
						'13px'				=> '13',
						'14px'				=> '14',
						'15px'				=> '15',
						'20px'				=> '20',
						'25px'				=> '25',
						'30px'				=> '30',
						'35px'				=> '35',
						'40px'				=> '40',
						'50px'				=> '50',
						'60px'				=> '60',
			     	 	'70px'				=> '70',
						'80px'				=> '80',
						'90px'				=> '90',
						'100px'				=> '100',
			),
			"std" => "0",
         ),
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Program Post Count", "pro-elements" ),
            "param_name" => "program_post_count",
				"std"         => '12',
         ),

			
			
         array(
            "type" => "dropdown",
			"class" => "",
            "heading" => __( "Program Pagination", "pro-elements" ),
            "param_name" => "program_pagination",
			"value"       => array(
						__( "No Pagination", "pro-elements" )				=> 'pagination_off',
			        __( "Default Pagination", "pro-elements" )   	=> 'default',
			        __( "Load More Posts", "pro-elements" )  	=> 'load_more',
					  __( "Infinite Scroll", "pro-elements" )  	=> 'infinite_pro'
			),
			"std" => "pagination_off",
         ),
			
			
         
			
			
			

			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Narrow by Categories", "pro-elements" ),
				"description" => __( "Enter category slugs to display a specific category. Add-in multiple category slugs seperated by a comma to use multiple categories. (Leave blank to pull in all categories).", "pro-elements" ),
            "param_name" => "program_filter_categories",
				"std"         => '',
         ),
		 
		 
         array(
            "type" => "checkbox",
			"class" => "",
            "heading" => __( "Display Program Sorting?", "pro-elements" ),
            "param_name" => "program_sorting_pro",
			"std"         => 'false',
         ),
			
         array(
            "type" => "textfield",
			"class" => "",
            "heading" => __( "Category Filter Text for All Posts", "qube-elements" ),
            "param_name" => "program_filter_text",
			"std"         => 'All',
			'dependency' => array(
				'element' => 'program_sorting_pro',
				'not_empty' => true,
			),
         ),
			
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Hide text description", "pro-elements" ),
            "param_name" => "program_description_hidden",
				"std"         => '',
         ),
			
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Text Background Color", "pro-elements" ),
            "param_name" => "program_text_bg_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
		 	 		
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Filter Font Size", "pro-elements" ),
            "param_name" => "program_filter_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Filter Text Color", "pro-elements" ),
            "param_name" => "program_filter_text_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Heading Font Size", "pro-elements" ),
            "param_name" => "program_heading_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Heading Font Color", "pro-elements" ),
            "param_name" => "program_heading_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Subheadline Font Size", "pro-elements" ),
            "param_name" => "program_subheadline_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Subheadline Font Color", "pro-elements" ),
            "param_name" => "program_subheadline_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Description Font Size", "pro-elements" ),
            "param_name" => "program_description_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Description Font Color", "pro-elements" ),
            "param_name" => "program_description_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
		 
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Button Background Color", "pro-elements" ),
            "param_name" => "button_bg_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),	
		 
		 
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Button Text Color", "pro-elements" ),
            "param_name" => "button_text_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),			 

			
      )
   ) );
}