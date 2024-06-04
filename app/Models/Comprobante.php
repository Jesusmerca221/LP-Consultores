<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $fillable = [
        'tipo_comprobante',
        'fecha_elaboracion',
        'tipo_cuenta_contable',
        'tercero',
        'descripcion',
        'debito',
        'credito',
        'observaciones',
        'adjuntar_documento',
    ];
}
