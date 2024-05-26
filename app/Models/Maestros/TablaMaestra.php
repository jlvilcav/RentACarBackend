<?php

namespace App\Models\Maestros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaMaestra extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'tablamaestra';

    // Define las propiedades que pueden ser asignadas masivamente
    protected $fillable = [
        'tabla',
        'descripcion',
        'tipocampo',
        'valor',
        'usuCrea',
        'usuMod',
        'bitEstado'
    ];

    // Define los campos que deberían ser transformados a tipos de datos nativos de PHP
    protected $casts = [
        'fecCrea' => 'datetime',
        'fecMod' => 'datetime'
    ];

    // Especifica si el modelo debería gestionar timestamps automáticamente
    public $timestamps = false;

    // Define los campos personalizados para timestamps
    const CREATED_AT = 'fecCrea';
    const UPDATED_AT = 'fecMod';
}
