<?php /* Smarty version Smarty-3.1.11, created on 2023-07-04 19:14:21
         compiled from "C:\xampp\htdocs\controlqr\modules\usuarios\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137613704264a4536da9f018-97520808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '591fb32816fa573a7b75ded47b131e2a80a406f9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\controlqr\\modules\\usuarios\\views\\login\\index.tpl',
      1 => 1688484360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137613704264a4536da9f018-97520808',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64a4536dadb752_26638272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64a4536dadb752_26638272')) {function content_64a4536dadb752_26638272($_smarty_tpl) {?><div class="container">
<h2><i class="glyphicon glyphicon-log-in"> </i> Inicio Sesi&oacute;n</h2>
<br/>

<form class="navbar-form pull-left" name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    <div class="loginmodal-container">
            <h1>Ingrese a su cuenta</h1><br>

            <input type="text" name="usuario" placeholder="Usuario" autofocus="">
            <input type="password" name="pass" placeholder="Password">                   

            <input type="submit" name="login" class="login loginmodal-submit glyphicon glyphicon-log-in" value="Entrar">
      <div class="login-help">
            <a href="#">Recordar Password</a>
      </div>
    </div>
</form>
</div><?php }} ?>