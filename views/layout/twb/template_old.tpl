<!DOCTYPE html>

<html lang="en">
    <head>
        <title>{$titulo|default:"Sin titulo"}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="description" content="">
        <meta name="author" content="ATHEL">
        <link rel="shortcut icon" href="">
        <link href="{$_layoutParams.ruta_css}font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="{$_layoutParams.ruta_css}bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{$_layoutParams.ruta_css}arriba.css" rel="stylesheet">
        <link href="{$_layoutParams.ruta_css}notificaciones-menu.css" rel="stylesheet">
        <style type="text/css">
        body{
            padding-top: 40px;
            /*padding-bottom: 40px;*/
            background-color: #ffffff;
        }
        </style>
    </head>
    <body>

<div class="navbar-inverse navbar-default navbar-fixed-top">
<!--   <div class="navbar-inner"> -->
    <div class="container">     
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">{$_layoutParams.configs.app_name}</a>
      </div>
            
       <div class="navbar-collapse collapse" style="height: 1px;">       
<!--  Menu dependiendo rol    --> 
            {if isset($_layoutParams.home)}   
                <ul class="nav navbar-nav">
                   {foreach item=it from=$_layoutParams.home}
                       <li {if !empty($it.children)}class="dropdown"{/if}>
                           <a {if !empty($it.children)}class="dropdown-toggle" data-toggle="dropdown"{/if}  href="{$it.enlace}"><i class="{$it.imagen}"> </i>{$it.title}{if !empty($it.children)}<b class="caret"></b>{/if}</a>
                       {if !empty($it.children)}
                           <ul class="dropdown-menu">
                           {foreach item=it2 from=$it.children}           
                                <li {if !empty($it2.children)}class="dropdown-submenu"{/if}>
                                    <a {if !empty($it2.children)}class="dropdown-toggle" data-toggle="dropdown"{/if} href="{$it2.enlace}">{$it2.title}</a>
                                {if !empty($it2.children)}
                                    <ul class="dropdown-menu">
                                        {foreach item=it3 from=$it2.children}      
                                            <li>
                                                <a href="{$it3.enlace}">{$it3.title}</a>
                                            </li>  
                                        {/foreach}
                                    </ul>
                                {/if}
                                </li>          
                           {/foreach}
                           </ul>
                       {/if}
                   {/foreach}
                      </li>
                </ul>
            {/if}           
            
            {if Session::get('autenticado')}
            {if Session::get('level') == "3"}
            {if isset($_layoutParams.menu_operador)}   
                <ul class="nav navbar-nav">
                   {foreach item=it from=$_layoutParams.menu_operador}
                       <li {if !empty($it.children)}class="dropdown"{/if}>
                           <a {if !empty($it.children)}class="dropdown-toggle" data-toggle="dropdown"{/if}  href="{$it.enlace}"><i class="{$it.imagen}"> </i>{$it.title}{if !empty($it.children)}<b class="caret"></b>{/if}</a>
                       {if !empty($it.children)}
                           <ul class="dropdown-menu">
                           {foreach item=it2 from=$it.children}           
                                <li {if !empty($it2.children)}class="dropdown dropdown-submenu"{/if}>
                                    <a {if !empty($it2.children)}class="dropdown-toggle" data-toggle="dropdown"{/if} href="{$it2.enlace}">{$it2.title}{if !empty($it2.children)}<b class="caret-right"></b>{/if}</a>
                                {if !empty($it2.children)}
                                    <ul class="dropdown-menu">
                                        {foreach item=it3 from=$it2.children}      
                                            <li>
                                                <a href="{$it3.enlace}">{$it3.title}</a>
                                            </li>  
                                        {/foreach}
                                    </ul>
                                {/if}
                                </li>          
                           {/foreach}
                           </ul>
                       {/if}
                       </li>
                   {/foreach}                     
                </ul>
           {/if}
           {/if}
           {/if}

           {if Session::get('autenticado')}
           {if Session::get('level') == "1"}
            {if isset($_layoutParams.menu_sadmin)}   
                <ul class="nav navbar-nav">
                   {foreach item=it from=$_layoutParams.menu_sadmin}
                       <li {if !empty($it.children)}class="dropdown"{/if}>
                           <a {if !empty($it.children)}class="dropdown-toggle" data-toggle="dropdown"{/if}  href="{$it.enlace}"><i class="{$it.imagen}"> </i>{$it.title}{if !empty($it.children)}<b class="caret"></b>{/if}</a>
                       {if !empty($it.children)}
                           <ul class="dropdown-menu">
                           {foreach item=it2 from=$it.children}           
                                <li {if !empty($it2.children)}class="dropdown dropdown-submenu"{/if}>
                                    <a {if !empty($it2.children)}class="dropdown-toggle" data-toggle="dropdown"{/if} href="{$it2.enlace}">{$it2.title}{if !empty($it2.children)}<b class="caret-right"></b>{/if}</a>
                                {if !empty($it2.children)}
                                    <ul class="dropdown-menu">
                                        {foreach item=it3 from=$it2.children}      
                                            <li>
                                                <a href="{$it3.enlace}">{$it3.title}</a>
                                            </li>  
                                        {/foreach}
                                    </ul>
                                {/if}
                                </li>          
                           {/foreach}
                           </ul>
                       {/if}
                       </li>
                   {/foreach}                     
                </ul>
            {/if}
            {/if}
            {/if}
            
            {if Session::get('autenticado')}
            {if Session::get('level') == "2"}
            {if isset($_layoutParams.menu_jefe)}   
                <ul class="nav navbar-nav">
                   {foreach item=it from=$_layoutParams.menu_jefe}
                       <li {if !empty($it.children)}class="dropdown"{/if}>
                           <a {if !empty($it.children)}class="dropdown-toggle" data-toggle="dropdown"{/if}  href="{$it.enlace}"><i class="{$it.imagen}"> </i>{$it.title}{if !empty($it.children)}<b class="caret"></b>{/if}</a>
                       {if !empty($it.children)}
                           <ul class="dropdown-menu">
                           {foreach item=it2 from=$it.children}           
                                <li {if !empty($it2.children)}class="dropdown dropdown-submenu"{/if}>
                                    <a {if !empty($it2.children)}class="dropdown-toggle" data-toggle="dropdown"{/if} href="{$it2.enlace}">{$it2.title}{if !empty($it2.children)}<b class="caret-right"></b>{/if}</a>
                                {if !empty($it2.children)}
                                    <ul class="dropdown-menu">
                                        {foreach item=it3 from=$it2.children}      
                                            <li>
                                                <a href="{$it3.enlace}">{$it3.title}</a>
                                            </li>  
                                        {/foreach}
                                    </ul>
                                {/if}
                                </li>          
                           {/foreach}
                           </ul>
                       {/if}
                       </li>
                   {/foreach}                     
                </ul>
           {/if}
           {/if}
           {/if}
           
           <!-- Notifications: style can be found in dropdown.less -->
          <!-- Header Navbar: style can be found in header.less -->

            <ul class="nav navbar-nav">
                  <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">100</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">Tu tienes 10 notifiaciones</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">                

                          <li>
                            <a href="#">
                              <i class="fa fa-users text-aqua"></i> El usuario Luis vió tu publicación
                            </a>
                          </li>        
                          
                        </ul>
                      </li>
                    </ul>
                  </li>
            </ul>
           
           
        {if Session::get('autenticado')}
               <ul class="nav navbar-nav navbar-right">
                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="#"><i class="glyphicon glyphicon-user"> </i> {Session::get('nombre_usu')}</a>
                      <ul class="dropdown-menu">
                        <li><a href="{$_layoutParams.root}usuarios/login/cerrar" class="btn"><i class="glyphicon glyphicon-log-out"> </i> Salir</a></li>
                      </ul>
                  </li>
               </ul>  
        {else}
                <ul class="nav navbar-nav navbar-right">
                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="#"><i class="glyphicon glyphicon-log-in"> </i> Acceder</a>
                      <ul class="dropdown-menu">
                        <li><a href="{$_layoutParams.root}usuarios/login/" class="btn">Iniciar sesión</a></li>
                        <li><a href="{$_layoutParams.root}usuarios/logincli/" class="btn">Iniciar sesión cliente</a></li>
                      </ul>
                  </li>
               </ul>  
        {/if}
       </div>     
    </div>
</div>
     <!-- </div>-->
     
     <!---CSS BEFORE-->
        {if isset($_layoutParams.cssb) && count($_layoutParams.cssb)}
        {foreach item=cssb from=$_layoutParams.cssb}
            <link href="{$cssb}" rel="stylesheet" type="text/css" />      
        {/foreach}
        {/if}
    <!--/CSS BEFORE-->
        
    <!---JS BEFORE-->
        {if isset($_layoutParams.jsb) && count($_layoutParams.jsb)}
        {foreach item=jsb from=$_layoutParams.jsb}
            <script src="{$jsb}" type="text/javascript"></script>       
        {/foreach}
        {/if}
    <!--/JS BEFORE-->
            
<div class="">
       <div>          
           <div style="margin-top: 0px"><h2>{$titulo1|default:""}</h2></div>
           <div id="mssgx"></div>
            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>
            {if isset($_mensaje)}
            <div id="_errl" class="alert alert-success">
                            <a class="close" data-dismiss="alert">x</a>
                            {$_mensaje}
                        </div>
            {/if}
            
            {if isset($_error)}
            <div id="_errl" class="alert alert-warning">
                            <a class="close" data-dismiss="alert">x</a>
                            {$_error}
                        </div>
            {/if}
            
            {if Session::get('error')}
                <div class="alert alert-warning">
                    <a class="close" data-dismiss="alert">x</a>
                    {Session::get('error')}
                    {Session::destroy('error')}
                </div>
            {/if}

            {if Session::get('mensaje')}
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">x</a>
                    {Session::get('mensaje')}
                    {Session::destroy('mensaje')}
                </div>
            {/if}
            
            {include file=$_contenido}
            
      </div>
</div>


<!--<link href="{*$_layoutParams.ruta_css*}estilos.css" rel="stylesheet" type="text/css" />-->
        <script src="{$_layoutParams.root}public/js/jquery.js" type="text/javascript"></script>
        <script src="{$_layoutParams.root}public/js/jquery.validate.js" type="text/javascript"></script>
        <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.min.js"></script>
        <script type="text/javascript" src="{$_layoutParams.ruta_js}arriba.js"></script>
        <script type="text/javascript">
            var _root_ = '{$_layoutParams.root}';
        </script>
        
        <!--Plugin's-->
        {if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
        {foreach item=plgJs from=$_layoutParams.js_plugin}
            <script src="{$plgJs}" type="text/javascript"></script>
        {/foreach}
        {/if}
        {if isset($_layoutParams.css_plugin) && count($_layoutParams.css_plugin)}
        {foreach item=plgCss from=$_layoutParams.css_plugin}
             <link href="{$plgCss}" rel="stylesheet" type="text/css"/>
        {/foreach}
        {/if}
        
        <!--CSS-->
        {if isset($_layoutParams.css) && count($_layoutParams.css)}
        {foreach item=css from=$_layoutParams.css}
            <link href="{$css}" rel="stylesheet" type="text/css" />      
        {/foreach}
        {/if}
        <!--JS-->
        {if isset($_layoutParams.js) && count($_layoutParams.js)}
        {foreach item=js from=$_layoutParams.js}
            <script src="{$js}" type="text/javascript"></script>       
        {/foreach}
        {/if}
        
        <script>
        {if $javascript == 1}
         {$var1}{$array}{$var2}{$dia}{$var3}
        {/if}
        
        {if $javascript == 2}
         {$var1}{$array}{$var2}
        {/if}
        </script>
        <span class="ir-arriba"><i class="glyphicon glyphicon-chevron-up"></i></span>
</body>
</html>