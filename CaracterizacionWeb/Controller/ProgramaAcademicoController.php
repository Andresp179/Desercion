<?php

class programaAcademico
{

    function __construct()
	{
		
	}

    function index(){
		require_once('View/ProgramaAcademico/bienvenido.php');
	}
    function register(){
		require_once('View/ProgramaAcademico/register.php');
	}

    function save(){
		
		$programaAc= new Programa($_POST['Idprog'],$_POST['progNombre'],$_POST['progDescripcion']);

		Programa::save($programaAc);
		$this->show();
	}

    function show(){
		$listaPrograma=Programa::all();

		require_once('View/Programa/show.php');
	}
    function updateshow(){
		$Idprog=$_GET['Idprog'];
		$programaAc=Programa::searchById($Idprog);
		require_once('View/programaacademico/updateshow.php');
	}
    
    function update(){
		$programaAc = new Programa($_POST['Idprog'],$_POST['progNombre'],$_POST['progDescripcion']);
		Programa::update($programaAc);
		$this->show();
	}
    function delete(){
		$programaAc=$_GET['Idprog'];
		Programa::delete($Idprog);
		$this->show();
	}
    function search(){
		if (!empty($_POST['Idprog'])) {
			$Idprog=$_POST['Idprog'];
			$programaAc=Programa::searchById($Idprog);
			$listaPrograma[]=$programaAc;
			//var_dump($id);
			//die();
			require_once('View/Programa/show.php');
		} else {
			$listaPrograma=Programa::all();

			require_once('View/Programa/show.php');
		}
		
		
	}

	function error(){
		require_once('View/Programa/error.php');
	}








}
?>