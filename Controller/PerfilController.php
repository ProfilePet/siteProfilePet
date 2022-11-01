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
            $cod=($consConsu['codConsulta']);
            $data=($consConsu['dataConsulta']);
            $hora=($consConsu['horaConsulta']);
            $local=($consConsu['localConsulta']);
            $veterinario=($consConsu['nomeVeterinario']);
            $tipoConsulta=($consConsu['tipoConsulta']);
            //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
            $option.="<div class=a><a href=../tela-consultar-consulta/$cod><button name=btnConsultar value=$cod>Consultar</button></a><br>$data<br>$hora<br>$local<br>$veterinario<br>$tipoConsulta<br><a href=../tela-editar-consulta/$cod><button name=btnEditar value=$cod>Editar</button></a></div>".PHP_EOL;
        }
        echo $option;
        echo"<a href=../tela-cadastro-consultas/$codigo><button name=btnNovaConsulta>adicionar</button></a>";
    }
    if($escolha==2){
        include('../DAO/LembreteMedicacaoDAO.php');
        $consultaMedicacao= LembreteMedicacaoDAO::consultar($codigo);
        $consultaMedicacao = $consultaMedicacao->fetchAll();
        foreach($consultaMedicacao as $key => $consMed){
            //$cod=($consConsu['codDiagnostico']);
            $data=($consMed['dataInicial']);
            //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
            $option.="<div class=a>$data</div>".PHP_EOL;
        }
        echo $option;
        echo"<button>adicionar</button>";
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
        echo"<button>adicionar</button>";
    }
}
?>