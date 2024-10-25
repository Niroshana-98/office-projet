const inputs = document.querySelectorAll("input"),
  button = document.querySelector("button");

inputs.forEach((input, index1) => {
  input.addEventListener("keyup", (e) => {
    
    const currentInput = input,
      nextInput = input.nextElementSibling,
      prevInput = input.previousElementSibling;

    // if the value has more than one character then clear it
    if (currentInput.value.length > 1) {
      currentInput.value = "";
      return;
    }
    
    if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
      nextInput.removeAttribute("disabled");
      nextInput.focus();
    }

    // if the backspace key is pressed
    if (e.key === "Backspace") {
      // iterate over all inputs again
      inputs.forEach((input, index2) => {
        
        if (index1 <= index2 && prevInput) {
          input.setAttribute("disabled", true);
          input.value = "";
          prevInput.focus();
        }
      });
    }
    
    if (!inputs[3].disabled && inputs[3].value !== "") {
      button.classList.add("active");
      return;
    }
    button.classList.remove("active");
  });
});

//focus the first input which index is 0 on window load
window.addEventListener("load", () => inputs[0].focus());
