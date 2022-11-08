<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bdprofilepet";

    try{
    $pdo = new PDO ("mysql:dbname=$banco;charset=utf8;host=$host","$user","$pass");
    }
    catch(PDOException $e){
        echo("Falha ao Conectar".$e->getMessage());
    }
    catch(Exception $e){
        echo("Falha ao Conectar".$e->getMessage());
    }

?>