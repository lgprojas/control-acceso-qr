<div class="container">
<h2>Administración de roles</h2>
<p><a href="{$_layoutParams.root}acl/nuevo_role" class="btn btn-outline-secondary">Nuevo Rol</a></p>
{if isset($roles) && count($roles)}
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        {foreach item=rl from=$roles}
        <tr>
            <td>{$rl.Id_role}</td>
            <td>{$rl.Nom_role}</td>
            <td style="text-align: center;"><a href="{$_layoutParams.root}acl/permisos_role/{$rl.Id_role}">Permisos</a></td>
            <td style="text-align: center;"><a href="{$_layoutParams.root}acl/editar_role/{$rl.Id_role}">Editar</a></td>
        </tr>
        {/foreach}
    </table>
    {/if}
    
    <p><a href="{$_layoutParams.root}acl/nuevo_role" class="btn btn-outline-secondary">Nuevo Rol</a></p>
</div>