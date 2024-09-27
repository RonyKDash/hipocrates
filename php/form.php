
<div class="formulario">
<p id="txt-centro">Agende sua consulta</p>
<form action="/php/agendar_controller.php" method="post">
    <label for="CPF">CPF: </label>
    <input type="number" name="CPF" id="CPF" placeholder="Digite seu CPF" required>
    <label for="pac">Paciente: </label>
    <input type="text" name="Paciente" id="pac" placeholder="Nome do Paciente" required>
    <label for="tel">Telefone: </label>
    <input type="number" name="telefone" id="tel" placeholder="N° de telefone" required>
    <label for="atd">Tipo de atendimento: </label>
    <select id="atd" required>
        <option value="1">Doação de sangue</option>
        <option value="2"> Doação de medula</option>
    </select>
    <label for="obs">Observações: </label>
    <input type="text" name="obs" id="obs" placeholder="Observações do paciente">

    <label for="local">Local: </label>
    <select id="local" required>
        <option value="1">local 1</option>
        <option value="2">local 2</option>
    </select>
    <label for="Prof">Profissional: </label>
    <select id="Prof" required>
        <option value="1">Medico 1</option>
        <option value="2">Medico 2</option>
    </select>
    <button type="submit" id='btn-agend'>AGENDAR</button>
</form>
</div>