<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package pro
 */

get_header(); ?>

	
	<div id="page-title-pro">
		<div class="width-container-pro">
			    <div class="clearfix-pro"></div>
			<div id="progression-studios-page-title-container">
				<h1 class="entry-title-pro"><?php esc_html_e( 'Page Not Found', 'habitat-progression' ); ?></h1>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	
	<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below' ) : ?></div><!-- close #header-container-logo-progression --><?php endif; ?>
	
	</div><!-- close #progression-studios-header-position -->
	
	<div id="content-pro">
		<div class="width-container-pro">
			
			<div id="error-page-index">
				
				<h1><?php esc_html_e( '404', 'habitat-progression' ); ?></h1>
				
				<h6><?php esc_html_e( 'PAGE NOT FOUND', 'habitat-progression' ); ?></h6>
				
				<h3><?php esc_html_e( 'NOTHING TO SEE HERE!', 'habitat-progression' ); ?></h3>
			
				<p><?php esc_html_e( 'The page are looking for has been moved or does not exist anymore.  Maybe try one of the links in the navigation or a search.', 'habitat-progression' ); ?></p>
				
				<?php get_search_form(); ?>
				
			</div><!-- close #error-page-index -->
			
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
	
<?php get_footer(); ?>