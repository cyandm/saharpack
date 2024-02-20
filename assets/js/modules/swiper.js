import Swiper from "swiper";
// import { Pagination } from "swiper/modules";

const sliderHero = new Swiper("#sliderHero", {
  slidesPerView: "auto", //max-width in html 650px on swiper-slide
  //   centeredSlides: true,
  spaceBetween: 12,
  loop: true,
  width: window.innerWidth,
  autoplay: {
    delay: 3000,
  },
});
