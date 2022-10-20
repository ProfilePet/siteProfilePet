<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Scripts/style4.css" rel="stylesheet">
    </head>
    <body>
    <?php
		foreach($consultaAnimais as $key => $consAni){
            $cod=($consAni['codAnimal']);
            $imagemAnimal=($consAni['imagemAnimal']);
            $nomeAnimal=($consAni['nomeAnimal']);
            echo "<form action=tela-animal-perfil method=POST>
            <div class=animal>
                <button class=btnEditar name=btEditar value=$cod>Editar
                </button>
                <button class=btnAnimal value=$cod type=submit name=btAnimal>
                    <img src=$imagemAnimal>
                </button>$nomeAnimal
            </div>
            </form>";
        }			
	?>
    </body>
</html>