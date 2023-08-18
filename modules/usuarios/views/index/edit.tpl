<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}empresa/seccion/index/{$Idempresa_encrypt}">Panel</a></li>
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}usuarios/index/index/{$Idempresa_encrypt}">Lista usuarios colaboradores</a></li>
        <li class="breadcrumb-item active">Editar usuario</li>
    </ol>
    </nav>
        
<h3>Editar usuario</h3>
<h5>Colaborador</h5>
{literal}
    <script type="text/javascript">
    function cb(formObj) {
                if(confirm("¿Está seguro que desea modificar este usuario")) {
                    return true;                     
                } else {
                    return false;
                }
    }
    </script>
{/literal}

<div class="col-lg-4">
<form name="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <input type="hidden" name="id" value="{$datos.Id_usu}" />
    <div class="form-group">
        <label class="control-label">Rut *</label> 
        <input class="form-control" type="text" name="rut" value="{$datos1.rut|default:$datos.Rut_usu}" placeholder="Ingrese Rut usuario" readonly="true"/>       
    </div>    
    <div class="form-group">
        <label class="control-label">Nombre *</label>  
        <input class="form-control" type="text" name="nom" value="{$datos1.nom|default:$datos.Nom_usu}" placeholder="Ingrese nombre empsonal del usuario"/>       
    </div>
    <div class="form-group">
        <label class="control-label">Nombre usuario *</label> 
        <input class="form-control" type="text" name="usu" value="{$datos1.usu|default:$datos.Usu_usu}" placeholder="Ingrese nombre de usuario" readonly="true"/>       
    </div>     
    <div class="form-group">
        <label class="control-label">Email *</label>  
        <input class="form-control" type="text" name="email" value="{$datos1.email|default:$datos.Email_usu}" placeholder="Ingrese email usuario"/>       
    </div>      
    <div class="form-group">
        <label class="control-label">Empleado: </label>
            <select class="form-select" name="emp" id="emp">

                {if $datos.Id_emp != 0}
                    <option value="{$datos.Id_emp}">{$datos.Ape1_emp} {$datos.Ape2_emp} {$datos.Nom1_emp}</option>
                    {foreach from=$emp item=p}
                        {if $p.Id_emp != $datos.Id_emp}
                            <option value="{$p.Id_emp}">{$p.Ape1_emp} {$p.Ape2_emp} {$p.Nom1_emp}</option>
                        {/if}
                    {/foreach}
                {else}
                    <option value="">-Seleccione-</option>
                                 {foreach from=$emp item=p}
                                    <option value="{$p.Id_emp}">{$p.Ape1_emp} {$p.Ape2_emp} {$p.Nom1_emp}</option>
                                 {/foreach}
                {/if}
             </select>            
    </div>
   <div class="form-group">
        <label class="control-label">Rol: </label>
            <select class="form-select" name="role" id="role">

                {if $datos.Id_role != 0}
                    <option value="{$datos.Id_role}">{$datos.Nom_role}</option>
                    {foreach from=$rol item=r}
                        {if $r.Id_role != $datos.Id_role}
                            <option value="{$r.Id_role}">{$r.Nom_role}</option>
                        {/if}
                    {/foreach}
                {else}
                    <option value="">-Seleccione-</option>
                                 {foreach from=$rol item=r}
                                    <option value="{$r.Id_role}">{$r.Nom_role}</option>
                                 {/foreach}
                {/if}
             </select>            
    </div>
    <div class="form-group">
        <label class="control-label">Estado: </label>
            <select class="form-select" name="est" id="est">

                {if $datos.Id_estusu != 0}
                    <option value="{$datos.Id_estusu}">{$datos.Nom_estusu}</option>
                    {foreach from=$est item=e}
                        {if $e.Id_estusu != $datos.Id_estusu}
                            <option value="{$e.Id_estusu}">{$e.Nom_estusu}</option>
                        {/if}
                    {/foreach}
                {else}
                    <option value="">-Seleccione-</option>
                                 {foreach from=$est item=e}
                                    <option value="{$e.Id_estusu}">{$e.Nom_estusu}</option>
                                 {/foreach}
                {/if}
             </select>            
    </div>
 <br/>
 <p><a class="btn btn-outline-info" href="{$_layoutParams.root}usuarios/index/index/{$Idempresa_encrypt}"><i title="Volver" class="bi bi-arrow-return-left"></i> Volver</a>
     <input type="submit" class="btn btn-small btn-primary" value="Editar" onclick='return cb(this);'/></p>

</form>
</div>
</div>
             