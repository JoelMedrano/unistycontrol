<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "controladores/empresas.controlador.php";
require_once "controladores/social.controlador.php";
require_once "controladores/miembros.controlador.php";
require_once "controladores/membresias.controlador.php";
require_once "controladores/escritorio.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/empresas.modelo.php";
require_once "modelos/social.modelo.php";
require_once "modelos/miembros.modelo.php";
require_once "modelos/membresias.modelo.php";
require_once "modelos/escritorio.modelo.php";

//LIBRERIA PHPMAILER

require_once "extensiones/PHPMailer/PHPMailerAutoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();