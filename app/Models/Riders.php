<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class, 'id_rider');
    }

    /**
     * Get all of the comments for the Riders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favoritos()
    {
        return $this->hasMany(Favoritos::class, 'id_rider');
    }

    /**
     * The proveedores the Riders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function proveedores()
    {
        return $this->belongsToMany(Proveedores::class, 'favoritos', 'id_rider', 'id_proveedor');
    }

    public function menus()
    {
        return $this->hasMany(Menus::class, 'id_prov');
    }
}
