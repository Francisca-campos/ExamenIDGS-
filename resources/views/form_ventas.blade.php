<div class="col-md-1"></div> 
<div class="col-md-10"> 
	<div class="row">
	<div class="col-md-9">
    <h2><i>Formulario Ventas del producto Pro-{{$producto->CODIGO}}/{{$producto->NOMBRE}}</i></h2>
    <h4><b><i> (C/U):</b> <b class="bcosto">{{$producto->COSTO}}<i></b></h4>
    <h4><b><i>Total: </b><b class="btotal"></i></b></h4>
    </div>
    <div class="prod_photo col-md-3"></div>

    </div>

</div>    
<div class="col-md-1"></div> 
 <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                	<h5><i>Cantidad:</i></h5>
                    <input class="form-control cantidad" type="text">
                </div>   
                </div>  
                <div style="margin-top: 15px;" class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <button style="width: 100%;" type="button" class="btn btn-primary btnVenta"><u>Realizar Venta<u></button>
                </div>
                <div class="col-md-1"></div>
            </div>
<script type="text/javascript">
	 $( document ).ready(function() {
     ruta='{{asset("img/'temp'")}}'.replace('temp', '{{$producto->IMG}}').replaceAll('&#039;', '');
        $('.prod_photo').css('background-image', 'url('+ruta+')');
	 })

</script>