<div class="single-social-sharing noselect">
	
	<a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()); ?>&t=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Facebook', 'habitat-progression' ); ?>" class="facebook-share" target="_blank"><i class="fa fa-facebook"></i></a>

	<a href="https://twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Twitter', 'habitat-progression' ); ?>" class="twitter-share" target="_blank"><i class="fa fa-twitter"></i></a>
		
	<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&amp;media=<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?><?php echo esc_attr($feat_image);?>" title="<?php esc_html_e( 'Share on Pinterest', 'habitat-progression' ); ?>" class="pinterest-share" target="_blank"><i class="fa fa-pinterest-p"></i></a>

	
	<a href="http://vkontakte.ru/share.php?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on VK', 'habitat-progression' ); ?>" class="vk-share" target="_blank"><i class="fa fa-vk"></i></a>
	
	<a href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on Google+', 'habitat-progression' ); ?>" class="google-share" target="_blank"><i class="fa fa-google-plus"></i></a>


	<a href="http://reddit.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Reddit', 'habitat-progression' ); ?>" class="reddit-share" target="_blank"><i class="fa fa-reddit-alien"></i></a>

	<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on LinkedIn', 'habitat-progression' ); ?>" class="linkedin-share" target="_blank"><i class="fa fa-linkedin-square"></i></a>

	<a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Tumblr', 'habitat-progression' ); ?>" class="tumblr-share" target="_blank"><i class="fa fa-tumblr"></i></a>


	<a href="http://www.stumbleupon.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on StumbleUpon', 'habitat-progression' ); ?>" class="stumble-share" target="_blank"><i class="fa fa-stumbleupon"></i></a>
	
	<a href="mailto:?subject=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;body=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on E-mail', 'habitat-progression' ); ?>" class="mail-share"><i class="fa fa-envelope"></i></a>
	
	
	<div class="clearfix-pro"></div>
</div>