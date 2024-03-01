<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'favoritos';
    protected $primaryKey = 'id_fav';
    public $incrementing = false;
    public $timestamps = false;


    public function rider()
    {
        return $this->belongsTo(Rider::class, 'id_rider');
    }



    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }


    public function noti()
    {
        return $this->hasOne(Noti::class, 'id_fav');
    }


}
