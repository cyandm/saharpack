<?php
$title_travel = get_field('title_travel');
$text_travel = get_field('text_travel');
$text_btn_travel = get_field('text_btn_travel');
$link_travel = get_field('link_travel');
$img_travel = get_field('img_travel');
?>

<section class="travel">

    <div class="travel__content container">


        <div class="travel__content__title">
            <h2 class="titles-home"><span><?= $title_travel ?></span></h2>
        </div>

        <div class="travel__content__items">
            <div class="flex-wrapper">

                <div class="travel__content__items__text">
                    <?= $text_travel ?>
                </div>

                <div class="travel__content__items__btn">
                    <a href="<?= $link_travel ?>"><?= $text_btn_travel ?></a>
                </div>

            </div>

            <div class="travel__content__items__img">
                <?= wp_get_attachment_image($img_travel, 'full'); ?>
            </div>
        </div>

    </div>

</section>