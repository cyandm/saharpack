<?php /*Template Name: Journey Page */ ?>
<?php get_header() ?>

<?php
$title = get_field('title');
$levels = get_field('levels');
$text = get_field('text');
$img = get_field('img');
?>




<main>
    <div class="container">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumb-product container">
                <?php if (function_exists('rank_math_the_breadcrumbs'))
                    rank_math_the_breadcrumbs(); ?>
            </div>
            <i class="divider"></i>
        </div>

        <section class="journey">

            <div class="journey__title">
                <h1><span><?= $title ?></span></h1>
            </div>

            <div class="scroll-line">

                <?php if (isset($levels)) : ?>

                    <div class="journey__content">

                        <?php foreach ($levels as $level) : ?>

                            <div class="journey__content__card">
                                <div class="journey__content__card__details">

                                    <div class="journey__content__card__details__title">
                                        <h3><?= $level['title'] ?></h3>
                                    </div>


                                    <div class="journey__content__card__details__description">
                                        <?= $level['description'] ?>
                                    </div>

                                </div>

                                <div class="journey__content__card__img">
                                    <?= wp_get_attachment_image($level['img'], 'full') ?>
                                </div>

                            </div>

                        <?php endforeach ?>

                    </div>
                <?php endif ?>


                <?php if (isset($img) && isset($text)) : ?>
                    <div class="journey__end">

                        <div class="journey__end__img">
                            <?= wp_get_attachment_image($img, 'full') ?>
                        </div>

                        <div class="journey__end__text">
                            <h3><?= $text ?></h3>
                        </div>

                    </div>
                <?php endif ?>
            </div>

        </section>
    </div>
</main>


<?php get_footer(); ?>