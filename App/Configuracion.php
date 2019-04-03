<?php
//INFO DE LA BASE DE DATOS
define('Nombre_servidor', 'ec2-75-101-131-79.compute-1.amazonaws.com');
define('Nombre_base_datos', 'd111ml80mejp0j');
define('Nombre_usuario', 'roiohtrcpvorna');
define('Clave', 'dfc50fac6ebc8f0b481b061bc45117f7980d9ff1e592f58913a4dc39de00fe8b');
define('Puerto_base_datos', '5432');

//RUTAS DE LA WEB
define('SERVIDOR', 'http://localhost/MafekingOnline');
define('RUTA_CIERRE_SESION', SERVIDOR.'/Cierre_sesion');
define('RUTA_INICIO_SESION', SERVIDOR.'/Inicio_sesion');
define('RUTA_GESTOR' , SERVIDOR.'/Gestor');
define('RUTA_NOTICIA' , SERVIDOR.'/Noticia');
define('RUTA_CRONOGRAMA' , SERVIDOR.'/Cronograma');
define('RUTA_HISTORIA' , SERVIDOR.'/Historia');
define('RUTA_ORGANIGRAMA' , SERVIDOR.'/Organigrama');
define('RUTA_REGISTRO', SERVIDOR.'/Registro');
define('RUTA_REGISTRO_CORRECTO', SERVIDOR.'/Registro_correcto');
define('RUTA_RECUPERAR_CLAVE', SERVIDOR.'/Recuperar_clave');
define('RUTA_GENERAR_RECUPERADOR', SERVIDOR.'/Generar_recuperador');
define('RUTA_RECUPERACION_CLAVE', SERVIDOR.'/Recuperacion_clave');
define('RUTA_BUSCAR', SERVIDOR.'/Buscar');

//RUTAS DEL GESTOR DE CUENTA
define('RUTA_GESTOR_ALMACEN' , RUTA_GESTOR.'/Almacen');
define('RUTA_GESTOR_CARGOS' , RUTA_GESTOR.'/Cargos');
define('RUTA_GESTOR_COMENTARIOS' , RUTA_GESTOR.'/Comentarios');
define('RUTA_GESTOR_INTENDENCIA' , RUTA_GESTOR.'/Intendencia');
define('RUTA_GESTOR_ORGANIGRAMA' , RUTA_GESTOR.'/Organigrama');

//GESTOR_TESORERIA
define('RUTA_GESTOR_TESORERIA' , RUTA_GESTOR.'/Tesoreria');
define('RUTA_TESORERIA_INSCRIPCION' , RUTA_GESTOR_TESORERIA.'/Inscripcion');
define('RUTA_TESORERIA_REGISTRO' , RUTA_GESTOR_TESORERIA.'/Registro');
define('RUTA_TESORERIA_DETALLE' , RUTA_GESTOR_TESORERIA.'/Detalle');

//GESTOR_PROGRESION
define('RUTA_GESTOR_PROGRESIONES' , RUTA_GESTOR.'/Progresiones');
define('RUTA_PROGRESIONES_EJES' , RUTA_GESTOR_PROGRESIONES.'/Ejes');
define('RUTA_PROGRESIONES_ESPECIALIDADES' , RUTA_GESTOR_PROGRESIONES.'/Especialidades');
define('RUTA_PROGRESIONES_REQUISITOS' , RUTA_GESTOR_PROGRESIONES.'/Requisitos');
define('RUTA_PROGRESIONES_SEGUIMIENTO' , RUTA_GESTOR_PROGRESIONES.'/Seguimiento');

//GESTOR_EVENTOS
define('RUTA_GESTOR_EVENTOS' , RUTA_GESTOR.'/Eventos');
define('RUTA_GESTOR_CALENDARIO' , RUTA_GESTOR_EVENTOS.'/Calendario');

//GESTOR_RAMA
define('RUTA_GESTOR_RAMA' , RUTA_GESTOR.'/Rama');
define('RUTA_RAMA_HISTORIA' , RUTA_GESTOR_RAMA.'/Historia');
define('RUTA_RAMA_FUNDAMENTOS' , RUTA_GESTOR_RAMA.'/Fundamentos');
define('RUTA_RAMA_PARTICIPACIONES' , RUTA_GESTOR_RAMA.'/Participaciones');

//GESTOR_NOTICIA
define('RUTA_GESTOR_NOTICIA' , RUTA_GESTOR.'/Noticias');

//RUTA_VISTAS_RAMAS
define('RUTA_GRUPO' , SERVIDOR.'/Grupo');
define('RUTA_MANADA' , RUTA_GRUPO.'/Manada');
define('RUTA_TROPA' , RUTA_GRUPO.'/Tropa');
define('RUTA_COMUNIDAD' , RUTA_GRUPO.'/Comunidad');
define('RUTA_CLAN' , RUTA_GRUPO.'/Clan');

//RUTAS DE PROGRESIONES
define('RUTA_PROGRESIONES', SERVIDOR.'/Progresiones');
define('RUTA_PROGRESION_MANADA', RUTA_PROGRESIONES.'/Manada');
define('RUTA_PROGRESION_TROPA', RUTA_PROGRESIONES.'/Tropa');
define('RUTA_PROGRESION_COMUNIDAD', RUTA_PROGRESIONES.'/Comunidad');
define('RUTA_PROGRESION_CLAN', RUTA_PROGRESIONES.'/Clan');

//RUTAS DE REPORTES
define('RUTA_CARGOS_MANADA', RUTA_GESTOR_CARGOS.'/Manada');
define('RUTA_CARGOS_TROPA', RUTA_GESTOR_CARGOS.'/Tropa');
define('RUTA_CARGOS_COMUNIDAD', RUTA_GESTOR_CARGOS.'/Comunidad');
define('RUTA_CARGOS_CLAN', RUTA_GESTOR_CARGOS.'/Clan');
define('RUTA_JEFATURA', RUTA_GESTOR_CARGOS.'/Jefatura');
define('RUTA_CONSEJO', RUTA_GESTOR_CARGOS.'/Consejo');
define('RUTA_TESORERIA', RUTA_GESTOR_CARGOS.'/Tesoreria');
define('RUTA_ALMACEN', RUTA_GESTOR_CARGOS.'/Almacen');

//RUTAS DE PERFIL
define('RUTA_PERFIL' , SERVIDOR.'/Perfil');
define('RUTA_PERFIL_EDITAR' , RUTA_PERFIL.'/Editar');

//RUTAS DEL FORMULARIOS
define('RUTA_INFO_PERSONAL', RUTA_PERFIL_EDITAR.'#perfil');
define('RUTA_INFO_ACUDIENTES', RUTA_PERFIL_EDITAR.'#acudientes');
define('RUTA_INFO_HV', RUTA_PERFIL_EDITAR.'#hoja-vida');
define('RUTA_INFO_FM', RUTA_PERFIL_EDITAR.'#ficha-medica');

//RECURSOS
define('RUTA_CSS', SERVIDOR.'/Css/');
define('RUTA_JS', SERVIDOR.'/Js/');
define('RUTA_SCRIPT', SERVIDOR.'/Scripts/');
define('RUTA_ARCHIVOS', realpath(__DIR__."/.."));
?>