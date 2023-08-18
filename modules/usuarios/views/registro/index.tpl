<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}empresa/seccion/index/{$Idempresa_encrypt}">Panel</a></li>
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}usuarios/index/index/{$Idempresa_encrypt}">Lista usuarios colaboradores</a></li>
        <li class="breadcrumb-item active">Registro usuario</li>
    </ol>
    </nav>
        
<h4>Registro usuario</h4>
<h5>Colaborador</h5>
<br/>
<form name="form1" class="" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    <input type="hidden" id='empresa' value="{$Idempresa_encrypt}"/>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Colaborador:</label>                
            <select name="emp" id='emp' class="form-select">  
                <option value="">-Seleccione-</option>
            {foreach from=$emp item=e}
                <option value="{$e.Id_emp}">{$e.Nom_emp}</option>
            {/foreach}
            </select>
        </div>   
        <div class="form-group">
            <label class="control-label">RUN: </label><input type="text" id="run" name="run" value="{$datos.run|default:""}" placeholder="Ingrese RUN" class="form-control"/>        
        </div>
        <div class="form-group">
            <label class="control-label">Nombre: </label><input type="text" id="nombre" name="nombre" value="{$datos.nombre|default:""}" placeholder="Ingrese su nombre" class="form-control"/>      
        </div>    
        <div class="form-group">
            <label class="control-label">Usuario: </label><input type="text" id="usuario" name="usuario" value="{$datos.usuario|default:""}" placeholder="Ingrese nombre usuario (RUN)" class="form-control"/>       
        </div>   
        <div class="form-group">
            <label class="control-label">Email: </label><input type="text" id="email" name="email" value="{$datos.email|default:""}" placeholder="Ingrese email" class="form-control"/>       
        </div> 
        <div class="form-group">
            <label class="control-label">Contraseña: </label><input type="password" name="pass" placeholder="Ingrese constraseña" class="form-control"/>    
        </div>   
        <div class="form-group">
            <label class="control-label">Confirmar: </label><input type="password" name="confirmar" placeholder="Reingrese contraseña" class="form-control"/>       
        </div>                
        <div class="form-group">
            <label class="control-label">Rol:</label>
            <select name="role" class="form-select">   
                    {foreach from=$role item=r}
                        <option value="{$r.Id_role}">{$r.Nom_role}</option>
                    {/foreach}
            </select>
        </div> 
            <br/>
        <div class="row p-2">         
            <p><a class="btn btn-outline-info" href="{$_layoutParams.root}usuarios/index/index/{$Idempresa_encrypt}"><i class="bi bi-arrow-return-left"></i> Volver</a>   <input class="btn btn-primary" type="submit" value="Crear" /></p>
        </div>
    </div>
</form>
</div>

 