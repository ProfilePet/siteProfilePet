<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    <br>
     <input type=text id=nome name=txtNomeAnimal value="<?php echo$nomeAnimal?>">
     <br><br>
     <label>Raça</label>
     <label id=especie>Espécie</label>
     <br><select name=txtEspecie id=txtEspecie onchange=preencherRaca()>
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
            <br>
            <select id=txtRaca name=txtRaca>
				<option selected value="<?php echo $codRacaAnimal?>"><?php echo $nomeRaca?></option>
		    </select>
              <label>Temperamento</label>
              <select name=txtTemperamento>
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
              <br>
            <input type=text  class=login value=>
            <input type=date  id=calendario name=txtCalendario value=$nascimentoAnimal>
            <input type=file name=txtImagem value="<?php echo$imagemAnimal?>">
            <br><br>
            <br><br>
            <br><br>
            <button name=btnEditar value="<?php echo"$cod"?>">Editar</button>
            <button name=btnExcluir value="<?php echo"$cod"?>">Excluir</button>

 </form>
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
</body>
</html>