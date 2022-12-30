<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../Imagens/TelaSobre/logoAba.png" />
    <link rel="stylesheet" href="../Scripts/CSS/Medicacoes-consulta.css">
    <title>Medicação</title>
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
        <div id="Menu">
            <a href="../tela-perfil-animal/<?php echo $codAnimalMed?>">Voltar</a>
        </div>
         <div class="Info">
            <div class="divEsq">
                <label id="labels">Nome Medicação</label>
                <label id="labels">Data Inicial</label>
                <label id="labels">Data Final</label>
                <label id="labels">Tomar a Cada</label>
                <label id="labels">Hora Inicial da Medicação</label>
            </div>
            <div class="divDir">
                <label id="Inputs"><?php echo $nomeMed ?></label>
                <label id="Inputs"><?php echo $dataIni ?></label>
                <label id="Inputs"><?php echo $dataFin ?></label>
                <label id="Inputs"><?php echo "$horaMed Horas";?></label>
                <label id="Inputs">Hora Inicial da Medicação <input type="time" onchange="horarioMedicacoes()" id="HoraInicial" name="HoraInicial"></label>
            </div>
         </div>
         <div class="HoraMed">
            <img src="../Imagens/TelaMedicacao/img1.png" width=100%>
         <script>
            function horarioMedicacoes(){
                var horaIni=document.querySelector("#HoraInicial").value;
                var medicacoes=document.querySelector(".HoraMed");
                medicacoes.innerHTML='';
                var tomar_a_cada = <?php echo $horaMed?> 
                tomar_a_cada = parseInt(tomar_a_cada);
                let hora = horaIni.split(":")[0];
                horaIni = hora;
                medicacoes.innerHTML+='<hr>Tomar Medicação as '+horaIni+' Horas<hr>';

                horaIni=parseInt(horaIni);
                while(horaIni<=24){
                    horaIni=horaIni+tomar_a_cada;
                    if(horaIni<24){
                    medicacoes.innerHTML+='Tomar Medicação as '+horaIni+' Horas<hr>';
                    }
                }
            }
        </script>
    </div>
    <img src="../Imagens/TelaMedicacao/logoP.png" width="190" height="120">
    <div id="rodape">
        <p>2022 - Profile Pet</p>
    </div>
</body>
</html>