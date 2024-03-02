<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined('ABSPATH') || exit;


?>
<div class="cart-wrapper">
	<div class="product-property-in-cart">

		<h3><?= pll__('سبد خرید') ?></h3>

		<form class="" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">

			<div class="cart-items-wrapper">



				<?php
				foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
					$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
					$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

					if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
						$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
				?>
						<div class="cart-items-inner-wrapper <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
							<div class="items-property">
								<div class="product-thumbnail">
									<?php
									$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(['100', '100']), $cart_item, $cart_item_key);

									if (!$product_permalink) {
										echo $thumbnail; // PHPCS: XSS ok.
									} else {
										printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
									}
									?>
								</div>
								<div>
									<div class="product-name h4" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
										<?php
										if (!$product_permalink) {
											echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
										} else {
											echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
										}

										do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

										// Meta data.
										echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

										// Backorder notification.
										if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
											echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
										}
										?>
									</div>

									<div class="product-code" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
										<?php
										if (!$product_permalink) {
											echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_sku(), $cart_item, $cart_item_key) . '&nbsp;');
										} else {
											echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_sku()), $cart_item, $cart_item_key));
										}

										do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

										// Meta data.
										echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.
										?>
									</div>



									<div id="quantityProductWrapper" class="quantity-count-changer" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
										<?php
										echo '<div class="minus-step"><button type="button">-</button>';
										echo '</div>';
										if ($_product->is_sold_individually()) {
											$min_quantity = 1;
											$max_quantity = 1;
										} else {
											$min_quantity = 0;
											$max_quantity = $_product->get_max_purchase_quantity();
										}
										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name' => "cart[{$cart_item_key}][qty]",
												'input_value' => $cart_item['quantity'],
												'max_value' => $max_quantity,
												'min_value' => $min_quantity,
												'product_name' => $_product->get_name(),
											),
											$_product,
											false
										);

										echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
										echo '<div class="plus-step"><button  type="button">+</button>';
										echo '</div>';
										?>

										<?php
										echo apply_filters(
											// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											'woocommerce_cart_item_remove_link',
											sprintf(
												'<a class="text-red-600" id="removeProduct" href="%s" data-product_id="%s" data-product_sku="%s">&times<i data-feather="trash-2"></i></a>',
												esc_url(wc_get_cart_remove_url($cart_item_key)),
												esc_attr($product_id),
												esc_attr($_product->get_sku())
											),
											$cart_item_key
										);
										?>

									</div>
								</div>

							</div>
							<div class="">
								<div class="product-subtotal h5" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
									<?php
									echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>


			</div>

			<div>
				<div class="btn-updater-price-wrapper ">
					<button type="submit" class="btn-secondary" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

					<?php do_action('woocommerce_cart_actions'); ?>

					<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
				</div>
			</div>
		</form>
	</div>
	<div class="price-and-pay-method">
		<?php do_action('woocommerce_before_cart_collaterals'); ?>

		<div class="">
			<?php
			/**
			 * Cart collaterals hook.
			 *
			 * @hooked woocommerce_cross_sell_display
			 * @hooked woocommerce_cart_totals - 10
			 */
			do_action('woocommerce_cart_collaterals');
			?>
		</div>
	</div>
</div>