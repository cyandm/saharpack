<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>


    <!-- raychat  -->
    <script type="text/javascript">
        window.RAYCHAT_TOKEN = "9509744a-5e5a-4c56-ae05-b82c208aa1f5";
        window.LOAD_TYPE = "SEO_FRIENDLY";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://widget-react.raychat.io/install/widget.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>


</head>


<!-- if change position header -->
<?php
$backabsolute = false;
$login_page = false;
isset($args['backabsolute']) && $backabsolute = $args['backabsolute'];
isset($args['login_page']) ? $login_page = true : $login_page = false;
$login = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/login.php'
];
$login_link = get_permalink(get_posts($login)[0]);

$my_order_template = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/my-order.php'
];

$page_my_order_link = get_permalink(get_posts($my_order_template)[0]);

?>

<body <?php body_class() ?>>
    <?php wp_body_open() ?>
    <span id="mouse"></span>

    <header class="header ">

        <section class="container<?php if ($login_page) echo 'login_page' ?> <?php echo $backabsolute == true ? 'backabsolute' : '' ?>">

            <?php get_template_part('/templates/components/mobile-menu', null, ['page_my_order_link' => $page_my_order_link]) ?>


            <div class="right-header">

                <div class="right-header__logo">
                    <?php the_custom_logo(); ?>
                </div>

                <div class="right-header__menu">
                    <?php wp_nav_menu(
                        [
                            'theme_location' => 'header',
                            'menu_class' => 'header-menu',
                        ]
                    ); ?>
                </div>

            </div>

            <div class="left-header">

                <div id="langSwitcher">
                    <?php
                    get_template_part('/templates/components/lang-switcher');
                    ?>
                </div>

                <div class="left-header__left-item">

                    <?php if (!is_user_logged_in()) : ?>
                        <a href="<?= $login_link ?>" class="left-header__left-item__login-btn">
                            <i class="iconsax" icon-name="login-2"></i>
                        </a>
                    <?php endif ?>

                    <?php if (is_user_logged_in()) : ?>
                        <div class="left-header__left-item__login-btn has-children menu-item-has-children">
                            <i class="iconsax" icon-name="user-2"></i>

                            <div class="children sub-menu">
                                <div>
                                    <ul>
                                        <li>
                                            <a href="<?= $page_my_order_link ?>">
                                                <?php pll_e("order-tracking") ?>
                                            </a>
                                        </li>


                                        <li>
                                            <a href="<?= wp_logout_url(home_url()) ?>">
                                                <?php pll_e("exit") ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    <?php endif ?>

                    <a href="/?s" class="left-header__left-item__search-btn">
                        <i class="iconsax" icon-name="search-normal-2"></i>
                    </a>

                    <a href="<?= esc_url(wc_get_cart_url()); ?>" class="left-header__left-item__cart-btn btn hoverable" variant="primary">
                        <i class="iconsax" icon-name="shopping-cart"></i>
                    </a>

                </div>

            </div>

        </section>
        <section class="container login-header <?php if ($login_page) echo 'login-page' ?>">
            <div class="right-header__logo">
                <?php the_custom_logo(); ?>
            </div>
            <button onclick="history.back()" class="btn" variant="secondary">
                <i class="iconsax" icon-name="arrow-left"></i>
            </button>
        </section>

    </header>