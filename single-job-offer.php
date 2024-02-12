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
</main>
<?php get_footer() ?>