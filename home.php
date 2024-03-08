<?php get_header() ?>
<?php
$all_blogs = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
]);
?>
<main class="all-blogs-page  ">
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb-product container">
            <?php if (function_exists('rank_math_the_breadcrumbs'))
                rank_math_the_breadcrumbs(); ?>
        </div>
        <i class="divider"></i>
    </div>
    <?php if ($all_blogs->have_posts()) :  ?>
    <section class="best-blog container">
        <?php
            while ($all_blogs->have_posts()) {
                $all_blogs->the_post();
                get_template_part('/templates/components/cards/blogs', 'card');
            }
            ?>
    </section>
    <?php endif  ?>

</main>
<?php get_footer() ?>