<?php

    namespace App\Controllers;
    
    class Login extends BaseController {

        //Atributo específico
        private $view = 'usuario/login-d';

        private function cargar_datos(){
            $datos = array();
            //Información general del sistema
            $datos['nombre_pagina'] = 'Login';

            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista = '', $contenido = array()){
            return view($nombre_vista, $contenido);
        }//end crear_vista

        //Función principal
        public function index(){
            return $this->crear_vista($this->view, $this->cargar_datos());
        }//end index
        
    public function existe_usuario(){
      dd("Validando credenciales..."); 

        $email = $this->request->getPost("correo_electronico");
        $password = $this->request->getPost("password");
         d($email);
        dd($password);

        //Instancia del Modelo
        $tabla_usuario = new \App\Models\Tabla_usuarios;
        
        //Query
        $usuario = $tabla_usuario->iniciar_sesion($email, hash("hash256", $password));
          d($usuario);

        if ($usuario->estatus_usuario == ESTATUS_DESHABILITADO) {
            crear_mensaje("Este usuario ha sido deshabilitado. Comunicate con el administrador", "Error", TOASTR_ERROR);
            return redirect()->route_to("administracion_acceso");    
        }
        //Variables de sesion
        $session = session();
        $session->set("sesion_iniciada", TRUE);
        $session->set("id_usuario", $usuario->id_usuario);
        $session->set("nombre_usuario", $usuario->nombre_usuario);
        $session->set("nombre_completo", $usuario->nombre_usuario." ".$usuario->ap_usuario." ".$usuario->am_usuario);
        $session->set("sexo_usuario", $usuario->sexo_usuario);
        $session->set("email_usuario", $usuario->email_usuario);
        $session->set("imagen_usuario", $usuario->imagen_usuario);
        $session->set("rol_actual", $usuario->id_rol);
        $session->set("tarea_actual", TAREA_DASHBOARD);
     

        
    }//existe_usuario


    }//end Login
