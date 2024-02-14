(() => {
  var __create = Object.create;
  var __defProp = Object.defineProperty;
  var __getOwnPropDesc = Object.getOwnPropertyDescriptor;
  var __getOwnPropNames = Object.getOwnPropertyNames;
  var __getProtoOf = Object.getPrototypeOf;
  var __hasOwnProp = Object.prototype.hasOwnProperty;
  var __commonJS = (cb, mod) => function __require() {
    return mod || (0, cb[__getOwnPropNames(cb)[0]])((mod = { exports: {} }).exports, mod), mod.exports;
  };
  var __copyProps = (to, from, except, desc) => {
    if (from && typeof from === "object" || typeof from === "function") {
      for (let key of __getOwnPropNames(from))
        if (!__hasOwnProp.call(to, key) && key !== except)
          __defProp(to, key, { get: () => from[key], enumerable: !(desc = __getOwnPropDesc(from, key)) || desc.enumerable });
    }
    return to;
  };
  var __toESM = (mod, isNodeMode, target) => (target = mod != null ? __create(__getProtoOf(mod)) : {}, __copyProps(
    // If the importer is in node compatibility mode or this is not an ESM
    // file that has been converted to a CommonJS file using a Babel-
    // compatible transform (i.e. "__esModule" has not been set), then set
    // "default" to the CommonJS "module.exports" for node compatibility.
    isNodeMode || !mod || !mod.__esModule ? __defProp(target, "default", { value: mod, enumerable: true }) : target,
    mod
  ));

  // node_modules/toastify-js/src/toastify.js
  var require_toastify = __commonJS({
    "node_modules/toastify-js/src/toastify.js"(exports, module) {
      (function(root, factory) {
        if (typeof module === "object" && module.exports) {
          module.exports = factory();
        } else {
          root.Toastify = factory();
        }
      })(exports, function(global) {
        var Toastify2 = function(options) {
          return new Toastify2.lib.init(options);
        }, version = "1.12.0";
        Toastify2.defaults = {
          oldestFirst: true,
          text: "Toastify is awesome!",
          node: void 0,
          duration: 3e3,
          selector: void 0,
          callback: function() {
          },
          destination: void 0,
          newWindow: false,
          close: false,
          gravity: "toastify-top",
          positionLeft: false,
          position: "",
          backgroundColor: "",
          avatar: "",
          className: "",
          stopOnFocus: true,
          onClick: function() {
          },
          offset: { x: 0, y: 0 },
          escapeMarkup: true,
          ariaLive: "polite",
          style: { background: "" }
        };
        Toastify2.lib = Toastify2.prototype = {
          toastify: version,
          constructor: Toastify2,
          // Initializing the object with required parameters
          init: function(options) {
            if (!options) {
              options = {};
            }
            this.options = {};
            this.toastElement = null;
            this.options.text = options.text || Toastify2.defaults.text;
            this.options.node = options.node || Toastify2.defaults.node;
            this.options.duration = options.duration === 0 ? 0 : options.duration || Toastify2.defaults.duration;
            this.options.selector = options.selector || Toastify2.defaults.selector;
            this.options.callback = options.callback || Toastify2.defaults.callback;
            this.options.destination = options.destination || Toastify2.defaults.destination;
            this.options.newWindow = options.newWindow || Toastify2.defaults.newWindow;
            this.options.close = options.close || Toastify2.defaults.close;
            this.options.gravity = options.gravity === "bottom" ? "toastify-bottom" : Toastify2.defaults.gravity;
            this.options.positionLeft = options.positionLeft || Toastify2.defaults.positionLeft;
            this.options.position = options.position || Toastify2.defaults.position;
            this.options.backgroundColor = options.backgroundColor || Toastify2.defaults.backgroundColor;
            this.options.avatar = options.avatar || Toastify2.defaults.avatar;
            this.options.className = options.className || Toastify2.defaults.className;
            this.options.stopOnFocus = options.stopOnFocus === void 0 ? Toastify2.defaults.stopOnFocus : options.stopOnFocus;
            this.options.onClick = options.onClick || Toastify2.defaults.onClick;
            this.options.offset = options.offset || Toastify2.defaults.offset;
            this.options.escapeMarkup = options.escapeMarkup !== void 0 ? options.escapeMarkup : Toastify2.defaults.escapeMarkup;
            this.options.ariaLive = options.ariaLive || Toastify2.defaults.ariaLive;
            this.options.style = options.style || Toastify2.defaults.style;
            if (options.backgroundColor) {
              this.options.style.background = options.backgroundColor;
            }
            return this;
          },
          // Building the DOM element
          buildToast: function() {
            if (!this.options) {
              throw "Toastify is not initialized";
            }
            var divElement = document.createElement("div");
            divElement.className = "toastify on " + this.options.className;
            if (!!this.options.position) {
              divElement.className += " toastify-" + this.options.position;
            } else {
              if (this.options.positionLeft === true) {
                divElement.className += " toastify-left";
                console.warn("Property `positionLeft` will be depreciated in further versions. Please use `position` instead.");
              } else {
                divElement.className += " toastify-right";
              }
            }
            divElement.className += " " + this.options.gravity;
            if (this.options.backgroundColor) {
              console.warn('DEPRECATION NOTICE: "backgroundColor" is being deprecated. Please use the "style.background" property.');
            }
            for (var property in this.options.style) {
              divElement.style[property] = this.options.style[property];
            }
            if (this.options.ariaLive) {
              divElement.setAttribute("aria-live", this.options.ariaLive);
            }
            if (this.options.node && this.options.node.nodeType === Node.ELEMENT_NODE) {
              divElement.appendChild(this.options.node);
            } else {
              if (this.options.escapeMarkup) {
                divElement.innerText = this.options.text;
              } else {
                divElement.innerHTML = this.options.text;
              }
              if (this.options.avatar !== "") {
                var avatarElement = document.createElement("img");
                avatarElement.src = this.options.avatar;
                avatarElement.className = "toastify-avatar";
                if (this.options.position == "left" || this.options.positionLeft === true) {
                  divElement.appendChild(avatarElement);
                } else {
                  divElement.insertAdjacentElement("afterbegin", avatarElement);
                }
              }
            }
            if (this.options.close === true) {
              var closeElement = document.createElement("button");
              closeElement.type = "button";
              closeElement.setAttribute("aria-label", "Close");
              closeElement.className = "toast-close";
              closeElement.innerHTML = "&#10006;";
              closeElement.addEventListener(
                "click",
                (function(event) {
                  event.stopPropagation();
                  this.removeElement(this.toastElement);
                  window.clearTimeout(this.toastElement.timeOutValue);
                }).bind(this)
              );
              var width = window.innerWidth > 0 ? window.innerWidth : screen.width;
              if ((this.options.position == "left" || this.options.positionLeft === true) && width > 360) {
                divElement.insertAdjacentElement("afterbegin", closeElement);
              } else {
                divElement.appendChild(closeElement);
              }
            }
            if (this.options.stopOnFocus && this.options.duration > 0) {
              var self = this;
              divElement.addEventListener(
                "mouseover",
                function(event) {
                  window.clearTimeout(divElement.timeOutValue);
                }
              );
              divElement.addEventListener(
                "mouseleave",
                function() {
                  divElement.timeOutValue = window.setTimeout(
                    function() {
                      self.removeElement(divElement);
                    },
                    self.options.duration
                  );
                }
              );
            }
            if (typeof this.options.destination !== "undefined") {
              divElement.addEventListener(
                "click",
                (function(event) {
                  event.stopPropagation();
                  if (this.options.newWindow === true) {
                    window.open(this.options.destination, "_blank");
                  } else {
                    window.location = this.options.destination;
                  }
                }).bind(this)
              );
            }
            if (typeof this.options.onClick === "function" && typeof this.options.destination === "undefined") {
              divElement.addEventListener(
                "click",
                (function(event) {
                  event.stopPropagation();
                  this.options.onClick();
                }).bind(this)
              );
            }
            if (typeof this.options.offset === "object") {
              var x = getAxisOffsetAValue("x", this.options);
              var y = getAxisOffsetAValue("y", this.options);
              var xOffset = this.options.position == "left" ? x : "-" + x;
              var yOffset = this.options.gravity == "toastify-top" ? y : "-" + y;
              divElement.style.transform = "translate(" + xOffset + "," + yOffset + ")";
            }
            return divElement;
          },
          // Displaying the toast
          showToast: function() {
            this.toastElement = this.buildToast();
            var rootElement;
            if (typeof this.options.selector === "string") {
              rootElement = document.getElementById(this.options.selector);
            } else if (this.options.selector instanceof HTMLElement || typeof ShadowRoot !== "undefined" && this.options.selector instanceof ShadowRoot) {
              rootElement = this.options.selector;
            } else {
              rootElement = document.body;
            }
            if (!rootElement) {
              throw "Root element is not defined";
            }
            var elementToInsert = Toastify2.defaults.oldestFirst ? rootElement.firstChild : rootElement.lastChild;
            rootElement.insertBefore(this.toastElement, elementToInsert);
            Toastify2.reposition();
            if (this.options.duration > 0) {
              this.toastElement.timeOutValue = window.setTimeout(
                (function() {
                  this.removeElement(this.toastElement);
                }).bind(this),
                this.options.duration
              );
            }
            return this;
          },
          hideToast: function() {
            if (this.toastElement.timeOutValue) {
              clearTimeout(this.toastElement.timeOutValue);
            }
            this.removeElement(this.toastElement);
          },
          // Removing the element from the DOM
          removeElement: function(toastElement) {
            toastElement.className = toastElement.className.replace(" on", "");
            window.setTimeout(
              (function() {
                if (this.options.node && this.options.node.parentNode) {
                  this.options.node.parentNode.removeChild(this.options.node);
                }
                if (toastElement.parentNode) {
                  toastElement.parentNode.removeChild(toastElement);
                }
                this.options.callback.call(toastElement);
                Toastify2.reposition();
              }).bind(this),
              400
            );
          }
        };
        Toastify2.reposition = function() {
          var topLeftOffsetSize = {
            top: 15,
            bottom: 15
          };
          var topRightOffsetSize = {
            top: 15,
            bottom: 15
          };
          var offsetSize = {
            top: 15,
            bottom: 15
          };
          var allToasts = document.getElementsByClassName("toastify");
          var classUsed;
          for (var i = 0; i < allToasts.length; i++) {
            if (containsClass(allToasts[i], "toastify-top") === true) {
              classUsed = "toastify-top";
            } else {
              classUsed = "toastify-bottom";
            }
            var height = allToasts[i].offsetHeight;
            classUsed = classUsed.substr(9, classUsed.length - 1);
            var offset = 15;
            var width = window.innerWidth > 0 ? window.innerWidth : screen.width;
            if (width <= 360) {
              allToasts[i].style[classUsed] = offsetSize[classUsed] + "px";
              offsetSize[classUsed] += height + offset;
            } else {
              if (containsClass(allToasts[i], "toastify-left") === true) {
                allToasts[i].style[classUsed] = topLeftOffsetSize[classUsed] + "px";
                topLeftOffsetSize[classUsed] += height + offset;
              } else {
                allToasts[i].style[classUsed] = topRightOffsetSize[classUsed] + "px";
                topRightOffsetSize[classUsed] += height + offset;
              }
            }
          }
          return this;
        };
        function getAxisOffsetAValue(axis, options) {
          if (options.offset[axis]) {
            if (isNaN(options.offset[axis])) {
              return options.offset[axis];
            } else {
              return options.offset[axis] + "px";
            }
          }
          return "0px";
        }
        function containsClass(elem, yourClass) {
          if (!elem || typeof yourClass !== "string") {
            return false;
          } else if (elem.className && elem.className.trim().split(/\s+/gi).indexOf(yourClass) > -1) {
            return true;
          } else {
            return false;
          }
        }
        Toastify2.lib.init.prototype = Toastify2.lib;
        return Toastify2;
      });
    }
  });

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
        success: (res) => {
          console.warn(res);
          form.reset();
          jobOfferFormSubmit.text("\u0627\u0631\u0633\u0627\u0644 \u0634\u062F !");
          setTimeout(() => {
            jobOfferFormSubmit.text("\u0627\u0631\u0633\u0627\u0644 \u062F\u0631\u062E\u0648\u0627\u0633\u062A");
          }, 1e3);
        },
        error: (err) => {
          console.error(err);
          $(submitter).removeClass("pending");
          $(submitter).addClass("error");
        }
      });
    });
  });

  // assets/js/modules/toastify.js
  var import_toastify_js = __toESM(require_toastify());
  var successColor = "#4caf50";
  var errorColor = "#ef5350";
  var successToast = (0, import_toastify_js.default)({
    text: "\u0639\u0645\u0644\u06CC\u0627\u062A \u0628\u0627 \u0645\u0648\u0641\u0642\u06CC\u062A \u0627\u0646\u062C\u0627\u0645 \u0634\u062F",
    style: {
      background: successColor
    }
  });
  var errorToast = (0, import_toastify_js.default)({
    text: "\u0639\u0645\u0644\u06CC\u0627\u062A \u0628\u0627 \u062E\u0637\u0627 \u0645\u0648\u0627\u062C\u0647 \u0634\u062F",
    style: {
      background: errorColor
    }
  });
  var successFormToast = (0, import_toastify_js.default)({
    text: "\u0641\u0631\u0645 \u0628\u0627 \u0645\u0648\u0641\u0642\u06CC\u062A \u0627\u0631\u0633\u0627\u0644 \u0634\u062F",
    style: {
      background: successColor
    }
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
  var addListener = (elementNode, eventType, func) => {
    if (elementNode.getAttribute("hasListener"))
      return;
    elementNode.setAttribute("hasListener", true);
    elementNode.addEventListener(eventType, func);
  };
  var definePopUp = (nodeEl) => {
    nodeEl.addEventListener("cynActivate", (e) => {
      if (e.target != nodeEl)
        return;
      document.body.setAttribute("data-popup-open", e.target.dataset.active);
    });
    nodeEl.addEventListener("click", (e) => {
      if (e.target != nodeEl)
        return;
      deActivateEl(nodeEl);
    });
  };

  // assets/js/modules/ajax-search.js
  var ajaxSearch = () => {
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("searchInput");
    const ajaxSearchResultWrapper = document.getElementById(
      "ajaxSearchResultWrapper"
    );
    const ajaxSearchResult = document.getElementById("ajaxSearchResult");
    const ajaxSearchLoading = document.getElementById("ajaxSearchLoading");
    const ajaxSearchViewAll = document.getElementById("ajaxSearchViewAll");
    const ajaxSearchClose = document.getElementById("ajaxSearchClose");
    if (!searchInput)
      return;
    if (!searchForm)
      return;
    let timeOut2;
    addListener(searchInput, "keyup", (e) => {
      activateEl(ajaxSearchLoading);
      activateEl(ajaxSearchResultWrapper);
      const value = e.target.value;
      if (value === "" || value.length <= 3) {
        deActivateEl(ajaxSearchLoading);
        return;
      }
      clearTimeout(timeOut2);
      timeOut2 = setTimeout(() => {
        jQuery(($) => {
          $.ajax({
            type: "post",
            url: cyn_head_script.url,
            data: {
              _nonce: cyn_head_script.nonce,
              action: "cyn_ajax_search",
              value,
              postType: e.target.dataset.postType
            },
            success: (response) => {
              ajaxSearchResult.innerHTML = response.html;
              if (response.foundPosts < 3) {
                deActivateEl(ajaxSearchViewAll);
              } else {
                activateEl(ajaxSearchViewAll);
              }
              deActivateEl(ajaxSearchLoading);
            }
          });
        });
      }, 500);
    });
    addListener(ajaxSearchViewAll, "click", (e) => {
      searchForm.dispatchEvent(
        new Event("submit", { cancelable: true, bubbles: true })
      );
    });
    addListener(ajaxSearchClose, "click", (e) => {
      deActivateEl(ajaxSearchResultWrapper);
    });
  };
  ajaxSearch();

  // assets/js/modules/mobile-menu.js
  var MobileMenu = () => {
    const mobileMenuToggle = document.querySelector("#mobileMenuToggle");
    const mobileMenu = document.querySelector("#mobileMenu");
    const menuItemHasChildren = mobileMenu.querySelectorAll(
      ".menu-item-has-children"
    );
    const addGridWrapper = (el) => {
      const hasGrid = el.children.item(1).classList.contains("grid-wrapper");
      if (hasGrid)
        return;
      const submenu = el.querySelector("ul.sub-menu");
      const div = document.createElement("div");
      div.classList.add("grid-wrapper");
      el.appendChild(div);
      div.appendChild(submenu);
    };
    if (!mobileMenuToggle)
      return;
    definePopUp(mobileMenu);
    mobileMenuToggle.addEventListener("click", () => {
      toggleActivateEl(mobileMenu);
    });
    if (!menuItemHasChildren)
      return;
    menuItemHasChildren.forEach((el) => {
      el.addEventListener("click", (e) => {
        if (e.target != el)
          return;
        toggleActivateEl(el);
      });
      addGridWrapper(el);
    });
  };
  MobileMenu();

  // assets/js/modules/video-cover.js
  var videoCovers = document.querySelectorAll(".video-cover");
  var videoSrc = document.querySelectorAll(".video");
  if (videoCovers) {
    videoCovers.forEach((videoCover) => {
      addListener(videoCover, "click", (e) => {
        const cover = videoCover;
        videoSrc.forEach((videoPlay) => {
          if (videoPlay === videoSrc)
            return;
          videoPlay.play();
        });
        cover.classList.add("without-cover");
      });
    });
  }

  // assets/js/modules/header.js
  var menu = document.querySelectorAll(".menu-item-has-children");
  menu.forEach((el) => {
    const submenu = el.querySelector(".sub-menu");
    el.addEventListener("mouseenter", () => {
      activateEl(submenu);
    });
    el.addEventListener("mouseleave", () => {
      deActivateEl(submenu);
    });
  });
  var elementWidth = document.querySelector(".left-header").clientWidth;
  console.log(elementWidth);

  // assets/js/pages/single-product.js
  var btnShare = document.getElementById("btnShare");
  var titlePage = document.querySelector("#title").textContent;
  if (btnShare) {
    btnShare.addEventListener("click", () => {
      navigator.share({
        url: window.location.href,
        title: titlePage
      });
    });
  }

  // assets/js/pages/pricing.js
  var Pricing = () => {
    const pricingCollapseHandle = document.getElementById(
      "pricingCollapseHandle"
    );
    const pricingCollapse = document.getElementById("pricingCollapse");
    if (!pricingCollapse || !pricingCollapseHandle)
      return;
    pricingCollapseHandle.addEventListener("click", () => {
      toggleActivateEl(pricingCollapse);
    });
  };
  Pricing();
  var PricingForm = () => {
    const priceForm = document.getElementById("priceForm");
    if (!priceForm)
      return;
    const submitBtn = priceForm.querySelector('button[type="submit"]');
    if (!submitBtn)
      return;
    priceForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const formData = new FormData(e.currentTarget, e.submitter);
      formData.append("_nonce", cyn_head_script.nonce);
      formData.append("action", "cyn_pricing_form");
      jQuery(($) => {
        $.ajax({
          url: cyn_head_script.url,
          type: "post",
          cache: false,
          processData: false,
          contentType: false,
          data: formData,
          success: (res) => {
            successFormToast.showToast();
            priceForm.reset();
          },
          error: () => {
            errorToast.showToast();
          }
        });
      });
    });
  };
  PricingForm();

  // assets/js/pages/search.js
  var SearchPage = () => {
    var _a;
    const searchPage = document.getElementById("searchPage");
    if (!searchPage)
      return;
    const urlParams = new URLSearchParams(window.location.search);
    const post_type = (_a = urlParams.get("post_type")) != null ? _a : "default";
    const currentRadio = document.querySelector(
      'input[type="radio"][value='.concat(post_type, "]")
    );
    currentRadio.checked = true;
    searchPageAjax();
  };
  var searchPageAjax = () => {
    const postsContainer = document.getElementById("postsContainer");
    const foundPostsEl = document.getElementById("foundPosts");
    const searchPageForm = document.getElementById("searchPageForm");
    const searchPageInput = document.getElementById("searchPageInput");
    const searchRadioGroup = document.querySelectorAll('input[type="radio"]');
    addListener(
      searchPageInput,
      "keyup",
      () => searchPageForm.dispatchEvent(
        new Event("submit", { bubbles: false, cancelable: false })
      )
    );
    searchRadioGroup.forEach((el) => {
      addListener(
        el,
        "change",
        () => searchPageForm.dispatchEvent(
          new Event("submit", { bubbles: false, cancelable: false })
        )
      );
    });
    addListener(
      searchPageForm,
      "submit",
      (e) => ajaxSearchQuery(e, postsContainer, foundPostsEl)
    );
  };
  var timeOut;
  var ajaxSearchQuery = (e, postsContainer, foundPostsEl) => {
    e.preventDefault();
    clearTimeout(timeOut);
    const formData = new FormData(e.currentTarget, e.submitter);
    formData.append("action", "cyn_ajax_search_page");
    formData.append("_nonce", cyn_head_script.nonce);
    timeOut = setTimeout(() => {
      jQuery(($) => {
        $.ajax({
          type: "POST",
          url: cyn_head_script.url,
          cache: false,
          processData: false,
          contentType: false,
          data: formData,
          success: (res) => {
            postsContainer.innerHTML = res.html;
            foundPostsEl.innerText = res.foundPosts;
          }
        });
      });
    }, 1e3);
  };
  SearchPage();
  searchPageAjax();

  // assets/js/utils/variable.js
  var rootEl = document.querySelector(":root");
  var containerEL = document.querySelector(".container");
  var headerEl = document.querySelector("header");
  var footerEl = document.querySelector("footer");
  var headerHeight;
  var marginFromSide;
  var footerHeight;
  var makeKebab = (str) => str.replace(
    /[A-Z]+(?![a-z])|[A-Z]/g,
    ($, ofs) => (ofs ? "-" : "") + $.toLowerCase()
  );
  var setCssVariable = (value, name, parent = rootEl, prefix = "px") => {
    const kebabName = makeKebab(name);
    parent.style.setProperty("--".concat(kebabName), value + prefix);
  };
  var setCssVariableGroup = () => {
    headerHeight = headerEl.getClientRects()[0].height;
    if (footerEl) {
      footerHeight = footerEl.getClientRects()[0].height;
    } else {
      footerHeight = 0;
    }
    const containerWidth = containerEL.clientWidth;
    marginFromSide = (window.innerWidth - containerWidth) / 2;
    setCssVariable(headerHeight, "headerHeight");
    setCssVariable(marginFromSide, "marginFromSide");
    setCssVariable(footerHeight, "footerHeight");
  };
  window.addEventListener("load", setCssVariableGroup);
  window.addEventListener("resize", setCssVariableGroup);
})();
/*! Bundled license information:

toastify-js/src/toastify.js:
  (*!
   * Toastify js 1.12.0
   * https://github.com/apvarun/toastify-js
   * @license MIT licensed
   *
   * Copyright (C) 2018 Varun A P
   *)
*/
