 <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h3><i>Ventas Realizadas</i></h2>
                    <table style="width: 100%" border="2">
                        <thead>
                        <tr>
                            <th ><i>#</i></th>
                            <th>Fecha</th>
                            <th>Tienda</th>
                            <th>Vendedor</th>
                            <th>Producto</th>
                            <th>Costo</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ventas as $venta)
                        <tr>
                        <td>{{$venta->VENTA_ID}}</td>  
                        <td>{{$venta->FECHAV}}</td>
                        <td>{{$venta->TIENDA}}</td>
                        <td>{{$venta->VENDEDOR}}</td>
                        <td>{{$venta->PRODUCTO}}</td>
                        <td>{{$venta->COSTO}}</td>
                        <td>{{$venta->CANTIDAD}}</td>
                        <td>{{$venta->COSTO * $venta->CANTIDAD}}</td> 
                        </tr>
                        @endforeach
                        </tbody>        
                    </table>     
                </div>
                <div class="col-md-1"></div>
<script type="text/javascript">
    $( document ).ready(function() {
        $('table tr:last').css('border-bottom','1px solid #000');
        var sum = 0;
        $('table tbody tr').find('td:eq(7)').each(function(i,val){
        sum += parseFloat($(this).text());
        })
        $('.vtotal').text('Ventas Realizadas Totales - $'+sum.toFixed(2));
             })
</script>    