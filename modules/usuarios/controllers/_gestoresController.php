<?php

class gestoresController extends usuariosController {
    
    private $_gestores;
    
    public function __construct() {
        parent::__construct();
        $this->_gestores =  $this->loadModel('gestores');
    }
    
    public function index(){
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('ver_operador');
        
        $this->_view->assign('titulo', 'Lista gestores');
        
        $this->getLibrary('paginador');
        $pag1 = new Paginador();        
        $pagina1 = false;        
        if($_POST){
            $this->_view->assign('_datos', $_POST);
            $pagina1 = $this->getInt('pagina1');
        }
        
        $row = $this->_gestores->getGestores();
        for ($i = 0; $i < count($row); $i++) {
            $row[$i]['Id_encrypt'] = $this->encrypt($row[$i]['Id_usu']);
            $row[$i]['Posee_cli'] = $this->_gestores->verSiPoseeCli($row[$i]['Id_usu']);
        }
        $this->_view->setJs(array('example'));        
        $this->_view->assign('color', '#F5FFFA');        
        $this->_view->assign('gestores', $pag1->paginar($row, $pagina1, 30));
        $this->_view->assign('paginacion1', $pag1->getView('example1'));

      $this->_view->renderizar('index','gestores');
    }
    
    public function newGestor() {
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('crear_operador');
        
        $this->_view->assign('titulo', 'Registro');

        $this->_view->assign('per', $this->_gestores->getAllPerGest());
        $this->_view->assign('role', $this->_gestores->getAllRolesGest());            
        $this->_view->assign('estusu', $this->_gestores->getAllEstGest());
        
        $this->_view->setJs(array('fun')); 
        
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getPostParam('rut')){
                $this->_view->assign('_error', 'Debe ingresar RUN');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            if(!$this->getSql('nombre')){
                $this->_view->assign('_error', 'Debe introducir su nombre');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            if(!$this->getAlphaNum('usuario')){
                $this->_view->assign('_error', 'Debe introducir su nombre usuario');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            if($this->_gestores->verificarUsuarioGestor($this->getAlphaNum('usuario'))){
                $this->_view->assign('_error', 'El usuario ' . $this->getAlphaNum('usuario') . ' ya existe');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            if($this->_gestores->verificarEmailGestor($this->getPostParam('email'))){
                $this->_view->assign('_error', 'El email ' . $this->getAlphaNum('email') . ' ya se encuentra registrado');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            if($this->getPostParam('pass') != $this->getPostParam('confirmar')){
                $this->_view->assign('_error', 'Los passwords no coinciden');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            if(!$this->getSql('per')){
                $this->_view->assign('_error', 'Debe seleccionar la persona para el usuario');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            if(!$this->getSql('role')){
                $this->_view->assign('_error', 'Debe seleccionar el role del usuario');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            
            $this->getLibrary('class.phpmailer');
            $mail = new PHPMailer();
            
            $this->_gestores->registrarUsuarioGestor(
                    $this->getPostParam('rut'),                    
                    $this->getSql('nombre'),
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass'),
                    $this->getPostParam('email'),
                    $this->getSql('role'),
                    $this->getSql('estusu'),                    
                    $this->getSql('per')
                    );
            
            $usuario = $this->_gestores->verificarUsuarioGestor($this->getAlphaNum('usuario'));
            
            if(!$usuario){
                $this->_view->assign('_error', 'Error al registrar el usuario');
                $this->_view->renderizar('index', 'gestores');
                exit;
            }
            
            //Para usar Gmail como emisor
//            $mail->IsSMTP();
//            $mail->SMTPAuth = true;
//            $mail->Host = "mail.ddmdatos.cl"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
//            $mail->Username = "info@ddmdatos.cl"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
//            $mail->Password = "ddminfodatos"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
//            $mail->Port = 465; // Puerto de conexión al servidor de envio 465 
//            $mail->SMTPSecure = 'tls'; //seguridad TLS
            
            $mail->From = 'info@ddmdatos.cl';
            $mail->FromName = 'Admin web';
            $mail->Subject = 'Activacion de cuenta de usuario';
            $mail->Body = 'Hola <strong>'. $this->getSql('nombre') . '</strong>,' .
                    '<p>Se ha registrado su cuenta en nuestro sistema'.
                    'su cuenta haga click en el siguiente enlace:<br>'.
                    '<a href="'. BASE_URL.'usuarios/gestores/activar/'.
                    $usuario['Id_usu'].'/'. $usuario['Cod_usu'].'">Activar cuenta aquí</a>';
            $mail->AltBody = 'Su servidor de correo no soporta HTML';
            $mail->AddAddress($this->getPostParam('email'));
            $mail->Send();
            
            if(!$mail­>Send()) {
                echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
            } else {
                echo "Mensaje enviado!!";
            } 
            
            $this->_view->assign('datos', false);//luego de completado se vacien los campos
            
            if(Session::get('level') == 1){
                Session::setMensaje("Usuario registrado correctamente, sugerir revisar email.");
                $this->redireccionar('usuarios');
                exit;
            }else{
                Session::setMensaje("Registro Completado.");
                $this->redireccionar('index');
                exit;
            }
        }
        
        $this->_view->renderizar('nuevo', 'gestores');
    }
    
    public function activar($id, $codigo){
        
        if(!$this->filtrarInt($id) || !$this->filtrarInt($codigo)){
            $this->_view->assign('_error', 'Esta cuenta no existe');
            $this->_view->renderizar('activar', 'gestores'); 
            exit;
        }
        $row1 = $this->_gestores->getUsuarioGestor(
                        $this->filtrarInt($id),
                        $this->filtrarInt($codigo)
                        );
        
        if(!$row1){
            $this->_view->assign('_error', 'Esta cuenta no existe');
            $this->_view->renderizar('activar', 'gestores'); 
            exit;
        }
        
        if($row1['Id_activar'] == 1){
            $this->_view->assign('_error', 'Esta cuenta ya ha sido activada');
            $this->_view->renderizar('activar', 'gestores'); 
            exit;
        }
        
        $this->_gestores->activarGestor(
                    $this->filtrarInt($id),
                    $this->filtrarInt($codigo)
                );
        
        $row2 = $this->_gestores->getUsuarioGestor(
                            $this->filtrarInt($id),
                            $this->filtrarInt($codigo)
                            );

        if($row2['Id_activar'] != 1){
            $this->_view->assign('_error', 'Error al activar la cuenta, por favor intente mas tarde');
            $this->_view->renderizar('activar', 'gestores'); 
            exit;
        }
        
        $this->_view->assign('_mensaje', 'Su cuenta ha sido activada');
         $this->_view->renderizar('activar', 'gestores'); 
    }
    
    public function permisosGestor($usuarioID){
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('editar_perm_operador');
        
        $id = $this->decrypt($usuarioID);
        //$id = $this->filtrarInt($usuarioID);
        
        if(!$id){
            Session::setMensaje("Operador no existe");
            $this->redireccionar('usuarios/gestores');
            exit;
        }
        
        if($this->getInt('guardar') == 1){
            $values = array_keys($_POST);//tomas los key's del POST
            $replace = array();
            $eliminar = array();
            
            for($i = 0; $i < count($values); $i++){
                if(substr($values[$i],0,5) == 'perm_'){// extrae le prefijo perm_ , extrae los primeros 5 caracteres y si es igual a perm_
                    $permiso = (strlen($values[$i]) - 5);//para tomar los 2 últimos valores del prefijo
                    
                    if($_POST[$values[$i]] == 'x'){//el permiso está heredado del role y no ignorado
                        $eliminar[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], - $permiso)//toma los 2 últimos caracteres de la cadena(en este caso el Id_perm que va después del prefijo) quiere decir que si enviamos "perm_12"
                        );
                    }else{
                        if($_POST[$values[$i]] == 1){//permisos_usuario existirá un valor 1 o 0
                            $v = 1;
                        }else{
                            $v = 0;
                        }
                        
                        $replace[] = array(
                            'permiso' => substr($values[$i], - $permiso),//toma los 2 últimos caracteres de la cadena
                            'valor' => $v,
                            'usuario' => $id//role contiene a $id = Id_role                            
                            
                        );
                    }
                }
            }
            
            for($i =0; $i < count($eliminar); $i++){
                $this->_gestores->eliminarPermisoGestor(
                        $eliminar[$i]['usuario'],
                        $eliminar[$i]['permiso']);
            }
            
             for($i =0; $i < count($replace); $i++){
                $this->_gestores->editarPermisoGestor(
                        $replace[$i]['usuario'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        
        $permisosUsuario = $this->_gestores->getPermisosUsuarioGestor($id);
        $permisosRole = $this->_gestores->getPermisosRoleGestor($id);

        if(!$permisosUsuario || !$permisosRole){
            Session::setMensaje("Posee un error la información del operador");
            $this->redireccionar('usuarios/gestores');
            exit;
        }
        
        $this->_view->assign('titulo', 'Permisos del operador');
        $this->_view->assign('permisos', array_keys($permisosUsuario));//enviamos los usuarios
        $this->_view->assign('usuario', $permisosUsuario);
        $this->_view->assign('role', $permisosRole);
        $this->_view->assign('info', $this->_gestores->getDatosUsuarioGestor($id));//devuelve el Nom_usu y Nom_role asociado a ese usuario
        
        $this->_view->renderizar('permisos', 'gestores');
    }
    
    public function editUsuGestor($idusu = false){
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('editar_operador');
        
        $id = $this->decrypt($idusu);
        
        if(!$id){
            Session::setMensaje("Colaborador no existe");
            $this->redireccionar('usuarios/gestores');
            exit;
        }
        
        $this->_view->assign('titulo', 'Edición del operador');     
        
        $row = $this->_gestores->getDatosUsuGestor($id);
        $this->_view->assign('per', $this->_gestores->getAllPerGest());
        $this->_view->assign('role', $this->_gestores->getAllRolesGest());            
        $this->_view->assign('estusu', $this->_gestores->getAllEstGest());        

        $this->_view->assign('datos', $row);
        
        if($this->getPostParam('guardar') == 1){
            $this->_view->assign('datos1', $_POST);
            
            if(!$this->getPostParam('rut')){
                $this->_view->assign('_error', 'Debe introducir Rut del operador');
                $this->_view->renderizar('edit', 'gestores');
                exit;
            }
            if(!$this->getSql('nom')){
                $this->_view->assign('_error', 'Debe introducir nombre personal del operador');
                $this->_view->renderizar('edit', 'gestores');
                exit;
            }
            if(!$this->getSql('usu')){
                $this->_view->assign('_error', 'Debe introducir un nombre de usuario para el operador');
                $this->_view->renderizar('edit', 'gestores');
                exit;
            }
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Si desea editar debe introducir una nueva contraseña');
                $this->_view->renderizar('edit', 'gestores');
                exit;
            }  
            if(!$this->getPostParam('email')){
                $this->_view->assign('_error', 'Si desea editar debe introducir un email');
                $this->_view->renderizar('edit', 'gestores');
                exit;
            }  
            if(!$this->getSql('per')){
                $this->_view->assign('_error', 'Debe seleccionar una persona para la cuenta');
                $this->_view->renderizar('edit', 'gestores');
                exit;
            }
            if(!$this->getSql('role')){
                $this->_view->assign('_error', 'Debe seleccionar el rol');
                $this->_view->renderizar('edit', 'gestores');
                exit;
            }
            if(!$this->getSql('est')){
                $this->_view->assign('_error', 'Debe seleccionar un estado (activado/desactivado)');
                $this->_view->renderizar('edit', 'gestores');
                exit;
            }
            $this->_gestores->editUsuGestor(
                    $this->getPostParam('id'),
                    $this->getPostParam('rut'),
                    $this->getSql('nom'),
                    $this->getSql('usu'),                    
                    $this->getSql('pass'),
                    $this->getPostParam('email'),
                    $this->getSql('role'),
                    $this->getSql('est'),
                    $this->getSql('per')
                    );
            Session::setMensaje("Se ha editado correctamente los datos del operador");
            $this->redireccionar('usuarios/gestores');
            exit;
        }
        
        $this->_view->renderizar('edit', 'gestores');
    }
    
    public function elimGestor($idusu = false) {
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        $this->_acl->acceso('elim_operador');
        
        $id = $this->decrypt($idusu);
        
        if(!$id){
            Session::setMensaje("Operador no existe");
            $this->redireccionar('usuarios/gestores');
            exit;
        }
        
        $this->_gestores->elimUsuGestor($id);
        
        Session::setMensaje("Se ha eliminado correctamente el gestor");
        $this->redireccionar('usuarios/gestores');
        exit;
    }
}
?>
