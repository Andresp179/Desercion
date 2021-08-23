<?php

class ProgramaController
{

    function __construct()
	{
		
	}

    function index(){
		require_once('View/programaacademico/bienvenido.php');
	}
    function register(){
		require_once('View/programaacademico/register.php');
	}

    function save(){
		
		$programaAc= new ProgramaAcademico(null,$_POST['nombres'],$_POST['descripcion']);

		ProgramaAcademico::save($programaAc);
		$this->show();
	}

    function show(){
		$listaPrograma=ProgramaAcademico::all();

		require_once('View/programaacademico/show.php');
	}
    function updateshow(){
		$Idprog=$_GET['Idp'];
		$programaAc=ProgramaAcademico::searchById($Idprog);
		require_once('View/programaacademico/updateshow.php');
	}
    
    function update(){
		$programaAc = new ProgramaAcademico($_POST['id'],$_POST['nombres'],$_POST['descripcion']);
		ProgramaAcademico::update($programaAc);
		$this->show();
	}
    function delete(){
		$Idprog=$_GET['id'];
		ProgramaAcademico::delete($Idprog);
		$this->show();
	}
    function search(){
		if (!empty($_POST['Id'])) {
			$Idprog=$_POST['Id'];
			$programaAc=ProgramaAcademico::searchById($Idprog);
			$listaPrograma[]=$programaAc;
			//var_dump($id);
			//die();
			require_once('View/programaacademico/show.php');
		} else {
			$listaPrograma=ProgramaAcademico::all();

			require_once('View/programaacademico/show.php');
		}
		
		
	}

	function error(){
		require_once('View/programaacademico/error.php');
	}








}
?>