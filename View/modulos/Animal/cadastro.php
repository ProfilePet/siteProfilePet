<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Scripts/css-cadastro.css">
	<title>Cadastro de Animais</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  <a class="active" href="tela-principal">Home</a>
</div>
<br><br><br>

<div id="cadastro">
	<div id="fotoAnimal">Foto do animal</div>
	<h1>Cadastro de Animais</h1>
	<br>
	<form action="cadastrar-animal" method="post" enctype="multipart/form-data">
		  <label>Nome</label>
	   	<br>
			<input type="text" id="nome" name="txtNomeAnimal">
			<br><br>
			<label id="especie">Espécie</label>
			<select name="txtEspecie" id="txtEspecie" onchange="preencherRaca()">
				<option selected>Especie</option>
			<?php
				foreach($consultaEspecie as $key => $consEsp){
					$esp=($consEsp['especieAnimal']);
					$codEspecie=($consEsp['codEspecieAnimal']);
					echo "<option value=$codEspecie>$esp</option>";
				}
				
				?>
			</select>
			<!--Select Aqui-->
	   	<br>
		<select id="txtRaca" name="txtRaca" disabled>
				<option selected>Raça</option>
		</select>
			<label>Temperamento</label>
			<label id="data">Data Nascimento</label> 
			<br>
			<select name="txtTemperamento">
			<?php
				foreach($consultaTemperamento as $key => $consTemp){
					$codTemp=($consTemp['codTemperamentoAnimal']);
					$temp=($consTemp['temperamento']);
					echo "<option value=$codTemp>$temp</option>";
				}
				
				?>
			</select>
		  <input type="date"  id="calendario" name="txtCalendario">
		  <input type="file" name="txtImagem">
		  <br><br>
		  <label>Alimento Preferido</label>
			<br>
		  <input type="text"  class="login">
		  <br><br>
		  <br><br>
		  <button id="botao-cadastra">Cadastrar</button>
</form>
	
</div>
  <div id="rodape">
  	  <p id="letras-rodape">2022 Profile Pet<p>
    <img src="Imagens/insta2.png" id="foto-rodape">
   <p id="letras-rodape2">@profile_pet</p>
  </div>

</body>
</html>