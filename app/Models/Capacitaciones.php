<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'precio',
        'duracion'
    ];

    public function comprasCapacitaciones()
    {
        return $this->belongsToMany(Compras_Capacitaciones::class);
    }

    public function temas()
    {
        return $this->hasMany(Temas_Capacitaciones::class);
    }
}
