<?php
include 'Controller/UsuarioController.php';
include 'Controller/AnimalController.php';


if(isset($_GET['url']))
{
    $url = explode('/', $_GET['url']);
    switch($url[0])
    {
        //Usuario
        case 'tela-login-usuario':
            $usu = new UsuarioController();
            $usu->telaLogin();
        break;
        
        case 'logar-usuario':
            $usu = new UsuarioController();
            $usu->logar();
        break;
        case 'tela-cadastro-usuario':
            $usu = new UsuarioController();
            $usu->telaCadastrar();
        break;
        case 'cadastrar-usuario':
            $usu = new UsuarioController();
            $usu->Cadastrar();
        break;
        case 'tela-principal-usuario':
            $usu = new UsuarioController();
            $usu->telaPrincipal();
        break;
        case 'editar-usuario':
            $usu = new UsuarioController();
            $usu->editar();
        break;

        //Animal
        case 'tela-cadastro-animal':
            $anm = new AnimalController();
            $anm->telaCadastrar();
        break;
        case 'tela-consulta-animal':
            $anm = new AnimalController();
            $anm->telaConsultar();
        break;
        case 'tela-editar-animal':
            $anm = new AnimalController();
            $anm->telaEditar($url[1]);
        break;
        case 'tela-perfil-animal':
            $anm = new AnimalController();
            $anm->telaPerfil($url[1]);
        break;

        case 'cadastrar-animal':
            $anm = new AnimalController();
            $anm->cadastrar();
        break;
        case 'editar-animal':
            $anm = new AnimalController();
            $anm->editar();
        break;
        case 'animal-consultas':
            $anm = new AnimalController();
            $anm->consultas_animal();
        break;
        //tela-cadastro-consultas
        case 'tela-cadastro-consultas':
            $anm = new AnimalController();
            $anm->telaCadastroConsulta($url[1]);
        break;
        //tela-consultar-consulta
        case 'tela-consultar-consulta':
            $anm = new AnimalController();
            $anm->consultarConsulta($url[1]);
        break;
        case 'tela-editar-consulta':
            $anm = new AnimalController();
            $anm->editarConsulta($url[1]);
        break;


        //Geral

        default:
            $usu = new UsuarioController();
            $usu->erro();
            echo "página não encontrada<br>
            Verificar se existe a rota criada<br>
            Tentando acessar a rota: $url[0]";

            //poderá depois abrir uma página de aviso
        break;

    }

}
else{
    $usu = new UsuarioController();
    $usu->telaSobre();
}
?>