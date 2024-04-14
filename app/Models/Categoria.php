<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    protected $fillable = ['nombre'];
    use HasFactory;

    //Relacion 1N con productos
    public function productos(): HasMany{
        return $this->hasMany(Producto::class);
    }
    //Assesors y mutators
    public function nombre(): Attribute{
        return Attribute::make(
            set: fn($v)=>ucfirst($v),
        );
    }
}
