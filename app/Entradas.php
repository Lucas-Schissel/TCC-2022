<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'entradas';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];


    function clp(){
        return $this->belongsTo('App\CLP','id_clp', 'id','nome');
    }
    function maquina(){
        return $this->belongsTo('App\Maquina','id_maquina', 'id','nome');
    }
    function evento(){
        return $this->belongsTo('App\Evento','id_evento', 'id','nome');
    }

    /*
    function clps(){
        return $this->belongsToMany('App\CLP', 'id_clp','id','nome')
        ->withPivot(['id','nome'])
        ->withTimestamps();
    }
    */

}
