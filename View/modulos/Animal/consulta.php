<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Meus Pets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Scripts/style4.css" rel="stylesheet">
        <link rel="icon" type="imagem/png" href="Imagens/TelaSobre/logoAba.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <div id="Menu">
        <a href="tela-principal-usuario">Voltar</a>
    </div>
    <div class="Titulo">
        Meus Pets
    </div>
    <div class="main">
    <?php
		foreach($consultaAnimais as $key => $consAni){
            $cod=($consAni['codAnimal']);   
            $imagemAnimal=($consAni['imagemAnimal']);
            $nomeAnimal=($consAni['nomeAnimal']);
            echo "
            <div class=animal>
            <a href=tela-editar-animal/$cod><button class=btnEditar name=btEditar value=$cod><i class='fa-solid fa-pen-to-square'></i>
                </button></a>
                    <img src='$imagemAnimal'>
                    <label>$nomeAnimal</label>
                    <a href=tela-perfil-animal/$cod><button value=$cod type=submit class=btnAnimal name=btAnimal>Acessar
                </button></a>
            </div>";
        }			
	?>
    </div>
    <div class="PataImg">
        <img src="Imagens/MeusPets/Pata.png">
    </div>
    <div class="rodape">
  	    <p id="letras-rodape">2022 Profile Pet<p>
          <i class="fa-brands fa-instagram"></i>
        <p id="letras-rodape2">@profile_pet</p>
    </div>
    </body>
</html>