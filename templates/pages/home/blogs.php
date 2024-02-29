<?php
$title_blogs = get_field('title_blogs');

$blogs_new = new WP_Query([
    'post_type' => 'post',
    'post_per_page' => 4,
]);

?>

<?php if($blogs_new->have_posts()): ?>
<section class="home-blogs">

    <div class="home-blogs__content container">

        <div class="home-blogs__content__title">
            <h2 class="titles-home"><span><?= $title_blogs ?></span></h2>
        </div>

        <div class="blog-head">

        </div>

        <?php while ($blogs_new->have_posts()) {
                $blogs_new->the_post();
                $post_id = get_the_ID();
        } ?>

    </div>

</section>
<?php endif; ?>