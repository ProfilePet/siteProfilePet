<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../cadastrar-consulta/<?php echo"$codAnimal";?>" method="POST">
        <input type="date" name="txtData">
        <input type="time" name="txtHora">
        <input type="text" name="txtLocal" placeholder="Local Consulta">
        <input type="text" name="txtNomeClinica" placeholder="Nome Clinica">
        <input type="text" name="txtNomeVeterinario"  placeholder="Nome Veterinario">
        <input type="text" name="txtTipoConsulta" placeholder="Tipo Consulta">
        <select name="txtDiagnostico">
        <?php
            var_dump($consultaDiagnostico);
            foreach($consultaDiagnostico as $key => $consDiag){
                $cod=($consDiag['codDiagnostico']);
                $tratamento=($consDiag['tratamento']);
                $selectDiag.="<option value=$cod>$tratamento</option>";
            }
            echo $selectDiag;
        ?>
        </select>
        <button>Adicionar Consulta</button>
    </form>
</body>
</html>