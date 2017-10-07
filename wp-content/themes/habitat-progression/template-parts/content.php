<?php
/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="progression-studios-default-blog-index <?php echo esc_attr( get_theme_mod('progression_studios_blog_transition', 'progression-studios-blog-image-scale') ); ?>">
		
		<?php if(has_post_thumbnail()): ?>
			<div class="progression-studios-feaured-image">
				<?php progression_studios_blog_link(); ?>
					<?php the_post_thumbnail('progression-blog'); ?>
				</a>
			</div><!-- close .progression-studios-feaured-image -->
		<?php else: ?>
		
		<?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?>
			
			<div class="progression-studios-feaured-image video-progression-studios-format">
				<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_studios_video_post', true)); ?>
			</div>
			
			<?php else: ?>
				
				<?php if( has_post_format( 'gallery' ) && get_post_meta($post->ID, 'progression_studios_gallery', true)  ): ?>
					<div class="progression-studios-feaured-image">
						<div class="flexslider progression-studios-gallery">
					      <ul class="slides">
								<?php $files = get_post_meta( get_the_ID(),'progression_studios_gallery', 1 ); ?>
								<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
								<?php $lightbox_pro = wp_get_attachment_image_src($attachment_id, 'large'); ?>
								<li><a <?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_lightbox'): ?> href="<?php echo esc_attr($lightbox_pro[0]);?>" data-rel="prettyPhoto[gallery-<?php the_ID(); ?>]" <?php else: ?> <?php echo progression_studios_blog_index_gallery(); ?><?php endif; ?> <?php $get_description = get_post($attachment_id)->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>><?php echo wp_get_attachment_image( $attachment_id, 'progression-blog' ); ?></a></li>
								<?php endforeach;  ?>
							</ul>
						</div><!-- close .flexslider -->
			
					</div><!-- close .progression-studios-feaured-image -->
	
					<?php endif; ?><!-- close featured thumbnail -->
					
				<?php endif; ?><!-- close gallery -->
				
		<?php endif; ?><!-- close video -->

		<div class="progression-blog-content">	
    		
    		<div class="progression-date-meta-on-off">
				<a class="progression-date-meta" href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time(get_option('date_format')); ?></a>				
            </div>
			<?php if ( !has_post_format( 'quote' ) ) : ?>
			<h2 class="progression-blog-title"><?php progression_studios_blog_post_title(); ?><?php the_title(); ?></a></h2>
			<?php endif; ?>
			
			<?php if ( 'post' == get_post_type() && !has_post_format( 'image' ) && !has_post_format('quote') ) : ?>
			<ul class="progression-meta-index">
				<li class="progression-author-meta-on-off">
					<a class="progression-author-meta" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
					<span class="meta-divider"></span>
				</li>
				<li class="progression-date-category-on-off">
				<i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category(', '); ?>
				<span class="meta-divider"></span>
				</li>
				<li class="progression-date-comments-on-off">
					<?php comments_popup_link( '' . wp_kses( __( '<i class="fa fa-comments"></i> 0', 'habitat-progression' ), true ) . '', wp_kses( __( '<i class="fa fa-comments"></i> 1', 'habitat-progression' ), true), wp_kses( __( '<i class="fa fa-comments"></i> %', 'habitat-progression' ), true ) ); ?>
					<span class="meta-divider"></span>
				</li>
			</ul>
			<div class="clearfix-pro"></div>
			<?php endif; ?>
	
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="progression-studios-summary-post">
					<?php if(has_excerpt() ): ?><?php the_excerpt(); ?><?php else: ?>
					<?php the_content( sprintf( wp_kses( __( 'Read More', 'habitat-progression' ), array(  'i' => array( 'id' => array(),  'class' => array(),  'style' => array(),  ), 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) ); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			

			
			<?php wp_link_pages( array(
				'before' => '<div class="progression-page-nav">' . esc_html__( 'Pages:', 'habitat-progression' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				) );
			?>
		</div><!-- close .progression-blog-content -->
	
		
	<?php if ( is_sticky() && is_home() && ! is_paged() ) { printf( '<div class="sticky-post-pro">%s</div>', esc_html__( 'Featured', 'habitat-progression' ) ); } ?>
	<div class="clearfix-pro"></div>
	</div><!-- close .progression-studios-default-blog-index -->
</div><!-- #post-## -->