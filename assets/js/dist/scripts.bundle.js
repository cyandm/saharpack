(() => {
  // assets/js/modules/ajax-form.js
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
      if (!formData.agreement)
        formData.agreement = "false";
      $.ajax({
        url: cyn_head_script.url,
        type: "post",
        data: {
          action: "send_contact_form",
          _nonce: cyn_head_script.nonce,
          data: formData
        },
        success: (res) => {
          console.warn(res);
          contactUsInput.forEach((el) => {
            el.value = "";
          });
          $(contactUsFormSubmit).text("\u0627\u0631\u0633\u0627\u0644 \u0634\u062F !");
          setTimeout(() => {
            $(contactUsFormSubmit).text("\u0627\u0631\u0633\u0627\u0644 \u067E\u06CC\u0627\u0645");
          }, 1e3);
        },
        error: (err) => {
          console.error(err);
          $(contactUsFormSubmit).removeClass("pending");
          $(contactUsFormSubmit).addClass("error");
        }
      });
    });
  });

  // assets/js/utils/custom-events.js
  var cynActivate = new CustomEvent("cynActivate", { bubbles: true });

  // assets/js/utils/functions.js
  var deActivateEl = (nodeEl) => {
    nodeEl.setAttribute("data-active", "false");
    nodeEl.dispatchEvent(cynActivate);
  };
  var activateEl = (nodeEl) => {
    nodeEl.setAttribute("data-active", "true");
    nodeEl.dispatchEvent(cynActivate);
  };
  var toggleActivateEl = (nodeEl) => {
    const current = nodeEl.getAttribute("data-active");
    if (current === "false" || !current) {
      activateEl(nodeEl);
      return;
    }
    deActivateEl(nodeEl);
  };

  // assets/js/pages/pricing.js
  var Pricing = () => {
    const pricingCollapseHandle = document.getElementById(
      "pricingCollapseHandle"
    );
    const pricingCollapse = document.getElementById("pricingCollapse");
    if (!pricingCollapse || !pricingCollapseHandle)
      return;
    console.log(pricingCollapse);
    pricingCollapseHandle.addEventListener("click", () => {
      toggleActivateEl(pricingCollapse);
    });
  };
  Pricing();
})();
