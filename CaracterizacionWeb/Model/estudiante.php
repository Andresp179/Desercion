<?php

class Estudiante
{

    private $codEstudiante;
    private $programAcademico;
    private $persona;



    function __construct($codEstudiante,$programAcademico,$persona)
    {
        $this->setcodEstudiante($codEstudiante);
        $this->setprogramAcademico($programAcademico);
        $this->setpersona($persona);
    }

    public function getcodEstudiante(){
		return $this->codEstudiante;
	}

	public function setcodEstudiante($codEstudiante){
		$this->codEstudiante = $codEstudiante;
	}

    public function getprogramAcademico(){
		return $this->programAcademico;
	}

	public function setprogramAcademico($programAcademico){
		$this->programAcademico = $programAcademico;
	}

    public function getpersona(){
		return $this->persona;
	}

	public function setpersona($persona){
		$this->persona = $persona;
	}

    public static function save($estudiante){
		$db=Db::getConnect();
		//var_dump($estudiante);
		//die();
		

		$insert=$db->prepare('INSERT INTO estudiante VALUES (NULL, :programAcademico,:persona)');
		$insert->bindValue('programAcademico',$estudiante->getprogramAcademico());
		$insert->bindValue('persona',$estudiante->getpersona());
		$insert->execute();
	}

    public static function all(){
		$db=Db::getConnect();
		$listaEstudiantes=[];

		$select=$db->query('SELECT * FROM estudiante order by codEstudiante');

		foreach($select->fetchAll() as $estudiante){
			$listaEstudiantes[]=new Estudiante($estudiante['codEstudiante'],$estudiante['programAcademico'],$estudiante['persona']);
		}
		return $listaEstudiantes;
	}

    public static function searchById($codEstudiante){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM estudiante WHERE codEstudiante=:codEstudiante');
		$select->bindValue('codEstudiante',$codEstudiante);
		$select->execute();

		$estudianteDb=$select->fetch();


		$estudiante = new estudiante ($estudianteDb['codEstudiante'],$estudianteDb['programAcademico'], $estudianteDb['persona']);
		//var_dump($estudiante);
		//die();
		return $estudiante;

	}

    public static function update($estudiante){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE estudiante SET  programAcademico=:programAcademico, persona=:persona WHERE codEstudiante=:codEstudiante');
		$update->bindValue('programAcademico', $estudiante->getprogramAcademico());
		$update->bindValue('persona',$estudiante->getpersona());
		$update->bindValue('codEstudiante',$estudiante->getcodEstudiante());
		$update->execute();
	}

	public static function delete($codEstudiante){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM estudiante WHERE codEstudiante=:codEstudiante');
		$delete->bindValue('codEstudiante',$codEstudiante);
		$delete->execute();		
	}










}
?>