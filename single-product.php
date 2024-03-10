<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<?php get_header() ?>
<?php

$product_id = get_the_ID();
$wc_product = wc_get_product($product_id);
$product_sku = $wc_product->get_sku();
$product_price = $wc_product->get_price_html();
$product_stock_status = $wc_product->get_stock_status();
$product_stock_quantity = $wc_product->get_stock_quantity();
$product_attributes = $wc_product->get_attributes();
$product_gallery = $wc_product->get_gallery_image_ids();
$favorite_products = wc_get_related_products($product_id);


$product_template = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/product.php'
];
$page_product_link = get_permalink(get_posts($product_template)[0]);


?>
<main class="single-product-page">
    <section class="breadcrumb-wrapper">
        <div class="breadcrumb-product container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
        <i class="divider"></i>
    </section>

    <section class="container product-detail-container">
        <p id="title"><?= get_the_title() ?></p>
        <div class="product-detail-and-thumbnail">
            <div class="product-thumbnail">
                <?php if (!empty(get_the_post_thumbnail($product_id))) {
                    echo get_the_post_thumbnail($product_id, 'full');
                } else {
                    printf(
                        '<img src="%s" alt="image-not-set" >',
                        get_stylesheet_directory_uri() . '/assets/img/placeholder.png'
                    );
                } ?>
            </div>
            <div class="product-detail">
                <h2><?= pll__('product-detail') ?></h2>
                <p class="product-sku"><?= $product_sku ?></p>
                <?php

                foreach ($product_attributes as $key => $attribute) : ?>
                    <div class="single-product__property">
                        <p><?= $attribute['data']['name'] ?></p>
                        <?php foreach ($attribute['data']['options'] as $key => $att) : ?>
                            <p><?= $att ?></p>
                        <?php endforeach ?>

                    </div>
                <?php endforeach ?>
                <h3><?= pll__('price-and-order') ?></h3>
                <div class="product-price">
                    <?= pll__('قیمت') ?>
                    <?= $product_price ?>
                </div>
                <div class="product-order-count">
                    <div class="title-quantity"><?= pll__('تعداد') ?></div>

                    <div id="quantityProductWrapper" class="quantity-count-changer" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                        <div class="minus-step"><button type="button">-</button></div>

                        <?php
                        woocommerce_quantity_input(
                            array(
                                'min_value' => apply_filters('woocommerce_quantity_input_min', $wc_product->get_min_purchase_quantity(), $wc_product),
                                'max_value' => apply_filters('woocommerce_quantity_input_max', $wc_product->get_max_purchase_quantity(), $wc_product),
                                'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $wc_product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                                'classes' => "form-control"
                            )
                        );

                        ?>
                        <div class="plus-step"><button type="button">+</button></div>
                    </div>
                </div>
                <div class="product-stock">
                    <div><?= pll__('وضعیت موجودی') ?></div>
                    <?php if ($product_stock_status === 'instock') :  ?>
                        <div class="count-inventory">
                            <i><?= get_template_part('assets/img/svg/icon-inventory') ?></i><span><?= pll__('موجود') ?></span>
                        </div>
                    <?php else : ?>
                        <div class="count-no-inventory">
                            <i><?= get_template_part('assets/img/svg/icon-no-inventory') ?></i><span><?= pll__('ناموجود') ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="add-cart">
                    <div class="share-and-add-cart">
                        <a href="<?= $wc_product->add_to_cart_url() ?>" class="btn" variant="primary"><?= pll__('افزودن به سبد خرید') ?></a>
                        <div id="btnShare" class="btn-share btn" variant="secondary">
                            <i class=" iconsax" icon-name="share"></i>
                        </div>
                    </div>
                    <div class="counseling-and-guarantee">
                        <div>
                            <i class="iconsax" icon-name="headphones"></i>
                            <?= pll__('free-consultation') ?>
                        </div>
                        <div>
                            <i class="iconsax" icon-name="money-change"></i>
                            <?= pll__('ضمانت بازگشت وجه') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (is_array($product_gallery) && !empty($product_gallery)) : ?>
            <div class="product-gallery">
                <?php foreach ($product_gallery as $image) : ?>
                    <div class="image-gallery">
                        <?= wp_get_attachment_image($image, 'full') ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <?php if ($favorite_products) : ?>
        <section class="favorite-products container">
            <div class="favorite-products__title-and-btn-all">
                <p class="favorite-products__title"><?= pll__('may-like') ?></p>
                <a href="<?= $page_product_link ?>" class="btn btn-view-all" variant="secondary"><?= pll__('view-all') ?></a>
            </div>
            <div class="favorite-products__favorite_post-wrapper">

                <?php
                foreach ($favorite_products as $favorite_product_id) {

                    get_template_part('/templates/components/cards/product', null, ['product_id' => $favorite_product_id]);
                }
                ?>

            </div>
            <a href="<?= $page_product_link ?>" class="btn btn-view-all__mobile" variant="secondary"><?= pll__('view-all') ?></a>

        </section>
    <?php endif; ?>
    <?php wp_reset_postdata() ?>
</main>
<?php get_footer() ?>