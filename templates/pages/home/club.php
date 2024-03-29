<?php
$title_club = get_field('title_club');
$text_club = get_field('text_club');
$text_btn_club = get_field('text_btn_club');
$link_club = get_field('link_club');
$img_club = get_field('img_club');
$login = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/login.php'
];
$login_link = get_permalink(get_posts($login)[0]);
?>

<section class="club">

    <div class="club__content container">

        <div class="club__content__title">
            <h2 class="titles-home"><span><?= $title_club ?></span></h2>
        </div>

        <div class="club__content__items">
            <div class="flex-wrapper">

                <div class="club__content__items__text">
                    <?= $text_club ?>
                </div>

                <div class="club__content__items__btn">
                    <a href="<?= $login_link ?>" class="btn" variant='secondary'><?= $text_btn_club ?></a>
                </div>

            </div>

            <div class="club__content__items__img">
                <?= wp_get_attachment_image($img_club, 'full'); ?>
            </div>
        </div>

    </div>

</section>