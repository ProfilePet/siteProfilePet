<?php
    class AnimalController{
        public function telaCadastrar(){
            
        }
        public function cadastrar(){
            include_once('DAO/AnimalDAO.php');
            $retorno = AnimalDAO::consultarMenu();
            var_dump($retorno);

        }
        public function telaEditar(){
            
        }
        public function editar(){
            include_once('DAO/AnimalDAO.php');

        }
    }
?>
