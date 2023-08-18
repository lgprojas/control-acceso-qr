<div class="container">
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
{literal}
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
{/literal}
