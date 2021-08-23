<?php
/** */
class Usuarios
{
   private $idusua;
   private $usua_nombre;
   private $usua_apellido;
   private $tipo_documento;
   private $documento_usua;
   private $contrasena;
   private $sex;
   private $tipo_usuario;
   private $estado;
   
       function __construct($idusua, $usua_nombre, $usua_apellido, $tipo_documento, $documento_usua, $contrasena, $sex, $tipo_usuario, $estado)
       {
            $this->setidusua($idusua);
            $this->setusua_nombre($usua_nombre);
            $this->setusua_apellido($usua_apellido);
            $this->settipo_documento($tipo_documento);
            $this->setdocumento_usua($documento_usua);
            $this->setcontrasena($contrasena);
            $this->setsex($sex);
            $this->settipo_usuario($tipo_usuario);
            $this->setestado($estado);
       }

   public function getidusua(){
            return $this->idusua;
   }
   public function setidusua($idusua){
            $this->idusua=$idusua;
   }

    public function getusua_nombre(){
            return $this->usua_nombre;
    }

    public function setusua_nombre($usua_nombre){
            $this->usua_nombre=$usua_nombre;
    }


    public function getusua_apellido(){
            return $this->usua_apellido;
    }
  
      public function setusua_apellido($usua_apellido){
            $this->usua_apellido=$usua_apellido;
      }

      public function gettipo_documento(){
            return $this->tipo_documento;
      }
  
      public function settipo_documento($tipo_documento){
            $this->tipo_documento=$tipo_documento;
      }

      public function getdocumento_usua(){
            return $this->documento_usua;
      }
  
      public function setdocumento_usua($documento_usua){
            $this->documento_usua=$documento_usua;
      }
      
      public function getcontrasena(){
            return $this->contrasena;
      }
  
      public function setcontrasena($contrasena){
           $this->contrasena=$contrasena;
      }

      public function getsex(){
            return $this->sex;
      }
  
      public function setsex($sex){
            $this->sex=$sex;
      }
      
      public function gettipo_usuario(){
            return $this->tipo_usuario;
      }
  
      public function settipo_usuario($tipo_usuario){
            $this->tipo_usuario=$tipo_usuario;
      }

      public function getestado(){

		return $this->estado;
	}

	public function setestado($estado){
		
		if (strcmp($estado, 'on')==0) {
			$this->estado=1;
		} elseif(strcmp($estado, '1')==0) {
			$this->estado='checked';
		}elseif (strcmp($estado, '0')==0) {
			$this->estado='of';
		}else {
			$this->estado=0;
		}

	}


    public static function save($usuario){
		  $db=Db::getConnect();
		//var_dump($usuario);
		//die();
		

		 $insert=$db->prepare('INSERT INTO usuarios VALUES (NULL, :usua_nombre,:usua_apellido, :tipo_documento,:documento_usua, :contrasena, :sex, :tipo_usuario, :estado)');
		 $insert->bindValue('usua_nombre',$usuario->getusua_nombre());
		 $insert->bindValue('usua_apellido',$usuario->getusua_apellido());
             $insert->bindValue('tipo_documento',$usuario->gettipo_documento());
             $insert->bindValue('documento_usua',$usuario->getdocumento_usua());
             $insert->bindValue('contrasena',$usuario->getcontrasena());
             $insert->bindValue('sex',$usuario->getsex());
             $insert->bindValue('tipo_usuario',$usuario->gettipo_usuario());
		 $insert->bindValue('estado',$usuario->getestado());
		 $insert->execute();
	}

      public static function all(){
		$db=Db::getConnect();
		$listaUsuarios=[];

		$select=$db->query('SELECT * FROM usuarios order by idusua');

		foreach($select->fetchAll() as $usuario){
			$listaUsuarios[]=new Usuarios($usuario['idusua'],$usuario['usua_nombre'],$usuario['usua_apellido'], $usuario['tipo_documento'],$usuario['documento_usua'],$usuario['contrasena'], $usuario['sex'],$usuario['tipo_usuario'],$usuario['estado']);
		}
		return $listaUsuarios;
	}
      public static function searchById($idusua){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuarios WHERE idusua=:idusua');
		$select->bindValue('idusua',$idusua);
		$select->execute();

		$usuarioDb=$select->fetch();


		$usuario = new Usuarios ($usuarioDb['idusua'],$usuarioDb['usua_nombre'], $usuarioDb['usua_apellido'], $usuarioDb['tipo_documento'],$usuarioDb['documento_usua'],$usuarioDb['contrasena'], $usuarioDb['sex'],$usuarioDb['tipo_usuario'],$usuarioDb['estado']);
		//var_dump($usuario);
		//die();
		return $usuario;

	}

	public static function update($usuario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuarios SET usua_nombre=:usua_nombre, usua_apellido=:usua_apellido,tipo_documento=:tipo_documento, documento=:documento, contrasena=:contrasena, sex=:sex, tipo_usuario=:tipo_usuario, estado=:estado WHERE idusa=:idusua');
            $update->bindValue('usua_nombre',$usuario->getusua_nombre());
            $update->bindValue('usua_apellido',$usuario->getusua_apellido());
            $update->bindValue('tipo_documento',$usuario->gettipo_documento());
            $update->bindValue('documento',$usuario->getdocumento_usua());
            $update->bindValue('contrasena',$usuario->getcontrasena());
            $update->bindValue('sex',$usuario->getsex());
            $update->bindValue('tipo_usuario',$usuario->gettipo_usuario());
            $update->bindValue('estado',$usuario->getestado());
		$update->execute();
	}

	public static function delete($idusua){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM usuarios WHERE idusua=:idusua');
		$delete->bindValue('idusua',$idusua);
		$delete->execute();		
	}






}





?>