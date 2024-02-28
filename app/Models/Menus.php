<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'id_menu';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Get the proveedor that own
     *
     * @return \Illuminate\DatabasProveedoresoquent\Relid_proveedorngsTo
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor');
    }
}
