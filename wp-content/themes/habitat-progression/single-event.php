<?php
/**
 * The template for displaying all single events.
 *
 * Override this template by copying it to yourtheme/single-event.php
 *
 * @author 	Digital Factory
 * @package Events Maker/Templates
 * @since 	1.1.0
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // exit if accessed directly

get_header( 'events' );
?>

	<?php if(!get_post_meta($post->ID, 'progression_studios_disable_page_title', true)): ?>
	<div id="page-title-pro">
		<div class="width-container-pro">
			    <div class="clearfix-pro"></div>
			<div id="progression-studios-page-title-container">
				<?php the_title( '<h1 class="entry-title-pro">', '</h1>' ); ?>
				<?php if(get_post_meta($post->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo esc_html(get_post_meta($post->ID, 'progression_studios_sub_title', true)); ?></h4><?php endif; ?>
			</div><!-- close #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	<?php endif; ?>

	<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below' ) : ?></div><!-- close #header-container-logo-progression --><?php endif; ?>
	
	</div><!-- close #progression-studios-header-position -->

	<div id="content-pro">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php em_get_template_part( 'template-parts/content', 'single-event' ); ?>

			<?php endwhile; ?>

	</div><!-- #content-pro -->

<?php get_footer( 'events' ); ?>