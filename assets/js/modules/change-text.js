const htmlEl = document.querySelector("html");
const breadCrumbFirstLink = document.querySelector(
  ".rank-math-breadcrumb p > a"
);

function changeText() {
  if (htmlEl.lang === "en-US") {
    breadCrumbFirstLink.innerText = "home";
    breadCrumbFirstLink.href = window.location.origin + "/en";
  }
}

if (breadCrumbFirstLink) {
  changeText();
}

const priceCurrency = document.querySelector(
  ".woocommerce-Price-currencySymbol"
);

console.log(priceCurrency);

function changePrice() {
  if (htmlEl.lang === "en-US") {
    priceCurrency.innerText = " Toman ";
  }
}

if (priceCurrency) {
  changePrice();
}
