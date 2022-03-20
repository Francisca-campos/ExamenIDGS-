<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index(){
    $tiendas = \DB::select("SELECT * FROM TIENDAS"); 
    return view('index')->with('tiendas',$tiendas);
    }
     function tb_ventas(){
    $ventas = \DB::select("SELECT V.VENTA_ID,V.CREATED_AT FECHAV,T.NOMBRE TIENDA,CONCAT(E.NOMBRE,' ',E.APP,' ',E.APM) VENDEDOR,P.NOMBRE PRODUCTO,P.COSTO,V.CANTIDAD FROM VENTAS V INNER JOIN PRODUCTOS P ON V.PRODUCTO_ID=P.PRODUCTO_ID INNER JOIN TIENDAS T ON V.TIENDA_ID=T.TIENDA_ID INNER JOIN EMPLEADOS E ON V.EMPLEADO_ID=E.EMPLEADO_ID ORDER BY V.CREATED_AT DESC"); 
    return view('table_ventas')->with('ventas',$ventas);
    }
    function Empleados(){
    $tienda_id = isset($_POST['tienda_id']) && !empty($_POST['tienda_id']) ? $_POST['tienda_id'] : '';	
    $empleados = \DB::select("SELECT * FROM EMPLEADOS WHERE TIENDA_ID=$tienda_id");
    $logo = \DB::select("SELECT IMG FROM TIENDAS WHERE TIENDA_ID=$tienda_id"); 
    return json_encode(array('EMPLEADOS'=>$empleados,'LOGO'=>$logo[0]->IMG));
    }
    function Productos(){
    $tienda_id = isset($_GET['tienda_id']) && !empty($_GET['tienda_id']) ? $_GET['tienda_id'] : '';	
    $productos = \DB::select("SELECT * FROM PRODUCTOS WHERE TIENDA_ID=$tienda_id");
    return view('productos')->with('productos',$productos);
    }
    function Form_ventas(){
    $producto_id = isset($_GET['producto_id']) && !empty($_GET['producto_id']) ? $_GET['producto_id'] : '';	
    $producto = \DB::select("SELECT * FROM PRODUCTOS WHERE PRODUCTO_ID=$producto_id");
    return view('form_ventas')->with('producto',$producto[0]);
    }
    function Realizar_venta(){
    $empleado = isset($_POST['empleado']) && !empty($_POST['empleado']) ? $_POST['empleado'] : '';
    $producto = isset($_POST['producto']) && !empty($_POST['producto']) ? $_POST['producto'] : '';
    $cantidad = isset($_POST['cantidad']) && !empty($_POST['cantidad']) ? $_POST['cantidad'] : '';	
    $tienda = isset($_POST['tienda']) && !empty($_POST['tienda']) ? $_POST['tienda'] : '';	
    $producto = \DB::insert("INSERT INTO VENTAS(PRODUCTO_ID,CANTIDAD,TIENDA_ID,EMPLEADO_ID)VALUES($producto,$cantidad,$tienda,$empleado)");
    return json_encode(array('SUCCESS'=>1));
    }
}
