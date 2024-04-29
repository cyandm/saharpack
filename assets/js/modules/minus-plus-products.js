import { changeQuantity } from "./change-quantity";

const plusButton = document.querySelectorAll(".plus-step");
const minusButton = document.querySelectorAll(".minus-step");
const quantity = document.querySelectorAll(
  "#quantityProductWrapper .quantity input"
);

const quantityInputSingleProduct = document.querySelector(
  '.quantity input[type="number"]'
);
const addToCartBtnSingleProduct = document.querySelector(
  ".share-and-add-cart #btnCart"
);

if (plusButton.length > 0) {
  const step = quantity[0].step;

  plusButton.forEach((btn) => {
    btn.addEventListener("click", () => {
      quantity.forEach((count) => {
        if (btn.parentElement === count.parentElement.parentElement) {
          count.value = Number(count.value) + Number(step);
        }
      });
      changeQuantity(quantityInputSingleProduct, addToCartBtnSingleProduct);
    });
  });
}

if (minusButton.length > 0) {
  const step = quantity[0].step;

  minusButton.forEach((btn) => {
    btn.addEventListener("click", () => {
      quantity.forEach((count) => {
        if (btn.parentElement === count.parentElement.parentElement)
          if (count.value >= 1)
            count.value = Number(count.value) - Number(step);
      });

      changeQuantity(quantityInputSingleProduct, addToCartBtnSingleProduct);
    });
  });
}
