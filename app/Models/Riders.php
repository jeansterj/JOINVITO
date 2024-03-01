<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riders extends Model
{
    use HasFactory;

    protected $table = 'riders';
    protected $primaryKey = 'id_rider';
    public $incrementing = false;
    public $timestamps = false;


    /**
     * Get the user that owns the Riders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_rider');
    }


    /**
     * Get all of the comments for the Riders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favoritos(): HasMany
    {
        return $this->hasMany(Favoritos::class, 'id_rider');
    }

    /**
     * The roles that belong to the Riders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menus()
    {
        return $this->belongsToMany(Menus::class, 'pedidos', 'id_rider', 'id_menu')->withPivot('cantidad_packs', 'fecha','entregado_a_rider');
    }

    /**
     * Get all of the comments for the Riders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'id_rider');
    }
}
