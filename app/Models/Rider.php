<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rider extends Model
{
    use HasFactory;

    protected $table = 'riders';
    protected $primaryKey = 'id_rider';
    public $incrementing = false;
    public $timestamps = false;


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_rider');
    }


    public function favoritos(): HasMany
    {
        return $this->hasMany(Favorito::class, 'id_rider');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'pedido', 'id_rider', 'id_menu')->withPivot('cantidad_packs', 'fecha','entregado_a_rider');
    }


    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_rider');
    }
}
