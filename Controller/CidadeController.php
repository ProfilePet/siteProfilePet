<?php
            include_once('../DAO/UsuarioDAO.php');
            $objUsuarioDao2 = new UsuarioDAO();
            if (isset($_GET['estado'])){
            $id = $_GET['estado'];
            $consultaCID = $objUsuarioDao2->ConsultarCidade($id);
            $consultaCID = $consultaCID->fetchAll();
            foreach($consultaCID as $key => $consCid){
                $cid=($consCid['nomeCidade']);
                $codCidade=($consCid['codCidade']);
                //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
                $option.="<option value=$codCidade>$cid</option>".PHP_EOL;
            }
            echo $option;
        }
?>