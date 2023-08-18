<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}acl/permisos">Lista permisos colaborador</a></li>
        <li class="breadcrumb-item active">Editar permiso</li>
    </ol>
    </nav>

<h2>Editar Permiso</h2>
<form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Nombre permiso:</label>
            <input type="texto" name="nom_perm" value="{if isset($datos.Nom_perm)}{$datos.Nom_perm}{/if}" style="width:180px;" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label">Key permiso:</label>
            <input type="texto" name="key_perm" value="{if isset($datos.Key_perm) }{$datos.Key_perm}{/if}" class="form-control"/>
        </div>  
        <br/>
        <p>
            <a class="btn btn-outline-info" href="{$_layoutParams.root}acl/permisos"><i title="Volver" class="bi bi-arrow-return-left"></i> Volver</a>  
            <input type="submit" class="btn btn-primary" value="Guardar" />
        </p>
    </div>
</form>
</div>