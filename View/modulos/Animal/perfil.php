<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Scripts/style5.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="fundo">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function preencherEscolha(){
    var escolhas = $("#Escolhas").val();
	var url_atual = window.location.href;
    var codigo =  <?php echo $cod; ?>;
    
	console.log(escolhas);
	$.ajax({
		url:'../Controller/PerfilController.php?escolha='+escolhas+'&codigo='+codigo,
		success:function(data) {
            console.log(data);
            $("#resultado").html(data);
			//$("#txtRaca").removeAttr('disabled');
			}
		});
		}
</script>
    
    <?php
        foreach($consultaAnimal as $key => $consAnimal){
            $cod=($consAnimal['codAnimal']);
            $imagemAnimal=($consAnimal['imagemAnimal']);
            $nomeAnimal=($consAnimal['nomeAnimal']);
            $nascimentoAnimal = ($consAnimal['nascimentoAnimal']);
            $raca= ($consAnimal['nomeRacaAnimal']);
            $temperamento= ($consAnimal['temperamento']);
            $especie = ($consAnimal['especieAnimal']);
        }
    ?>
    <div class="perfil">
                        <img src="../<?php echo $imagemAnimal;?>" class="img-thumbnail" alt="...">
                        Nome:<?php echo $nomeAnimal;?><br>
                        Raça:<?php echo $raca;?><br>
                        Especie:<?php echo $especie;?><br>
                        Temperamento:<?php echo $temperamento;?><br>
    </div>
    </label>
    <div class="selectEscolha">
    <select id= "Escolhas" onchange="preencherEscolha()" class="form-select" aria-label="Default select example">
        <option selected>Selecione</option>
        <option value="1">Consultas</option>
        <option value="2">Medicações</option>
        <option value="3">Diagnóstico</option>

    </select>
    </div>
    <div id=resultado></div>
</body>
</html>