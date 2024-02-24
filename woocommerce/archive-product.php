<?php
global $wp_query;

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
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<header class="woocommerce-products-header hidden">
	<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
		<h1 class="woocommerce-products-header__title page-title text-center text-3xl">
			<?php woocommerce_page_title(); ?>
		</h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action('woocommerce_archive_description');
	?>
</header>

<div class="archive-products-swiper">
	<?php get_template_part("woocommerce/archive-product", "swiper") ?>
</div>
<div class="clear-both"></div>

<main class="flex max-md:flex-col">
	<div class="sidebar py-2 md:pl-6 max-md:px-4 max-md:mb-5">
		<div>
			<button id="mobile-sidebar-filter" class="flex btn-primary bg-gray-100 text-primary-900 md:hidden text-xl w-full px-5 py-2" style="text-align: right;">
				<span class="flex-auto">نمایش فیلترها</span>
				<i class=""><i class="stroke-2 w-6 h-6" data-feather="chevron-down"></i></i>
			</button>
		</div>
		<div id="sidebar-container" class="sidebar-contenr max-md:hidden bg-gray-50 max-md:pb-4 px-3 md:w-96">
			<p class="m-0 pt-3 pb-5 text-lg">فیلترها:</p>
			<?php get_template_part('woocommerce/archive-product', 'sidebar'); ?>
		</div>
	</div>

	<div class="products flex-auto max-md:px-4">
		<?php
		if (woocommerce_product_loop()) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action('woocommerce_before_shop_loop'); ?>

			<div class="grid grid-cols-4 max-md:grid-cols-2">

				<?php
				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');

						wc_get_template_part('content', 'product');
					}
				} ?>

			</div>

		<?php
			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}
		?>

		<div>
			<?php if (!$wp_query->is_paged() && is_archive() && !empty(term_description())) : ?>
				<div id="term-description" class="mt-5 h-[200px] mx-auto container p-4 overflow-hidden bg-gray-50 rounded">
					<div class="term-description-content">
						<?php echo term_description(); ?>
					</div>
				</div>

				<div class="flex justify-end pt-4">
					<button id="term-description-opener" class="btn-primary">
						نمایش بیشتر
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>

</main>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer('shop');
