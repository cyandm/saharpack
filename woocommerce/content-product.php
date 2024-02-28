<?php


defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<div>
    <?php
    $product_name = $product->get_name();
    $product_image = $product->get_image(["full", 700]);
    $product_id = $product->get_id();
    $product_permalink = $product->get_permalink();

    $product->is_type('variable') && $all_variations = $product->get_variation_attributes();

    /*Check If Product is On Sale for prices 
    note: in products what not on sale $sale_price = $regular_price
    */
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
    ?>

    <div class="product-card bg-white p-2 rounded mx-auto">

        <div class="relative">
            <a href="<?php echo $product_permalink ?>">
                <?php echo $product_image ?>
            </a>
            <?php if ($product->is_on_sale()) : ?>
                <span class="offer bg-primary-900 text-white rounded-tl rounded-br absolute left-0 top-0 p-2 max-sm:p-1 max-sm:text-sm">%
                    <?php echo $discount ?>
                </span>
            <?php endif; ?>

            <!-- Product Variables-->
            <?php if ($product->is_type('variable')) : ?>
                <div class="variables absolute bottom-0 w-full bg-white gap-2 p-1  transition-all z-0 max-md:hidden">
                    <div class="productCardVars overflow-x-scroll flex gap-4 px-7">
                        <i data-feather="chevron-right" class="absolute right-0 bg-white hover:bg-primary-900 hover:text-white transition-all productCardRightArrow"></i>
                        <?php

                        foreach ($all_variations as $key => $variations) {
                            foreach ($variations as $variation) {
                        ?>
                                <a href="<?php echo $product_permalink . '?' . $key . '=' . $variation ?>" class="uppercase min-w-fit">
                                    <?php echo str_replace("-", " ", urldecode($variation)); ?>
                                </a>

                        <?php
                            }
                        }
                        ?>
                        <i data-feather="chevron-left" class="absolute left-0  bg-white hover:bg-primary-900 hover:text-white transition-all productCardLeftArrow"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="grid gap-1 bg-white z-10 relative">
            <a href="<?php echo $product_permalink ?>" class="my-2 max-sm:text-xs max-sm:text-ellipsis max-sm:whitespace-nowrap max-sm:overflow-hidden">
                <?php echo $product_name; ?>
            </a>
            <div class="flex justify-end gap-1 max-sm:text-xs">
                <?php if ($product->is_in_stock()) : ?>
                    <span class="no-currency">
                        <?php if ($product->is_on_sale()) {
                            echo (wc_price($regular_price));
                        } ?>
                    </span>
                    <?php echo (wc_price($sale_price)) ?>
                <?php else : ?>
                    <p class="stock out-of-stock">ناموجود</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>