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
            session_start();
            $codigo=$_SESSION['codigoUsu'];
            $objAnimal = new Animal();
            $objAnimal->setNomeAnimal($_POST['txtNomeAnimal']);
            $objAnimal->setNascimentoAnimal($_POST['txtCalendario']);
            $objAnimal->setAtivoAnimal(1);
            $objAnimal->setCodUsuarioA($codigo);
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
                        $objAnimal->setImagemAnimal('Imagens/PetPhoto/test.jpg');
                }
            }
            //var_dump($objAnimal);
            $retorno = AnimalDAO::cadastrar($objAnimal);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Animal Cadastrado Com Sucesso.',
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
                            window.location='tela-consulta-animal'
                        }
                    })
                    </script>
                    ";
        }
        public function telaConsultar(){
            session_start();
            $codigo=$_SESSION['codigoUsu'];
            include('DAO/AnimalDAO.php');
            $consultaAnimais = AnimalDAO::consultarMenu($codigo);
            $consultaAnimais = $consultaAnimais->fetchAll();
            include('View/modulos/Animal/consulta.php');
        }
        public function telaEditar($cod){
            include('../Model/Animal.php');
            include_once('DAO/AnimalDAO.php');
            $consultaAnimal = AnimalDAO::consultarPerfil($cod);
            $consultaAnimal = $consultaAnimal->fetchAll();
            $consultaEspecie = AnimalDAO::consultarEspecie();
            $consultaEspecie = $consultaEspecie->fetchAll();
            $consultaTemperamento = AnimalDAO::consultarTemperamento();
            $consultaTemperamento = $consultaTemperamento->fetchAll();
            //var_dump($consultaAnimal);
            include('View/modulos/Animal/editar.php');

        }
        
        public function editar(){
            include('../Model/Animal.php');
            include_once('DAO/AnimalDAO.php');
            //var_dump($_POST);
            session_start();
            $codigoUsu=$_SESSION['codigoUsu'];
            $imagemAnimal=$_SESSION['imagemAnimal'];
            $objAnimal = new Animal();
            $objAnimal->setNomeAnimal($_POST['txtNomeAnimal']);
            $objAnimal->setCodRacaAnimal($_POST['txtRaca']);
            $objAnimal->setNascimentoAnimal($_POST['txtCalendario']);
            $objAnimal->setCodUsuarioA($codigoUsu);
            $objAnimal->setAtivoAnimal(1);
            $objAnimal->setTemperamentoAnimal($_POST['txtTemperamento']);
            //$objAnimal->setCodUsuarioA();
            if (isset($_POST['btnExcluir'])){
                $objAnimal->setCodAnimal($_POST['btnExcluir']);
                
                $retorno =  AnimalDAO::deletarAnimal($objAnimal);
                header('Location: tela-consulta-animal');
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
                        $objAnimal->setImagemAnimal($imagemAnimal);
                }
            }
            $objAnimal->setCodAnimal($_POST['btnEditar']);
            $retorno = AnimalDAO::editarAnimal($objAnimal);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Animal Alterado Com Sucesso.',
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
                            window.location='tela-consulta-animal'
                        }
                    })
                    </script>
                    ";
                }
        }
        public function telaPerfil($cod){
            include_once('DAO/AnimalDAO.php');
            $consultaAnimal = AnimalDAO::consultarPerfil($cod);
            $consultaAnimal = $consultaAnimal->fetchAll();
            //var_dump($consultaAnimal);
            include('View/modulos/Animal/perfil.php');
        }
        public function consultas_animal(){
            var_dump($_POST);
        }
    }
?>
