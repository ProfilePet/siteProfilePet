<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro</title>
	<link rel="stylesheet" href="Scripts/style3.css">
</head>
<body></body>
		<img src="Imagens/logo2.png" class="imagem">
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
			<select name ="cidades" id="cidades" required class="Selects">
				<option value="0" selected>Cidade</option>
				<?php
				foreach($consultaCID->fetchAll as $key => $consCid){
					$cid=($consCid['nomeCidade']);
					$codCidade=($consCid['codCidade']);
					echo "<option value=$codCidade>$cid</option>";
				}
				
				?>
			</select>
			
			<!--Select Estado-->
			<select name="estados" id="estados" onchange="atualizar()" required class="Selects">
				<option value="0" selected>UF</option>
				<?php
					//codigo da Select
					//Deixar Value com codEstad
				foreach($consultaES as $key => $consES){
					$uf=($consES['uf']);
					$codCidade=($consES['codEstado']);
					echo "<option value=$codCidade>$uf</option>";
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
	<script src="Scripts/select.js"></script>
</body>
</html>