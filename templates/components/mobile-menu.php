<?php
$login = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/login.php'
];
$login_link = get_permalink(get_posts($login)[0]);

global $current_user;

?>
<div class="menu-handler">
    <i class="iconsax icon-menu" icon-name="hamburger-menu" id="mobileMenuToggle"></i>
</div>

<div class="mobile-menu" id="mobileMenu">

    <div class="mobile-menu__item">

        <div id="langSwitcher" class="width-lang">
            <?php
            get_template_part('/templates/components/lang-switcher');
            ?>
        </div>

        <?php if (is_user_logged_in()) : ?>

            <div class="mobile-menu__item__btn">

                <span class="is-login"><?= pll__("you_login_with_the_number") . " " . $current_user->user_nicename . " " . pll__("you_logged")  ?> </span>

                <a href="<?= $args['page_my_order_link'] ?>" class="btn tracking" variant="secondary">
                    <?php pll_e('order-tracking'); ?>
                </a>

            </div>

        <?php endif ?>

        <?php if (!is_user_logged_in()) : ?>

            <a href="<?= $login_link ?>" class="btn tracking" variant="secondary">
                <?php pll_e('login-or-signup'); ?>
            </a>

        <?php endif ?>

    </div>


    <div class="mobile-menu-nav">
        <?php wp_nav_menu([
            'theme_location' => 'header'
        ]) ?>
    </div>
</div>