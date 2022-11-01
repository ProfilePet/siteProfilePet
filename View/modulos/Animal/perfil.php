<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Scripts/style5.css">
    <title>Document</title>
</head>
<body>
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
        }
    ?>
    <div class="perfil">Nome:<?php echo $nomeAnimal;?><br>
                        Raça:<br>
                        Especie:<br>
                        Temperamento:<br><img src="../<?php echo $imagemAnimal;?>"></div>
    </label>
    <select id= "Escolhas" onchange="preencherEscolha()">
        <option value="1">Consultas</option>
        <option value="2">Medicações</option>
        <option value="3">Diagnóstico</option>

    </select>
    <div id=resultado></div>
</body>
</html>