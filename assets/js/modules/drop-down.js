const selectHandler = document.getElementById('productDropDown');
const optionSelect = document.querySelectorAll('#productDropDown option');

if (selectHandler && optionSelect) {
  selectHandler.addEventListener('change', (e) => {
    optionSelect.forEach((el) => {
      if (el.value === e.target.value) {
        window.location = el.dataset.uri;
      }
    });
  });
}
