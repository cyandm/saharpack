<?php

$job_offer = new WP_Query([
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/job-offer.php'
]);


wp_redirect(get_permalink($job_offer->posts[0]));
