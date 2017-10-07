<?php
/**
 * @package pro
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="event-post-container-pro">
		
			<?php if(has_post_thumbnail()): ?>
				<div class="featured-event-pro"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('habitat-progression-events'); ?></a></div>
			<?php endif; ?>
			
			
			<div class="excerpt-text-pro">
				<h3 class="event-title-pro"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			
				<?php em_display_loop_event_meta(); ?>
			
				<?php if($post->post_excerpt) { echo "<div class='event-excerpt'>"; the_excerpt();  echo "</div>";} ?>
			
				<?php em_display_event_locations(); ?>
				<?php em_display_event_organizers(); ?>
			
				<a href="<?php the_permalink(); ?>" class="progression-button"><?php esc_html_e( 'View Event', 'habitat-progression' ) ?></a>
			</div>
	
	<div class="clearfix-pro"></div>
	</div><!-- close .post-container-pro -->
</article><!-- #post-## -->