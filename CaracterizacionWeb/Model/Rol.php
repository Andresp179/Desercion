<?php

class Rol
{

  private $Idrol;
  private $Nombre;
  private $Descripcion;

  function __construct($Idrol, $Nombre,$Descripcion)
  {
      $this->setIdrol($Idrol);
      $this->setNombre($Nombre);
      $this->setDescripcion($Descripcion);

  }



   public function getIdrol()
   {
      return $this->Idrol;
   }  

   public function setIdrol($Idrol)
   {
      $this->Idrol=$Idrol;

   }

   public function getNombre()
   {
      return $this->Nombre;
   }

   public function setNombre($Nombre)
   {
       $this->Nombre=$Nombre;
   }


   public function getDescripcion()
   {
       return $this->Descripcion
   }

   public function setDescripcion($Descripcion)
   {
       $this->Descripcion=$Descripcion;
   }

   public static function save($Rol){
        $db=Db::getConnect();
       //var_dump($Rol);
       //die();
    

        $insert=$db->prepare('INSERT INTO rol VALUES (NULL, :nombre,:descripcion)');
        $insert->bindValue('nombre',$Rol->getNombre());
        $insert->bindValue('descripcion',$Rol->getDescripcion());
        $insert->execute();
}

   public static function all(){
    $db=Db::getConnect();
    $listaRoles=[];

    $select=$db->query('SELECT * FROM rol order by Idrol');

    foreach($select->fetchAll() as $Roles){
        $listaRoles[]=new Roles($Rol['Idrol'],$Rol['nombre'],$Rol['descripcion']);
    }
    return $listaRoles;
}

public static function searchById($Idrol){
    $db=Db::getConnect();
    $select=$db->prepare('SELECT * FROM Idrol WHERE Idrol=:Idrol');
    $select->bindValue('Idrol',$Idrol);
    $select->execute();

    $alumnoDb=$select->fetch();


    $Rol = new Rol ($Rol['Idrol'],$Idrol['nombre'], $Idrol['descripcion']);
    //var_dump($Rol);
    //die();
    return $Rol;

}

public static function update($Rol){
    $db=Db::getConnect();
    $update=$db->prepare('UPDATE rol SET nombre=:nombre, descripcion=:descripcion WHERE Idrol=:Idrol');
    $update->bindValue('nombre', $Rol->getNombre());
    $update->bindValue('descripcion',$Rol->getDescripcion());
    $update->execute();
}

public static function delete($Idrol){
    $db=Db::getConnect();
    $delete=$db->prepare('DELETE  FROM rol WHERE Idrol=:Idrol');
    $delete->bindValue('Idrol',$Idrol);
    $delete->execute();		
}








}
?>