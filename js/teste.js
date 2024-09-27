
// Senhas iguais 
let senha1 = document.getElementById('senha1');
let senha2 = document.getElementById('senha2');

function validarSenha() {
  if (senha1.value != senha2.value) {
    senha2.setCustomValidity("Senhas diferentes!");
    senha2.reportValidity();
    return false;
  } else {
    senha2.setCustomValidity("");
    return true;
  }
}

// verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
senha2.addEventListener('input', validarSenha);

function HabiDsabi() {
  if (document.getElementById('habi').checked == true) {
    document.getElementById('envia').disabled = ""
  }
  if (document.getElementById('habi').checked == false) {
    document.getElementById('envia').disabled = "disabled"
  }
}