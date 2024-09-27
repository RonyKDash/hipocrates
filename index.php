<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php"
?>

<div class="container">
  <div class="mySlides">
    <div class="txt-img">
      <p>A funcionalidade de agendamento de consultas do sistema Hipocrates permite que pacientes e médicos marquem consultas facilmente em um ambiente seguro e fácil de usar.</p>
      <a href="/hipocrates/views/agendamento.php">
        <button>
          Agende uma consulta!
        </button>
      </a>
    </div>
    <picture>
      <!-- Source para telas de notebook -->
      <!--  <source media="(min-width: 468px)" srcset="med1.jfif"> -->
      <!-- Source para telas de smartphones -->
      <!--  <source media="(max-width: 467px)" srcset="med1_2.jfif"> -->
      <img src="/hipocrates/imgs/6.webp">
    </picture>
  </div>

  <div class="mySlides">
    <div class="txt-img">
      <p>Salve vidas doando sangue! A plataforma Hipocrates torna fácil agendar doações. Faça a diferença hoje e ajude a salvar vidas. Doe sangue!</p>
    </div>
    <picture>
      <img src="/hipocrates/imgs/1.webp">
    </picture>
  </div>

  <!-- <div class="mySlides">
    <div class="txt-img">
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis libero vel est explicabo officia consequatur soluta blanditiis, eos odit ab pariatur, quae quibusdam inventore in dicta? Fuga vel rerum dolor.</p>
    </div>
    <picture>
          <img src="/hipocrates/imgs/3.webp">
    </picture>
  </div> -->

  <!--   <div class="mySlides">
    <div class="txt-img">
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis libero vel est explicabo officia consequatur soluta blanditiis, eos odit ab pariatur, quae quibusdam inventore in dicta? Fuga vel rerum dolor.</p>
    </div>
    <picture>
      <img src="/hipocrates/imgs/4.webp">
    </picture>
  </div> -->

  <!--   <div class="mySlides">
    <div class="txt-img">
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis libero vel est explicabo officia consequatur soluta blanditiis, eos odit ab pariatur, quae quibusdam inventore in dicta? Fuga vel rerum dolor.</p>
    </div>
    <picture>
      <img src="/hipocrates/imgs/5.webp">
    </picture>
  </div> -->

  <div class="mySlides">
    <div class="txt-img">
      <p>Acesse seu perfil de paciente e tenha controle total sobre suas consultas e dados. Adicione e gerencie seus acompanhantes de forma prática e fácil.</p>
    </div>
    <picture>
      <!-- Source para telas de notebook -->
      <!-- <source media="(min-width: 468px)" srcset="med6.jfif"> -->
      <!-- Source para telas de smartphones -->
      <!-- <source media="(max-width: 467px)" srcset="med6_2.jfif"> -->
      <img src="/hipocrates/imgs/5.webp">
    </picture>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
</main>

<script>
  setInterval(function() {
    let nextButton = document.querySelector('.next');
    if (nextButton) {
      nextButton.click();
    }
  }, 10000);
</script>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php"
?>