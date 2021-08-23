<?php

class beneficiobienestar{

    private $idbenef;
    private $descripcion;

    function __construct($idbenef, $descripcion)
    {
     $this->setId($idbenef);
     $this->setusua_nombre($descripcion);
    
    }

    public function getidbenef(){
        return $this->idbenef;
    }
    
    public function setidbenef($idbenef){
        $this->idbenef=$idbenef;
    }

    public function getdescripcion(){
        return $this->iddescripcion;
    }
    
    public function setdescripcion($descripcion){
        $this->descripcion=$descripcion;
    }

        public static function save($beneficiobienestar){
        $db=Db::getConnect();
        //var_dump($beneficiobienestar);
        //die();
      

         $insert=$db->prepare('INSERT INTO beneficiobienestar VALUES (NULL,:descripcion)');
         $insert->bindValue('descripcion',$beneficiobienestar-> getdescripcion());
         $insert->execute();
         }

         public static function all(){
            $db=Db::getConnect();
            $listaBeneficios=[];
    
            $select=$db->query('SELECT * FROM beneficiobienestar order by idbenef');
    
            foreach($select->fetchAll() as $beneficiobienestar){
                $listaBeneficios[]=new Beneficios($beneficiobienestar['idbenef'],$beneficiobienestar['descripcion']);
            }
            return $listaBeneficios;
        }
        public static function searchById($idbenef){
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM beneficiobienestar WHERE idbenef=:idbenef');
            $select->bindValue('idbenef',$idbenef);
            $select->execute();
    
            $beneficiobienestarDb=$select->fetch();
    
    
            $beneficioB = new Beneficio ($beneficioBDb['idbenef'],$beneficioBDb['descripcion']);
            //var_dump($bienestar);
            //die();
            return $beneficioB;
    
        }

        public static function update($idbenef){
            $db=Db::getConnect();
            $update=$db->prepare('UPDATE beneficiobienestar SET descripcion=:descripcion WHERE idbenef=:idbenef');
            $update->bindValue('idbenef',$beneficioB->getidbenef; 
            $update->bindValue('descripcion',$beneficioB->getdescripcion;                
            $update->execute();
        }
    
        public static function delete($idbenef){
            $db=Db::getConnect();
            $delete=$db->prepare('DELETE  FROM beneficiobienestar WHERE idbenef=:idbenef');
            $delete->bindValue('idbenef',$idbenef);
            $delete->execute();		
        }
    }
?>