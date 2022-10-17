<?php

$retornoDB;
$tabela = 'tbusuario';
include_once('Model/Usuario.php');

class UsuarioDAO{

    function ConsultarEstado(){
        require ('conn.php');
        $retornoDB = $pdo->query("SELECT * FROM tbestado");
        return $retornoDB;
    }
    function ConsultarCidade(){
        //Usar Where com codEstado
        require ('conn.php');
        $retornoDB = $pdo->query("SELECT * FROM tbcidade");    
        return $retornoDB;
    }
    public static function Cadastrar(Usuario $us){
        //Cadastro feito Usando o Objeto da Model que é Enviado pela Controller
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tbusuario(nome,email,celular,senha,ativo,codCidade,codEstado)VALUES
        (:n,:e,:c,:s,:a,:cid,:es)");
        $retornoDB->bindValue(":n", $us->getNomeUsuario());
        $retornoDB->bindValue(":e", $us->getEmail());
        $retornoDB->bindValue(":c", $us->getCelular());
        $retornoDB->bindValue(":s", $us->getSenha());
        $retornoDB->bindValue(":a", $us->getAtivo());
        $retornoDB->bindValue(":cid", $us->getCidade());
        $retornoDB->bindValue(":es", $us->getEstado());
        $retornoDB->execute();
        //Não testado
        var_dump($pdo);    
        return $retornoDB;
    }
    public static function Editar(Usuario $us){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tbusuario SET nome=:n,email=:e,
        celular=:c,senha=:s,ativo=:a,codCidade=:cid,
        codEstado=:es WHERE codUsuario = :cod");
         $retornoDB->bindValue(":n", $us->getNomeUsuario());
         $retornoDB->bindValue(":e", $us->getEmail());
         $retornoDB->bindValue(":c", $us->getCelular());
         $retornoDB->bindValue(":s", $us->getSenha());
         $retornoDB->bindValue(":a", $us->getAtivo());
         $retornoDB->bindValue(":cid", $us->getCidade());
         $retornoDB->bindValue(":es", $us->getEstado());
         $retornoDB->bindValue(":cod", $us->getCodUsuario());
         $retornoDB->execute();
        return $retornoDB;
    }
    public static function Verifica(Usuario $us){
        require_once ('conn.php');
        $retornoDB = $pdo->query("SELECT * FROM tbusuario WHERE email ='{$us->getEmail()}'");    
        return $retornoDB;
    }

}