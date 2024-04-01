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



    }//end Login