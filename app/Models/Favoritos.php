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
}
