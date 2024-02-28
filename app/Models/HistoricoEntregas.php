<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoEntregas extends Model
{
    use HasFactory;

    protected $table = 'historico_entregas';
    protected $primaryKey = 'id_entrega';
    public $incrementing = false;
    public $timestamps = false;
}
