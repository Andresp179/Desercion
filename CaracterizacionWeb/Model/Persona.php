<?php

class Persona{
 
    private $idPersona;
    private $perTipoDoc;
    private $persDoc;
    private $perNombres;
    private $perApell;

    function __construct($idPersona, $perTipoDoc, $persDoc, $perNombres, $perApell)
    {
     $this->setidPersona($idPersona);
     $this->setperTipoDoc($perTipoDoc);
     $this->setpersDoc($persDoc);
     $this->setperNombres($perNombres);
     $this->setperApell($perApell);    
    }

    public function getidPersona(){
        return $this->idPersona;
    }    
    public function setidPersona($idPersona){
        $this->idPersona=$idPersona;
    }

    public function getperTipoDoc(){
        return $this->perTipoDoc;
    }
    public function setperTipoDoc($perTipoDoc){
        $this->perTipoDoc=$perTipoDoc;
    }

    public function setpersDoc($persDoc){
        $this->persDoc=$persDoc;
    } 
    public function getpersDoc(){
        return $this->persDoc;
    }  
   
    public function getperNombres(){
        return $this->perNombres;
    }
    
    public function setperNombres($perNombres){
        $this->perNombres=$perNombres;
    }
 
    public function getperApell(){
        return $this->perApell;
    }
    
    public function setperApell($perApell){
        $this->perApell=$perApell;
    }

    public static function save($persona){
        $db=Db::getConnect();
         $insert=$db->prepare('INSERT INTO persona VALUES (NULL,:perTipoDoc,:persDoc,:perNombres,:perApell)');
         $insert->bindValue('perTipoDoc',$persona-> getperTipoDoc());
         $insert->bindValue('persDoc',$persona-> getpersDoc());
         $insert->bindValue('perNombres',$persona-> getperNombres());
         $insert->bindValue('perApell',$persona-> getperApell());
         $insert->execute();
         }



         public static function all(){
            $db=Db::getConnect();
            $listaPersonas=[];
    
            $select=$db->query('SELECT * FROM persona order by idPersona');
    
            foreach($select->fetchAll() as $persona){
                $listaPersonas[]=new Persona($persona['idPersona'],$persona['perTipoDoc'],$persona['persDoc'],$persona['perNombres'],$persona['perApell']);
            }
            return $listaPersonas;
        }  

        public static function searchById($idPersona){
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM persona WHERE idPersona=:idPersona');
            $select->bindValue('idPersona',$idPersona);
            $select->execute();

            $personaDb=$select->fetch();

            $persona = new Persona ($personaDb['idPersona'],$personaDb['perTipoDoc'],$personaDb['persDoc'],$personaDb['perNombres'],$personaDb['perApell']);
            //var_dump($persona);
            //die();
            return $persona;
    
        }

        public static function update($persona){
            $db=Db::getConnect();
            $update=$db->prepare('UPDATE persona SET perTipoDoc=:perTipoDoc, persDoc=:persDoc, perNombres=:perNombres, perApell=:perApell WHERE idPersona=:idPersona');
            $update->bindValue('perTipoDoc', $persona->getperTipoDoc());
            $update->bindValue('persDoc',$persona->getpersDoc());
            $update->bindValue('perNombres',$persona->getperNombres());
            $update->bindValue('perApell',$persona->getperApell());
            $update->bindValue('idPersona',$persona->getidPersona());
            $update->execute();
        }

        public static function delete($idPersona){
            $db=Db::getConnect();
            $delete=$db->prepare('DELETE  FROM persona WHERE idPersona=:idPersona');
            $delete->bindValue('idPersona',$idPersona);
            $delete->execute();		
        }
}
?>