<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_prov';
    public $incrementing = false;
    public $timestamps = false;


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_prov');
    }


    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_prov');
    }


    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'id_proveedor');
    }

}
