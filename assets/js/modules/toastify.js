import Toastify from "toastify-js";

const successColor = "#4caf50";
const errorColor = "#ef5350";

const htmlEl = document.querySelector("html");

let successText = "";
let errorText = "";
let successFormText = "";

if (htmlEl.lang === "en-US") {
  successText = "mission accomplished";
  errorText = "The operation encountered an error.";
  successFormText = "Form submitted successfully";
} else {
  successText = "عملیات با موفقیت انجام شد";
  errorText = "عملیات با خطا مواجه شد";
  successFormText = "فرم با موفقیت ارسال شد";
}

export const successToast = Toastify({
  text: successText,
  style: {
    background: successColor,
  },
});

export const errorToast = Toastify({
  text: errorText,
  style: {
    background: errorColor,
  },
});

export const successFormToast = Toastify({
  text: successFormText,
  style: {
    background: successColor,
  },
});
