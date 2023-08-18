<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Lista movimientos</li>
    </ol>
    </nav>
<h4>Movimientos</h4>
<h5></h5>
{literal}

{/literal}

<div class="row row-cols-1 row-cols-lg-12 p-3">
    <form id="form1" class="form-inline row">
        
        <div class="col-sm-4 bg-light p-2">
            <label class="control-label">Tipo mov: </label>
        <select id="t" name="t" class="form-select">
            <option value=""> - seleccione tipo - </option>
            {foreach from=$tmov item=t}
                <option value="{$t.a}">{$t.b}</option>
            {/foreach}
        </select>
        </div>
        <div class="col-sm-4 bg-light p-2">
            <label class="control-label">Patente: <input type="text" name="p" id="p" class="form-control" placeholder="Escriba patente"></label>
        <button type="button" id="btnEnviarA" class="btn btn-light" style="border: 1px solid #d6dbdf;"><i class="bi bi-search"></i></button>
        </div>
        <div class="col-sm-4 bg-light p-2">
            <label class="control-label">Entidad: </label>
        <select id="e" name="e" class="form-select">
            <option value=""> - seleccione entidad - </option>
            {foreach from=$enti item=e}
                <option value="{$e.a}">{$e.b}</option>
            {/foreach}
        </select>
        </div>
    </form>
</div>


<div id="lista_registros">
<form name="form1" method="post">
<input type="hidden" value="{$_datos.pagina1|default:""}" name="pagina1">
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
</form>
{if isset($paginacion1)}{$paginacion1}   {/if} 
</div>
{*if $acctran=="1"}
{if $_acl->permiso('crear_cli')*}
<p><br/><a class="btn btn-outline-secondary" href="{$_layoutParams.root}transa/cli/newCli/{$Idempresa_encrypt}"><i title="Agregar nuevo cliente" class="bi bi-plus"></i> Nuevo cliente</a></p>
{*/if}
{/if*}
</div>