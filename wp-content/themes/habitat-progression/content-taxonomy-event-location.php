<?php
/**
 * The template for displaying event location content within loops.
 *
 * Override this template by copying it to yourtheme/content-taxonomy-event-location.php
 *
 * @author 	Digital Factory
 * @package Events Maker/Templates
 * @since 	1.6.0
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // exit if accessed directly;

global $progression_studios_location;

// extra event classes
$classes = apply_filters( 'em_loop_event_location_classes', array( 'h-adr', 'term', 'term-' . esc_attr( $progression_studios_location->taxonomy ), 'term-' . absint( $progression_studios_location->term_id ), 'term-' . esc_attr( $progression_studios_location->slug ) ) );
?>

<article id="term-<?php echo absint( $progression_studios_location->term_id ); ?>" class="<?php echo implode( ' ', $classes ); ?>">

	<?php
	/**
	 * em_before_loop_event_location hook
	 */
	do_action( 'em_before_loop_event_location' );
	?>

	<header class="entry-header location-divider-pro">

		<?php
		/**
		 * em_before_loop_event_location_title hook
		 */
		do_action( 'em_before_loop_event_location_title' );
		?>

		<h3 class="entry-title summary">

			<a href="<?php echo get_term_link( absint( $progression_studios_location->term_id ), esc_attr( $progression_studios_location->taxonomy ) ); ?>" class="url" title="<?php echo esc_html( $progression_studios_location->name ); ?>"><?php echo esc_html( $progression_studios_location->name ); ?></a>

		</h3>

		<?php
		/**
		 * em_after_loop_event_title hook
		 * 
		 * @hooked em_display_location_details - 10
		 */
		do_action( 'em_after_loop_event_location_title' );
		?>

	</header>

	<div class="entry-content description">

		<?php echo apply_filters( 'em_loop_event_location_excerpt', wp_trim_words( strip_shortcodes( wp_kses_post( $progression_studios_location->description ) ) ) ); ?>

	</div>

	<?php
	/**
	 * em_after_loop_event_location hook
	 */
	do_action( 'em_after_loop_event_location' );
	?>

</article>