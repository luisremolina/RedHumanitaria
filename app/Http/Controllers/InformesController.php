<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class informes extends Controller
{
    public function PDFdonantes (){

        $_donaciones = Donacion::all();
        $pdf = PDF::loadView('dompdf.pdfdonantes', compact('_donaciones'));
        return $pdf->setPaper('A4', 'landscape')->stream('donantes-informe.pdf');
    }
}
