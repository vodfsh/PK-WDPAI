window.addEventListener("load", () => {
  const selector = document.querySelector("my-segmented-radio");
  const form = document.getElementById("form");
  const forgotBtn = document.querySelector("button#forgot-btn");

  const registerInputs = document.querySelectorAll(".on-register input, input.on-register");
  const forgotInputs = document.querySelectorAll(".on-forgot input, input.on-forgot");
  const loginInputs = document.querySelectorAll(".on-login input, input.on-login");

  form.dataset["tab"] = selector.value;

  function updateDisabled() {
    const tab = selector.value;
    form.dataset["tab"] = tab;

    [...registerInputs, ...forgotInputs, ...loginInputs].forEach((el) => {
      el.setAttribute("disabled", "");
    });

    if (tab == "sign-in") {
      loginInputs.forEach((el) => {
        el.removeAttribute("disabled");
      });
    } else if (tab == "register") {
      registerInputs.forEach((el) => {
        el.removeAttribute("disabled");
      });
    } else {
      forgotInputs.forEach((el) => {
        el.removeAttribute("disabled");
      });
    }
  }

  updateDisabled();

  selector.addEventListener("change", updateDisabled);

  // @ts-ignore
  forgotBtn.onclick = () => {
    selector.value = "forgot";
  };
});
