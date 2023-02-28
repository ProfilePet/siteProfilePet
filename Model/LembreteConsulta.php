<?php
class LembreteConsulta{
    private $codLembreteConsulta;
    private $dataConsulta;
    private $horaConsulta;
    private $nomeClinica;
    private $localConsulta;
    private $nomeVeterinario;
    private $tipoConsulta;
    private $ativoConsulta;
    private $codAnimal;
    private $codDiagnostico;

    public function getcodLembreteConsulta()
    {
        return $this->codLembreteConsulta;
    }

    public function setcodLembreteConsulta($codLembreteConsulta)
    {
        $this->codLembreteConsulta = $codLembreteConsulta;
        return $this;
    }

    public function getDataConsulta()
    {
        return $this->dataConsulta;
    }

    public function setDataConsulta($dataConsulta)
    {
        $this->dataConsulta = $dataConsulta;
        return $this;
    }

    public function getHoraConsulta()
    {
        return $this->horaConsulta;
    }

    public function setHoraConsulta($horaConsulta)
    {
        $this->horaConsulta = $horaConsulta;
        return $this;
    }

    public function getNomeClinica()
    {
        return $this->nomeClinica;
    }

    public function setNomeClinica($nomeClinica)
    {
        $this->nomeClinica = $nomeClinica;
        return $this;
    }

    public function getlocalConsulta()
    {
        return $this->localConsulta;
    }

    public function setlocalConsulta($localConsulta)
    {
        $this->localConsulta = $localConsulta;
        return $this;
    }

    public function getNomeVeterinario()
    {
        return $this->nomeVeterinario;
    }
 
    public function setNomeVeterinario($nomeVeterinario)
    {
        $this->nomeVeterinario = $nomeVeterinario;
        return $this;
    }

    public function getTipoConsulta()
    {
        return $this->tipoConsulta;
    }

    public function setTipoConsulta($tipoConsulta)
    {
        $this->tipoConsulta = $tipoConsulta;
        return $this;
    }

    public function getAtivoConsulta()
    {
        return $this->ativoConsulta;
    }

    public function setAtivoConsulta($ativoConsulta)
    {
        $this->ativoConsulta = $ativoConsulta;
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

    public function getCodDiagnostico()
    {
        return $this->codDiagnostico;
    }

    public function setCodDiagnostico($codDiagnostico)
    {
        $this->codDiagnostico = $codDiagnostico;
        return $this;
    }
}