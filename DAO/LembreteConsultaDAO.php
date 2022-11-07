<?php
include_once('Model/LembreteConsulta.php');
class LembreteConsultaDAO {
    public static function cadastrar(LembreteConsulta $consulta){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tblembreteconsulta(dataConsulta, horaConsulta, localConsulta, nomeVeterinario, tipoConsulta, codDiagnostico, ativoLembreteConsulta, codAnimal,nomeClinica) 
                                    VALUES (:dt,:hr,:lo,:nv,:tp,:cd,:a,:ca,:nc)");
        $retornoDB->bindValue(":dt",$consulta->getDataConsulta());
        $retornoDB->bindValue(":hr",$consulta->getHoraConsulta());
        $retornoDB->bindValue(":lo",$consulta->getlocalConsulta());
        $retornoDB->bindValue(":nv",$consulta->getNomeVeterinario());
        $retornoDB->bindValue(":tp",$consulta->getTipoConsulta());
        $retornoDB->bindValue(":cd",$consulta->getCodDiagnostico());
        $retornoDB->bindValue(":a",$consulta->getAtivoConsulta());
        $retornoDB->bindValue(":ca",$consulta->getCodAnimal());
        $retornoDB->bindValue(":nc",$consulta->getNomeClinica());
        $retornoDB->execute();
        return $retornoDB;
    }
    public static function editar(LembreteConsulta $consulta){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tblembreteconsulta SET dataConsulta=:dt,horaConsulta=:hr,localConsulta=:lo,nomeVeterinario=:nv,tipoConsulta=:tp,codDiagnostico=:cd,nomeClinica=:nc WHERE  codConsulta=:cc");
        $retornoDB->bindValue(":dt",$consulta->getDataConsulta());
        $retornoDB->bindValue(":hr",$consulta->getHoraConsulta());
        $retornoDB->bindValue(":lo",$consulta->getlocalConsulta());
        $retornoDB->bindValue(":nv",$consulta->getNomeVeterinario());
        $retornoDB->bindValue(":tp",$consulta->getTipoConsulta());
        $retornoDB->bindValue(":cd",$consulta->getCodDiagnostico());
        $retornoDB->bindValue(":cc",$consulta->getCodLembreteConsulta());
        $retornoDB->bindValue(":nc",$consulta->getNomeClinica());
        $retornoDB->execute();  
        return $retornoDB;
    }

    public static function deletarLembrete($codC){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tblembreteconsulta SET ativoLembreteConsulta = 0 WHERE codConsulta=:cc");
        $retornoDB->bindValue(":cc",$codC);
        $retornoDB->execute();  
        return $retornoDB;
    }

    public static function consultaDetalhada($codC){
        require ('conn.php');
        $retornoDB = $pdo->prepare("SELECT codConsulta, dataConsulta, horaConsulta, localConsulta,nomeVeterinario, tipoConsulta, tblembreteconsulta.codDiagnostico,ativoLembreteConsulta, tblembreteconsulta.codAnimal,nomeClinica,tratamento FROM tblembreteconsulta INNER JOIN tbdiagnostico on tbdiagnostico.codDiagnostico = tblembreteconsulta.codDiagnostico  WHERE codConsulta=:cc");
        $retornoDB->bindValue(":cc",$codC);
        $retornoDB->execute();  
        return $retornoDB;
    }

    public static function consultaMenu($codA){
        include ('../conn.php');
        $retornoDB = $pdo->prepare("SELECT codConsulta, dataConsulta, horaConsulta, localConsulta,nomeVeterinario, tipoConsulta, tblembreteconsulta.codDiagnostico,ativoLembreteConsulta, tblembreteconsulta.codAnimal,nomeClinica,tratamento FROM tblembreteconsulta INNER JOIN tbdiagnostico on tbdiagnostico.codDiagnostico = tblembreteconsulta.codDiagnostico  WHERE tblembreteconsulta.codAnimal = :ca AND ativoLembreteConsulta = 1");
        $retornoDB->bindValue(":ca",$codA);
        $retornoDB->execute();  
        return $retornoDB;
    }
}