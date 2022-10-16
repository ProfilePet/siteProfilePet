<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
              <br><select name=txtRaca>";
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
              <label>Temperamento</label>
              <label id=data>Data Nascimento</label> 
              <br>
            <input type=text  class=login value=>
            <input type=date  id=calendario name=txtCalendario value=$nascimentoAnimal>
            <input type=file name=txtImagem>
            <br><br>
            <br><br>
            <br><br>
            <button id=botao-editar>Editar</button>
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