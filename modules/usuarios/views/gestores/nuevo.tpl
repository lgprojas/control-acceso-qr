<div class="container">
    <ol class="breadcrumb">
        <li><a href="{$_layoutParams.root}usuarios/gestores">Lista operadores</a></li>
        <li class="active">Registro operador</li>
    </ol>
<h2>Registro Usuario Operador</h2>
<br/>
<form name="form1" class="" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    <div class="col-md-4">
        <div class="row">
            <div class="col-xs-7">
                <label class="control-label">Rut:
                <input type="text" name="rut" value="{$datos.rut|default:""}" style="width: 130px;" placeholder="Ej: 05298981-4" onKeyUp="Vrut(this.value);" maxlength="10" autofocus="" class="form-control"/>         
                </label>
            </div>  
            <div class="col-xs-2" id="Verificacion" style="color: #1E549B;padding-top: 30px;" title="Indica ID si es valida"></div>
        </div>
        <div class="form-group">
            <label class="control-label">Nombre: </label><input type="text" name="nombre" value="{$datos.nombre|default:""}" placeholder="Ingrese su nombre" class="form-control"/>      
        </div>    
        <div class="form-group">
            <label class="control-label">Usuario: </label><input type="text" name="usuario" value="{$datos.usuario|default:""}" placeholder="Ingrese nombre usuario (RUN)" class="form-control"/>       
        </div>   
        <div class="form-group">
            <label class="control-label">Email: </label><input type="text" name="email" value="{$datos.email|default:""}" placeholder="Ingrese email" class="form-control"/>       
        </div> 
        <div class="form-group">
            <label class="control-label">Contraseña: </label><input type="password" name="pass" placeholder="Ingrese constraseña" class="form-control"/>    
        </div>   
        <div class="form-group">
            <label class="control-label">Confirmar: </label><input type="password" name="confirmar" placeholder="Reingrese contraseña" class="form-control"/>       
        </div>  
        <div class="form-group">
            <label class="control-label">Persona: <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Lista sólo personas que no poseen actualmente un usuario."></i></label>
            <select name="per" id="per" class="form-control">  
                <option value="">-Seleccione-</option>
                {foreach from=$per item=p}                    
                        <option value="{$p.Id_emp}">{$p.Nom1_emp} {$p.Nom2_emp} {$p.Ape1_emp} {$p.Ape2_emp}</option>
                    {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Role: <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Lista sólo Roles definidos por el comité."></i></label>
            <select name="role" id="role" class="form-control"> 
                {foreach from=$role item=r}
                        <option value="{$r.Id_role}">{$r.Nom_role}</option>
                    {/foreach}
            </select>
        </div>            
        <div class="form-group">
            <label class="control-label">Estado:</label>
            <select name="estusu" class="form-control">   
                    {foreach from=$estusu item=e}
                        <option value="{$e.Id_estusu}">{$e.Nom_estusu}</option>
                    {/foreach}
            </select>
        </div> 
        <div class="form-group">            
            <p><a class="btn btn-default" href="{$_layoutParams.root}usuarios/gestores"><i title="Volver" class="glyphicon glyphicon-chevron-left">Volver</i></a>   <input id="newAdd" class="btn btn-small btn-primary" type="submit" value="Crear" /></p>
        </div>
        <br>
    </div>
</form>
</div>

 