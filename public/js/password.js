const inputPassword = document.querySelector("#mdp");
const eyeIcon = document.querySelector("#lookThePassword i");
document.querySelector("#lookThePassword").addEventListener("click", () => {
  if (inputPassword.type === "password") {
    inputPassword.type = "text";
    eyeIcon.className = "fa-solid fa-eye";
  } else {
    inputPassword.type = "password";
    eyeIcon.className = "fa-solid fa-eye-slash";
  }
});
