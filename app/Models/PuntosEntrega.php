<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosEntrega extends Model
{
    use HasFactory;

    protected $table = 'puntos_entrega';
    protected $primaryKey = 'id_punto';
    public $incrementing = false;
    public $timestamps = false;
}
