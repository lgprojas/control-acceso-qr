<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}acl/permisos">Lista permisos colaborador</a></li>
        <li class="breadcrumb-item active">Nuevo permiso</li>
    </ol>
    </nav>
        
<h2>Nuevo Permiso</h2>

<form name="form1" action="" method="post">
    <input type="hidden" name="guardar" value="1" />
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Nombre permiso:</label>
            <input type="text" name="nom_perm" value="{$datos.nom_perm|default:""}" class="form-control"/>
        </div> 
        <div class="form-group">
            <label class="control-label">Key permiso: </label>
            <input type="text" name="key_perm" value="{$datos.key_perm|default:""}" class="form-control"/>
        </div>
        <br/>
        <p>
            <a class="btn btn-outline-info" href="{$_layoutParams.root}acl/permisos"><i title="Volver" class="bi bi-arrow-return-left"></i> Volver</a>   
            <input type="submit" value="Guardar" class="btn btn-primary"/>
        </p>
    </div>
</form>
</div>