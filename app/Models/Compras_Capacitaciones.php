<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras_Capacitaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_curso',
        'fecha',
        'metodo_pago'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function capacitaciones()
    {
        return $this->belongsToMany(Capacitaciones::class);
    }
}
