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

    /**
     * Get the user that owns the Proveedores
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class, 'id_prov');
    }

    /**
     * Get all of the comments for the Proveedores
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus()
    {
        return $this->hasMany(Menus::class, 'id_prov');
    }
    
    /**
     * The roles that belong to the Proveedores
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favoritos()
    {
        return $this->belongsToMany(Favoritos::class, 'id_prov');
    }
    
}
