<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../Imagens/TelaSobre/logoAba.png" />
    <link rel="stylesheet" type="text/css" href="../Scripts/CSS/Diagnostico.css">
    <title>Novo Diagnostico</title>
</head>
<body>
    <div id="Menu">
        <a href="Principal.html">Voltar</a>
    </div>
    <h1>Diagnósticos</h1>
    <form action="../cadastrar-diagnostico/<?php echo $codAnimal;?>" method="POST">
        <div class="container">
          <h2>Novo Diagnóstico</h2>
          <label id="NomeDiagn"><b>Nome do Tratamento</b></label>
          <input type="text" name="txtTratamento" required>

          <br>

          <label id="Diagnos"><b>Diagnóstico</b></label>
          <select name="txtEnfermidade" type="text">
            <?php
                foreach($consultaEnfermidade as $key => $consEnf){
                        $cod=($consEnf['codEnfermidade']);
                        $enfermidade=($consEnf['nomeEnfermidade']);
                        $selectEnf.="<option value=$cod>$enfermidade</option>";
                    }
                    echo $selectEnf;
            ?>
        </select>

          <center><button id="btn-cadastra">Cadastrar</button></center>
        </div>
    </form>
      
      

    <img src="../Imagens/TelaDiagnostico/logoP.png" width="190" height="120">
    
    <div id="rodape">
        2022 - Profile Pet
    </div>
</body>
</html>