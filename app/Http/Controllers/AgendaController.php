<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Agenda;
class AgendaController extends Controller
{
    public function index (Request $request){
        $usuarios = User::all();
        return view('agenda.index', compact('usuarios'));
    }

    public function validarFecha ($fecha, $hora_inicial, $hora_final){
       
    

      $date = Agenda::select("*")->whereDate('fecha', $fecha)->first();
    //   dd($date);
      if ($date == null){
          return true;
          
      }else{
        // dd($date->hora_inicial . " " . $date->hora_final."HORA LLEGADA". $hora_inicial." ".$hora_final);
        // dd(
        //     ( $date->hora_inicial >= $hora_inicial && $date->hora_inicial <= $hora_final ) &&
        
        //     ( $date->hora_final >= $hora_inicial && $date->hora_final <= $hora_final)  ) ;
            // $vari = ( $date->hora_inicial >= $hora_inicial && $date->hora_inicial <= $hora_final ); 
            // $vari2 =  ($date->hora_final >= $hora_inicial && $date->hora_final <= $hora_final );
            // dd($vari ." y la segunda es ". $vari2);
            if(
                ($date->hora_inicial >= $hora_inicial && $date->hora_inicial <= $hora_final) == false && 
                ($date->hora_final >= $hora_inicial && $date->hora_final <= $hora_final ) == false  ){
                   
                return true;
            }else{
                return false;
            }

      }
    


        // $agenda = Agenda::select("*")
        // ->whereDate('fecha', $fecha)
        // ->whereBetween('hora_inicial', [$hora_inicial, $hora_final])
        // ->orwhereBetween('hora_final', [$hora_inicial, $hora_final])
        // ->first();
        // return $agenda == null ? true : false;

        


    }
    public function listar(){
        $agenda = Agenda::all();
        $nueva_agenda = [];

        foreach ($agenda as $date){
            $nueva_agenda [] = [

                "id" => $date->id,
                "start" => $date->fecha ." ". $date->hora_inicial,
                "end" => $date->fecha ." ". $date->hora_final,
                "title" => $date->usuario_id. " " . $date->descripcion,
                "backgroundColor" => $date->estado == 1 ? "#1f7904" : "#7b0205",
                "textColor" => "#fff",
                "extendedProps" => [ "usuario_id" => $date->usuario_id] 
            ]; 
        }
        return response()->json($nueva_agenda);

    }

    public function guardar (Request $request){

        $input = $request->all();

        if ($this->validarFecha( $input["txtfecha"], $input["hora_inicial"], $input["hora_final"]) ){
            $agenda = Agenda::create([
                "usuario_id" => $input["users"],
                "fecha" => $input["txtfecha"],
                "hora_inicial" => $input["hora_inicial"],
                "hora_final" => $input["hora_final"],
                "descripcion" => $input["txtdescripcion"],
            ]);
             return response()->json(["ok"=>true]);
        }else{
            return response()->json(["ok"=>false]);

        }
    }
}
