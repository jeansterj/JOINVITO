<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    use HasFactory;

    protected $table = 'puntos';
    protected $primaryKey = 'id_punto';
    public $incrementing = false;
    public $timestamps = false;


    public function entregas()
    {
        return $this->hasMany(Entregas::class, 'id_punto');
    }


    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_punto');
    }
}
