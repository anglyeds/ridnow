<?php
/**
 * The template for displaying event content in the single-event.php template
 *
 * Override this template by copying it to yourtheme/content-single-event.php
 *
 * @author 	Digital Factory
 * @package Events Maker/Templates
 * @since 	1.1.0
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
	
// Extra event classes
$classes = apply_filters( 'em_single_event_classes', array( 'hcalendar' ) );
?>						

			<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
				<div class="width-container-pro">
                    <div class="grid2column-progression">
                        <?php do_action( 'em_before_single_event' ); ?>
                    </div>    


                    <div class="grid2column-progression lastcolumn-progression event-content-pro">
                        <div class="event-container-pro">
                            <div class="event-meta-spacer-pro">
                                <?php  em_display_single_event_meta(); ?>
                                <?php em_display_event_locations(); ?>
                                <?php em_display_event_organizers(); ?>
                                <?php em_display_event_tickets(); ?>
                            </div>
                            <div class="event-divider-pro"></div>

                            <?php
                            /**
                             * em_single_event_content hook
                             * 
                             * @hooked em_display_event_content - 10
                             */
                            do_action( 'em_single_event_content' );
                            ?>



                            <?php do_action( 'em_before_single_event_title' ); ?>
                            <?php do_action( 'em_after_single_event' ); ?>                    

                        </div>                    
                    </div>
                    <div class="clearfix-pro"></div>    
                
                </div>
                
                <?php em_display_google_map(); ?>

				
			</article>