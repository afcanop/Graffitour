<div><!--contenido-->
<div id="content">
<div class="panel-body text-center">
<div class="form-group">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingOne">
<h2 class="panel-title text-center">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
<samp class="glyphicon glyphicon-piggy-bank"> </samp>
Registrar Nueva Oferta
</h2>
</a>
</div>
<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
<!-- inicio formulario--> 
<div class="panel-body">
<form id="FrmRegistrarOferta"> 
<!-- inicio del formulario -->
<div class="row">
<div class="col-md-12">
<div class="form-group form-animate-text">
<input type="number" min="1" max="100"  class="form-text" id="txtOferta"  name="txtOferta" required>
<span class="bar"></span>
<label><span class="glyphicon glyphicon-pencil"></span> Valor Nueva Oferta</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">      
<div class="form-group form-animate-text">
<input type="text" class="form-text" id="txtFechaInicio"  name="txtFechaOfertaInicio" required>
<span class="bar"></span>
<label><span class="fa fa-calendar"></span> Fecha de inicio</label>
</div>
</div>
<div class="col-md-6">
<div class="form-group form-animate-text">
<input type="text" class="form-text " name="txtFechaFinal" id="txtFechaFinal" required>

<span class="bar"></span>
<label><span class="fa fa-calendar"></span> Fecha de Terminación</label>
</div>    
</div>    
</div>

<a class="btn btn-primary btn-success" onclick="Ofertas.Registrar()"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
</div>
</div>
</form>
</div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        	<span class="glyphicon glyphicon-tag"></span>	Asignar Ofertas
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <form id="FrmAsignarOferta">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-6">
        				<select class="ValorOferta" id="Idoferta" name="Idoferta[]" style="width: 50%">
						  
						</select>
        			</div>
        			<div class="col-md-6">
        				<select class="ProductosParaOfertas" multiple="multiple"  id="IdProductos" name="IdProductos[]"  style="width: 50%">
							
						</select>
        			</div>
        		</div>
        		<a class="btn btn-primary btn-success" onclick="Ofertas.AsigarOfertaProducto()"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
        	</div>		
        </form>
      </div>
    </div>
  </div>

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingTwo">
<h3 class="panel-title text-center">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<samp class="fa fa-search"></samp>
Lista De Ofertas
</a>
</h3>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
<div class="responsive-table">
<table id="TablaOfertas" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
<tr>
<th>IDOFERTAS</th>
<th>Valor</th>
<th>FECHAINICIO</th>
<th>FECHAFINAL</th>
<th>FECHAREGISTRO</th>
<th>Estado</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div> 
</div>
</div>    
</div>
</div>
</div>
</div>
</div>