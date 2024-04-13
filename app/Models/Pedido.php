<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $incrementing = false;
    public $timestamps = false;

    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'id_entrega');
    }


    public function rider()
    {
        return $this->belongsTo(Rider::class, 'id_rider');
    }


    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
