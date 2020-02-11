<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table 		= 'historicos';
    protected $primarykey	= 'id'; 
    protected $fillable 	= ['id_funcionario', 'ci','nombre','fecha','fechaincidente'];

    public $timestamps = false;


   
}
