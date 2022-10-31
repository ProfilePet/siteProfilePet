<?php
include('Model/LembreteMedicacao.php');
class LembreteMedicacaoDAO{
    public static function cadastrar(LembreteMedicacao $lm){
        include ('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tblembretemedicacao(dataInicial, dataFinal, hora, repeticaoLembrete, codMedicacao, codAnimal, ativoLembreteMedicacao) 
                                    VALUES (':di',':df',':hr',':rp',':cm',':ca',':a')");
        $retornoDB->bindValue(":di", $lm->getDataInicial());
        $retornoDB->bindValue(":df", $lm->getDataFinal());
        $retornoDB->bindValue(":hr", $lm->getHora());
        $retornoDB->bindValue(":rp", $lm->getRepeticaoLembrete());
        $retornoDB->bindValue(":cm", $lm->getCodMedicacaoEnfermidade());
        $retornoDB->bindValue(":ca", $lm->getCodAnimal());
        $retornoDB->bindValue(":a",  $lm->getAtivoMedicacao());
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function editar(LembreteMedicacao $lm){
        include ('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tblembretemedicacao SET dataInicial=':di', dataFinal=':df', hora=':hr', repeticaoLembrete=':rp', codMedicacao=':cm', codAnimal=':ca' WHERE codLembreteMed=':clm'");
        $retornoDB->bindValue(":di", $lm->getDataInicial());
        $retornoDB->bindValue(":df", $lm->getDataFinal());
        $retornoDB->bindValue(":hr", $lm->getHora());
        $retornoDB->bindValue(":rp", $lm->getRepeticaoLembrete());
        $retornoDB->bindValue(":cm", $lm->getCodMedicacaoEnfermidade());
        $retornoDB->bindValue(":ca", $lm->getCodAnimal());
        $retornoDB->bindValue(":a",  $lm->getAtivoMedicacao());
        $retornoDB->bindValue(":clm",  $lm->getCodLembreteMedicacao());
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function deletar($clm){
        require_once('conn.php');
        $retornoDB = $pdo->prepare("UPDATE ativoLembreteMedicacao = '0' WHERE codLembreteMed=':clm'");
        $retornoDB->bindValue(":clm", $clm);
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function consultar($ca){
        require_once('conn.php');
        $retornoDB = $pdo->prepare("SELECT `codLembreteMed`, `dataInicial`, `dataFinal`, `hora`, `repeticaoLembrete`, `codMedicacao`, tbanimal.nomeAnimal 
                                    FROM `tblembretemedicacao` INNER JOIN tbanimal ON tblembretemedicacao.codAnimal = tbanimal.codAnimal 
                                    WHERE codAnimal = ':ca'");
        $retornoDB->bindValue(":ca", $ca);
        $retornoDB->execute();
        return $retornoDB;
    }
}