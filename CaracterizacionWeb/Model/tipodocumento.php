<?php

class tipoDocumento
{

    private $idTipo;
    private $descripcion;



    function __construct($idTipo,$descripcion)
    {
        $this->setidTipo($idTipo);
        $this->setdescripcion($descripcion);

    }

    public function getidTipo(){
		return $this->idTipo;
	}

	public function setidTipo($idTipo){
		$this->idTipo = $idTipo;
	}
    public function getdescripcion(){
		return $this->descripcion;
	}

	public function setdescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

    public static function save($tipoDocumento){
		$db=Db::getConnect();
		//var_dump($tipoDocumento);
		//die();
		

		$insert=$db->prepare('INSERT INTO tipodocumento VALUES (NULL, :descripcion)');
		$insert->bindValue('descripcion',$tipoDocumento->getdescripcion());
		$insert->execute();
	}

    public static function all(){
		$db=Db::getConnect();
		$listaTipos=[];

		$select=$db->query('SELECT * FROM tipodocumento order by idTipo');

		foreach($select->fetchAll() as $tipoDocumento){
			$listaTipos[]=new Tipos($tipoDocumento['idTipo'],$tipoDocumento['descripcion']);
		}
		return $listaTipos;
	}

    public static function searchById($idTipo){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM alumno WHERE idTipo=:idTipo');
		$select->bindValue('idTipo',$idTipo);
		$select->execute();

		$tiposDb=$select->fetch();


		$tipoDocumento = new Tipo ($tiposDb['idTipo'],$tiposDbDb['descripcion']);
		//var_dump($tipoDocumento);
		//die();
		return $tipoDocumento;

	}
    public static function update($tipoDocumento){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE tipodocumento SET descripcion=:descripcion WHERE idTipo=:idTipo');
		$update->bindValue('descripcion', $tipoDocumento->getdescripcion());
		$update->bindValue('idTipo',$tipoDocumento->getidTipo());
		$update->execute();
	}

	public static function delete($idTipo){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM tipodocumento WHERE idTipo=:idTipo');
		$delete->bindValue('idTipo',$idTipo);
		$delete->execute();		
	}







}
?>