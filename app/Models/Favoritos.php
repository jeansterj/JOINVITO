<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    use HasFactory;

    protected $table = 'favoritos';
    protected $primaryKey = 'id_fav';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Get the user that owns the Favoritos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rider()
    {
        return $this->belongsTo(Riders::class, 'id_rider');
    }

    /**
     * Get the user associated with the Favoritos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedor()
    {
        return $this->hasOne(Proveedores::class, 'id_prov');
    }

    /**
     * Get the user associated with the Favoritos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function noti()
    {
        return $this->hasOne(NotisUsuario::class);
    }

}
