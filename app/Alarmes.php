<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alarmes extends Model
{
    use SoftDeletes;

    protected $table = 'alarmes';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];

}