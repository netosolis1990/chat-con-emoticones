<?php
	//importamos la libreria de pusher
	require('libs/Pusher.php');
	//comprobamos que llego un mensaje por el metodo GET
	if($_GET){
		if(isset($_GET['usuario']) && isset($_GET['mensaje']) && isset($_GET['emoticone'])){

			//Checamos que los mensages no contengan codigo html ni php a menos que sean emoticones...
			//Esto es para evitar ataques
			$usuario = strip_tags($_GET['usuario']);
			if(strcmp($usuario, '') == 0)return;
			if($_GET['emoticone']=='false')$mensaje = strip_tags($_GET['mensaje']);
			else $mensaje = $_GET['mensaje'];
			/*creamos un objeto pusher que recibe como parametros APP_KEY, APP_SECRET, APP_ID */
			$pusher = new Pusher('APP_KEY', 'APP_SECRET', 'APP_ID');
			$pusher->trigger('chat', 'mensaje', array('usuario'=> $usuario,'mensaje' => $mensaje) );
		}
	}
?>
