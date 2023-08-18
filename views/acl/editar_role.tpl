<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}acl/roles">Lista roles</a></li>
        <li class="breadcrumb-item active">Editar rol</li>
    </ol>
    </nav>
        
<h2>Editar rol</h2>
<form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Nombre role:</label>
            <input type="texto" name="nom_role" value="{if isset($datos.Nom_role)}{$datos.Nom_role}{/if}" style="width:180px;" class="form-control"/>
        </div>
        <br/>
        <p>
            <a class="btn btn-outline-info" href="{$_layoutParams.root}acl/roles"><i title="Volver" class="bi bi-arrow-return-left"></i> Volver</a>
            <input type="submit" class="btn btn-primary" value="Guardar" />
        </p>
    </div>
</form>
</div>