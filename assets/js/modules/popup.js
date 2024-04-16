const popup = document.querySelector(".popup-video");
const popupHandler = document.querySelector(
  '.products__content__cards__item[href="#video"]'
);
const videoWrapper = document.querySelector(".video-wrapper");
const video = document.querySelector(".popup-video video");

function popupVideo() {
  if (!popup || !popupHandler || !videoWrapper) {
    return;
  }

  popupHandler.addEventListener("click", (e) => {
    e.preventDefault();

    popup.classList.add("active");
  });

  popup.addEventListener("click", (e) => {
    if (e.target === videoWrapper) {
      popup.classList.remove("active");
      video.pause();
    }
  });
}

popupVideo();
