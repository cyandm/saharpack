<form action="" id="contact-us-form">
    <div class="input-primary">
        <i class="iconsax" icon-name="phone"></i>
        <input class=" data" type="tel" name="phone-number" placeholder="<?= pll__('phone-number') ?>" required>
    </div>
    <div class="input-primary">
        <i class="iconsax" icon-name="user-2"></i>
        <input class="  data" type="text" name="name" placeholder="<?= pll__('your-name') ?>" required>
    </div>
    <div class="input-primary textarea">
        <i class="iconsax" icon-name="message-dash-2"></i>
        <textarea class=" data" rows="5" name="describe" placeholder="<?= pll__('ask-question') ?>" required></textarea>
    </div>
    <button id="contact-us-form-submit" class="btn" variant="primary" type="submit"><?= pll__('send-message') ?></button>
</form>