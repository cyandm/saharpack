<?php get_header() ?>
<?php

$cats = get_categories([
    'taxonomy' => 'product_cat',
    'orderby' => 'id',
    'hide_empty' => true,
]);

$cat_id = (isset(get_queried_object()->term_id)) ? get_queried_object()->term_id : '';


?>
<main class="archive-product-page product-page">
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb-product container">
            <?php if (function_exists('rank_math_the_breadcrumbs'))
                rank_math_the_breadcrumbs(); ?>
        </div>
        <!-- <i class="divider"></i> -->
    </div>
    <section class="container products-container">

        <?php if ($cats) : ?>
            <div class="category-and-search">
                <form action="/" class="search-input">
                    <div class="input-primary">
                        <i class="iconsax" icon-name="search-normal-1"></i>
                        <input placeholder="<?= pll__('search') ?>" type="text" id="searchPageInput" name="s" value="<?php the_search_query() ?>">
                    </div>

                </form>
                <div class="input-primary">
                    <select id="productDropDown">
                        <?php for ($i = 0; $i < count($cats); $i++) : ?>
                            <option <?php if ($cat_id === $cats[$i]->term_id) echo 'selected' ?> data-uri="<?= get_category_link($cats[$i]->term_id) ?>"><?= $cats[$i]->name ?></option>
                        <?php endfor ?>
                    </select>
                </div>
            </div>
        <?php endif ?>
        <?php if (have_posts()) : ?>
            <div class="products-wrapper">
                <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('templates/components/cards/product');
                }
                ?>
            </div>
        <?php endif; ?>
    </section>
    <?php wp_reset_postdata() ?>
</main>
<?php get_footer() ?>