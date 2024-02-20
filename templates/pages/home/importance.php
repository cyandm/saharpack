<?php
$title_importance = get_field('title_importance');
$images_importance = get_field('images_importance');
$text_importance = get_field('text_importance');
?>

<section class="importance">
    <div class="importance__content container">

        <div class="importance__content__title">
            <h2 class="titles-home"><span><?= $title_importance ?></span></h2>
        </div>

        <div class="importance__content__img">

            <?php foreach ($images_importance as $img_importance) : ?>

                <div>
                    <?= wp_get_attachment_image($img_importance, 'full'); ?>
                </div>

            <?php endforeach ?>

        </div>

        <div class="importance__content__text">

            <?= $text_importance ?>

        </div>

    </div>
</section>