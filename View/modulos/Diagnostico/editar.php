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
            <?php
            var_dump($consultaEnfermidade);
            foreach($consultaEnfermidade as $key => $consEnf){
            $codEnfermidade2=($consEnf['codEnfermidade']);
            $nomeEnfermidade2=($consEnf['nomeEnfermidade']);
            if($codEnfermidade2!=$codEnfermidade){
            $selectEnf.="<option value=$codEnfermidade2>$nomeEnfermidade2</option>";
            }
            }
            echo $selectEnf;
    ?>
        </select>
        <button>Enviar</button>
    </form>
    <a href="../excluir-diagnostico/<?php echo"$cod/$codAnimal";?>"><button>Excluir</button></a>
</body>
</html>