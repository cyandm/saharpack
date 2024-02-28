<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $wp;
$current_url = home_url($wp->request) . '/';
do_action('woocommerce_before_account_navigation');
?>
<div class="flex justify-center items-center flex-col bg-gray-50 p-6 gap-2">

	<h1 class="text-3xl">حساب کاربری من</h1>
			<p class="text-primary-400 text-center">
			در این صفحه میتوانید سفارش‌های خود را مشاهده کنید و در جریان روند آن ها باشید.
			همچنین میتوانید مشخصات خود را شخصی سازی کنید.
			
			</p>
</div>
<nav class="woocommerce-MyAccount-navigation container mx-auto">
	<ul class="flex justify-center items-center gap-4 my-6 flex-wrap">
		<?php foreach (wc_get_account_menu_items() as $endpoint => $label): ?>
			<?php if ($endpoint == 'dashboard')
				continue; ?>
			<?php if ($endpoint == 'downloads')
				continue; ?>
			<li class="bg-gray-100 py-2 px-4 rounded <?php if (esc_url(wc_get_account_endpoint_url($endpoint)) == $current_url)
				echo "bg-primary-800 text-white"; ?>">
				<a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action('woocommerce_after_account_navigation'); ?>