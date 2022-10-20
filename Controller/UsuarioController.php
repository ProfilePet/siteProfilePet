<?php

    class UsuarioController{
        public function erro(){
            include 'View/modulos/Usuario/TelaErro.php';
        }
        public function telaPrincipal(){
            include('View/modulos/Usuario/sobre.html');
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
            include('View/modulos/Usuario/sobre.html');


        }
        public function pesquisaEstado(){
            include_once('DAO/UsuarioDAO.php');
            $objUsuarioDao = new UsuarioDAO();
            $consultaES = $objUsuarioDao->ConsultarEstado();
            $consultaES = $consultaES->fetchAll();
            foreach($consultaES as $key => $consES){
                $uf=($consES['uf']);
                $codEstado=($consES['codEstado']);
                echo "<option value=$codEstado>$uf</option>";
            }

        }
        public function pesquisaCidade(){
            include_once('DAO/UsuarioDAO.php');
            $objUsuarioDao = new UsuarioDAO();
            if (isset($_POST['estado'])){
            $id = $_POST['estado'];
            echo"<script type=\"text/javascript\">
                    alert(\"$id.\");
                    console.log($id);
                    </script>";
            $consultaCID = $objUsuarioDao->ConsultarCidade($id);
            $consultaCID = $consultaCID->fetchAll();
            foreach($consultaCID as $key => $consCid){
                $cid=($consCid['nomeCidade']);
                $codCidade=($consCid['codCidade']);
                //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
                $option.="<option value=$codCidade>$cid</option>".PHP_EOL;
            }
            echo $option;
        }

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
                    //Mandando Codigo do Usuario Para outra tela
                    session_start();
                    $_SESSION['codUsuario'] = $objUsuario->getCodUsuario();
                    include 'View/modulos/Usuario/sobre.html';
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