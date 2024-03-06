<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usu';
    public $incrementing = false;
    public $timestamps = false;

    
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function riders()
    {
        return $this->hasMany(Rider::class, 'id_usu');
    }


    public function centros()
    {
        return $this->hasMany(Centros::class, 'id_centro');
    }


    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'id_prov');
    }


    public function puntos()
    {
        return $this->hasMany(Punto::class, 'id_punto');
    }


    public function usuario()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
