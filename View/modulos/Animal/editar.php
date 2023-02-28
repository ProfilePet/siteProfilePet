<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Scripts/css-cadastro.css">
    <title>Editar Animal</title>
    <link rel="icon" type="imagem/png" href="../Imagens/TelaSobre/logoAba.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="fundo">
<div class="topo"> <!--topnav-->
  <a class="active" href="../tela-principal-usuario">Home</a>
</div>
<div id="cadastro">
<center><h1>Editar Animal</h1></center>
<form action="../editar-animal" method=post enctype=multipart/form-data>
<?php
    session_start();
        foreach($consultaAnimal as $key => $consAnimal){
            $cod=($consAnimal['codAnimal']);
            $imagemAnimal=($consAnimal['imagemAnimal']);
            $nomeAnimal=($consAnimal['nomeAnimal']);
            $nascimentoAnimal = ($consAnimal['nascimentoAnimal']);
            $nomeEspecie = ($consAnimal['especieAnimal']);
            $codEspecieAnimal = ($consAnimal['codEspecieAnimal']);
            $nomeRaca = ($consAnimal['nomeRacaAnimal']);
            $codRacaAnimal = ($consAnimal['codRacaAnimal']);
            $codTemperamentoAnimal = ($consAnimal['codTemperamento']);
            $temperamentoAnimal=($consAnimal['temperamento']);
    }
    $_SESSION['imagemAnimal'] = $imagemAnimal;
        ?>
    <label>Nome</label>
     <input type=text id=nome name=txtNomeAnimal value="<?php echo$nomeAnimal?>">
     <label id=especie>Espécie</label>
    <select name=txtEspecie id=txtEspecie onchange=preencherRaca() class="form-select">
     <option selected value="<?php echo$codEspecieAnimal?>"><?php echo $nomeEspecie?></option>
                <?php
                    foreach($consultaEspecie as $key => $consEsp){
                        $codAnimal= ($consEsp['codAnimal']);
                        $esp=($consEsp['especieAnimal']);
                        $codEspecie=($consEsp['codEspecieAnimal']);
                        if($codEspecie!=$codEspecieAnimal){
                        echo "
                        <option value=$codEspecie>$esp</option>";
                       }
                    }
                    ?>
                    </select>
            <label>Raça</label>
            <select id=txtRaca name=txtRaca class="form-select">
				<option selected value="<?php echo $codRacaAnimal?>"><?php echo $nomeRaca?></option>
		    </select>
              <label>Temperamento</label>
              <select name=txtTemperamento class="form-select temperamento">
                  <option selected value="<?php echo $codTemperamentoAnimal?>"><?php echo $temperamentoAnimal?></option>
                  <?php
                        foreach($consultaTemperamento as $key => $consTemp){
                            $codTemp= ($consTemp['codTemperamento']);
                            $temp=($consTemp['temperamento']);
                            if($codTemperamentoAnimal!=$codTemp){
                            echo "
                            <option value=$codTemp>$temp</option>";
                           }
                        }
                  ?>
              </select>
              <label id=data>Data Nascimento</label> 
            <input type=date  id=calendario name=txtCalendario value=<?php echo$nascimentoAnimal ?>>
            <label>Foto do Pet</label>
            <input class="form-control"  id="formFile" type=file name=txtImagem>
            <br>
            <div class="d-grid gap-2 col-6 mx-auto botoesDiv">
            <button class="btn btn-primary botoes"  name=btnEditar  value="<?php echo"$cod"?>">Editar</button>
            <button class="btn btn-primary botoes"  name=btnExcluir value="<?php echo"$cod"?>">Excluir</button>
            </div>

 </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function preencherRaca(){
    var especie = $("#txtEspecie").val();
	var url_atual = window.location.href;
	//alert(url_atual);
	$.ajax({
		url:'../Controller/RacaController.php?especie='+especie+'&raca='+<?php echo $codEspecieAnimal?>,
		success:function(data) {
            $("#txtRaca").html(data);
			}
		});
		}
</script>
<div id="rodape">
  	  <p id="letras-rodape">2022 Profile Pet<p>
        <i class="fa-brands fa-instagram"></i>
   <p id="letras-rodape2">@profile_pet</p>
  </div>
</body>
</html>