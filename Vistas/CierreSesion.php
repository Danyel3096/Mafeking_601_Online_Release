<?php
include_once 'App/Controladores/ControlSesion.php';
include_once 'App/Redireccion.php';
include_once 'App/Configuracion.php';

ControlSesion :: cerrarSesion();
Redireccion :: redirigir(SERVIDOR);
?>