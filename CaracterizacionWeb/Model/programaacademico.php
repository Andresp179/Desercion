<?php

class ProgramaAcademico
{
      

    private $Idprog;
    private $progNombre;
    private $progDescripcion;

    function __construct($Idprog,$progNombre,$progDescripcion){

      $this->setIdprog($Idprog);
      $this->setprogNombre($progNombre);
      $this->setprogDescripcion($progDescripcion);
    }

    public function getIdprog()
    {
        return $this->Idprog;
    }
    
    public function setIdprog($Idprog)
    {
        $this->Idprog=$Idprog;
    }

    public function getprogNombre()
    {
        return $this->progNombre;
    }
     
    public function setprogNombre($progNombre)
    {
        $this->progNombre=$progNombre;
    }

    public function setprogDescripcion($progDescripcion)
    {
		$this->progDescripcion=$progDescripcion;
    }
    

    public function getprogDescripcion()
    {
		return $this->progDescripcion;
       
	}
    public static function save($programaAc){
		$db=Db::getConnect();
		//var_dump($progAc);
		//die();
		

		$insert=$db->prepare('INSERT INTO programaacademico VALUES (NULL, :progNombre,:progDescripcion)');
		$insert->bindValue('progNombre',$programaAc->getprogNombre());
		$insert->bindValue('progDescripcion',$programaAc->getprogDescripcion());
		$insert->execute();
	}
    public static function all(){
		$db=Db::getConnect();
		$listaPrograma=[];

		$select=$db->query('SELECT * FROM programaacademico order by idprog');

		foreach($select->fetchAll() as $programaAc){
			$listaPrograma[]=new ProgramaAcademico($programaAc['Idprog'],$programaAc['progNombre'],$programaAc['progDescripcion']);
		}
		return $listaPrograma;
	}

    public static function searchById($Idprog){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM programaacademico WHERE Idprog=:Idprog');
		$select->bindValue('Idprog',$Idprog);
		$select->execute();

		$programaDb=$select->fetch();


		$programaAc = new ProgramaAcademico($programaDb['Idprog'],$programaDb['progNombre'],$programaDb['progDescripcion']);
		//var_dump($programaAc);
		//die();
		return $programaAc;

	}

    public static function update($programaAc){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE programaacademico SET progNombre=:progNombre, progDescripcion=:progDescripcion WHERE Idprog=:Idprog');
		$update->bindValue('progNombre', $programaAc->getprogNombre());
		$update->bindValue('progDescripcion',$programaAc->getprogDescripcion());
		$update->bindValue('Idprog',$programaAc->getIdprog());
		$update->execute();
	}


    public static function delete($Idprog){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM programaacademico WHERE Idprog=:Idprog');
		$delete->bindValue('Idprog',$Idprog);
		$delete->execute();		
	}






}
?>