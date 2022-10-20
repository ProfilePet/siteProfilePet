<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro</title>
	<link rel="stylesheet" href="Scripts/style3.css">
</head>
<body></body>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function preencherCidades(){
    var estado = $("#estados").val();
	var dados = "&dados="+estado;
	//console.log($('#estados'))
	var url_atual = window.location.href;
	//alert(url_atual);
	$.ajax({
		url:'Controller/CidadeController.php?estado='+estado,
		success:function(data) {
            $("#cidades").html(data);
			$("#cidades").removeAttr('disabled');
			}
		});
		}
</script>
		<img src="Imagens/TelaCadastro/logo2.png" class="imagem">
		<form action ="cadastrar-usuario" method ="post" class="formulario" >      
			<!---Titulo-->
			<h2>Crie sua Conta!</h2><br/>
			
			<!--Nome-->
			<input type="text" name="txtNome" placeholder="Nome" required class="Nome">
			
			<!--Telefone-->
			<input type="Number" name="txtCel" placeholder="Telefone" required class="Nome">
			<br/>
			
			<!--Email-->
			<input type="Email" name="txtEmail" placeholder="Email" required class="Text">
			<br/>
			
			<!--Cidade-->
			<select  id="cidades" required class="Selects" disabled>
				<option selected>Cidade</option>
			</select>
			
			<!--Select Estado-->
			<select id="estados" required onchange="preencherCidades()" required class="Selects">
			<option selected>Estado</option>
			<?php
				foreach($consultaES as $key => $consES){
					$uf=($consES['uf']);
					$codEstado=($consES['codEstado']);
					echo "<option value=$codEstado>$uf</option>";
				}
			?>
			</select>
			<br/>

			<input type="password" name="txtSenha" placeholder="Digite sua Senha" required class="Text">
			<br/>
			
			<input type="password" name="txtSenha2" placeholder="Confirme sua Senha" required class="Text">
			<br/>
				
			<!--CheckBox-->
			<input type="Checkbox" required name="ckbTermis">Eu Concordo com os <a href=""><b>Termos de Uso</b></a> <br/><br/>	
			
			<!--Botão-->
			<input type="submit" name="btnConfirmar" placeholder="Cadastrar" class="botoes">
			
			<!--Botão Limpar-->
			<input type="reset" name="btnLimpar" placeholder="Limpar" class="botoes">	
					
		</form>
</body>
</html>