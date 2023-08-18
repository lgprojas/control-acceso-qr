<?php

abstract class Controller{
    
    protected $_view;
    protected $_acl;
    protected $_request;
    protected $_menu;


    public function __construct() {
        $this->_acl = new ACL();
        $this->_request = new Request();
        $this->_view = new View($this->_request, $this->_acl);
        $this->_menu = new Menu();
    }

    abstract public function index();
    
    protected function loadModel($modelo, $modulo = false){
        //realiza la llamada al modelo con require_once en true
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';
        
        //verificar si estamos trabajando en base a un módulo o controlador directo
        if(!$modulo){
            $modulo = $this->_request->getModulo();
        }
        
        if($modulo){
            if($modulo !=  'default'){//default lo vamos a utilizar para modelos directos
                
                $rutaModelo = ROOT . 'modules' . DS . $modulo . DS . 'models' . DS . $modelo . '.php';
            }
        }
        
        if(is_readable($rutaModelo)){//se revisa la ruta si existe*
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }else{
            throw new Exception('Error de modelo');
        }
        
    }
    
    protected function getLibrary($libreria){
        //realiza llamadas a las librerias
        //Si la ruta es más larga debe usar \
        
       $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }else{
            throw new Exception('Error de librería');
        }
    }
    //filtra signos
    protected function getTexto($clave){
        
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        return '';//retorna cadena vacia
    }
    //filtra enteros
    protected function getInt($clave){
        
         if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        return 0;//retorna cero
    }
    
    protected function redireccionar($ruta = false){
        //redirecciona a otro lugar
        
        if ($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }else{
            header('location:' . BASE_URL);
            exit;
        }
                
    }
    
    protected function filtrarInt($int){
        //transforma a entero
        $int = (int) $int;
        
        if(is_int($int)){
            
            return $int;
        }else{
            return 0;//si no es entero retorna cero
        }
    }
    
    protected function getPostParam($clave){
        //verifica si es post
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }
    
    protected function delPostParam($clave){
        //verifica si es post
        if(isset($_POST[$clave])){
            unset($clave);
            return $clave;
        }
    }
    
     protected function getSql($clave){//    (para sanitizar el nombre de usuario)
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);//limpia los strip_tags
            
            if(!get_magic_quotes_gpc()){
                //$_POST[$clave] = mysql_real_escape_string($_POST[$clave], mysql_connect(DB_HOST, DB_USER, DB_PASS));//le pasa el mysql_ a las inyeccionesSQL
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
                $_POST[$clave] = mysqli_real_escape_string($conn, $_POST[$clave]);
            }
            
            return trim($_POST[$clave]);
        }
    }
    
    protected function getAlphaNum($clave){ //hace un parce a string, hace un reemplazo de todos los caracteres que sean diferentes
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_-]/i', '', $_POST[$clave]);//acepta sólo caracteres A-Z y 0-9 y _ y - (para sanitizar el nombre de usuario)
            return trim($_POST[$clave]);
        }
        
    }
    
    protected function getNumPatente($clave){ //hace un parce a string, hace un reemplazo de todos los caracteres que sean diferentes
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_-]/i', '', $_POST[$clave]);//acepta sólo caracteres A-Z y 0-9 (para sanitizar la patente)
            return trim($_POST[$clave]);
        }
        
    }
    
    //Validadores de RUN
    protected function getRUNPuntosYGuion($clave){ //hace un parce a string, hace un reemplazo de todos los caracteres que sean diferentes
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^0-9-kK.]/i', '', $_POST[$clave]);//acepta sólo caracteres A-Z y 0-9 y _ y - (para sanitizar el nombre de usuario)
            return trim($_POST[$clave]);
        }
        
    }
    
    protected function poseeDosPuntosYUnGuion($valor) {
        $rut = $valor;
        $puntos = substr_count($rut, '.');
        $guion = substr_count($rut, '-');

        if($puntos == 2 && $guion == 1){
            return trim($rut);
        }else{
            return false;
        }
    }
    
    protected function quitarPuntosRUN($valor) {
        $rut = $this->poseeDosPuntosYUnGuion($valor);
        $sinPuntos = str_replace('.', '', $rut);

        $newrun = substr_count($sinPuntos, '.');
        
        if($newrun > 0){
            return false;
        }else{
            return trim($sinPuntos);
        }
    }
    //Validadores de RUN
    
    protected function validarEmail($email){
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }
    
    protected function formatPermiso($clave){
        
         if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
         }
    }
    
    protected function getRut($rut){
        
        $pattern="/^0*(\d{1,3}(\.?\d{3})*)\-?([\dkK])$/";
        if(preg_match($pattern,$rut))
            return $rut;
        return false;    
    }
    
    protected function formatDate($date){
        //retorna formato año-mes-día        
        list($dia, $mes, $year) = explode('-',$date);
        $val = $year."-".$mes."-".$dia;  
            return $val;               
    }
    
    protected function formatDateTimeSave($dateTime) {
        //recibe  d-m-Y H:i
        //retorna Y-m-d H:i:s
        $myDateTime = DateTime::createFromFormat('d-m-Y H:i:s', $dateTime);
        $newDateString = $myDateTime->format('Y-m-d H:i:s');
        
        return $newDateString;
    }
    
    protected function formatDateTimeShow($dateTime) {
        //recibe   Y-m-d H:i:s
        //retorna  d-m-Y H:i:s
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        $newDateString = $myDateTime->format('d-m-Y H:i:s');
        
        return $newDateString;
    }
    
    protected function formatTimeDateShow($dateTime) {
        //recibe   Y-m-d H:i:s
        //retorna  H:i:s d-m-Y 
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        $newDateString = $myDateTime->format('H:i:s d-m-Y');
        
        return $newDateString;
    }
    
    protected function formatDateTimeOnlyDate($dateTime) {
        //recibe   Y-m-d H:i:s
        //retorna  H:i:s d-m-Y 
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        $newDateString = $myDateTime->format('d-m-Y');
        
        return $newDateString;
    }
    
    protected function formatDateTimeOnlyTime($dateTime) {
        //recibe   Y-m-d H:i:s
        //retorna  H:i:s d-m-Y 
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        $newDateString = $myDateTime->format('H:i:s');
        
        return $newDateString;
    }
    
    protected  function validarExtensionImage($image){
        //retorna la extensión si la extensión es JPG, PNG o JPEG
        //$info = new SplFileInfo($image);
        $trozos = explode(".", $image); 
        $extension = end($trozos); 
        if(strtolower($extension) == 'jpg' || 
           strtolower($extension) == 'jpeg' ||
           strtolower($extension) == 'png'
            ){
            return strtolower($extension);
            }
            return false;
    }
    
    protected  function validarExtensionFileJuridico($file){
        //retorna la extensión si la extensión es PDF, DOC, DOCX
        //$info = new SplFileInfo($image);
        $trozos = explode(".", $file); 
        $extension = end($trozos); 
        if(strtolower($extension) == 'jpg' || 
           strtolower($extension) == 'jpeg' ||
           strtolower($extension) == 'png' ||
           strtolower($extension) == 'doc' || 
           strtolower($extension) == 'docx' ||
           strtolower($extension) == 'pdf' || 
           strtolower($extension) == 'xls' ||
           strtolower($extension) == 'xlsx'
            ){
            return strtolower($extension);
            }
            return false;
    }
    
    protected  function validarExtensionFile($file){
        //retorna la extensión si la extensión es PDF, DOC, DOCX
        $trozos = explode(".", $file); 
        $extension = end($trozos); 

        if(strtolower($extension) == 'pdf' || 
           strtolower($extension) == 'doc' ||
           strtolower($extension) == 'docx'
            ){
            return strtolower($extension);
            }
            return false;
    }
    
    protected  function validarExtFileImportXLSX($file){
        //retorna la extensión si la extensión es XLSX XLS
        $trozos = explode(".", $file); 
        $extension = end($trozos); 

        if(strtolower($extension) == 'xlsx' || 
           strtolower($extension) == 'xls'
            ){
            return strtolower($extension);
            }
            return false;
    }
    
    protected function filtrarNombre($filename, $cod=false){
        //rellena espacios y concatena concatena cod al nombre del file
        $cadena = str_replace(" ","-",$filename);
        //echo $resultado;exit;
        if (!strpos($cadena, " ")) {
            
            if($cod != false){
                $info = pathinfo($cadena);
                $resultado = $info["filename"]."_".$cod.".".$info["extension"];
                return $resultado;
            }else{
                return $cadena;
            }
        }
            return false;        
    }

    protected function createThumb($rtOriginal, $extension, $altoimg, $anchoimg, $rtDestino){
        
            $ext = strtolower($extension);
            //print_r($extension);exit;
            if($ext=="jpeg" || $ext=="jpg"){
                $original = @imagecreatefromjpeg($rtOriginal);
            } elseif($ext=="png"){
                $original = @imagecreatefrompng($rtOriginal);
            } elseif($ext=="gif") {
                $original = @imagecreatefromgif($rtOriginal);
            }

        //Definir tamaño máximo y mínimo
        $max_ancho = $anchoimg;
        $max_alto = $altoimg;

        //Recoger ancho y alto de la original
        list($ancho,$alto)=getimagesize($rtOriginal);

        //Calcular proporción ancho y alto
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;

            if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
            //Si es más pequeña que el máximo no redimensionamos
                $ancho_final = $ancho;
                $alto_final = $alto;
            }

            //si no calculamos si es más alta o más ancha y redimensionamos
            elseif (($x_ratio * $alto) < $max_alto){
                $alto_final = ceil($x_ratio * $alto);
                $ancho_final = $max_ancho;
            }
            else{
                $ancho_final = ceil($y_ratio * $ancho);
                $alto_final = $max_alto;
            }

    //Crear lienzo en blanco con proporciones
$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

    if($ext=="png" || $ext=="gif") {
        //echo "es PNG o GIF";exit;
        if($ext=="png") {
            //echo "es PNG";exit;
            imagealphablending($lienzo, false);
            //$colorTransparent = imagecolorallocatealpha($lienzo, 0, 0, 0, 127);
            //imagefill($lienzo, 0, 0, $colorTransparent);
            //imagesavealpha($lienzo, true);
            
            $colorTransparancia=imagecolortransparent($original);
            
            //$colorTransparancia=imagecolortransparent($original);// devuelve el color usado como transparencia o -1 si no tiene transparencias
            if($colorTransparancia != -1){ //TIENE TRANSPARENCIA
                $colorTransparente = imagecolorsforindex($original, $colorTransparancia); //devuelve un array con las componentes de lso colores RGB + alpha
                $idColorTransparente = imagecolorallocatealpha($lienzo, $colorTransparente['red'], $colorTransparente['green'], $colorTransparente['blue']); // Asigna un color en una imagen retorna identificador de color o FALSO o -1 apartir de la version 5.1.3
                imagefill($lienzo, 0, 0, $idColorTransparente);// rellena de color desde una cordenada, en este caso todo rellenado del color que se definira como transparente
                imagecolortransparent($lienzo, $idColorTransparente); //Ahora definimos que en el nueva imagen el color transparente será el que hemos pintado el fondo.
            }
            imagesavealpha($lienzo, true);
        } elseif($ext=="gif") {
            //echo "es GIF";exit;
            $trnprt_indx = imagecolortransparent($original);
            if ($trnprt_indx >= 0) {
                //its transparent
                $trnprt_color = imagecolorsforindex($original, $trnprt_indx);
                $trnprt_indx = imagecolorallocate($lienzo, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                imagefill($lienzo, 0, 0, $trnprt_indx);
                imagecolortransparent($lienzo, $trnprt_indx);
            }
        }
    } 

//Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final,$alto_final,$ancho,$alto);

imagedestroy($original);
    //Se crea la imagen final en el directorio indicado
        if($ext=="jpeg" || $ext=="jpg"){
            $cal=90;
            imagejpeg($lienzo,$rtDestino,$cal);
        } elseif($ext=="png"){
            imagepng($lienzo,$rtDestino,$cal);
        } elseif($ext=="gif") {
            imagegif($lienzo,$rtDestino,$cal);
        }
        imagedestroy($lienzo);
}
    
    protected function filCad($cadena){
       
    //compruebo que los caracteres sean los permitidos
       $permitidos = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789 ";

       for ($i=0; $i<strlen($cadena); $i++){
          if (strpos($permitidos, substr($cadena, $i, 1))===false){
             return false;
          }
       }
       return $cadena;
    }
    
    protected function urls_amigables($valor, $url) {

    // Tranformamos todo a minusculas

    $url = strtolower($url);

    //Rememplazamos caracteres especiales latinos

    $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

    $repl = array('a', 'e', 'i', 'o', 'u', 'n');

    $url = str_replace ($find, $repl, $url);

    // Añaadimos los guiones

    $find = array(' ', '&', '\r\n', '\n', '+');
    $url = str_replace ($find, '-', $url);

    // Eliminamos y Reemplazamos demás caracteres especiales

    $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

    $repl = array('', '-', '');

    $url = preg_replace ($find, $repl, $url);

    return $url;

    }
    
    protected function encrypt ($var) {        
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'munku';
        $secret_iv = 'walki';

        $key = hash('sha256', $secret_key);   
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

            $output = openssl_encrypt($var, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);

            return $output;
    }
 
    protected function decrypt ($var) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'munku';
        $secret_iv = 'walki';

        $key = hash('sha256', $secret_key);    
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $des = openssl_decrypt(base64_decode($var), $encrypt_method, $key, 0, $iv);

        return $des;
    }
    
    protected function filtraSaltos($cadena){
        settype($cadena, 'string');
        //$order   = array('\\r\\n');
        $result = str_replace('\\r\\n', '<br/>', $cadena); 
        return $result;
    }
    
    //--------------------------------------------------------------------------
    public function numtoletras($xcifra,$formato=0){ 

        $xarray = array(0 => "Cero",
        1 => "Un", "Dos", "Tres", "Cuatro", "Cinco", "Seis", "Siete", "Ocho", "Nueve", 
        "Diez", "Once", "Doce", "Trece", "Catorce", "Quince", "Dieciseis", "Diecisiete", "Dieciocho", "Diecinueve", 
        "Veinti", 30 => "Treinta", 40 => "Cuarenta", 50 => "Cincuenta", 60 => "Sesenta", 70 => "Setenta", 80 => "Ochenta", 90 => "Noventa", 
        100 => "Ciento", 200 => "Doscientos", 300 => "Trescientos", 400 => "Cuatrocientos", 500 => "Quinientos", 600 => "Seiscientos", 700 => "Setecientos", 800 => "Ochocientos", 900 => "Novecientos"
        );
        //
        $xcifra = trim($xcifra);
        $xlength = strlen($xcifra);
        $xpos_punto = strpos($xcifra, ".");
        $xaux_int = $xcifra;
        $xdecimales = "00";
        if (!($xpos_punto === false))
                {
                if ($xpos_punto == 0)
                        {
                        $xcifra = "0".$xcifra;
                        $xpos_punto = strpos($xcifra, ".");
                        }
                $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
                $xdecimales = substr($xcifra."00", $xpos_punto + 1, 2); // obtengo los valores decimales
                }

        $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
        $xcadena = "";
        for($xz = 0; $xz < 3; $xz++)
                {
                $xaux = substr($XAUX, $xz * 6, 6);
                $xi = 0; $xlimite = 6; // inicializo el contador de centenas xi y establezco el l&#65533;mite a 6 d&#65533;gitos en la parte entera
                $xexit = true; // bandera para controlar el ciclo del While	
                while ($xexit)
                        {
                        if ($xi == $xlimite) // si ya lleg&#65533; al l&#65533;mite máximo de enteros
                                {
                                break; // termina el ciclo
                                }

                        $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
                        $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres d&#65533;gitos)
                        for ($xy = 1; $xy < 4; $xy++) // ciclo para revisar centenas, decenas y unidades, en ese orden
                                {
                                switch ($xy) 
                                        {
                                        case 1: // checa las centenas
                                                if (substr($xaux, 0, 3) < 100) // si el grupo de tres d&#65533;gitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas
                                                        {}
                                                else
                                                        {
                                                        $xseek = $xarray[substr($xaux, 0, 3)]; // busco si la centena es n&#65533;mero redondo (100, 200, 300, 400, etc..)
                                                        if ($xseek)
                                                                {
                                                                $xsub = $this->subfijo($xaux); // devuelve el subfijo correspondiente (Mill&#65533;n, Millones, Mil o nada)
                                                                if (substr($xaux, 0, 3) == 100) 
                                                                        $xcadena = " ".$xcadena." Cien ".$xsub;
                                                                else
                                                                        $xcadena = " ".$xcadena." ".$xseek." ".$xsub;
                                                                $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                                                                }
                                                        else // entra aqu&#65533; si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                                                {
                                                                $xseek = $xarray[substr($xaux, 0, 1) * 100]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                                                $xcadena = " ".$xcadena." ".$xseek;
                                                                } // ENDIF ($xseek)
                                                        } // ENDIF (substr($xaux, 0, 3) < 100)
                                                break;
                                        case 2: // checa las decenas (con la misma l&#65533;gica que las centenas)
                                                if (substr($xaux, 1, 2) < 10)
                                                        {
                                                        }
                                                else
                                                        {
                                                        $xseek = $xarray[substr($xaux, 1, 2)];
                                                        if ($xseek)
                                                                {
                                                                $xsub = $this->subfijo($xaux);
                                                                if (substr($xaux, 1, 2) == 20)
                                                                        $xcadena = " ".$xcadena." Veinte ".$xsub;
                                                                else
                                                                        $xcadena = " ".$xcadena." ".$xseek." ".$xsub;
                                                                $xy = 3;
                                                                }
                                                        else
                                                                {
                                                                $xseek = $xarray[substr($xaux, 1, 1) * 10];
                                                                if (substr($xaux, 1, 1) * 10 == 20)
                                                                        $xcadena = " ".$xcadena." ".$xseek;
                                                                else	
                                                                        $xcadena = " ".$xcadena." ".$xseek." Y ";
                                                                } // ENDIF ($xseek)
                                                        } // ENDIF (substr($xaux, 1, 2) < 10)
                                                break;
                                        case 3: // checa las unidades
                                                if (substr($xaux, 2, 1) < 1) // si la unidad es cero, ya no hace nada
                                                        {
                                                        }
                                                else
                                                        {
                                                        $xseek = $xarray[substr($xaux, 2, 1)]; // obtengo directamente el valor de la unidad (del uno al nueve)
                                                        $xsub = $this->subfijo($xaux);
                                                        $xcadena = " ".$xcadena." ".$xseek." ".$xsub;
                                                        } // ENDIF (substr($xaux, 2, 1) < 1)
                                                break;
                                        } // END SWITCH
                                } // END FOR
                                $xi = $xi + 3;
                        } // ENDDO

                        if (substr(trim($xcadena), -5, 5) == "illón") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
                                $xcadena.= " de";

                        if (substr(trim($xcadena), -7, 7) == "illones") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
                                $xcadena.= " de";

                        // ----------- esta l&#65533;nea la puedes cambiar de acuerdo a tus necesidades o a tu pa&#65533;s -------
                        if (trim($xaux) != "")
                                {
                                switch ($xz)
                                        {
                                        case 0:
                                                if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                                                        $xcadena.= " Un Billón ";
                                                else
                                                        $xcadena.= " Billones ";
                                                break;
                                        case 1:
                                                if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                                                        $xcadena.= "Un Millón ";
                                                else
                                                        $xcadena.= " Millones ";
                                                break;
                                        case 2:
                                                if ($xcifra < 1 )
                                                        {
                                                        $xcadena = " Cero Pesos";
                                                        }
                                                if ($xcifra >= 1 && $xcifra < 2)
                                                        {
                                                        $xcadena = " Un Peso";
                                                        }
                                                if ($xcifra >= 2)
                                                        {
                                                        $xcadena.= " Pesos"; // 
                                                        }
                                                break;
                                        } // endswitch ($xz)
                                } // ENDIF (trim($xaux) != "")
                        // ------------------      en este caso, para M&#65533;xico se usa esta leyenda     ----------------
                        $xcadena = str_replace("Veinti ", "Veinti", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
                        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles 
                        $xcadena = str_replace("Un Un", "Un", $xcadena); // quito la duplicidad
                        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles 
                        $xcadena = str_replace("Billón de Millones", "Billón De", $xcadena); // corrigo la leyenda
                        $xcadena = str_replace("Billones De Millones", "Billones De", $xcadena); // corrigo la leyenda
                        $xcadena = str_replace("De Un", "Un", $xcadena); // corrigo la leyenda
                } // ENDFOR	($xz)
                
                switch ($formato) {
                    case "may":
                        return trim(utf8_decode(mb_strtoupper($xcadena)));
                        break;
                    case "min":
                        return trim(utf8_decode(mb_strtolower($xcadena)));
                        break;
                    case 0:
                        return trim(utf8_decode($xcadena));
                        break;
                }
        } // END FUNCTION


    public function subfijo($xx){ // esta funci&#65533;n regresa un subfijo para la cifra

                $xx = trim($xx);
                $xstrlen = strlen($xx);
                if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
                        $xsub = "";
                //	
                if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
                        $xsub = "Mil";
                //
                return $xsub;
                } // END FUNCTION
    //--------------------------------------------------------------------------
                
    public function numToMoneda($num=false){
        
        setlocale(LC_MONETARY, 'es_ES');
        $valor = number_format($num, 0, ',', '.');
        
        return $valor;
    }
    
    function validaFormateaRut($rut){
    $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';
    if((string)$dvr == strtoupper($dv))
        return number_format((float)$numero, 0, '', '.').'-'.$dv;
    else
        return false;
    }
    
    function formateaRut($rut){

    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $mejorado = number_format((float)$numero, 0, '', '.').'-'.$dv;
        return $mejorado;
    
    }
    
    function FechaEnLetra($fch){
    //recibe 17-12-2019
    
    $fecha = $this->formatDate($fch);
    $num = date("j", strtotime($fecha));
    $year = date("Y", strtotime($fecha));
    $mes = array(
                'Enero', 
                'Febrero', 
                'Marzo', 
                'Abril', 
                'Mayo', 
                'Junio', 
                'Julio', 
                'Agosto', 
                'Septiembre', 
                'Octubre', 
                'Noviembre', 
                'Diciembre'
                );
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $num.' de '.$mes.' del '.$year;

    }
    
    function anteponerZero($valor, $long = 0){
        
        return str_pad($valor, $long, '0', STR_PAD_LEFT);
    }
    
    function cutWord($valor){
        //Devuelve sólo el primer caracter, Ejemplo Alvarez = A.
        $res = substr($valor, 0, 1);
        $word = trim(strtoupper($res)).".";
        return $word;
    }
}
?>
