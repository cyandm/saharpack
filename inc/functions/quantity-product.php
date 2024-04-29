<?php

add_action('pre_get_posts', 'customize_query');

function customize_query($query)
{
    if (!is_admin() && is_archive('product')) {
        $query->set('posts_per_page', 6);
    }
}
