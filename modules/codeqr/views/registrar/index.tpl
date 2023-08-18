<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}codeqr/selectcam">Scan QR</a></li>
        <li class="breadcrumb-item active">Registrar movimiento</li>
    </ol>
    </nav> 
<h3>Datos del vehículo</h3>
<h5>Patente: {$cod}</h5>
<h3></h3>
{literal}
    <script type="text/javascript">
    function cb(formObj) {
                if(confirm("¿Está seguro que desea registrar este movimiento?")) {
                    return true;                     
                } else {
                    return false;
                }
            }
    </script>
{/literal}
<div class="col-md-4">
<form name="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
       
    <fieldset>
    <legend></legend>
    <div class="form-horizontal well col-lg-12 small">
        <div class="form-group p-2">
            <label class="control-label">Patente:</label>
            <input class="form-control" type="text" name="cod" value="{if isset($datos.Pat_vehi)}{$datos.Pat_vehi}{/if}" readonly="" />
        </div>

        <div class="form-group p-2">
             <label class="control-label">Marca/Modelo: </label>
             <input class="form-control" type="text" name="nota" value="{$datos.Nom_marca|default:$datos.Nom_marca} / {$datos.Nom_modelo|default:$datos.Nom_modelo}"/>      
        </div>
        <div class="form-group p-2">
             <label class="control-label">Conductor(a): </label>
             <input class="form-control" type="text" name="nota" value="{$datos.Nom_emp}"/>      
        </div>
        <div class="form-group p-2">
             <label class="control-label">Entidad: </label>
             <input class="form-control" type="text" name="nota" value="{$datos.Nom_entidad}"/>      
        </div>
        <div class="form-group p-2">
             <label class="control-label">Relación con la Entidad: </label>
             <input class="form-control" type="text" name="nota" value="{$datos.Nom_rentidad}"/>      
        </div>
        <div class="form-group p-2">
             <label for="from">Fecha/hora:</label>
             <input type="text" id="" name="fechahora" value="{$fechahora}" style="width: 200px;margin: 5px;" class="form-control" readonly="readonly">
        </div>
    </div>
    </fieldset>
    <br/>
    <br/>
    <div class="form-group p-2">

    <a class="btn btn-outline-primary position-relative btn-sm" data-toggle="modal" data-target="#modal_entrada"><i title="Registrar entrada" class="bi bi-clipboard-check"></i> Entrada</a>
    <a class="btn btn-outline-dark position-relative btn-sm" data-toggle="modal" data-target="#modal_salida"><i title="Registrar salida" class="bi bi-clipboard-check"></i> Salida</a>
    <a class="btn btn-outline-warning position-relative btn-sm" data-toggle="modal" data-target="#modal_observacion"><i title="Registrar observación" class="bi bi-clipboard-check"></i> Observación</a>
    </div>
    <br>
    <br>
    <br>
</form>
</div>
<!-- Modals -->
<form name="form_entrada" id="form_entrada">
<div class="modal fade" id="modal_entrada">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registrar entrada</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>            
        <div class="modal-body">
            <div class="col-lg-8">
                <input type="hidden" id="e-idv" value="{$datos.Id_vehi}" />
                <div class="form-group col-6 p-2">
                    <label for="from">Movimiento:</label>
                    <select class="form-select" id="e-idtm" aria-label="Disabled select example" disabled>
                        <option value="1">Entrada</option>
                    </select>
                </div>
                <div class="form-group col-6 p-2">
                    <label for="from">Fecha/hora:</label>
                    <input type="text" id="e-fchm" name="fchm" value="{$fechahora}" class="form-control" readonly="readonly">
                </div>
                <div class="row row-cols-1 row-cols-lg-12 p-2" style="background:#F5F5F5;border-radius: 5px;">
                    <textarea class="form-control" id="e-nota" id="example" rows="3" cols="4" placeholder="Agregue una nota si lo requiere.."></textarea>
                </div>
            </div>        
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
            <button type="button" id="btn_save_entrada" class="btn btn-primary m-3" style="">Registrar</button>
            <button type="button" id="limpiar_modal1" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>   
</div>
</form>
                
<form name="form_salida" id="form_salida">                
<div class="modal fade" id="modal_salida">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registrar salida</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>            
        <div class="modal-body">
            <div class="col-lg-8">
                <input type="hidden" id="s-idv" value="{$datos.Id_vehi}" />
                <div class="form-group col-6 p-2">
                    <label for="from">Movimiento:</label>
                    <select class="form-select" id="s-idtm" aria-label="Disabled select example" disabled>
                        <option value="2">Salida</option>
                    </select>
                </div>
                <div class="form-group col-6 p-2">
                    <label for="from">Fecha/hora:</label>
                    <input type="text" id="s-fchm" name="fchm" value="{$fechahora}" class="form-control" readonly="readonly">
                </div>
                <div class="row row-cols-1 row-cols-lg-12 p-2" style="background:#F5F5F5;border-radius: 5px;">
                    <textarea class="form-control" name="nota" id="s-nota" rows="3" cols="4" placeholder="Agregue una nota si lo requiere.."></textarea>
                </div>
            </div>        
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
            <button type="button" id="btn_save_salida" class="btn btn-primary m-3" style="">Registrar</button>
            <button type="button" id="limpiar_modal1" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>   
</div>
</form>
                
<form name="form_obs" id="form_obs">                
<div class="modal fade" id="modal_observacion">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registrar observación</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>            
        <div class="modal-body">
            <div class="col-lg-8">
                <input type="hidden" id="o-idv" value="{$datos.Id_vehi}" />
                <div class="form-group col-8 p-2">
                    <label for="from">Fecha/hora:</label>
                    <input type="text" name="o-fcho" id="o-fcho" value="" placeholder="dd-mm-aaaa HH:mm" class="form-control" readonly="readonly" required=""/>
                </div>
                <div class="form-group col-lg-12">
                    <label class="control-label">Tipo observación:</label>
                    <select name="o-tobsvehi" id="o-tobsvehi" class="form-select btn btn-outline-warning">   
                                <option value="">-Seleccione-</option>
                            {foreach from=$tobsvehi item=to}
                                <option style="text-align: left;" value="{$to.Id_tobsvehi}">{$to.Nom_tobsvehi}</option>
                            {/foreach}
                    </select>
                </div> 
                <div class="row row-cols-1 row-cols-lg-12 p-2 mt-2" style="background:#F5F5F5;border-radius: 5px;">
                    <textarea class="form-control" name="o-nota" id="o-nota" rows="3" cols="4" placeholder="Agregue detalles de la observación.."></textarea>
                </div>
            </div>        
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
            <button type="button" id="btn_save_obs" class="btn btn-primary m-3" style="">Registrar</button>
            <button type="button" id="limpiar_modal1" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>   
</div>                
    
</div>
