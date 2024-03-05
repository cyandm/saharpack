const plusButton = document.querySelectorAll('.plus-step');
const minusButton = document.querySelectorAll('.minus-step');
const quantity = document.querySelectorAll(
  '#quantityProductWrapper .quantity input'
);

const quantityInputSingleProduct = document.querySelector(
  '.quantity input[type="number"]'
);
const addToCartBtnSingleProduct = document.querySelector(
  '.share-and-add-cart a[variant="primary"]'
);

if (plusButton) {
  plusButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      quantity.forEach((count) => {
        if (btn.parentElement === count.parentElement.parentElement) {
          count.value = Number(count.value) + 1;
        }
      });
      if (quantityInputSingleProduct && addToCartBtnSingleProduct) {
        const hrefBaseQuantityPlus = addToCartBtnSingleProduct.href;
        addToCartBtnSingleProduct.href =
          hrefBaseQuantityPlus +
          '&quantity=' +
          quantityInputSingleProduct.value;
      }
    });
  });
}

if (minusButton) {
  minusButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      quantity.forEach((count) => {
        if (btn.parentElement === count.parentElement.parentElement)
          if (count.value >= 1) count.value = Number(count.value) - 1;
      });
      if (quantityInputSingleProduct && addToCartBtnSingleProduct) {
        const hrefBaseQuantityMinus = addToCartBtnSingleProduct.href;
        addToCartBtnSingleProduct.href =
          hrefBaseQuantityMinus +
          '&quantity=' +
          quantityInputSingleProduct.value;
      }
    });
  });
}
