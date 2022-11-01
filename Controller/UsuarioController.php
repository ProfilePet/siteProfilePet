<?php

class UsuarioController
{
    public function erro()
    {
        include 'View/modulos/Usuario/TelaErro.php';
    }
    public function telaSobre()
    {
        include 'View/modulos/Usuario/sobre.html';
    }
    public function telaPrincipal(Usuario $us)
    {
        include('DAO/UsuarioDAO.php');
        $verifica = UsuarioDAO::Verifica($us);
        while ($linha = $verifica->fetch(PDO::FETCH_ASSOC)) {
            $us->setcodUsuario($linha['codUsuario']);
        }
        include('View/modulos/Usuario/tela_principal.php');
    }
    public function telaCadastrar()
    {
        include('DAO/UsuarioDAO.php');
        $objUsuarioDao = new UsuarioDAO();
        $consultaES = $objUsuarioDao->ConsultarEstado();
        $consultaES = $consultaES->fetchAll();
        include 'View/modulos/Usuario/cadastro.php';
    }
    public function cadastrar()
    {
        include('Model/Usuario.php');
        include('DAO/UsuarioDAO.php');
        $objUsuario = new Usuario();

        //cadastro usuario
        $objUsuario->setNomeUsuario($_POST['txtNome']);
        $objUsuario->setEmail($_POST['txtEmail']);
        $objUsuario->setCelular($_POST['txtCel']);
        //Adicionado Criptografia MD5
        $objUsuario->setSenha(md5($_POST['txtSenha']));
        $objUsuario->setAtivo(1);
        $objUsuario->setCidade($_POST['cidades']);
        $objUsuario->setEstado($_POST['estados']);
        $retorno = UsuarioDAO::Cadastrar($objUsuario);
        $this->telaPrincipal($objUsuario);
    }
    public function editar()
    {
        include('Model/Usuario.php');
        include('DAO/UsuarioDAO.php');
        $objUsuario = new Usuario();
        $objUsuario->setCodUsuario(21);
        $objUsuario->setNomeUsuario('testado');
        $objUsuario->setEmail('testado@gmail.com');
        $objUsuario->setCelular('1123477789234');
        $objUsuario->setSenha('ola');
        $objUsuario->setAtivo(1);
        $objUsuario->setCidade(1);
        $objUsuario->setEstado(1);


        $retorno = UsuarioDAO::Editar($objUsuario);

        var_dump($retorno);
    }
    public function telaLogin()
    {
        include 'View/modulos/Usuario/login.php';
    }
    public function logar()
    {
        include('DAO/UsuarioDAO.php');
        include('Model/Usuario.php');

        $objUsuario = new Usuario();
        $objUsuarioDao = new UsuarioDAO();

        $objUsuario->setEmail($_POST['txtEmail']);
        $senha = md5($_POST['txtSenha']);
        $verifica = $objUsuarioDao->Verifica($objUsuario);

        $linhasRetorno = $verifica->rowCount();
        if ($linhasRetorno != 0) {
            while ($linha = $verifica->fetch(PDO::FETCH_ASSOC)) {
                $objUsuario->setcodUsuario($linha['codUsuario']);
                $objUsuario->setNomeUsuario($linha['nome']);
                $objUsuario->setCelular($linha['celular']);
                $objUsuario->setAtivo($linha['ativo']);
                $objUsuario->setCidade($linha['codCidade']);
                $objUsuario->setEstado($linha['codEstado']);
                $objUsuario->setEmail($linha['email']);
                $objUsuario->setSenha($linha['senha']);
            }
            if ($senha != $objUsuario->getSenha()) {
                echo "
                    <script type=\"text/javascript\">
                    alert(\"Senha Invalida.\");
                    window.location='tela-login-usuario';
                    </script>
                    ";
            } else {
                //Mandando Codigo do Usuario Para outra tela
                $this->telaPrincipal($objUsuario);
            }
        } else {
            echo "
			    <script type=\"text/javascript\">
				alert(\"Usuario Invalido.\");
                window.location='tela-login-usuario';
			    </script>
                ";
        }
    }
}
