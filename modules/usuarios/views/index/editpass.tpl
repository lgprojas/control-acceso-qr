<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}empresa/seccion/index/{$Idempresa_encrypt}">Panel</a></li>
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}usuarios/index/index/{$Idempresa_encrypt}">Lista usuarios colaboradores</a></li>
        <li class="breadcrumb-item active">Editar password usuario</li>
    </ol>
    </nav>
        
<h3>Editar Password</h3>
<h5>Colaborador</h5>
{literal}
    <script type="text/javascript">
    function cb(formObj) {
                if(confirm("¿Está seguro que desea modificar este password?")) {
                    return true;                     
                } else {
                    return false;
                }
    }
    </script>
{/literal}

<div class="col-lg-10">
<form name="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />    
    <div class="form-group col-lg-5 row">
        <div class="form-group col-lg-8">
        <label class="control-label">Contraseña *</label>  
        <input class="form-control" type="password" id="pass1" name="pass1" value="{$datos1.pass1|default:""}" placeholder="Ingrese nueva contraseña" onKeypress="return valPass(event);" maxlength="10"/>       
        </div>
        <div style="display: flex;align-items: center;" class="col-lg-1" id="valida1"></div>
    </div>      
    <div class="form-group col-lg-5 row">
        <div class="form-group col-lg-8">
        <label class="control-label">Repetir Contraseña *</label>  
            <input class="form-control" type="password" id="pass2" name="pass2" value="{$datos1.pass2|default:""}" placeholder="Repita nueva contraseña" onKeypress="return valPass(event);" maxlength="10"/>       
        </div>
        <div style="display: flex;align-items: center;" class="col-lg-1" id="valida2"></div>
    </div>          
     <br/>
     <div class="form-group">
     <a class="btn btn-outline-info" href="{$_layoutParams.root}usuarios/index/index/{$Idempresa_encrypt}"><i title="Volver" class="bi bi-arrow-return-left"></i> Volver</a>
         <input type="submit" class="btn btn-small btn-primary" value="Editar" onclick='return cb(this);'/></p>
     </div>
</form>
</div>
<div class="form-group">
<label class="control-label">Nota *</label>
<div style="font-size: 11px;">El password debe poseer por seguridad mínimo 8 y máximo 10 caracteres.</div>
<div style="font-size: 11px;">Caracteres aceptados: a-z A-Z 0-9 y - _</div>
</div>
</div>
             