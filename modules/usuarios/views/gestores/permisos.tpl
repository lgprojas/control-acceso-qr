<div class="container">
    <ol class="breadcrumb">
        <li><a href="{$_layoutParams.root}usuarios/gestores">Lista operadores</a></li>
        <li class="active">Editar permisos</li>
    </ol>
<h3>Permisos del Operador</h3>

<h4><strong>Usuario:</strong> {$info.Nom_usu}<br /><strong>Rol:</strong> {$info.Nom_role}</h4>
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
        <p><a class="btn btn-default" href="{$_layoutParams.root}usuarios/gestores"><i title="Volver" class="glyphicon glyphicon-chevron-left">Volver</i></a>   <input class="btn btn-primary" type="submit" value="guardar"/></p>
        {/if}
</form>
</div>
</div>