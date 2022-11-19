<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Scripts/Consulta.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
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
        //var_dump($consultaConsulta);
            foreach($consultaConsulta as $key => $consConsu){
                $cod=($consConsu['codConsulta']);
                $data=($consConsu['dataConsulta']);
                $hora=($consConsu['horaConsulta']);
                $local=($consConsu['localConsulta']);
                $nomeClinica=($consConsu['nomeClinica']);
                $veterinario=($consConsu['nomeVeterinario']);
                $tratamento = ($consConsu['tratamento']);
                $tipoConsulta=($consConsu['tipoConsulta']);
                $codDiagCons=($consConsu['codDiagnostico']);
            }
        ?>
    <form action="../editar-consulta/<?php echo"$codCons/$codAnimal";?>" method="POST">
    <div id="Form">
        <h2>Editar Consulta</h2>
        <div class="inputs1">
            <label id="Nm"><b>Nome Veterinário</b></label>
            <input type="text" name="txtNomeVeterinario" id="Input" value="<?php echo"$veterinario";?>">

            <label id="DC"><b>Data Consulta</b></label>
            <input type="date" name="txtData" value="<?php echo"$data";?>">

            <label id="Hr"><b>Horário</b></label>
            <input type="time" name="txtHora" id="Input" value="<?php echo"$hora";?>">
        </div>
        <div class="inputs2">


            <label id="NC"><b>Nome Clinica</b></label>
            <input type="text" name="txtNomeClinica" id="Input" value="<?php echo"$nomeClinica";?>">

            <label id="Tc"><b>Tipo Consulta</b></label>
            <input type="text" name="txtTipoConsulta" placeholder="Tipo Consulta" id="Input" value="<?php echo"$tipoConsulta";?>">

            <label id="Lo"><b>Local</b></label>
            <input type="text" name="txtLocal" id="Input" value="<?php echo"$local";?>">

            <label id="Tr"><b>Tratamento</b></label>
            <select name="txtDiagnostico" id="SeleHorario" class="form-select">
            <option selected value="<?php echo"$codDiagCons";?>"><?php echo"$tratamento";?></option>
            <?php
            var_dump($consultaDiagnostico);
            foreach($consultaDiagnostico as $key => $consDiag){
                $codDiag=($consDiag['codDiagnostico']);
                $tratamentoDiag=($consDiag['tratamento']);
                if($codDiag!=$codDiagCons){
                $selectDiag.="<option value=$codDiag>$tratamentoDiag</option>";
                }

            }
            echo $selectDiag;
        ?>
            </select>
            </div>
        <button id="btn-Cada">Editar Consulta</button>
    </form>
    <a href="../excluir-consulta/<?php echo "$codCons/$codAnimal";?>"><input type="button" id="btn-Exc" value="Excluir"></a>
</body>
</html>
</body>
</html>