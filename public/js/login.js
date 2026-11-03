window.addEventListener("load", () => {
  const selector = document.getElementById("form-selector");
  const form = document.getElementById("form");

  const registerInputs = document.querySelectorAll(".register-only input");
  registerInputs.forEach((el) => {
    el.setAttribute("disabled", "");
  });

  selector.addEventListener("change", () => {
    form.classList.toggle("register");
    registerInputs.forEach((el) => {
      el.toggleAttribute("disabled");
    });
  });
});
