<?php
include_once('Model/Diagnostico.php');
class DiagnosticoDAO{
    public static function criarDiagnostico(Diagnostico $dia){
        include ('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tbdiagnostico(tratamento, codAnimal, codEnfermidade, ativoDiagnostico) VALUES (:t,:ca,:ce,:a)");
        $retornoDB->bindValue(":t", $dia->getTratamento());
        $retornoDB->bindValue(":ca", $dia->getCodAnimal());
        $retornoDB->bindValue(":ce", $dia->getCodEnfermidade());
        $retornoDB->bindValue(":a", $dia->getAtivoDiagnostico());
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function editarDiagnostico(Diagnostico $dia){
        include ('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tbdiagnostico SET tratamento = :t, codAnimal = :ca, codEnfermidade = :ce, ativoDiagnostico = :a WHERE codDiagnostico = :cd");
        $retornoDB->bindValue(":t", $dia->getTratamento());
        $retornoDB->bindValue(":ca", $dia->getCodAnimal());
        $retornoDB->bindValue(":ce", $dia->getCodEnfermidade());
        $retornoDB->bindValue(":a", $dia->getAtivoDiagnostico());
        $retornoDB->bindValue(":cd", $dia->getCodDiagnostico());
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function consultarDiagnostico(Diagnostico $dia){
        include('conn.php');
        $retornoDB = $pdo->prepare("SELECT codDiagnostico, tratamento, nomeEnfermidade, ativoDiagnostico FROM tbdiagnostico INNER JOIN tbEnfermidade ON tbdiagnostico.codEnfermidade = tbEnfermidade.codEnfermidade WHERE codAnimal = :ca");
        $retornoDB->bindValue(":ca", $dia->getCodAnimal());
        $retornoDB->execute();
        return $retornoDB;
    }
}