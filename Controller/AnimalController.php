<?php
    class AnimalController{
        public function telaCadastrar(){
            include('DAO/AnimalDAO.php');
            //Consulta para a select de Especie
            $consultaTemperamento = AnimalDAO::consultarTemperamento();
            $consultaTemperamento = $consultaTemperamento->fetchAll();
            $consultaEspecie = AnimalDAO::consultarEspecie();
            $consultaEspecie = $consultaEspecie->fetchAll();
            include('View/modulos/Animal/cadastro.php');
            
        }
        public function cadastrar(){
            include('Model/Animal.php');
            include('DAO/AnimalDAO.php');
            $objAnimal = new Animal();
            $objAnimal->setNomeAnimal($_POST['txtNomeAnimal']);
            $objAnimal->setNascimentoAnimal($_POST['txtCalendario']);
            $objAnimal->setAtivoAnimal(1);
            $objAnimal->setCodUsuarioA(21);
            $objAnimal->setCodRacaAnimal($_POST['txtRaca']);
            $objAnimal->setTemperamentoAnimal($_POST['txtTemperamento']);
            //Pegando Imagem do Pet e Renomeando e Mando Para Pasta Imagens/PetPhoto
            if(isset($_FILES['txtImagem']))
            {   
                $arquivo = $_FILES["txtImagem"]["name"];
                $tempname = $_FILES["txtImagem"]["tmp_name"];             
                $extensao = pathinfo($arquivo,PATHINFO_EXTENSION);
                $pasta = "Imagens/PetPhoto/"."{$objAnimal->getCodUsuarioA()}$arquivo";

                    if (move_uploaded_file($tempname, $pasta))  {
                        echo "Image uploaded successfully";
                        $objAnimal->setImagemAnimal($pasta);

                    }else{
                        echo "Failed to upload image";
                }
            }
            //var_dump($objAnimal);
            $retorno = AnimalDAO::cadastrar($objAnimal);
            echo"a";
            echo "
            <script type=\"text/javascript\">
            window.location='tela-consulta-animal';
            </script>
            ";

        }
        public function telaConsultar(){
            include('DAO/AnimalDAO.php');
            $consultaAnimais = AnimalDAO::consultarMenu(21);
            $consultaAnimais = $consultaAnimais->fetchAll();
            include('View/modulos/Animal/consulta.php');
        }
        public function telaEditar($cod){
            include('Model/Animal.php');
            include_once('DAO/AnimalDAO.php');
            $consultaAnimal = AnimalDAO::consultarPerfil($cod);
            $consultaAnimal = $consultaAnimal->fetchAll();
            $consultaEspecie = AnimalDAO::consultarEspecie();
            $consultaEspecie = $consultaEspecie->fetchAll();
            //var_dump($consultaAnimal);
            include('View/modulos/Animal/editar.php');

        }
        
        public function editar(){
            include('Model/Animal.php');
            include_once('DAO/AnimalDAO.php');
            session_start();
            $objAnimal = new Animal();
            $objAnimal->setCodAnimal($_SESSION['codAnimal']);
            $objAnimal->setNomeAnimal($_POST['txtNomeAnimal']);
            $objAnimal->setCodRacaAnimal($_POST['txtRaca']);
            $objAnimal->setNascimentoAnimal($_POST['txtCalendario']);
            $objAnimal->setAtivoAnimal(1);
            $objAnimal->setCodUsuarioA(21);
            $objAnimal->setTemperamentoAnimal(1);
            if (isset($_POST['btnExcluir'])){
                $retorno =  AnimalDAO::deletarAnimal($objAnimal);
                echo "
                <script type=\"text/javascript\">
                alert(\"Animal Excluido com Sucesso.\");
                window.location='tela-consulta-animal';
                </script>
                ";
            }
            else{
            if(isset($_FILES['txtImagem']))
            {   
                $arquivo = $_FILES["txtImagem"]["name"];
                $tempname = $_FILES["txtImagem"]["tmp_name"];             
                $extensao = pathinfo($arquivo,PATHINFO_EXTENSION);
                $pasta = "Imagens/PetPhoto/"."{$objAnimal->getCodUsuarioA()}$arquivo";

                    if (move_uploaded_file($tempname, $pasta))  {
                        $objAnimal->setImagemAnimal($pasta);
                       

                    }else{
                        $objAnimal->setImagemAnimal($_SESSION['imagemAnimal']);
                }
            }
            $retorno = AnimalDAO::editarAnimal($objAnimal);
            echo "
                    <script type=\"text/javascript\">
                    alert(\"Animal Alterado com Sucesso.\");
                    window.location='tela-consulta-animal';
                    </script>
                    ";
                }
        }
        public function telaPerfil($cod){
            include_once('DAO/AnimalDAO.php');
            $consultaAnimal = AnimalDAO::consultarPerfil($cod);
            $consultaAnimal = $consultaAnimal->fetchAll();
            var_dump($consultaAnimal);
            include('View/modulos/Animal/perfil.php');
        }
        public function edita_Consulta(){
            if (isset($_POST['btAnimal'])){
                echo"Consultar";
                $cod=$_POST['btAnimal'];
                $this->telaPerfil($cod);
            }
            else if (isset($_POST['btEditar'])){
                echo"Editar";
                $cod=$_POST['btEditar'];
                $this->telaEditar($cod);
            }
        }
    }
?>
