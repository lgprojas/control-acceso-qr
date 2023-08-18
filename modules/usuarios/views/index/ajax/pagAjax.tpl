{if isset($usuarios) && count($usuarios)}
<table class="table table-bordered">
    <thead style="background: #E6E6FA;">
        <th style="text-align: center;">ID</th>
        <th style="text-align: center;">Usuario</th>
        <th style="text-align: center;">Role</th>
        <th style="text-align: center;">Condominio</th>
        <th style="text-align: center;">Est.</th>
        <th style="text-align: center;">Editar</th>
        <th style="text-align: center;">Permisos</th>
    </thead>
    </tr>
    
    {foreach item=us from=$usuarios}
        {if $color == "#F5FFFA"}{assign var="color" value="none"}{else}{assign var="color" value="#F5FFFA"}{/if}
        <tr id="list" style="background:{$color}" onmouseover=style.background="#F0F8FF" onmouseout=style.background="{$color}">
            <td>{$us.Id_usu}</td>
            <td>{$us.Nom_usu}</td>
            <td>{$us.Nom_role}</td>
            <td style="text-align: center;">{if $us.Nom_cond == ""}Ninguno{else}{$us.Nom_cond}{/if}</td>
            <td style="text-align: center;">{if $us.Id_estusu == 1}<span class="label label-success"><i title="Activado" class="glyphicon glyphicon-user"></i></span>{else}<span class="label label-danger"><i title="Desactivado" class="glyphicon glyphicon-user"></i></span>{/if}</td>
            <td style="text-align: center;"><a href="{$root}usuarios/index/editUsu/{$us.Id_usu}"><i title="Editar datos usuario" class="glyphicon glyphicon-edit"></i></a></td>
            <td style="text-align: center;"><a href="{$root}usuarios/index/permisos/{$us.Id_usu}"><i title="Ver permisos" class="glyphicon glyphicon-tasks"></i></a></td>            
        </tr>        
    {/foreach}
    
</table>
{else}
            <p><strong>No hay usuarios registrados!</strong></p>
{/if}

{$paginacion1|default:""}