<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$_layoutParams.root}">Home</a></li>
        <li class="breadcrumb-item active">Panel reportes</li>
    </ol>
    </nav>
        
    <h3>Tablero general</h3>
    <div class="row">
        <div class="col-lg-4" style="margin: 1px;border-radius: 10px;background: #f9f9f9;">
            <div class="col-lg-4">
                  <label for="">Año:</label>
                  <select name="" id="fchMov" class="form-select">
                      <option value="2023">2023</option>
                      <option value="2022">2022</option>
                      <option value="2021">2021</option>
                  </select>
            </div>
            <canvas id="graficobar" width="400" height="400"></canvas>
            <div style="font-size: 10px;" class="text-center">Cantidad de movimientos por año</div>
        </div>
        
        <div class="col-lg-4 row" id="doughnut">
            <div class="col-lg-4">
                  <label for="">Año:</label>
                  <select name="" id="fchPie" class="form-select">
                      <option value="2023">2023</option>
                      <option value="2022">2022</option>
                      <option value="2021">2021</option>
                  </select>
            </div>
                        <div class="col-lg-4"> 
                  <label for="">Mes:</label>
                  <select name="" id="mesPie" class="form-select">
                      <option value="">Todo</option>
                      <option value="1">Ene</option>
                      <option value="2">Feb</option>
                      <option value="3">Mar</option>
                      <option value="4">Abr</option>
                      <option value="5">May</option>
                      <option value="6">Jun</option>
                      <option value="7">Jul</option>
                      <option value="8">Ago</option>
                      <option value="9">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Dic</option>
                      <option value="12">Nov</option>
                  </select>
            </div>
            <canvas id="graficopie" width="400" height="400"></canvas>
            <div style="font-size: 10px;" class="text-center">Cantidad de movimientos por entidad</div>
        </div>
        
        <div class="col-lg-4 row" style="margin: 1px;border-radius: 10px;background: #f9f9f9;">
            <div class="col-lg-4">                  
                  <label for="">Año:</label>
                  <select name="" id="yearCausas" class="form-select">
                      <option value="2022">2022</option>
                      <option value="2021">2021</option>
                  </select>
            </div>
            <div class="col-lg-4"> 
                  <label for="">Mes:</label>
                  <select name="" id="mesCausas" class="form-select">
                      <option value="">Todo</option>
                      <option value="1">Ene</option>
                      <option value="2">Feb</option>
                      <option value="3">Mar</option>
                      <option value="4">Abr</option>
                      <option value="5">May</option>
                      <option value="6">Jun</option>
                      <option value="7">Jul</option>
                      <option value="8">Ago</option>
                      <option value="9">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Dic</option>
                      <option value="12">Nov</option>
                  </select>
            </div>
            <canvas id="graficobarVariosNiveles" width="400" height="400"></canvas>
        </div>
    </div>  
    <br>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Con parámetros</h3>
      </div>
      <div class="panel-body">
          <div class="row">
              <div class="col-lg-4">
                  <label for="">Fecha inicio:</label>
                  <select name="" id="fchi" class="form-control">
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                  </select>
              </div>
              <div class="col-lg-4">
                  <label for="">Fecha fin:</label>
                  <select name="" id="fchf" class="form-control">
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                  </select>
              </div>
              <div class="col-lg-4">
                  <label for="">&nbsp;</label><br>
                  <button class="btn btn-danger" id="cargarDatosParam">Buscar</button>
              </div>
          </div>
          <div class="row">
            <div class="col-lg-4" id="doughnut">
                <canvas id="graficopie" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-4" id="polararea">
                <canvas id="graficopolarparam" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-4" id="lineal">
                <canvas id="graficolineparam" width="400" height="400"></canvas>
            </div>
          </div>
      </div>
    </div>
    
    
</div>
{literal}

{/literal}