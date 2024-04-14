<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'stock', 'categoria_id', 'precio'];
    use HasFactory;

    //Relacion 1N con categorias
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    //Relacion NM con pedidos
    public function pedidos(): BelongsToMany{
        return $this->belongsToMany(Pedido::class);
    }

    public function nombre():Attribute{
        return Attribute::make(
            set: fn($v)=>ucwords($v),
        );
    }
    public function descripcion():Attribute{
        return Attribute::make(
            set: fn($v)=>ucwords($v),
        );
    }
}
