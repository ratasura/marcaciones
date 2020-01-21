<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcacion extends Model
{
    protected $table 		= 'marcaciones';
    protected $primarykey	= 'id'; 
    protected $fillable 	= ['fecha', 'codigo','ip','tipo','dsc1','ci','nombre'];

    public $timestamps = false;


    public function scopeMarcaciones($query) {
        return $query->where('ci', '!=','0');
     }
}
