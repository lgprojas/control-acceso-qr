<!DOCTYPE html>

<html lang="es">

    <head>

        <title>{$titulo|default:"Sin titulo"}</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

        <meta content="width=device-width, initial-scale=1" name="viewport">

	<meta name="robots" content="index,follow">

        <meta name="description" content="{$_layoutParams.configs.app_description}">

        <meta name="author" content="ATHEL">

	<meta name="keywords" content="{$_layoutParams.configs.app_keywords}" />

	<link rel="shortcut icon" type="image/x-icon" href="{$_layoutParams.ruta_img}favicon/favicon.ico">
        
        <link href="{$_layoutParams.ruta_css}loading.css" rel="stylesheet">
        
        <link href="{$_layoutParams.ruta_css}font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <link href="{$_layoutParams.ruta_css}bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        <link href="{$_layoutParams.ruta_css}design-iconic-font.min.css" rel="stylesheet" type="text/css"/>

        <link href="{$_layoutParams.ruta_css}arriba.css" rel="stylesheet">
        
        <link href="{$_layoutParams.ruta_icons}bootstrap-icons.css" rel="stylesheet">
        
        <link href="{$_layoutParams.ruta_css}menu.css" rel="stylesheet">
        
        <link href="{$_layoutParams.ruta_css}simple-sidebar.css" rel="stylesheet">
        
        <link href="{$_layoutParams.ruta_css}notificaciones-menu.css" rel="stylesheet">

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

            {if isset($_layoutParams.dashboard)}   

                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

                   {foreach item=it from=$_layoutParams.dashboard}

                       <li {if !empty($it.children)}class="nav-item dropdown"{else}class="nav-item"{/if}>

                           <a {if !empty($it.children)}class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"{else}class="nav-link" href="{$it.enlace}"{/if}>{$it.title}{*if !empty($it.children)}<b class="caret"></b>{/if*}</a>
                       {if !empty($it.children)}

                           <ul class="dropdown-menu shadow">

                           {foreach item=it2 from=$it.children}           

                                <li {if !empty($it2.children)}class="dropdown-submenu"{/if}>

                                    <a {if !empty($it2.children)}class="dropdown-item dropdown-submenu-toggle icon-right" href="#"{else}class="dropdown-item"{/if} href="{$it2.enlace}">{$it2.title}</a>

                                {if !empty($it2.children)}

                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">

                                        {foreach item=it3 from=$it2.children}      

                                            <li>

                                                <a class="dropdown-item" href="{$it3.enlace}">{$it3.title}</a>

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
          </div>
        </nav>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

<nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background: #f7f9f9;">
  <div class="container">
    <a class="navbar-brand" href="#">{$_layoutParams.configs.app_name}</a>
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

            {if isset($_layoutParams.home)}   
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   {foreach item=it from=$_layoutParams.home}
                       <li {if !empty($it.children)}class="nav-item dropdown"{else}class="nav-item"{/if}>
                           <a {if !empty($it.children)}class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"{else}class="nav-link" href="{$it.enlace}"{/if}>{$it.title}{*if !empty($it.children)}<b class="caret"></b>{/if*}</a>
                       {if !empty($it.children)}
                           <ul class="dropdown-menu shadow">
                           {foreach item=it2 from=$it.children}           
                                <li {if !empty($it2.children)}class="dropdown-submenu"{/if}>
                                    <a {if !empty($it2.children)}class="dropdown-item dropdown-submenu-toggle icon-right" href="#"{else}class="dropdown-item"{/if} href="{$it2.enlace}">{$it2.title}</a>
                                {if !empty($it2.children)}
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        {foreach item=it3 from=$it2.children}      
                                            <li>
                                                <a class="dropdown-item" href="{$it3.enlace}">{$it3.title}</a>
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
            {if isset($_layoutParams.menu_su)}
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   {foreach item=it from=$_layoutParams.menu_su}
                       <li {if !empty($it.children)}class="nav-item dropdown"{else}class="nav-item"{/if}>
                           <a {if !empty($it.children)}class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"{else}class="nav-link" href="{$it.enlace}"{/if}>{$it.title}{*if !empty($it.children)}<b class="caret"></b>{/if*}</a>
                       {if !empty($it.children)}
                           <ul class="dropdown-menu shadow">
                           {foreach item=it2 from=$it.children}           
                                <li {if !empty($it2.children)}class="dropdown-submenu"{/if}>
                                    <a {if !empty($it2.children)}class="dropdown-item dropdown-submenu-toggle icon-right" href="#"{else}class="dropdown-item"{/if} href="{$it2.enlace}">{$it2.title}</a>
                                {if !empty($it2.children)}
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        {foreach item=it3 from=$it2.children}      
                                            <li>
                                                <a class="dropdown-item" href="{$it3.enlace}">{$it3.title}</a>
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
            {/if}
            {/if}
            
            {if Session::get('autenticado')}
            {if Session::get('level') == "2"}
            {if isset($_layoutParams.menu_je)}
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   {foreach item=it from=$_layoutParams.menu_je}
                       <li {if !empty($it.children)}class="nav-item dropdown"{else}class="nav-item"{/if}>
                           <a {if !empty($it.children)}class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"{else}class="nav-link" href="{$it.enlace}"{/if}>{$it.title}{*if !empty($it.children)}<b class="caret"></b>{/if*}</a>
                       {if !empty($it.children)}
                           <ul class="dropdown-menu shadow">
                           {foreach item=it2 from=$it.children}           
                                <li {if !empty($it2.children)}class="dropdown-submenu"{/if}>
                                    <a {if !empty($it2.children)}class="dropdown-item dropdown-submenu-toggle icon-right" href="#"{else}class="dropdown-item"{/if} href="{$it2.enlace}">{$it2.title}</a>
                                {if !empty($it2.children)}
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        {foreach item=it3 from=$it2.children}      
                                            <li>
                                                <a class="dropdown-item" href="{$it3.enlace}">{$it3.title}</a>
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
            {/if}
            {/if}
            
            {if Session::get('autenticado')}
            {if Session::get('level') == "1"}
            {if isset($_layoutParams.menu_ad)}
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   {foreach item=it from=$_layoutParams.menu_ad}
                       <li {if !empty($it.children)}class="nav-item dropdown"{else}class="nav-item"{/if}>
                           <a {if !empty($it.children)}class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"{else}class="nav-link" href="{$it.enlace}"{/if}>{$it.title}{*if !empty($it.children)}<b class="caret"></b>{/if*}</a>
                       {if !empty($it.children)}
                           <ul class="dropdown-menu shadow">
                           {foreach item=it2 from=$it.children}           
                                <li {if !empty($it2.children)}class="dropdown-submenu"{/if}>
                                    <a {if !empty($it2.children)}class="dropdown-item dropdown-submenu-toggle icon-right" href="#"{else}class="dropdown-item"{/if} href="{$it2.enlace}">{$it2.title}</a>
                                {if !empty($it2.children)}
                                    <ul class="dropdown-menu dropdown-menu-left dropdown-submenu shadow">
                                        {foreach item=it3 from=$it2.children}      
                                            <li>
                                                <a class="dropdown-item" href="{$it3.enlace}">{$it3.title}</a>
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
            {/if}
            {/if}
            
            
        {if Session::get('autenticado')}
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown"  href="#"><i class="glyphicon glyphicon-user"> </i> {Session::get('nombre_usu')}</a>
                      <ul class="dropdown-menu shadow">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item" href="{$_layoutParams.root}usuarios/login/cerrar" class="btn"><i class="glyphicon glyphicon-log-out"> </i> Salir</a></li>
                      </ul>
                  </li>
               </ul>  
        {else}
                <ul class="navbar-nav ms-auto">
                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown"  href="#"><i class="glyphicon glyphicon-log-in"> </i> Acceder</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{$_layoutParams.root}usuarios/login/" class="btn">Iniciar sesión</a></li>
                      </ul>
                  </li>
               </ul>  
        {/if}

       </div>     

</div>
</nav>
</div>
</header>
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

            

<div style="padding-top: 65px;">

       <div>          

           <div style="margin-top: 0px"><h2>{$titulo1|default:""}</h2></div>

            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>

            

            {if isset($_error)}

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              
                <div>
                    <i class="bi bi-exclamation-triangle-fill"></i> 
                {$_error}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            {/if}
            
            {if isset($_mensaje)}

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              
                <div>
                    <i class="bi bi-check-circle-fill"></i> 
                {$_mensaje}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            {/if}

            

            {if Session::get('error')}

                <div class="alert alert-warning alert-dismissible fade show" role="alert">                    
                    <div>
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {Session::get('error')}
                        {Session::destroy('error')}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            {/if}



            {if Session::get('mensaje')}

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        {Session::get('mensaje')}
                        {Session::destroy('mensaje')}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            {/if}

            

            {include file=$_contenido}

            

      </div>

</div>





<!--<link href="{*$_layoutParams.ruta_css*}estilos.css" rel="stylesheet" type="text/css" />-->

        <script src="{$_layoutParams.root}public/js/jquery.js" type="text/javascript"></script>
        
        <script type="text/javascript" src="{$_layoutParams.ruta_js}loading.js"></script>

        <script src="{$_layoutParams.root}public/js/jquery.validate.js" type="text/javascript"></script>

        <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.min.js"></script>
        
        <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.bundle.min.js"></script>

        <script type="text/javascript" src="{$_layoutParams.ruta_js}arriba.js"></script>
        
        <script type="text/javascript" src="{$_layoutParams.ruta_js}notificaciones.js"></script>

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

        

        <script type="text/javascript">

        {if $javascript == 1}

         {$var1}{$array}{$var2}{$dia}{$var3}

        {/if}

        

        {if $javascript == 2}

         {$var1}{$array}{$var2}

        {/if}

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

</html>