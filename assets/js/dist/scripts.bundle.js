(() => {
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
})();
