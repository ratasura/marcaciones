<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table 		= 'funcionarios';
    protected $primarykey	= 'id'; 
    protected $fillable 	= ['nombre', 'mail','ci'];

    public $timestamps = false;


    public function fechas($fecInicio, $fecFinal)
    {
        $fMarcaciones = Marcacion::where('ci','=',$this->ci)
        ->where('fecha','>=',$fecInicio.' 08:01:00')->where('fecha','<=',$fecFinal.' 11:59:59')
        ->select('marcaciones.fecha','marcaciones.id','marcaciones.ci','marcaciones.nombre')->get();
        //dd($fMarcaciones);
        return $fMarcaciones;
    }

}
