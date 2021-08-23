<?php

class Docente
{
        private $docCodigo;
        private $programaAcademico;
        private $persona;


    function __construct($docCodigo, $programaAcademico,$persona)
	{
		$this->setId($docCodigo);
		$this->setNombres($programaAcademico);
		$this->setApellidos($persona);
				
	}

    public function getdocCodigo(){
		return $this->docCodigo;
	}

	public function setId($docCodigo){
		$this->docCodigo = $docCodigo;
	}
    public function getprogramaAcademico(){
		return $this->programaAcademico;
	}

	public function setprogramaAcademico($programaAcademico){
		$this->programaAcademico = $programaAcademico;
	}
    public function getpersona(){
		return $this->persona;
	}

	public function setpersona($persona){
		$this->persona = $persona;
	}   



	public static function save($docente){
		$db=Db::getConnect();
		//var_dump($docente);
		//die();
		

		$insert=$db->prepare('INSERT INTO docente VALUES (NULL, :programAcademico,:persona)');
		$insert->bindValue('programAcademico',$docente->getprogramaAcademico());
		$insert->bindValue('persona',$docente->getpersona());
		$insert->execute();
	}




    public static function all(){
		$db=Db::getConnect();
		$listaDocente=[];

		$select=$db->query('SELECT * FROM docente order by docCodigo');

		foreach($select->fetchAll() as $docente){
			$listaDocente[]=new Docente($docente['docCodigo'],$docente['programaAcademico'],$docente['persona']);
		}
		return $listaDocente;
	}

    public static function update($docente){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE docente SET programaAcademico=:programaAcademico, persona=:persona WHERE docCodigo=:docCodigo');
		$update->bindValue('programaAcademico', $docente->getprogramaAcademico());
		$update->bindValue('persona',$docente->getpersona());
		$update->bindValue('docCodigo',$docente->getdocCodigo());
		$update->execute();
	}
    public static function delete($docCodigo){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM docente WHERE docCodigo=:docCodigo');
		$delete->bindValue('docCodigo',$docCodigo);
		$delete->execute();		
	}



}
?>