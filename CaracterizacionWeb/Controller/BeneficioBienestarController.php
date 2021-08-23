<?php

class BeneficioBienestarController
{

    function __construct()
	{
		
	}

	function index(){
		require_once('View/BeneficioBienestar/bienvenido.php');
	}

	function register(){
		require_once('View/BeneficioBienestar/register.php');
	}

    function save(){	
		$beneficioB = new Beneficio ($beneficioBDb['idbenef'],$beneficioBDb['descripcion']);
		Beneficio::save($beneficiobienestar);
		$this->show();
	}
    function show(){
		$listaBeneficios=Beneficio::all();
		require_once('View/BeneficioBienestar/show.php');
	}

    function updateshow(){
		$idbenef=$_GET['idbenef'];
		$beneficioB=Beneficio::searchById($idbenef);
		require_once('View/BeneficioBienestar/updateshow.php');
	}

    function update(){
		$beneficioB = new Beneficio ($beneficioBDb['idbenef'],$beneficioBDb['descripcion']);
		Beneficio::update($beneficioB);
		$this->show();
	}
	function delete(){
		$idbenef=$_GET['idbenef'];
		Beneficio::delete($idbenef);
		$this->show();
	}

    function search(){
		if (!empty($_POST['idbenef'])) {
			$idbenef=$_POST['id'];
			$beneficioB=::searchById($idbenef);
			$listaBeneficios[]=$beneficioB;
			//var_dump($id);
			//die();
			require_once('View/BeneficioBienestar/show.php');
		} else {
			//$listaBeneficios=Alumno::all();
			//require_once('View/BeneficioBienestar/show.php');
            alert('No hay beneficios  registrados!!');
		}
		
		
	}

	function error(){
		require_once('View/BeneficioBienestar/error.php');
	}
}
?>