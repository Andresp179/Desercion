<?php

class BienestarxEstudiante()
{

    private $beneficioBienestar;
    private $estudCodigo;
    private $estPersona;

    function __construct($beneficioBienestar, $estudCodigo,$estPersona)
	{
		$this->setId($beneficioBienestar);
		$this->setNombres($estudCodigo);
		$this->setApellidos($estPersona);
    }

    public function getbeneficioBienestar(){
		return $this->beneficioBienestar;
	}

	public function setId($beneficioBienestar){
		$this->beneficioBienestar = $beneficioBienestar;
	}
    public function getestudCodigo(){
		return $this->estudCodigo;
	}

	public function setId($estudCodigo){
		$this->estudCodigo = $estudCodigo;
	}
    public function getestPersona(){
		return $this->estPersona;
	}

	public function setId($estPersona){
		$this->estPersona = $estPersona;
	}


	public static function save($bienestarXestudiante){
		$db=Db::getConnect();
		//var_dump($beneficioxestudiante);
		//die();
		

		$insert=$db->prepare('INSERT INTO alumno VALUES (NULL, :beneficioBienestar,:estudCodigo,:estPersona)');
		$insert->bindValue('beneficioBienestar',$bienestarXestudiante->getbeneficioBienestar());
		$insert->bindValue('estudCodigo',$bienestarXestudiante->getestudCodigo());
		$insert->bindValue('estPersona',$bienestarXestudiante->getestPersona());
		$insert->execute();
	}

















}
?>