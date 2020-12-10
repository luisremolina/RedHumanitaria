<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::truncate();

        User::create([
            
            'nombres' => "Luis Alfredo Chuscano Remolina",
            'dni' => 1010122859,
            'sexo' => 'Masculino',
            'telefono' => 3146741224,
            'edad' => 21,
            'admin' => true,
            'email' => "luischuscano@gmail.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        
            ]);

        for ($i=0; $i < 20 ; $i++) { 
           
        User::create([
            
            'nombres' => "Luis Remolina $i",
            'dni' => 10101010+$i,
            'sexo' => 'Masculino',
            'telefono' => 3146741224,
            'edad' => 21,
            'email' => "luischuscano$i@gmail.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        
            ]);

        }

    }
}
