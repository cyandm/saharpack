<?php get_header() ?>
<?php
$job_offer_template = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/job-offer.php'
];
$page_job_offer_link = get_permalink(get_posts($job_offer_template)[0]);

?>
<main class="single-job-offer-page">
    <div class="bread-crumb container">
        <span>
            <a href="<?= $page_job_offer_link ?>"><?= pll__('job-offer') ?></a>
            <i class="iconsax" icon-name="arrow-left"></i>
        </span>
        <?= pll__('request-form') ?>
    </div>
    <div class="divider"></div>
    <div class="job-detail-container container">
        <div class="title-has-line">
            <i></i>
            <p class="h1"><?= pll__('about-job-title') ?></p>
            <i></i>
        </div>
        <div class="job-thumbnail-and-description">
            <div class="job-thumbnail">
                <?php if (!empty(get_the_post_thumbnail())) : ?>
                    <?php the_post_thumbnail('full') ?>
                <? else : ?>
                    <img src="<?= get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" />
                <?php endif ?>
            </div>
            <div class="job-description-and-title">
                <h2><?= get_the_title() ?></h2>
                <div class="about-job"><?= get_the_content() ?></div>
            </div>
        </div>
    </div>
    <div class="job-offer-send-request container">
        <div class="title-has-line">
            <i></i>
            <p class="h1"><?= pll__('send-collaboration-request') ?></p>
            <i></i>
        </div>
        <div class="form-wrapper">

            <?php get_template_part('/templates/components/forms/job-offer') ?>
        </div>
    </div>
</main>
<?php get_footer() ?>