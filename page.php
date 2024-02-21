<?php get_header() ?>

<main class="default-page container">
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb-product container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
        <i class="divider"></i>
    </div>
    <?php the_content() ?>
</main>

<?php get_footer() ?>