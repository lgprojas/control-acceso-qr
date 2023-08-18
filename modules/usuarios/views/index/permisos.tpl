<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}empresa/seccion/index/{$Idempresa_encrypt}">Panel</a></li>
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}usuarios/index/index/{$Idempresa_encrypt}">Lista usuarios colaboradores</a></li>
        <li class="breadcrumb-item active">Permisos usuario colaborador</li>
    </ol>
    </nav>
    
<h3>Permisos de Usuario</h3>
<h5><strong>Colaborador:</strong> {$info.Nom_usu}<br /><strong>Rol:</strong> {$info.Nom_role}</h5>

<div class="col-lg-8">
<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="guardar">
    {if isset($permisos) && count($permisos)}
        <table class="table table-bordered">
            <tr>
                <th style="text-align: center;">Permiso</th>
                <th style="text-align: center;">Estado</th>
            </tr>
            {foreach from=$permisos item=pr}
                {if $role.$pr.valor == 1}
                    {assign var="v" value="habilitado"}
                {else}
                    {assign var="v" value="denegado"}
                {/if}
                <tr>
                    <td>{$usuario.$pr.permiso}</td>
                    <td>
                        <select class="form-control" name="perm_{$usuario.$pr.id}" style="width: 180px;">
                            <option value="x" {if $usuario.$pr.heredado} selected="selected"{/if}>Heredado({$v})</option>
                            <option value="1" {if ($usuario.$pr.valor == 1 && $usuario.$pr.heredado == "")} selected="selected"{/if}>Habilitado</option>
                            <option value=" " {if ($usuario.$pr.valor == "" && $usuario.$pr.heredado == "")} selected="selected"{/if}>Denegado</option>
                        </select>
                    </td>
                </tr>
                {/foreach}
        </table>
        <p><a class="btn btn-outline-info" href="{$_layoutParams.root}usuarios/index/index/{$Idempresa_encrypt}"><i title="Volver" class="bi bi-arrow-return-left"></i> Volver</a>   <input class="btn btn-primary" type="submit" value="guardar"/></p>
        {/if}
</form>
</div>
</div>