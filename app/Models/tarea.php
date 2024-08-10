<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class tarea extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'tarea_titulo',
        'tarea_descripcion',
        'tarea_estado',
    ];
}
