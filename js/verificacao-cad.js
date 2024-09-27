/* verificacao cadastro */
const inputs = document.querySelectorAll("input"),
button = document.querySelector("button");

inputs.forEach((input,idex1) => {
    input.addEventListener("keyup", (e) => {
        const currentInput = input,
        nexInput = input.nextElementSibling;
        prevInput = input.previousElementSibling;

        if(currentInput.value.length > 1){
            currentInput.value = "";
            return;
        }
        if(nexInput && nexInput.hasAttribute("disabled") && currentInput.value !== ""){
            nexInput.removeAttribute("disabled");
            nexInput.focus();
        }

        if(e.key === "Backspace"){
            inputs.forEach((input, index2) => {
                if(index1 <= index2 && prevInput){
                    input.setAttribute("disabled", true);
                    currentInput.value = "";
                    prevInput.focus();
                }
            })
        }
        if(!inputs[3].disabled && inputs[3].value !== ""){
            button.classList.add("active");
            return;
        }
        button.classList.remove("active");
    })
})

window.addEventListener("load", () => inputs[0].focus());

/* verificacao cadastro */