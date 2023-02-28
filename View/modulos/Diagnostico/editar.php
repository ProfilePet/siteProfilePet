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
        <h1>Alterar Diagnóstico</h1>
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
    <div class="container">
        <label id="NomeDiagn2"><b>Nome do Tratamento</b></label><br>
        <input type="text" name="txtTratamento" placeholder="Tratamento" value="<?php echo $tratamento?>">
        <label id="Diagnos2"><b>Diagnóstico</b></label>
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
        <button id="btn-alterar">Editar</button>
    </form>
    <a href="../excluir-diagnostico/<?php echo"$cod/$codAnimal";?>"><input type="button" value="Excluir" class="btn-excluir"></button></a>
    </div>
</body>
</html>