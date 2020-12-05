<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        for ($i=0; $i < 10 ; $i++) { 
            
        Product::create([

            'nombre' => "camisa",
            'stock' => 200,
            'precioActual' => 12000,
            'precioAnterior' => 15000,
            'porcentajeDescuento' => 10,
            'descripcionCorta' => "Camisa para caballero",
            'descripcionLarga' => "Elaborado en algodón licrado de excelente calidad, y a un excelente precio, hay disponible en todas las tallas",
            'imagen' => 'web/images/coming.jpg',
            'estado' => "PUBLICADO"

        ]);
    }

    }
}
