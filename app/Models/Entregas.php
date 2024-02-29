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

    /**
     * Get the user that owns the Entregas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function punto()
    {
        return $this->belongsTo(Puntos::class, 'id_punto');
    }

    /**
     * Get the user that owns the Entregas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'id_pedido');
    }
}
