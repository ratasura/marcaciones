<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table 		= 'funcionarios';
    protected $primarykey	= 'id'; 
    protected $fillable 	= ['nombre', 'mail','ci'];

    public $timestamps = false;
}
