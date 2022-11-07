<?php
class Diagnostico
{
    private $codDiagnostico;
    private $codAnimal;
    private $codEnfermidade;
    private $tratamento;
    private $ativoDiagnostico;

    public function getCodDiagnostico()
    {
        return $this->codDiagnostico;
    }

    public function setCodDiagnostico($codDiagnostico)
    {
        $this->codDiagnostico = $codDiagnostico;
        return $this;
    }

    public function getCodAnimal()
    {
        return $this->codAnimal;
    }

    public function setCodAnimal($codAnimal)
    {
        $this->codAnimal = $codAnimal;
        return $this;
    }

    public function getCodEnfermidade()
    {
        return $this->codEnfermidade;
    }

    public function setCodEnfermidade($codEnfermidade)
    {
        $this->codEnfermidade = $codEnfermidade;
        return $this;
    }

    public function getTratamento()
    {
        return $this->tratamento;
    }

    public function setTratamento($tratamento)
    {
        $this->tratamento = $tratamento;
        return $this;
    }

    public function getAtivoDiagnostico()
    {
        return $this->ativoDiagnostico;
    }

    public function setAtivoDiagnostico($ativoDiagnostico)
    {
        $this->ativoDiagnostico = $ativoDiagnostico;
        return $this;
    }
}
