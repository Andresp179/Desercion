<?php


class PersonaController
{

    function __construct()
	{
		
	}

    function index(){
		require_once('View/persona/bienvenido.php');
	}

    function register(){
		require_once('View/persona/register.php');
	}

    
	function save(){		
      	$persona = new Persona(null, $_POST['tipodoc'], $_POST['documento'],$_POST['nombres'],$_POST['apellidos']);
	  
		Persona::save($persona);
		$this->show();
		
	}
	

    function show(){
		$listaPersonas=Persona::all();

		require_once('View/persona/show.php');
	}

    function updateshow(){
		$idPersona=$_GET['id'];
		$persona=Persona::searchById($idPersona);
		require_once('View/persona/updateshow.php');
	}

    function update(){
		$persona = new Persona($_POST['id'],$_POST['tipodoc'],$_POST['documento'],$_POST['nombre'],$_POST['apellidos']);
		var_dump($persona);
		Persona::update($persona);
		$this->show();
	}

    function delete(){
		$idPersona=$_GET['id'];
		Persona::delete($idPersona);
		$this->show();
	}

    function search(){
		if (!empty($_POST['idPersona'])) {
			$idPersona=$_POST['idPersona'];
			$persona=Persona::searchById($idPersona);
			$listaPersonas[]=$persona;
			//var_dump($id);
			//die();
			require_once('View/persona/show.php');
		} else {
			$listaPersonas=Persona::all();
          require_once('View/persona/error.php');               
			
		}
		
		
	}
    function error(){
		require_once('View/persona/error.php');
	}

}
?>