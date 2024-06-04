<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'precio',
        'duracion'
    ];

    public function compras()
    {
        return $this->belongsToMany(Compras_Cursos::class, 'compras_cursos_has_cursos', 'curso_id', 'compra_id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'compras_cursos_has_cursos', 'curso_id', 'usuario_id');
    }

    public function temas()
    {
        return $this->hasMany(Temas_Curso::class);
    }
}
