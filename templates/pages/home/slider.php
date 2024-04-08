<?php
$front_page_id = get_option('page_on_front');
$sliders = get_field("sliders");
$sign_logo = $sliders["sign_file"];
?>

<?php if (isset($sliders)) : ?>

    <section class="slider swiper" id="sliderHero">

        <div class="swiper-wrapper">

            <?php foreach ($sliders as $slider) :
                if (
                    !$slider['image_d'] ||
                    !$slider['image_m']
                ) continue;

            ?>

                <div class="slider__content swiper-slide">

                    <div class="slider__content__back s-desktop">
                        <?= wp_get_attachment_image($slider['image_d'], 'full') ?>
                    </div>

                    <div class="slider__content__back s-mobile">
                        <?= wp_get_attachment_image($slider['image_m'], 'full') ?>
                    </div>

                    <div class="slider__content__front">

                        <div class="slider__content__front__text">

                            <?= $slider['text'] ?>

                        </div>

                        <div class="slider__content__front__img">

                            <?= wp_get_attachment_image($sign_logo, 'full'); ?>

                        </div>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="swiper-pagination"></div>

    </section>

<?php endif ?>