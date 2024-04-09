<?php

    function configurar_menu_panel($tarea_actual = ''){
        //Almacenar opciones dentro del menú
        $menu = array();
        
        //Permitir identificar las caracterísitcas de la opción
        $menu_opcion = array();

        //Permitir identificar las caracterísitcas de la subopción
        $menu_sub_opcion = array();

        //Tarea Dashboard
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($tarea_actual == TAREA_DASHBOARD) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to("administracion_dashboard");
        $menu_opcion['text'] = 'Dashboard';
        $menu_opcion['icon'] = 'fa fa-area-chart';
            $menu_opcion['submenu '] = array();
        $menu['dashboard'] = $menu_opcion;

        //Ejemplo con opciones
        $menu_opcion = array();
        $menu_opcion['is_active'] = FALSE;
        $menu_opcion['href'] = "#";
        $menu_opcion['text'] = 'Opcion B';
        $menu_opcion['icon'] = 'fa fa-battery-full';

            $menu_opcion['submenu'] = array();
                $menu_sub_opcion = array();
                $menu_sub_opcion['is_active'] = FALSE;
                $menu_sub_opcion['href'] = route_to("administracion_dashboard");
                $menu_sub_opcion['text'] = 'Opción B1';
                $menu_sub_opcion['icon'] = 'fa fa-battery-three-quarters';
            $menu_opcion['submenu']['opcionb1'] = $menu_sub_opcion;
    
            //$menu_opcion['submenu'] = array();
                $menu_sub_opcion = array();
                $menu_sub_opcion['is_active'] = FALSE;
                $menu_sub_opcion['href'] = route_to("administracion_dashboard");
                $menu_sub_opcion['text'] = 'Opción B2';
                $menu_sub_opcion['icon'] = 'fa fa-battery-half';
            $menu_opcion['submenu']['opcionb2'] = $menu_sub_opcion;
        $menu['opcionB'] = $menu_opcion;

        return $menu;
    }

    function crear_menu_panel($tarea_actual = ''){
        $menu = configurar_menu_panel($tarea_actual);
        $html = '
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu lateral</li>';
        
        foreach($menu as $opcion){
            if($opcion["href"] != "#"){
                $html .= '
                    <li class="nav-item">
                        <a href="'.$opcion["href"].'" class="nav-link '.(($opcion["is_active"] == TRUE) ? "active" : "" ).'">
                            <i class="'.$opcion["icon"].' nav-icon"></i>
                            <p>'.$opcion["text"].'</p>
                        </a>
                    </li>
                ';
            }
            else{
                $html .= '
                    <li class="nav-item">
                        <a href="#" class="nav-link '.(($opcion["is_active"] == TRUE) ? "active" : "" ).'">
                            <i class="nav-icon '.$opcion["icon"].'"></i>
                            <p>
                                '.$opcion["text"].'
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>';
                        
                if(sizeof($opcion["submenu"]) > 0){
                    $html .= '<ul class="nav nav-treeview">';
                    foreach ($opcion["submenu"] as $sub_opcion_menu){
                        $html .= '
                            <li class="nav-item">
                                <a href="#" class="nav-link '.(($sub_opcion_menu["is_active"] == TRUE) ? "active" : "" ).'">
                                    <i class="'.$sub_opcion_menu["icon"].' nav-icon"></i>
                                    <p>'.$sub_opcion_menu["text"].'</p>
                                </a>
                            </li>
                        ';
                    }
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }
    
