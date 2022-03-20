<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Datos extends Controller
{
    public function consulta02(){
        $tiendas = Tiendas::all();
        return view("consulta02")
            ->with(['tiendas' => $tiendas]);
    }
    public function datos02a(Request $request) {
        $tienda_id = $request->get('tienda_id');

        $empleados = Empleados::where('tienda_id',$tienda_id)->get();

        return view("datos/datos02a")
            ->with(['empleados' => $empleados]);
    }
    //--------- vista: datos02b -----------
    public function datos02b(Request $request) {
        $id = $request->get('id');
        //console.log($id);
        $empleado = Empleados::find($id);

        return view("datos/datos02b")
            ->with(['empleado' => $empleado]);
    }

    //----------- Vista: Datos02c ----------------
    public function datos02c() {
        return view("datos/datos02c");
            
    }

}
