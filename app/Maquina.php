<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maquina extends Model
{
    use SoftDeletes;

    protected $table = 'maquinas';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];

    function entradas(){
    	return $this->hasMany('App\Entradas', 'id_maquina', 'id');
    }

}