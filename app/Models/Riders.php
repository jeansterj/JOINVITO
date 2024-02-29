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
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_rider');
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

    
    /**
     * The roles that belong to the Riders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menus()
    {
        return $this->belongsToMany(Riders::class, 'pedidos', 'id_rider', 'id_menu');
    }
}
