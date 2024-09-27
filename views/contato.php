<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";
?>

<section style="margin: 1rem;">
    <form action="">
        <h1>Envie-nos uma Mensagem</h1>
        <fieldset>
            <div class="form-item">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo">
            </div>

            <div class="form-item">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form-item">
                <label for="texto">Texto</label>
                <textarea name="texto" id="texto" cols="50" rows="5"></textarea>
            </div>

            <div class="form-item">
                <button type="submit" class="btn-sucesso">
                    Enviar
                </button>
            </div>
        </fieldset>
    </form>
</section>

<section class="contato-icons">
    <h1>Nossas Redes Sociais</h1>

    <div>
        <a href="tel:(98) 9 1111-1111"><img src="/hipocrates/imgs/icones/whatsapp.svg" alt="" class="icons-svg" width="50rem"></a>
        <a href="https://instagram.com/hipocrates_saude" target="_blank"><img src="/hipocrates/imgs/icones/instagram.svg" alt="" class="icons-svg" width="50rem"></a>
        <a href="https://facebook.com/hipocrates_saude" target="_blank"><img src="/hipocrates/imgs/icones/facebook.svg" alt="" class="icons-svg" width="50rem"></a>
        <a href="https://twitter.com/hipocrates_saude" target="_blank"><img src="/hipocrates/imgs/icones/twitter.svg" alt="" class="icons-svg" width="50rem"></a>
    </div>

    <h1>Endereço</h1>

    <address>
        <p>Rua Exemplo, Nº 1000</p>
        <p>Centro</p>
        <p>São Luis</p>
        <p>Maranhao</p>
        <p>Brasil</p>
        <p>CNPJ: 11.111.111/1111-11</p>
    </address>
</section>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php";
?>