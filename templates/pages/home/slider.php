<?php
$front_page_id = get_option('page_on_front');
$sliders = get_field("sliders");
?>

<?php if (isset($sliders)) : ?>

    <section class="slider swiper" id="sliderHero">

        <div class="swiper-wrapper">

            <?php foreach ($sliders as $slider) : ?>

                <div class="slider__content swiper-slide">

                    <div class="slider__content__back">
                        <?= wp_get_attachment_image($slider['image'], 'full') ?>
                    </div>

                    <div class="slider__content__front">

                        <div class="slider__content__front__text">

                            <?= $slider['text'] ?>

                        </div>

                        <div class="slider__content__front__img">

                            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/logo-slider.png' ?>" alt="">

                        </div>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </section>

<?php endif ?>