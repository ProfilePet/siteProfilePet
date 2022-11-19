<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Scripts/css-cadastro.css">
	<link rel="icon" type="imagem/png" href="Imagens/TelaSobre/logoAba.png" />
	<title>Cadastro de Animais</title>
</head>
<body class="fundo">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- CSS only -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script>
function preencherRaca(){
    var especie = $("#txtEspecie").val();
	var url_atual = window.location.href;
	//alert(url_atual);
	$.ajax({
		url:'Controller/RacaController.php?especie='+especie,
		success:function(data) {
            $("#txtRaca").html(data);
			$("#txtRaca").removeAttr('disabled');
			}
		});
		}
</script>
<div class="topo"> <!--topnav-->
	<a class="active" href="tela-principal-usuario">Home</a>
</div>
<br><br><br>

<div id="cadastro">
	<center><h1>Cadastro de Animais</h1></center>
	<form action="cadastrar-animal" method="post" enctype="multipart/form-data">
		  <label>Nome</label>
			<input type="text" id="nome" name="txtNomeAnimal">
			<label id="especie">Espécie</label>
			<select name="txtEspecie" id="txtEspecie" onchange="preencherRaca()" class="form-select">
				<option selected>Selecione</option>
			<?php
				foreach($consultaEspecie as $key => $consEsp){
					$esp=($consEsp['especieAnimal']);
					$codEspecie=($consEsp['codEspecieAnimal']);
					echo "<option value=$codEspecie>$esp</option>";
				}
				
				?>
			</select>
			<label>Raça</label>
		<select id="txtRaca" name="txtRaca" disabled class="form-select">
				<option selected>Selecione</option>
		</select>
			<label>Temperamento</label>
			<select name="txtTemperamento" class="form-select temperamento" id="inputGroupSelect01">
			<?php
				foreach($consultaTemperamento as $key => $consTemp){
					$codTemp=($consTemp['codTemperamento']);
					$temp=($consTemp['temperamento']);
					echo "<option value=$codTemp>$temp</option>";
				}
				
				?>
			</select>
			<label id="data">Data Nascimento</label> 
		  <input type="date"  id="calendario" name="txtCalendario">
		  <div class="mb-3">
			<label for="formFile" class="form-label">Foto do Pet</label>
			<input class="form-control" type="file" id="formFile" name="txtImagem">
		</div>
		  <br>
		  <button id="botao-cadastra">Cadastrar</button>
</form>
	
</div>
  <div id="rodape">
  	  <p id="letras-rodape">2022 Profile Pet<p>
		<i class="fa-brands fa-instagram"></i>
   <p id="letras-rodape2">@profile_pet</p>
  </div>

</body>
</html>