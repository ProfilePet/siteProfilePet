<?php
include_once('Model/Usuario.php');
class UsuarioDAO
{
    function ConsultarEstado()
    {
        include('conn.php');
        $retornoDB = $pdo->query("SELECT * FROM tbestado");
        return $retornoDB;
    }
    function ConsultarCidade($cid)
    {
        include('../conn.php');//conn com .. porque está sendo acessada pela CidadeController
        $retornoDB = $pdo->prepare("SELECT * FROM tbcidade WHERE codEstado = :cid");
        $retornoDB->bindValue(":cid", $cid);
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function Cadastrar(Usuario $us)
    {
        //Cadastro feito Usando o Objeto da Model que é Enviado pela Controller
        include('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tbusuario(nome,email,celular,senha,ativo,codCidade,codEstado)VALUES
        (:n,:e,:c,:s,:a,:cid,:es)");
        $retornoDB->bindValue(":n", $us->getNomeUsuario());
        $retornoDB->bindValue(":e", strtolower($us->getEmail()));//Colacado String Lower na Dao para Salvar email tudo minusculo
        $retornoDB->bindValue(":c", $us->getCelular());
        $retornoDB->bindValue(":s", $us->getSenha());
        $retornoDB->bindValue(":a", $us->getAtivo());
        $retornoDB->bindValue(":cid", $us->getCidade());
        $retornoDB->bindValue(":es", $us->getEstado());
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function Editar(Usuario $us)
    {
        include('conn.php');
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
    public static function Verifica(Usuario $us)
    {
        include('conn.php');
        $retornoDB = $pdo->query("SELECT * FROM tbusuario WHERE email ='{$us->getEmail()}'");
        return $retornoDB;
    }
}
