<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="Imagens/TelaSobre/logoAba.png" />
    <link rel="stylesheet" type="text/css" href="../Scripts/Medicacao.css">
    <title>Medicação</title>
</head>
<body>
    <div id="Menu">
        <a href="../tela-perfil-animal/<?php echo $codAnimal?>">Voltar</a>
    </div>
    <div id="Form">
        <h2>Nova Medicação</h2>
    <form action="../cadastrar-medicacao/<?php echo $codAnimal?>" method="POST">
        <div class="form1">
        <label id="Input"><b>Data Inicial</b></label>
        <input type="date" name="txtDataInicial" id="Input">
        <label id="Input"><b>Nome Medicação</b></label>
        <select name="txtMedicacoes" id="Input">
        
            <?php
            //echo $codMedicacao;
                foreach($consultaMedicacoes as $key => $consMed){
                    $codMed=($consMed['codMedicacao']);
                    $nomeMed=($consMed['nomeMedicacao']);
                    
                    $selectMed .= "<option value=$codMed>$nomeMed</option>";
                }
                echo $selectMed;
            ?>
        </select>
            </div>
            <div class="form2">
        <label id="Input"><b>Data Final</b></label>
        <input type="date" name="txtDataFinal" id="Input">
        <label id="Input"><b>Horário</b></label>
        <select name="txtHorario" id="Input">
            <option selected>Tomar Remédio a cada</option>
            <option value=1>1 Hora</option>
            <?php
                for($hora=2;$hora<=24;$hora++){
                    $selectHoras .= "<option value=$hora>$hora Horas</option>";
                }
                echo $selectHoras;
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
</body>
</html>