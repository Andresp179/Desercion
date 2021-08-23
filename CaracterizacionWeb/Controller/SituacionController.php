<?php

class SituacionController
{
    function __construct()
	{
		
	}


    function index(){
		require_once('View/Situacion/bienvenido.php');
	}

	function register(){
		require_once('View/Situacion/register.php');
	}

	function save(){
		
		$SituaVulnera= new Situacion(null, $_POST['Descripcion']);

		Situacion::save($SituaVulnera);
		$this->show();
	}

	function show(){
		$listaVulnerabilidad=Situacion::all();
		require_once('View/Situacion/show.php');
	}
	function updateshow(){
		$id=$_GET['id'];
		$SituaVulnera::searchById($id);
		require_once('View/Situacion/updateshow.php');
	}

	function update(){
		$SituaVulnera = new Situacion($_POST['id'],$_POST['Descripcion']);
		Situacion::update($SituaVulnera);
		$this->show();
	}

	function delete(){
		$id=$_GET['id'];
		Situacion::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$SituaVulnera=Situacion::searchById($id);
			$listaVulnerabilidad[]=$SituaVulnera;
			//var_dump($id);
			//die();
			require_once('View/Situacion/show.php');
		} else {
			$listaVulnerabilidad=Situacion::all();

			require_once('View/Situacion/show.php');
		}







}
?>