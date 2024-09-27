// pula a cada numero

const entradas = document.querySelectorAll('.num')

entradas.forEach(input=>{
    input.addEventListener('keyup', (event)=>{
        if(event.target.value.length >=1){
            const proximo = input.nextElementSibling
            if(proximo){
                proximo.focus()
            }
        }
    })
})

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
            button.classLi}
            button.classList.remove("active");
        })
    })

    
    
    function HabiDsabi() {
        if (document.getElementById('habi').checked == true) {
          document.getElementById('envia').disabled = ""
        }
        if (document.getElementById('habi').checked == false) {
          document.getElementById('envia').disabled = "disabled"
        }
      }
      
      function assinar(){
        window.location.href = "/hipocrates/views/PgUser.php"
      }