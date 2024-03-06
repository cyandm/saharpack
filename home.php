<?php get_header() ?>
<?php
$all_blogs = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
]);
?>
<main class="all-blogs-page blog-main  container">
    <?php if ($all_blogs->have_posts()) :  ?>
        <section>
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