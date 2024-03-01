<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $incrementing = false;
    public $timestamps = false;

    public function entregas()
    {
        return $this->hasMany(Entregas::class, 'id_pedido');
    }


    public function rider()
    {
        return $this->belongsTo(Riders::class, 'id_rider');
    }


    public function menu()
    {
        return $this->belongsTo(Menus::class, 'id_menu');
    }
}
