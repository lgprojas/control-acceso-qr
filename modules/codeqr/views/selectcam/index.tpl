<div class="container">
   
    <div>
        <div class="btn-group btn-group-toggle mb-1" data-toggle="buttons">
          <label class="btn btn-primary active">
            <input type="radio" name="options" value="1" autocomplete="off"><i class="bi bi-camera-video-fill"></i> Frontal
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
    </div>
</div>
{literal}
    <script>
        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        //alert(content);
        window.location.href=_root_ + 'codeqr/registrar/index/'+content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){//posee al menos una
            if(cameras.length == 2){
                scanner.start(cameras[1]);//cambiar a 1 para partir con cam trasera
            }else{
                scanner.start(cameras[0]);    
            }
            
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0] != false){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1] != false){
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
{/literal}
