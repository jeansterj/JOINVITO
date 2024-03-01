<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favoritos extends Model
{
    use HasFactory;

    protected $table = 'favoritos';
    protected $primaryKey = 'id_fav';
    public $incrementing = false;
    public $timestamps = false;


    public function rider()
    {
        return $this->belongsTo(Riders::class, 'id_rider');
    }



    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor');
    }


    public function noti()
    {
        return $this->hasOne(NotisUsuario::class, 'id_fav');
    }


}
