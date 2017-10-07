<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templat
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
		
	<div class="progression-studios-woocommerce-index-container <?php echo esc_attr( get_theme_mod('progression_studios_blog_transition', 'progression-studios-blog-image-scale') ); ?>">
		
		<div class="progression-studios-feaured-shop progression-studios-feaured-image">
			<a href="<?php the_permalink(); ?>">
				<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
			</a>			
		</div>

		<div class="progression-studios-shop-text-container">
            <div class="grid2column-progression">
                <a href="<?php the_permalink(); ?>">
                    <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
                </a>
			</div>
			<div class="grid2column-progression lastcolumn-progression">
			    <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
            </div>   
            
            <div class="clearfix-pro"></div>
            
            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

		</div>
		
	</div>

	
</li>
