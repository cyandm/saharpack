<form action="" id="job-offer-form">
    <div class="input-primary">
        <i class="iconsax" icon-name="user-2"></i>
        <input class="  data" type="text" name="name" placeholder="<?= pll__('your-name') ?>" required>
    </div>
    <div class="input-primary">
        <i class="iconsax" icon-name="phone"></i>
        <input class=" data" type="tel" name="phone-number" placeholder="<?= pll__('phone-number') ?>" required>
    </div>
    <div class="input-primary input-file">
        <input class=" data" type="file" name="file" accept=".pdf" placeholder="<?= pll__('phone-number') ?>" required>
        <i class="iconsax" icon-name="link-circle"></i>
    </div>
    <div class="input-primary">
        <i class="iconsax" icon-name="message-dash-2"></i>
        <textarea class="data" rows="5" name="describe" placeholder="<?= pll__('about-yourself') ?>" required></textarea>
    </div>
    <input type="hidden" value="<?= get_the_title() ?>" rows="5" name="job-position" />
    <button id="job-offer-form-submit" class="btn" variant="primary" type="submit"><?= pll__('send-request') ?></button>
</form>