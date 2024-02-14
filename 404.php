<?php get_header(); ?>


<?php

$front_page_id = get_option('page_on_front');
$notfound_img = get_field('notfound_img', $front_page_id);
$notfound_text = get_field('notfound_text', $front_page_id);
$notfound_btn = get_field('notfound_btn', $front_page_id);

?>

<main class="container">

    <section class="err-page">

        <div class="err-page__content">

            <div class="err-page__content__img">

                <?= wp_get_attachment_image($notfound_img['ID'], 'full') ?>

            </div>

            <div class="err-page__content__text">
                <p><?= $notfound_text ?></p>
            </div>

            <div class=" err-page__content__btn">
                <a href="/" class="btn" variant='primary' size='big'><?= $notfound_btn ?></a>
            </div>


        </div>

    </section>

</main>

<?php get_footer(); ?>