<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
    public function storage()
    {
        return view('dashboard.productos.subirimages');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file'=> 'required|image|max:2048'
        ]); 

        $images = $request->file('file')->store('public/imagenes');
        $url = Storage::url($images);
       
        Product::create([
            'imagen' => $url
        ]);
    }

    public function index2()
    {
        $cart = session()->get('cart');
        // dd(count($cart));
        $productos = Product::all();
        return view('dashboard.productos', compact('productos', 'cart'));
    }

    public function carrito()
    {
        return view('dashboard.carrito');
    }
    public function detalles($id)
    {
        $cart = session()->get('cart');
        $productos = Product::find($id);
        return view('dashboard.detail', compact('productos', 'cart'));
    }

    public function borrarItem($id){

        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('flash','Producto eliminado correctamente');

    }
    public function descontaritem($id){
        
        $productos = Product::find($id);
        $cart = session()->get('cart');

        if ($cart[$id]['Cantidad'] == 1){
            return redirect()->back();
        }else{
            $cart[$id]['Cantidad']--;
            session()->put('cart', $cart);
            return redirect()->back();
        }
        
    }
    public function aumentaritem($id){
        $prod = Product::find($id);
               $cart = session()->get('cart');
       
        if($cart[$id]['Cantidad']==$prod->stock){
            return redirect()->back()->with('flash','No hay mas stock');
        
            }else{
            $productos = Product::find($id);
            $cart = session()->get('cart');
            $cart[$id]['Cantidad']++;
            session()->put('cart', $cart);
            return back();
        }
      
    }
    public function addTocart($id)
    {
        $productos = Product::find($id);
        $cart = session()->get('cart');

        if (!$cart) {

            $cart = [
                        $id =>[
                            "Nombre" => $productos->nombre,
                            "Cantidad" => 1,
                            "Precio" => $productos->precioActual,
                            "Descripcion" => $productos->descripcionCorta,
                            "Imagen" => $productos->imagen
                        ]

                    ];
                
                    session()->put('cart', $cart);
                    return redirect()->back()->with('flash','Producto agregado correctamente');

        }

        if (isset($cart[$id])){

            $cart[$id]['Cantidad']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('flash','Producto agregado correctamente');

        }

        $cart[$id] = [
            "Nombre" => $productos->nombre,
            "Cantidad" => 1,
            "Precio" => $productos->precioActual,
            "Descripcion" => $productos->descripcionCorta,
            "Imagen" => $productos->imagen
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('flash','Producto agregado correctamente');

            


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $request->validate([
            'file'=> 'required|image|max:2048'
        ]); 

        $images = $request->file('file')->store('public/imagenes');
        $url = Storage::url($images);
       
        // Product::create([
        //     'imagen' => $url
        // ]);

        $producto = new Product;
        $producto->nombre = $request->nombre_producto;
        $producto->stock = $request->stock;
        $producto->precioActual = $request->precio;
        $producto->precioAnterior = $request->precio;
        $producto->descripcionCorta = $request->descripcion_corta;
        $producto->imagen = $url;
        $producto->descripcionLarga = $request->descripcion_larga;
        $producto->save();
        return back()->with('flash', "Se ha guardado el producto con exito"); 
    }

    public function tabla_producto(){
        $producto = Product::paginate(10);
       
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
        
        $request->validate([
            'file'=> 'required|image|max:2048'
        ]); 

        $images = $request->file('file')->store('public/imagenes');
        $url = Storage::url($images);

        $producto = Product::where('id',$request->id)->firstOrFail();

        $producto->nombre = $request->nombre_producto;
        $producto->stock = $request->stock;
        $producto->precioAnterior = $producto->precioActual;
        $producto->precioActual = $request->precio;
        $producto->descripcionCorta = $request->descripcion_corta;
        $producto->descripcionLarga = $request->descripcion_larga;
        $producto->imagen = $url;
        $producto->save();
        return back()->with('flash', "Se ha actualizado el producto con exito"); 
    }

}
