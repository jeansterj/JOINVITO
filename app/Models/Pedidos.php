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

    /**
     * Get all of the comments for the Pedidos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entregas()
    {
        return $this->hasMany(Entregas::class, 'id_pedido');
    }

    /**
     * Get the user that owns the Pedidos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rider()
    {
        return $this->belongsTo(Riders::class, 'id_rider');
    }

    /**
     * Get the menu that owns the Pedidos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menus::class, 'id_menu');
    }
}
