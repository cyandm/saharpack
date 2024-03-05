<?php
$title_products = get_field('title_products');
$home_products = get_field('products');
?>

<?php if(!empty($home_products)) : ?>
<section class="products">

    <div class="products__content container">

        <div class="products__content__title">
            <h2 class="titles-home"><span><?= $title_products ?></span></h2>
        </div>

        <div class="products__content__cards even-columns">


            <?php foreach ($home_products as $home_product) : ?>

            <a href="<?= $home_product['link'] ?>" class="products__content__cards__item">


                <?= wp_get_attachment_image($home_product['img'], 'full') ?>

                <?php if (!empty($home_product['name'])) : ?>

                <div class="products__content__cards__item__name">
                    <p><?= $home_product['name'] ?></p>
                </div>

                <?php endif ?>

            </a>

            <?php endforeach ?>


        </div>


    </div>

</section>
<?php endif ?>