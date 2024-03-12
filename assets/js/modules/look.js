const lookPackaging = () => {
  const rightEye = document.getElementById("rightEye");
  const leftEye = document.getElementById("leftEye");
  const look = document.getElementById("look");

  if (!rightEye) return;
  if (!leftEye) return;
  if (!look) return;

  document.addEventListener("mousemove", (e) => {
    const distanceFromLeft =
      look.getBoundingClientRect().left -
      look.getBoundingClientRect().width / 2;

    const negativeNow = e.clientX - distanceFromLeft;

    const distanceFromRight =
      look.getBoundingClientRect().right -
      look.getBoundingClientRect().width / 2;

    const positiveNow = e.clientX - distanceFromRight;

    //#region

    const distanceFromTop =
      look.getBoundingClientRect().top -
      look.getBoundingClientRect().height / 2;

    const topNow = e.clientY - distanceFromTop;

    const distanceFromDown =
      look.getBoundingClientRect().bottom -
      look.getBoundingClientRect().height / 2;

    const downNow = e.clientY - distanceFromDown;

    //#endregion

    if (negativeNow >= 0) {
      look.style.setProperty("--translate-left", 0 + "px");
    } else {
      look.style.setProperty(
        "--translate-left",
        (negativeNow * 4) / distanceFromLeft + "px"
      );
    }

    if (positiveNow <= 0) {
      look.style.setProperty("--translate-right", 0 + "px");
    } else {
      look.style.setProperty(
        "--translate-right",
        (positiveNow * 4) / distanceFromRight + "px"
      );
    }

    //#region

    if (topNow <= 0) {
      look.style.setProperty("--translate-top", 0 + "px");
    } else {
      look.style.setProperty(
        "--translate-top",
        (topNow * 2) / distanceFromTop + "px"
      );
    }

    if (downNow >= 0) {
      look.style.setProperty("--translate-down", 0 + "px");
    } else {
      look.style.setProperty(
        "--translate-down",
        (downNow * 6) / distanceFromDown + "px"
      );
    }

    //#endregion
  });
};

lookPackaging();
