<div class="container">
<h2>Administracion de permisos</h2>
<p><a class="btn btn-outline-secondary" href="{$_layoutParams.root}acl/nuevo_permiso">Nuevo Permiso</a></p>
{if isset($permisos) && count($permisos)}
    <table class="table table-condensed">
    <tr>
        <th>ID</th>
        <th>Permiso</th>
        <th>Llave</th>
        <th></th>
    </tr>   
    {foreach item=rl from=$permisos}
        <tr>
            <td>{$rl.Id_perm}</td>
            <td>{$rl.Nom_perm}</td>
            <td>{$rl.Key_perm}</td>
            <td><a href="{$_layoutParams.root}acl/editar_permiso/{$rl.Id_perm}">Editar</a></td>
        </tr>     
    {/foreach}   
</table>
{else}
    <p><strong>No hay permisos registrados.</strong></p>
{/if}
<p><a class="btn btn-outline-secondary" href="{$_layoutParams.root}acl/nuevo_permiso">Nuevo Permiso</a></p>
</div>