<?php
$product_id = isset($args['product_id']) ? $args['product_id'] : get_the_ID();
$product = wc_get_product($product_id);
$attachment_ids = $product->get_gallery_image_ids();

?>

<a href="<?= get_permalink($product_id) ?>">
    <div class="card-product">
        <div class="product-thumbnail">
            <?php if (!empty(get_the_post_thumbnail($product_id))) {
                echo get_the_post_thumbnail($product_id, 'full');
            } else {
                printf(
                    '<img src="%s" alt="image-not-set" >',
                    get_stylesheet_directory_uri() . '/assets/img/placeholder.png'
                );
            } ?>

            <?php if (!empty($attachment_ids)) {
                echo wp_get_attachment_image($attachment_ids[0], 'full');
            } ?>


        </div>
        <div class="product-properties">
            <h5 class="product-name"><?= get_the_title($product_id) ?></h5>
            <div class="product-sku"><?= $product->get_sku() ?></div>
            <h6 class="product-price"><?= $product->get_price_html() ?></h6>
        </div>
    </div>
</a>