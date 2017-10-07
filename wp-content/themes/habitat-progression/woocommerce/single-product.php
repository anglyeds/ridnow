<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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

get_header( 'shop' ); ?>

	<?php do_action( 'woocommerce_before_main_content' ); ?>
	
	<?php $your_shop_page = get_post( wc_get_page_id( 'shop' ) ); ?>
	
	
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		
		<?php if($your_shop_page !="") : ?>	<?php if(!get_post_meta($your_shop_page->ID, 'progression_studios_disable_page_title', true)): ?><?php endif;?>
		<div id="page-title-pro">
			<div class="width-container-pro">
			    <div class="clearfix-pro"></div>
				<div id="progression-studios-page-title-container">
					<h1 class="entry-title-pro"><?php woocommerce_page_title(); ?></h1>
					<?php if($your_shop_page !="") : ?>	<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo esc_html( get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true) );?></h4><?php endif; ?><?php endif; ?>
				</div><!-- close #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
		<?php endif; ?>

	<?php endif; ?>
	
	
	
	<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below' ) : ?></div><!-- close #header-container-logo-progression --><?php endif; ?>
	
	</div><!-- close #progression-studios-header-position -->	
	
	
	<div id="content-pro">


				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php wc_get_template_part( 'content', 'single-product' ); ?>
				<?php endwhile; // end of the loop. ?>

				<?php do_action( 'woocommerce_after_main_content' ); ?>

			
			
			
	</div><!-- #content-pro -->
<?php get_footer( 'shop' ); ?>
