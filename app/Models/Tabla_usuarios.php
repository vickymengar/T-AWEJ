<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Tabla_usuarios  extends Model {
        protected $table = 'usuarios';
        protected $primarykey = 'id_usuario';
        protected $returntype = 'object';
        protected $allowedFields = [
                                    'estatus_usuario','id_usuario','nombre_usuario','ap_usuario','am_usuario',
                                    'sexo_usuario','email_usuario','password_usuario','imagen_usuario','id_rol'
                                    ];

        //#########################
        // Consultas específicas o básicas
        //Create Read Update Delete
        //#########################
        public function create_data($data = array()) {
            if (!empty($data)) {
                $this
                    ->table($this->table)
                    ->insert($data);
            }//end if
            else{
                return FALSE;
            }//end else
        }//end create_data
        
        public function get_user($contraints = array()){
            return $this
                ->table($this->table)
                ->where($contraints)
                ->get()
                ->getRow();
        }//get_user

        public function get_table(){
            return $this
                ->table($this->table)
                ->get()
                ->getResult();
        }//get_table

        public function update_data($id = 0, $data = array()){
            if (!empty($data)) {
                return $this
                    ->table($this->table)
                    ->where([$this->primarykey => $id])
                    ->set($data)
                    ->update();
            }
            else{
                return FALSE;
            }
        }//update_data

        //Specific Queries
        public function iniciar_sesion($email = "", $password = ""){
            if ($email != NULL && $password != NULL ) { 
              return $this
                ->table($this->table)
                  ->select("
                  usuarios.id_usuario, estatus_usuario, usuarios.id_usuario, usuarios.nombre_usuario,
                  usuarios.ap_usuario, usuarios.am_usuario, usuarios.sexo_usuario,
                  usuarios.email_usuario, usuarios.password_usuario,
                  usuarios.imagen_usuario, roles.id_rol, roles.rol")
                  -> 
                  
                  ;
            }//end
            else{
             return FALSE;   
            }//end else
            
        }
    } //end Tabla_usuarios

    
