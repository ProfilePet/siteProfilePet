<?php
    class AnimalController{
        public function telaCadastrar(){
            include('DAO/AnimalDAO.php');
            //Consulta para a select de Especie
            $objAnimalDao = new AnimalDAO();
            $consultaEspecie = $objAnimalDao->consultarEspecie();
            $consultaEspecie = $consultaEspecie->fetchAll();
            include('View/modulos/Animal/cadastro.php');
            
        }
        public function cadastrar(){
            include('Model/Animal.php');
            include('DAO/AnimalDAO.php');
            $objAnimal = new Animal();
            $objAnimal->setNomeAnimal("a");
            $objAnimal->setNascimentoAnimal("2022-09-21");
            $objAnimal->setAtivoAnimal(1);
            $objAnimal->setCodUsuarioA(21);
            $objAnimal->setCodRacaAnimal(1);
            $objAnimal->setTemperamentoAnimal(1);
            //Pegando Imagem do Pet e Renomeando e Mando Para Pasta Imagens/PetPhoto
            if(isset($_FILES['txtImagem']))
            {   
                $arquivo = $_FILES["txtImagem"]["name"];
                $tempname = $_FILES["txtImagem"]["tmp_name"];             
                $extensao = pathinfo($arquivo,PATHINFO_EXTENSION);
                $pasta = "Imagens/PetPhoto/"."$arquivo{$objUsuario->getCodUsuario()}";

                    if (move_uploaded_file($tempname, $pasta))  {
                        echo "Image uploaded successfully";
                        var_dump($pasta);
                        $objAnimal->setImagemAnimal($pasta);

                    }else{
                        echo "Failed to upload image";
                }
                $retorno = AnimalDAO::cadastrar($objAnimal);
            }

        }
        public function telaEditar(){
            
        }
        public function editar(){
            include_once('DAO/AnimalDAO.php');

        }
    }
?>
