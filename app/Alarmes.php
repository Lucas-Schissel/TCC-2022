<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alarmes extends Model
{
    use SoftDeletes;

    protected $table = 'alarmes';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];

    function maquina(){
        return $this->belongsTo('App\Maquina','id_maquina', 'id','nome');
    }
    function evento(){
        return $this->belongsTo('App\Evento','id_evento', 'id','nome');
    }

}