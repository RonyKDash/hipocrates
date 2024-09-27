<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php"
?>

<section class="area_login">
    <div class="login">
        <form action="/hipocrates/views/PgUser.php" method="post">
            <input onclick="validaSenha()" type="password" name="senha1" id="senha1" placeholder="NOVA SENHA" autofocus required>
            <input type="password" name="senha2" id="senha2" placeholder="CONFIRMAR NOVA SENHA" required>
            <button onclick="return validarSenha();">Avançar</button>
        </form>
    </div>
</section>

<script src="/hipocrates/js/teste.js"></script>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php"
?>