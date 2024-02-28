<?php

defined('ABSPATH') || exit;

?>

<?php
$home_id = get_option('page_on_front');
$thumbnail = get_field('successful_submit_order', $home_id);
?>
<main class="container mx-auto">
	<div class="woocommerce-order text-center">

		<?php
		if ($order) :

			do_action('woocommerce_before_thankyou', $order->get_id());
		?>

			<?php if ($order->has_status('failed')) : ?>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed">
					<?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?>
				</p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
					<?php if (is_user_logged_in()) : ?>
						<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
					<?php endif; ?>
				</p>

			<?php else : ?>
				<div class="order-information">
					<p class="woocommerce-notice h4 woocommerce-notice--success woocommerce-thankyou-order-received my-6 ">
						<?php //echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), $order); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
						<?= pll__('سفارش شما با موفقیت ثبت شد') ?>
					</p>

					<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details flex justify-center items-center mt-[20px]">

						<li class="woocommerce-order-overview__order order">
							<span><?php esc_html_e('Order number:', 'woocommerce'); ?></span>
							<span>
								<?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?>
							</span>
						</li>

						<li class="woocommerce-order-overview__date date">
							<span><?php esc_html_e('Date:', 'woocommerce'); ?></span>
							<span>
								<?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?>
							</span>
						</li>


						<li class="woocommerce-order-overview__total total">
							<span><?php esc_html_e('Total:', 'woocommerce'); ?></span>
							<span>
								<?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?>
							</span>
						</li>



						<?php if ($order->get_status()) : ?>
							<li class="woocommerce-order-overview__payment-method method">
								<span><?php esc_html_e('Status:', 'woocommerce'); ?></span>
								<span>
									<?php _e($order->get_status(), 'woocommerce'); ?>
								</span>
							</li>
						<?php endif; ?>

					</ul>
					<div class="btn-group-submit-order-page">
						<a class="btn" variant="secondary" href="#"><i class="iconsax" icon-name="document-download"></i><?= pll__('دانلود فایل PDF') ?></a>
						<a class="btn" variant="primary" href="/"><?= pll__('بازگشت به صفحه اصلی') ?></a>
					</div>
				</div>
			<?php endif; ?>

			<?php do_action('woocommerce_thankyou', $order->get_id()); ?>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
				<?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
				?>
			</p>

		<?php endif; ?>

	</div>
</main>