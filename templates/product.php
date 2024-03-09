<?php /* Template Name: Product Page */ ?>

<?php
$cats = get_categories([
    'taxonomy' => 'product_cat',
    'orderby' => 'id',
    'hide_empty' => true,
]);


$last_product = new WP_Query(
    [
        'post_type' => 'product',
        'posts_per_page' => 10,
        'orderby'   => 'post_date',
    ]
);


?>


<?php get_header() ?>


<main class="product-page">
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb-product container">
            <?php if (function_exists('rank_math_the_breadcrumbs'))
                rank_math_the_breadcrumbs(); ?>
        </div>
        <i class="divider"></i>
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
                        <option disabled selected><?= pll__('select-category') ?></option>

                        <?php for ($i = 0; $i < count($cats); $i++) : ?>
                            <option data-uri="<?= get_category_link($cats[$i]->term_id) ?>"><?= $cats[$i]->name ?></option>
                        <?php endfor ?>
                    </select>
                </div>
            </div>
        <?php endif ?>
        <?php if ($last_product->have_posts()) : ?>
            <div class="products-wrapper">
                <?php
                while ($last_product->have_posts()) {
                    $last_product->the_post();
                    get_template_part('templates/components/cards/product');
                }
                ?>
            </div>
        <?php endif; ?>
    </section>
    <?php wp_reset_postdata() ?>
</main>

<?php get_footer() ?>