<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    protected $fillable = ['user_id', 'state', 'track_num'];
    use HasFactory;

    //Relacion 1N con usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //Relacion NM con pedidos
    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class);
    }
}
