<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Donacion;
use App\Inventario;
use App\Tipo_kit;
use PDF;


class PDFController extends Controller
{
    public function PDFproducto (){

        $productos = Product::all();
        $pdf = PDF::loadView('dompdf.pruebas', compact('productos'));
        return $pdf->setPaper('A4', 'landscape')->download('Productos-Tienda.pdf');
    }

    public function PDFuser (){

        $usuarios = User::all();
        $pdf = PDF::loadView('dompdf.pdfusuarios', compact('usuarios'));
        return $pdf->setPaper('A4', 'landscape')->download('usuarios-informe.pdf');
    }

    public function PDFdonation (){

        $donacion = Donacion::all();
        $pdf = PDF::loadView('dompdf.pdfdonantes', compact('donacion'));
        return $pdf->setPaper('A4', 'landscape')->download('Donacion-informe.pdf');
    }

    public function PDFkit (){

        $kit = Tipo_kit::all();
        $pdf = PDF::loadView('dompdf.pdfkit', compact('kit'));
        return $pdf->setPaper('A4', 'landscape')->download('Kits-existentes.pdf');
    }

    public function PDFinventary (){

        $inventary = Product::all();
        $pdf = PDF::loadView('dompdf.pdfinventario', compact('inventary'));
        return $pdf->setPaper('A4', 'landscape')->download('Inventario.pdf');
    }

    public function todos (){

        // $donacion = Donacion::all();
        return view("dompdf.allinformes");
        // $pdf = PDF::loadView('dompdf.pdfdonantes', compact('donacion'));
        // return $pdf->setPaper('A4', 'landscape')->download('Donacion-informe.pdf');
    }

    

}
