<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";
?>

<div class="App">
  <form class="input">
    <fieldset>
      <div class="espacamento">
        <div class="cpfid">
          <input class="esticar90" id="cpfid" placeholder="CPF" required="required" name="cpf" maxlength="11" type="text" />
        </div>

        <div class="ns">
          <input type="text" id="nomeid" placeholder="NOME" name="nome" class="esticar40" />
          <input class="esticar40" type="text" id="sobrenomeid" placeholder="SOBRENOME" name="sobrenome" />
        </div>
        <div class="password">
          <input class="esticar90" type="password" id="senhaid" placeholder="CRIAR SENHA" name="senha" />
        </div>
        <div class="tel">
          <input class="esticar40" type="tel" id="telid" placeholder="NUMERO DE CONTATO" name="tel" />
        </div>
        <div class="esticar40">
          <input style="background-color: (#fffce3); font-size: 15px;" type="submit" class="esticar90" onclick="enviar();" value="AVANÇAR" />
        </div>
      </div><!-- espacamento -->
    </fieldset>
  </form>
</div>


<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php";
?>