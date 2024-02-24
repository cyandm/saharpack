<?php

/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;

if (!$product->is_in_stock()) :
?>
	<div class="flex justify-end gap-2 max-sm:text-xs single-product-page items-end">
		<h4 class="stock out-of-stock">ناموجود</h4>
	</div>
<?php
	return;
endif;


if ($product->is_on_sale()) {
	if ($product->is_type('simple')) {
		$sale_price = $product->get_sale_price();
		$regular_price = $product->get_regular_price();
	} elseif ($product->is_type('variable')) {
		$product_prices = $product->get_variation_prices();

		$sale_price = min($product_prices['sale_price']);
		$regular_price = min($product_prices['regular_price']);
	}
	$sale_price && $discount = round(($sale_price / $regular_price - 1) * -100);
} else {
	if ($product->is_type('simple')) {
		$sale_price = $product->get_regular_price();
	} elseif ($product->is_type('variable')) {
		$product_prices = $product->get_variation_prices();

		$sale_price = min($product_prices['regular_price']);
	}
}

$condition = $product->is_type('variable') && isset($product_prices) && isset($product_prices['regular_price']);
?>

<div class="flex justify-end gap-2 max-sm:text-xs single-product-page items-end">
	<?php if ($condition) : ?>
		<span class="text-sm">
			قیمت
		</span>

		<span class="single-product-price">
			<?php echo wc_price(min($product_prices['sale_price'])); ?>
		</span>

		<?php if (max($product_prices['regular_price']) != min($product_prices['regular_price'])) : ?>
			<span class="text-sm">
				تا
			</span>
			<span class="single-product-price">
				<?php echo wc_price(max($product_prices['regular_price'])); ?>
			</span>
		<?php endif; ?>
	<?php endif; ?>

	<span class="no-currency">
		<?php if ($product->is_on_sale()) {
			echo wc_price($regular_price);
		} ?>
	</span>

	<?php if (!$condition) : ?>
		<span class="text-sm">
			قیمت
		</span>
		<span class="single-product-price">
			<?php echo wc_price($sale_price) ?>
		</span>
	<?php endif; ?>
</div>