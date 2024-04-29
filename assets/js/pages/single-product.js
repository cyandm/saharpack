import { changeQuantity } from "../modules/change-quantity";

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
const addToCartBtn = document.getElementById("btnCart");

changeQuantity(quantityInput , addToCartBtn);
