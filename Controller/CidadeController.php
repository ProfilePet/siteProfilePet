<?php
include('../DAO/UsuarioDAO.php');
$objUsuarioDao = new UsuarioDAO();
if (isset($_GET['estado'])) {
    $id = $_GET['estado'];
    $consultaCID = $objUsuarioDao->ConsultarCidade($id);
    $consultaCID = $consultaCID->fetchAll();
    foreach ($consultaCID as $key => $consCid) {
        $cid = ($consCid['nomeCidade']);
        $codCidade = ($consCid['codCidade']);
        $option .= "<option value=$codCidade>$cid</option>" . PHP_EOL;
    }
    echo $option;
}
