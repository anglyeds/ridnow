<?php
/**
 * @package pro
 */
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="padding:<?php echo esc_attr(get_theme_mod('progression_studios_program_gap', '10px')); ?>;">	
		<div class="progression-studios-default-program-index <?php echo esc_attr( get_theme_mod('progression_studios_program_index_transition', 'progression-studios-program-image-scale') ); ?>">
		
			<a <?php progression_studios_program_link(); ?> class="progression-studios-program-image <?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?>program-video-progression-studios-format<?php endif; ?>">
				
			<?php if(has_post_thumbnail()): ?>
				<?php the_post_thumbnail('progression-program'); ?>
			<?php else: ?>
				
				
		
			<?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?>
			
				
					<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_studios_video_post', true)); ?>

						<?php endif; ?><!-- close featured thumbnail -->
					
				
			<?php endif; ?><!-- close video -->
			
			<div class="progression-program-content">
				<h2 class="progression-program-title"><?php the_title(); ?></h2>
				<?php 
					$terms = get_the_terms( $post->ID , 'program-category' ); 
					if ( !empty( $terms ) ) :
						echo '<ul class="program-tax-progression">';
					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term, 'program-category' );
						if( is_wp_error( $term_link ) )
							continue;
						echo '<li>' . $term->name . '</li>';
					} 
					echo '</ul>';
					endif;
				?>
			</div><!-- close .progression-program-content -->
			
			</a><!-- close .progression-studios-program-image -->
		<div class="clearfix-pro"></div>
		</div><!-- close .progression-studios-default-program-index -->
	</div><!-- #post-## -->
