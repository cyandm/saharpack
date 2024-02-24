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
<div class="container mx-auto flex-col text-center bg-gray-50 border-y border-primary-100 py-4">
	<h1 class="text-3xl">سبد خرید</h1>
	<p class="text-primary-300">شما میتوانید در این صفحه محصولات خود را به سبد خرید اضافه یا آن ها را حذف کنید.</p>
</div>

<form class="container mx-auto my-6 flex flex-col text-center" action="<?php echo esc_url(wc_get_cart_url()); ?>"
	method="post">

	<table class="p-3 mt-12 text-center">
		<thead class="text-center max-sm:hidden">
			<tr>
				<th class="product-thumbnail"></th>
				<th class="product-name">نام محصول</th>
				<th class="product-price">قیمت واحد</th>
				<th class="product-quantity">تعداد</th>
				<th class="product-subtotal">جمع نهایی</th>
			</tr>
		</thead>
		<tbody class="">


			<?php
			foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
				$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

				if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
					$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
					?>
					<tr
						class="max-sm:flex max-sm:flex-col max-sm:justify-center max-sm:items-center woocommerce-cart-form__cart-item bg-gray-100 border-b border-primary-300 <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">



						<td class="product-thumbnail">
							<?php
							$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(['100', '100']), $cart_item, $cart_item_key);

							if (!$product_permalink) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
							}
							?>
						</td>

						<td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
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
						</td>

						<td class="product-price max-sm:hidden" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
							<?php
							echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
							?>
						</td>


						<td class="product-quantity flex gap-1 justify-center items-center h-24"
							data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
							<?php
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

							<!-- Remove Default X from woocommerce -->
							<script>
								document.querySelector('#removeProduct').firstChild.data = "";
							</script>


						</td>

						<td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
							<?php
							echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>




		</tbody>
	</table>

	<div>
		<div class="flex w-full justify-between p-3 bg-gray-50 my-5 max-sm:flex-col gap-4">

			<?php if (wc_coupons_enabled()) { ?>
				<div class="coupon flex">
					
					<input type="text" name="coupon_code" class="w-64 p-2" id="coupon_code" value=""
						placeholder="کد تخفیف خود را وارد نمایید" />

					<button type="submit"
						class="btn-lite "
						name="apply_coupon" value="اعمال کد تخفیف">
						اعمال کد تخفیف
					</button>

					<?php do_action('woocommerce_cart_coupon'); ?>
				</div>
			<?php } ?>

			<button type="submit"
				class="btn-secondary  max-sm:text-base"
				name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

			<?php do_action('woocommerce_cart_actions'); ?>

			<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
		</div>
	</div>
</form>

<?php do_action('woocommerce_before_cart_collaterals'); ?>

<div class="cart-collaterals flex justify-center items-center">
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



