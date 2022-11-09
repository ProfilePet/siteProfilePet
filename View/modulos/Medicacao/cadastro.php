<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>
<body>
    <form action="../cadastrar-medicacao/<?php echo $codAnimal?>" method="POST">
        <input type="date" name="txtDataInicial">
        <input type="date" name="txtDataFinal">
        <select name="txtHorario">
            <option selected>Tomar Remédio a cada</option>
            <option value=1>1 Hora</option>
            <?php
                for($hora=2;$hora<=24;$hora++){
                    $selectHoras .= "<option value=$hora>$hora Horas</option>";
                }
                echo $selectHoras;
            ?>
        </select>
        <select name="txtMedicacoes">
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
        <button>A</button>
    </form>
</body>
</html>