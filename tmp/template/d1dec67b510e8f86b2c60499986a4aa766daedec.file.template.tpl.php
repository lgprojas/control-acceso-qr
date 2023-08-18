<?php /* Smarty version Smarty-3.1.11, created on 2023-07-04 18:53:36
         compiled from "C:\xampp\htdocs\controlqr\views\layout\twb\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121336083664a44e903f6db7-36270213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1dec67b510e8f86b2c60499986a4aa766daedec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\controlqr\\views\\layout\\twb\\template.tpl',
      1 => 1688484561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121336083664a44e903f6db7-36270213',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo' => 0,
    '_layoutParams' => 0,
    'it' => 0,
    'it2' => 0,
    'it3' => 0,
    'mn' => 0,
    'cssb' => 0,
    'jsb' => 0,
    'titulo1' => 0,
    '_error' => 0,
    '_mensaje' => 0,
    '_contenido' => 0,
    'plgJs' => 0,
    'plgCss' => 0,
    'css' => 0,
    'js' => 0,
    'javascript' => 0,
    'var1' => 0,
    'array' => 0,
    'var2' => 0,
    'dia' => 0,
    'var3' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64a44e9059b978_03129694',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64a44e9059b978_03129694')) {function content_64a44e9059b978_03129694($_smarty_tpl) {?><!DOCTYPE html>

<html lang="es">

    <head>

        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['titulo']->value)===null||$tmp==='' ? "Sin titulo" : $tmp);?>
</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

        <meta content="width=device-width, initial-scale=1" name="viewport">

	<meta name="robots" content="index,follow">

        <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_description'];?>
">

        <meta name="author" content="ATHEL">

	<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_keywords'];?>
" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
favicon/favicon.ico">
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
loading.css" rel="stylesheet">
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
design-iconic-font.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
arriba.css" rel="stylesheet">
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_icons'];?>
bootstrap-icons.css" rel="stylesheet">
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
menu.css" rel="stylesheet">
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
simple-sidebar.css" rel="stylesheet">
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
notificaciones-menu.css" rel="stylesheet">

        <style type="text/css">

        body{

            /*padding-top: 40px;*/
            /*padding-top: 65px;*/
            /*padding-bottom: 40px;*/
            

            background-color: #ffffff;

        }


        </style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-36635911-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){ dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-36635911-4');
    
</script>


    </head>

<body  class="hidden">
    <div class="centrado" id="onload">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
<header>
<div class="d-flex" id="wrapper">
    
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;">
      <div class="sidebar-heading">Panel principal</div>
      <div class="list-group list-group-flush">
        <nav class="navbar navbar-light shadow" style="background: #f7f9f9;">
          <div class="padd-left">       

<!--  Menu dependiendo rol    --> 

            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['dashboard'])){?>   

                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

                   <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['dashboard']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>

                       <li <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-item dropdown"<?php }else{ ?>class="nav-item"<?php }?>>

                           <a <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"<?php }else{ ?>class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['it']->value['title'];?>
</a>
                       <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>

                           <ul class="dropdown-menu shadow">

                           <?php  $_smarty_tpl->tpl_vars['it2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it2']->key => $_smarty_tpl->tpl_vars['it2']->value){
$_smarty_tpl->tpl_vars['it2']->_loop = true;
?>           

                                <li <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-submenu"<?php }?>>

                                    <a <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-item dropdown-submenu-toggle icon-right" href="#"<?php }else{ ?>class="dropdown-item"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['it2']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it2']->value['title'];?>
</a>

                                <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>

                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">

                                        <?php  $_smarty_tpl->tpl_vars['it3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it2']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it3']->key => $_smarty_tpl->tpl_vars['it3']->value){
$_smarty_tpl->tpl_vars['it3']->_loop = true;
?>      

                                            <li>

                                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['it3']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it3']->value['title'];?>
</a>

                                            </li>  

                                        <?php } ?>

                                    </ul>

                                <?php }?>

                                </li>          

                           <?php } ?>

                           </ul>

                       <?php }?>

                   <?php } ?>

                      </li>

                </ul>

            <?php }?>
          </div>
        </nav>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

<nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background: #f7f9f9;">
  <div class="container">
    <a class="navbar-brand" href="#"><?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_name'];?>
</a>
    <button class="navbar-toggler collapsed mr-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <div class="hamburger-toggle">
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </button>
    
<!--  Habilitar para panerel vertical -->
<!--<button class="btn btn-primary" id="menu-toggle">Panel</button>-->
<!--/ Habilitar para panerel vertical -->
            

       <div class="collapse navbar-collapse" id="navbarSupportedContent">       

<!--  Menu dependiendo rol    --> 

            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['home'])){?>   
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['home']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                       <li <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-item dropdown"<?php }else{ ?>class="nav-item"<?php }?>>
                           <a <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"<?php }else{ ?>class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['it']->value['title'];?>
</a>
                       <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>
                           <ul class="dropdown-menu shadow">
                           <?php  $_smarty_tpl->tpl_vars['it2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it2']->key => $_smarty_tpl->tpl_vars['it2']->value){
$_smarty_tpl->tpl_vars['it2']->_loop = true;
?>           
                                <li <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-submenu"<?php }?>>
                                    <a <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-item dropdown-submenu-toggle icon-right" href="#"<?php }else{ ?>class="dropdown-item"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['it2']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it2']->value['title'];?>
</a>
                                <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        <?php  $_smarty_tpl->tpl_vars['it3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it2']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it3']->key => $_smarty_tpl->tpl_vars['it3']->value){
$_smarty_tpl->tpl_vars['it3']->_loop = true;
?>      
                                            <li>
                                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['it3']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it3']->value['title'];?>
</a>
                                            </li>  
                                        <?php } ?>
                                    </ul>
                                <?php }?>
                                </li>          
                           <?php } ?>
                           </ul>
                       <?php }?>
                   <?php } ?>
                      </li>
                </ul>
            <?php }?>
            
            <?php if (Session::get('autenticado')){?>
            <?php if (Session::get('level')=="5"){?>
            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu_cl'])){?>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu_cl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                       <li <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-item dropdown"<?php }else{ ?>class="nav-item"<?php }?>>
                           <a <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"<?php }else{ ?>class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['it']->value['title'];?>
</a>
                       <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>
                           <ul class="dropdown-menu shadow">
                           <?php  $_smarty_tpl->tpl_vars['it2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it2']->key => $_smarty_tpl->tpl_vars['it2']->value){
$_smarty_tpl->tpl_vars['it2']->_loop = true;
?>           
                                <li <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-submenu"<?php }?>>
                                    <a <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-item dropdown-submenu-toggle icon-right" href="#"<?php }else{ ?>class="dropdown-item"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['it2']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it2']->value['title'];?>
</a>
                                <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        <?php  $_smarty_tpl->tpl_vars['it3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it2']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it3']->key => $_smarty_tpl->tpl_vars['it3']->value){
$_smarty_tpl->tpl_vars['it3']->_loop = true;
?>      
                                            <li>
                                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['it3']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it3']->value['title'];?>
</a>
                                            </li>  
                                        <?php } ?>
                                    </ul>
                                <?php }?>
                                </li>          
                           <?php } ?>
                           </ul>
                       <?php }?>
                   <?php } ?>
                      </li>
                </ul>
            <?php }?>                
            <?php }?>
            <?php }?>
            
            <?php if (Session::get('autenticado')){?>
            <?php if (Session::get('level')=="4"){?>
            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu_ab'])){?>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu_ab']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                       <li <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-item dropdown"<?php }else{ ?>class="nav-item"<?php }?>>
                           <a <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"<?php }else{ ?>class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['it']->value['title'];?>
</a>
                       <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>
                           <ul class="dropdown-menu shadow">
                           <?php  $_smarty_tpl->tpl_vars['it2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it2']->key => $_smarty_tpl->tpl_vars['it2']->value){
$_smarty_tpl->tpl_vars['it2']->_loop = true;
?>           
                                <li <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-submenu"<?php }?>>
                                    <a <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-item dropdown-submenu-toggle icon-right" href="#"<?php }else{ ?>class="dropdown-item"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['it2']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it2']->value['title'];?>
</a>
                                <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        <?php  $_smarty_tpl->tpl_vars['it3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it2']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it3']->key => $_smarty_tpl->tpl_vars['it3']->value){
$_smarty_tpl->tpl_vars['it3']->_loop = true;
?>      
                                            <li>
                                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['it3']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it3']->value['title'];?>
</a>
                                            </li>  
                                        <?php } ?>
                                    </ul>
                                <?php }?>
                                </li>          
                           <?php } ?>
                           </ul>
                       <?php }?>
                   <?php } ?>
                      </li>
                </ul>
            <?php }?>
            <?php }?>
            <?php }?>
            
            <?php if (Session::get('autenticado')){?>
            <?php if (Session::get('level')=="3"){?>
            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu_su'])){?>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu_su']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                       <li <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-item dropdown"<?php }else{ ?>class="nav-item"<?php }?>>
                           <a <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"<?php }else{ ?>class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['it']->value['title'];?>
</a>
                       <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>
                           <ul class="dropdown-menu shadow">
                           <?php  $_smarty_tpl->tpl_vars['it2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it2']->key => $_smarty_tpl->tpl_vars['it2']->value){
$_smarty_tpl->tpl_vars['it2']->_loop = true;
?>           
                                <li <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-submenu"<?php }?>>
                                    <a <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-item dropdown-submenu-toggle icon-right" href="#"<?php }else{ ?>class="dropdown-item"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['it2']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it2']->value['title'];?>
</a>
                                <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        <?php  $_smarty_tpl->tpl_vars['it3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it2']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it3']->key => $_smarty_tpl->tpl_vars['it3']->value){
$_smarty_tpl->tpl_vars['it3']->_loop = true;
?>      
                                            <li>
                                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['it3']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it3']->value['title'];?>
</a>
                                            </li>  
                                        <?php } ?>
                                    </ul>
                                <?php }?>
                                </li>          
                           <?php } ?>
                           </ul>
                       <?php }?>
                   <?php } ?>
                      </li>
                </ul>
            <?php }?>
            <?php }?>
            <?php }?>
            
            <?php if (Session::get('autenticado')){?>
            <?php if (Session::get('level')=="2"){?>
            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu_je'])){?>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu_je']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                       <li <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-item dropdown"<?php }else{ ?>class="nav-item"<?php }?>>
                           <a <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"<?php }else{ ?>class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['it']->value['title'];?>
</a>
                       <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>
                           <ul class="dropdown-menu shadow">
                           <?php  $_smarty_tpl->tpl_vars['it2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it2']->key => $_smarty_tpl->tpl_vars['it2']->value){
$_smarty_tpl->tpl_vars['it2']->_loop = true;
?>           
                                <li <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-submenu"<?php }?>>
                                    <a <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-item dropdown-submenu-toggle icon-right" href="#"<?php }else{ ?>class="dropdown-item"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['it2']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it2']->value['title'];?>
</a>
                                <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        <?php  $_smarty_tpl->tpl_vars['it3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it2']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it3']->key => $_smarty_tpl->tpl_vars['it3']->value){
$_smarty_tpl->tpl_vars['it3']->_loop = true;
?>      
                                            <li>
                                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['it3']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it3']->value['title'];?>
</a>
                                            </li>  
                                        <?php } ?>
                                    </ul>
                                <?php }?>
                                </li>          
                           <?php } ?>
                           </ul>
                       <?php }?>
                   <?php } ?>
                      </li>
                </ul>
            <?php }?>
            <?php }?>
            <?php }?>
            
            <?php if (Session::get('autenticado')){?>
            <?php if (Session::get('level')=="1"){?>
            <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu_ad'])){?>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu_ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                       <li <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-item dropdown"<?php }else{ ?>class="nav-item"<?php }?>>
                           <a <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"<?php }else{ ?>class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['it']->value['title'];?>
</a>
                       <?php if (!empty($_smarty_tpl->tpl_vars['it']->value['children'])){?>
                           <ul class="dropdown-menu shadow">
                           <?php  $_smarty_tpl->tpl_vars['it2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it2']->key => $_smarty_tpl->tpl_vars['it2']->value){
$_smarty_tpl->tpl_vars['it2']->_loop = true;
?>           
                                <li <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-submenu"<?php }?>>
                                    <a <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>class="dropdown-item dropdown-submenu-toggle icon-right" href="#"<?php }else{ ?>class="dropdown-item"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['it2']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it2']->value['title'];?>
</a>
                                <?php if (!empty($_smarty_tpl->tpl_vars['it2']->value['children'])){?>
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        <?php  $_smarty_tpl->tpl_vars['it3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it2']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it3']->key => $_smarty_tpl->tpl_vars['it3']->value){
$_smarty_tpl->tpl_vars['it3']->_loop = true;
?>      
                                            <li>
                                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['it3']->value['enlace'];?>
"><?php echo $_smarty_tpl->tpl_vars['it3']->value['title'];?>
</a>
                                            </li>  
                                        <?php } ?>
                                    </ul>
                                <?php }?>
                                </li>          
                           <?php } ?>
                           </ul>
                       <?php }?>
                   <?php } ?>
                      </li>
                </ul>
            <?php }?>
            <?php }?>
            <?php }?>
            
            <?php if (Session::get('autenticado')){?>
            <!-- Notifications-->            
            <ul id="ulclicknoti" class="navbar-nav mr-auto mb-2 mb-lg-0">
                  <li class="dropdown notifications-menu">
                      <a data-id="ejemplo" href="#" class="navega-lucho dropdown-toggle" id="campana" data-toggle="dropdown"><i class="fa fa-bell-o"></i><?php if (Session::get('msj')!=0){?><span class="label label-warning"><?php echo Session::get('msj');?>
</span><?php }else{ ?><?php }?></a>
                    <ul class="dropdown-menu">
                      <li class="header">
                          <div class="row">
                              <div class="row col-lg-10 text-start"><div class="col-lg-2"><i class="bi bi-file-text"></i></div>
                                  <div id="estadonotif" class="col-lg-10">
                                  <?php if (Session::get('msj')!=0){?>
                                      Usted tiene <?php echo Session::get('msj');?>
 notificaciones 
                                  <?php }else{ ?>
                                      No tiene notificaciones
                                  <?php }?>
                                  </div>
                              </div>                  
                          </div>
                      </li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul id="lastnoti" class="menu">
                          <?php if (count(Session::get('menu_noti'))>0){?>
                          <?php  $_smarty_tpl->tpl_vars['mn'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mn']->_loop = false;
 $_from = Session::get('menu_noti'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mn']->key => $_smarty_tpl->tpl_vars['mn']->value){
$_smarty_tpl->tpl_vars['mn']->_loop = true;
?>  
                          <li class="text-li-noti">
                            <a <?php if ($_smarty_tpl->tpl_vars['mn']->value['Id_tmov']==1){?>  
                                    <?php if (Session::get('level')==3){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
causa/index/index/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
"
                                    <?php }elseif(Session::get('level')==4){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
causa/index/index/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
"
                                    <?php }elseif(Session::get('level')==5){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
causa/indexcli/index/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
"
                                    <?php }?>
                                <?php }elseif($_smarty_tpl->tpl_vars['mn']->value['Id_tmov']==2){?>
                                    <?php if (Session::get('level')==3||Session::get('level')==4){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
causa/dcausa/index/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idaccion_encrypt'];?>
"
                                    <?php }elseif(Session::get('level')==5){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
causa/indexcli/verListaHitosCausaCli/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idaccion_encrypt'];?>
"
                                    <?php }?>    
                                <?php }elseif($_smarty_tpl->tpl_vars['mn']->value['Id_tmov']==3){?>
                                    <?php if (Session::get('level')==3||Session::get('level')==4){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
consulta/dconsulta/index/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idaccion_encrypt'];?>
"
                                    <?php }elseif(Session::get('level')==5){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
consulta/dconsultacli/index/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idaccion_encrypt'];?>
"
                                    <?php }?>
                                <?php }elseif($_smarty_tpl->tpl_vars['mn']->value['Id_tmov']==4){?>
                                    <?php if (Session::get('level')==3||Session::get('level')==4){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
consulta/dconsulta/index/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idaccion_encrypt'];?>
"
                                    <?php }elseif(Session::get('level')==5){?>
                                        href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
consulta/dconsultacli/index/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idcli_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idempresa_encrypt'];?>
/<?php echo $_smarty_tpl->tpl_vars['mn']->value['Idaccion_encrypt'];?>
"
                                    <?php }?>
                                <?php }?>>
                                <i class="bi bi-megaphone-fill"></i> <?php if ($_smarty_tpl->tpl_vars['mn']->value['Id_codrol']==1){?>[Colaborador] <?php echo $_smarty_tpl->tpl_vars['mn']->value['Nom1_emp'];?>
 <?php echo $_smarty_tpl->tpl_vars['mn']->value['Ape1_emp'];?>
 <?php echo substr($_smarty_tpl->tpl_vars['mn']->value['Ape2_emp'],0,1);?>
. <?php }else{ ?>[Cliente] <?php echo $_smarty_tpl->tpl_vars['mn']->value['Nom1_cli'];?>
 <?php echo $_smarty_tpl->tpl_vars['mn']->value['Ape1_cli'];?>
 <?php echo substr($_smarty_tpl->tpl_vars['mn']->value['Ape2_cli'],0,1);?>
. <?php }?><span style="font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['mn']->value['Nom_tmov'];?>
</span>
                                <p>Fecha: <span style="font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['mn']->value['Date_mov'];?>
</span> Hora: <span style="font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['mn']->value['Time_mov'];?>
 hrs.</span></p>
                            </a>
                          </li>        
                          <?php } ?>                         
                          <?php }?>
                        </ul>
                        <ul class="menu">
                          <li class="text-li-noti" style="text-align: center;">
                              <?php if (Session::get('level')==3){?>
                                  <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
movimientos/index/notifSup/">Ver más movimientos..</a>
                              <?php }elseif(Session::get('level')==4){?>
                                  <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
movimientos/index/notifAbo/">Ver más movimientos..</a>
                              <?php }elseif(Session::get('level')==5){?>
                                  <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
movimientos/index/notifCli/">Ver más movimientos..</a>
                              <?php }?>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
            </ul>
            <?php }?>

            


        <?php if (Session::get('autenticado')){?>
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown"  href="#"><i class="glyphicon glyphicon-user"> </i> <?php echo Session::get('nombre_usu');?>
</a>
                      <ul class="dropdown-menu shadow">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/login/cerrar" class="btn"><i class="glyphicon glyphicon-log-out"> </i> Salir</a></li>
                      </ul>
                  </li>
               </ul>  
        <?php }else{ ?>
                <ul class="navbar-nav ms-auto">
                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown"  href="#"><i class="glyphicon glyphicon-log-in"> </i> Acceder</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/login/" class="btn">Iniciar sesión</a></li>
                        <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/logincli/" class="btn">Iniciar sesión cliente</a></li>
                      </ul>
                  </li>
               </ul>  
        <?php }?>

       </div>     

</div>
</nav>
</div>
</header>
    <!-- </div>-->
     
    <!---CSS BEFORE-->
        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['cssb'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['cssb'])){?>
        <?php  $_smarty_tpl->tpl_vars['cssb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cssb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['cssb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cssb']->key => $_smarty_tpl->tpl_vars['cssb']->value){
$_smarty_tpl->tpl_vars['cssb']->_loop = true;
?>
            <link href="<?php echo $_smarty_tpl->tpl_vars['cssb']->value;?>
" rel="stylesheet" type="text/css" />      
        <?php } ?>
        <?php }?>
    <!--/CSS BEFORE-->
        
    <!---JS BEFORE-->
        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['jsb'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['jsb'])){?>
        <?php  $_smarty_tpl->tpl_vars['jsb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jsb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['jsb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jsb']->key => $_smarty_tpl->tpl_vars['jsb']->value){
$_smarty_tpl->tpl_vars['jsb']->_loop = true;
?>
            <script src="<?php echo $_smarty_tpl->tpl_vars['jsb']->value;?>
" type="text/javascript"></script>       
        <?php } ?>
        <?php }?>
    <!--/JS BEFORE-->  

            

<div style="padding-top: 65px;">

       <div>          

           <div style="margin-top: 0px"><h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['titulo1']->value)===null||$tmp==='' ? '' : $tmp);?>
</h2></div>

            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>

            

            <?php if (isset($_smarty_tpl->tpl_vars['_error']->value)){?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              
                <div>
                    <i class="bi bi-exclamation-triangle-fill"></i> 
                <?php echo $_smarty_tpl->tpl_vars['_error']->value;?>

                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php }?>
            
            <?php if (isset($_smarty_tpl->tpl_vars['_mensaje']->value)){?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              
                <div>
                    <i class="bi bi-check-circle-fill"></i> 
                <?php echo $_smarty_tpl->tpl_vars['_mensaje']->value;?>

                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php }?>

            

            <?php if (Session::get('error')){?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">                    
                    <div>
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <?php echo Session::get('error');?>

                        <?php echo Session::destroy('error');?>

                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php }?>



            <?php if (Session::get('mensaje')){?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <?php echo Session::get('mensaje');?>

                        <?php echo Session::destroy('mensaje');?>

                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php }?>

            

            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            

      </div>

</div>





<!--<link href="estilos.css" rel="stylesheet" type="text/css" />-->

        <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery.js" type="text/javascript"></script>
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
loading.js"></script>

        <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery.validate.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
bootstrap.min.js"></script>
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
bootstrap.bundle.min.js"></script>

        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
arriba.js"></script>
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
notificaciones.js"></script>

        <script type="text/javascript">

            var _root_ = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
';

        </script>

        

        <!--Plugin's-->

        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])){?>

        <?php  $_smarty_tpl->tpl_vars['plgJs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plgJs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plgJs']->key => $_smarty_tpl->tpl_vars['plgJs']->value){
$_smarty_tpl->tpl_vars['plgJs']->_loop = true;
?>

            <script src="<?php echo $_smarty_tpl->tpl_vars['plgJs']->value;?>
" type="text/javascript"></script>

        <?php } ?>

        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['css_plugin'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['css_plugin'])){?>

        <?php  $_smarty_tpl->tpl_vars['plgCss'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plgCss']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['css_plugin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plgCss']->key => $_smarty_tpl->tpl_vars['plgCss']->value){
$_smarty_tpl->tpl_vars['plgCss']->_loop = true;
?>

             <link href="<?php echo $_smarty_tpl->tpl_vars['plgCss']->value;?>
" rel="stylesheet" type="text/css"/>

        <?php } ?>

        <?php }?>

        

        <!--CSS-->

        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['css'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['css'])){?>

        <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>

            <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" rel="stylesheet" type="text/css" />      

        <?php } ?>

        <?php }?>

        <!--JS-->

        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])){?>

        <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>

            <script src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
" type="text/javascript"></script>       

        <?php } ?>

        <?php }?>

        

        <script type="text/javascript">

        <?php if ($_smarty_tpl->tpl_vars['javascript']->value==1){?>

         <?php echo $_smarty_tpl->tpl_vars['var1']->value;?>
<?php echo $_smarty_tpl->tpl_vars['array']->value;?>
<?php echo $_smarty_tpl->tpl_vars['var2']->value;?>
<?php echo $_smarty_tpl->tpl_vars['dia']->value;?>
<?php echo $_smarty_tpl->tpl_vars['var3']->value;?>


        <?php }?>

        

        <?php if ($_smarty_tpl->tpl_vars['javascript']->value==2){?>

         <?php echo $_smarty_tpl->tpl_vars['var1']->value;?>
<?php echo $_smarty_tpl->tpl_vars['array']->value;?>
<?php echo $_smarty_tpl->tpl_vars['var2']->value;?>


        <?php }?>

        </script>

        <span class="ir-arriba"><i class="fa fa-angle-up"></i></span>
        <!-- Menu Toggle Script -->
          <script>
              
              
            $("#menu-toggle").click(function(e) {
              e.preventDefault();
              $("#wrapper").toggleClass("toggled");
            });
          </script>
          
          <script type='text/javascript'>
          
          </script>
</body>

</html><?php }} ?>