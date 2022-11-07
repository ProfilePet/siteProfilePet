<?php
class Usuario
{
	private $codUsuario;
	private $nomeUsuario;
	private $email;
	private $senha;
	private $cidade;
	private $estado;
	private $celular;
	private $ativo;

	function getCodUsuario()
	{
		return $this->codUsuario;
	}
	function setCodUsuario($codUsuario)
	{
		$this->codUsuario = $codUsuario;
		return $this;
	}
	function getNomeUsuario()
	{
		return $this->nomeUsuario;
	}

	function setNomeUsuario($nomeUsuario)
	{
		$this->nomeUsuario = $nomeUsuario;
		return $this;
	}
	function getEmail()
	{
		return $this->email;
	}

	function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}
	function getCelular()
	{
		return $this->celular;
	}

	function setCelular($celular)
	{
		$this->celular = $celular;
		return $this;
	}
	function getAtivo()
	{
		return $this->ativo;
	}

	function setAtivo($ativo)
	{
		$this->ativo = $ativo;
		return $this;
	}
	function getSenha()
	{
		return $this->senha;
	}
	function setSenha($senha)
	{
		$this->senha = $senha;
		return $this;
	}
	function getCidade()
	{
		return $this->cidade;
	}
	function setCidade($cidade)
	{
		$this->cidade = $cidade;
		return $this;
	}
	function getEstado()
	{
		return $this->estado;
	}
	function setEstado($estado)
	{
		$this->estado = $estado;
		return $this;
	}
}
