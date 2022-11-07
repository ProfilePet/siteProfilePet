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
            $nomeClinica=($consConsu['nomeClinica']);
            $veterinario=($consConsu['nomeVeterinario']);
            $tipoConsulta=($consConsu['tipoConsulta']);
            $tratamento=($consConsu['tratamento']);
            //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
            $option.="<div class=consultas></a>
            <table class='table table-bordered border-primary'>
  <thead>
    <tr>
      <th scope=col>Data Consulta</th>
      <th scope=col>Horário</th>
      <th scope=col>Local</th>
      <th scope=col>Nome Clinica</th>
      <th scope=col>Nome Veterinario</th>
      <th scope=col>Tipo de Consulta</th>
      <th scope=col>Tratamento</th>
      <th scope=col rowspan=2><a href=../tela-consultar-consulta/$cod><button name=btnConsultar value=$cod>Consultar</button></th>
      <th scope=col><a href=../tela-editar-consulta/$cod><button name=btnEditar value=$cod>Editar</button></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>$data</td>
      <td>$hora</td>
      <td>$local</td>
      <td>$nomeClinica</td>
      <td>$veterinario</td>
      <td>$tipoConsulta</td>
      <td>$tratamento</td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table></div>".PHP_EOL;
        }
        echo $option;
        echo"<div class=consultas><a href=../tela-cadastro-consultas/$codigo><button name=btnNovaConsulta>adicionar</button></a></div>";
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
            $enfermidade = ($consDia['nomeEnfermidade']);
            //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
            $option.="<div class=a>$tratamento<br>$enfermidade<br><a href=../tela-editar-diagnostico/$cod><button>Editar</button></a><a href=../tela-consultar-diagnostico/$cod><button>Consultar</button></a><hr></div>".PHP_EOL;
        }
        echo $option;
        echo"<a href=../tela-cadastro-diagnosticos/$codigo><button>adicionar</button></a>";
    }
}
?>