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

     public function getCodUsuario()
     {
         return $this->codUsuario;
     }
     public function setCodUsuario($codUsuario)
     {
         $this->codUsuario = $codUsuario;
         return $this;
     }
     public function getNomeUsuario()
     {
         return $this->nomeUsuario;
     }

     public function setNomeUsuario($nomeUsuario)
     {
         $this->nomeUsuario = $nomeUsuario;
         return $this;
     }
     public function getEmail()
     {
         return $this->email;
     }

     public function setEmail($email)
     {
         $this->email = $email;
         return $this;
     }
     public function getCelular()
     {
         return $this->celular;
     }

     public function setCelular($celular)
     {
         $this->celular = $celular;
         return $this;
     }
     public function getAtivo()
     {
         return $this->ativo;
     }

     public function setAtivo($ativo)
     {
         $this->ativo = $ativo;
         return $this;
     }
     public function getSenha()
     {
         return $this->senha;
     }
     public function setSenha($senha)
     {
         $this->senha = $senha;
         return $this;
     }
     public function getCidade()
     {
         return $this->cidade;
     }
     public function setCidade($cidade)
     {
         $this->cidade = $cidade;
         return $this;
     }
     public function getEstado()
     {
         return $this->estado;
     }
     public function setEstado($estado)
     {
         $this->estado = $estado;
         return $this;
     }
 }
