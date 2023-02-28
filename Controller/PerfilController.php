<?php
            //include_once('../DAO/UsuarioDAO.php');
if (isset($_GET['escolha'])) {
    $escolha = $_GET['escolha'];
    $codigo = $_GET['codigo'];
    if($escolha==1){
        include('../DAO/LembreteConsultaDAO.php');
        $consultaConsulta= LembreteConsultaDAO::consultaMenu($codigo);
        $consultaConsulta = $consultaConsulta->fetchAll();
        $option.="
        <table class='table table-bordered border-primary consulta'>
<thead>
<tr>
  <th scope=col>Tipo de Consulta</th>
  <th scope=col>Nome Clinica</th>
  <th scope=col>Nome Veterinario</th>
  <th scope=col>Data Consulta</th>
  <th scope=col>Horário</th>
  <th scope=col>Local</th>
  <th scope=col>Tratamento</th>
</tr>
</thead>";
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
           $option.="
      <tbody>
      <tr>
      <td>$tipoConsulta</td>
      <td>$nomeClinica</td>
      <td>$veterinario</td>
      <td>$data</td>
      <td>$hora</td>
      <td>$local</td>
      <td>$tratamento</td>
      <td scope=col><a href=../tela-editar-consulta/$cod><button name=btnEditar value=$cod><i class='fa-solid fa-pen-to-square'></i></button></a></td>
    </tr>
  </tbody>".PHP_EOL;
        }
        $option.="</table>";
        echo $option;
        echo"<a href=../tela-cadastro-consultas/$codigo><button name=btnNovaConsulta class=btnAdicionar><i class='fa-solid fa-plus'></i></button></a>";
    }
    if($escolha==2){
        include('../DAO/LembreteMedicacaoDAO.php');
        $consultaMedicacao= LembreteMedicacaoDAO::consultar($codigo);
        $consultaMedicacao = $consultaMedicacao->fetchAll();
        $option.="
        <table class='table table-bordered border-primary medicacao'>
          <thead>
            <tr> 
              <th scope=col>Nome Medicação</th>
              <th scope=col>Data Inicial</th>
              <th scope=col>Data Final</th>
              <th scope=col>Tomar a Cada</th>
            </tr>
          </thead>";
        foreach($consultaMedicacao as $key => $consMed){
            $cod=($consMed['codLembreteMed']);
            $dataIni=($consMed['dataInicial']);
            $dataFin=($consMed['dataFinal']);
            $horaMed=($consMed['hora']);
            $dataFin=($consMed['dataFinal']);
            $nomeMed=($consMed['nomeMedicacao']);
            //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
            $option.="
            <tbody class=medicacoes>
              <tr onclick=location.href='../tela-consultar-medicacao/$cod'>
                <td>$nomeMed</td>
                <td>$dataIni</td>
                <td>$dataFin</td>
                <td>$horaMed Horas</td>
                <td scope=col><a href=../tela-editar-medicacao/$cod><button name=btnEditar value=$cod><i class='fa-solid fa-pen-to-square'></i></button></td>
              </tr>
            </tbody class=medicacoes>".PHP_EOL;
        }
        $option.="</table>".PHP_EOL;
        echo $option;
        echo"<div class=medicacoes></div><a href=../tela-cadastro-medicacoes/$codigo><button class=btnAdicionar><i class='fa-solid fa-plus'></i></button></a></div>";
    }
    else if($escolha==3){
        include('../DAO/DiagnosticoDAO.php');
        $consultaDiagnostico=DiagnosticoDAO::consultarDiagnostico($codigo);
        $consultaDiagnostico = $consultaDiagnostico->fetchAll();
        $option.="<table class='table table-bordered border-primary diagnostico'>
        <thead>
          <tr>
            <th scope=col>Tratamento</th>
            <th scope=col>Enfermidade</th>
          </tr>
        </thead>";
        foreach($consultaDiagnostico as $key => $consDia){
            $cod=($consDia['codDiagnostico']);
            $tratamento=($consDia['tratamento']);
            $enfermidade = ($consDia['nomeEnfermidade']);
            //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
            $option.="
  <tbody>
    <tr>
      <td>$tratamento</td>
      <td>$enfermidade</td>
      <td scope=col><a href=../tela-editar-diagnostico/$cod><button><i class='fa-solid fa-pen-to-square'></i></button></a></td>
    </tr>
  </tbody>".PHP_EOL;
        }
        $option.="</table>";
        echo $option;
        echo"<a href=../tela-cadastro-diagnosticos/$codigo><button class=btnAdicionar><i class='fa-solid fa-plus'></i></button></a>";
    }
}
?>