<?php


class DocenteController
{

    function __construct()
	{
		
	}

    function index(){
		require_once('View/Docente/bienvenido.php');
	}
    function register(){
		require_once('View/Docente/register.php');
	}

    function save(){
		
		$docente= new Docente($_POST['docCodigo'],$_POST['programaAcademico'],$_POST['persona']);

		Docente::save($docente);
		$this->show();
	}
    function show(){
		$listaDocente=Docente::all();

		require_once('View/Docente/show.php');
	}
    function updateshow(){
		$docCodigo=$_GET['docCodigo'];
		$docente=Docente::searchById($docCodigo);
		require_once('View/Docente/updateshow.php');
	}


    function update(){
		$docente = new Docente($_POST['docCodigo'],$_POST['programaAcademico'],$_POST['persona']);
		Docente::update($docente);
		$this->show();
	}
    function delete(){
		$docCodigo=$_GET['docCodigo'];
		docente::delete($docCodigo);
		$this->show();
	}
    function search(){
		if (!empty($_POST['docCodigo'])) {
			$docCodigo=$_POST['docCodigo'];
			$docente=Docente::searchById($docCodigo);
			$listaDocente[]=$docente;
			//var_dump($id);
			//die();
			require_once('View/Docente/show.php');
		} else {
			$listaDocente=Docente::all();

			require_once('View/Docente/show.php');
		}
		
		
	}

	function error(){
		require_once('View/Docente/error.php');
	}








}
?>