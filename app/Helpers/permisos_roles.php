<?php
function acceso_usuario($tarea_actual = "", $rol_actual = ""){
$permiso = TRUE; 
 switch ($rol_actual) {
case ROL_ADMINISTRADOR["clave"]:
  $permiso = in_array($tarea_actual, PERMISOS_ADMINISTRADOR);
break;
  case ROL_OPERADOR["clave"]:
  $permiso = in_array($tarea_actual, PERMISOS_ADMINISTRADOR);
break;
  
default:
  $permiso = FALSE;
break;

 }
return $permiso;
}// end_acceso_usuario
