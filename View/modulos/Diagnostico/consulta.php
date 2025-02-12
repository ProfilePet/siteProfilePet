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
    <hr>Tratamento: <?php echo $tratamento?>
    <hr>Nome da Enfermidade: <?php echo $nomeEnfermidade?>
    
</body>
</html>