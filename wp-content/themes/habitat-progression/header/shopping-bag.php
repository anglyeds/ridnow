<?php if (class_exists('Woocommerce')) : ?>
	<?php global $woocommerce; ?>
	<div id="progression-shopping-cart-toggle" class="noselect">
		<div id="progression-shopping-cart-count">
		
			<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="progression-count-icon-nav"><i class="fa fa-shopping-bag" aria-hidden="true"></i><?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?><span class="progression-cart-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'habitat-progression'), $woocommerce->cart->cart_contents_count);?></span><?php endif ?></a>
		
			<div id="progression-checkout-basket">
				<div id="progression-check-out-basket-container">
					<div class="ajax-cart-header">
					
						<ul id="progression-cart-small">

							<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
								<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
									$_product = $cart_item['data'];
									// Only display if allowed
									if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
										continue;
									// Get price
									$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();
									$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
									?>

									<li>
										<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

											<?php echo esc_attr($_product->get_image()); ?>

											<div class="progression-cart-small-text">
												<h6><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></h6>
					
												<?php echo esc_attr($woocommerce->cart->get_item_data( $cart_item )); ?>

												<span class="progression-cart-small-quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>
											</div>
					
										</a>
									
										<?php
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												'<a href="%s" class="remove-cart-header" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
												esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
												__( 'Remove this item', 'habitat-progression' ),
												esc_attr( $cart_item['product_id'] ),
												esc_attr( $_product->get_sku() )
											), $cart_item_key );
										?>
									
										<div class="cleafix-pro"></div>
									</li>

								<?php endforeach; ?>

							<?php else : ?>
								<li class="empty"><?php esc_html_e('No products in the cart.', 'habitat-progression'); ?></li>
							<?php endif; ?>

						</ul><!-- end product list -->

						<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
							<div class="progression-sub-total"><?php esc_html_e('Subtotal', 'habitat-progression'); ?>: <span class="total-number-add"><?php echo esc_attr($woocommerce->cart->get_cart_subtotal()); ?></span> </div>
						<div class="clearfix-pro"></div>
						<?php endif; ?>
					
					</div>
				
					<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="cart-button-header-cart"><?php esc_html_e('View Cart','habitat-progression'); ?> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="checkout-button-header-cart"><?php esc_html_e('Checkout','habitat-progression'); ?> <i class="fa fa-check-square-o" aria-hidden="true"></i></a>
				
				<div class="clearfix-pro"></div>
				</div><!-- close #progression-check-out-basket-container -->
			</div><!-- close #progression-checkout-basket -->
		
		</div>
	</div>
<?php endif ?>