<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    public $incrementing = false;
    public $timestamps = false;


    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
}
