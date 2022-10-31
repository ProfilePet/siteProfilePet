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
        case 'editar-usuario':
            $usu = new UsuarioController();
            $usu->editar();
        break;

        //Animal
        case 'tela-cadastro-animal':
            $anm = new AnimalController();
            $anm->telaCadastrar();
        break;
        case 'cadastrar-animal':
            $anm = new AnimalController();
            $anm->cadastrar();
        break;
        case 'editar-animal':
            $anm = new AnimalController();
            $anm->editar();
        break;
        case 'tela-consulta-animal':
            $anm = new AnimalController();
            $anm->telaConsultar();
        break;
        case 'tela-animal-perfil':
            $anm = new AnimalController();
            $anm->edita_Consulta();
        break;
        //Geral
        case 'tela-principal':
            $grl = new UsuarioController();
            $grl->telaSobre();
        break;

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
