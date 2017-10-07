<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php do_action( 'woocommerce_before_main_content' ); ?>
	
		<?php $your_shop_page = get_post( wc_get_page_id( 'shop' ) ); ?>
		
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			
			<?php if($your_shop_page !="") : ?><?php if(!get_post_meta($your_shop_page->ID, 'progression_studios_disable_page_title', true)): ?><?php endif;?>
			<div id="page-title-pro">
				<div class="width-container-pro">
			        <div class="clearfix-pro"></div>
					<div id="progression-studios-page-title-container">
						<h1 class="entry-title-pro"><?php woocommerce_page_title(); ?></h1>
						<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo esc_html( get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true) );?></h4><?php endif; ?>
					</div><!-- close #progression-studios-page-title-container -->
					<div class="clearfix-pro"></div>
				</div><!-- close .width-container-pro -->
			</div><!-- #page-title-pro -->
			<?php endif; ?>

		<?php endif; ?>
		
		<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below' ) : ?></div><!-- close #header-container-logo-progression --><?php endif; ?>
	
    </div><!-- close #progression-studios-header-position -->	
		

	<?php if($your_shop_page !="") : ?>	
		<div id="content-pro">
			<div class="width-container-pro<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?>">
				
					<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?>
						
						<div class="woocommerce columns-<?php echo esc_attr(get_theme_mod( 'progression_studios_shop_columns', '3')); ?>">
		
		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php do_action( 'woocommerce_before_shop_loop' ); ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php do_action( 'woocommerce_after_shop_loop' ); ?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php do_action( 'woocommerce_after_main_content' ); ?>
	
		</div><!-- close .progression-studios-woocommerce -->
	
		
		<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #main-container-pro -->	<?php do_action( 'woocommerce_sidebar' ); ?><?php endif; ?>
			
	
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
	<?php endif;?>

<?php get_footer( 'shop' ); ?>