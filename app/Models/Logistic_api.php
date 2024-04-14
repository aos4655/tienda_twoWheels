<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistic_api extends Model
{
    protected $fillable =  ['num_seguimiento','ult_estado','pendiente_fecha','enviado_fecha','en_transito_fecha','entregado_fecha'];
    use HasFactory;
}
