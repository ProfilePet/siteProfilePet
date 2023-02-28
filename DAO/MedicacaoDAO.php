<?php
include_once('Model/Medicacao.php');
class MedicacaoDAO{
    public static function consultarMedicacao(){
        include('conn.php');
        $retornoDB = $pdo->query("SELECT codMedicacao, nomeMedicacao FROM tbmedicacao ORDER BY nomeMedicacao");
    }

    public static function consultarMedicacaoDiag($codDiag){
        include('conn.php');
        $retornoDB = $pdo->prepare("SELECT * FROM tbmedicacaodiagnostico WHERE codDiagnostico = :c");
        $retornoDB->bindValue(":c", $codDiag);
        $retornoDB->execute();  
        return $retornoDB;
    }

    public static function cadastrarMedicacaoDiag(MedicacaoDiag $med,){
        include('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tbmedicacaodiagnostico(codMedicacao, codDiagnostico) VALUES (':cm',':cd')");
        $retornoDB->bindValue(":cm", $med->getCodMedicacao());
        $retornoDB->bindValue(":cm", $dia->getCodDiagnostico());
        $retornoDB->execute();  
        return $retornoDB;
    }

    public static function excluirMedDiag(MedicacaoDiag $med){
        include('conn.php');
        $retornoDB = $pdo->prepare("DELETE FROM tbmedicacaodiagnostico WHERE codMedicacaoDiagnostico = :cmd");
    }
}