<?php

$controllers=array(
	'persona'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'docente'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'usuario'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'programa'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'Situacion'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('persona','error');
	}		
}else{
	call('persona','error');
}

function call($controller, $action){
	require_once('Controller/'.$controller.'Controller.php');

	switch ($controller) {
		
		case 'persona':
	    require_once('Model/persona.php');
		$controller= new DocenteController();
		break;	
				
			
					# code...
		break;

		case 'programa':
		require_once('Model/programaacademico.php');
		$controller= new ProgramaController();
		break;	
				
				
						# code...
		break;	

		
	}
	$controller->{$action}();
}
?>