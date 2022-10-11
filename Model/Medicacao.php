<?php
class Medicacao{
    private $codMedDiag;
    private $codMedicacao;
    private $nomeMedicacao;

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
 
    public function getNomeMedicacao(){
        return $this->nomeMedicacao;
    }

    public function setNomeMedicacao($nomeMedicacao){
        $this->nomeMedicacao = $nomeMedicacao;
        return $this;
    }
}