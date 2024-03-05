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

const quantityInput = document.querySelector('.quantity input[type="number"]');
const addToCartBtn = document.querySelector(
  '.share-and-add-cart a[variant="primary"]'
);

if (quantityInput && addToCartBtn) {
  const hrefBase = addToCartBtn.href;
  quantityInput.addEventListener("change", (e) => {
    addToCartBtn.href = hrefBase + "&quantity=" + e.target.value;
  });
}
