<?php /* Template Name: Shopping guide Page */ ?>

<?php
$title = get_field('title');
$video_link = get_field('video_link');
$video_file = get_field('video_file');
$cover_video = get_field('cover_video');
$cover_text = get_field('cover_text');
$description = get_field('description');
?>

<?php get_header(); ?>

<main>
    <div class="container">
        <section class="shop-guide">

            <div class="shop-guide__content">
                <?php if ($title) : ?>
                    <div class="shop-guide__content__title">

                        <h1><span><?= $title ?></span></h1>

                    </div>
                <?php endif ?>


                <div class="shop-guide__content__item">


                    <?php
                    $video_show = !$video_file && !$video_link;

                    if (!$video_show) : ?>

                        <div class="shop-guide__content__item__video">

                            <video width="100%" height="100%" controls class="video">

                                <source src="<?= $video_link ?>" />
                                <source src="<?= $video_file ?>" />
                            </video>

                            <div class="video-cover" style="background-image: url(<?= $cover_video ?>);">
                                <i class="iconsax" icon-name="play"></i>
                                <p><?= $cover_text ?></p>
                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if (!empty($description)) : ?>

                        <div class="shop-guide__content__item__description">

                            <?= $description ?>

                        </div>

                    <?php endif; ?>

                </div>


        </section>
    </div>
</main>

<?php get_footer(); ?>