<?php
include_once('Model/LembreteMedicacao.php');
class LembreteMedicacaoDAO
{
    public static function cadastrar(LembreteMedicacao $lm)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tblembretemedicacao(dataInicial, dataFinal, hora, codMedicacao, codAnimal, ativoLembreteMedicacao)      VALUES (:di,:df,:hr,:cm,:ca,:a)");
        $retornoDB->bindValue(":di", $lm->getDataInicial());
        $retornoDB->bindValue(":df", $lm->getDataFinal());
        $retornoDB->bindValue(":hr", $lm->getHora());
        $retornoDB->bindValue(":cm", $lm->getCodMedicacao());
        $retornoDB->bindValue(":ca", $lm->getCodAnimal());
        $retornoDB->bindValue(":a",  $lm->getAtivoMedicacao());
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function editar(LembreteMedicacao $lm)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tblembretemedicacao SET dataInicial=:di, dataFinal=:df, hora=:hr, codMedicacao=:cm, codAnimal=:ca WHERE codLembreteMed=:clm");
        $retornoDB->bindValue(":di", $lm->getDataInicial());
        $retornoDB->bindValue(":df", $lm->getDataFinal());
        $retornoDB->bindValue(":hr", $lm->getHora());
        $retornoDB->bindValue(":cm", $lm->getCodMedicacao());
        $retornoDB->bindValue(":ca", $lm->getCodAnimal());
        $retornoDB->bindValue(":clm",  $lm->getCodLembreteMedicacao());
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function consultarMedicacoes()
    {
        require('conn.php');
        $retornoDB = $pdo->prepare("SELECT * FROM tbmedicacao");
        $retornoDB->execute();
        return $retornoDB;
    }

    public static function deletar($clm)
    {
        require('conn.php');
        $retornoDB = $pdo->prepare("UPDATE  tblembretemedicacao SET ativoLembreteMedicacao = 0 WHERE codLembreteMed=:clm");
        $retornoDB->bindValue(":clm", $clm);
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function consultar($ca)
    {
        require_once('../conn.php');
        $retornoDB = $pdo->prepare("SELECT codLembreteMed,dataInicial,dataFinal,hora, tblembretemedicacao.codMedicacao, tbanimal.nomeAnimal,tbmedicacao.nomeMedicacao FROM tblembretemedicacao INNER JOIN tbanimal ON tblembretemedicacao.codAnimal = tbanimal.codAnimal INNER JOIN tbmedicacao ON tbmedicacao.codMedicacao = tblembretemedicacao.codMedicacao WHERE tblembretemedicacao.codAnimal = :ca AND ativoLembreteMedicacao = 1");
        $retornoDB->bindValue(":ca", $ca);
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function consultarTelaEditar($clm)
    {
        require('conn.php');
        $retornoDB = $pdo->prepare("SELECT codLembreteMed,dataInicial,dataFinal,hora, tblembretemedicacao.codMedicacao,tblembretemedicacao.codAnimal, tbanimal.nomeAnimal,tbmedicacao.nomeMedicacao FROM tblembretemedicacao INNER JOIN tbanimal ON tblembretemedicacao.codAnimal = tbanimal.codAnimal INNER JOIN tbmedicacao ON tbmedicacao.codMedicacao = tblembretemedicacao.codMedicacao WHERE codLembreteMed = :clm");
        $retornoDB->bindValue(":clm", $clm);
        $retornoDB->execute();
        return $retornoDB;
    }
}
