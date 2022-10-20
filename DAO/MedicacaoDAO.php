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

    public static function cadastrarMedicacaoDiag(Medicacao $med)
    {
        # code...
    }
}