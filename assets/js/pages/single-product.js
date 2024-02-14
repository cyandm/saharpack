const btnShare = document.getElementById('btnShare');
const titlePage = document.querySelector('#title').textContent;

if (btnShare) {
  btnShare.addEventListener('click', () => {
    navigator.share({
      url: window.location.href,
      title: titlePage,
    });
  });
}
