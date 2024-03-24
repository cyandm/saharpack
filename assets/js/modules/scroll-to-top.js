const scrollBtn = document.getElementById("scrolltotop");

if (scrollBtn) {
  scrollBtn.addEventListener("click", () => {
    document.documentElement.scrollTo({
      top: 0,
      behavior: "smooth",
    });
    document.body.scrollTop = 0;
  });
}

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 860 ||
    document.documentElement.scrollTop > 860
  ) {
    scrollBtn.style.display = "block";
  } else {
    scrollBtn.style.display = "none";
  }
}
