<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
	var swiper = new Swiper( ".mySwiper", {
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	} );
</script>
<?php $post_id = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();
?>

<div class="swiper-slide">

	<?php $thumbnail_id = get_post_thumbnail_id( $post_id ); ?>
	<?= wp_get_attachment_image( $thumbnail_id, 'full', false, [] ); ?>
	<div class="container">
		<div class="postmeta">
			<div class="postmeta-r">
				<span class="meta-date meta"> <i class="iconsax"
					   icon-name="calendar-2"></i><?= get_the_date() ?></span>

				<span class="meta-author meta"><i class="iconsax"
					   icon-name="edit-1"></i><?= $author_name ?></span>
			</div>
		</div>
		<h5><?= get_the_title( $post_id ) ?></h5>
		<div class="paragraph"> <?php the_content() ?></div>
	</div>
</div>

<!-- <div class="swiper-pagination"></div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div> -->

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
	var swiper = new Swiper( ".swiper-container", {
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		pagination: {
			el: ".swiper-pagination",
		},
		loop: true,
		slidesPerView: 1,
		spaceBetween: 20,
		// effect: "cube",
		autoplay: {
			delay: 2500,
			disableOnInteraction: true,
		},
		speed: 5000,
		parallax: true,
	} )
</script>