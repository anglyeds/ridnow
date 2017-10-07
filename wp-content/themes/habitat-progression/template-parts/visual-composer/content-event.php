<?php
/**
 * @package pro
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="event-post-container-pro <?php echo esc_attr( get_theme_mod('progression_studios_blog_transition', 'progression-studios-blog-image-scale') ); ?>">
		
			<?php if(has_post_thumbnail()): ?>
				<div class="featured-event-pro progression-studios-feaured-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('habitat-progression-events'); ?></a></div>
			<?php else: ?>
				<div class="featured-event-pro progression-studios-feaured-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/event-placeholder.jpg'; ?>" alt="<?php bloginfo('name'); ?>"/></a></div>
			<?php endif;?>	
				
			
			<div class="excerpt-text-pro">
				<h2 class="event-title-pro"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
				<?php em_display_loop_event_meta(); ?>
			
				<?php if($post->post_excerpt) { echo "<div class='event-excerpt'>"; the_excerpt();  echo "</div>";} ?>
			
				<?php em_display_event_locations(); ?>	
				
				<a href="<?php the_permalink();?>" class="progression-button event-habitat-button"><?php esc_html_e( 'View Event', 'habitat-progression' ) ?></a>		
										
			</div>
	
	<div class="clearfix-pro"></div>
	</div><!-- close .post-container-pro -->
</article><!-- #post-## -->