$(document).ready(function () {
  $("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, "");
    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/", function (data) {
      if (data.hasOwnProperty("erro")) {
        alert("CEP não encontrado!");
        return;
      }
      $("#logradouro").val(data.logradouro);
      $("#bairro").val(data.bairro);
      $("#cidade").val(data.localidade);
      $("#estado").val(data.uf);
    });
  });
});

$(document).ready(function () {
  $("#phone_DDD").mask("(00) 00000-0000");
  $("#phone_fixe").mask("0000-0000");
  $("#cpf").mask("000.000.000-00", {
    reverse: true,
  });
  $("#rg").mask("000000000000-0", {
    reverse: true,
  });
});

const inputCns = document.getElementById("cns");

inputCns.addEventListener("input", function (e) {
  let valor = e.target.value.replace(/\D/g, "");
  valor = valor.substring(0, 15);
  valor = valor.replace(/(\d{3})(\d{4})(\d{4})(\d{4})/, "$1 $2 $3 $4");
  e.target.value = valor;
});

const inputNumero = document.getElementById("numero");

inputNumero.addEventListener("keydown", function (e) {
  if (
    e.key === "Backspace" ||
    e.key === "Delete" ||
    e.key === "Tab" ||
    e.key === "Escape" ||
    e.key === "Enter"
  ) {
    return;
  }

  if (isNaN(parseInt(e.key))) {
    e.preventDefault();
  }
});

const uploadButton = document.querySelector(".upload-button");
const fileUpload = document.querySelector("#file-upload");

uploadButton.addEventListener("click", () => {
  fileUpload.click();
});

fileUpload.addEventListener("change", () => {
  console.log(fileUpload.files[0].name);
});

const passwordInput = document.getElementById("password");
const passwordDisplay = document.getElementById("password-display");

passwordInput.addEventListener("input", () => {
  passwordDisplay.textContent = passwordInput.value;
});

const confirmPasswordInput = document.getElementById("confirm-password");
const confirmPasswordDisplay = document.getElementById(
  "confirm-password-display"
);

confirmPasswordInput.addEventListener("input", () => {
  confirmPasswordDisplay.textContent = confirmPasswordInput.value;
});

const mostrarSenhaCheckbox = document.getElementById("mostrar-senha");
const senhaInput = document.getElementById("password");
const confirmarSenhaInput = document.getElementById("confirm-password");

mostrarSenhaCheckbox.addEventListener("change", () => {
  if (mostrarSenhaCheckbox.checked) {
    senhaInput.type = "text";
  } else {
    senhaInput.type = "password";
  }
});

mostrarSenhaCheckbox.addEventListener("change", () => {
  if (mostrarSenhaCheckbox.checked) {
    confirmarSenhaInput.type = "text";
  } else {
    confirmarSenhaInput.type = "password";
  }
});
