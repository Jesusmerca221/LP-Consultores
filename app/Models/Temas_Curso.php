<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temas_Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'video'        
    ];

    public function curso()
    {
        return $this->belongsTo(Cursos::class);
    }
}
