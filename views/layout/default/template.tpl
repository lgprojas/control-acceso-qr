<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{$titulo|default:"Sin titulo"}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="{$_layoutParams.ruta_css}estilos.css" rel="stylesheet" type="text/css" />
        <script src="{$_layoutParams.root}public/js/jquery.js" type="text/javascript"></script>
        <script src="{$_layoutParams.root}public/js/jquery.validate.js" type="text/javascript"></script>
       <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
        <script src="http://malsup.github.com/jquery.form.js"></script> -->
        {if isset($_layoutParams.css) && count($_layoutParams.css)}
        {foreach item=css from=$_layoutParams.css}
        
        <link href="{$css}" rel="stylesheet" type="text/css" />
        
        {/foreach}
        {/if}
        <style type="text/css">
        *{
            padding: 0px;
            margin: 0px;
        }
        #header1{
            margin: auto;
            width: 50px;
            font-family: Arial, Helvetica, sans-serif;           
        }
        ul, ol{
            list-style: none;
        }
        .nav li a {
            background: #6699CC;/* color menu*/
            color: #fff;/* color letra menu*/
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
                border-radius: 15px;
        }
        .nav li a:hover{
            background-color:#999999;
        }
        .nav > li {
            float: left;
        }
         .nav li ul {
            display:none;
            position: absolute;
            min-width: 140px;
        }
        .nav li:hover > ul {
            display:  block;
        }
        .nav li ul li {
            position: relative;
        }
        .nav li ul li ul {
            right: -140px;
            top:0px;
        }
        </style>
        {if isset($_layoutParams.js) && count($_layoutParams.js)}
        {foreach item=js from=$_layoutParams.js}
        
        <script src="{$js}" type="text/javascript"></script>
        
        {/foreach}
        {/if}
    
    </head>
    <body>
<div id="main">
    <div id="header">
        <div id="logo">
            <h1>{$_layoutParams.configs.app_name}</h1>
        </div>
        
<div id="menu">
<!--<div id="top_menu">-->

    <ul class="nav">
        {if isset($_layoutParams.menu[0].home1.sub1) && count($_layoutParams.menu[0].home1.sub1)}
            <li><a  href="{$_layoutParams.menu[0].home1.sub1.enlace}"><img src="{$_layoutParams.root}public/img/all/home.png" width="15" height="15"/>{$_layoutParams.menu[0].home1.sub1.titulo}</a>
                    <ul>    
                            <li><a  href="{$_layoutParams.menu[0].home.sub1.enlace}">{$_layoutParams.menu[0].home.sub1.titulo}</a></li>
                            <li><a  href="">{$_layoutParams.menu[0].home.sub2.titulo}</a></li>
                    </ul>                                  
            </li>     
            <li><a  href=""><img src="{$_layoutParams.root}public/img/all/usuarios.png" width="15" height="15"/>{$_layoutParams.menu[1].gest1}</a>
                    <ul>    
                            <li><a  href="{$_layoutParams.menu[1].gest.sub1.enlace}">{$_layoutParams.menu[1].gest.sub1.titulo}</a></li>
                            <li><a  href="{$_layoutParams.menu[1].gest.sub2.enlace}">{$_layoutParams.menu[1].gest.sub2.titulo}</a></li>
                            <li><a  href="{$_layoutParams.menu[1].gest.sub3.enlace}">{$_layoutParams.menu[1].gest.sub3.titulo}</a></li> 
                    </ul>
                                  
            </li>
            <li><a  href="">{$_layoutParams.menu[2].labor1}</a>
                    <ul>    
                            <li><a  href="{$_layoutParams.menu[2].labor.sub1.enlace}">{$_layoutParams.menu[2].labor.sub1.titulo}</a></li>
                            <li><a  href="{$_layoutParams.menu[2].labor.sub2.enlace}">{$_layoutParams.menu[2].labor.sub2.titulo}</a></li>
                    </ul>
                                  
            </li>
            <li><a  href=""><img src="{$_layoutParams.root}public/img/all/buscar.png" width="15" height="15"/>{$_layoutParams.menu[3].buscar1}</a>
                    <ul>    
                            <li><a  href="{$_layoutParams.menu[3].buscar.sub1.enlace}">{$_layoutParams.menu[3].buscar.sub1.titulo}</a></li>
                            <li><a  href="{$_layoutParams.menu[3].buscar.sub2.enlace}">{$_layoutParams.menu[3].buscar.sub2.titulo}</a></li>
                            <li><a  href="{$_layoutParams.menu[3].buscar.sub3.enlace}">{$_layoutParams.menu[3].buscar.sub3.titulo}</a></li>
                    </ul>
                                  
            </li>
           
          {/if}
          <li><a  style="background: #E6E6FA; color: #2F4F4F" href="{$_layoutParams.menu[5].ses.sub1.enlace}">{$_layoutParams.menu[5].ses.sub1.titulo}</a></li> 
            
            
    </ul>
<!--</div>-->
</div>

    </div>
    <div id="content">
        <h2>{$titulo1|default:""}</h2>
        <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>

        {if isset($_error)}
        <div id="error">{$_error}</div><!--muestra los errores -->
        {/if}

    {if isset($_mensaje)}
    <div id="mensaje">{$_mensaje}</div><!--//muestra los mensajes -->
    {/if}

    {include file=$_contenido}

                </div>

<div id="footer">
    Copyright &copy; LGPRojas 2012 <a href="http://www.sac.cl" target="_blank">{$_layoutParams.configs.app_company}</a>
</div>
</div>
</body>
</html>