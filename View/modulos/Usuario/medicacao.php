<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicação</title>
    <link rel="stylesheet" href="Scripts/style2.css">
</head>
<body>
    <nav id="menu-h">
        <ul>
            <li><a href="#Home">Home</a></li>
            <li><a href="#Home">Pets</a></li>
            <li><a href="#Home">Outro</a></li>
        </ul>
    </nav>
    <div class="medicacao">
        <h3>Medicações</h3><br>
        <p>Adicione aqui novas Medicações</p>
        <button id="btn1">Nova Medicação</button>
    </div>
    <div class="infoMedicacoes">
        <h3>Nome da Medicação</h3><br>
        <p>Informações</p>
    </div>
    <div class="infoMedicacoes">
        <h3>Nome da Medicação</h3><br>
        <p>Informações</p>
    </div>

    <?php
    require_once('conn.php');
   
        $sql=mysqli_query($conn,"SELECT * FROM tbenfermidade");

        while ($linha=mysqli_fetch_array($sql)){
            $cod=$linha['codEnfermidade'];
            $diag=$linha['nomeDiagnostico'];
            $codEspecie = $linha['codEspecie'];

            echo"<div class=infoMedicacoes>
            <h3>$diag</h3><br>
            <p>Informações</p>
        </div>";
        }
    ?>
    
</body>
</html>