<?php /* Template Name: Front Page */ ?>

<?php get_header(null, ['backabsolute' => true]); ?>


<main class="home">

    <?php get_template_part('/templates/pages/home/slider') ?>
    <?php get_template_part('/templates/pages/home/banner') ?>
    <?php get_template_part('/templates/pages/home/products') ?>
    <?php get_template_part('/templates/pages/home/importance') ?>
    <?php get_template_part('/templates/pages/home/travel') ?>
    <?php get_template_part('/templates/pages/home/club') ?>
    <?php get_template_part('/templates/pages/home/blogs') ?>

</main>

<?php get_footer() ?>