<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <input type="date" name="txtData" value="<?php echo"$data";?>">
        <input type="time" name="txtHora" value="<?php echo"$hora";?>">
        <input type="text" name="txtLocal" placeholder="Local Consulta" value="<?php echo"$local";?>">
        <input type="text" name="txtNomeClinica" placeholder="Nome Clinica" value="<?php echo"$nomeClinica";?>">
        <input type="text" name="txtNomeVeterinario"  placeholder="Nome Veterinario" value="<?php echo"$veterinario";?>">
        <input type="text" name="txtTipoConsulta" placeholder="Tipo Consulta"value="<?php echo"$tipoConsulta";?>">
        <select name="txtDiagnostico">
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
        <button>Editar Consulta</button>
    </form>
    <a href="../excluir-consulta/<?php echo "$codCons/$codAnimal";?>"><button>Excluir</button></a>
</body>
</html>
</body>
</html>