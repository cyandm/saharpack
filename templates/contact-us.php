<?php get_header(); ?>
<?php
$contact_us = null !== get_field('contact_us_properties') ? get_field('contact_us_properties') : '';
$contact_us_description = isset($contact_us['page_description']) ? $contact_us['page_description'] : '';
$contact_us_address_title = isset($contact_us['location_title']) ? $contact_us['location_title'] : '';
$contact_us_address = isset($contact_us['location_address']) ? $contact_us['location_address'] : '';


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

            <div class="enter-code-form">

            </div>
            <div class="welcome-user">

            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>