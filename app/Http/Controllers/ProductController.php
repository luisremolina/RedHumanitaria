<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.productos.registrar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $producto = new Product;
        $producto->nombre = $request->nombre_producto;
        $producto->stock = $request->stock;
        $producto->precioActual = $request->precio;
        $producto->precioAnterior = $request->precio;
        $producto->descripcionCorta = $request->descripcion_corta;
        $producto->descripcionLarga = $request->descripcion_larga;
        $producto->save();
        return back()->with('flash', "Se ha guardado el producto con exito"); 
    }

    public function tabla_producto(){
        $producto = Product::paginate(1);
       
        return view('dashboard.productos.tabla', compact("producto"));
    }

    public function editar_producto(Request $request){

        $producto = Product::where('id',$request->id)->firstOrFail();

        return view('dashboard.productos.editar',compact("producto"));

    }

    public function elimininar_producto(Request $request){
        $producto = Product::where('id',$request->id)->firstOrFail();
        $producto->delete();
        return back();
    }

    public function actualizar_producto(Request $request){
        
        $producto = Product::where('id',$request->id)->firstOrFail();

        $producto->nombre = $request->nombre_producto;
        $producto->stock = $request->stock;
        $producto->precioAnterior = $producto->precioActual;
        $producto->precioActual = $request->precio;
        $producto->descripcionCorta = $request->descripcion_corta;
        $producto->descripcionLarga = $request->descripcion_larga;
        $producto->save();
        return back()->with('flash', "Se ha actualizado el producto con exito"); 
    }

}
