<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../Imagens/TelaSobre/logoAba.png" />
    <link rel="stylesheet" type="text/css" href="../Scripts/CSS/Perfil.css">
    <link rel="stylesheet" type="text/css" href="../Scripts/style5.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
    crossorigin="anonymous"></script>
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
    
    <title>Perfil</title>
</head>
<body class="fundo">
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
    <div id="Menu">
        <a href="../tela-principal-usuario">Voltar</a>
        <a href="#IN">Informações</a>
        <a href="../tela-consulta-animal">Meus Pet</a>
    </div>
    <center><img src="../Imagens/TelaPerfil/PERFIlPET.gif" width="100%" height="450"></center>
    <div id="Perfil-dados">
        <div id="Imagem">
        <img src="../<?php echo $imagemAnimal;?>" class="img-thumbnail" alt="...">
        </div>
        <p>
        <b>
                        Nome:<?php echo $nomeAnimal;?><br>
                        Raça:<?php echo $raca;?><br>
                        Especie:<?php echo $especie;?><br>
                        Temperamento:<?php echo $temperamento;?><br>
        </b>
        </p>
        <img src="../Imagens/TelaPerfil/patinhas.png" id="img-patinhas">
    </div>
    <div id="informacao">
        <h1>Informações</h1>
        <a name="IN"></a>
            <div id="selectDiv">
                <select id= "Escolhas" onchange="preencherEscolha()" class="form-select" aria-label="Default select example">
                    <option selected>Selecione</option>
                    <option value="1">Consultas</option>
                    <option value="2">Medicações</option>
                    <option value="3">Diagnóstico</option>
                </select>
            </div>
            <button onclick="Imprimir()" class="btnImprimir"><i class="fa-solid fa-print"></i> Imprimir</button>
            <div id=resultado></div>
    </div>
    <div id="rodape"> 2022 - Profile Pet</div>

    <script>
        var dados = document.getElementById('fundo')
        function Imprimir(){
            var resultado = document.getElementById('resultado').innerHTML
            var janela = window.open('','','width=800','height=600')
            janela.document.write('<link href="Scripts/Bootstrap/bootstrap.min.css" rel="stylesheet" media="print">')
            janela.document.write('<link rel="stylesheet" type="text/css" href="../Scripts/CSS/Perfil.css">')
            janela.document.write('<html><head>')
            janela.document.write(' <link rel="stylesheet" type="text/css" href="../Scripts/style5.css">')
            janela.document.write('<title>PDF <?php echo $nomeAnimal?></title>')
            janela.document.write('<body>')
            janela.document.write('<center><img src="../Imagens/TelaLogin/logo.png">')
            janela.document.write('<div class=Perfil-dados>')
            janela.document.write('<h2><b>Nome:<?php echo $nomeAnimal;?><br>')
            janela.document.write('Raça:<?php echo $raca;?><br>')
            janela.document.write('Especie:<?php echo $especie;?><br>')
            janela.document.write('Temperamento:<?php echo $temperamento;?><br></b></h2>')
            janela.document.write('</div>')
            janela.document.write('<div class="resultado">'+resultado+'</div>')
            janela.document.write('</center></body></html>')
            janela.document.close()
            //janela.print()
        }
    </script>

</body>
</html>
