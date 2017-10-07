<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package pro
 */


/* Add Body Class */
add_filter( 'body_class', 'progression_studios_new_body_classes' );
function progression_studios_new_body_classes( $classes ) {
	$classes[] = 'background-loader-init';
	
	// return the $classes array
	return $classes;
}


function progression_studios_user_the_categories() {
    // get all categories for this post
    $cats = get_the_category();
    // echo the first category
    echo esc_attr( $cats[0]->cat_name );
    // echo the remaining categories, appending separator
    for ($i = 1; $i < count($cats); $i++) {echo ', ' . $cats[$i]->cat_name ;}
}



/* custom portfolio posts per page */
function progression_studios_post_count( $query ) {
	$portfolio_count = get_theme_mod('progression_studios_portfolio_pagiation', "12");
	
	if ($query->is_main_query()){
	
	if(is_tax( 'portfolio-category' )){
      // show 50 posts on custom taxonomy pages
      $query->set('posts_per_page', $portfolio_count);
    }
	
	}
	

	if( is_post_type_archive( 'portfolio' ) && !is_admin() ){
      $query->set('posts_per_page', $portfolio_count);
    }
	 
	
  }
add_action( 'pre_get_posts', 'progression_studios_post_count' );


if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function progression_studios_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'habitat-progression' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'progression_studios_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function progression_studios_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'progression_studios_render_title' );
endif;
