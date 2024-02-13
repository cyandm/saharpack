<?php get_header(null, ['login_page' => true]); ?>
<?php
/*Template Name: Login Page */

$userLink = get_permalink(get_option('woocommerce_myaccount_page_id')) . 'orders';
// if (is_user_logged_in()) {
//     wp_redirect($userLink); // @need : back to last url
//     exit();
// }

$prePass = constant('SECURE_AUTH_KEY');

$pageCondition = $_POST
    && isset($_POST["user_tel"])
    && isset($_POST['user_name']);

$otpCondition  = $_POST
    && isset($_POST["user_tel_h"])
    && isset($_POST["otp_inp"]);

$params = array();
$alerts = array();

$otp_link_template = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/otp.php'
];
$page_otp_link = get_permalink(get_posts($otp_link_template)[0]);

if ($pageCondition) {
    $tel = substr((string)$_POST["user_tel"], -10);
    $params["user_tel"] = $tel;
    $is_user = username_exists($tel);
    $user = get_user_by('login', $tel);

    if ($is_user == false && $user == false) {
        $newUser = wp_create_user(
            $tel,
            $prePass . "-" . $tel
        );

        if (!is_wp_error($newUser)) {
            $newOtp = rand(100000, 999999);
            $currentTime = current_time('timestamp');

            update_user_option($newUser, 'show_admin_bar_front', false);
            $addMeta = update_user_meta($newUser, "cyn_otp", array('otp' => $newOtp, 'time' => $currentTime));

            if ($addMeta != false) {
                cyn_send_verification(array($tel), $newOtp);
            } else {
                $alerts[] = 'مشکلی در ذخیره داده ها به وجود آمده. لطفا دوباره امتحان کنید';
            }
        } else {
            $alerts[] = 'مشکلی در ایجاد کاربر به وجود آمده. لطفا دوباره امتحان کنید.';
        }
    } else {
        $userID = $user->ID;
        $newOtp = rand(100000, 999999);
        $currentTime = current_time('timestamp');

        $addMeta = update_user_meta($userID, "cyn_otp", array('otp' => $newOtp, 'time' => $currentTime));

        if ($addMeta != false) {
            cyn_send_verification(array($tel), $newOtp);
        } else {
            $alerts[] = 'مشکلی در ذخیره داده ها به وجود آمده. لطفا دوباره امتحان کنید';
        }
    }
}


if ($otpCondition) {
    $otp = (int)$_POST["otp_inp"];

    $tel = substr((string)$_POST["user_tel_h"], -10);
    $user = get_user_by('login', $tel);

    if ($user != false) {
        $userID = $user->ID;
        $metaOtp = get_user_meta($userID, 'cyn_otp', true);
        $currentTime = current_time('timestamp');

        if ($otp == $metaOtp['otp'] && ($currentTime - $metaOtp['time']) < 300) {
            $signon = wp_signon(array(
                'user_login' => $tel,
                'user_password' => $prePass . "-" . $tel,
                'remember' => true
            ));

            if (!is_wp_error($signon)) {
                update_user_meta($userID, "cyn_otp", "");
                wp_redirect($userLink);
                exit();
            } else {
                $alerts[] = 'مشکلی در ورود به وجود آمده. لطفا دوباره امتحان کنید';
            }
        } else {
            $alerts[] = 'رمز وارد شده صحیح نمیباشد یا زمان آن به اتمام رسیده';
        }
    } else {
        $alerts[] = 'کاربر مورد نظر پیدا نشد';
    }
}

?>
<main class="login-page container">
    <div class="form-wrapper" id="formWrapper">
        <?php //check_empty($contact_us_description, 'description'); 
        ?>
        <form action="<?= $page_otp_link ?>" method="post" id="login-form">
            <?php if (!$pageCondition) : ?>
                <div class="title"><?= pll__('login-or-signup') ?></div>
                <div class="input-primary">
                    <i class="iconsax" icon-name="user-2"></i>
                    <input class="data" type="text" name="user_name" placeholder="<?= pll__('your-name') ?>" required>
                </div>
                <div class="input-primary">
                    <i class="iconsax" icon-name="phone"></i>
                    <input pattern="[0]{1}[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" class=" data" type="tel" name="user_tel" placeholder="<?= pll__('phone-number') ?>" required>
                </div>

            <?php else : ?>
                <div class="input-primary">
                    <i class="iconsax" icon-name="user-2"></i>
                    <input class="data" type="text" name="user_name" placeholder="<?= pll__('your-name') ?>" required>
                </div>
                <div class="input-primary">
                    <i class="iconsax" icon-name="phone"></i>
                    <input pattern="[0]{1}[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" class=" data" type="tel" name="user_tel" id="user_tel_inp" value="<?= isset($params["user_tel"]) ? $params["user_tel"] : ''; ?>" placeholder="<?= pll__('phone-number') ?>" required>
                </div>
                <input class="data" type="hidden" name="user_tel_h" value="<?= isset($params["user_tel"]) ? $params["user_tel"] : ''; ?>" required>

            <?php endif ?>
            <button id="login-form-submit send_otp" class="btn" variant="primary" type="submit"><?= pll__('continue') ?></button>


            <!-- <?php if (!$pageCondition) : ?>
                <button id="login-form-submit send_otp" class="btn" variant="primary" type="submit"><?= pll__('continue') ?></button>

            <?php else : ?>
                <button id="login-form-submit otp_timer" class="btn" variant="primary" type="button" disabled><?= pll__('continue') ?></button>

            <?php endif; ?> -->

            <!-- <button id="login-form-submit" class="btn" variant="primary" type="submit"><?= pll__('continue') ?></button> -->


            <?php if ($pageCondition) : ?>
                <div class="otp-inputs" id="otp-inputs">
                    <input class="data input-primary" type="number" name="otp_inp" min="100000" max="999999" maxlength="6" required>
                    <input class="data" type="hidden" name="number-and-name" value="" required>
                </div>
                <button id="login-form-submit submit_otp" class="btn" type="submit" variant="primary"><?= pll__('continue'); ?></button>
            <?php endif; ?>

            <?php if (count($alerts) > 0) : ?>

                <div class="welcome-section dynamic-section">
                    <!-- <div class="title"><?= pll__('welcome') ?></div> -->
                    <?php foreach ($alerts as $alert) : ?>
                        <div class="">
                            <p class="title"><?= $alert; ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="button-group">
                        <a class="btn" variant="primary"><?= pll__('user-dashboard') ?></a>
                        <a class="btn" variant="secondary" href="/"><?= pll__('exit') ?></a>
                    </div>
                </div>

            <?php endif; ?>

        </form>
    </div>
    <div class="page-thumbnail">
        <?php if (!empty(get_the_post_thumbnail())) : ?>
            <?php the_post_thumbnail() ?>
        <? else : ?>
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" />
        <?php endif ?>
    </div>
</main>
<?php get_footer(); ?>