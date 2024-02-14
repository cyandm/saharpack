<?php get_header() ?>
<main class="product-page">
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb-product container">
            <?php if (function_exists('rank_math_the_breadcrumbs'))
                rank_math_the_breadcrumbs(); ?>
        </div>
        <i class="divider"></i>
    </div>
</main>
<?php get_footer() ?>