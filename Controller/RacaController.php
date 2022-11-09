<?php
            include('../DAO/AnimalDAO.php');
            $objAnimalDao = new AnimalDAO();
            if (isset($_GET['especie'])){
            $es = $_GET['especie'];
            $ra = $_GET['raca'];
            $consultaESP = $objAnimalDao->consultarRaca($es);
            $consultaESP = $consultaESP->fetchAll();
            foreach($consultaESP as $key => $consEsp){
                $cod=($consEsp['codRacaAnimal']);
                $especie=($consEsp['nomeRacaAnimal']);
                if($cod!=$ra){
                $option.="<option value=$cod>$especie</option>".PHP_EOL;
                }
            }
            echo $option;
        }
?>