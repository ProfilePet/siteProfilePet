<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        <input type="date" name="txtDataInicial" value="<?php echo$dataIni?>">
        <input type="date" name="txtDataFinal" value="<?php echo$dataFin?>">
        <select name="txtHorario">
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
        <select name="txtMedicacoes">
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
        <button>Editar</button>
    </form>
    <a href="../excluir-medicacao/<?php echo "$codLembreteMedicacao/$codAnimalMed";?>"><button>Excluir</button></a>
    
</body>
</html>