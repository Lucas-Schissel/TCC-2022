<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CLP extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'clp';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];
}
