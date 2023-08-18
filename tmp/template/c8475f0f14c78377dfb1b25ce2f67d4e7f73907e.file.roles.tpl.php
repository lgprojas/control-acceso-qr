<?php /* Smarty version Smarty-3.1.11, created on 2023-07-04 19:17:23
         compiled from "C:\xampp\htdocs\controlqr\views\acl\roles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139733117464a454233fa9e3-29324328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8475f0f14c78377dfb1b25ce2f67d4e7f73907e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\controlqr\\views\\acl\\roles.tpl',
      1 => 1688484498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139733117464a454233fa9e3-29324328',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'roles' => 0,
    'rl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64a45423463289_22154102',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64a45423463289_22154102')) {function content_64a45423463289_22154102($_smarty_tpl) {?><div class="container">
<h2>Administración de roles</h2>
<p><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/nuevo_role" class="btn btn-outline-secondary">Nuevo Rol</a></p>
<?php if (isset($_smarty_tpl->tpl_vars['roles']->value)&&count($_smarty_tpl->tpl_vars['roles']->value)){?>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['rl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->key => $_smarty_tpl->tpl_vars['rl']->value){
$_smarty_tpl->tpl_vars['rl']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['Id_role'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['Nom_role'];?>
</td>
            <td style="text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos_role/<?php echo $_smarty_tpl->tpl_vars['rl']->value['Id_role'];?>
">Permisos</a></td>
            <td style="text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/editar_role/<?php echo $_smarty_tpl->tpl_vars['rl']->value['Id_role'];?>
">Editar</a></td>
        </tr>
        <?php } ?>
    </table>
    <?php }?>
    
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/nuevo_role" class="btn btn-outline-secondary">Nuevo Rol</a></p>
</div><?php }} ?>