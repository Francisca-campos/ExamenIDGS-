<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <title>EXAMEN</title>

      <!-- Fonts --->

      <!--Styles -->
      <style>
            html, body {
                background-color: #fff;
                * color: #636b6f; */
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .content { text-align: center; }
       </style>
       
       <!-- JavaScript -->
       <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

   </head>
   <body>
       <br>
       <h2>Examen FranciscaCQ</h2><br>
       <hr>
       <center>
       <table width="80%">
           <tr>
               <td>Tienda: </td>
               <td>
                   <select name="tienda_id" id="tiendas">
                       <option value="0">-- Seleccione una Tienda --</option>
                       @foreach ($tienda as $tienda)
                            <option value="{{$tienda->id}}">{{$tienda->nombre}}</option>
                       @endforeach
                   </select>
               </td>
               <td rowspan="3" id="info01" style="text-align: justify"></td>
           </tr>
           <tr>
               <td>Empleados: </td>
               <td id="empleado">
                   <select name="empleado_id" id="empleado_id">
                       <option value="0">---Seleccione una Tienda antes ---</option>
                   </select>
               </td>
           </tr>
       </table>
       <div id="info02"></div>
       </form>
       </center>
       <hr>
       
    

    <script type="text/javascript">
    $(document).ready(function(){
        $("#tiendas").change(function() {
            var valgrupo = $("#tiendas").val();
            if(valgrupo == 0){
                    $('#info01').empty();
                    $('#info02').empty();
                    $('#empleado').empty();
                    $("#empleado").html('<select name="empleado_id" id="empleado_id"><option value="0">--- Seleccione una Tienda Antes ---</option></select>');   
                }
            else{
                    $('#empleado').empty();
                    $("#empleado").load("{{ route('datos2a') }}?tienda_id=" + valtienda).serialize();
                }
            });
        });
    </script>
   </body>
</html>


 

                           
                        
