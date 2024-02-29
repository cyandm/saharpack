<?php
/*Template Name: Alert Login Page */
$login = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/login.php'
];
$login_link = get_permalink(get_posts($login)[0]);

if (!(is_user_logged_in())) {
    wp_redirect($login_link); // @need : back to last url
    exit();
}

$prePass = constant('SECURE_AUTH_KEY');

$pageCondition = $_POST
    && isset($_POST["user_tel"])
    && isset($_POST['user_name']);

$otpCondition  = $_POST
    && isset($_POST["user_tel_h"])
    && isset($_POST["otp_inp"]);

$params = array();
$alerts = array();



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
<?php get_header(null, ['login_page' => true]); ?>

<main class="alert-login-page container">
    <?php //check_empty($contact_us_description, 'description'); 
    ?>
    <!-- <div class="welcome-section dynamic-section">
         <div class="title"><?= pll__('welcome') ?></div>
        <div class="button-group">
            <a class="btn" variant="primary"><?= pll__('user-dashboard') ?></a>
            <a class="btn" variant="secondary" href="/"><?= pll__('exit') ?></a>
        </div>
    </div> -->
    <div class="welcome-section dynamic-section">
        <?php if (count($alerts) > 0) : ?>
            <!-- <div class="title"><?= pll__('welcome') ?></div> -->
            <?php foreach ($alerts as $alert) : ?>
                <div class="">
                    <p class="title"><?= $alert; ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="button-group">
            <a class="btn" variant="primary"><?= pll__('حساب کاربری') ?></a>
            <a class="btn" variant="secondary" href="<?= wp_logout_url() ?>"><?= pll__('exit') ?></a>
        </div>
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