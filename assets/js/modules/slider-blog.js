import Swiper from 'swiper';
import { FreeMode, Navigation, Scrollbar, Thumbs } from 'swiper/modules';

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
