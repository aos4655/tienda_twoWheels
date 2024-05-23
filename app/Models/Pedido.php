<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    protected $fillable = ['user_id', 'track_num', 'direccion'];
    use HasFactory;

    //Relacion 1N con usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //Relacion NM con productos
    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class)->withPivot('cantidad');
    }
    public function valoraciones(): HasMany
    {
        return $this->hasMany(Valoracion::class);
    }
}
