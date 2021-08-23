<?


class SituacionVulnerabilidad
{

    private $Idvulnera;
    private $descripcion;

    function __construct($Idvulnera,$descripcion)
    {
        $this->setId($Idvulnera);
        $this->setId($descripcion);
    }

    
	public function getIdvulnera(){
		return $this->Idvulnera;
	}

	public function setIdvulnera($Idvulnera){
		$this->Idvulnera = $Idvulnera;
	}
    
	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setdescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

    public static function save($SituaVulnera){
		$db=Db::getConnect();
		//var_dump($SituaVulnera);
		//die();
		

		$insert=$db->prepare('INSERT INTO situacionvulnerabilidad VALUES (NULL, :descripcion)');
		$insert->bindValue('descripcion',$SituaVulnera->getdescripcion());
		$insert->execute();
	}
    public static function all(){
		$db=Db::getConnect();
		$listaVulnerabilidad=[];

		$select=$db->query('SELECT * FROM situacionvulnerabilidad order by Idvulnera');

		foreach($select->fetchAll() as $SituaVulnera){
			$listaVulnerabilidad[]=new Situacion($SituaVulnera['Idvulnera'],$SituaVulnera['descripcion']);
		}
		return $listaVulnerabilidad;
	}
    public static function searchById($Idvulnera){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM situacionvulnerabilidad WHERE Idvulnera=:Idvulnera');
		$select->bindValue('Idvulnera',$Idvulnera);
		$select->execute();

		$SituacionDb=$select->fetch();


		$SituaVulnera= new Situacion ($SituacionDb['Idvulnera'],$SituacionDb['descripcion']);
		//var_dump($situacion);
		//die();
		return $SituacionVulnera;

	}
    public static function update($SituaVulnera){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE situacionvulnerabilidad SET descripcion=:descripcion WHERE Idvulnera=:Idvulnera');
		$update->bindValue('descripcion', $SituaVulnera->getdescripcion());
		$update->bindValue('Idvulnera',$SituaVulnera->getIdvulnera());
		$update->execute();
	}

	public static function delete($Idvulnera){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM situacionvulnerabilidad WHERE Idvulnerabilidad=:Idvulnerabilidad');
		$delete->bindValue('Idvulnera',$Idvulnera);
		$delete->execute();		
	}









}
?>