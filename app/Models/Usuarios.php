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
        return $this->hasMany(CentrosSociales::class, 'id_centro');
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

    
    // App\Models\Usuarios::join('Riders','Riders.id_rider','=','Usuarios.id_usu')->where('id_usu','=',1)->get();
}
