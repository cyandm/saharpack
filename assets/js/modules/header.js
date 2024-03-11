import {
  activateEl,
  addListener,
  deActivateEl,
  definePopUp,
  toggleActivateEl,
} from "../utils/functions";

const menu = document.querySelectorAll(".menu-item-has-children");
//const subMenus = document.querySelectorAll(".sub-menu");

menu.forEach((el) => {
  const submenu = el.querySelector(".sub-menu");

  el.addEventListener("mouseenter", () => {
    activateEl(submenu);
  });

  el.addEventListener("mouseleave", () => {
    deActivateEl(submenu);
  });
});

const elementWidth = document.querySelector(
  ".left-header__left-item"
).clientWidth;
document.documentElement.style.setProperty("--menu-width", elementWidth + "px");

const headerHeight = document.querySelector("header").clientHeight;
document.documentElement.style.setProperty(
  "--header-height",
  headerHeight + "px"
);

const langSwitcherWidth = document.querySelector("#langSwitcher").clientWidth;
document.documentElement.style.setProperty(
  "--lang-width",
  langSwitcherWidth + "px"
);
