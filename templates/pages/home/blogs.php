<?php
$title_blogs = get_field('title_blogs');

$blogs_new = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 4,
    'current_category' => 1,
]);

$blogs_learn = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 4,
    'category_name' => 'educational',
]);

$blogs_favorites = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 4,
    'category_name' => 'favorites',
]);

$blog_page_link = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/blog.php'
];
$page_blog = get_posts($blog_page_link);
?>


<section class="home-blogs">

    <div class="home-blogs__content container blog-archive">

        <div class="home-blogs__content__title">
            <h2 class="titles-home"><span><?= $title_blogs ?></span></h2>
        </div>

        <div class="home-blogs__content__header blog-head">

            <div class="tabs__handler">

                <button class="tabs__handler__btn active" data-tab="0"><?php pll_e("جدیدترین ها") ?></button>
                <button class="tabs__handler__btn" data-tab="1"><?php pll_e("آموزشی") ?></button>
                <button class="tabs__handler__btn" data-tab="2"><?php pll_e("مجبوب‌ترین ها") ?></button>

            </div>

            <a href="<?= get_permalink($page_blog[0]); ?>" class="btn btn-slider__desktop" size='have-underline'><?php pll_e("مشاهده همه") ?></a>
        </div>

        <div class="home-blogs__content__items">


            <div class="tabs__content">

                <div class="tabs__content__item active" data-tab="0">

                    <div class="blog-main">

                        <?php while ($blogs_new->have_posts()) {
                            $blogs_new->the_post();
                            $post_id = get_the_ID();

                            get_template_part('/templates/components/cards/blogs', '2', ['post_id' => $post_id]);
                        } ?>
                        <?php wp_reset_postdata() ?>

                    </div>

                </div>

                <div class="tabs__content__item" data-tab="1">

                    <div class="blog-main">

                        <?php while ($blogs_learn->have_posts()) {
                            $blogs_learn->the_post();
                            $post_id = get_the_ID();

                            get_template_part('/templates/components/cards/blogs', '2', ['post_id' => $post_id]);
                        } ?>
                        <?php wp_reset_postdata() ?>

                    </div>

                </div>

                <div class="tabs__content__item" data-tab="2">

                    <div class="blog-main">

                        <?php while ($blogs_favorites->have_posts()) {
                            $blogs_favorites->the_post();
                            $post_id = get_the_ID();

                            get_template_part('/templates/components/cards/blogs', '2', ['post_id' => $post_id]);
                        } ?>
                        <?php wp_reset_postdata() ?>

                    </div>

                </div>

            </div>


            <div class="tabs__item">

                <div class="swiper swiper-container tabs__content__item active" data-tab="0">
                    <div class="swiper-wrapper">
                        <?php
                        while ($blogs_new->have_posts()) {
                            $blogs_new->the_post();
                            $post_id = get_the_ID();
                            get_template_part('/templates/components/cards/blog', 'slider', ['post_id' => $post_id]);
                        }
                        ?>
                        <?php wp_reset_postdata() ?>


                    </div>

                    <div class="swiper-pagination"></div>

                </div>


                <div class="swiper swiper-container tabs__content__item" data-tab="1">
                    <div class="swiper-wrapper">
                        <?php
                        while ($blogs_learn->have_posts()) {
                            $blogs_learn->the_post();
                            $post_id = get_the_ID();
                            get_template_part('/templates/components/cards/blog', 'slider', ['post_id' => $post_id]);
                        }
                        ?>
                        <?php wp_reset_postdata() ?>


                    </div>

                    <div class="swiper-pagination"></div>

                </div>


                <div class="swiper swiper-container tabs__content__item" data-tab="2">
                    <div class="swiper-wrapper">
                        <?php
                        while ($blogs_favorites->have_posts()) {
                            $blogs_favorites->the_post();
                            $post_id = get_the_ID();
                            get_template_part('/templates/components/cards/blog', 'slider', ['post_id' => $post_id]);
                        }
                        ?>
                        <?php wp_reset_postdata() ?>


                    </div>

                    <div class="swiper-pagination"></div>

                </div>


            </div>




            <a href="/blog" class="btn btn-slider__mobile" size='have-underline'><?php pll_e("مشاهده همه") ?></a>

        </div>

    </div>

</section>