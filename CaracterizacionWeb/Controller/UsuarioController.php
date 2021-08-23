<?php


class UsuarioController
{
    function __construct()
	{
		
	}

	function index(){
		require_once('View/Usuario/bienvenido.php');
	}

	function register(){
		require_once('View/Usuario/register.php');
	}

    function save(){
		if (!isset($_POST['estado'])) {
			$estado="of";
		}else{
			$estado="on";
		}
		
		$usuario = new Usuarios (null,$_POST['nombre'],$_POST['apellido'],$_POST['tipodoc'],$_POST['documento'],$_POST['contrasena'], $_POST['sex'],$_POST['user'],$estado);
		//var_dump($usuario);
		Usuarios::save($usuario);
		$this->show();
	}

    function show(){
		$listaUsuarios=Usuarios::all();
		require_once('View/Usuario/show.php');
	}

    function updateshow(){
		$idusua=$_GET['id'];
		$usuario=Usuarios::searchById($idusua);
		require_once('View/Usuario/updateshow.php');
	}

    function update(){
		$usuario = new Usuarios ($_POST['id'],$_POST['nombres'], $_POST['apellidos'], $_POST['tipodocumento'],$_POST['documento'],$_POST['contrasena'], $_POST['sex'],$_POST['tipo_usuario'],$_POST['estado']);
		Usuario::update($usuario);
		$this->show();
	}

    function delete(){
		$idusua=$_GET['id'];
		Usuarios::delete($idusua);
		$this->show();
	}

    function search(){
		if (!empty($_POST['idusua'])) {
			$idusua=$_POST['idusua'];
			$usuario=Usuarios::searchById($idusua);
			$listaUsuarios[]=$usuario;
			//var_dump($id);
			//die();
			require_once('View/usuario/show.php');
		} else {
			
		
        alert('No hay usuarios registradas!!');
		}
		
		
	}
	function error(){
		require_once('View/Usuario/error.php');
	}
    
}
?>