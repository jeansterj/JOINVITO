<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    use HasFactory;

    protected $table = 'puntos';
    protected $primaryKey = 'id_punto';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Get all of the comments for the Puntos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entregas()
    {
        return $this->hasMany(Entregas::class, 'id_punto');
    }
}
