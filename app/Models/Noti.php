<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noti extends Model
{
    use HasFactory;

    protected $table = 'notis_usuario';
    protected $primaryKey = 'id_noti';
    public $incrementing = false;
    public $timestamps = false;


    public function favorito()
    {
        return $this->belongsTo(Favoritos::class, 'id_fav');
    }
}
