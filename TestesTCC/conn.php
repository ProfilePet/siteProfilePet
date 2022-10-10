<?php
    $host = "localhost";
    $user = "root";
    $pass = "usbw";
    $banco = "testepp";

    try{
        $pdo = new PDO("mysql: dbname=$banco; host=$host", "$user", "$pass");
    }catch(PDOException $e){
        echo("Falha ao Conectar".$e->getMessage());
    }catch(Exception $e){
        echo("Falha ao Conectar".$e->getMessage());
    }
?>