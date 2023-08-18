<?php /* Smarty version Smarty-3.1.11, created on 2023-07-06 23:34:37
         compiled from "C:\xampp\htdocs\controlqr\modules\codeqr\views\registrar\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40250319464a71af392b1f2-52923684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c674dc425e18d1de66acffb6e503f3a6a4c73cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\controlqr\\modules\\codeqr\\views\\registrar\\index.tpl',
      1 => 1688679274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40250319464a71af392b1f2-52923684',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64a71af40117b1_27596417',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'cod' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64a71af40117b1_27596417')) {function content_64a71af40117b1_27596417($_smarty_tpl) {?><div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
transa/trib">Lista tribunales</a></li>
        <li class="breadcrumb-item active">Editar tribunal</li>
    </ol>
    </nav>
<h3>Datos del vehículo</h3>
<h5>Patente: <?php echo $_smarty_tpl->tpl_vars['cod']->value;?>
</h5>
<h3></h3>

    <script type="text/javascript">
    function cb(formObj) {
                if(confirm("¿Está seguro que desea registrar este movimiento?")) {
                    return true;                     
                } else {
                    return false;
                }
            }
    </script>

<div class="col-md-4">
<form name="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
       
    <fieldset>
    <legend></legend>
    <div class="form-horizontal well col-lg-12 small">
    <div class="form-group p-2">
        <label class="control-label">Patente:</label>
        <input class="form-control" type="text" name="cod" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['Pat_vehi'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['Pat_vehi'];?>
<?php }?>" readonly="" />
    </div>
    
    <div class="form-group p-2">
         <label class="control-label">Marca/Modelo: </label>
         <input class="form-control" type="text" name="nota" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['Nom_marca'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['datos']->value['Nom_marca'] : $tmp);?>
 / <?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['Nom_modelo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['datos']->value['Nom_modelo'] : $tmp);?>
"/>      
    </div>
    <div class="form-group p-2">
         <label class="control-label">Conductor(a): </label>
         <input class="form-control" type="text" name="nota" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['Nom_emp'];?>
"/>      
    </div>
    <div class="form-group p-2">
         <label class="control-label">Entidad: </label>
         <input class="form-control" type="text" name="nota" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['Nom_entidad'];?>
"/>      
    </div>
    <div class="form-group p-2">
         <label class="control-label">Relación con Entidad: </label>
         <input class="form-control" type="text" name="nota" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['Nom_rentidad'];?>
"/>      
    </div>
    
    <label for="from">Llegada:</label>
                <input type="text" id="from" name="from" style="width: 110px;margin: 5px;" class="form-control" readonly="readonly">
                </div>
                <div class="form-group col-lg-2">
                <label for="to">Salida:</label>
                <input type="text" id="to" name="to" style="width: 110px;margin: 5px;" class="form-control" readonly="readonly" disabled="true">
                </div>
                <div class="form-group col-lg-1" style="padding: 20px;">
                    <button type="button" id="reset" class="btn btn-light"><i class="bi bi-arrow-repeat"></i></button>
                </div>
    
    </div>
    </fieldset>
    <br/>
    <br/>
    <div class="form-group p-2">
        <a class="btn btn-outline-info" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
transa/trib"><i title="Volver" class="bi bi-arrow-return-left"> Volver</i></a>
        <input type="submit" class="btn btn-outline-primary" value="Registrar" onclick='return cb(this);'/>
    </div>
    <br>
    <br>
    <br>
</form>
</div>
</div>
<?php }} ?>