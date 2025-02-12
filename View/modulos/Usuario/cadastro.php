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
			var url_atual = window.location.href;
			$.ajax({
				url:'Controller/CidadeController.php?estado='+estado,
				success:function(data) {
					$("#cidades").html(data);
					$("#cidades").removeAttr('disabled');
				}
			});
		}
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<img src="Imagens/TelaCadastro/logo2.png" class="imagem">
	<form action ="cadastrar-usuario" method ="post" class="formulario" >      
		<!---Titulo-->
		<h2>Crie sua Conta!</h2><br/>
		<!--Nome-->
		<input type="text" name="txtNome" placeholder="Nome" required class="Nome">
		<!--Telefone-->
		<input type="Text" name="txtCel" placeholder="Telefone" required class="Nome" onkeypress="$(this).mask('(00) 00000-0000')">
		<br/>
		<!--Email-->
		<input type="Email" name="txtEmail" placeholder="Email" required class="Text">
		<br/>
		<!--Select Estado-->
		<select id="estados" name="estados" required onchange="preencherCidades()" required class="Selects">
		<option value="0" selected>Estado</option>
		<?php
			session_start();
			$_SESSION['codUsuario']=$codUsu;
			foreach($consultaES as $key => $consES){
				$uf=($consES['uf']);
				$codEstado=($consES['codEstado']);
				echo "<option value=$codEstado>$uf</option>";
			}
		?>
		</select>
		<!--Cidade-->
		<select  id="cidades" name="cidades" required class="Selects" disabled>
			<option value="0" selected>Cidade</option>
		</select>
		<br/>
		<input type="password" name="txtSenha" placeholder="Digite sua Senha" required class="Text" id=senha1>
		<br/>
		<input type="password" oninput="validarSenha(), validarCidade()" name="txtSenha2" placeholder="Confirme sua Senha" required class="Text" id=senha2>
		<br/>
		<!--CheckBox-->
		<input type="Checkbox" required name="ckbTermis">Eu Concordo com os <a href=""><b>Termos de Uso</b></a> <br/><br/>	
		<!--Botão-->
		<input type="submit" name="btnConfirmar" placeholder="Cadastrar" class="botoes">
		<!--Botão Limpar-->
		<input type="reset" name="btnLimpar" placeholder="Limpar" class="botoes">	
	</form>
	<script>
		function validarSenha(){
			const inputSenha2 = document.getElementById('senha2')
			const inputSenha1 = document.getElementById('senha1').value
			const inputSenha2Value = document.getElementById('senha2').value
			if(inputSenha1 !== inputSenha2Value){
				inputSenha2.setCustomValidity('Senha não são iguais, favor repita!');
			}else{
				inputSenha2.setCustomValidity('');
			}
		}

		function validarCidade(){
			const inputEstado = document.getElementById('estados');
			const inputEstadoValue = document.getElementById('estados').value;

			if (inputEstadoValue === "0" || inputEstadoValue ==="") {
				console.log(inputEstadoValue)
				inputEstado.setCustomValidity('Preencha este Campo!');
			} else {
				inputEstado.setCustomValidity('');
			}
		}
	</script>
</body>
</html>