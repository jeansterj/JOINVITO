<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'id_menu';
    public $incrementing = false;
    public $timestamps = false;

    
    public function riders()
    {
        return $this->belongsToMany(Rider::class, 'pedido', 'id_menu', 'id_rider')->withPivot('cantidad_packs', 'fecha','entregado_a_rider');
    }


    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_menu');
    }
}
