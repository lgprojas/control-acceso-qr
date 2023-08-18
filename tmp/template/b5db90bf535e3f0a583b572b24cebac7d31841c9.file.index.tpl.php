<?php /* Smarty version Smarty-3.1.11, created on 2023-07-06 22:04:35
         compiled from "C:\xampp\htdocs\controlqr\modules\codeqr\views\selectcam\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101481713764a6d8b0021227-35605376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5db90bf535e3f0a583b572b24cebac7d31841c9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\controlqr\\modules\\codeqr\\views\\selectcam\\index.tpl',
      1 => 1688673845,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101481713764a6d8b0021227-35605376',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64a6d8b0129d96_56028272',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64a6d8b0129d96_56028272')) {function content_64a6d8b0129d96_56028272($_smarty_tpl) {?><div class="container">
   
    <div>
        <div class="btn-group btn-group-toggle mb-1" data-toggle="buttons">
          <label class="btn btn-primary active">
            <input type="radio" name="options" value="1" autocomplete="off" checked><i class="bi bi-camera-video-fill"></i> Frontal
          </label>
          <label class="btn btn-secondary">
            <input type="radio" name="options" value="2" autocomplete="off"><i class="bi bi-camera-video"></i> Trasera
          </label>
        </div>
    </div>
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
        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        //alert(content);
        window.location.href=_root_ + 'codeqr/registrar/index/'+content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
    </script>

<?php }} ?>