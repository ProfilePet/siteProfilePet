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
         echo"Data Inicial: $dataIni<hr>
         Data Final: $dataFin<hr>
         Tomar a Cada: $horaMed Horas<hr>
         Nome Medicação: $nomeMed<hr>"
         ?>
    
</body>
</html>