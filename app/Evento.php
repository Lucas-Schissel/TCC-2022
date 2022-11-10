<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;

    protected $table = 'eventos';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];

    function entradas(){
    	return $this->hasMany('App\Entradas', 'id_evento', 'id');
    }

}
