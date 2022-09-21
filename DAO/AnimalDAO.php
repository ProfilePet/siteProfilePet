<?php
include_once('Model/Animal.php');
$tabela = 'tbanimal';
class AnimalDAO {
    public static function cadastrar(Animal $an){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO $tabela(codAnimal, nomeAnimal, imagemAnimal, nascimentoAnimal,
                                    codUsuario, codRacaAnimal, temperamentoAnimal, ativoAnimal) 
                                    VALUES (':ca', ':n', ':i', ':na'':c', ':r', ':t', ':a')");
        
        $retornoDB->bindValue(":ca", $an->getCodAnimal());
        $retornoDB->bindValue(":n", $an->getNomeAnimal());
        $retornoDB->bindValue(":i", $an->getImagemAnimal());
        $retornoDB->bindValue(":na", $an->getNascimentoAnimal());
        $retornoDB->bindValue(":c", $an->getCodUsuarioA());
        $retornoDB->bindValue(":r", $an->getCodRacaAnimal());
        $retornoDB->bindValue(":t", $an->getTemperamentoAnimal());
        $retornoDB->bindValue(":a", $an->getAtivoAnimal());
        $retornoDB->execute();
        
        return $retornoDB;
    }

    public static function consultarMenu(){
        require_once ('conn.php');
        $retornoDB = $pdo->query("SELECT codAnimal, nomeAnimal, imagemAnimal FROM tbanimal /*WHERE codUsuario = $*/");
        //$retornoDB->bindValue(":c", $c);

        return $retornoDB;
    }

    public static function consultarPerfil(Animal $an){
        require_once ('conn.php');
        $retornoDB = $pdo->query("SELECT * FROM $tabela WHERE codUsuario = :ca");
        $retornoDB->bindValue(":ca", $an->getCodAnimal());
        $retornoDB->execute();

        return $retornoDB;
    }

    public static function editarAnimal(Animal $an){//Edita os Atributos do Animal no Banco
        require_once('conn.php');
        $retornoDB = $pdo->prepare("UPDATE :tb SET nomeAnimal = :n, imagemAnimal = :i, nascimentoAnimal = :na,
                                    codRacaAnimal = :r, temperamentoAnimal = :t WHERE codAnimal = :ca");
        $retornoDB->bindValue(":tb", $tabela);
        $retornoDB->bindValue(":n", $an->getNomeAnimal());
        $retornoDB->bindValue(":i", $an->getImagemAnimal());
        $retornoDB->bindValue(":na", $an->getNascimentoAnimal());
        $retornoDB->bindValue(":r", $an->getCodRacaAnimal());
        $retornoDB->bindValue(":t", $an->getTemperamentoAnimal());
        $retornoDB->bindValue(":ca", $an->getCodAnimal());

        return $retornoDB;
    }

    public static function deletarAnimal(Animal $an){//Inativa o Perfil do Usuário no Banco
        require_once('conn.php');
        $retornoDB = $pdo->prepare("UPDATE :tb SET ativoAnimal = false WHERE codAnimal = :ca");
        $retornoDB->bindValue(":tb", $tabela);
        $retornoDB->bindValue(":ca", $an->getCodAnimal());

        return $retornoDB;
    }
}