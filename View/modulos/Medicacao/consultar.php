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
         <label>Hora Inicial da Medicação</label>
         <input type="time" onchange="horarioMedicacoes()" id="HoraInicial" name="HoraInicial">
         <div class="HoraMed">
         </div>
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
    
</body>
</html>