<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'compra_id',

    ];
    public function compra_id(): BelongsTo
    {
        return $this->belongsTo(Compra::class,'id','compra_id');
    }

    public function producto_id(): HasMany
    {
        return $this->hasMany(Producto::class,'id','producto_id');
    }
}
