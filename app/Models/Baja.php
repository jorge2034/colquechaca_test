<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'motivo', 'fecha', 'activo_id'];

    public function activo() {
        return $this->belongsTo(Activo::class);
    }

}
