<table border="1" style=" padding: 0px; border-spacing: 0px;">
    <tr>
        <th>ID</th>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>FN</th>
        <th>Genero</th>
        <th>Email</th>
    </tr>
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->matricula }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->fn }}</td>
            <td>{{ $alumno->gen }}</td>
            <td>{{ $alumno->email }}</td>
        </tr>
</table>

<script type="text/javascript">
    $(document).ready(function(){
        $("#info02").load("{{ route('datos2c') }}");
    });
</script>


