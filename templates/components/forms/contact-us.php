<form action="" id="contact-us-form">
    <input class="data" type="tel" name="phone-number" placeholder="<?= pll__('phone-number') ?>" required>
    <input class="data" type="text" name="name" placeholder="<?= pll__('your-name') ?>" required>
    <textarea class="data" rows="5" name="describe" placeholder="<?= pll__('ask-question') ?>" required></textarea>
    <button id="contact-us-form-submit" class="button" type="submit"><?= pll__('send-message') ?></button>
</form>