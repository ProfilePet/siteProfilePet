<?php
include('../DAO/UsuarioDAO.php');
$id = $_GET['estado'];
echo "
<script type=\"text/javascript\">
alert(\"OKOK estado = $id.\");
</script>
";
$consultaCID = $objUsuarioDao->consultarCidade($id);
$consultaCID = $consultaCID->fetchAll();
foreach($consultaCID as $key => $consCid){
    $cid=($consCid['nomeCidade']);
    $codCidade=($consCid['codCidade']);
    echo "<option value=$codCidade>$cid</option>";
}