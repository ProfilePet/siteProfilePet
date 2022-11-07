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
    foreach($consultaDiagnostico as $key => $consDiag){
            $cod=($consDiag['codDiagnostico']);
            $tratamento=($consDiag['tratamento']);
            $codEnfermidade=($consDiag['codEnfermidade']);
            $nomeEnfermidade=($consDiag['nomeEnfermidade']);
            $codAnimal=($consDiag['codAnimal']);
    }
        ?>
    <form action="../editar-diagnostico/<?php echo "$cod/$codAnimal";?>" method="POST">
        <input type="text" name="txtTratamento" placeholder="Tratamento" value="<?php echo $tratamento?>">
        <select name="txtEnfermidade">
            <option selected value="<?php echo $codEnfermidade;?>"><?php echo $nomeEnfermidade?></option>
        </select>
        <button>Enviar</button>
    </form>
</body>
</html>