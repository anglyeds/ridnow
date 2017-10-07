<?php
/**
 * @package pro
 */
?>

<div <?php post_class(); ?>>	
	<div class="progression-studios-program-index <?php echo esc_attr( get_theme_mod('progression_studios_blog_transition', 'progression-studios-blog-image-scale') ); ?>">
		

			<?php if(has_post_thumbnail()): ?>
				<div class="progression-studios-feaured-image match-height-pro">
					<?php if( get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) != 'progression_link_hidden'): ?><?php progression_studios_program_link(); ?><?php endif; ?>
						<?php the_post_thumbnail('progression-program'); ?>
					<?php if( get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) != 'progression_link_hidden'): ?></a><?php endif; ?>
				</div>
			<?php endif; ?>
			
			<div class="progression-program-container match-height-pro" <?php if($program_text_bg_color) : ?>style="background-color:<?php echo esc_attr($program_text_bg_color) ?>;"<?php endif; ?>>
				<h2 class="program-index-headline" style="<?php if($program_heading_size) : ?>font-size:<?php echo esc_attr($program_heading_size) ?>;<?php endif; ?><?php if($program_heading_color) : ?>color:<?php echo esc_attr($program_heading_color) ?>;<?php endif; ?>">
					<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) != 'progression_link_hidden' && get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) != 'progression_link_lightbox') : ?><a href="<?php progression_studios_program_post_title(); ?>" <?php if($program_heading_color) : ?>style="color:<?php echo esc_attr($program_heading_color) ?>;"<?php endif; ?>><?php endif; ?>
						
					<?php the_title(); ?>
					<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) != 'progression_link_hidden' && get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) != 'progression_link_lightbox') : ?></a><?php endif; ?>
				</h2>
				
				<?php if(get_post_meta($post->ID, 'progression_studios_program_subheadline', true)): ?>
					<h6 class="program-sub-headline-index" style="<?php if($program_subheadline_size) : ?>font-size:<?php echo esc_attr($program_subheadline_size) ?>;<?php endif; ?><?php if($program_subheadline_color) : ?>color:<?php echo esc_attr($program_subheadline_color) ?>;<?php endif; ?>"><?php echo esc_attr( get_post_meta($post->ID, 'progression_studios_program_subheadline', true) );?></h6>
				<?php endif; ?>
				
				<?php if(!$program_description_hidden == 'true'): ?>
					<div style="<?php if($program_description_size) : ?>font-size:<?php echo esc_attr($program_description_size) ?>;<?php endif; ?><?php if($program_description_color) : ?>color:<?php echo esc_attr($program_description_color) ?>;<?php endif; ?>"><?php if(has_excerpt() ): ?><?php the_excerpt(); ?><?php else: ?><?php the_content(); ?><?php endif; ?><a href="<?php the_permalink();?>" class="progression-button program-index-btn" style="<?php if($button_bg_color) : ?>background-color:<?php echo esc_attr($button_bg_color) ?>;<?php endif; ?> <?php if($button_text_color) : ?>color:<?php echo esc_attr($button_text_color) ?>;<?php endif; ?>"><?php echo esc_attr_e('Read More', 'habitat-progression');?></a><div class="clearfix-pro"></div></div>
				<?php endif; ?>
			</div>


	<div class="clearfix-pro"></div>
	</div><!-- close .progression-studios-program-index -->
</div><!-- #post-## -->