<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Valoracion extends Model
{
    use HasFactory;
    protected $fillable = ['puntuacion', 'descripcion', 'user_id', 'producto_id', 'pedido_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }
}
