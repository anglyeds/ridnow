<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pro
 */

get_header(); ?>


	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
		
		<?php if(!get_post_meta($cover_page->ID, 'progression_studios_disable_page_title', true)): ?>
		<div id="page-title-pro">
			<div class="width-container-pro">
			    <div class="clearfix-pro"></div>
				<div id="progression-studios-page-title-container">
					<h1 class="entry-title-pro"><?php echo get_the_title($cover_page); ?></h1>
					<?php if(get_post_meta($cover_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo esc_html( get_post_meta($cover_page->ID, 'progression_studios_sub_title', true) );?></h4><?php endif; ?>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
		<?php endif; ?>
		
	<?php else: ?>
		<div id="page-title-pro">
			<div class="width-container-pro">
			    <div class="clearfix-pro"></div>
				<div id="progression-studios-page-title-container">
					<h1 class="entry-title-pro"><?php esc_html_e( 'Latest News', 'habitat-progression' ); ?></h1>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
	<?php endif; ?>
	
	<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below' ) : ?></div><!-- close #header-container-logo-progression --><?php endif; ?>
	
	</div><!-- close #progression-studios-header-position -->
	
	
	<div id="content-pro" class="site-content">
		<div class="width-container-pro<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">
				
				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?><?php endif; ?>
				

				<?php if ( have_posts() ) : ?>
					
					<div class="progression-studios-blog-index">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						<?php endwhile; ?>
					</div><!-- close .progression-masonry-margins -->

					<?php progression_studios_show_pagination_links_pro(); ?>
					
					<div class="clearfix-pro"></div>
					
				<?php else : ?>
					
					<div class="progression-studios-blog-index">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div><!-- close .progression-masonry-margins -->
					
				<?php endif; ?>
			
				
				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?><?php endif; ?>
				
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>