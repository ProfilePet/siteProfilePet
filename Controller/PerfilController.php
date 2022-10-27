<?php
            //include_once('../DAO/UsuarioDAO.php');
if (isset($_GET['escolha'])) {
    $escolha = $_GET['escolha'];
    $codigo = $_GET['codigo'];
    if($escolha==1){
        include('../DAO/LembreteConsultaDAO.php');
        $consultaConsulta= LembreteConsultaDAO::consultaMenu($codigo);
        $consultaConsulta = $consultaConsulta->fetchAll();
        foreach($consultaConsulta as $key => $consConsu){
            //$cod=($consConsu['codDiagnostico']);
            $data=($consConsu['dataConsulta']);
            //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
            $option.="<div class=a>$data</div>".PHP_EOL;
        }
        echo $option;
    }
    else if($escolha==3){
        include('../DAO/DiagnosticoDAO.php');
        $consultaDiagnostico=DiagnosticoDAO::consultarDiagnostico($codigo);
        $consultaDiagnostico = $consultaDiagnostico->fetchAll();
        foreach($consultaDiagnostico as $key => $consDia){
            $cod=($consDia['codDiagnostico']);
            $tratamento=($consDia['tratamento']);
            //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
            $option.="<div class=a>$tratamento</div>".PHP_EOL;
        }
        echo $option;
    }
}
?>