<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../cadastrar-diagnostico/<?php echo $codAnimal;?>" method="POST">
        <input type="text" name="txtTratamento" placeholder="Tratamento">
        <select name="txtEnfermidade">
        <?php
            foreach($consultaEnfermidade as $key => $consEnf){
                    $cod=($consEnf['codEnfermidade']);
                    $enfermidade=($consEnf['nomeEnfermidade']);
                    $selectEnf.="<option value=$cod>$enfermidade</option>";
                }
                echo $selectEnf;
        ?>
        </select>
        <button>Enviar</button>
    </form>
</body>
</html>