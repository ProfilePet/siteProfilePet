<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Consulta</title>
    <link rel="stylesheet" type="text/css" href="../Scripts/Consulta.css">
    <link rel="icon" type="imagem/png" href="../Imagens/TelaSobre/logoAba.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div id="Menu">
        <a href="../tela-perfil-animal/<?php echo $codAnimal?>">Voltar</a>
    </div>
    <form action="../cadastrar-consulta/<?php echo"$codAnimal";?>" method="POST">

    <div id="Form">
        <h2>Nova Consulta</h2>
        <div class="inputs1">
            <label id="Nm"><b>Nome Veterinário</b></label>
            <input type="text" name="txtNomeVeterinario" id="Input">

            <label id="DC"><b>Data Consulta</b></label>
            <input type="date" name="txtData">

            <label id="Hr"><b>Horário</b></label>
            <input type="time" name="txtHora" id="Input">
        </div>
        <div class="inputs2">


            <label id="NC"><b>Nome Clinica</b></label>
            <input type="text" name="txtNomeClinica" id="Input">

            <label id="Tc"><b>Tipo Consulta</b></label>
            <input type="text" name="txtTipoConsulta" placeholder="Tipo Consulta" id="Input">

            <label id="Lo"><b>Local</b></label>
            <input type="text" name="txtLocal" id="Input">

            <label id="Tr"><b>Tratamento</b></label>
            <select name="txtDiagnostico" id="SeleHorario" class="form-select">
                <option selected>Selecione</option>
            </div>
        <?php
            foreach($consultaDiagnostico as $key => $consDiag){
                $cod=($consDiag['codDiagnostico']);
                $tratamento=($consDiag['tratamento']);
                $selectDiag.="<option value=$cod>$tratamento</option>";
            }
            echo $selectDiag;
        ?>
        </select>
    </div>
    <button id="btn-Cada">Cadastrar</button>
  </form>
  <img src="../Imagens/TelaMedicacao/logoP.png" width="190" height="120">
  </div>
  <div id="rodape">
      <p>2022 - Profile Pet</p>
  </div>
    </form>
</body>
</html>