const handlerBtn = document.querySelectorAll(".tabs__handler__btn");
const contents = document.querySelectorAll(
  ".tabs__item__outer-container, .tabs__content__item"
);

handlerBtn.forEach((tab) => {
  tab.addEventListener("click", (e) => {
    handlerBtn.forEach((handler) => {
      handler.classList.remove("active");
    });
    e.target.classList.add("active");

    const slide = e.target.dataset.tab;

    contents.forEach((c) => {
      c.classList.remove("active");

      if (c.dataset.tab == slide) {
        c.classList.add("active");
      }
    });
  });
});
