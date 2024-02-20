const btnShare = document.getElementById("btnShare");
const titlePageEl = document.querySelector("#title");

if (btnShare) {
  btnShare.addEventListener("click", () => {
    navigator.share({
      url: window.location.href,
      title: titlePageEl.textContent,
    });
  });
}
