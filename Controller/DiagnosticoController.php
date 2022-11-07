<?php
    class DiagnosticoController{
        public function telaCadastroDiagnostico($codAnimal){
            include('DAO/DiagnosticoDAO.php');
            $consultaEnfermidade = DiagnosticoDAO::consultarEnfermidade();
            $consultaEnfermidade = $consultaEnfermidade->fetchAll();
            include('View/modulos/Diagnostico/cadastro.php');

        }
        public function cadastrarDiagnostico($codAnimal){
            include('Model/Diagnostico.php');
            include('DAO/DiagnosticoDAO.php');
            $objDiagnostico = new Diagnostico();
            $objDiagnostico->setCodAnimal($codAnimal);
            $objDiagnostico->setTratamento($_POST['txtTratamento']);
            $objDiagnostico->setCodEnfermidade($_POST['txtEnfermidade']);
            $objDiagnostico->setAtivoDiagnostico(1);
            $retorno = DiagnosticoDAO::criarDiagnostico($objDiagnostico);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Diagnostico Adicionado Com Sucesso.',
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        background: '#fff url(/images/trees.png)',
                        backdrop: `
                          rgba(0,0,123,0.4)
                          url(/images/nyan-cat.gif)
                          left top
                          no-repeat
                        `
                      }).then((result) =>{
                        if (result.isConfirmed){
                            window.location='../tela-perfil-animal/$codAnimal'
                        }
                    })
                    </script>
                    ";

        }
        public function telaEditarDiagnostico($codDiagnostico){
            include('DAO/DiagnosticoDAO.php');
            $consultaDiagnostico = DiagnosticoDAO::consultarDiagnosticoTelaEditar($codDiagnostico);
            $consultaDiagnostico = $consultaDiagnostico->fetchAll();
            include('View/modulos/Diagnostico/editar.php');

        }
        public function editarDiagnostico($codDiagnostico,$codAnimal){
            include('Model/Diagnostico.php');
            include('DAO/DiagnosticoDAO.php');
            $objDiagnostico = new Diagnostico();
            $objDiagnostico->setCodDiagnostico($codDiagnostico);
            $objDiagnostico->setTratamento($_POST['txtTratamento']);
            $objDiagnostico->setCodEnfermidade($_POST['txtEnfermidade']);
            $retorno = DiagnosticoDAO::editarDiagnostico($objDiagnostico);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Diagnostico Alterado Com Sucesso.',
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        background: '#fff url(/images/trees.png)',
                        backdrop: `
                          rgba(0,0,123,0.4)
                          url(/images/nyan-cat.gif)
                          left top
                          no-repeat
                        `
                      }).then((result) =>{
                        if (result.isConfirmed){
                            window.location='../../tela-perfil-animal/$codAnimal'
                        }
                    })
                    </script>
                    ";
        }
        public function telaConsultarDiagnostico($codDiagnostico){
            include('DAO/DiagnosticoDAO.php');
            $consultaDiagnostico = DiagnosticoDAO::consultarDiagnosticoTelaConsultar($codDiagnostico);
            $consultaDiagnostico = $consultaDiagnostico->fetchAll();
            include('View/modulos/Diagnostico/consulta.php');

        }
    }
?>