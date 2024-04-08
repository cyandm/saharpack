import Swiper from "swiper";
import {
  FreeMode,
  Navigation,
  Scrollbar,
  Thumbs,
  Autoplay,
  Pagination,
} from "swiper/modules";
const sliderHero = new Swiper("#sliderHero", {
  modules: [Autoplay, Navigation, Pagination],
  slidesPerView: "auto", //max-width in html 650px on swiper-slide
  //   centeredSlides: true,
  spaceBetween: 12,
  loop: true,
  width: window.innerWidth,
  autoplay: {
    delay: 6500,
    pauseOnMouseEnter: true,
  },

  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});
