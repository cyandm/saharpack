<?php
$post_id = isset($args['post_id']) ?  $args['post_id'] : get_the_ID();
?>
<div class="card-job-offer">
    <div class="job-offer-thumbnail">
        <?php if (!empty(get_the_post_thumbnail($post_id))) : ?>
            <?= get_the_post_thumbnail($post_id, 'full') ?>
        <? else : ?>
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" />
        <?php endif ?>
    </div>
    <div class="job-detail">
        <p class="h5"><?= get_the_title($post_id) ?></p>
        <div class="job-description"><?= get_the_excerpt($post_id) ?></div>
        <a href="<?= get_permalink($post_id) ?>" class="btn" variant="primary"><?= pll__('send-request') ?></a>
    </div>
</div>