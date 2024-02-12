<?php get_header() ?>
<?php
/*Template Name: Job Offer Page */

$page_title = !empty(get_field('job_offer_page')['page_title']) ? get_field('job_offer_page')['page_title'] : pll__('job-offer-title');
$description_title = !empty(get_field('job_offer_page')['description_title']) ? get_field('job_offer_page')['description_title'] : '';

$selected_job_offers = get_field('job_offer_page')['selected_job'];

$last_job_offers = new WP_Query([
    'post_type' => 'job-offer',
    'post_per_page' => 4,
    'post_status' => ['publish']

]);

?>
<main class="job-offer-page container">
    <section class="hero-section">
        <div class="title-has-line">
            <i></i>
            <p class="h1"><?= $page_title ?></p>
            <i></i>
        </div>
        <?php if (!empty(get_the_post_thumbnail())) : ?>
            <div class="page-thumbnail">
                <?php the_post_thumbnail('full') ?>
            </div>
        <?php endif ?>
        <?php if (!empty(get_the_content())) : ?>
            <div class="description-job-offer">
                <div class="h2"><?= $description_title ?></div>
                <?php the_content() ?>
            </div>
        <?php endif ?>
    </section>
    <?php if (!empty($selected_job_offers) || ($last_job_offers->have_posts())) : ?>
        <section class="selected-jobs">
            <div class="title-has-line">
                <i></i>
                <p class="h1"><?= pll__('job-offer-selected-title') ?></p>
                <i></i>
            </div>
            <div class="jobs-container">

                <?php
                if ($selected_job_offers !== false) {
                    foreach ($selected_job_offers as $job_id) {
                        get_template_part('/templates/components/cards/job-offer', null, ['post_id' => $job_id]);
                    }
                } else {
                    if ($last_job_offers->have_posts()) {
                        while ($last_job_offers->have_posts()) {
                            $last_job_offers->the_post();
                            get_template_part('/templates/components/cards/job-offer');
                        }
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </section>
    <?php endif ?>

</main>


<?php get_footer() ?>