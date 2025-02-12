<?php
    class MedicacaoController{
        public function telaCadastrarMedicacao($codAnimal){
            include('DAO/LembreteMedicacaoDAO.php');
            $consultaMedicacoes = LembreteMedicacaoDAO::consultarMedicacoes();
            $consultaMedicacoes = $consultaMedicacoes->fetchAll();
            include('View/modulos/Medicacao/cadastro.php');
        }
        public function cadastrarMedicacao($codAnimal){
            include('DAO/LembreteMedicacaoDAO.php');
            include('../Model/LembreteMedicacao.php');
            $objMedicacao = new LembreteMedicacao();
            $objMedicacao->setDataInicial($_POST['txtDataInicial']);
            $objMedicacao->setDataFinal($_POST['txtDataFinal']);
            $objMedicacao->setHora($_POST['txtHorario']);
            $objMedicacao->setCodMedicacao($_POST['txtMedicacoes']);
            $objMedicacao->setCodAnimal($codAnimal);
            $objMedicacao->setAtivoMedicacao(1);
            $retorno = LembreteMedicacaoDAO::cadastrar($objMedicacao);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Medicação Cadastrada Com Sucesso.',
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
        public function telaEditarMedicacao($codLembreteMedicacao){
            include('DAO/LembreteMedicacaoDAO.php');
            $consultaLembreteMed = LembreteMedicacaoDAO::consultarTelaEditar($codLembreteMedicacao);
            $consultaLembreteMed = $consultaLembreteMed->fetchAll();
            $consultaMedicacoes = LembreteMedicacaoDAO::consultarMedicacoes();
            $consultaMedicacoes = $consultaMedicacoes->fetchAll();
            include('View/modulos/Medicacao/editar.php');

        }
        public function editarMedicacao($codLembreteMedicacao,$codAnimal){
            include('DAO/LembreteMedicacaoDAO.php');
            include('../Model/LembreteMedicacao.php');
            $objMedicacao = new LembreteMedicacao();
            $objMedicacao->setDataInicial($_POST['txtDataInicial']);
            $objMedicacao->setDataFinal($_POST['txtDataFinal']);
            $objMedicacao->setHora($_POST['txtHorario']);
            $objMedicacao->setCodMedicacao($_POST['txtMedicacoes']);
            $objMedicacao->setCodAnimal($codAnimal);
            $objMedicacao->setCodLembreteMedicacao($codLembreteMedicacao);
            $objMedicacao->setAtivoMedicacao(1);
            $retorno = LembreteMedicacaoDAO::editar($objMedicacao);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Medicação Alterada Com Sucesso.',
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
        public function excluirMedicacao($codLembreteMedicacao,$codAnimal){
            include('DAO/LembreteMedicacaoDAO.php');
            $retorno = LembreteMedicacaoDAO::deletar($codLembreteMedicacao);
            echo "
            <body></body><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
                    <script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Medicação Excluida Com Sucesso.',
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
        public function telaConsultarMedicacao($codLembreteMedicacao){
          include('DAO/LembreteMedicacaoDAO.php');
          $consultaLembreteMed = LembreteMedicacaoDAO::consultarTelaEditar($codLembreteMedicacao);
          $consultaLembreteMed = $consultaLembreteMed->fetchAll();
          include('View/modulos/Medicacao/consultar.php');

      }
    }
?>