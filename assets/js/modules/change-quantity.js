export const changeQuantity = (quantityInput, addToCartBtn) => {
  if (!quantityInput || !addToCartBtn) return;

  const url = new URL(addToCartBtn.href);
  url.searchParams.set("quantity", quantityInput.value);
  addToCartBtn.href = url;

  quantityInput.addEventListener("change", (e) => {
    const url = new URL(addToCartBtn.href);
    url.searchParams.set("quantity", e.target.value);
    addToCartBtn.href = url;
    console.log(url);
  });
};
