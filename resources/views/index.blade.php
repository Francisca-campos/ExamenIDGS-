<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Examen 81</title>

        <!-- Fonts -->

        <!-- Styles -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style type="text/css">
            body{
                background-color: antiquewhite;
            }
            .tienda_photo {
                width:40%;
                height:0;
                padding-top:40%;
                position:relative;
                background-size: cover;
                background-image: url({{asset('img/def1.png')}}); 
                      }   
            .emp_photo {
                width:40%;
                height:0;
                padding-top:40%;
                position:relative;
                background-size: cover;
                background-image: url({{asset('img/def2.png')}}); 

                      }   
            .name_emp {
                width:40%;
                height:0;
                padding-top:20%;
                position:relative;
                overflow: hidden;
                border:solid 0.1px;
                border-color: #1A232A;
                display: grid;

                      } 
            .prod_photo {
                width:20%;
                height:0;
                padding-top:20%;
                position:relative;
                background-size: cover;
                background-image: url({{asset('img/def2.png')}});
                }           
            hr{
                margin-top: 25px;
            }    
            .vtotal{
                font-size: 15px;
            }                       
        </style>

    </head>
        <body>
            <form role="form" enctype="multipart/form-data">
                <input type="hidden" data-url="{{url('public/archivos')}}" class="csrf-token" name="csrf-token" value="{{ csrf_token() }}">{{ csrf_field() }}</form>
            <div style="margin-top: 10px;" class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h1><marquee width=50% height align=bottom><u><i>Examen Francisca IDGS-81</i></u></marquee></h1>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <hr>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div> 
                <div class="col-md-10"> 
                    <div class="row">
                        <div class="col-md-5">
                           <h5>Tiendas: </h5>
                           <select class="form-control tiendas">
                               <option value="">-- Seleccione una Tienda Primero --</option>
                               @foreach ($tiendas as $tienda)
                               <option value="{{$tienda->TIENDA_ID}}">{{$tienda->NOMBRE}}</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                             <div class="tienda_photo"></div>
                        </div>
                    </div> 
                </div>
            </div>

            <div style="margin-top: 25px;" class="row">
                <div class="col-md-1"></div> 
                <div class="col-md-10"> 
                    <div class="row">
                        <div class="col-md-5">
                           <h5>Empleados: </h5>
                           <select class="form-control empleados">
                               <option value="">-- Seleccione una Tienda Primero --</option>
                           </select>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                             <div class="emp_photo"></div>
                             <div class="name_emp"><p style="position: absolute;padding:5px 0 0 12px;"><i>Nombre del empleado</i></p></div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <hr>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="row row-productos">
                   
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <hr>
                </div>
                <div class="col-md-1"></div>
            </div>

             <div class="row row-form-ventas">
                   
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <hr>
                </div>
                <div class="col-md-1"></div>
            </div>
             <div class="row row-table">
               
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    
                    <p class="vtotal">Ventas Realizadas Totales - $</p>
               
                </div>
                <div class="col-md-1"></div>
            </div>
            
                
        </body>
</html>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('.row-table').load("{{url('tb_ventas')}}").serialize();

        $('.tiendas').change(function(){
          empleados($(this).val());      
        })
        $('.empleados').change(function(){
        $('.row-productos').load("{{url('productos')}}?tienda_id="+$(".tiendas").val()).serialize();   
        $('.name_emp').find('p').text($( "option:selected",this ).text());        
        ruta='{{asset("img/'temp'")}}'.replace('temp', $( "option:selected",this ).data('img')).replaceAll('&#039;', '');
        $('.emp_photo').css('background-image', 'url('+ruta+')');
        })
        $(document).off('change').on('change','.productos',function() {
        $('.row-form-ventas').load("{{url('form_ventas')}}?producto_id="+$(this).val()).serialize();     
        }) 
        $(document).off('keyup').on('keyup','.cantidad',function() {
        total = $(this).val() * $('.bcosto').text();    
        $('.btotal').text('$'+total);
        }) 
        $(document).off('click').on('click','.btnVenta',function() {
        if($('.cantidad').val()!=''){
        RealizarVenta($('.empleados').val(), $('.productos').val(),$('.cantidad').val(),$('.tiendas').val());
        }else{
        alert('Ingrese una cantidad');    
        }
        })
        function RealizarVenta(empleado, producto,cantidad,tienda){
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="csrf-token"]').val()}
            });
            $.ajax({type: "POST",dataType : "json",
                url: "{{url('/realizar_venta')}}",
                data:{empleado:empleado, producto:producto,cantidad:cantidad,tienda:tienda},
                success: function (data) {
                if(data.SUCCESS==1){
                $('.row-table').load("{{url('tb_ventas')}}").serialize();    
                } 
                }
                })    
        }

        function empleados(tienda_id) {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="csrf-token"]').val()}
            });
            $.ajax({type: "POST",dataType : "json",
                url: "{{url('/empleados')}}",
                data:{tienda_id:tienda_id},
                success: function (data) { 
                $(".empleados").find('option:first').text('--Seleccione un Empleado--'); 
                ruta='{{asset("img/'temp'")}}'.replace('temp', data.LOGO).replaceAll('&#039;', '');
                $('.tienda_photo').css('background-image', 'url('+ruta+')');
                $('.empleados').find('option').not(':first').remove();
                $.each(data.EMPLEADOS,function(i,val){     
                $(".empleados").append('<option data-img="'+val.IMG+'" value="'+val.EMPLEADO_ID+'">'+val.NOMBRE+' '+val.APP+' '+val.APM+'</option>');    
                 
                })    
                }
            })//$('.name_emp').find('p').text();
        }

    })
</script>
