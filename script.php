<?php
# Definimos que el script sea ejecutado sólo si ha sido activado desde el formulario Flash
if(isset($_POST['boton'])){

    # Configuramos la información que será enviada en el e-mail
    $destinatario = "info@allcam.cl";
    $asunto = "Contacto ALLCAM";
	$remitente = "ssanhueza@allcam.cl";
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
	$correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
	$ciudad = $_POST['ciudad'];
    $mensaje = nl2br($_POST['mensaje']); // La función nl2br() activa los saltos de línea ingresados por el usuario
    
    # Estructuramos el cuerpo del mensaje (los caracteres "\r\n" representan un salto de línea)
    $texto.= "nombre: $nombre\r\n";
    $texto.= "empresa: $empresa\r\n";
	$texto.= "correo: $correo\r\n";
    $texto.= "telefono: $telefono\r\n";
	$texto.= "ciudad: $ciudad\r\n";
    $texto.= "mensaje: $mensaje";
    
    # Enviamos el mensaje mediante la función mail(), comprobando si se realizó con exito el envío o no
    if(!mail($destinatario, $asunto, $texto, "FROM:<$email>")){
        $enviado = "no";
    }else{
        $enviado = "si";
    }
    
	# Generamos la respuesta que será enviada de vuelta a Flash, mediante la variable "confirm"
    echo "&confirm=$enviado";
    
}
?>