<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_prov';
    public $incrementing = false;
    public $timestamps = false;


    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_prov');
    }


    public function menus()
    {
        return $this->hasMany(Menus::class, 'id_prov');
    }


    public function favoritos()
    {
        return $this->hasMany(Favoritos::class, 'id_proveedor');
    }

}
