<?php get_header(); ?>
<?php
$contact_us = null !== get_field('contact_us_properties') ? get_field('contact_us_properties') : '';
$contact_us_description = isset($contact_us['page_description']) ? $contact_us['page_description'] : '';
$contact_us_address_title = isset($contact_us['location_title']) ? $contact_us['location_title'] : '';
$contact_us_address = isset($contact_us['location_address']) ? $contact_us['location_address'] : '';

$front_page_id = get_option('page_on_front');
$phone = get_field("phone", $front_page_id);
if (!empty($phone)) {
    $phone_number_1 = $phone['phone_1'];
    $phone_number_2 = $phone['phone_2'];
    $phone_number_3 = $phone['phone_3'];
}

/*Template Name: Contact-us Page */
?>
<main class="contact-us-page">
    <div class="container">
        <div class="page-thumbnail">
            <?php if (!empty(get_the_post_thumbnail())) : ?>
                <?php the_post_thumbnail() ?>
            <? else : ?>
                <img src="<?= get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" />
            <?php endif ?>
        </div>
        <div class="form-wrapper">
            <div class="login-form">
                <div class="title"><?= get_the_title() ?></div>
                <?php check_empty($contact_us_description, 'description'); ?>
                <?php get_template_part('/templates/components/forms/contact-us'); ?>
                <? if (!empty($contact_us_address)) {
                    check_empty($contact_us_address_title, 'title');
                    check_empty($contact_us_address, 'description address');
                } ?>
            </div>

            <div class="phone">
                <?php if (!empty($phone['phone_1'])) : ?>

                    <a href="<?= 'tel:' . $phone['phone_1']; ?>" class="phone-number">
                        <?= $phone['phone_1'] ?>
                    </a>

                <?php endif; ?>

                <?php if (!empty($phone['phone_2'])) : ?>

                    <a href="<?= 'tel:' . $phone['phone_2']; ?>" class="phone-number">
                        <?= $phone['phone_2'] ?>
                    </a>

                <?php endif; ?>

                <?php if (!empty($phone['phone_3'])) : ?>

                    <a href="<?= 'tel:' . $phone['phone_3']; ?>" class="phone-number">
                        <?= $phone['phone_3'] ?>
                    </a>

                <?php endif; ?>
            </div>



        </div>
    </div>
</main>
<?php get_footer(); ?>