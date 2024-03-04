<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $table = 'entregas';
    protected $primaryKey = 'id_entrega';
    public $incrementing = false;
    public $timestamps = false;


    public function punto()
    {
        return $this->belongsTo(Punto::class, 'id_punto');
    }


    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
}
