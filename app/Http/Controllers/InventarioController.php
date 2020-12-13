<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;
use App\Tipo_Kit;

class InventarioController extends Controller
{
    public function formulario_inventario(){

        $inv = TIpo_Kit::all();
        return view('dashboard.inventario.crear', compact('inv'));
    }

    public function guardar_inventario(Request $request){

        $name = Tipo_kit::where('id', $request->nombre_inventario)->firstOrFail();
        
       
        $inven = Inventario::where('nombre', $name->nombre );
        
        if( $inven->exists() ){
            return back()->with('flash', "Ya existe este kit en el inventario por favor ve a editar inventario"); 
        }else{
            $inventario = new Inventario;
            $inventario->existencia_inicial = $request->entrada;
            $inventario->entrada = $request->entrada;
            $inventario->salida = 0;
            $inventario->stock = $request->entrada;
            $inventario->nombre = $name->nombre;
            $inventario->save();
            return back()->with('flash', "Se ha Guardado el Inventario con exito"); 
        }
       
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
        
        
        $inventario = Inventario::where('id',$request->id)->firstOrFail();
   
        if ( $inventario->stock < $request->salida){

            return back()->with('flash', "La salida excede el total de kits en el stock"); 

        }
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
