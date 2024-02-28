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
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class, 'id_rider');
    }
}
