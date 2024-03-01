<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregas extends Model
{
    use HasFactory;

    protected $table = 'entregas';
    protected $primaryKey = 'id_entrega';
    public $incrementing = false;
    public $timestamps = false;


    public function punto()
    {
        return $this->belongsTo(Puntos::class, 'id_punto');
    }


    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'id_pedido');
    }
}
