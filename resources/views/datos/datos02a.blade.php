<select name="empleado_id" id="empleado_id">
    <option value="0">-- Selecciona un empleado</option>
    @foreach($empleados as $empleado)
    <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
    @endforeach
</select>


<script type="text/javascript">
    $(document).ready(function(){

        $("#empleado_id").change(function() {
            var empleado = $("#empleado_id").val();
                //alert(alumno);
                if(empleado == 0){
                    $("#info01").empty();
                    $("#info02").empty();
                }
                else{
                    $("#info01").load("{{ route('datos2b') }}?id=" + empleado);                 
                }


            
        });
    });
</script>