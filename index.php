<?php
include 'Controller/UsuarioController.php';

if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
    switch ($url[0]) {
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
        default:
            $usu = new UsuarioController();
            $usu->erro();
            echo "página não encontrada<br>
            Verificar se existe a rota criada<br>
            Tentando acessar a rota: $url[0]";

            //poderá depois abrir uma página de aviso
            break;
    }
} else {
    $usu = new UsuarioController();
    $usu->telaLogin();
}
