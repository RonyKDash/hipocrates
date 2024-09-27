<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php"
?>

<section class="area_login">
    <div class="login">
        <form>
            <fieldset>
                <input class="num" type="number" value="" required>
                <input class="num" type="number" value="" required>
                <input class="num" type="number" value="" required>
                <input class="num" type="number" value="" required>
            </fieldset>
            <h4>Não recebeu o código de confirmação? Reenvia</h4>

            <button onclick="window.open('/hipocrates/views/recsenha.php');">Avançar</button>
        </form>
    </div>
</section>

<script src="/hipocrates/js/ver.js"></script>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php"
?>