<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'user_id',
        'producto_id',
    ];

    public function user_id(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function id(): HasMany
    {
        return $this->hasMany(Pedido::class,'compra_id','id');
    }
}
