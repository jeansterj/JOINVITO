<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentrosSociales extends Model
{
    use HasFactory;

    protected $table = 'centros_sociales';
    protected $primaryKey = 'id_centro';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Get the user that owns the CentrosSociales
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id_centro');
    }
}
