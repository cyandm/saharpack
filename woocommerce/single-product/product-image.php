<?php

/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();
$product_image = $product->get_image(['full', '480']);
$attachment_ids = $product->get_gallery_image_ids();
$post_thumbnail_id = $product->get_image_id();
?>

<figure class="flex-1 md:max-w-xl max-w-full gap-2">
    <div class="relative swiper" id="singleProductSwiper">
        <div class="swiper-wrapper md:max-h-full">
            <div class="swiper-slide flex justify-center items-center">
                <?php echo wp_get_attachment_image($post_thumbnail_id, [450, 450], '', ["class" => "object-contain"]); ?>
            </div>

            <?php if ($attachment_ids && $product->get_image_id()) : ?>
                <?php foreach ($attachment_ids as $attachment_id) : ?>
                    <div class="swiper-slide flex justify-center items-center h-full md:max-h-full">
                        <?php echo wp_get_attachment_image($attachment_id, [450, 450], '', ["class" => "object-contain"]); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-navigation">
            <div class="swiper-btn-next"><i class="stroke-2" data-feather="arrow-left"></i></div>
            <div class="swiper-btn-prev"><i class="stroke-2" data-feather="arrow-right"></i></div>
        </div>

        <?php woocommerce_show_product_sale_flash() ?>
    </div>

    <div class="flex gap-2 bg-white p-2 swiper justify-center items-center :hidden" id="singleProductThumbnailsSwiper">
        <?php
        if ($attachment_ids && $product->get_image_id()) : ?>
            <div class="swiper-wrapper">
                <div href="#" class="w-24 aspect-square overflow-hidden flex justify-center items-center swiper-slide">
                    <?php echo wp_get_attachment_image($post_thumbnail_id); ?>
                </div>


                <?php foreach ($attachment_ids as $attachment_id) : ?>
                    <div href="#" class="w-24 aspect-square overflow-hidden flex justify-center items-center swiper-slide">
                        <?php echo wp_get_attachment_image($attachment_id, "thumbnail"); ?>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </div>
</figure>