<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<form action="editar-animal" method=post enctype=multipart/form-data>
    <?php
        foreach($consultaAnimal as $key => $consAnimal){
            $cod=($consAnimal['codAnimal']);
            $imagemAnimal=($consAnimal['imagemAnimal']);
            $nomeAnimal=($consAnimal['nomeAnimal']);
            $nascimentoAnimal = ($consAnimal['nascimentoAnimal']);
            echo"
            <label>Nome</label>
             <br>
              <input type=text id=nome name=txtNomeAnimal value=$nomeAnimal>
              <br><br>
              <label>Raça</label>
              <label id=especie>Espécie</label>
              <br><select name=txtEspecie id=txtEspecie onchange=preencherRaca()>
              <option selected>Especie</option>";
                             foreach($consultaEspecie as $key => $consEsp){
                                 $codAnimal= ($consEsp['codAnimal']);
                                 $esp=($consEsp['especieAnimal']);
                                 $codEspecie=($consEsp['codEspecieAnimal']);
                                 echo "
                                 <option value=$codEspecie>$esp</option>";
                             }
            echo"
            </select>
            <br>
            <select id=txtRaca name=txtRaca disabled>
				<option selected>Raça</option>
		    </select>
              <label>Temperamento</label>
              <label id=data>Data Nascimento</label> 
              <br>
            <input type=text  class=login value=>
            <input type=date  id=calendario name=txtCalendario value=$nascimentoAnimal>
            <input type=file name=txtImagem>
            <br><br>
            <br><br>
            <br><br>
            <button id=botao-editar onClick=Mensagem()>Editar</button>
            <button name=btnExcluir>Excluir</button>
 ";
}
    session_start();
    $_SESSION['codAnimal'] = $cod;
    $_SESSION['imagemAnimal'] = $imagemAnimal;
    ?>

 </form>
</body>
</html>