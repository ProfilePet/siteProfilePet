<?php
include_once('Model/LembreteConsulta.php');
class LembreteConsultaDAO {
    public static function cadastrar(LembreteConsulta $consulta){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("INSERT INTO tblembreteconsulta(dataConsulta, horaConsulta, localConsulta, nomeVeterinario, tipoConsulta, codDiagnostico, ativoLembreteConsulta, codAnimal) 
                                    VALUES (':dt',':hr',':lo',':nv',':tp',':cd',':a',':ca')");
        $retornoDB->bindValue(":dt",$consulta->getDataConsulta());
        $retornoDB->bindValue(":hr",$consulta->getHoraConsulta());
        $retornoDB->bindValue(":lo",$consulta->getlocalConsulta());
        $retornoDB->bindValue(":nv",$consulta->getNomeVeterinario());
        $retornoDB->bindValue(":tp",$consulta->getTipoConsulta());
        $retornoDB->bindValue(":cd",$consulta->getCodDiagnostico());
        $retornoDB->bindValue(":a",$consulta->getAtivoConsulta());
        $retornoDB->bindValue(":ca",$consulta->getCodAnimal());
        $retornoDB->execute();  
        return $retornoDB;
    }
    public static function editar(LembreteConsulta $consulta){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tblembreteconsulta SET dataConsulta=':dt',horaConsulta=':hr',localConsulta=':lo',nomeVeterinario=':nv',tipoConsulta=':tp',codDiagnostico=':cd',codAnimal=':ca' WHERE  codConsulta=':cc'");
        $retornoDB->bindValue(":dt",$consulta->getDataConsulta());
        $retornoDB->bindValue(":hr",$consulta->getHoraConsulta());
        $retornoDB->bindValue(":lo",$consulta->getlocalConsulta());
        $retornoDB->bindValue(":nv",$consulta->getNomeVeterinario());
        $retornoDB->bindValue(":tp",$consulta->getTipoConsulta());
        $retornoDB->bindValue(":cd",$consulta->getCodDiagnostico());
        $retornoDB->bindValue(":ca",$consulta->getCodAnimal());
        $retornoDB->bindValue(":cc",$consulta->getCodLembreteConsulta());
        $retornoDB->execute();  
        return $retornoDB;
    }

    public static function deletarLembrete($codC){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("UPDATE tblembreteconsulta SET ativoLembreteConsulta = 0 WHERE codConsulta=':cc'");
        $retornoDB->bindValue(":cc",$codC);
        $retornoDB->execute();  
        return $retornoDB;
    }

    public static function consultaDetalhada($codC){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("SELECT * FROM `tblembreteconsulta` WHERE codConsulta=':cc'");
        $retornoDB->bindValue(":cc",$codC);
        $retornoDB->execute();  
        return $retornoDB;
    }

    public static function consultaMenu($codA){
        require_once ('conn.php');
        $retornoDB = $pdo->prepare("SELECT `codConsulta`, `dataConsulta`, `horaConsulta`, `nomeClinica`, `localConsulta`, `nomeVeterinario`, `tipoConsulta` FROM `tblembreteconsulta` WHERE codAnimal = ':ca'");
        $retornoDB->bindValue(":ca",$codA);
        $retornoDB->execute();  
        return $retornoDB;
    }
    
}