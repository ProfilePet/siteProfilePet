<?php
class MedicacaoDiag{
    private $codMedDiag;
    private $codMedicacao;
    private $codDiagnostico;

    public function getCodMedDiag(){
        return $this->codMedDiag;
    }

    public function setCodMedDiag($codMedDiag){
        $this->codMedDiag = $codMedDiag;
        return $this;
    }

    public function getCodMedicacao(){
        return $this->codMedicacao;
    }

    public function setCodMedicacao($codMedicacao){
        $this->codMedicacao = $codMedicacao;
        return $this;
    }
 
    public function getcodDiagnostico(){
        return $this->codDiagnostico;
    }

    public function setcodDiagnostico($codDiagnostico){
        $this->codDiagnostico = $codDiagnostico;
        return $this;
    }
}