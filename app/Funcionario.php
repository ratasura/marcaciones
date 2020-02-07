<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table 		= 'funcionarios';
    protected $primarykey	= 'id'; 
    protected $fillable 	= ['nombre', 'mail','ci'];

    public $timestamps = false;


    public function fechas($fecInicio, $fecFinal, $jornada)
    {
        if ($jornada == '0'){
                $fMarcaciones = Marcacion::where('ci','=',$this->ci)
                ->where('fecha','>=',$fecInicio.' 08:01:00')->where('fecha','<=',$fecFinal.' 11:59:59')
                ->select('marcaciones.fecha','marcaciones.id','marcaciones.ci','marcaciones.nombre')->get();
                //dd($fMarcaciones);
                return $fMarcaciones;
                }
        if ($jornada == '1'){
            $horaInicio ='12:00:00';
            $horaFin ='15:00:00';
            $fMarcaciones = Marcacion::where('ci','=',$this->ci)
            ->whereDate('fecha',$fecInicio)
            ->whereTime('fecha','>=',$horaInicio)
            ->whereTime('fecha','<=',$horaFin)
            ->select('marcaciones.fecha','marcaciones.id','marcaciones.ci','marcaciones.nombre')->get();
            return $fMarcaciones;

                }
            
                if ($jornada == '2'){
                        $fMarcaciones = Marcacion::where('ci','=',$this->ci)
                        ->where('fecha','>=',$fecInicio.' 13:00:00')->where('fecha','<=',$fecFinal.' 15:59:59')
                        ->select('marcaciones.fecha','marcaciones.id','marcaciones.ci','marcaciones.nombre')->get();
                        //dd($fMarcaciones);
                        return $fMarcaciones;
                }
    }

}


// public function fechas($fecInicio, $fecFinal)
// {
//     $fMarcaciones = Marcacion::where('ci','=',$this->ci)
//     ->where('fecha','>=',$fecInicio.' 08:01:00')->where('fecha','<=',$fecFinal.' 11:59:59')
//     ->select('marcaciones.fecha','marcaciones.id','marcaciones.ci','marcaciones.nombre')->get();
//     //dd($fMarcaciones);
//     return $fMarcaciones;
// }



// $fMarcaciones = Marcacion::where('ci','=',$this->ci)
//                     ->where('fecha','>=',$fecInicio.' 12:00:00')->where('fecha','<=',$fecFinal.' 13:59:59')
//                     ->select('marcaciones.fecha','marcaciones.id','marcaciones.ci','marcaciones.nombre')->get();
//                     //dd($fMarcaciones);
//                     return $fMarcaciones;
