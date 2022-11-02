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

    function entradas(){
        return $this->belongsTo('App\Entradas','id_entradas', 'id','id_maquina','id_evento');
    }

}