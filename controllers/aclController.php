<?php

class aclController extends Controller {
    
    private $_aclm;
    
    public function __construct() {
        parent::__construct();
        $this->_aclm =  $this->loadModel('acl');
    }
    
    public function index(){
        
        $this->_view->assign('titulo', 'Listas de acceso');
        $this->_view->renderizar('index');
    }
    
    public function roles(){
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('ver_roles');
        
        $this->_view->assign('titulo', 'Administración de roles');
        $this->_view->assign('roles', $this->_aclm->getRoles());
        $this->_view->renderizar('roles');
    }
    
     public function nuevo_role(){
         
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('crear_role');
        
        $this->_view->assign('titulo', 'Nuevo Role');//para ir sobreescribiendo el titulo 
        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getSql('role')){
                $this->_view->assign('_error', 'Debe introducir el nombre del role');
                $this->_view->renderizar('nuevo_role', 'acl');
                exit;
            }
            
            $this->_aclm->insertarRole($this->getSql('role'));
            $this->redireccionar('acl/roles');
        }
        
        $this->_view->renderizar('nuevo_role', 'acl');
    }
    
    public function permisos_role($roleID){
        //reliza todo el proceso de administración del registro permisos_role
        //
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('editar_perm_role');
        
        $id = $this->filtrarInt($roleID);        
        if(!$id){
            $this->redireccionar('acl/roles');
        }
        
        $row = $this->_aclm->getRole($id);        
        if(!$row){
            $this->redireccionar('acl/roles');
        }
        
        $this->_view->assign('titulo', 'Administración de permisos role');
        
        if($this->getInt('guardar') == 1){
            $values = array_keys($_POST);
            $replace = array();
            $eliminar = array();
            
            for($i = 0; $i < count($values); $i++){
                if(substr($values[$i],0,5) == 'perm_'){// extrae le prefijo perm_ , extrae los primeros 5 caracteres y si es igual a perm_
                   $permiso = (strlen($values[$i]) - 5);
                    
                    if($_POST[$values[$i]] == 'x'){//el permiso está ignorado
                        $eliminar[] = array(                          
                            'permiso' => substr($values[$i], - $permiso),//toma el último caracter de la cadena(en este caso el Id_perm que va después del prefijo)
                            'role' => $id
                        );
                    }else{
                        if($_POST[$values[$i]] == 1){
                            $v = 1;
                        }else{
                            $v = 0;
                        }
                        
                        $replace[] = array(
                            'permiso' => substr($values[$i], - $permiso),                            
                            'valor' => $v,
                            'role' => $id//role contiene a $id = Id_role
                        );
                    }
                }
            }
            
            for($i =0; $i < count($eliminar); $i++){
                $this->_aclm->eliminarPermisoRole(
                        $eliminar[$i]['role'],
                        $eliminar[$i]['permiso']);
            }
            
             for($i =0; $i < count($replace); $i++){
                $this->_aclm->editarPermisoRole(
                        $replace[$i]['role'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        
        $this->_view->assign('roles', $row);
        $this->_view->assign('permisos', $this->_aclm->getPermisosRole($id));
        $this->_view->renderizar('permisos_role');
    }
    
    public function editar_role($id){
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('editar_role');
        
        $this->_view->assign('titulo', 'Editar Role');
        
        if(!$this->filtrarInt($id)){
            $this->redireccionar('roles');
        }
        
        if(!$this->_aclm->getRole($this->filtrarInt($id))){// si no devuele un post es porque no existe y redirecciona a post
            $this->redireccionar('roles');
        }
        
        //$this->_view->assign('titulo', 'Editar Permiso');
        $this->_view->setJs(array('edit_role'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getTexto('nom_role')){
                $this->_view->assign('_error', 'Debe introducir el nombre del role');
                $this->_view->renderizar('editar_role', 'acl');
                exit;
            }
            
            $this->_aclm->editarRole(
                    $this->filtrarInt($id),
                    $this->getPostParam('nom_role')
            );
            
            $this->redireccionar('acl/roles');
        }
        
        $this->_view->assign('datos', $this->_aclm->getRole($this->filtrarInt($id)));
        $this->_view->renderizar('editar_role', 'acl');
    }

//------------------------------------------------------------------------------
    public function permisos(){
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('ver_perm');
            
        $this->_view->assign('titulo', 'Administración de permisos');
        $this->_view->assign('permisos', $this->_aclm->getPermisos());
        $this->_view->renderizar('permisos', 'acl');
    }
    
    public function nuevo_permiso(){
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('crear_perm');
        
        $this->_view->assign('titulo', 'Nuevo Permiso');//para ir sobreescribiendo el titulo 
        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getSql('nom_perm')){
                $this->_view->assign('_error', 'Debe introducir el nombre del permiso');
                $this->_view->renderizar('nuevo_permiso', 'acl');
                exit;
            }
            
            if(!$this->getSql('key_perm')){
                $this->_view->assign('_error', 'Debe introducir la key del permiso');
                $this->_view->renderizar('nuevo_permiso', 'acl');
                exit;
            }
            
            $this->_aclm->insertarPermiso(
                    $this->getSql('nom_perm'),
                    $this->getSql('key_perm')
                    );
            
            $this->redireccionar('acl/permisos');
        }
        
        $this->_view->renderizar('nuevo_permiso', 'acl');
    }
    
    public function editar_permiso($id){
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('editar_perm');
        
        $this->_view->assign('titulo', 'Editar Permiso');
        
        if(!$this->filtrarInt($id)){
            $this->redireccionar('permisos');
        }
        
        if(!$this->_aclm->getPermiso($this->filtrarInt($id))){// si no devuele un post es porque no existe y redirecciona a post
            $this->redireccionar('permisos');
        }
        
        $this->_view->assign('titulo', 'Editar Permiso');
        $this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getTexto('nom_perm')){
                $this->_view->assign('_error', 'Debe introducir el nombre del permiso');
                $this->_view->renderizar('editar_permiso', 'acl');
                exit;
            }
            
            if(!$this->getTexto('key_perm')){
                $this->_view->assign('_error', 'Debe introducir el key del permiso');
                $this->_view->renderizar('editar_permiso', 'acl');
                exit;
            }
            
            $this->_aclm->editarPermiso(
                    $this->filtrarInt($id),
                    $this->getPostParam('nom_perm'),
                    $this->getPostParam('key_perm')
            );
            
            $this->redireccionar('acl/permisos');
        }
        
        $this->_view->assign('datos', $this->_aclm->getPermiso($this->filtrarInt($id)));
        $this->_view->renderizar('editar_permiso', 'acl');
    }
}
?>
