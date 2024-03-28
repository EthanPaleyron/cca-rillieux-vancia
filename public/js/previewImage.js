const input = document.querySelector("input[type='file']");
const label = document.querySelector("#labelFile");
const div = document.createElement("div");
div.className = "insertFile";

input.addEventListener("change", (event) => {
  if (event.target.files && event.target.files[0]) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = (e) => {
      const img = document.createElement("img");
      img.src = e.target.result;
      label.innerHTML = `<div class="logoUpdateFile"><i class="fa-solid fa-download"></i></div>`;
      label.appendChild(img);
    };

    reader.readAsDataURL(file);
  } else {
    label.innerHTML = `<div class="logoInsertFile"><i class="fa-solid fa-download"></i></div>`;
    label.appendChild(div);
  }
});
