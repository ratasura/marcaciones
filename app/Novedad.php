<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    
    protected $table 		= 'novedades';
    protected $primarykey	= 'id'; 
    protected $fillable 	= ['id_funcionario', 'ci','nombre','fecha','fechaincidente','tipo'];

    public $timestamps = false;
}
