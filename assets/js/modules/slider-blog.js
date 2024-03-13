import Swiper from 'swiper';
import {
  FreeMode,
  Navigation,
  Scrollbar,
  Thumbs,
  Autoplay,
  Pagination,
} from 'swiper/modules';

var swiper = new Swiper('.swiper-container', {
  modules: [Autoplay, Navigation, Pagination],

  slidesPerView: 1,
  spaceBetween: 20,
  // effect: "cube",
  // autoplay: {
  //   delay: 2500,
  //   disableOnInteraction: true,
  // },
  speed: 1000,
  parallax: true,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});
