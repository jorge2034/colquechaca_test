<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'descripcion', 'cantidad_inicial'];

    public function bajas()
    {
        return $this->hasMany(Baja::class);
    }
}
