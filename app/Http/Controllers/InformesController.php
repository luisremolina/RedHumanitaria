<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class informes extends Controller
{
    public function PDF (){

        $productos = Product::all();
        $pdf = PDF::loadView('dompdf.pruebas', compact('productos'));
        return $pdf->setPaper('A4', 'landscape')->stream('prueba.pdf');
    }

    public function PDFusuarios (){

        $usuarios = User::all();
        $pdf = PDF::loadView('dompdf.pdfusuarios', compact('usuarios'));
        return $pdf->setPaper('A4', 'landscape')->stream('usuarios-informe.pdf');
    }
    public function PDFdonantes (){

        $_donaciones = Donacion::all();
        $pdf = PDF::loadView('dompdf.pdfdonaciones', compact('_donaciones'));
        return $pdf->setPaper('A4', 'landscape')->stream('donantes-informe.pdf');
    }
}
