<?php

/****************************** Required Files */
require_once(__DIR__ . '/inc/functions/cyn-theme-init.php');
require_once(__DIR__ . '/inc/functions/cyn-register.php');
require_once(__DIR__ . '/inc/functions/cyn-customize.php');
require_once(__DIR__ . '/inc/functions/cyn-acf.php');
require_once(__DIR__ . '/inc/functions/cyn-general.php');
require_once(__DIR__ . '/inc/functions/cyn-translate.php');
require_once(__DIR__ . '/inc/functions/cyn-form.php');
require_once(__DIR__ . '/inc/functions/cyn-sms.php');
require_once(__DIR__ . '/inc/functions/cyn-ajax-general.php');
require_once(__DIR__ . '/inc/functions/cyn-search.php');
require_once(__DIR__ . '/inc/functions/cyn-meta-box.php');
require_once(__DIR__ . '/inc/functions/cyn-woocommerce.php');
require_once(__DIR__ . '/inc/functions/cyn-update-checker.php');


add_action('pre_get_posts', 'customize_query');

function customize_query($query)
{
    if (is_archive('product')) {
        $query->set('posts_per_page', 6);
    }
}
