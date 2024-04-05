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

        if ($usuario->estatus_usuario == ) {
            
        }
        

        dd($usuario);

        
    }//existe_usuario


    }//end Login
