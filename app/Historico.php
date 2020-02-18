<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table 		= 'historicos';
    protected $primarykey	= 'id'; 
    protected $fillable 	= ['id_funcionario', 'ci','nombre','fecha','fechaincidente','minutosatraso'];

    public $timestamps = false;


    public static  function periodo($mes){
        $anio = date('Y');
        if($mes == 1){
                $periodo = 'Enero'. ' '. $anio;
            }
            if($mes == 2){
                $periodo = 'Febrero' . ' '. $anio;
            }
            if($mes == 3){
                $periodo = 'Marzo' . ' '. $anio;
            }
            if($mes == 4){
                $periodo = 'Abril'. ' '. $anio;
            }
            if($mes == 5){
                $periodo = 'Mayo'. ' '. $anio;
            }
            if($mes == 6){
                $periodo = 'Junio'. ' '. $anio;
            }
            if($mes == 7){
                $periodo = 'Julio'. ' '. $anio;
            }
            if($mes == 8){
                $periodo = 'Agosto'. ' '. $anio;
            }
            if($mes == 9){
                $periodo = 'Septiembre'. ' '. $anio;
            }
            if($mes == 10){
                $periodo = 'Octubre'. ' '. $anio;
            }
            if($mes == 11){
                $periodo = 'Noviembre'. ' '. $anio;
            }
            if($mes == 12){
                $periodo = 'Diciembre'. ' '. $anio;
            }

            return $periodo;
    }


   
}
