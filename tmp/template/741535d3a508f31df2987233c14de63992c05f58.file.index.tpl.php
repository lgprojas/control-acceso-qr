<?php /* Smarty version Smarty-3.1.11, created on 2023-07-06 17:07:21
         compiled from "C:\xampp\htdocs\controlqr\modules\codeqr\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211831901964a6d8a9b25aa8-67710584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '741535d3a508f31df2987233c14de63992c05f58' => 
    array (
      0 => 'C:\\xampp\\htdocs\\controlqr\\modules\\codeqr\\views\\index\\index.tpl',
      1 => 1688655808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211831901964a6d8a9b25aa8-67710584',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64a6d8a9dce1b2_16256407',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64a6d8a9dce1b2_16256407')) {function content_64a6d8a9dce1b2_16256407($_smarty_tpl) {?><div class="container">
    <div>Hola web cam</div>
        <br>
    <div class="row">
        <div class="col-md-6">
            <video id="preview" width="100%"></video>
        </div>
        <form id="form" method="post">
            <div class="col-md-6">
                <label>Código:</label>
                <input type="text" name="text" id="text" readonly="" class="form-control"/>
            </div>
        </form>
    </div>
</div>

    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            }else{
                alert('No se encontraron cámaras');
            }

        }).catch(function(e){
            console.error(e);
        });

        scanner.addListener('scan',function(c){
        document.getElementById('text').value=c;
        
        /*Para guardar directamente a la BD*/
        document.forms[0].submit();
        /*Para guardar directamente a la BD*/
        });
    </script>

<?php }} ?>