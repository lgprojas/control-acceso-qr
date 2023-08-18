{if isset($mov) && count($mov)}
    <table class="table table-bordered">
    <thead>
        <th colspan="10" style="background: #E6E6FA;text-align: center;">Listado de movimientos</th>
        </thead>
        <thead style="background: #E6E6FA;">
        <td style="font-weight:bold;text-align: center;">Id</td>
        <td style="font-weight:bold;text-align: center;">Entidad</td>
        <td style="font-weight:bold;text-align: center;">Fch</td>      
        <td style="font-weight:bold;text-align: center;">Tipo</td>
        <td style="font-weight:bold;text-align: center;">Patente</td>
    </thead>
{foreach item=datos from=$mov}
    
    {if $color == "#F5FFFA"}{assign var="color" value="none"}{else}{assign var="color" value="#F5FFFA"}{/if}
    <tr id="list" style="background:{$color}" onmouseover=style.background="#F0F8FF" onmouseout=style.background="{$color}">
        <td style="text-align: center;">{$datos.Id_mov}</td>
        <td style="text-align: center;">{$datos.Nom_entidad}</td>
        <td style="text-align: center;">{$datos.Fch_mov}</td>        
        <td style="text-align: center;">{$datos.Nom_tmov}</td>
        <td style="text-align: center;">{$datos.Pat_vehi}</td>
    </tr>

{/foreach}
</table>
{else}
            <p><strong>No hay movimientos registrados!</strong></p>
{/if} 

{$paginacion1|default:""}