<div class="container">
<h3>Lista operadores</h3>
{literal}
    <script type="text/javascript">
    function cb(formObj) {
                if(confirm("¿Está seguro que desea eliminar este operador?")) {
                    return true;                     
                } else {
                    return false;
                }
            }
    </script>
{/literal}
{if $_acl->permiso('crear_operador')}
<p><a class="btn btn-default" href="{$_layoutParams.root}usuarios/gestores/newGestor"><i title="Agregar nueva causa" class="glyphicon glyphicon-plus"></i> Nuevo operador</a></p>
{/if}
<form name="form1" method="post">
<input type="hidden" value="{$_datos.pagina1|default:""}" name="pagina1">
{if isset($gestores) && count($gestores)}
    <table class="table table-bordered">
    <thead>
        <th colspan="9" style="background: #E6E6FA;text-align: center;">Lista operadores</th>
        </thead>
        <thead style="background: #E6E6FA;">
        <td style="font-weight:bold;text-align: center;">Id</td>
        <td style="font-weight:bold;text-align: center;">Nombre</td>  
        <td style="font-weight:bold;text-align: center;">Rol</td> 
        <td style="font-weight:bold;text-align: center;">Estado</td>
        {if $_acl->permiso('editar_operador')}<td style="font-weight:bold;text-align: center;">Edit.</td>{/if}
        {if $_acl->permiso('editar_operador')}<td style="font-weight:bold;text-align: center;">Permisos</td>{/if}        
        {if $_acl->permiso('elim_operador')}<td style="font-weight:bold;text-align: center;">Elim.</td>{/if}
    </thead>
{foreach item=datos from=$gestores}
    
    {if $color == "#F5FFFA"}{assign var="color" value="none"}{else}{assign var="color" value="#F5FFFA"}{/if}
    <tr id="list" style="background:{$color}" onmouseover=style.background="#F0F8FF" onmouseout=style.background="{$color}">
        <td>{$datos.Rut_usu}</td>
        <td>{$datos.Nom_usu}</td>
        <td>{$datos.Nom_role}</td>
        <td style="text-align: center;">{if $datos.Id_estusu == 1}<span class="label label-success"><i title="Activado" class="glyphicon glyphicon-user"></i></span>{else}<span class="label label-danger"><i title="Desactivado" class="glyphicon glyphicon-user"></i></span>{/if}</td>
        {if $_acl->permiso('editar_operador')}<td style="text-align: center;"><a class="btn btn-small glyphicon glyphicon-edit" href="{$_layoutParams.root}usuarios/gestores/editUsuGestor/{$datos.Id_encrypt}"></a></td>{/if}
        {if $_acl->permiso('editar_operador')}<td style="text-align: center;"><a href="{$_layoutParams.root}usuarios/gestores/permisosGestor/{$datos.Id_encrypt}"><i title="Ver permisos" class="glyphicon glyphicon-tasks"></i></a></td>{/if}        
        {if $_acl->permiso('elim_operador')}
        <td style="text-align: center;">
            {if $datos.Posee_cli == 0}
                <a class="btn btn-small glyphicon glyphicon-trash" href="{$_layoutParams.root}usuarios/gestores/elimGestor/{$datos.Id_encrypt}" onclick='return cb(this);'></a>
            {else}
                    <i title="No se puede eliminar" class="glyphicon glyphicon-lock"></i>
            {/if}
        </td>
        {/if}    
    </tr>

{/foreach}
</table>
{else}
            <p><strong>No hay operadores</strong></p>
{/if} 
</form>
{if isset($paginacion1)}{$paginacion1}   {/if}  
{if $_acl->permiso('crear_operador')}
<p><br/><a class="btn btn-default" href="{$_layoutParams.root}usuarios/gestores/newGestor"><i title="Agregar nueva causa" class="glyphicon glyphicon-plus"></i> Nuevo operador</a></p>
{/if}
<br/>
<br/>
<br/>
</div>