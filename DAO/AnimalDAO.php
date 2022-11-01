<?php
class AnimalDAO
{
    //Insere as informações do animal no Banco
    public static function cadastrar(Animal $an)
    {
        include('Model/Animal.php');
        include('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tbanimal (nomeAnimal,imagemAnimal,nascimentoAnimal,ativoAnimal,codUsuario,codRacaAnimal,codTemperamento) VALUES (:n,:i,:na,:a,:c,:r,:t)");
        $retornoDB->bindValue(":n", $an->getNomeAnimal());
        $retornoDB->bindValue(":i", $an->getImagemAnimal());
        $retornoDB->bindValue(":na", $an->getNascimentoAnimal());
        $retornoDB->bindValue(":a", $an->getAtivoAnimal());
        $retornoDB->bindValue(":c", $an->getCodUsuarioA());
        $retornoDB->bindValue(":r", $an->getCodRacaAnimal());
        $retornoDB->bindValue(":t", $an->getTemperamentoAnimal());
        $retornoDB->execute();
        return $retornoDB;
    }

    //Consulta nome, código, e imagem do animal para ser utilizada no Menu de Animais
    public static function consultarMenu($cod)
    {
        include('conn.php');
        $retornoDB = $pdo->prepare("SELECT codAnimal, nomeAnimal, imagemAnimal FROM tbanimal WHERE codUsuario = :c AND ativoAnimal = 1");
        $retornoDB->bindValue(":c", $cod);
        $retornoDB->execute();
        return $retornoDB;
    }

    //Consulta todas especies da tabela padrão
    public static function consultarEspecie()
    {
        include('conn.php');
        $retornoDB = $pdo->query("SELECT * FROM tbespecie");
        return $retornoDB;
    }

    //Consulta todas as Raças com base na espécie pré escolhida pelo usuario;
    public static function consultarRaca($esp)
    {
        include('../conn.php');
        $retornoDB = $pdo->prepare("SELECT * FROM tbraca WHERE codEspecieAnimal = :es");
        $retornoDB->bindValue(":es", $esp);
        $retornoDB->execute();
        return $retornoDB;
    }

    //Consulta todos os Temperamentos da tabela padrão
    public static function consultarTemperamento()
    {
        include('conn.php');
        $retornoDB = $pdo->query("SELECT * FROM tbtemperamento");
        return $retornoDB;
    }

    //Consulta todos os Dados do Animal para ser colocado no Perfil do Animal
    public static function consultarPerfil($cod)
    {
        require('conn.php');
        $retornoDB = $pdo->prepare("SELECT codAnimal, nomeAnimal, imagemAnimal, nascimentoAnimal, nomeRacaAnimal, temperamento FROM tbanimal INNER JOIN tbRaca ON tbRaca.codRacaAnimal = tbAnimal.codRacaAnimal INNER JOIN tbTemperamento ON tbAnimal.codTemperamento = tbTemperamento.codTemperamento WHERE codAnimal = :ca AND ativoAnimal = 1");
        $retornoDB->bindValue(":ca", $cod);
        $retornoDB->execute();
        return $retornoDB;
    }

    //Edita os Atributos do Animal no Banco
    public static function editarAnimal(Animal $an)
    { 
        require_once('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tbanimal SET nomeAnimal = :n, imagemAnimal = :i, nascimentoAnimal = :na, codRacaAnimal = :r, codTemperamento = :t WHERE codAnimal = :ca");
        $retornoDB->bindValue(":n", $an->getNomeAnimal());
        $retornoDB->bindValue(":i", $an->getImagemAnimal());
        $retornoDB->bindValue(":na", $an->getNascimentoAnimal());
        $retornoDB->bindValue(":r", $an->getCodRacaAnimal());
        $retornoDB->bindValue(":t", $an->getTemperamentoAnimal());
        $retornoDB->bindValue(":ca", $an->getCodAnimal());
        $retornoDB->execute();
        return $retornoDB;
    }

    //Inativa o Perfil do Usuário no Banco
    public static function deletarAnimal(Animal $an)
    {
        require_once('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tbanimal SET ativoAnimal = 0 WHERE codAnimal = :ca");
        $retornoDB->bindValue(":ca", $an->getCodAnimal());
        $retornoDB->execute();
        return $retornoDB;
    }
}
