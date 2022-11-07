<?php

class Animal
{
    private $codAnimal;
    private $nomeAnimal;
    private $imagemAnimal;
    private $nascimentoAnimal;
    private $codUsuarioA;
    private $codRacaAnimal;
    private $temperamentoAnimal;
    private $ativoAnimal;

    public function getCodAnimal()
    {
        return $this->codAnimal;
    }

    public function setCodAnimal($codAnimal)
    {
        $this->codAnimal = $codAnimal;
        return $this;
    }

    public function getNomeAnimal()
    {
        return $this->nomeAnimal;
    }

    public function setNomeAnimal($nomeAnimal)
    {
        $this->nomeAnimal = $nomeAnimal;
        return $this;
    }

    public function getImagemAnimal()
    {
        return $this->imagemAnimal;
    }

    public function setImagemAnimal($imagemAnimal)
    {
        $this->imagemAnimal = $imagemAnimal;
        return $this;
    }

    public function getNascimentoAnimal()
    {
        return $this->nascimentoAnimal;
    }

    public function setNascimentoAnimal($nascimentoAnimal)
    {
        $this->nascimentoAnimal = $nascimentoAnimal;
        return $this;
    }

    public function getCodUsuarioA()
    {
        return $this->codUsuarioA;
    }

    public function setCodUsuarioA($codUsuarioA)
    {
        $this->codUsuarioA = $codUsuarioA;
        return $this;
    }

    public function getCodRacaAnimal()
    {
        return $this->codRacaAnimal;
    }

    public function setCodRacaAnimal($codRacaAnimal)
    {
        $this->codRacaAnimal = $codRacaAnimal;
        return $this;
    }

    public function getTemperamentoAnimal()
    {
        return $this->temperamentoAnimal;
    }

    public function setTemperamentoAnimal($temperamentoAnimal)
    {
        $this->temperamentoAnimal = $temperamentoAnimal;
        return $this;
    }

    public function getAtivoAnimal()
    {
        return $this->ativoAnimal;
    }

    public function setAtivoAnimal($ativoAnimal)
    {
        $this->ativoAnimal = $ativoAnimal;
        return $this;
    }
}
