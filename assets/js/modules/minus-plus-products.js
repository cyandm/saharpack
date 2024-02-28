const plusButton = document.querySelectorAll('.plus-step');
const minusButton = document.querySelectorAll('.minus-step');
const quantity = document.querySelectorAll(
  '#quantityProductWrapper .quantity input'
);

console.log(quantity);
console.log(minusButton);
console.log(plusButton);

if (plusButton) {
  plusButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      quantity.forEach((count) => {
        if (btn.parentElement === count.parentElement.parentElement) {
          count.value = Number(count.value) + 1;
        }
      });
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
    });
  });
}
