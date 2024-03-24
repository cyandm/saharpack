const inputUnnecessary = document.querySelectorAll(
  ".comment-form-author , .comment-form-email , .comment-form-url , .comment-form-cookies-consent"
);

inputUnnecessary.forEach((inputs) => {
  inputs.remove();
});
