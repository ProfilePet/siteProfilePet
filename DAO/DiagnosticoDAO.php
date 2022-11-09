<?php
include_once('Model/Diagnostico.php');
class DiagnosticoDAO
{
    public static function criarDiagnostico(Diagnostico $dia)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tbdiagnostico(tratamento, codAnimal, codEnfermidade, ativoDiagnostico) VALUES (:t,:ca,:ce,:a)");
        $retornoDB->bindValue(":t", $dia->getTratamento());
        $retornoDB->bindValue(":ca", $dia->getCodAnimal());
        $retornoDB->bindValue(":ce", $dia->getCodEnfermidade());
        $retornoDB->bindValue(":a", $dia->getAtivoDiagnostico());
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function editarDiagnostico(Diagnostico $dia)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tbdiagnostico SET tratamento = :t, codEnfermidade = :ce WHERE codDiagnostico = :cd");
        $retornoDB->bindValue(":t", $dia->getTratamento());
        $retornoDB->bindValue(":ce", $dia->getCodEnfermidade());
        $retornoDB->bindValue(":cd", $dia->getCodDiagnostico());
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function consultarDiagnosticoTelaEditar($codDiag)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("SELECT codDiagnostico, tratamento, nomeEnfermidade,codAnimal,ativoDiagnostico,tbdiagnostico.codEnfermidade FROM tbdiagnostico INNER JOIN tbEnfermidade ON tbdiagnostico.codEnfermidade = tbEnfermidade.codEnfermidade WHERE codDiagnostico = :dia;");
        $retornoDB->bindValue(":dia", $codDiag);
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function consultarDiagnostico($codA)
    {
        include('../conn.php');
        $retornoDB = $pdo->prepare("SELECT codDiagnostico, tratamento, nomeEnfermidade, ativoDiagnostico FROM tbdiagnostico INNER JOIN tbEnfermidade ON tbdiagnostico.codEnfermidade = tbEnfermidade.codEnfermidade WHERE codAnimal = :ca AND ativoDiagnostico = 1");
        $retornoDB->bindValue(":ca", $codA);
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function consultarDiagnosticoTelaConsultar($codDiag)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("SELECT codDiagnostico, tratamento, nomeEnfermidade, ativoDiagnostico FROM tbdiagnostico INNER JOIN tbEnfermidade ON tbdiagnostico.codEnfermidade = tbEnfermidade.codEnfermidade WHERE codDiagnostico = :cd;");
        $retornoDB->bindValue(":cd", $codDiag);
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function consultarEnfermidade()
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("SELECT * FROM tbenfermidade");
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function consultarDiagnosticoConsulta($codA)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("SELECT * FROM tbdiagnostico WHERE codAnimal = :ca");
        $retornoDB->bindValue(":ca", $codA);
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function excluirDiagnostico($codDiagnostico)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tbdiagnostico SET ativoDiagnostico = false WHERE codDiagnostico = :cd");
        $retornoDB->bindValue(":cd", $codDiagnostico);
        $retornoDB->execute();
        return $retornoDB;
    }
}
