<?php /* Smarty version Smarty-3.1.11, created on 2023-07-05 16:52:16
         compiled from "C:\xampp\htdocs\controlqr\modules\errores\views\index\access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104450356364a583a08abae7-08320312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9af5ebc17996d907d30170d681da7e795ca7129' => 
    array (
      0 => 'C:\\xampp\\htdocs\\controlqr\\modules\\errores\\views\\index\\access.tpl',
      1 => 1688484317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104450356364a583a08abae7-08320312',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64a583a0929326_55396357',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64a583a0929326_55396357')) {function content_64a583a0929326_55396357($_smarty_tpl) {?><div class="container">
<h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/login">Iniciar Sesi&oacute;n (colaborador)</a>
| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/logincli">Iniciar Sesi&oacute;n (cliente)</a>

<?php }?>
</div><?php }} ?>