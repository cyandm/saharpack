import { errorToast, successFormToast } from "../modules/toastify";

function objectifyFormArray(formArray) {
  var returnArray = {};
  for (var i = 0; i < formArray.length; i++) {
    returnArray[formArray[i]["name"]] = formArray[i]["value"];
  }
  return returnArray;
}

jQuery(document).ready(($) => {
  const contactUsForm = $("#contact-us-form");
  const contactUsInput = document.querySelectorAll(
    "#contact-us-form div .data"
  );

  const contactUsFormSubmit = $("#contact-us-form #contact-us-form-submit");

  $(contactUsForm).on("submit", (e) => {
    e.preventDefault();

    const formDataArray = $(contactUsForm).serializeArray();
    const formData = objectifyFormArray(formDataArray);
    if (!formData.agreement) formData.agreement = "false";

    $.ajax({
      url: cyn_head_script.url,
      type: "post",
      data: {
        action: "send_contact_form",
        _nonce: cyn_head_script.nonce,
        data: formData,
      },
      success: () => {
        successFormToast.showToast();
        priceForm.reset();
      },
      error: (err) => {
        console.log(err);
        errorToast.showToast();
      },
    });
  });
});
jQuery(document).ready(($) => {
  $("#job-offer-form").on("submit", (e) => {
    e.preventDefault();
    const form = e.currentTarget;
    const submitter = e.submitter;
    const jobOfferFormSubmit = $("#job-offer-form #job-offer-form-submit");

    const formData = new FormData(form, submitter);
    formData.append("action", "send_job_offer_form");
    formData.append("_nonce", cyn_head_script.nonce);

    $.ajax({
      type: "POST",
      url: cyn_head_script.url,
      cache: false,
      processData: false,
      contentType: false,
      data: formData,

      success: () => {
        successFormToast.showToast();
        form.reset();
      },
      error: (err) => {
        console.log(err);
        errorToast.showToast();
      },
    });
  });
});
