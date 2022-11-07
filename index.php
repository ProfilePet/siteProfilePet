<?php
include 'Controller/UsuarioController.php';
include 'Controller/AnimalController.php';
include 'Controller/ConsultaController.php';
include 'Controller/DiagnosticoController.php';

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

        //Consultas
        case 'tela-cadastro-consultas':
            $cons = new ConsultaController();
            $cons->telaCadastroConsulta($url[1]);
        break;

        case 'cadastrar-consulta':
            $cons = new ConsultaController();
            $cons->cadastrarConsulta($url[1]);
        break;
        //tela-consultar-consulta
        case 'tela-consultar-consulta':
            $cons = new ConsultaController();
            $cons->consultarConsulta($url[1]);
        break;
        case 'tela-editar-consulta':
            $cons = new ConsultaController();
            $cons->telaEditarConsulta($url[1]);
        break;
        case 'editar-consulta':
            $cons = new ConsultaController();
            $cons->editarConsulta($url[1],$url[2]);
        break;
        case 'excluir-consulta':
            $cons = new ConsultaController();
            $cons->excluirConsulta($url[1],$url[2]);
        break;
        
        //Diagnosticos
        case 'tela-cadastro-diagnosticos':
            $diag = new DiagnosticoController();
            $diag->telaCadastroDiagnostico($url[1]);
        break;
        case 'cadastrar-diagnostico':
            $diag = new DiagnosticoController();
            $diag->cadastrarDiagnostico($url[1]);
        break;
        case 'tela-editar-diagnostico':
            $diag = new DiagnosticoController();
            $diag->telaEditarDiagnostico($url[1]);
        break;
        case 'editar-diagnostico':
            $diag = new DiagnosticoController();
            $diag->editarDiagnostico($url[1],$url[2]);
        break;
        case 'tela-consultar-diagnostico':
            $diag = new DiagnosticoController();
            $diag->telaConsultarDiagnostico($url[1]);
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