<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras_Cursos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_curso',
        'fecha',
        'metodo_pago'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Cursos::class, 'compras_cursos_has_cursos', 'compra_id', 'curso_id');
    }
}
