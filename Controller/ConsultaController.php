<?php
    class ConsultaController{
        public function consultarConsulta($codCons){
            include('DAO/LembreteConsultaDAO.php');
            $consultaConsulta= LembreteConsultaDAO::consultaDetalhada($codCons);
            $consultaConsulta = $consultaConsulta->fetchAll();

            foreach($consultaConsulta as $key => $consConsu){
                $cod=($consConsu['codConsulta']);
                $data=($consConsu['dataConsulta']);
                $hora=($consConsu['horaConsulta']);
                $local=($consConsu['localConsulta']);
                $nomeClinica=($consConsu['nomeClinica']);
                $veterinario=($consConsu['nomeVeterinario']);
                $tratamento = ($consConsu['tratamento']);
                $tipoConsulta=($consConsu['tipoConsulta']);
                //echo("<option value=$codCidade>$cid</option>".PHP_EOL);
                echo"<hr>Data: $data<hr>Hora: $hora<hr>Local: $local<hr>Nome Clinica: $nomeClinica<hr>Veterinario: $veterinario<hr>Tratamento: $tratamento<hr>Tipo Consulta: $tipoConsulta<hr>".PHP_EOL;
            }
        }
        public function telaEditarConsulta($codCons){
            include('DAO/LembreteConsultaDAO.php');
            $consultaConsulta= LembreteConsultaDAO::consultaDetalhada($codCons);
            $consultaConsulta = $consultaConsulta->fetchAll();
            foreach($consultaConsulta as $key => $consConsu){
                $codAnimal=($consConsu['codAnimal']);
            }
            include('DAO/DiagnosticoDAO.php');
            $consultaDiagnostico = DiagnosticoDAO::consultarDiagnosticoConsulta($codAnimal);
            $consultaDiagnostico = $consultaDiagnostico->fetchAll();
            include('View/modulos/Consulta/editar.php');
        }
        public function editarConsulta($codCons,$codAnimal){
            include('Model/LembreteConsulta.php');
            include('DAO/LembreteConsultaDAO.php');
            $objConsulta = new LembreteConsulta();
            $objConsulta->setcodLembreteConsulta($codCons);
            $objConsulta->setDataConsulta($_POST['txtData']);
            $objConsulta->setHoraConsulta($_POST['txtHora']);
            $objConsulta->setlocalConsulta($_POST['txtLocal']);
            $objConsulta->setNomeClinica($_POST['txtNomeClinica']);
            $objConsulta->setNomeVeterinario($_POST['txtNomeVeterinario']);
            $objConsulta->setTipoConsulta($_POST['txtTipoConsulta']);
            $objConsulta->setCodDiagnostico($_POST['txtDiagnostico']);
            $objConsulta->setAtivoConsulta(1);
            $retorno = LembreteConsultaDAO::editar($objConsulta);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Consulta Alterada Com Sucesso.',
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
        public function telaCadastroConsulta($codAnimal){
            include('DAO/DiagnosticoDAO.php');
            $consultaDiagnostico = DiagnosticoDAO::consultarDiagnosticoConsulta($codAnimal);
            $consultaDiagnostico = $consultaDiagnostico->fetchAll();
            include('View/modulos/Consulta/cadastro.php');

        }
        public function cadastrarConsulta($codAnimal){
            include('DAO/LembreteConsultaDAO.php');
            include('../Model/LembreteConsulta.php');
            $objConsulta = new LembreteConsulta();
            $objConsulta->setDataConsulta($_POST['txtData']);
            $objConsulta->setHoraConsulta($_POST['txtHora']);
            $objConsulta->setlocalConsulta($_POST['txtLocal']);
            $objConsulta->setNomeClinica($_POST['txtNomeClinica']);
            $objConsulta->setNomeVeterinario($_POST['txtNomeVeterinario']);
            $objConsulta->setTipoConsulta($_POST['txtTipoConsulta']);
            $objConsulta->setCodDiagnostico($_POST['txtDiagnostico']);
            $objConsulta->setAtivoConsulta(1);
            $objConsulta->setCodAnimal($codAnimal);
            $retorno = LembreteConsultaDAO::cadastrar($objConsulta);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Consulta Adicionada Com Sucesso.',
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
        public function excluirConsulta($codCons,$codAnimal){
            include('DAO/LembreteConsultaDAO.php');
            $retorno = LembreteConsultaDAO::deletarLembrete($codCons);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Consulta Excluida Com Sucesso.',
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
    }
?>