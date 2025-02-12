<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../Imagens/TelaSobre/logoAba.png" />
    <link rel="stylesheet" type="text/css" href="../Scripts/Medicacao.css">
    <title>Editar Medicação</title>
</head>
<body>
<div id="Menu">
        <a href="../tela-perfil-animal/<?php echo $codAnimal?>">Voltar</a>
    </div>
    <div id="Form">
    <?php
         foreach($consultaLembreteMed as $key => $consMed){
            $dataIni=($consMed['dataInicial']);
            $dataFin=($consMed['dataFinal']);
            $horaMed=($consMed['hora']);
            $nomeMed=($consMed['nomeMedicacao']);
            $codMed=($consMed['codMedicacao']);
            $codAnimalMed=($consMed['codAnimal']);
         }

         
         
    ?>
     <form action="../editar-medicacao/<?php echo "$codLembreteMedicacao/$codAnimalMed";?>" method="POST">
     <div class="form1">
        <label id="Input"><b>Data Inicial</b></label>
        <input type="date" name="txtDataInicial" id="Input" value="<?php echo$dataIni?>">
        <label id="Input"><b>Nome Medicação</b></label>
        <select name="txtMedicacoes"  id="Input">
            <option selected value="<?php echo$codMed?>"><?php echo$nomeMed?></option>
        <?php
                foreach($consultaMedicacoes as $key => $consMedi){
                    $codMedi=($consMedi['codMedicacao']);
                    $nomeMedicacao=($consMedi['nomeMedicacao']);
                    if($codMedi!=$codMed){
                    $selectMed .= "<option value=$codMedi>$nomeMedicacao</option>";
                }
                }
                echo $selectMed;
            ?>
        
        </select>
            </div>
            <div class="form2">
        <label id="Input"><b>Data Final</b></label>
        <input type="date" name="txtDataFinal" id="Input" value="<?php echo$dataFin?>">
        <label id="Input"><b>Horário</b></label>
        <select name="txtHorario" id="Input">
            <option selected value="<?php echo$horaMed?>"><?php echo$horaMed?> Horas</option>
            <?php
                for($hora=1;$hora<=24;$hora++){
                    if($hora!=$horaMed){
                    $selectHoras .= "<option value=$hora>$hora Horas</option>";
                    }
                }
                echo $selectHoras;
            ?>
        </select>
        </div>
        <button id="btn-Cada">Editar</button>
    </form>
    <a href="../excluir-medicacao/<?php echo "$codLembreteMedicacao/$codAnimalMed";?>"><input value="Excluir" id="btn-Exc" type="button"></a>
    
</body>
</html>