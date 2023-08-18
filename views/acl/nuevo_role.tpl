<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}acl/roles">Lista roles</a></li>
        <li class="breadcrumb-item active">Nuevo rol</li>
    </ol>
    </nav>

<h2>Nuevo Rol</h2>

<form name="form1" action="" method="post">
    <input type="hidden" name="guardar" value="1" /> 
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Rol:</label> 
            <input type="text" name="role" value="{$datos.role|default:""}" class="form-control"/>
        </div> 
        <br/>
        <p>
            <a class="btn btn-outline-info" href="{$_layoutParams.root}acl/roles"><i title="Volver" class="bi bi-arrow-return-left"></i> Volver</a>
            <input type="submit" value="Guardar" class="btn btn-primary"/>
        </p>
    </div>
</form>
</div>