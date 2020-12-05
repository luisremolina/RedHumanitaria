<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

class InventarioController extends Controller
{
    public function formulario_inventario(){

        return view('dashboard.inventario.crear');
    }

    public function guardar_inventario(Request $request){

        $inventario = new Inventario;
        $inventario->existencia_inicial = $request->entrada;
        $inventario->entrada = $request->entrada;
        $inventario->salida = 0;
        $inventario->stock = $request->entrada;
        $inventario->nombre = $request->nombre;
        $inventario->save();
        return back()->with('flash', "Se ha Guardado el Inventario con exito"); 
    }

    public function tabla_inventarios(){

        $inventario = Inventario::paginate(10);        
        return view('dashboard.inventario.tabla', compact("inventario"));
    }

    public function editar(Request $request){
        
        $inventario = Inventario::where('id',$request->id)->firstOrFail();
        return view('dashboard.inventario.editar',compact("inventario"));
    }

    public function actualizar(Request $request){

        // $request->validate([
        //     'entrada' => 'required',
        //     'requerida' => 'required',

        // ]);

        $inventario = Inventario::where('id',$request->id)->firstOrFail();
        $inventario->existencia_inicial = $request->existencia_inicial + $request->entrada;
        $inventario->entrada = $request->entrada ;
        $inventario->salida = $request->salida;
        $inventario->stock = $request->existencia_inicial + $request->entrada - $request->salida;
        $inventario->nombre = $request->nombre;
        $inventario->save();
        return back()->with('flash', "Se ha actualizado el Inventario con exito"); 
    }

    public function elimina_inventario(Request $request){
        $inventario = Inventario::where('id',$request->id)->firstOrFail();
        $inventario->delete();
        return back();
    }


}
