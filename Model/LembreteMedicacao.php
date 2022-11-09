<?php
class LembreteMedicacao{
    private $codLembreteMedicacao;
    private $dataInicial;
    private $dataFinal;
    private $hora;
    private $repeticaoLembrete;
    private $ativoMedicacao;
    private $codMedicacao;
    private $codAnimal;

    public function getCodLembreteMedicacao(){
        return $this->codLembreteMedicacao;
    }

    public function setCodLembreteMedicacao($codLembreteMedicacao){
        $this->codLembreteMedicacao = $codLembreteMedicacao;
        return $this;
    }

    public function getDataInicial(){
        return $this->dataInicial;
    }

    public function setDataInicial($dataInicial){
        $this->dataInicial = $dataInicial;
        return $this;
    }

    public function getDataFinal(){
        return $this->dataFinal;
    }

    public function setDataFinal($dataFinal){
        $this->dataFinal = $dataFinal;
        return $this;
    }
 
    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        $this->hora = $hora;
        return $this;
    }

    public function getRepeticaoLembrete(){
        return $this->repeticaoLembrete;
    }

    public function setRepeticaoLembrete($repeticaoLembrete){
        $this->repeticaoLembrete = $repeticaoLembrete;
        return $this;
    }

    public function getAtivoMedicacao(){
        return $this->ativoMedicacao;
    }

    public function setAtivoMedicacao($ativoMedicacao){
        $this->ativoMedicacao = $ativoMedicacao;
        return $this;
    }

    public function getCodMedicacao(){
        return $this->codMedicacao;
    }

    public function setCodMedicacao($codMedicacao){
        $this->codMedicacao = $codMedicacao;
        return $this;
    }

    public function getCodAnimal(){
        return $this->codAnimal;
    }

    public function setCodAnimal($codAnimal){
        $this->codAnimal = $codAnimal;
        return $this;
    }
}