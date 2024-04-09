<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;

class Usuarios extends BaseController
{
    private $view = 'panel/Usuarios';
    private $session = NULL;
    private $permiso = TRUE;
    

    public function __construct(){
        //Instancia de la variable sesion
        $this->session = session();
        
        // Instancia del permisos helper
        helper("permisos_roles_helper");
        if(!acceso_usuario(TAREA_USUARIOS, $this->session->rol_actual)){
            $this->permiso = FALSE;
        }// end
       $this->session->tarea_actual = TAREA_USUARIOS; 
    }//end__construct

    private function cargar_datos()
    
    {
        $datos = array();

        //-----------------
        // Configuración básica
        //-----------------
        $datos['nombre_pagina'] = 'Usuarios | CI4Base';
        $datos['titulo_pagina'] = 'Usuarios';

        //INFORMACION DE INICIO DE SESION

        $datos["nombre_completo_usuario"] = $this->session->nombre_completo;
        $datos["nombre_usuario"] = ;$this->session->nombre_usuario;
         $datos["email_usuario"] = ;$this->session->email_completo;
         recursos_panel_IMG_PROFLES USER
        
        $datos["imagen_usuario"] =($this->session->imagen_usuario == NULL)

             ? ($this->session->sexo_usuario != MASCULINO) ? '' : '')
             : $this->session->imagen_usuario; 
                 
        
        

        //-----------------
        // Breadcrumb
        //-----------------
        $breadcrumb = array(
           // array(
            //    'href' => route_to("administracion_dashboard"),
             //   'titulo' => 'Usuarios',
           // ),
            array(
                'href' => '#',
                'titulo' => 'Usuarios',
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
        $contenido["menu_lateral"]=crear_menu_panel( $this->session->tarea_actual, $this->session->rol_actual);
        return view($nombre_vista, $contenido);
    }

    public function index(){
        if ($this->permiso) {
        return $this->crear_vista($this->view, $this->cargar_datos());    
        }//end if
        else {
            crear_mensaje("No tienes permisos para acceder a este modulo, contacte al Administrador", "Oppss!", TOASTR_WARNIGN);
            return redirect()->to(route_to("administracion_acceso"));
        }//
    }// end index
}end home
