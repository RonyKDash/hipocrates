<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/hipocrates/templates/cabecalho";
?>

<div class="App">
    <form class="input">
      <fieldset>
        <div class="espacamento">
        <div class="text-sms">
          <h3>Enviaremos um codigo de comfirmção via SMS</h3>
        </div><!-- text-sms -->

        <div class="verificacao">
          <div class="text-sms">
            <form action="#" id="fomr2">
          <input type="number" >
          <input type="number" disabled>
          <input type="number" disabled>
          <input type="number" disabled>
        </div><!-- text-sms -->
        </div><!-- verificacao -->
    </form>
        <div class="password">
          <div class="text-sms">
            <h3>Não recebeu o código de confirmação? <a href="#" class="reenvio">Reenviar</a></h3>
          </div><!-- text-sms -->
        </div>
        <div class="esticar40">
          <div class="text-sms">
          <input style="background-color: (#fffce3); font-size: 15px;" type="submit" class="esticar90"
            onclick="enviar();" value="AVANÇAR" />
          </div><!-- text-sms -->
        </div><!-- esticar40 -->
        </div><!-- espacamento -->
      </fieldset>
    </form>
  </div>

  
  <?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/hipocrates/templates/rodape.php";
?>