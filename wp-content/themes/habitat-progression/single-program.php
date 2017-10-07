<?php
/**
 * The template for displaying all single posts.
 *
 * @package pro
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	
	<?php if(!get_post_meta($post->ID, 'progression_studios_disable_page_title', true)): ?>
	<div id="page-title-pro">
		<div id="progression-studios-page-title-spacer"></div>
		<div class="width-container-pro">
			<div id="progression-studios-page-title-container">
				<h1 class="entry-title-pro"><?php esc_html_e( 'Program', 'habitat-progression' ); ?></h1>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	<?php endif; ?>
	
	<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below' ) : ?></div><!-- close #header-container-logo-progression --><?php endif; ?>
	
	</div><!-- close #progression-studios-header-position -->	
		
	
	<div id="content-pro" class="site-content">

		<div class="width-container-pro <?php if( get_post_meta($post->ID, 'progression_studios_disable_featured_image', true) ): ?>hide-featured-image-program<?php endif; ?>">
				
				
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						<div class="progression-studios-default-program-single">
							
							
							<div class="progression-studios-program-image">
				
							<?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?>
			
								<div class="video-progression-studios-format">
									<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_studios_video_post', true)); ?>
								</div>
			
								<?php else: ?>
				
									<?php if( has_post_format( 'gallery' ) && get_post_meta($post->ID, 'progression_studios_gallery', true)  ): ?>
											<div class="flexslider progression-studios-gallery">
										      <ul class="slides">
													<?php $files = get_post_meta( get_the_ID(),'progression_studios_gallery', 1 ); ?>
													<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
													<?php $lightbox_pro = wp_get_attachment_image_src($attachment_id, 'large'); ?>
													<li>
														<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_lightbox_video'): ?>
														<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" data-rel="prettyPhoto" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
														<div class="icon-overlay-blog"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>
											
														<?php else: ?>
														<a href="<?php echo esc_attr($lightbox_pro[0]);?>" data-rel="prettyPhoto[gallery]" <?php $get_description = get_post($attachment_id)->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
																						
														<?php endif; ?>
														<?php echo wp_get_attachment_image( $attachment_id, 'progression-program' ); ?></a></li>
													<?php endforeach;  ?>
												</ul>
											</div><!-- close .flexslider -->
			
										<?php else: ?>
						
											<?php if(has_post_thumbnail()): ?>
													<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>	
													<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_lightbox_video'): ?>
													<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" data-rel="prettyPhoto" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
													<?php else: ?>
													<a href="<?php echo esc_attr($image[0]);?>" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?> data-rel="prettyPhoto">
													<?php endif; ?>
														<?php the_post_thumbnail('progression-program'); ?>
													</a>
											<?php endif; ?><!-- close featured thumbnail -->
					
									<?php endif; ?><!-- close gallery -->
				
							<?php endif; ?><!-- close video -->

							</div><!-- close .progression-studios-program-image -->
		
		
						<div class="progression-program-content-single">
							
							<h2 class="program-single-heading"><?php the_title(); ?></h2>
							<?php if(get_post_meta($post->ID, 'progression_studios_program_subheadline', true)): ?><h4 class="progression-sub-title"><?php echo esc_html( get_post_meta($post->ID, 'progression_studios_program_subheadline', true) );?></h4><?php endif; ?>
							
							<?php the_content( ); ?>
							
							
							<div id="habitat-store-sharing-title"><?php echo esc_html__( 'Share:', 'habitat-progression' ); ?></div>
							<ul class="single-shop-social-sharing noselect">

								<li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()); ?>&t=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Facebook', 'habitat-progression' ); ?>" class="facebook-share" target="_blank"><i class="fa fa-facebook"></i></a></li>

								<li><a href="https://twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Twitter', 'habitat-progression' ); ?>" class="twitter-share" target="_blank"><i class="fa fa-twitter"></i></a></li>
		
								<li><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&amp;media=<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?><?php echo esc_attr($feat_image);?>" title="<?php esc_html_e( 'Share on Pinterest', 'habitat-progression' ); ?>" class="pinterest-share" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>

	
								<li><a href="http://vkontakte.ru/share.php?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on VK', 'habitat-progression' ); ?>" class="vk-share" target="_blank"><i class="fa fa-vk"></i></a></li>
	
								<li><a href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on Google+', 'habitat-progression' ); ?>" class="google-share" target="_blank"><i class="fa fa-google-plus"></i></a></li>


								<li><a href="http://reddit.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Reddit', 'habitat-progression' ); ?>" class="reddit-share" target="_blank"><i class="fa fa-reddit-alien"></i></a></li>

								<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on LinkedIn', 'habitat-progression' ); ?>" class="linkedin-share" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>

								<li><a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Tumblr', 'habitat-progression' ); ?>" class="tumblr-share" target="_blank"><i class="fa fa-tumblr"></i></a></li>


								<li><a href="http://www.stumbleupon.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on StumbleUpon', 'habitat-progression' ); ?>" class="stumble-share" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
	
								<li><a href="mailto:?subject=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;body=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on E-mail', 'habitat-progression' ); ?>" class="mail-share" ><i class="fa fa-envelope"></i></a></li>
						
							</ul>
							<div class="clearfix-pro"></div>
							
							
						</div><!-- close .progression-program-content -->
						
						
						<div class="clearfix-pro"></div>
						
		
						</div><!-- close .progression-studios-default-program-single -->
					</div><!-- #post-## -->
					
					

				
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
		
		
	</div><!-- #content-pro -->
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>