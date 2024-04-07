<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    private $view = 'panel/dashboard';
    private $session = NULL;
    private $permiso = TRUE;

    public function __construct(){
        //Instancia de la variable sesion
        $this->session = session();
        
    }//end__construct

    private function cargar_datos()
    
    {
        $datos = array();

        //-----------------
        // Configuración básica
        //-----------------
        $datos['nombre_pagina'] = 'Dashboard | CI4Base';
        $datos['titulo_pagina'] = 'Dashboard';

        //INFORMACION DE INICIO DE SESION

        $datos["nombre_completo_usuario"] = $this->session->nombre_completo;
        $datos["nombre_usuario"] = ;$this->session->nombre_usuario;
         $datos["email_usuario"] = ;$this->session->nombre_completo;
         $datos["imagen_usuario"] = ;$this->session->nombre_completo;
        

        //-----------------
        // Breadcrumb
        //-----------------
        $breadcrumb = array(
            array(
                'href' => route_to("administracion_dashboard"),
                'titulo' => 'Usuarios',
            ),
            array(
                'href' => '#',
                'titulo' => 'Usuario Nuevo',
            )
        );
        
        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo_pagina'], $breadcrumb);
        //-----------------
        // Peticiones SQL
        //-----------------

        return $datos;
    }

    private function crear_vista($nombre_vista = '', $contenido = array())
    {
        $contenido["menu_lateral"]=crear_menu_panel();
        return view($nombre_vista, $contenido);
    }

    public function index()
    {
        return $this->crear_vista($this->view, $this->cargar_datos());
    }
}
