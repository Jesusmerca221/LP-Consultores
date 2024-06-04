<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temas_Capacitaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'video'        
    ];

    public function capacitaciones()
    {
        return $this->belongsTo(Capacitaciones::class);
    }
}
