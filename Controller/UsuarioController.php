<?php

    class UsuarioController{
        public function erro(){
            include 'View/modulos/Usuario/TelaErro.php';
        }
        public function telaSobre(){
            include 'View/modulos/Usuario/sobre.html';
        }
        public function Sair(){
            session_start();
            unset($_SESSION['dados']);
            $this->telaSobre();
        }
        public function telaPrincipal(){
            session_start();
            if (isset($_SESSION['dados'])){
                $nome=$_SESSION['nomeUsu'];
                include('View/modulos/Usuario/Principal.html');
            }
            else{
                include 'View/modulos/Usuario/login.php';
            }
        }
        public function telaCadastrar(){
            include_once('DAO/UsuarioDAO.php');
            $objUsuarioDao = new UsuarioDAO();
            $consultaES = $objUsuarioDao->ConsultarEstado();
            $consultaES = $consultaES->fetchAll();
            //var_dump($consultaES);
                
            //Duas Consultas não ta funcionando
            //$consultaCID = $objUsuarioDao->ConsultarCidade();
            
            include 'View/modulos/Usuario/cadastro.php';
        }
        public function cadastrar(){
            include_once('Model/Usuario.php');
            include_once('DAO/UsuarioDAO.php');
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
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Usuário Cadastrado Com Sucesso.',
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        background: '#fff url(/images/trees.png)',
                        backdrop: `
                          rgba(0,0,123,0.4)
                          url(/images/nyan-cat.gif)
                          left top
                          no-repeat
                        `
                      }).then((result) =>{
                        if (result.isConfirmed){
                            window.location='tela-login-usuario'
                        }
                    })
                    </script>
                    ";


        }
        public function editar(){
            include_once('Model/Usuario.php');
            include_once('DAO/UsuarioDAO.php');
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
        public function telaLogin(){
            include 'View/modulos/Usuario/login.php';
        }
        public function logar(){
            include_once('DAO/UsuarioDAO.php');
            include_once('Model/Usuario.php');
            
            $objUsuario = New Usuario();
            $objUsuarioDao = new UsuarioDAO();
        
            $objUsuario->setEmail($_POST['txtEmail']);
            $senha = md5($_POST['txtSenha']);
            $verifica =$objUsuarioDao->Verifica($objUsuario);
            
            $linhasRetorno=$verifica->rowCount();
            if ($linhasRetorno!=0){
                while ($linha=$verifica->fetch(PDO::FETCH_ASSOC)){
                    $objUsuario->setcodUsuario($linha['codUsuario']);
                    $objUsuario->setNomeUsuario($linha['nome']);
                    $objUsuario->setCelular($linha['celular']);
                    $objUsuario->setAtivo($linha['ativo']);
                    $objUsuario->setCidade($linha['codCidade']);
                    $objUsuario->setEstado($linha['codEstado']);
                    $objUsuario->setEmail($linha['email']);
                    $objUsuario->setSenha($linha['senha']);
                }
                if($senha!=$objUsuario->getSenha()){

                    echo "
                    <script type=\"text/javascript\">
                    alert(\"Senha Invalida.\");
                    window.location='tela-login-usuario';
                    </script>
                    ";
                }
                else {
                    session_start();
                    $_SESSION['dados'] = $objUsuario;
                    $_SESSION['codigoUsu'] = $objUsuario->getCodUsuario();
                    $_SESSION['nomeUsu'] = $objUsuario->getNomeUsuario();
                    //Mandando Codigo do Usuario Para outra tela
                    header('Location:tela-principal-usuario');
                }    
            }
            else{
                echo "
			    <script type=\"text/javascript\">
				alert(\"Usuario Invalido.\");
                window.location='tela-login-usuario';
			    </script>
                ";
                
            }
        }
    }