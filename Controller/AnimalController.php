<?php
    class AnimalController{
        public function telaCadastrar(){
            include('DAO/AnimalDAO.php');
            //Consulta para a select de Especie
            $consultaTemperamento = AnimalDAO::consultarTemperamento();
            $consultaTemperamento = $consultaTemperamento->fetchAll();
            $consultaEspecie = AnimalDAO::consultarEspecie();
            $consultaEspecie = $consultaEspecie->fetchAll();
            session_start();
            $codUsu=$_SESSION['codUsuario'];
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
            <body></body>< src=//cdn.jsdelivr.net/npm/sweetalert2@11></>
                    < type=\"text/java\">
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
                    </>
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
            //var_dump($consultaAnimal);
            include('View/modulos/Animal/editar.php');

        }
        
        public function editar(){
            include('../Model/Animal.php');
            include_once('DAO/AnimalDAO.php');
            //var_dump($_POST);
            session_start();
            $codigoUsu=$_SESSION['codigoUsu'];
            $objAnimal = new Animal();
            $objAnimal->setNomeAnimal($_POST['txtNomeAnimal']);
            $objAnimal->setCodRacaAnimal($_POST['txtRaca']);
            $objAnimal->setNascimentoAnimal($_POST['txtCalendario']);
            $objAnimal->setCodUsuarioA($codigoUsu);
            $objAnimal->setAtivoAnimal(1);
            $objAnimal->setTemperamentoAnimal(1);
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
            <body></body>< src=//cdn.jsdelivr.net/npm/sweetalert2@11></>
                    < type=\"text/java\">
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
                    </>
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
        public function consultasAnimal(){
            var_dump($_POST);
        }
        public function consultarConsulta($codCons){
            include('DAO/LembreteConsultaDAO.php');
            $consultaConsulta= LembreteConsultaDAO::consultaDetalhada($codCons);
            $consultaConsulta = $consultaConsulta->fetchAll();

            foreach($consultaConsulta as $key => $consConsu){
                $cod=($consConsu['codConsulta']);
                $data=($consConsu['dataConsulta']);
                $hora=($consConsu['horaConsulta']);
                $local=($consConsu['localConsulta']);
                $veterinario=($consConsu['nomeVeterinario']);
                $tipoConsulta=($consConsu['tipoConsulta']);
                //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
                echo"<hr>Data: $data<hr>Hora: $hora<hr>Local: $local<hr>Veterinario: $veterinario<hr>Tipo Consulta: $tipoConsulta<hr>".PHP_EOL;
            }
        }
        public function editarConsulta($codCons){
            include('DAO/LembreteConsultaDAO.php');
            echo"a";
            include('View/modulos/Consulta/editar.php');
            $consultaConsulta= LembreteConsultaDAO::consultaDetalhada($codCons);
            echo"a";
            $consultaConsulta = $consultaConsulta->fetchAll();

            var_dump($consultaConsulta);
        }
        public function telaCadastroConsulta($codAnimal){
            var_dump($codAnimal);
            include('View/modulos/Consulta/cadastro.php');
        }
    }
?>
