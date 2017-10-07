<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="width-container-pro">
<?php
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
</div><!-- close .width-container-pro -->

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="width-container-pro <?php if ( get_theme_mod( 'progression_studios_shop_post_sidebar') == 'left') : ?> left-sidebar-pro<?php endif; ?>">
		<?php if ( get_theme_mod( 'progression_studios_shop_post_sidebar') == 'right' || get_theme_mod( 'progression_studios_shop_post_sidebar') == 'left') : ?><div id="main-container-pro"><?php endif; ?>
		
		<div class="woocommerce woocommerce-shop-single">
			
			
			<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
			<div class="summary entry-summary">
				<?php do_action( 'woocommerce_single_product_summary' ); ?>
				
				<div class="single-shop-social-sharing noselect">
					<a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()); ?>&t=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Facebook', 'habitat-progression' ); ?>" class="facebook-share" target="_blank"><i class="fa fa-facebook"></i></a>

					<a href="https://twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Twitter', 'habitat-progression' ); ?>" class="twitter-share" target="_blank"><i class="fa fa-twitter"></i></a>
		
					<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&amp;media=<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?><?php echo esc_attr($feat_image);?>" title="<?php esc_html_e( 'Share on Pinterest', 'habitat-progression' ); ?>" class="pinterest-share" target="_blank"><i class="fa fa-pinterest-p"></i></a>

	
					<a href="http://vkontakte.ru/share.php?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on VK', 'habitat-progression' ); ?>" class="vk-share" target="_blank"><i class="fa fa-vk"></i></a>
	
					<a href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on Google+', 'habitat-progression' ); ?>" class="google-share" target="_blank"><i class="fa fa-google-plus"></i></a>


					<a href="http://reddit.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Reddit', 'habitat-progression' ); ?>" class="reddit-share" target="_blank"><i class="fa fa-reddit-alien"></i></a>

					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on LinkedIn', 'habitat-progression' ); ?>" class="linkedin-share" target="_blank"><i class="fa fa-linkedin-square"></i></a>

					<a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Tumblr', 'habitat-progression' ); ?>" class="tumblr-share" target="_blank"><i class="fa fa-tumblr"></i></a>


					<a href="http://www.stumbleupon.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on StumbleUpon', 'habitat-progression' ); ?>" class="stumble-share" target="_blank"><i class="fa fa-stumbleupon"></i></a>
	
					<a href="mailto:?subject=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;body=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on E-mail', 'habitat-progression' ); ?>" class="mail-share" ><i class="fa fa-envelope"></i></a>
	
	
					<div class="clearfix-pro"></div>
				</div>
				
			</div><!-- .summary -->
	
		</div><!-- close .woocommerce -->
		
		<?php if ( get_theme_mod( 'progression_studios_shop_post_sidebar') =='right' || get_theme_mod( 'progression_studios_shop_post_sidebar') =='left') : ?></div><!-- close #main-container-pro --><?php do_action( 'woocommerce_sidebar' ); ?><?php endif; ?>
	<div class="clearfix-pro"></div>
	</div><!-- close .width-container-pro -->
	
<div id="single-product-info-background">
	
	<div class="width-container-pro">
		<div class="woocommerce woocommerce-shop-single">

			<div id="woocomerce-tabs-container-progression-studios">
				<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
				<meta itemprop="url" content="<?php the_permalink(); ?>" />
			</div>
		</div><!-- close .woocommerce -->
	<div class="clearfix-pro"></div>
	</div><!-- close .width-container-pro -->
	
</div><!-- close #single-product-info-background -->
	
</div><!-- #product-<?php the_ID(); ?> -->

<div class="width-container-pro">
<?php do_action( 'woocommerce_after_single_product' ); ?>
</div><!-- close .width-container-pro -->