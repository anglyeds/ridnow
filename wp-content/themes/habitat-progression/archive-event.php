<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pro
 */

get_header(); ?>

	<div id="page-title-pro">
		<div class="width-container-pro">
			    <div class="clearfix-pro"></div>
			<div id="progression-studios-page-title-container">
				<h1 class="entry-title-pro"><?php esc_html_e( 'Events', 'habitat-progression' ); ?></h1>
				<?php the_archive_description( '<h4 class="progression-single-excerpt">', '</h4>' ); ?>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	
	<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below' ) : ?></div><!-- close #header-container-logo-progression --><?php endif; ?>
	
	</div><!-- close #progression-studios-header-position -->	
	
	
	<div id="content-pro" class="site-content">	
		<div class="width-container-pro">
				<?php if ( have_posts() ) : ?>
					
					<?php
					/* Start the Loop */
					$count = 1;
					$count_2 = 1;
					?>
					<?php while ( have_posts() ) : the_post();
						$col_count_progression = get_theme_mod('events_columns_pro', '3');
						if($count >= 1+$col_count_progression) { $count = 1; }
						 ?>
						 <div class="grid<?php echo esc_attr(get_theme_mod('events_columns_pro', '3')); ?>column-progression <?php if($count == get_theme_mod('events_columns_pro', '3')): echo ' lastcolumn-progression'; endif; ?>">
							 <?php get_template_part( 'template-parts/visual-composer/content', 'event' ); ?>
						</div>
						<?php if($count == get_theme_mod('events_columns_pro', '3')): ?><div class="clearfix-pro"></div><?php endif; ?>
						<?php $count ++; $count_2++; endwhile; ?>
					<div class="clearfix-pro"></div>
					<?php progression_studios_show_pagination_links_pro(); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
				
		
			
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>