import Swiper from 'swiper';
import {
  FreeMode,
  Navigation,
  Scrollbar,
  Thumbs,
  Autoplay,
} from 'swiper/modules';

var swiper = new Swiper('.swiper-container', {
  modules: [Autoplay, Navigation],

  loop: true,
  slidesPerView: 1,
  spaceBetween: 20,
  // effect: "cube",
  autoplay: {
    delay: 2500,
    disableOnInteraction: true,
  },
  speed: 1000,
  parallax: true,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
  },
});
