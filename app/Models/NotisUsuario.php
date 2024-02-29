<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotisUsuario extends Model
{
    use HasFactory;

    protected $table = 'notis_usuario';
    protected $primaryKey = 'id_noti';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Get the user that owns the NotisUsuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function favorito()
    {
        return $this->belongsTo(Favoritos::class);
    }
}
