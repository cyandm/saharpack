function objectifyFormArray(formArray) {
  var returnArray = {};
  for (var i = 0; i < formArray.length; i++) {
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
  return returnArray;
}

jQuery(document).ready(($) => {
  const contactUsForm = $('#contact-us-form');
  const contactUsInput = document.querySelectorAll(
    '#contact-us-form div .data'
  );

  const contactUsFormSubmit = $('#contact-us-form #contact-us-form-submit');

  $(contactUsForm).on('submit', (e) => {
    e.preventDefault();

    const formDataArray = $(contactUsForm).serializeArray();
    const formData = objectifyFormArray(formDataArray);
    if (!formData.agreement) formData.agreement = 'false';

    $.ajax({
      url: cyn_head_script.url,
      type: 'post',
      data: {
        action: 'send_contact_form',
        _nonce: cyn_head_script.nonce,
        data: formData,
      },
      success: (res) => {
        console.warn(res);
        contactUsInput.forEach((el) => {
          el.value = '';
        });
        $(contactUsFormSubmit).text('ارسال شد !');
        setTimeout(() => {
          $(contactUsFormSubmit).text('ارسال پیام');
        }, 1000);
      },
      error: (err) => {
        console.error(err);
        $(contactUsFormSubmit).removeClass('pending');
        $(contactUsFormSubmit).addClass('error');
      },
    });
  });
});
jQuery(document).ready(($) => {
  $('#job-offer-form').on('submit', (e) => {
    e.preventDefault();
    const form = e.currentTarget;
    const submitter = e.submitter;
    const jobOfferFormSubmit = $('#job-offer-form #job-offer-form-submit');

    const formData = new FormData(form, submitter);
    formData.append('action', 'send_job_offer_form');
    formData.append('_nonce', cyn_head_script.nonce);

    $.ajax({
      type: 'POST',
      url: cyn_head_script.url,
      cache: false,
      processData: false,
      contentType: false,
      data: formData,

      success: (res) => {
        console.warn(res);
        form.reset();
        jobOfferFormSubmit.text('ارسال شد !');
        setTimeout(() => {
          jobOfferFormSubmit.text('ارسال درخواست');
        }, 1000);
      },
      error: (err) => {
        console.error(err);
        $(submitter).removeClass('pending');
        $(submitter).addClass('error');
      },
    });
  });
});
