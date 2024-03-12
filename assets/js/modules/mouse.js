const mouse = document.querySelector("#mouse");
const hoverable =
  document.querySelectorAll(
    ".btn , a , .tabs__handler__btn , .input-primary , button , input , .has-children , .journey__content__card"
  ) ?? [];

if (mouse) {
  document.addEventListener("mousemove", (e) => {
    mouse.style.setProperty(`--left`, e.clientX + "px");
    mouse.style.setProperty("--top", e.clientY + "px");
  });

  if (hoverable.length > 0) {
    hoverable.forEach((elem) => {
      elem.addEventListener("mouseenter", () => {
        mouse.classList.add("hovered");
      });

      elem.addEventListener("mouseleave", () => {
        mouse.classList.remove("hovered");
      });
    });
  }
}

const footer = document.querySelector("footer");

if (footer) {
  footer.addEventListener("mouseenter", () => {
    mouse.classList.add("white");
  });

  footer.addEventListener("mouseleave", () => {
    mouse.classList.remove("white");
  });
}
