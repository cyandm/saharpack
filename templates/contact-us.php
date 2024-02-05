<?php get_header(); ?>
<?php
$contact_us_properties = get_field('contact_us_properties');
/*Template Name: Contact-us Page */
?>
<main class="contact-us-page container">
    <div>
        <?php if (!empty(get_the_post_thumbnail())) : ?>
            <?php the_post_thumbnail() ?>
        <? else : ?>
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" />
        <?php endif ?>
    </div>
    <div>
        <div class="title"><?= get_the_title() ?></div>
        <div class="description"><?= get_the_title() ?></div>

        <form>

        </form>
    </div>
</main>
<?php get_footer(); ?>