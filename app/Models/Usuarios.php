<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usu';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Get all of the comments for the Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function riders()
    {
        return $this->hasMany(Riders::class, 'id_rider');
    }

    /**
     * Get all of the comments for the Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function centros()
    {
        return $this->hasMany(Centros::class, 'id_centro');
    }

    /**
     * Get all of the comments for the Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedores()
    {
        return $this->hasMany(Proveedores::class, 'id_prov');
    }

    
    /**
     * Get all of the comments for the Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntos()
    {
        return $this->hasMany(Puntos::class, 'id_punto');
    }

    /**
     * Get the usuario t
     *
     * @return \Illuminate\Rolesbase\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Roles::class, 'id_rol');
    }
}
