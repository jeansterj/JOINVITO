<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    use HasFactory;

    protected $table = 'puntos';
    protected $primaryKey = 'id_punto';
    public $incrementing = false;
    public $timestamps = false;


    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'id_punto');
    }


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_punto');
    }
}
