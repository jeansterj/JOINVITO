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


    public function riders()
    {
        return $this->hasMany(Riders::class, 'id_rider');
    }


    public function centros()
    {
        return $this->hasMany(Centros::class, 'id_centro');
    }


    public function proveedores()
    {
        return $this->hasMany(Proveedores::class, 'id_prov');
    }


    public function puntos()
    {
        return $this->hasMany(Puntos::class, 'id_punto');
    }

    
    public function usuario()
    {
        return $this->belongsTo(Roles::class, 'id_rol');
    }
}
