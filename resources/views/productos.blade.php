<div class="col-md-1"></div> 
<div class="col-md-10"> 
    <h5><i>Productos: </i></h5>
    <select class="form-control productos">
        <option value="">-- Seleccione un Producto --</option>
        @foreach ($productos as $producto)
        <option data-img="{{$producto->IMG}}" value="{{$producto->PRODUCTO_ID}}">{{$producto->NOMBRE}}</option>                       
        @endforeach
    </select>
</div>    
<div class="col-md-1"></div> 